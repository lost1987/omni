<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/1
 * Time: 上午11:30
 */

namespace utils;
use core\Encoder;

/**
 * 数据分析系统数据发送类 负责发送单一的统计数据给gms的golang解析接口
 * Class Das
 * @package web\libs
 */
class Das {
    //渠道
    const PLATFORM_MOBILE = 1;
    const PLATFORM_WEB = 2;

    //事件
    const LOGIN_COUNT = 1;
    const LOGIN_NUM = 2;
    const REGISTER_NUM = 4;
    const PAYMENT = 8;


    /**
     * 服务器id
     * @var int|null
     */
    private $_sid = null;

    /**
     * 渠道
     * @var int|null
     */
    private $_platform_type = null;

    /**
     * 自定义数据
     * @var array|null
     */
    private $_send_data = null;

    /**
     * uid
     * @var null
     */
    private $_uid = null;

    /**
     * curl resource
     * @var null|resource
     */
    private $_ch = null;

    private static $_instance = null;

    static function instance($platform,$sid,$uid){
        if(self::$_instance == null)
            self::$_instance = new self($platform,$sid,$uid);
        return self::$_instance;
    }

    function __construct($platform,$sid,$uid){
        if(!defined("GMS_HOST"))
            throw new \Exception('undefined GMS_HOST');

        $this->_sid = $sid;
        $this->_platform_type = $platform;
        $this->_uid = $uid;

        $this->_send_data = array(
            's' => $this->_sid,
            'pt' => $this->_platform_type,
            'u'  => $this->_uid
        );

        $this->_ch = curl_init();
    }

    function send($data,$workers){
        $this->_send_data['d'] = Encoder::instance()->encode($data);//自定义数据
        $this->_send_data['w'] = $workers;//类型
        curl_setopt($this->_ch,CURLOPT_URL,GMS_HOST.'/go');
        curl_setopt($this->_ch,CURLOPT_POST,1);
        curl_setopt($this->_ch,CURLOPT_POSTFIELDS,$this->_send_data);
        curl_setopt($this->_ch,CURLOPT_TIMEOUT,2);
        @curl_exec($this->_ch);
        return $this;
    }

    function close(){
        curl_close($this->_ch);
    }

} 