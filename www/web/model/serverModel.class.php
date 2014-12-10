<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/9
 * Time: 下午3:36
 */

namespace web\model;


use core\Model;

class ServerModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read(){
        $sql = "SELECT * FROM server";
        $this->db->execute($sql);
        return $this->db->fetch();
    }
} 