<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/30
 * Time: 下午3:36
 */

namespace gms\controller;


use core\AdminController;
use core\ReflectClass;
use core\ReflectProperty;

/**
 * 错误页面处理
 * Class Error
 * @package gms\controller
 */
class Error extends AdminController{

    function code(){
        $this->init_navigator();
        $this->output_data['error_code'] = $this->args[0];
        $this->output_data['error_name'] = \gms\libs\Error::transfer($this->args[0]);
        $this->render('error.html');
    }

    function showErrorCodes(){
         $e = new \gms\libs\Error();
         $reflect  =  new ReflectClass($e);
         $codes = $reflect->getConstants();
         $errors = array();
         foreach($codes as $k => $code){
                $temp = array();
                $temp['code']= $code;
                $temp['name'] = \gms\libs\Error::transfer($code);
                $errors[] = $temp;
         }
         $this->response($errors);
    }

} 