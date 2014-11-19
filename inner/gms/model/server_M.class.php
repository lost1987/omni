<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/31
 * Time: 上午9:56
 */

namespace gms\model;


use core\Model;

class Server_M extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($id){
        $sql = "SELECT * FROM gms_core_servers WHERE id = ?";
        $this->db->execute($sql,array($id));
        return $this->db->fetch();
    }

}