<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-8-26
 * Time: 下午7:03
 */

namespace core;


class Redirect {

         private static $_instance = null;

         private $_get = null;

         static function instance(){
               if(self::$_instance == null)
                    self::$_instance = new Redirect();
             return self::$_instance;
         }

        /**
         * http get 方式
         * @param $param
         */
        function addGetParam($key,$val){
                $this->_get[$key] = $val;
                return $this;
        }

        /**
         * 默认跳域名HOST
         * @param string $url
         */
        function forward($url='/'){
                  $params = '';
                  if(!empty($this->_get))
                       $params = '?'.http_build_query($this->_get);
                  $this->_get = null;

                  header('location:'.$url.$params);
                  exit;
         }

} 