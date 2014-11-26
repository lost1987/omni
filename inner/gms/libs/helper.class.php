<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/18
 * Time: 上午10:00
 */

namespace gms\libs;


class Helper {

    private static  $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 拼接redis中存储比赛奖励的key
     * @param int $match_type  比赛类型 参照gms.inc中的设置
     * @param int  $match_id   比赛ID
     * @throws \Exception
     */
    function get_match_prize_key($match_type,$match_id){
        $admin = AdminUtil::instance()->session_data();
        $match_prize_redis_key = "match_prize:{$admin['selected_server_id']}:$match_type:$match_id";
        return $match_prize_redis_key;
    }
}