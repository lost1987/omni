<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-15
 * Time: 上午9:18
 * 充值回调接口
 */
namespace api\controller;

use api\libs\Error;
use core\Baseapi;
use core\Configure;
use libs\payment\AlipayNotify;
use web\model\ProfileModel;
use web\libs\UserResource;
use web\model\PaymentOrder;
use libs\payment\PayAliPay;
use libs\payment\PayChinaBank;
use utils\Tools;

/**
 * 处理充值加钱接口,和移动端充值订单号
 * Class Payment
 * @package api\controller
 */
class Payment extends Baseapi{
    /***
     * 网银在线 通知回调接口
     */
    function chinabank(){
        $cb = new PayChinaBank();
        $key =  $cb -> _key;
        unset($cb);
        $v_oid     =trim($_POST['v_oid']);//订单号
        $v_pmode   =trim($_POST['v_pmode']);//支付银行
        $v_pstatus =trim($_POST['v_pstatus']);//支付状态20表示成功 30表示失败
        $v_pstring =trim($_POST['v_pstring']);//支付完成
        $v_amount  =trim($_POST['v_amount']); //订单实际支付金额
        $v_moneytype  =trim($_POST['v_moneytype']); //订单实际支付币种
        $v_md5str  =trim($_POST['v_md5str' ]);

        $md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));
        if ($v_md5str==$md5string)
        {
            if($v_pstatus=="20")
            {//支付成功 开始走业务流程
                //查询该订单信息
                try{
                    $this->db->begin();

                    $myorder = PaymentOrder::instance()->getByOrderNo($v_oid);
                    if(!$myorder)
                        throw new \Exception('订单号不存在');

                    if(intval($myorder['status']) > 0) {
                        die('ok');
                        //'订单已完成,非法请求';
                    }

                    if($myorder['money'] != $v_amount)
                        throw new \Exception('充值金额与订单金额不符');

                    Configure::instance()->load('web');
                    if($myorder['pay_type'] == 0 || $myorder['pay_type'] == 1)
                        $pay_amount = $this->config->web['pay_amount_ratio'];
                    else
                        $pay_amount = $this->config->web['pay_amount_ratio_mobile'];

                    //给用户增加资源
                    $profile = ProfileModel::instance()->read($myorder['user_id']);
                    $userResource = UserResource::instance($profile);
                    $userResource->add(UserResource::DIAMOND,$pay_amount[ $myorder['money'] ]);
                    if(!$userResource->updateResource())
                        throw new \Exception('用户资源修改失败');

                    //修改订单状态
                    $fields = array(
                        'pay_at' => date('Y-m-d H:i:s'),
                        'status' => 1
                    );

                    if(!PaymentOrder::instance()->updateByOrderNo($fields,$v_oid))
                        throw new \Exception('订单状态修改失败');

                    $this->db->commit();
                    die('ok');
                }catch (\Exception $e){
                    Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,$e->getMessage());
                    $this->db->rollback();
                    die('error');
                }

            }
        }else{
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'签名验证失败');
            die('error');
        }
    }

    /**
     * 支付宝 通知回调接口
     */
    function alipay(){
        $alipay = new PayAliPay();
        $config['partner'] = $alipay->_mid;
        $config['key'] = $alipay->_key;
        $config['sign_type'] = $this->input->post('sign_type');
        $config['input_charset'] = 'utf-8';
        $config['cacert']    = BASE_PATH.'\libs\payment\cacert.pem';
        $config['transport'] = 'http';
        $notify = new AlipayNotify($config);

        $verify_result = $notify->verifyNotify();
        if($verify_result){
            //查询该订单信息
            try{
                $out_trade_no = $this->input->post('out_trade_no');

                $trade_no = $this->input->post('trade_no');

                $trade_status = $this->input->post('trade_status');

                $amount = $this->input->post('total_fee');

                $this->db->begin();

                if($trade_status != 'TRADE_FINISHED' && $trade_status != 'TRADE_SUCCESS')
                    throw new \Exception('交易失败');

                $myorder = PaymentOrder::instance()->getByOrderNo($out_trade_no);
                if(!$myorder)
                    throw new \Exception('订单号不存在');

                if(intval($myorder['status']) > 0) {
                    die('success');
                    //'订单已完成,非法请求';
                }

                if($myorder['money'] != $amount)
                    throw new \Exception('充值金额与订单金额不符');

                Configure::instance()->load('web');
                if($myorder['pay_type'] == 0 || $myorder['pay_type'] == 1)
                    $pay_amount = $this->config->web['pay_amount_ratio'];
                else
                    $pay_amount = $this->config->web['pay_amount_ratio_mobile'];

                //给用户增加资源
                $profile = ProfileModel::instance()->read($myorder['user_id']);
                $userResource = UserResource::instance($profile);
                $userResource->add(UserResource::DIAMOND,$pay_amount[ $myorder['money'] ]);
                if(!$userResource->updateResource())
                    throw new \Exception('用户资源修改失败');

                //修改订单状态
                $fields = array(
                    'pay_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                );
                if(!PaymentOrder::instance()->updateByOrderNo($fields,$out_trade_no))
                    throw new \Exception('订单状态修改失败');

                $this->db->commit();
                die('success');
            }catch (\Exception $e){
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,$e->getMessage());
                $this->db->rollback();
                die('fail');
            }
        }
        else{
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'SIGN验证失败');
            die('fail');
        }
    }

    /**
     * 生成订单号
     */
    function pay_order(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(false == $session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $pay_type = $this->input->post('pay_type');
        $money = $this->input->post('money');

        if($pay_type == 2) //手机卡支付
            $pay_amount = $this->config->web['pay_amount_ratio'];

        $order_no = 'mb'.date('Ymd').uniqid();
        if(!in_array($money,array_keys($pay_amount) ))//验证money的合法性
            $this->response(null,Error::ARGUMENTS_ERROR);

        $fields = array(
            'user_id' => $session['uid'],
            'order_no' => $order_no,
            'money' => $money,
            'diamond' => $pay_amount[$money],
            'pay_type' => $pay_type,
            'status'=> 0,
            'create_at' => date('Y-m-d H:i:s'),
            'pay_for_id' => $session['uid'],
            'pay_info' => '',
            'ip' => Tools::getip()
        );

        if(!PaymentOrder::instance()->save($fields))
            $this->response(null,Error::DATA_WRITE_ERROR);
        $this->response($order_no);
    }
}