<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 下午3:53
 */

namespace web\controller;


use core\Controller;
use web\libs\Helper;

class Aboutus extends Controller{
    function index(){
           $output_data = array(
               'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__)
           );
           $this->tpl->display("join_us.html",$output_data);
    }

    function infous(){
            $output_data = array(
                'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__)
            );
           $this->tpl->display('info_us.html',$output_data);
    }


    function infous_1(){
        $output_data = array(
            'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__)
        );
        $this->tpl->display('info_us_1.html',$output_data);
    }
} 