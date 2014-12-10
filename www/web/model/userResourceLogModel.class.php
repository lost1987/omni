<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/10
 * Time: 下午5:12
 */

namespace web\model;


use core\Model;

class UserResourceLogModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save($fields){
        $fields['create_time'] = time();
        return $this->db->save($fields,'user_resource_log');
    }

} 