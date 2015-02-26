<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/14
 * Time: 下午5:22
 */

namespace gms\model;


use core\AdminModel;

class KnockoutMatch_M extends AdminModel{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists(){
        $sql = "SELECT * FROM knockout_match";
        $this->_game_server->execute($sql);
        return $this->_game_server->fetch_all();
    }

    function read($match_id){
        $sql = "SELECT * FROM knockout_match WHERE match_id = ?";
        $this->_game_server->execute($sql,array($match_id));
        return $this->_game_server->fetch();
    }

    function update($fields,$match_id){
//        $this->initRedis(); 清除redis缓存 现在已经不需要了
//        $knockout_keys = $this->_redis->getKeys('knockout*');
//        if(false != $knockout_keys){
//            foreach($knockout_keys as $key){
//                $this->_redis->del($key);
//            }
//        }
//        $this->_redis->close();
        return $this->_game_server->update($fields,'knockout_match'," WHERE match_id = $match_id");
    }
} 