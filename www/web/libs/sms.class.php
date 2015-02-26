<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/4
 * Time: 下午3:13
 */

namespace web\libs;


use utils\Tools;

class Sms {

    const SMS_EXPIRE_TIME = 300; //验证码有效期

    const SMS_SEND_TICKET = 60;  //短信重发间隔

    private $_host ='http://106.ihuyi.cn/webservice/sms.php?method=Submit';

    private $_user = 'cf_nbgame';

    private $_passwd = '16youxi';

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }


    function getRedisKey($uid,$subKey){
        return "sms:$subKey:$uid";
    }

    function createCode(){
        $code = mt_rand(100000,999999);
        return $code;
    }

    function sendGet($content,$mobile){
        $params = array(
            'account' => $this->_user,
            'password' => $this->_passwd,
            'mobile' => $mobile,
            'content' => $content
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->_host);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        $result =  curl_exec($curl);
        curl_close($curl);
        $result = Tools::xml_to_array($result);
        error_log('短信平台返回代码为:'.$result['SubmitResult']['code']);
        if($result['SubmitResult']['code'] == 2){
            return true;
        }
        error_log('sms send failed:'.$result['SubmitResult']['code'].';'.$content);
        return false;
    }
} 