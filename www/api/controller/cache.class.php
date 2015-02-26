<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/20
 * Time: 下午4:09
 * 从缓存中取数据
 */

namespace api\controller;


use core\Baseapi;
use core\Redis;
use utils\Tools;
use web\model\UserModel;

/**
 * 处理缓存数据的接口类
 * Class Cache
 * @package api\controller
 */
class Cache extends Baseapi{

    function __construct(){
        parent::__construct();
        $redis = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $this->redis = $redis->getResource();
        $this->redis->select(2);
    }

    /**
     * 获取用户的总排名
     */
    function global_rank(){
            $sessionid = $this->input->post('sessionid');
            $user = null;
            if(!empty($sessionid)){
                 $session = $this->check_session($sessionid);
                 if(false != $session) {
                     $userObject = UserModel::instance()->getUserByUid($session['uid']);
                     $today = date('YmdHis');
                     if(!strcmp($userObject['regist_time'],$today)){
                         $user = null;
                     }else{
                         $user_number = $session['user_number'];
                         $info = $this->redis->hMGet('global:rank_info:user:'.$user_number,array('nickname','area','coins','win_rate','coins_rank'));
                         $info = Tools::std_array_format($info);
                         $user_rank = intval($info['coins_rank']);
                         unset($info['coins_rank']);
                         $user = array(
                             'info' => $info,
                             'rank' => $user_rank
                         );
                     }
                 }
            }

            $list =  $this->redis->lRange('global:rank_info:coins',0,19);
            $data = array();
            foreach($list as $user_number){
                $temp = $this->redis->hMGet('global:rank_info:user:'.$user_number,array('nickname','area','coins','win_rate'));
                $data[] = $temp;
            }

            $rank = Tools::std_multi_array_format($data);

            $response = array(
                'rank' => $rank,
                'user' => $user
            );

            $this->response($response);
    }



} 