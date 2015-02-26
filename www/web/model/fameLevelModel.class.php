<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/5
 * Time: 上午9:14
 */

namespace web\model;


use core\Model;

class FameLevelModel extends Model {

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($fameLevel){
        $sql = "SELECT name FROM fame_level WHERE level = ?";
        $this->db->execute($sql,array($fameLevel));
        return $this->db->fetch();
    }
} 