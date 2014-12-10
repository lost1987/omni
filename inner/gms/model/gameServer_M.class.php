<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/9
 * Time: 下午4:36
 */

namespace gms\model;


use core\AdminModel;

class GameServer_M extends AdminModel{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read(){
        $sql = "SELECT * FROM  server ";
        $this->_game_server->execute($sql);
        return $this->_game_server->fetch();
    }

    function update($fields,$id=1){
        return $this->_game_server->update($fields,'server',' WHERE id = '.$id);
    }

} 