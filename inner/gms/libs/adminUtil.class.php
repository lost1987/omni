<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 上午9:44
 */
namespace gms\libs;

use core\Configure;
use core\Cookie;
use core\Encoder;
use core\Permission;
use core\Redirect;
use core\Redis;
use gms\model\Admin_M;
use gms\model\Module_M;
use utils\Tools;

class AdminUtil {

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
        if(false == $admin)
            Redirect::instance()->forward('/login');
    }

    /**
     * 检查用户的权限
     * @param  子模块ID  $module_id
     */
    function check_permission($module_id){
            if(Cookie::instance()->userdata('is_administrator'))
                 return;

            /**模块ID为空*/
            if(empty($module_id))
                Redirect::instance()->forward('/error/code/'.Error::PERMISSION_DIEND);

            $r = new Redis(Configure::instance()->gms['redis']['host'],Configure::instance()->gms['redis']['port']);
            $redis = $r -> getResource();
            $redis->select(2);
            $module = $redis -> hMGet('gms_modules_'.$module_id,array('module_permission','pid'));
            unset($r,$redis);
            $session_p = Cookie::instance()->userdata('session_p');
            /**cookie里的 权限信息为空*/
            if(empty($session_p))
                Redirect::instance()->forward('/error/code/'.Error::PERMISSION_DIEND);

            $session_p = Encoder::instance()->decode($session_p);
            $has_permission = false;
            foreach($session_p as $p){
                    if($p['module_id'] == $module['pid']) {
                            if (Permission::instance()->hasPermission($p['admin_permission'], $module['module_permission'])){
                                $has_permission = true;
                                break;
                            }
                    }
            }

            if(!$has_permission){
                if(Tools::is_ajax_req()) die(Encoder::instance()->encode(array('error'=>Error::PERMISSION_DIEND,'data'=>null)));
                Redirect::instance()->forward('/error/code/'.Error::PERMISSION_DIEND);
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
     * 获得管理员的权限数组
     */
    function permissions(){
        $permissions =Cookie::instance()->userdata('session_p');
        if(empty($permissions))
            return false;

        $permissions =  Encoder::instance()->decode($permissions);
        $return_array = array();
        foreach($permissions as $p){
            $return_array[$p['module_id']] = $p;
        }
        unset($permissions);
        return $return_array;
    }

    /**
     * 判断账号是否存在
     * @param $account
     * @return bool
     */
    function admin_exsit($account){
        if(!empty($account)) {
            $admin = $this->_admin_M->get_admin_by_account($account);
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
        throw new \Exception(Error::LOGIN_TIMEOUT);
        return false;
    }

    /**
     * 生成数据库密码
     * @param $password 前端MD5后的密码
     * @return string
     */
    function make_password($password){
            $secrect = Configure::instance()->gms['admin_secrect'];
            return md5($password.'@'.$secrect);
    }


    function root_permission_modules($admin_id){
            $root_modules = Module_M::instance()->root_lists_adminid($admin_id);
            foreach($root_modules as $k => $v){
                if($v['admin_permission'] == 0)
                    unset($root_modules[$k]);
            }
            return $root_modules;
    }

    function child_permission_modules($root_modules){
            $child_modules = Module_M::instance()->child_lists();
            $child_list = array();
            foreach($child_modules as $ck => $cv){
                  foreach($root_modules as $rk => $rv){
                      if($cv['pid'] == $rv['id']){
                          if(Permission::instance()->hasPermission($rv['admin_permission'],$cv['module_permission']))
                              $child_list[] = $cv;
                          break;
                      }
                  }
            }
            return $child_list;
    }

    /**
     * 单服server
     */
    function selected_server(){
            $selected_server = Cookie::instance()->userdata('selected_server');
            if(!empty($selected_server))
                $selected_server = Encoder::instance()->decode($selected_server);
            return $selected_server;
    }
} 