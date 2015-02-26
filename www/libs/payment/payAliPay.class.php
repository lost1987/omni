<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-30
 * Time: 下午2:54
 */
namespace libs\payment;
use core\Cookie;
use web\libs\Error;
use core\Redirect;

/**
 * 阿里-支付宝
 * Class PayAliPay
 * @package libs\payment
 */
class PayAliPay extends BasePay
{

    private static $_instance = null;

    public $_gateway = 'https://mapi.alipay.com/gateway.do';

    public $_mid = 2088411390479699;//partner_id

    public $_key = '2hcxt3jwq4h3e78dvk1izswas9m3g2wj';//key_id

    public $_callback_url = '';


    static function instance()
    {
        if (self::$_instance == null)
            self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * 生成订单号
     * @return mixed
     */
    function create_orderid(){
        $orderid = 'web_'.date('Ymd').uniqid();
        return $orderid;
    }

    /**
     * 支付方法
     * @param $amount 充值金额
     * @param $remark Array  用户自定义参数
     * @return mixed
     */
    function pay($amount,Array $remark = null)
    {
        $this->_callback_url = API_HOST.'/payment/alipay';
        $service = 'create_direct_pay_by_user';
        $charset = 'utf-8';
        $order_id = $this->create_orderid();
        $subject = '购买钻石';
        $payment_type = 1;
        $seller_email = 'zhifubao@16youxi.com';

        if(false == $this->save_order($remark['uid'],$order_id,$amount,$remark['pay_type'],$remark['uid']))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_DATA_WRITE);

        $params = array(
            "service" => $service,
            "partner" =>  $this->_mid,
            "payment_type"	=> $payment_type,
            "notify_url"	=> $this->_callback_url,
            "return_url"	=> '',
            "seller_email"	=> $seller_email,
            "out_trade_no"	=> $order_id,
            "subject"	=> $subject,
            "total_fee"	=> $amount,
            "body"	=> '',
            "show_url"	=> '',
            "anti_phishing_key"	=> '',
            "exter_invoke_ip"	=> '',
            "_input_charset"	=> $charset
        );

        foreach($params as $k => $v){
            if(empty($v)){
                unset($params[$k]);
            }
        }

        ksort($params);
        reset($params);
        $signarr = array();
        foreach($params as $k => $v){
            $signarr[] = $k.'='.$v;
        }
        $sign = implode('&',$signarr);
        $sign = md5( $sign . $this->_key );

        $params['sign'] = $sign;
        $params['sign_type'] = 'MD5';
        $sHtml = "<form id='alipaysubmit' style='display:none' name='alipaysubmit' action='".$this->_gateway."?_input_charset=".$charset."' method='post'>";
        foreach($params as $k => $v){
            $sHtml.= "<input type='hidden' name='".$k."' value='".$v."'/>";
        }

        //submit按钮控件请不要含有name属性
        $sHtml .= "<input type='submit' value=''></form>";

        $sHtml .= "<script>document.forms['alipaysubmit'].submit();</script>";

        echo $sHtml;
    }


}