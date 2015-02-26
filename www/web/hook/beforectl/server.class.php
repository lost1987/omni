<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/9
 * Time: 下午2:52
 */
namespace web\hook\beforectl;
use core\Controller;
use web\model\ServerModel;

class Server extends Controller{

    function status(){
        $server = ServerModel::instance()->read();
        if($server['web_status'] != 1) {
            $this->tpl->display( "maintain.html" , array( 'msg' => $server['hold_msg'] ) );
            exit;
        }
    }

} 