<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-15
 * Time: 下午2:33
 */

namespace web\controller;


use core\Controller;
use core\Cookie;
use libs\Brige;
use web\libs\Error;

/**
 * 网站方接受外来api的访问
 * Class Api
 * @package web\controller
 */
class Api extends Controller{


    function __construct(){
        parent::__construct();
        //验证签名
        $brige = new Brige();
        $params = $_POST;
        unset($params['sign']);
        unset($params['sign_type']);
        $brige -> setParams($params);
        $brige -> setSignType($_POST['sign_type']);
        if(!$brige->verify_sign()) {
            $this->response(Error::ERROR_SIGN);
            error_log('签名错误');
        }
    }


} 