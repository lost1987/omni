<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/20
 * Time: 上午9:25
 * 用户相关API
 */

namespace api\controller;


use core\Baseapi;
use api\libs\Error;
use utils\Das;
use utils\Tools;
use web\libs\UserUtil;
use web\model\FeedBackModel;
use web\model\GameSummaryModel;
use web\model\IndexHandleResultModel;
use web\model\ProfileModel;
use web\model\PurchaseProfileModel;
use web\model\SessionModel;
use web\model\UserModel;

/**
 * 用户相关的接口类
 * Class User
 * @package api\controller
 */
class User extends Baseapi{

    /**
     * 用户登陆
     */
    function login(){
            $third_login_name = $this->input->post('third_login_name');
            //MD5后的密码
            $third_password = $this->input->post('third_password');

            //检测登陆用户名是否正确
            $user = UserModel::instance()->getUserByLoginName($third_login_name);
            if(false == $user)
                $this->response(null,Error::USER_NOT_EXSIT);

            if(!UserUtil::instance()->is_password_valid($third_password,$user['password'],$user['user_number']))
                $this->response(null,Error::PASSWORD_INVALID);

            Das::instance(Das::PLATFORM_MOBILE,10001,$user['uid'])->send(array('login'=>1),Das::LOGIN_COUNT | Das::LOGIN_NUM);
            $expire_time = $this->config->common['cookie']['timeout'];
            $session_key = UserUtil::instance()->createSessionId($expire_time,$user);
            $response = array(
                'session_name' => 'sessionid',
                'session_key' => $session_key,
                'user_number' => $user['user_number'],
                'resource_uri' => '/user/info'
            );
            $response = Tools::std_array_format($response);
            $this->response($response);
    }

    /**
     * 用户注册
     */
    function  register(){
            $quick_register =  $this->args[0];
            $userModel = UserModel::instance();
            $user_number = $userModel->getMaxUserNumber() + 1;
            if($quick_register == 'quick'){//快速注册
                $login_name = 'quick'.uniqid();
                $nickname = UserUtil::instance()->randomName();
                while(1){
                    if(!UserModel::instance()->isNickNameExsit($nickname))
                        break;
                    $nickname = UserUtil::instance()->randomName();
                }
                $source_password = UserUtil::instance()->makeSourcePasswordByLoginName($login_name,8);
                $password = UserUtil::instance()->makePasswordAuto($source_password,$user_number);
                $email = '';
                $mobile = 0;
                $isrobot = 0;
                $register_time = intval(date('YmdHis'));
                $gender = 0;
                $area = 1;

            }else{//正常注册
                $login_name = $this->input->post('login_name');
                $nickname = $this->input->post('nickname');
                $password = $this->input->post('password');
                $password1 = $this->input->post('password1');
                $email = $this->input->post('email');
                $mobile = empty($_POST['mobile']) ? 0 : $this->input->post('mobile');
                $isrobot = 0;
                $register_time = intval(date('YmdHis'));
                $gender = $this->input->post('gender');
                $area = $this->input->post('area');

                $error = 0;
                if(UserModel::instance()->getUserByLoginName($login_name))
                        $this->response(array('login_name'),Error::FIELD_VALUE_ALREALLY_EXSITS);
                $error_field = array();
                if (strlen($login_name) < 4 || strlen($login_name) > 16) {
                    $error = Error::FORM_STRING_FORMAT;
                    $error_field['login_name'] = $login_name;
                }

                if (Tools::strlen_ex($nickname) < 3 || Tools::strlen_ex($nickname) > 8) {
                    $error = Error::FORM_STRING_FORMAT;
                    $error_field['nickname'] = $nickname;
                }

                if (strlen($password) != 32) {//已转为MD5
                    $error = Error::FORM_STRING_FORMAT;
                    $error_field['password'] = $password;
                }

                if($password != $password1){
                    $error = Error::FORM_STRING_FORMAT;
                    $error_field['password1'] = $password1;
                }

                if (!Tools::isValidEmail($email)) {
                    $error = Error::FORM_STRING_FORMAT;
                    $error_field['email'] = $email;
                }


                if(!Tools::is_mobile($mobile) && $mobile!=0){
                    $error = Error::FORM_STRING_FORMAT;
                    $error_field['mobile'] = $mobile;
                }

                if ($error == Error::FORM_STRING_FORMAT)
                    $this->response($error_field,$error);

                $password = UserUtil::instance()->makePassword($password,$user_number);
            }

            /*users**/
            $fields1 = array(
                'login_name' => $login_name,
                'nickname' => $nickname,
                'password' => $password,
                'email' => '',
                'mobile' => $mobile,
                'user_number' => $user_number,
                'regist_time' => $register_time,
                'is_robot' => $isrobot,
                'forbidden' => 0
            );

            /*profile**/
            $fields2 = array(
                'gender' => $gender,
                'area' => $area,
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

                Das::instance(Das::PLATFORM_MOBILE,10001,$uid)->send(array('register'=>1),Das::REGISTER_NUM);
                $expire_time = $this->config->common['cookie']['timeout'];
                $user = array('login_name'=>$login_name,'user_number'=>$user_number);
                $session_key = UserUtil::instance()->createSessionId($expire_time,$user);

                $response = array(
                    'session_name' => 'sessionid',
                    'session_key' => $session_key,
                    'user_number' => $user_number,
                    'resource_uri' => '/user/info'
                );

                if($quick_register == 'quick') {
                    $response['login_name'] = $login_name;
                    $response['password'] = $source_password;
                }

                $response = Tools::std_array_format($response);
                $this->response($response);
            }catch (\Exception $e){
                $this->db->rollback();
                $this->response(null,$e->getMessage());
            }
    }

    /**
     * 第三方注册接口
     * @param $fast_register_params
     */
    function third_register(){
            $third_account_name = $this->input->post('third_account_name'); //第三方登陆名或ID
            $third_prefix = $this->input->post('third_prefix');//第三方用户前缀标示
            $login_name  = $third_prefix.'_'.$third_account_name;
            $nick_name = UserUtil::instance()->randomName();
            while(1){
                if(!UserModel::instance()->isNickNameExsit($nick_name))
                    break;
                $nick_name = UserUtil::instance()->randomName();
            }
            $forbidden = 0;
            $regist_time = date('YmdHis');
            $mobile = 0;
            $is_robot = 0;

            $userModel = UserModel::instance();
            $user = $userModel->getUserByLoginName($login_name);
            if($user){
                $expire_time = $this->config->common['cookie']['timeout'];
                $session_key = UserUtil::instance()->createSessionId($expire_time,$user);
                $response = array(
                    'session_name' => 'sessionid',
                    'session_key' => $session_key,
                    'user_number' => $user['user_number'],
                    'resource_uri' => '/user/info'
                );
                $response = Tools::std_array_format($response);
                $this->response($response);

            }else{

                $user_number = $userModel->getMaxUserNumber() + 1;
                $source_password = UserUtil::instance()->makeSourcePasswordByLoginName($login_name,8);
                $password = UserUtil::instance()->makePasswordAuto($source_password,$user_number);

                /*users**/
                $fields1 = array(
                    'login_name' => $login_name,
                    'nickname' => $nick_name == null ? $this->randomName() : $nick_name,
                    'password' => UserUtil::instance()->makePassword($password, $user_number),
                    'email' => '',
                    'mobile' => $mobile,
                    'user_number' => $user_number,
                    'regist_time' => $regist_time,
                    'is_robot' => $is_robot,
                    'forbidden' => $forbidden
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
                    Das::instance(Das::PLATFORM_MOBILE,10001,$uid)->send(array('register'=>1),Das::REGISTER_NUM);
                    $expire_time = $this->config->common['cookie']['timeout'];
                    $user = array('login_name'=>$login_name,'user_number'=>$user_number);
                    $session_key = UserUtil::instance()->createSessionId($expire_time,$user);

                    $response = array(
                        'session_name' => 'sessionid',
                        'session_key' => $session_key,
                        'user_number' => $user_number,
                        'resource_uri' => '/user/info',
                        'password' => $source_password
                    );
                    $response = Tools::std_array_format($response);
                    $this->response($response);
                }catch (\Exception $e){
                    $this->db->rollback();
                    $this->response(null,$e->getMessage());
                }


            }
    }

    /**
     * 用户变更邮箱
     */
    function change_email(){
            $session = $this->check_session($_COOKIE['sessionid']);
            if(!$session)
                    $this->response(null,Error::USER_NOT_LOGIN);

            $uid = $session['uid'];
            $email = $this->input->post('email');
            //检查邮箱是否符合规范
            if(!Tools::isValidEmail($email))
                    $this->response(null,Error::FORM_STRING_FORMAT);

            //检查邮箱是否被使用?
            if(UserModel::instance()->isEmailExsit($email))
                    $this->response(null,Error::FIELD_VALUE_ALREALLY_EXSITS);

            $fields = array('email' => $email);
            if(!UserModel::instance()->updateUser($fields,$uid))
                    $this->response(null,Error::DATA_WRITE_ERROR);
            $this->response($email);
    }

    /**
     * 用户变更区域
     */
    function change_area(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $uid = $session['uid'];
        $area_index = $this->input->post('area');
        $area = $this->config->web['areas'][$area_index];
        $fields = array('area' => $area_index);
        if(!ProfileModel::instance()->updateProfile($fields,$uid))
                $this->response(null,Error::DATA_WRITE_ERROR);
        $this->response($area);
    }

    /**
     * 用户变更手机号
     */
    function change_mobile(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $uid = $session['uid'];
        $mobile = $this->input->post('mobile');
        //验证手机号的规范
        if(!Tools::is_mobile($mobile))
            $this->response(null,Error::FORM_STRING_FORMAT);
        $fields = array('mobile' => $mobile);
        if(!UserModel::instance()->updateUser($fields,$uid))
            $this->response(null,Error::DATA_WRITE_ERROR);
        $this->response($mobile);
    }

    /**
     * 用户变更登陆密码
     */
    function change_password(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $uid = $session['uid'];
        $user_number = $session['user_number'];
        $old = $this->input->post('old');
        $password = $this->input->post('password');
        $password1 = $this->input->post('password1');

        if(strlen($password) != 32 || strlen($password1) != 32)
            $this->response(null,Error::FORM_STRING_FORMAT);

        if($password != $password1)
            $this->response(null,Error::STRING_CMP_ERROR);

        $mypassword = UserUtil::instance()->makePassword($old,$user_number);
        $user = UserModel::instance()->getUserByUid($uid);
        if($mypassword != $user['password'])
                $this->response(null,Error::PASSWORD_INVALID);

        $newpassword = UserUtil::instance()->makePassword($password,$user_number);
        $fields = array(
            'password' => $newpassword
        );

        if(!UserModel::instance()->updateUser($fields,$uid))
            $this->response(null,Error::DATA_WRITE_ERROR);

        $this->response(null);
    }

    /**
     * 变更交易密码
     */
    function change_purchase_pwd(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $uid = $session['uid'];
        $user_number = $session['user_number'];
        $old = $this->input->post('old');
        $password = $this->input->post('password');
        $password1 = $this->input->post('password1');

        if(strlen($password) != 32 || strlen($password1) != 32)
            $this->response(null,Error::FORM_STRING_FORMAT);

        if($password != $password1)
            $this->response(null,Error::STRING_CMP_ERROR);

        $gauth_user_profile = PurchaseProfileModel::instance()->read($uid);
        if(empty($old)){
              if(!empty($gauth_user_profile['purchase_password']))
                  $this->response(null,Error::FIELD_NULL_ERROR);
        }else{
            $mypurchase_password = UserUtil::instance()->makePassword($old,$user_number);
            if($mypurchase_password != $gauth_user_profile['purchase_password'])
                $this->response(null,Error::PASSWORD_INVALID);
        }

        $newpassword = UserUtil::instance()->makePassword($password,$user_number);
        $fields = array(
            'purchase_password' => $newpassword
        );

        if(!PurchaseProfileModel::instance()->updateProfile($fields,$uid))
            $this->response(null,Error::DATA_WRITE_ERROR);

        $this->response(null);
    }

    /**
     * 用户变更昵称
     */
    function change_nickname(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $uid = $session['uid'];
        $nickname = $this->input->post('nickname');
        //检查昵称是否符合规范
        if (Tools::strlen_ex($nickname) < 3 || Tools::strlen_ex($nickname) > 8)
            $this->response(null,Error::FORM_STRING_FORMAT);

        //检查昵称是否被使用?
        if(UserModel::instance()->isNickNameExsit($nickname))
            $this->response(null,Error::FIELD_VALUE_ALREALLY_EXSITS);

        $fields = array('nickname' => $nickname);
        if(!UserModel::instance()->updateUser($fields,$uid))
        $this->response(null,Error::DATA_WRITE_ERROR);
        $this->response($nickname);
    }

    /**
     * 修改头像
     */
    function change_avatar(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $avatar = intval($this->input->post('avatar'));

        $uid = $session['uid'];
        $profile = ProfileModel::instance()->read($uid);
        $gender = $profile['gender'];

        if(!ProfileModel::instance()->updateProfile(array('avatar'=>$avatar),$uid))
            $this->response(null,Error::DATA_WRITE_ERROR);

        $file_prefix = $gender == 0 ? 'male' : 'female';
        $url = WWW_HOST.'/img/tx/'.$file_prefix.$avatar.'.jpg';
        $msg = $gender.'_'.$avatar;

        $data = array(
            'url' => $url,
            'msg' => $msg
        );

        $this->response($data);
    }

    function info(){
        $session = $this->check_session($_COOKIE['sessionid']);
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $uid = $session['uid'];

        $sql = "SELECT login_name,mobile,nickname,user_number,email FROM users WHERE uid = ?";
        $this->db->execute($sql,array($uid));
        $user = $this->db->fetch();
        if(false ==  $user)
            $this->response(null,Error::USER_NOT_EXSIT);
        $user = Tools::std_array_format($user);

        $sql = "SELECT real_name,coins,diamond,area,gender,avatar FROM profile WHERE user_id = ?";
        $this->db->execute($sql,array($uid));
        $profile = $this->db->fetch();
        $profile = Tools::std_array_format($profile);

        $sql = "SELECT purchase_password FROM gauth_purchaseprofile WHERE user_id = ?";
        $this->db->execute($sql,array($uid));
        $purchase_profile = $this->db->fetch();
        $profile['purchase_password'] = $purchase_profile['purchase_password'];
        unset($purchase_profile);

        $profile['purchase_password'] = empty($profile['purchase_password']) ? 0 : 1;
        $profile['area'] = $this->config->web['areas'][$profile['area']];
        $profile['avatar'] = $profile['gender'].'_'.$profile['avatar'];
        $user['shiming'] = empty($profile['real_name']) ? 1 : 0;//是否需要填写真实姓名
        unset($profile['real_name']);

        //取缓存数据
        $user_cache = UserModel::instance()->getGlobalCache('global',$user['user_number']);
        $game_summary = GameSummaryModel::instance()->read($uid);
        if(false == $game_summary){
            $game_summary['id'] = 0;
            $game_summary['wins'] = 0;
            $game_summary['fengs'] = 0;
            $game_summary['total'] = 0;
            $game_summary['littlewin'] = 0;
            $game_summary['allwind'] = 0;
            $game_summary['all258'] = 0;
            $game_summary['allonesuite'] = 0;
            $game_summary['alltriples'] = 0;
            $game_summary['allothers'] = 0;
            $game_summary['lastdrawablecard'] = 0;
            $game_summary['quadruplerobbery'] = 0;
            $game_summary['winquadruplecard'] = 0;
            $game_summary['topgold'] = 0;
            $game_summary['topdiamond'] = 0;
            $game_summary['fangchong'] = 0;
            $game_summary['zimo'] = 0;
            $game_summary['baohu'] = 0;
        }else{
            unset($game_summary['player_id'],$game_summary['last_refresh_time']);
        }
        $game_summary['coins_rank'] = empty($user_cache['coins_rank']) ? 0 : $user_cache['coins_rank'];
        $game_summary['win_rank'] = empty($user_cache['win_rank']) ? 0 :  $user_cache['win_rank'];
        $game_summary['win_rate_rank'] = empty($user_cache['win_rate_rank']) ? 0 : $user_cache['win_rate_rank'];
        $game_summary = Tools::std_array_format($game_summary);

        $user['game_summary'] = $game_summary;
        $user['profile'] = $profile;

        $this->response($user);
    }
}