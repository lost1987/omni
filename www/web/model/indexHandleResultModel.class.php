<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-24
 * Time: 下午3:30
 */

namespace web\model;


use core\Model;

class IndexHandleResultModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save(Array $fields){
        return $this->db->save($fields,'index_handleresult');
    }
} 