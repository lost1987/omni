<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/20
 * Time: 上午10:48
 */

namespace gms\controller;


use core\AdminController;
use core\Cookie;
use gms\libs\AdminUtil;
use gms\libs\ModuleDictionary;
use gms\model\Admin_M;

/**
 * 最新活动
 * Class Activity
 * @package gms\controller
 */
class Activity extends AdminController{

    function add(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_ACTIVITY_ADD);
        $this->output_data['success'] = $this->args[1] == 'success' ? 1 : 0;
        $this->init_navigator();
        $this->output_data['action']  =  '/activity/save';
        $this->output_data['action_name'] = '添加';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();

        if($this->args[1] == 'edit'){
            $id = $this->args[2];
            //$this->output_data['item'] =   Admin_M::instance()->read($id);
            $this->output_data['action'] = '/activity/update/'.$id;
            $this->output_data['action_name'] = '编辑';
        }

        $this->render('activity_add.html');
    }


    function save(){

    }

} 