<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-15
 * Time: 下午2:51
 *
 * $b = new Brige();
 * 发送方:
 * $b -> setSignType(Brige::SIGN_MD5);
 * $b -> setParams($params);
 * $b -> send('http://xxxx.com");
 *
 * 接收方:
 * $params = $_POST;
 * unset($params['sign']);
 * unset($params['sign_type'];
 * $b -> setSignType($_POST['sign_type']);
 * $b -> setParams($params);
 * if($b -> verify_sign())
 * {       验证成功开始业务逻辑...}
 *
 */
namespace libs;
/***
 * 负责主站和api间通信的类
 * Class Brige
 */
class Brige {

    const SIGN_MD5 = 'MD5';
    const SIGN_SHA1 = 'SHA1';

    /**
     * 签名方式
     * @var null
     */
    private $_sign_type = null;

    /**
     * 参数 array
     * @var null
     */
    private $_params = null;

    /**
     * 密钥
     * @return null
     */
    private $_key = 'kfjiuwhu34h8743hXZ522121w124344$#%^^*';

    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @param null $key
     */
    public function setKey($key)
    {
        $this->_key = $key;
        return $this;
    }

    /**
     * @return Array
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * 设置不包含签名字段的 数据字段
     * @param null $params
     */
    public function setParams($params)
    {
        $this->_params = $params;
        return $this;
    }

    /**
     * @return null
     */
    public function getSignType()
    {
        return $this->_sign_type;
    }

    /**
     * 设置签名方式 默认MD5方式
     * @param null $sign_type
     */
    public function setSignType($sign_type=self::SIGN_MD5)
    {
        $this->_sign_type = $sign_type;
        return $this;
    }

    /**
     * 获取签名
     * @return string
     */
    private function sign(){
        $sign = '';
        $params = $this->_params;
        ksort($params);
        reset($params);
        $params = implode('^',$params);
        switch($this->_sign_type){
            case 'MD5' : $sign = md5($params.$this->_key);
                break;
            case 'SHA1': $sign = sha1($params.$this->_key);
                break;
        }
        return $sign;
    }

    /**
     * 验证签名
     * @return bool
     */
    public function verify_sign(){
        $post_sign = $_POST['sign'];
        $sign = $this->sign();
        if($sign == $post_sign)
            return true;
        return false;
    }

    /**
     * 发送消息 , 目前只支持POST方式
     * @param $host 域名
     * @return mixed
     */
    public function send($host){
        $params = $this->_params;
        $sign = $this->sign();
        $params['sign'] = $sign;
        $params['sign_type'] = $this->_sign_type;
        $ch = curl_init($host);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

} 