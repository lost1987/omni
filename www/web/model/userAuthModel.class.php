<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/4
 * Time: 上午9:56
 */

namespace web\model;


use core\Model;

class UserAuthModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * @param int $uid
     * @param int $auth_type
     * @return mixed
     */
    function save($uid,$auth_type){
       $fields = array(
           'uid' => $uid,
           'auth_time'=>time(),
           'auth_type'=>$auth_type,
       );

       return $this->db->save($fields,'user_auth');
    }


    function del($uid,$auth_type){
        $sql = "DELETE FROM user_auth WHERE uid = ? AND auth_type = ?";
        return $this->db->execute($sql,array($uid,$auth_type));
    }

    /**
     * @param   int  $uid
     * @param null $auth_type
     * @return mixed
     */
    function read($uid,$auth_type = null){
        $cond = '';
        if($auth_type !== null)
            $cond = " AND auth_type = $auth_type";
        $sql = "SELECT * FROM user_auth WHERE uid=?  $cond";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch_all();
    }
} 