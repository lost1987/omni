<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/6
 * Time: 上午11:06
 */

namespace gms\model;


use core\AdminModel;

class Profile_M  extends  AdminModel{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 读取玩家的资源
     * @param $uid
     * @return mixed
     */
    function readResource($uid){
         $sql = "SELECT  coins,diamond,ticket,coupon FROM profile WHERE  user_id = ?";
         $this->_game_server->execute($sql,array($uid));
        return $this->_game_server->fetch();
    }

    function read($uid){
        $sql = "SELECT  *  FROM profile WHERE  user_id = ?";
        $this->_game_server->execute($sql,array($uid));
        return $this->_game_server->fetch();
    }

    function update($fields,$uid){
        return $this->_game_server->update($fields,'profile',' WHERE user_id = '.$uid);
    }

} 