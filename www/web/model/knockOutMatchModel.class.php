<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/4
 * Time: 上午9:26
 */

namespace web\model;


use core\Model;

class KnockOutMatchModel extends Model {

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists(){
        $sql = "SELECT * FROM knockout_match WHERE active = 1";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

} 