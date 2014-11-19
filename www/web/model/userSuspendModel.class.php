<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-25
 * Time: 下午4:27
 */

namespace web\model;


use core\Model;

/**
 * 用户申诉
 * Class UserSuspendModel
 * @package web\model
 */
class UserSuspendModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save(Array $fields){
        return $this->db->save($fields,'index_usersuspend');
    }
} 