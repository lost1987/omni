<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/11
 * Time: 上午11:10
 */

namespace gms\controller;


use core\AdminController;
use core\Cookie;
use core\Permission;
use core\Redirect;
use gms\libs\AdminUtil;
use gms\libs\Error;
use gms\libs\ModuleDictionary;
use gms\model\StoreCategory_M;
use gms\model\StoreProducts_M;
use utils\Page;
use utils\Tools;
use utils\Upload;

class StoreProduct extends AdminController {

    function product_info(){
            $id = $this->args[0];
            $product = StoreProducts_M::instance()->read($id);
            $product['price_name'] = $this->config->gms['price_type'][ $product['price_type'] ];
            $product['tool_name'] = $this->config->gms['tool_type'][ $product['tool_type'] ];
            $this->response($product);
    }

    function lists(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_PRODUCTS_LIST);
        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 12;
        $start = ($page-1) * $count;

        //获取查询条件
        $search_params = $this->http_get_params();
        foreach($search_params as $k => $v){
            if(!empty($v) || $v == '0')
                $this->output_data['search_'.$k] = $v;
            else
                unset($search_params[$k]);
        }
        $query_string = http_build_query($search_params);

        $list = StoreProducts_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = StoreProducts_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        $this->output_data['btn_edit_permission'] = 0;
        $this->output_data['btn_del_permission'] = 0;
        //检查按钮权限
        if(Cookie::instance()->userdata('is_administrator')){
            $this->output_data['btn_edit_permission'] = 1;
            $this->output_data['btn_del_permission'] = 1;
        }else{
            $session_p = Cookie::instance()->userdata('session_p');
            if(!empty($session_p)){
                $session_p = Encoder::instance()->decode($session_p);
                foreach($session_p as $p){
                    if($p['module_id'] == ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS){
                        if( Permission::instance()->hasPermission($p['admin_permission'],2))
                            $this->output_data['btn_edit_permission'] = 1;
                        if(Permission::instance()->hasPermission($p['admin_permission'],4))
                            $this->output_data['btn_del_permission'] = 1;
                    }
                }
            }
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/storeProduct/lists/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        //商品类型
        $this->output_data['product_types'] = $this->config->gms['product_type'];

        $categories = StoreCategory_M::instance()->lists();
        foreach($list as &$item){
            $item['product_type_name'] = $this->config->gms['product_type'][$item['product_type']];
            $item['category_name'] = $categories[$item['category_id']]['name'];
            $item['is_visible'] = empty($item['is_visible']) ? '否' : '是';
            $item['is_top'] = empty($item['is_top']) ? '否' : '是';
            $item['is_promote'] = empty($item['is_promote']) ? '否' : '是';
        }

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('store_products_list.html');
    }


    function add(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_PRODUCTS_ADD);
        $this->output_data['success'] = $this->args[1] == 'success' ? 1 : 0;
        $this->init_navigator();
        $this->output_data['action']  =  '/storeProduct/save';
        $this->output_data['action_name'] = '添加';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['categories'] = StoreCategory_M::instance()->lists();
        $this->output_data['product_types'] = $this->config->gms['product_type'];
        $this->output_data['price_types'] = $this->config->gms['price_type'];
        $this->output_data['tool_types'] = $this->config->gms['tool_type'];

        if($this->args[1] == 'edit'){
            $id = $this->args[2];
            $this->output_data['item'] =   StoreProducts_M::instance()->read($id);
            $this->output_data['action'] = '/storeProduct/update/'.$id;
            $this->output_data['action_name'] = '编辑';
        }

        $this->render('store_products_add.html');
    }

    function save(){
            $this->csrf_token_validation();
            AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_PRODUCTS_ADD);
            $post = $this->input->post();
            $upload = Upload::instance();
            $upload->set_allowed_ext($this->config->gms['upload']['image_allowed_ext']);
            $upload->set_max_size($this->config->gms['upload']['image_product_max_size']);
            $upload->set_upload_folder($this->config->gms['upload']['image_folder']);
            $image = $upload->upload($_FILES['image']);
            $url = $image['url'];
            unset($image);
            $post['image'] = $url;
            $post['modify_at'] = date('Y-m-d H:i:s');

            if(empty($post['top_timestamp']))
                unset($post['top_timestamp']);

            if(!StoreProducts_M::instance()->save($post))
                    $this->set_error(Error::DATA_WRITE);

            Redirect::instance()->forward('/storeProduct/add/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS.'/success');
    }

    function update(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_PRODUCTS_ADD);
        $post = $this->input->post();
        $id = $this->args[0];
        if(!empty($_FILES['image']['name'])){
            $upload = Upload::instance();
            $upload->set_allowed_ext($this->config->gms['upload']['image_allowed_ext']);
            $upload->set_max_size($this->config->gms['upload']['image_product_max_size']);
            $upload->set_upload_folder($this->config->gms['upload']['image_folder']);
            $image = $upload->upload($_FILES['image']);
            $url = $image['url'];
            unset($image);
            $post['image'] = $url;

            //删除旧图片
            $product = StoreProducts_M::instance()->read($id);
            if(file_exists(BASE_PATH.'/'.BASE_PROJECT.$product['image']))
                @unlink(BASE_PATH.'/'.BASE_PROJECT.$product['image']);
            unset($product);
        }
        $post['modify_at'] = date('Y-m-d H:i:s');
        if(empty($post['top_timestamp']))
            unset($post['top_timestamp']);

        if(!StoreProducts_M::instance()->update($post,$id))
            $this->set_error(Error::DATA_WRITE);

        Redirect::instance()->forward('/storeProduct/lists/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS);
    }

    function del(){
            $id = $this->args[1];
            $product = StoreProducts_M::instance()->read($id);
            if(false == $product)
                $this->set_error(Error::DATA_DELETE);

            if(file_exists(BASE_PATH.'/'.BASE_PROJECT.$product['image']))
                @unlink(BASE_PATH.'/'.BASE_PROJECT.$product['image']);
            unset($product);

            if(!StoreProducts_M::instance()->del($id))
                $this->set_error(Error::DATA_DELETE);

            Redirect::instance()->forward('/storeProduct/lists/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS);
    }

} 