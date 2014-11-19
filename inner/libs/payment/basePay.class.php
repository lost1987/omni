<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-30
 * Time: 下午3:32
 */

namespace libs\payment;


use core\Controller;
use utils\Tools;
use web\model\PaymentOrder;

/**
 * 支付接口抽象类
 * Class BasePay
 * @package libs\payment
 */
abstract class BasePay extends Controller{

    /**
     * @var 支付网关
     */
    protected  $_gateway;

    /**
     * @var 回调url地址
     */
    protected  $_callback_url;

    /**
     * @var 加密key
     */
    protected  $_key;

    /**
     * @var 商户ID
     */
    protected  $_mid;

    /**
     * 支付方法
     * @param $amount 充值金额
     * @param $remark Array  用户自定义参数数组
     * @return mixed
     */
    abstract function pay($amount,Array $remark=null);

    /**
     * 生成订单号
     * @return mixed
     */
    abstract function create_orderid();

    /**
     * 生成订单并写入数据库
     * @param $uid
     * @param $order_no
     * @param $money
     * @param $pay_type
     * @param $pay_for_id
     * @return bool 如果写入失败则返回FALSE  成功则返回写入的ID
     */
    protected function save_order($uid,$order_no,$money,$pay_type,$pay_for_id){

        if($pay_type == 3) {//手机卡支付
            $pay_amount = $this->config->web['pay_amount_ratio_mobile'];
        }else{
            $pay_amount = $this->config->web['pay_amount_ratio'];
        }

        $fields = array(
            'user_id' => $uid,
            'order_no' => $order_no,
            'money' => $money,
            'diamond' => $pay_amount[$money],
            'pay_type' => $pay_type,
            'status'=> 0,
            'create_at' => date('Y-m-d H:i:s'),
            'pay_for_id' => $pay_for_id,
            'pay_info' => '',
            'ip' => Tools::getip()
        );

        if(!PaymentOrder::instance()->save($fields))
            return false;
        return true;

    }
} 