<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14/10/17
 * Time: 下午3:21
 */

namespace web\model;


use core\Model;

/**
 * 处理网页端存储的session供游戏服务器验证
 * Class SessionModel
 * @package web\model
 */
class SessionModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($session_key){
        $sql = "SELECT * FROM django_session WHERE session_key = ?";
        $this->db->execute($sql,array($session_key));
        return $this->db->fetch();
    }

    function save($fields){
        return $this->db->save($fields,'django_session');
    }
} 