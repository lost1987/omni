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
            list($gp1,$gp2,$gp3) = explode('.',$v);
            list($sv1,$sv2,$sv3) = explode('.',$server['mobile_version']);

            $is_right_ver = true;
            if(intval($gp1) < intval($sv1)){
                $is_right_ver = false;
            }else{
                if(intval($gp2) < intval($sv2)){
                    $is_right_ver = false;
                }else{
                    if(intval($gp3) < intval($sv3)){
                        $is_right_ver = false;
                    }
                }
            }

            if($server['mobile_force_update'] && !$is_right_ver)
                $this->response(null,Error::CLIENT_FORCE_UPDATE);
        }
    }

} 