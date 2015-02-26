<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 上午9:39
 */

namespace adm\controller;


use adm\core\AdmController;
use adm\libs\AdmError;
use adm\libs\AdmUtil;
use adm\libs\UserRelationShip;
use adm\model\Admin_M;
use core\Base;
use core\Cookie;
use core\Encoder;
use core\Redirect;
use utils\Tools;

/**
 * 登陆控制器
 * Class Login
 * @package gms\controller
 */
class Login extends AdmController{

    function index(){
        $this->tpl->display('login.html');
    }

    function doo(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if(empty($email) || empty($password))
        {
            $this->response(null,AdmError::UNAME_PWD_ERROR);
        }else{
            if(strlen($password) != 32)
                $this->response(null,AdmError::UNAME_PWD_ERROR);
            //登录流程
            $admin = Admin_M::instance()->get_admin_by_email($email);
            if(false == $admin){
                $this->response(null,AdmError::UNAME_PWD_ERROR);
            }
            $mypassword = AdmUtil::instance()->make_password($password);
            if($mypassword != $admin['password'])
                $this->response(null,AdmError::UNAME_PWD_ERROR);

            unset($admin['password']);
            Cookie::instance()->set_userdata('session_data',Encoder::instance()->encode($admin));
            Cookie::instance()->set_userdata('is_administrator',$admin['superman']);
            $this->response();
        }

    }

    /**
     * 注销
     */
    function logout(){
            Cookie::instance()->sess_destroy();
            Redirect::instance()->forward();
    }

}