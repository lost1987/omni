<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/19
 * Time: 上午11:27
 */

namespace uad\libs;


use core\DB;
use web\libs\UserUtil;

class GameUser {

    private static $_instance = null;

    private $_gameDB;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function __construct(){
        $this->_gameDB = new DB();
        $this->_gameDB->init_db_from_config('game');
    }

    function getGameUserByLoginName($loginName){
            $sql = "SELECT uid,login_name,nickname,user_number,password,invite_code FROM users WHERE login_name = ?";
            $this->_gameDB->execute($sql,array($loginName));
            return $this->_gameDB->fetch();
    }

    function getGameUserByUid($uid){
            $sql = "SELECT uid,login_name,nickname,user_number,password,invite_code FROM users WHERE uid = ?";
            $this->_gameDB->execute($sql,array($uid));
            return $this->_gameDB->fetch();
    }

    function getGameUserByEmail($email){
        $sql = "SELECT uid,login_name,nickname,user_number,password,invite_code FROM users WHERE email = ?";
        $this->_gameDB->execute($sql,array($email));
        return $this->_gameDB->fetch();
    }

    function getGameUserByMobile($mobile){
        $sql = "SELECT uid,login_name,nickname,user_number,password,invite_code FROM users WHERE mobile = ?";
        $this->_gameDB->execute($sql,array($mobile));
        return $this->_gameDB->fetch();
    }

    function getAuth($uid){
        $sql = "SELECT * FROM user_auth WHERE uid = ?";
        $this->_gameDB->execute($sql,array($uid));
        $auths = $this->_gameDB->fetch_all();
        $user_auth = array();
        $user_auth[UserUtil::USER_AUTH_IDCARD] = 0;
        $user_auth[UserUtil::USER_AUTH_MAIL] = 0;
        $user_auth[UserUtil::USER_AUTH_SMS] = 0;

        $auth_types = array_keys($user_auth);
        foreach($auths as $auth){
            if(in_array($auth['auth_type'],$auth_types)){
                $user_auth[ $auth['auth_type'] ] = 1;
            }
        }
        unset($auth_types,$auths);
        return $user_auth;
    }
}