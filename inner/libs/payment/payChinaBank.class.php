<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-30
 * Time: 下午2:54
 */
namespace libs\payment;
use core\Redirect;
use web\libs\Error;

/**
 * 网银在线
 * Class PayChinaBank
 */
class PayChinaBank extends BasePay{

    private static $_instance = null;

    public   $_gateway  = 'https://pay3.chinabank.com.cn/PayGate';

    public  $_mid = 22937569;

    public  $_key = 'Oe,9t9b54uJpf9w';

    public  $_callback_url = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function pay($amount,Array $remark=null)
    {
            $this->_callback_url = API_HOST.'/payment/chinabank';
            $v_url = BASE_HOST.'/userinfo';//商户跳回url
            $v_mid = $this->_mid;
            $key = $this->_key;
            $v_oid = $this->create_orderid();
            $v_amount = $amount;
            $v_moneytype = 'CNY';

            if(false == $this->save_order($remark['uid'],$v_oid,$amount,$remark['pay_type'],$remark['uid']))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_DATA_WRITE);

            $v_md5info = strtoupper(md5($v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key));
            $queries = array(
                'v_mid' => $v_mid,
                'v_oid' => $v_oid,
                'v_amount' => $v_amount,
                'v_moneytype' => $v_moneytype,
                'v_url' => $v_url,
                'v_md5info' => $v_md5info,
                'remark2' => '[url:='.$this->_callback_url.']'//对账地址 一定要写
            );

            $url = $this->_gateway.'?'.http_build_query($queries);
            Redirect::instance()->forward($url);
    }

     function create_orderid(){
            $orderid = 'web'.date('Ymd').uniqid();
            return $orderid;
    }


}