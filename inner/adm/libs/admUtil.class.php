<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/9
 * Time: 下午2:49
 */

namespace adm\libs;

use adm\model\Admin_M;
use core\Configure;
use core\Cookie;
use core\Redirect;
use utils\Tools;

class AdmUtil {

    const NEWCOINS_CHANGE_CHILDREN_DEPOSIT = 0; //下线提现
    const NEWCOINS_CHANGE_CHILDREN_LEVELUP = 1; //下线升级
    const NEWCOINS_CHANGE_CHILDREN_SIGN = 2;//下线签到
    const NEWCOINS_CHANGE_DEPOSIT = 3;//本人提现
    const NEWCOINS_CHANGE_DEPOSIT_FAILED = 4;//本人提现失败

    private static  $_instance = null;

    private $_admin_M =  null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function __construct(){
        $this->_admin_M = Admin_M::instance();
    }

    function check_login(){
        $admin = Cookie::instance()->userdata('session_data');
        if(false == $admin){
            if(Tools::is_ajax_req()){
               die('loginTimeExpired');
            }else
               Redirect::instance()->forward('/login');
        }
    }

    /**
     * 指示是否是超级管理员
     */
    function is_administrator(){
        if(Cookie::instance()->userdata('is_administrator'))
            return true;
        return false;
    }

    /**
     * 判断账号是否存在
     * @param $email
     * @return bool
     */
    function admin_exsit($email){
        if(!empty($account)) {
            $admin = $this->_admin_M->get_admin_by_email($email);
            if(false == $admin)
                return false;
            return true;
        }
        return true;
    }


    /**
     * 获取会话中的管理员登陆信息
     * @return bool|mixed|string
     */
    function session_data(){
        $session_data = Cookie::instance()->userdata('session_data');
        if(!empty($session_data)) {
            $session_data = json_decode($session_data, true);
            return $session_data;
        }
        return false;
    }

    /**
     * 生成数据库密码
     * @param $password 前端MD5后的密码
     * @return string
     */
    function make_password($password){
        $secrect = Configure::instance()->adm['admin_secrect'];
        return md5($password.'@'.$secrect);
    }

} 