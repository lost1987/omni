<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/10
 * Time: 上午10:07
 */

namespace gms\libs;


use gms\model\Player_M;
use gms\model\PurchaseProfile_M;
use gms\model\UserMessages_M;
use utils\Tools;

class PlayerUtil{

    const FORBBIDEN = 1;
    const UNFORBBIDEN = 0;

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

    /**
     * 封停/解封 玩家
     * @param int $op 对应常量
     * @param int $player_id 玩家ID
     */
    function forbidden($op,$player_id){
        $params = array(
            'forbidden' => $op
        );
        return Player_M::instance()->update($params,$player_id);
    }

    /**
     * 重置密码
     * @param int $player_id
     * @param int $user_number
     * @return 重置后的原始密码|false
     */
    function reset_password($player_id,$user_number){
            $source_password = strtolower(Tools::make_rand_str(6));
            $password = md5( md5($source_password).'#'.$user_number );
            $params = array(
                'password' => $password
            );
            if(Player_M::instance()->update($params,$player_id))
                return $source_password;
            return false;
    }

    /**
     * 重置消费密码
     * @param int $player_id
     * @param int $user_number
     * @return 重置后的原始密码|false
     */
    function reset_purchase_password($player_id,$user_number){
            $source_password = strtolower(Tools::make_rand_str(6));
            $password = md5( md5($source_password).'#'.$user_number );
            $params = array(
                'purchase_password' => $password
            );
            if( PurchaseProfile_M::instance()->update($params,$player_id) )
                return $source_password;
            return false;
    }

} 