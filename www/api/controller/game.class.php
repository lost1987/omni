<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/23
 * Time: 下午4:48
 */

namespace api\controller;


use api\libs\Error;
use core\Baseapi;
use core\Redis;
use web\model\UserMessageModel;

/**
 * 处理游戏服务器的接口
 * Class Game
 * @package api\controller
 */
class Game extends Baseapi{

    /**
     * 每局结束后的统计处理
     */
    function round_result(){
        $user_group = $this->input->get('user_group');

        if(empty($user_group) || strpos($user_group,',') == -1)
            $this->response(null,Error::ARGUMENTS_ERROR);
        $user_group = explode(',',$user_group);
        $day = date('Ymd');
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        $user_lottery_default = $this->config->common['user_lottery_default'];
        foreach($user_group as $uid){
                //得到用户的抽奖数据
                $lottery_key = "lottery:user:#$day:#$uid";
                $user_lottery = $redis->hGetAll($lottery_key);
                if($user_lottery === false || count($user_lottery) == 0){
                    $user_lottery_default['uid'] = $uid;
                    $redis->hMset($lottery_key,$user_lottery_default);
                    $user_lottery = $user_lottery_default;
                }

                $add_round = $this->config->common['lottery_add_round'];
                $round = $user_lottery['round'] + 1;
                $max = $user_lottery['max'];

                if($max > 1){
                    if($round % $add_round == 0){
                            $user_lottery['left']++;
                            $redis->hMset($lottery_key,$user_lottery);
                    }
                }
        }
        $redis->close();
        $this->response(null);
    }

} 