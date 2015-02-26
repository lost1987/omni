<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/28
 * Time: 下午4:17
 */
namespace core;

/**
 * 利用zeromq pull/push模式发送数据给服务端
 * Class Pusher
 * @package core
 */
class Pusher {

    private $_host  = null;
    private $_port  = null;
    private $_queue = null;

    /**
     * @param array $config   如 host=>tcp://127.0.0.1,port=>5000
     * @param bool string $persisted   持久连接(如果需要短时间重连的话 就传入一个唯一标识字符串) 默认false
     */
    function __construct($config,$persisted = false){
            $this->init($config,$persisted);
    }

    function __destruct(){
        $this->_host = null;
        $this->_port = null;
        $this->_queue = null;
    }


    private function init($config,$persisted = false){
        $this->_host = $config['host'];
        $this->_port = $config['port'];
        $persisted_id = null;
        if($persisted)
            $persisted_id = $persisted;
        $this->_queue =  new \ZMQSocket(new \ZMQContext(),\ZMQ::SOCKET_PUSH,$persisted_id);
        $this->_queue->connect("$this->_host:$this->_port");
    }

    /**
     * 推送消息
     * @param $msg_data
     */
    function push($msg_data){
            $this->_queue->send($msg_data);
            return $this;
    }

    /**
     * 关闭连接
     */
    function kill(){
            @$this->_queue->disconnect("$this->_host:$this->_port");
    }

} 