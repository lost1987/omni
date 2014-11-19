<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/5
 * Time: 下午4:55
 */

namespace core;


use gms\libs\GameServer;
use utils\Tools;

/**
 * 供需要单服操作游戏服务器数据的类使用
 * Class AdminModel
 * @package core
 */
class AdminModel extends Base{

    /**
     * 游戏服务器信息数组/单服
     * @var GameServer
     */
    protected  $_game_server;
    protected  $_redis;

    function __construct(){
        $server_data = Cookie::instance()->userdata('selected_server');
        if(empty($server_data))
                throw new \Exception('您未选择游戏服务器');
        $server = Encoder::instance()->decode( $server_data );
        $this->_game_server = GameServer::instance();
        $this->_game_server ->set_server($server);
    }

    function initRedis(){
         $config = $this->config->gms['redis'];
         $r = new Redis($config['host'],$config['port']);
         $this->_redis = $r->getResource();
    }

} 