<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/9
 * Time: 下午2:52
 */
namespace api\hook\beforectl;
use api\libs\Error;
use core\Base;
use core\Baseapi;
use web\model\ServerModel;

class Server extends Baseapi{

    function status(){
        $server = ServerModel::instance()->read();
        if($server['mobile_status'] != 1)
            $this->response(null,Error::SERVER_ON_UPHOLD);

        //检测版本
        $v = $this->input->get_post('v');
        if(!empty($v)){
            if($v != $server['mobile_version']){
                if($server['mobile_force_update'])
                    $this->response(null,Error::CLIENT_FORCE_UPDATE);
            }
        }
    }

} 