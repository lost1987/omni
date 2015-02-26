<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 下午3:51
 */

namespace web\controller;


use core\Controller;
use web\libs\Helper;

/**
 * 关于我们
 * Class Introduce
 * @package web\controller
 */
class Introduce extends Controller{
    function index(){
            $this -> output_data['xszn'] = 'active';
            $this -> tpl -> display('userGuide.html',$this->output_data);
    }
} 