<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 上午9:39
 */

namespace gms\controller;


use core\Base;
use core\Cookie;
use core\Encoder;
use core\Redirect;
use gms\libs\AdminUtil;
use gms\libs\ModuleDictionary;
use gms\libs\SystemLog;
use gms\model\Admin_M;
use gms\model\AdminModule_M;
use gms\model\Server_M;
use utils\Tools;

/**
 * 登陆控制器
 * Class Login
 * @package gms\controller
 */
class Login extends Base{

    function index(){

          $account = $this->input->post('username');
          $password = $this->input->post('password');

         if(empty($account) || empty($password))
         {
             $this->tpl->display('login.html');
         }else{
             if(strlen($password) != 32)
                   $this->set_login_error('密码长度错误!');
             //登录流程
            $admin = Admin_M::instance()->get_admin_by_account($account);
             if(false == $admin){
                    $this->set_login_error("账号不存在!");
             }
            $mypassword = AdminUtil::instance()->make_password($password);
             if($mypassword != $admin['password'])
                    $this->set_login_error('密码错误!');

             unset($admin['password']);
             Cookie::instance()->set_userdata('session_data',Encoder::instance()->encode($admin));
             Cookie::instance()->set_userdata('is_administrator',$admin['superman']);
             $permissions = AdminModule_M::instance()->get_list_by_admin_id($admin['id']);
             if(!empty($permissions))
                Cookie::instance()->set_userdata('session_p',Encoder::instance()->encode($permissions));
             //将当前的选择的服务器信息保存到cookie里
             $server = Server_M::instance()->read($admin['selected_server_id']);
             Cookie::instance()->set_userdata('selected_server',Encoder::instance()->encode($server));
             SystemLog::instance()->save(ModuleDictionary::ROOT_MODULE_LOGIN);
             Redirect::instance()->forward('/index');
         }

    }

    /**
     * 登陆时,检查账号是否存在
     * 存在反回true,否则返回错误信息
     */
    function check_account(){
        $account = $this->input->post('username');
        if(AdminUtil::instance()->admin_exsit($account))
            die('true');
        die('账号不存在,请重新输入');
    }

    /**
     * 登陆时,检查账号是否存在
     * 不存在返回true , 否则返回错误信息
     */
    function check_account_toggle(){
        $account = $this->input->post('username');
        if(AdminUtil::instance()->admin_exsit($account))
            die('账号已存在,请重新输入');
        die('true');
    }

    function  set_login_error($msg){
          $output_data = array(
              'msg' => $msg
          );
          $this->tpl->display('login.html',$output_data);
          exit;
    }

    /**
     * 注销
     */
    function logout(){
            Cookie::instance()->sess_destroy();
            Redirect::instance()->forward();
    }

}