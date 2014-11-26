<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/26
 * Time: 上午9:15
 */

namespace gms\controller;


use core\AdminController;
use core\Cookie;
use core\Encoder;
use core\Permission;
use core\Redirect;
use gms\libs\AdminUtil;
use gms\libs\Error;
use gms\libs\ModuleDictionary;
use gms\libs\SystemLog;
use gms\model\StoreCategory_M;
use utils\Page;

/**
 * 商品栏目
 * Class StoreCategory
 * @package gms\controller
 */
class StoreCategory extends AdminController{

    function lists(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_CATEGORY_LIST);
        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 7;
        $start = ($page-1) * $count;

        $list = StoreCategory_M::instance()->lists($start,$count);
        $total = StoreCategory_M::instance()->num_rows();
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
                        if( Permission::instance()->hasPermission($p['admin_permission'],16))
                            $this->output_data['btn_edit_permission'] = 1;
                        if(Permission::instance()->hasPermission($p['admin_permission'],32))
                            $this->output_data['btn_del_permission'] = 1;
                    }
                }
            }
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/storeCategory/lists/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active'
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        foreach($list as &$item){
            $item['visible'] = empty($item['visible']) ? '否' : '是';
        }

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('store_category_list.html');
    }


    function add(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_CATEGORY_ADD);
        $this->output_data['success'] = $this->args[1] == 'success' ? 1 : 0;
        $this->init_navigator();
        $this->output_data['action']  =  '/storeCategory/save';
        $this->output_data['action_name'] = '添加';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();

        if($this->args[1] == 'edit'){
            $id = $this->args[2];
            $this->output_data['item'] =   StoreCategory_M::instance()->read($id);
            $this->output_data['action'] = '/storeCategory/update/'.$id;
            $this->output_data['action_name'] = '编辑';
        }

        $this->render('store_category_add.html');
    }


    function update(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_CATEGORY_ADD);
        $this->csrf_token_validation();
        $post = $this->input->post();
        $id = $this->args[0];

        if(!StoreCategory_M::instance()->update($post,$id))
            $this->set_error(Error::DATA_WRITE);

        SystemLog::instance()->save(ModuleDictionary::MODULE_STORE_CATEGORY_ADD,'修改栏目:'.$post['name']);
        Redirect::instance()->forward('/storeCategory/lists/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS);
    }


    function save(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_CATEGORY_ADD);
        $this->csrf_token_validation();
        $post = $this->input->post();

        if(!StoreCategory_M::instance()->save($post))
            $this->set_error(Error::DATA_WRITE);

        SystemLog::instance()->save(ModuleDictionary::MODULE_STORE_CATEGORY_ADD,'添加栏目:'.$post['name']);
        Redirect::instance()->forward('/storeCategory/add/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS.'/success');
    }

    function del(){
            AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_STORE_CATEGORY_DEL);
            $id = $this->args[1];

            try{

                    if(!StoreCategory_M::instance()->del($id))
                        throw new \Exception(Error::DATA_DELETE);

                    SystemLog::instance()->save(ModuleDictionary::MODULE_STORE_CATEGORY_DEL,'删除栏目#id:'.$id);
                    Redirect::instance()->forward('/storeCategory/lists/'.ModuleDictionary::ROOT_MODULE_STORE_PRODUCTS);
            }catch (\Exception $e){
                $this->set_error($e->getMessage());
            }
    }
} 