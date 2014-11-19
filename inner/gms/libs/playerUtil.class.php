<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/10
 * Time: 上午10:07
 */

namespace gms\libs;


use gms\model\UserMessages_M;

class PlayerUtil{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     ** #针对网站
     * 发送一条信息给玩家
     * @param $uid int 玩家ID
     * @param $msg   string 要发送的消息
     * @return  int|bool   false是失败
     */
    function sendMsg($uid,$msg){
           return  UserMessages_M::instance()->save_message($uid,$msg);
    }


} 