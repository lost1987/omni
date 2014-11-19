<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/14
 * Time: 下午2:13
 */

namespace gms\model;


use core\AdminModel;

class DailyMatch_M extends AdminModel{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists(){
            $sql = "SELECT * FROM daily_point_match";
            $this->_game_server->execute($sql);
            return $this->_game_server->fetch_all();
    }

    function read($match_id){
            $sql = "SELECT * FROM daily_point_match WHERE match_id = ?";
            $this->_game_server->execute($sql,array($match_id));
            return $this->_game_server->fetch();
    }

    function update($fields,$match_id){
            return $this->_game_server->update($fields,'daily_point_match'," WHERE match_id = $match_id");
    }
}