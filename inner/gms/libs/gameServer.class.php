<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/5
 * Time: 下午3:26
 */

namespace gms\libs;
use core\DB;
use utils\Tools;

/**
 * 处理游戏服务器相关
 * Class GameServer
 * @package gms\libs
 */
class GameServer{

        private static  $_instance = null;

        /**
         * DB null
         */
        private $_db = null;

        static function instance(){
                if(self::$_instance == null)
                    self::$_instance = new self;
                return self::$_instance;
        }

        /**
         * @param $server server表数据对象
         */
        function set_server($server){
                if($this->_db === null || $server['ip'] == $this->_db->getHost()) {
                    $this->_db = new DB();
                    $this->_db->init_db($server);
                }
        }

        function  __call($method,$arguments){
             return  call_user_func_array(array($this->_db,$method),$arguments);
        }
} 