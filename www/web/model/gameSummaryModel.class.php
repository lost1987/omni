<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-19
 * Time: 上午9:03
 */

namespace web\model;


use core\Model;

class GameSummaryModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($uid){
        $sql = "SELECT * FROM gauth_gamesummary WHERE player_id = ?";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch();
    }

} 