<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/2
 * Time: 下午4:44
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
use gms\model\Article_M;
use gms\model\ArticleCategory_M;
use utils\Page;
use utils\Tools;
use utils\Upload;

class Article extends AdminController{


    function lists(){
        //检查权限
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ARTICLE_LIST);

        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 10;
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

        $list = Article_M::instance()->set_condition($search_params)->lists($start,$count);
        $flags = $this->config->gms['article_flags'];
        foreach($list as &$item){
            $item['publish_time'] = date('Y-m-d H:i:s',$item['publish_time']);
            $item['flag'] = explode(',',$item['flag']);
            $item['flag_names'] = array();
            foreach($flags as $k => $v){
                if(in_array($k,$item['flag'])){
                    $item['flag_names'][] = $v;
                }
            }
            $item['flag'] = implode(',',$item['flag_names']);
        }
        $total = Article_M::instance()->set_condition($search_params)->num_rows();
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
                    if($p['module_id'] == ModuleDictionary::ROOT_MODULE_ACTIVITY){
                        if( Permission::instance()->hasPermission($p['admin_permission'],2))
                            $this->output_data['btn_edit_permission'] = 1;
                        if( Permission::instance()->hasPermission($p['admin_permission'],4))
                            $this->output_data['btn_del_permission'] = 1;
                    }
                }
            }
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/article/lists/'.ModuleDictionary::ROOT_MODULE_ARTICLES.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('article_list.html');
    }

    function add(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ARTICLE_ADD);
        $this->output_data['success'] = $this->args[1] == 'success' ? 1 : 0;
        $this->init_navigator();
        $this->output_data['action']  =  '/article/save';
        $this->output_data['action_name'] = '添加';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['categories'] = ArticleCategory_M::instance()->lists();
        $this->output_data['flags'] = $this->config->gms['article_flags'];

        if($this->args[1] == 'edit'){
            $id = $this->args[2];
            $this->output_data['article'] =   Article_M::instance()->read($id);
            $this->output_data['article']['flag'] = explode(',',$this->output_data['article']['flag']);
            $this->output_data['action'] = '/article/update/'.$id;
            $this->output_data['action_name'] = '编辑';
        }

        $this->render('article_add.html');
    }


    function save(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ARTICLE_ADD);
        $post = $this->input->post();
        $file = $_FILES;

        if(count($post['flag']) > 0)
            $post['flag'] = implode(',',$post['flag']);
        else
            $post['flag'] = null;
        $post['publish_time'] = time();
        $post['content'] = $this->input->sPost('content');

        if(!empty($file['image']['name'])){
            $image_host = str_replace('http://','',WWW_HOST);
            //上传图片
            $upload = new Upload();
            $upload->set_allowed_ext($this->config->gms['upload']['image_allowed_ext']);
            $upload->set_max_size();
            $upload->set_upload_folder('upload/images/article');
            $file = $upload->upload($file['image']);
            $post['image'] = $file['url'];
        }


        if(!$insert_id = Article_M::instance()->save($post)){
            @unlink($file['path']);
            $this->set_error(Error::DATA_WRITE);
        }

        SystemLog::instance()->save(ModuleDictionary::MODULE_ARTICLE_ADD,"添加文章#id:$insert_id");
        Redirect::instance()->forward('/article/add/49/success');
    }


    function update(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ARTICLE_ADD);
        $post = $this->input->post();
        $file = $_FILES;

        if(count($post['flag']) > 0)
            $post['flag'] = implode(',',$post['flag']);
        else
            $post['flag'] = null;
        $post['content'] = $this->input->sPost('content');
        $id = $this->args[0];
        //如果图片不为空 则上传图片
        if(!empty($_FILES['image']['name'])){
            $upload = new Upload();
            $upload->set_allowed_ext($this->config->gms['upload']['image_allowed_ext']);
            $upload->set_max_size();
            $upload->set_upload_folder('upload/images/article');
            $file = $upload->upload($file['image']);
            $post['image'] = $file['url'];
        }else{
            unset($post['image']);
        }


        if(!Article_M::instance()->update($post,$id)){
            @unlink($file['path']);
            $this->set_error(Error::DATA_WRITE);
        }

        SystemLog::instance()->save(ModuleDictionary::MODULE_ARTICLE_ADD,"编辑文章#id:$id");
        Redirect::instance()->forward('/article/lists/49');
    }


    function del(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ARTICLE_DEL);
        $id = $this->args[1];
        if(!Article_M::instance()->del($id))
            $this->set_error(Error::DATA_DELETE);

        SystemLog::instance()->save(ModuleDictionary::MODULE_ACTIVITY_DEL,"删除文章#id:$id");
        Redirect::instance()->forward('/article/lists/49');
    }

} 