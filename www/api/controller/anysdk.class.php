<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/29
 * Time: 上午9:32
 */

namespace api\controller;


use api\libs\Error;
use core\Baseapi;
use core\Encoder;
use utils\Curl;
use utils\Tools;
use web\libs\DataUtil;
use common\Platform;
use web\libs\UserResource;
use web\libs\UserUtil;
use web\model\PaymentOrder;
use web\model\ProfileModel;
use web\model\PurchaseProfileModel;
use web\model\UserModel;

class Anysdk extends Baseapi{

    function __construct(){
        parent::__construct();
        $this->pKey = $this->config->api['anySdk']['pKey'];
        $this->loginUrl = $this->config->api['anySdk']['loginCheckUrl'];
    }

    /**
     * @param $anySdkParams
     * @param $data
     * @param $error
     * @throws \Exception
     */
    private function anyResponse($anySdkParams,$data,$error = 0){
        $anySdkParams['ext'] =   array(
            'error' => intval($error),
            'data' => $data
        );

        die(Encoder::instance()->encode($anySdkParams));
    }

    /**
     * anysdk 登录接口
     * 返回示例
     * {"status":"ok","data":{"id":"1359699538","name":"360U1359699538","avatar":"http:\/\/quc.qhimg.com\/dm\/48_48_100\/t00df551a583a87f4e9.jpg?f=91cd0cfe10d13ec2c874c827faf9a107","sex":"\u672a\u77e5","area":"","nick":""},"common":{"channel":"000023","user_sdk":"360","uid":"1359699538","server_id":"1"},"ext":""}
     */
    function login(){
        $c = new Curl();
        $c -> setOpt(CURLOPT_RETURNTRANSFER,1);
        $anySdk = $c -> post($this->loginUrl,$this->input->post());

        if(empty($anySdk))
            $this->anyResponse($anySdk,null,Error::ANYSDK_RESPONSE_FAILED);
        $anySdk = Tools::objectToArray($anySdk);

        if(strcmp($this->pKey,$_POST['private_key']) != 0)
            $this->anyResponse($anySdk,null,Error::ANYSDK_PKEY_INVALID);

        if($anySdk['status'] != 'ok')
            $this->anyResponse($anySdk,null,Error::ANYSDK_LOGIN_FAILED);

        $login_name  = $anySdk['common']['user_sdk'].'U'. $anySdk['common']['uid'];
        $forbidden = 0;
        $regist_time = date('YmdHis');
        $is_robot = 0;

        $userModel = UserModel::instance();
        $user = $userModel->getUserByLoginName($login_name);
        $platform = Platform::instance()->getPlatformFromAnySdk($anySdk['common']['user_sdk']);
        if($user){
            DataUtil::instance()->doAfterLogin($platform,$user);

            $expire_time = $this->config->common['cookie']['timeout'];
            $session_key = UserUtil::instance()->createSessionId($expire_time,$user);
            $response = array(
                'session_name' => 'sessionid',
                'session_key' => $session_key,
                'user_number' => $user['user_number'],
                'resource_uri' => '/user/info'
            );
            $response = Tools::std_array_format($response);
            $this->anyResponse($anySdk,$response);

        }else{
            $nick_name = UserUtil::instance()->randomName();
            while(1){
                if(!UserModel::instance()->isNickNameExsit($nick_name))
                    break;
                $nick_name = UserUtil::instance()->randomName();
            }

            $user_number = $userModel->getMaxUserNumber() + 1;
            $source_password = UserUtil::instance()->makeSourcePasswordByLoginName($login_name,8);
            $password = UserUtil::instance()->makePasswordAuto($source_password,$user_number);

            /*users**/
            $fields1 = array(
                'login_name' => $login_name,
                'nickname' => $nick_name,
                'password' => UserUtil::instance()->makePassword($password, $user_number),
                'user_number' => $user_number,
                'regist_time' => $regist_time,
                'is_robot' => $is_robot,
                'forbidden' => $forbidden,
                'register_type'=> $platform,
            );

            /*profile**/
            $fields2 = array(
                'gender' => 0,
                'area' => 1,
                'real_name' => '',
                'avatar' => 0,
                'coins' => 8000,
                'diamond' => 0,
                'ticket' => 0,
                'coupon' => 0,
                'seen_tutorial' => 0,
                'nick_change_times' => 0,
                'area_change_times' => 0
            );

            /*purchase_profile***/
            $fields3 = array(
                'purchase_password' => '',
                'confirmation_key' => ''
            );

            try{
                $this->db->begin();
                /*写入user**/
                if (!$userModel->saveUser($fields1))
                    throw new \Exception(Error::DATA_WRITE_ERROR);
                $uid = $this->db->insert_id();
                $fields1['uid'] = $uid;

                /*写入profile**/
                $fields2['user_id'] = $uid;
                if (!ProfileModel::instance()->saveProfile($fields2))
                    throw new \Exception(Error::DATA_WRITE_ERROR);


                /*写入purchase_profile**/
                $fields3['user_id'] = $uid;
                if(!PurchaseProfileModel::instance()->saveProfile($fields3))
                    throw new \Exception(Error::DATA_WRITE_ERROR);

                $this->db->commit();

                DataUtil::instance()->doAfterRegister($platform,$uid);

                $expire_time = $this->config->common['cookie']['timeout'];
                $user = array('login_name'=>$login_name,'user_number'=>$user_number,'uid'=>$uid);
                $session_key = UserUtil::instance()->createSessionId($expire_time,$user);

                $response = array(
                    'session_name' => 'sessionid',
                    'session_key' => $session_key,
                    'user_number' => $user_number,
                    'resource_uri' => '/user/info',
                    'password' => $source_password
                );
                $response = Tools::std_array_format($response);
                $this->anyResponse($anySdk,$response);
            }catch (\Exception $e){
                $this->db->rollback();
                $this->anyResponse($anySdk,null,$e->getMessage());
            }
        }
    }


    function payback(){
        $params = $this->input->post();
        $sign = $params['sign'];
        foreach($params as $k => $v){
            if($v == '')
                unset($params[$k]);
        }
        //sign 不参与签名
        unset($params['sign']);
        //数组按key升序排序
        ksort($params);
        //将数组中的值不加任何分隔符合并成字符串
        $string = implode('', $params);
        //做一次md5并转换成小写，末尾追加游戏的privateKey，最后再次做md5并转换成小写
        $mysign = strtolower(md5(strtolower(md5($string)) . $this->pKey));

        if($mysign != $sign) {
            error_log('anySdk pay back sign error');
            die('ok');
        }

        $order_id = $params['private_data'];
        if(empty($order_id)){
            error_log('anySdk order_id is null');
            die('ok');
        }

        $order = PaymentOrder::instance()->getByOrderNo($order_id);
        if(false == $order){
            error_log('anySdk order_id is not exist');
            die('ok');
        }

        if(intval($params['pay_status']) == 1){
            //查询该订单信息
            try {

                $amount = $this->input->post( 'amount' );

                $this->db->begin();

                if ( intval( $order['status'] ) > 0 ) {
                    die( 'ok' );
                    //'订单已完成,非法请求';
                }

                if ( intval($order['money']) != intval($amount) )
                    throw new \Exception( 'anySdk 充值金额与订单金额不符' );

                if ( $order['pay_type'] == 0 || $order['pay_type'] == 1 )
                    $pay_amount = $this->config->web['pay_amount_ratio'];
                else
                    $pay_amount = $this->config->web['pay_amount_ratio_mobile'];

                //给用户增加资源
                $profile = ProfileModel::instance()->read( $order['user_id'] );
                $userResource = UserResource::instance( $profile );
                $userResource->add( UserResource::DIAMOND , $order['diamond'] );
                if ( !$userResource->updateResource() )
                    throw new \Exception( 'anySdk 用户资源修改失败' );

                //修改订单状态
                $fields = array(
                    'pay_at' => date( 'Y-m-d H:i:s' ) ,
                    'status' => 1
                );
                if ( !PaymentOrder::instance()->updateByOrderNo( $fields , $order_id ) )
                    throw new \Exception( '订单状态修改失败' );

                $this->db->commit();
                echo 'ok';
                //=============银行通知结束=============
                $recharge_type = Platform::instance()->getRechargeType($order_id);
                @DataUtil::instance()->doAfterRecharge($order, $recharge_type);
            } catch (\Exception $e) {
                error_log($e->getMessage());
                $this->db->rollback();
                die( 'failed' );
            }
        }else{
            error_log('anySdk pay failed');
            die('ok');
        }
    }


}