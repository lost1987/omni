<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/8
 * Time: 下午4:00
 */

namespace web\controller;


use core\Controller;

class Download extends Controller{


    function index(){
        $is_wx = false ;
        $is_android = false;
        $is_ios = false;
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') > -1 ) {
            $is_wx =  true;
        }

        else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') > -1 ) {
            $is_ios =  true;
        }


        else if( strpos($_SERVER['HTTP_USER_AGENT'], 'Android') > -1 ){
            $is_android = true;
        }
        $output['is_wx'] = $is_wx;
        $output['is_android'] = $is_android;
        $output['is_ios'] = $is_ios;

        $this->tpl->display("download.html",$output);
    }

    function mobile(){
        $this->tpl->display('download-mobile.html');
    }

} 