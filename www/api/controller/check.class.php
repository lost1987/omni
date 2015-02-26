<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14/10/17
 * Time: 下午4:42
 */

namespace api\controller;


use core\Baseapi;

/**
 * 提供各种检测服务的接口
 * Class Check
 * @package api\controller
 */
class Check extends Baseapi{

    /**
     * 检测用户的session 是否过期和有效并返回相应信息
     * url : /check/session?sessionid=$sessionid
     */
    function session(){
        $session_key = $this->input->get('sessionid');
        $session = $this->check_session($session_key);
        $data = array(
            'username' => null,
            'user_number'=> 0
        );

        //非法登入
        $data['username'] = $session['login_name'];
        $data['user_number'] = intval($session['user_number']);
        die(json_encode($data));
    }
}