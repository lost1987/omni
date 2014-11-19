<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/17
 * Time: 上午9:17
 */

namespace gms\model;


use core\AdminModel;
use core\Encoder;

/**
 * 比赛奖励
 * Class MatchPrize_M
 * @package gms\model
 */
class MatchPrize_M extends AdminModel{
    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function __construct(){
        parent::__construct();
    }

    /**
     *
     * @param $match_id 比赛ID
     * @param null $type   比赛类型 : 根据类型不同 奖励也不同
     * @return mixed
     */
    function lists($match_id,$type = null){
            $cond = ' WHERE match_id = '.$match_id;
            if($type !== null)
                $cond .= " and match_type = $type ";

            $sql = " SELECT * FROM match_prize $cond";
            $this->_game_server->execute($sql);
            return $this->_game_server->fetch_all();
    }


    /**
     * 缓存里存储的奖励结构 主要是为了gms后台服务,做一层数据库的缓冲层
     * @param match_redis_key  比赛奖励redis key
     * @return false|String
     */
    function list_prize_struct($match_prize_redis_key){
         $this->initRedis();
         $this->_redis->select(2);
         $match_prize = $this->_redis->get($match_prize_redis_key);
        return $match_prize;
    }

    /**
     * 缓存奖励数据
     * @param $match_prize_redis_key string
     * @param $data string
     */
    function save_prize_struct($match_prize_redis_key,$data){
        $this->initRedis();
        $this->_redis->select(2);
        return $this->_redis->set($match_prize_redis_key,$data);
    }

    function del($match_id,$match_type){
        $sql = "DELETE FROM match_prize WHERE match_id = ? and match_type = ?";
        return $this->_game_server->execute($sql,array($match_id,$match_type));
    }
} 