<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/9
 * Time: 下午2:52
 */
namespace web\hook\beforectl;
use web\model\ServerModel;

class Server{

    function status(){
        $server = ServerModel::instance()->read();
        if($server['web_status'] != 1)
            die($server['hold_msg']);
    }

} 