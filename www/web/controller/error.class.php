<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-25
 * Time: 下午5:17
 */

namespace web\controller;


use core\Controller;
use utils\Tools;

/**
 * 错误页面输出
 * Class Error
 * @package web\controller
 */
class Error extends Controller{

    function index(){
        $code = $this->args[0];
        $error =   \web\libs\Error::error_info($code);

        $this->output_data['error'] = $error;
        $this->tpl->display('errors.html',$this->output_data);

    }

} 