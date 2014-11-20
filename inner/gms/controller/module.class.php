<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/30
 * Time: 上午11:20
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
use gms\model\Module_M;
use utils\Page;
use utils\Tools;

/**
 * 模块管理
 * Class Module
 * @package gms\controller
 */
class Module extends AdminController{

    function lists(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_MODULE_LIST);

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

        $list = Module_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = Module_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();
        $this->output_data['root_lists'] = Module_M::instance()->root_lists();
        array_unshift($this->output_data['root_lists'],array('id'=>0,'module_name'=>'根模块'));

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
                    if($p['module_id'] == ModuleDictionary::ROOT_MODULE_MODULE){//当前模块的根模块ID
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
            'parameter' =>'/module/lists/'.ModuleDictionary::ROOT_MODULE_MODULE.'/?',  #(必须)
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
        $this->render('module_list.html');
    }


    function add(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_MODULE_ADD);
        $this->output_data['success'] = $this->args[1] == 'success' ? 1 : 0;
        $this->init_navigator();
        $this->output_data['root_lists'] = Module_M::instance()->root_lists();
        array_unshift($this->output_data['root_lists'],array('id'=>0,'module_name'=>'根模块'));
        $this->output_data['action']  =  '/module/save';
        $this->output_data['action_name'] = '添加';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();

        if($this->args[1] == 'edit'){
                $id = $this->args[2];
                $this->output_data['item'] = Module_M::instance()->read($id);
                $this->output_data['action'] = '/module/update/'.$id;
                $this->output_data['action_name'] = '编辑';
        }

        $this->render('module_add.html');
    }

    function save(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_MODULE_ADD);
        $fields = $this->input->post();
        if(!Module_M::instance()->save($fields))
            $this->set_error(Error::DATA_WRITE);

        SystemLog::instance()->save(7,"添加模块".$fields['module_name']);
        Redirect::instance()->forward('/module/add/7/success');
    }

    function update(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_MODULE_ADD);
        $fields = $this->input->post();
        $id = $this->args[0];
        if(!Module_M::instance()->update($fields,$id))
            $this->set_error(Error::DATA_WRITE);

        SystemLog::instance()->save(7,"修改模块#".$id);
        Redirect::instance()->forward('/module/lists/7');
    }

//    function del(){
//        AdminUtil::instance()->check_permission(13);
//        $id = $this->args[1];
//
//        $childs = Module_M::instance()->child_lists($id);
//        if(count($childs) > 0)
//            $this->set_error(Error::DATA_REFERENCE);
//
//        unset($childs);
//        if(!Module_M::instance()->del($id))
//            $this->set_error(Error::DATA_DELETE);
//
//        Redirect::instance()->forward('/module/lists/7');
//    }
} 