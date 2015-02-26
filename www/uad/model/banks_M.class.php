<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/9
 * Time: 下午2:43
 */

namespace uad\model;


use core\Model;

class Banks_M extends Model{

    private static $_instance = null;

    static function instance()
    {
        if ( self::$_instance == null )
            self::$_instance = new self;

        return self::$_instance;
    }

    function lists(){
        $sql = "SELECT * FROM adm_banks";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

}