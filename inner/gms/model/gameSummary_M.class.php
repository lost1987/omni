<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/6
 * Time: 下午3:31
 */

namespace gms\model;


use core\AdminModel;

class GameSummary_M extends AdminModel{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($uid){
         $sql = "SELECT * FROM gauth_gamesummary WHERE player_id = ?";
         $this->_game_server->execute($sql,array($uid));
        return $this->_game_server->fetch();
    }
} 