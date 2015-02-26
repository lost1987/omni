<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-15
 * Time: 下午2:53
 */

namespace core;

use utils\Tools;

class Cookie {

    private static  $_instance = null;
    
    private $_secret;

    private $_timeout;

    private $_path;

    private $_domain;

    public function __construct(){
        $config = Configure::instance();
        $c = $config->common['cookie'];

        $this -> _secret = $c['secret'];
        $this -> _timeout = $c['timeout'];
        $this -> _path = $c['path'];
        $this -> _domain = $c['domain'];
    }

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new Cookie();
        return self::$_instance;
    }

    /**
     * 设置cookie 并加密value
     * @param $key
     * @param string $val
     */
    public function set_userdata($key,$val=''){

        if(empty($key))return;

        if(is_string($key)){
            if(!empty($val)) $val = Tools::authcode($val,'ENCODE',$this->_secret);
            $_COOKIE[$key] = $val;
            setcookie($key,$val,time()+$this -> _timeout,$this ->_path,$this->_domain);
        }
        else if(is_array($key)){
            foreach($key as $k => $v){
                if(!empty($v)) $v = Tools::authcode($v,'ENCODE',$this->_secret);
                $_COOKIE[$k] = $v;
                setcookie($k,$v,time()+$this -> _timeout,$this ->_path,$this->_domain);
            }
        }
        else{
            return;
        }
    }

    /**
     * 设置cookie且不加密value
     */
    public function set_userdata_no_entry($key,$val=''){
        if(empty($key))return;

        if(is_string($key)){
            $_COOKIE[$key] = $val;
            setcookie($key,$val,time()+$this -> _timeout,$this ->_path,$this->_domain);
        }
        else if(is_array($key)){
            foreach($key as $k => $v){
                $_COOKIE[$k] = $v;
                setcookie($k,$v,time()+$this -> _timeout,$this ->_path,$this->_domain);
            }
        }
        else{
            return;
        }
    }

    /**
     * @param $key
     * @param bool $entry 指示是否需要解密value true＝解密 false＝不解密
     * @return string
     */
    public function userdata($key,$entry=true){
        if(empty($_COOKIE[$key]))return '';
        if($entry)
            return Tools::authcode($_COOKIE[$key],'DECODE',$this->_secret);
        return $_COOKIE[$key];
    }


    /***
     * 根据key删除value
     * @param $key
     */
    public function unset_userdata($key){
        if(empty($key))return;

        if(is_string($key)){
            setcookie($key,'',time()-$this -> _timeout,$this ->_path,$this->_domain);
        }
        else if(is_array($key)){
            foreach($key as $k => $v){
                setcookie($k,'',time()-$this -> _timeout,$this ->_path,$this->_domain);
            }
        }
        else{
            return;
        }
    }

    /**
     * 设置过期时间
     * @param $micro_seconds
     */
    public function set_timeout($micro_seconds){
            $this->_timeout = $micro_seconds;
            return $this;
    }

    /**
     * 销毁所有cookie
     */
    public function sess_destroy(){
        if(count($_COOKIE) > 0){
            foreach($_COOKIE as $k => $v){
                setcookie($k,'',time()-$this -> _timeout,$this ->_path,$this->_domain);
            }
        }
    }

    /**
     * 如果cookie里没有csrf_token 则 生成 csrf_cookie
     */
    public function csrf_set_cookie(){
        $config = Configure::instance();
        $csrf = $config->{BASE_PROJECT}['csrf'];
        $token_name = $csrf['cookie_name'];
        if(empty($_COOKIE[$token_name])){
            $hash = md5(uniqid(rand(), TRUE));
            $_COOKIE[$token_name] = $hash;//设置2次无需刷新cookie
            setcookie($token_name,$hash,time()+$csrf['expire_time'],$this->_path,$this->_domain);
        }
    }

    /**
     * 更新 csrf_cookie
     */
    public function csrf_update_cookie(){
        $config = Configure::instance();
        $csrf = $config->{BASE_PROJECT}['csrf'];
        $token_name = $csrf['cookie_name'];
        $hash = md5(uniqid(rand(), TRUE));
        $_COOKIE[$token_name] = $hash;//设置2次无需刷新cookie
        setcookie($token_name,$hash,time()+$csrf['expire_time'],$this->_path,$this->_domain);
    }

    /**
     * 获取csrf_cookie
     * @return mixed
     */
    public function get_csrf_cookie(){
        $config = Configure::instance();
        $csrf = $config->{BASE_PROJECT}['csrf'];
        return $_COOKIE[$csrf['cookie_name']];
    }
}