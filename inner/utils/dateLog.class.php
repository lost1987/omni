<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/6
 * Time: 上午11:46
 */

namespace utils;


class DateLog {

    private static $_instance = null;
    private $_dir = null;
    private $_projectName = null;

    function __construct($d,$pn){
        ini_set('log_errors','On');
        $this->_dir = $d;
        $this->_projectName = $pn;

        if(!is_dir($this->_dir))
            mkdir($this->_dir,0777,true);
    }

    static function instance($dir,$projectName){
        if (self::$_instance == null)
            self::$_instance = new self($dir,$projectName);
        return self::$_instance ;
    }

    private function logname(){
        return $this->_projectName.'.php.log.'.date('Y-m-d');
    }

    function on(){
        ini_set('error_log',$this->_dir.'/'.$this->logname());
    }

    function off(){
        ini_set('log_errors','Off');
    }

} 