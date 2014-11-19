<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-22
 * Time: 上午11:14
 */

namespace core;


class Redis {

    private $_host = null;

    private $_port = null;

    private $_timeout = null;

    private $_res = null;

    function __construct($host,$port,$timeout=0){
            $this->_host = $host;
            $this->_port = $port;
            $this->_timeout = $timeout;

            $this->_res = new \Redis();
            if(!$this->_res ->connect($this->_host,$this->_port,$this->_timeout))
                throw new \Exception('cant connect redis host');
    }

    function getResource(){
        return $this->_res;
    }

    /**
     * 默认将存储数组中的字段集ID 取值用前缀_id来取
     * @param $id_name id字段的名字
     * @param $key_prefix 存储key前缀
     * @param $array 要存储的数组
     * 数组: 存储的数组应该是二维数组,并且一维索引为数字
     * 如:array(
     *      0=> array(),
     *      1=> array(),
     *      ...
     * )
     */
    function setArray($id_name,$key_prefix,$array){
            $save_key = $key_prefix;
            $save_key_values = array();
            foreach($array as $item){
                $save_key_values[] = $item[$id_name];
                $this->_res->hMset($save_key.'_'.$item[$id_name],$item);
            }
            $this->_res->hMset($save_key,$save_key_values);
    }
}