<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-18
 * Time: 下午3:09
 * 用户个人信息相关操作
 */

namespace web\controller;

use core\Controller;
use core\Encoder;
use core\Redis;
use utils\Tools;
use web\libs\Error;
use web\libs\Helper;
use web\libs\UserUtil;
use core\Cookie;
use core\Configure;
use web\model\GameSummaryModel;
use web\model\ProductOrderModel;
use web\model\ProfileModel;
use web\model\PurchaseProfileModel;
use web\model\UserMessageModel;
use web\model\UserModel;

/**
 * 用户信息
 * Class Userinfo
 * @package web\controller
 */
class Userinfo extends  Controller{
    /**
     * 用户详细页
     */
    function index(){
        UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);

        $output_data = array();
        $uid = Cookie::instance()->userdata('uid');
        $areas = Configure::instance()->web['areas'];
        $userModel = UserModel::instance();
        $user = $userModel->getUserProfile($uid);

        $avatar_name = 'male';
        if($user['gender'] == 0){//男
            $user['gender']  = '男';
            $user['avatar_path'] = STATIC_HOST.'/img/tx/male'.($user['avatar']+1).'.jpg';
        }else{//女
            $user['gender'] = '女';
            $user['avatar_path'] = STATIC_HOST.'/img/tx/female'.($user['avatar']+1).'.jpg';
        }
        $user['area_name'] = $areas[$user['area']];
        $user['mobile'] = Tools::entry_phone($user['mobile']);

        $output_data['user'] = $user;
        $output_data['areas'] = $areas;
        $output_data['avatar_name'] = $avatar_name;

        /*读取profile数据**/
        $profile = ProfileModel::instance()->read($uid);
        $output_data['coins'] = $profile['coins'];
        $output_data['diamond'] = $profile['diamond'];


        /*读取purchaseprofile 数据***/
        $purchase = PurchaseProfileModel::instance()->read($uid);
        $output_data['is_set_purchase'] = empty($purchase['purchase_password']) ? 0 : 1;

        /*读取game sammuy**/
        $gs = GameSummaryModel::instance()->read($uid);
        //获取用户的个人排名
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r -> getResource();
        $rank = $redis->hMGet('global:rank_info:user:'.Cookie::instance()->userdata('user_number'),array('coins_rank'));

        $output_data['myrank'] = empty($rank['coins_rank']) ? '/' : $rank['coins_rank'];
        $output_data['wins'] = empty($gs['wins']) ? 0 : $gs['wins'];
        $output_data['total'] = empty($gs['total']) ? 0 : $gs['total'];
        $output_data['ratio'] = UserUtil::instance()->userRatio( $output_data['wins'], $output_data['total']);
        $output_data['jinding'] = empty($gs['goldtop']) ? 0 : $gs['goldtop'];
        $output_data['qingyise'] = empty($gs['allonesuite']) ? 0 : $gs['allonesuite'];
        $output_data['fengyise'] = empty($gs['allwind']) ? 0 : $gs['allwind'];
        $output_data['pengpenghu'] = empty($gs['alltriples']) ? 0 : $gs['alltriples'];


        /*读取私人助理 默认显示3条**/
        $userMessages = UserMessageModel::instance()->lists($uid,0,3);
        $output_data['user_messages'] = $userMessages;

        /*读取订单**/
        $orderlist = ProductOrderModel::instance()->read($uid,0,50);
        $orderstatus = Configure::instance()->web['order_status'];
        if(is_array($orderlist)){
              foreach($orderlist as &$order){
                    $order['status'] = $orderstatus[$order['result']];
              }
        }
        $output_data['orderlist'] = $orderlist;
        $output_data['csrf_token'] = Cookie::instance()->get_csrf_cookie();
        $output_data['navigator'] = Helper::getControllerName(__NAMESPACE__,__CLASS__);

        $this->tpl->display('userinfo.html',$output_data);
    }

    function updateAvatar(){
        $data['error'] = 0;
        if(!UserUtil::instance()->isLogin()){
            $data['error'] = Error::ERROR_NO_LOGIN;
            die(Encoder::instance()->encode($data));
        }

        $uid = Cookie::instance()->userdata('uid');
        $avatar = intval($this->input->post('avatar'));
        $fields = array(
            'avatar' => $avatar
        );

        if(!ProfileModel::instance()->updateProfile($fields,$uid)){
            $data['error'] = Error::ERROR_DATA_WRITE;
        }
        die(Encoder::instance()->encode($data));
    }


    function updateEmail(){
             /*
             * 0 修改成功
             * 1  邮件格式错误
             * 2 邮件地址已被注册
             * 3 登录信息过期
             * 4 网络错误
             */
            $data['error'] = 0;
            if(!UserUtil::instance()->isLogin()){
                $data['error'] = Error::ERROR_NO_LOGIN;
                die(Encoder::instance()->encode($data));
            }

            $email = $this->input->post('email');
            if(!Tools::isValidEmail($email)) {
                    $data['error'] = Error::ERROR_STRING_FORMAT;
                    die(Encoder::instance()->encode($data));
            }

            $userModel = UserModel::instance();
            if($userModel->isEmailExsit($email)){
                    $data['error'] = Error::ERROR_EXSIT;
                    die(Encoder::instance()->encode($data));
            }

            $uid = Cookie::instance()->userdata('uid');
            if(!$userModel->updateUser(array('email'=>$email),$uid)){
                    $data['error'] = Error::ERROR_DATA_WRITE;
            }
            die(Encoder::instance()->encode($data));
    }


    function updateArea(){
        $data['error'] = 0;
        if(!UserUtil::instance()->isLogin()){
            $data['error'] = Error::ERROR_NO_LOGIN;
            die(Encoder::instance()->encode($data));
        }

        $area = intval( $this->input->post('area') );
        $profileModel = ProfileModel::instance();
        $uid = Cookie::instance()->userdata('uid');
        if(!$profileModel->updateProfile(array('area'=>$area),$uid)){
            $data['error'] = Error::ERROR_DATA_WRITE;
        }
        die(Encoder::instance()->encode($data));
    }


    function updateMobile(){
        $data['coins'] = 0;
        $data['error'] = 0;
        if(!UserUtil::instance()->isLogin()){
            $data['error'] = Error::ERROR_NO_LOGIN;
            die(Encoder::instance()->encode($data));
        }
        $mobile = $this->input->post('mobile');
        $userModel = UserModel::instance();

        try{
            $this->db->begin();
            $uid = Cookie::instance()->userdata('uid');
            $user = $userModel->getUserByUid($uid);

            if($user['mobile'] == 0){
                $profile = ProfileModel::instance()->read($uid);
                $coins = intval($profile['coins'] ) + 500;
                if(!ProfileModel::instance()->updateProfile(array('coins'=>$coins),$uid))
                    throw new \Exception('update field error');
                Cookie::instance()->set_userdata('coins',$coins);
                $data['coins'] = 500;
            }

            if(!$userModel->updateUser(array('mobile'=>$mobile),$uid)){
                $data['error'] = Error::ERROR_DATA_WRITE;
                 throw new \Exception('update field error');
            }
            $this->db->commit();
            die(Encoder::instance()->encode($data));
        }catch (\Exception $e){
             $this->db->rollback();
            die(Encoder::instance()->encode($data));
        }
    }


    function updatePassword(){
        /*
            * 0 修改成功
            * 1  旧密码错误
            * 3 登录信息过期
            * 4 网络错误
            */
        $data['error'] = 0;
        if(!UserUtil::instance()->isLogin()){
            $data['error'] = Error::ERROR_NO_LOGIN;
            die(Encoder::instance()->encode($data));
        }

        $old_pass = $this->input->post('old_pass');
        $new_pass= $this->input->post('new_pass');

        $uid = Cookie::instance()->userdata('uid');
        $userModel = UserModel::instance();
        $user = $userModel->getUserByUid($uid);

        if( !UserUtil::instance()->is_password_valid($old_pass,$user['password'],$user['user_number']) ){
            $data['error'] = Error::ERROR_LOGIN_PWD;
            die(Encoder::instance()->encode($data));
        }

        $new_pass = UserUtil::instance()->makePassword($new_pass,$user['user_number']);

        if(!$userModel->updateUser(array('password'=>$new_pass),$uid)){
            $data['error'] = Error::ERROR_DATA_WRITE;
        }
        die(Encoder::instance()->encode($data));
    }


    function updatePurchase(){
        /*
                    * 0 修改成功
                    * 1  旧密码错误
                    * 3 登录信息过期
                    * 4 网络错误
                    */
        $data['error'] = 0;
        if(!UserUtil::instance()->isLogin()){
            $data['error'] = Error::ERROR_NO_LOGIN;
            die(Encoder::instance()->encode($data));
        }

        $old_pass = $this->input->post('old_pass');
        $new_pass= $this->input->post('new_pass');

        $uid = Cookie::instance()->userdata('uid');
        $userModel = UserModel::instance();
        $user = $userModel->getUserByUid($uid);
        $purchaseModel = PurchaseProfileModel::instance();
        $purchase = $purchaseModel->read($uid);

        if(!UserUtil::instance()->is_purchase_password_valid($purchase['purchase_password'],$old_pass,$user['user_number'])){
            $data['error'] = Error::ERROR_PURCHASE_PWD;
            die(Encoder::instance()->encode($data));
        }

        $new_pass = UserUtil::instance()->makePassword($new_pass,$user['user_number']);

        if(!$purchaseModel->updateProfile(array('purchase_password'=>$new_pass),$uid)){
            $data['error'] = Error::ERROR_DATA_WRITE;
        }
        die(Encoder::instance()->encode($data));
    }

    function setPurchase(){
        /*
                    * 0 修改成功
                    * 1  旧密码错误
                    * 3 登录信息过期
                    * 4 网络错误
                    */
        $data['error'] = 0;
        if(!UserUtil::instance()->isLogin()){
            $data['error'] = Error::ERROR_NO_LOGIN;
            die(Encoder::instance()->encode($data));
        }

        $new_pass= $this->input->post('new_pass');

        $uid = Cookie::instance()->userdata('uid');
        $userModel = UserModel::instance();
        $user = $userModel->getUserByUid($uid);

        $new_pass = UserUtil::instance()->makePassword($new_pass,$user['user_number']);

        $model = PurchaseProfileModel::instance();
        $purchase_profile = $model->read($uid);

        if(false == $purchase_profile){//写入
            $fields = array(
                'user_id' => $uid,
                'purchase_password' => $new_pass,
                'confirmation_key' =>''
            );
            if( ! PurchaseProfileModel::instance()->saveProfile($fields) )
                $data['error'] = Error::ERROR_DATA_WRITE;

        }else{//更新
            $fields = array(
                'purchase_password' => $new_pass
            );
            if( ! PurchaseProfileModel::instance()->updateProfile($fields,$uid))
                $data['error'] = Error::ERROR_DATA_WRITE;
        }

        die(Encoder::instance()->encode($data));
    }

    /**
     * 用户订单详情
     */
    function showProductDetail(){
            $orderid = intval($this->input->post('orderid'));
            $product = ProductOrderModel::instance()->readByOrderId($orderid);
            $price_types = Configure::instance()->web['price_type'];
            $order_status = Configure::instance()->web['order_status'];
            $product['price_type'] = $price_types[ $product['price_type'] ];
            $product['status'] = $order_status[ $product['result'] ];
            $product['create_at'] = date('Y-m-d',strtotime($product['create_at']));
            echo Encoder::instance()->encode($product);
    }
}