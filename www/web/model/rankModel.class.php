<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-22
 * Time: 下午3:44
 */

namespace web\model;


use core\Configure;
use core\Cookie;
use core\Model;
use core\Redis;

class RankModel extends Model{

    private $_redis;

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function __construct(){
         if(empty($this->config->web))
             $this->config->load('web');
         $config = $this->config->web['redis'];
         $redis = new Redis($config['host'],$config['port']);
         $this->_redis = $redis->getResource();
         $this->_redis->select(2);
    }

    function __destruct(){
        $this->_redis->close();
    }

    /*
     * 排名
     * @param string $type  week|global
     * @param string $key
     * **/
    function getOrderList($type,$key){
        $list =  $this->_redis->lRange($type.':rank_info:'.$key,0,19);
        $data = array();
        foreach($list as $user_number){
                $temp = $this->_redis->hMGet('global:rank_info:user:'.$user_number,array('nickname','area','coins','win_rate',$key));
                $data[$user_number] = $temp;
        }
        return $data;
    }

    /**
     * 取单独的用户全局排名
     * @param $user_number
     * @param $key 排名具体字段 如 coins或者diamond等
     * @param string $type global|week  全局或者周排名
     * @return array
     */
    function getUserRank($user_number,$key,$type='global'){
        $orderlist = $list =  $this->_redis->lRange($type.':rank_info:'.$key,0,-1);
        $order = 999;
        for($i = 0 ; $i < count($orderlist) ; $i++){
                if($user_number == $orderlist[$i]) {
                    $order = $i;
                    break;
                }
        }

        if(in_array($key,array('coins','wins','win_rate')))
            $data =  $this->_redis->hMGet($type.':rank_info:user:'.$user_number,array('nickname','area','coins','win_rate',$key,$key.'_rank'));
        else
            $data = $this->_redis->hMGet($type.':rank_info:user:'.$user_number,array('nickname','area','coins','win_rate',$key));
        $data['order'] = $order;
        return $data;
    }

} 