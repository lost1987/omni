<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-19
 * Time: 下午4:56
 */

namespace web\model;


use core\Model;

class PurchaseProfileModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($uid){
        $sql = "SELECT * FROM gauth_purchaseprofile WHERE user_id = ?";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch();
    }

    function saveProfile(Array $fields){
        return $this->db->save($fields,'gauth_purchaseprofile');
    }

    function updateProfile(Array $fields,$uid){
        return $this->db->update($fields,'gauth_purchaseprofile','WHERE user_id = '.$uid);
    }

} 