<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/6
 * Time: 下午5:25
 */

namespace api\core;


use api\libs\Error;
use core\Base;
use core\Baseapi;
use core\Redis;
use utils\Tools;

/**
 * 只做游戏服务器的签名验证和消息处理
 * Class GameServerController
 * @package api\core
 */
class GameServerController extends  Baseapi{

    const REDIS_HTTP_SIGN_KEY = 'webNotifySign';

    protected  $_redis = null;

    /**
     * 是否验证签名
     * @param bool $signVerify
     */
    function __construct($signVerify = false){
        parent::__construct();
        if($signVerify){
            $this->initRedis();
            $this->signVerify();
        }
    }

    protected  function initRedis(){
        $r  = new Redis($this->config->api['redis']['host'],$this->config->api['redis']['port']);
        $this->_redis = $r->getResource();
        $this->_redis->select(0);
    }

    function __destruct(){
        if($this->_redis !== null)
            $this->_redis->close();
    }

    /**
     * 生成redis里的签名key
     * @param $uid
     * @param $time
     * @return string
     */
    protected function makeSignKey($uid,$time){
        return self::REDIS_HTTP_SIGN_KEY.':'.$time.':'.$uid;
    }

    /**
     * 生成签名
     * @param $uid
     * @param $param
     * @param $time
     * @return string
     */
    protected function makeSign($uid,$time){
        return md5($uid.$time.$this->config->api['entry_key']);
    }

    /**
     * 验证游戏服务器发送来的http请求是否合法
     */
    protected  function signVerify(){
        $uid = $this->input->post('uid');
        $time = $this->input->post('time');

        $signKey = $this->makeSignKey($uid,$time);
        $gameServerSign = $this->_redis->get($signKey);
        $mySign = $this->makeSign($uid,$time);
        if(strcmp($mySign,$gameServerSign) !== 0){
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'游戏服务器通知web服务器签名失败');
            $this->response(null,Error::GAME_TO_WEB_HTTP_SIGN_INVALID);
        }else{
            $this->_redis->del($signKey);
        }
    }
} 