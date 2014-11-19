<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-23
 * Time: 下午2:10
 */

namespace web\model;


use core\Model;

class StoreCategoryModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists(){
        $sql = "SELECT a.* FROM store_category a WHERE a.visible = 1 ORDER BY a.order ASC";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

} 