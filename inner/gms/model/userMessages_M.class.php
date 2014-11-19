<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/10
 * Time: 上午10:12
 */

namespace gms\model;


use core\AdminModel;
use core\Encoder;
use utils\Tools;

class UserMessages_M extends AdminModel{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 保存信息
     */
    function save_message($uid,$content){
            $params['receiver_uid'] = $uid;
            $params['msg_jsoned_params'] = Encoder::instance()->encode(array('content'=>$content));
            $params['msg_time'] = date('YmdHis');
            $params['sender'] = '系统';
            $params['has_read'] = 0;
            $params['msg_type'] = 5;

            return $this->_game_server->save($params,'user_messages');
    }
} 