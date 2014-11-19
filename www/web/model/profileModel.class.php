<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-17
 * Time: 下午4:25
 */

namespace web\model;


use core\Model;

class ProfileModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($uid){
            $sql = "SELECT * FROM profile WHERE user_id = ?";
            $this->db->execute($sql,array($uid));
            return $this->db->fetch();
    }

    function saveProfile(Array $fields){
            return $this->db->save($fields,'profile');
    }

    function updateProfile(Array $fields,$uid){
        return $this->db->update($fields,'profile','WHERE user_id = '.$uid);
    }

}