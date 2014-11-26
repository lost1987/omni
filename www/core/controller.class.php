<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-18
 * Time: 上午11:20
 */

namespace core;


use utils\Tools;
use web\libs\Error;

class Controller extends Base{

    function __construct(){
        Cookie::instance()->csrf_set_cookie();//如果csrf_token为空 则生成csrf token
    }

    /**
     * 验证csrf token
     * @param bool $update_after_validation 是否验证通过后更新token
     * @param $_token 如果主动传入token 则只验证传入的token,不会验证$_POST请求中的csrf_token
     * @throws \Exception
     */
    function csrf_token_validation($update_after_validation = true,$_token = null){
        $config = Configure::instance();
        $cookie = Cookie::instance();
        $csrf_token_name = $config->web['csrf']['token_name'];
        if(!empty($_token))
            $token = $_token;
        else
        $token = $this->input->get_post($csrf_token_name);

        $csrf_cookie = $cookie->get_csrf_cookie();

        if($token != $csrf_cookie){
            if(Tools::is_ajax_req())
                $this->response(Error::ERROR_CSRF_TOKEN);
            else
                Redirect::instance()->forward('/error/index/'.Error::ERROR_CSRF_TOKEN);
        }

        if($update_after_validation)
            $cookie->csrf_update_cookie();
    }

    /**
     * 响应客户端 仅限ajax方法使用
     * @param $error_code Class Error
     * @param $type 编码格式类型
     * @param $data 返回的数据
     * @throws \Exception
     */
    function response($error_code = 0,$data = null,$type = Encoder::JSON){
            $r = array(
                'error' => $error_code,
                'data' => $data
            );
            die(Encoder::instance()->encode($r,$type));
    }
} 