<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/4
 * Time: 上午10:21
 */

namespace api\controller;

use api\libs\Error;
use core\Baseapi;
use core\Redis;
use utils\Curl;
use utils\Email;
use utils\Tools;
use common\Platform;
use web\libs\Sms;
use web\libs\UserUtil;
use web\model\ProfileModel;
use web\model\UserAuthModel;
use web\model\UserModel;

class UserAuth extends Baseapi{

    /**
     * 认证
     */
    function auth(){
        $session = $this->check_session($this->input->post('sessionid'));
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $auth_type = $this->input->post('t');
        $uid = $session['uid'];

        switch($auth_type){
            case UserUtil::USER_AUTH_IDCARD ://身份证认证
                $this->idCardAuth($uid);
                break;
            case UserUtil::USER_AUTH_MAIL ://邮箱认证
                $this->mailAuth($uid);
                break;
            case UserUtil::USER_AUTH_SMS ://短信认证
                $this->smsAuth($uid);
                break;
            default:
                $this->response(null,Error::AUTH_TYPE_ERROR);
        }

    }

    /**
     * 身份证认证
     * @param $uid
     */
    private function idCardAuth($uid){
        $realName = $this->input->post('name');
        $idCard = $this->input->post('cardNo');

        $auth = UserUtil::instance()->get_auth($uid);
        if ($auth[UserUtil::USER_AUTH_IDCARD])
            $this->response(null,Error::AUTH_ALREADY_ERROR);

        if (empty($realName))
            $this->response(null,Error::ARGUMENTS_VALUE_ERROR);

        if(!Tools::is_chinese($realName))
            $this->response(null,Error::ARGUMENTS_VALUE_ERROR);

        if(strlen($realName) < 6 && strlen($realName) >15)
            $this->response(null,Error::ARGUMENTS_VALUE_ERROR);

        if (!Tools::is_valid_idCard($idCard))
            $this->response(null,Error::ARGUMENTS_VALUE_ERROR);

        //检查该身份证是否被认证
        $userTemp  =  UserModel::instance()->getUserByIDCard($idCard);
        if($userTemp)
            $this->response(null,Error::AUTH_ALREADY_ERROR);

        unset($userTemp,$authTemp);

        try{
                $this->db->begin();
                $user = UserModel::instance()->getUserByUid($uid);
                if(false == $user)
                    throw new \Exception(Error::USER_NOT_EXSIT);

                $fields = array(
                    'id_card' => $idCard
                );
                if(!UserModel::instance()->updateUser($fields,$uid))
                    throw new \Exception(Error::DATA_WRITE_ERROR);

                $fields = array(
                    'real_name' => $realName
                );
                if(!ProfileModel::instance()->updateProfile($fields,$uid))
                    throw new \Exception(Error::DATA_WRITE_ERROR);

                if(!UserAuthModel::instance()->save($uid,UserUtil::USER_AUTH_IDCARD))
                    throw new \Exception(Error::DATA_WRITE_ERROR);

                $this->db->commit();
                $this->response(null,0,false);
        }catch (\Exception $e){
                $this->db->rollback();
                $this->response(null,$e->getMessage());
        }
        $c = new Curl();
        $c -> setOpt(CURLOPT_CONNECTTIMEOUT,2);
        $c ->get($this->config->common['http_monitor'].'/identitiy-changed?type=id&opt=bind&uid='.$uid);
        $c -> close();
        if($c -> error)
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'CURL通知游戏服务器绑定身份证失败');
    }


    /**
     * 短信验证码
     */
    function smsCode(){
        $session = $this->check_session($this->input->post('sessionid'));
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);
        $uid = $session['uid'];

        $mobile = $this->input->post('mobile');
        if(false == $mobile)
            $this->response(null,Error::ARGUMENTS_VALUE_ERROR);

        if(!Tools::is_mobile($mobile))
            $this->response(null,Error::FORM_STRING_FORMAT);

        //检查手机号是否已经被认证
        $userTemp = UserModel::instance()->getUserByMobile($mobile);
        if($userTemp)
            $this->response(null,Error::AUTH_ALREADY_ERROR);

        //存储验证码到reids
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        $redis->select(2);

        $rkey = Sms::instance()->getRedisKey($uid,'mobile');
        //判断短信是否在限制发送时间内
        $reidSms = $redis->hGetAll($rkey);
        if(!empty($reidSms['sms_code'])){
            if ( time() - intval($reidSms['create_time']) <= Sms::SMS_SEND_TICKET){
                $this->response(null,Error::AUTH_SMS_IN_SEND_LIMIT);
            }
        }

        $code = Sms::instance()->createCode();
        $content = '您的验证码是：【'.$code.'】，请不要把验证码泄露给其他人。如非本人操作，请忽略本条短信。(5分钟内有效，过后请重新获取）';
        if(Sms::instance()->sendGet($content,$mobile)) {
            $list = array(
                'create_time' => time(),
                'sms_code' => $code,
                'mobile' => $mobile
            );
            if(!$redis->hMset($rkey,$list))
                $this->response(null,Error::REDIS_HSET_ERROR);
            $redis->expire($rkey,Sms::SMS_EXPIRE_TIME);
            $redis->close();
            $this->response( null );
        }
        $this->response(null,Error::AUTH_SMS_SEND_FAILED);
    }

    //短信认证
    private function smsAuth($uid){
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        $redis->select(2);

        $sms_code = $this->input->post('sms_code');
        if(empty($sms_code))
            $this->response(null,Error::ARGUMENTS_VALUE_ERROR);

        $rkey = Sms::instance()->getRedisKey($uid,'mobile');
        //判断是否过期
        $sms = $redis->hGetAll($rkey);
        if(empty($sms['sms_code']))
            $this->response(null,Error::AUTH_SMS_EXPIRED);

        if(strcmp($sms['sms_code'],$sms_code) !== 0)
            $this->response(null,Error::AUTH_SMS_CODE_ERROR);

        //检查手机号是否已经被认证
        $mobile = $sms['mobile'];
        $userTemp = UserModel::instance()->getUserByMobile($mobile);
        if($userTemp)
            $this->response(null,Error::AUTH_ALREADY_ERROR);


        try{
            $this->db->begin();

            $user = UserModel::instance()->getUserByUid($uid);
            if (false == $user)
                throw new \Exception(Error::USER_NOT_EXSIT);

            $fields = array(
                'mobile' => $mobile
            );
            if(!UserModel::instance()->updateUser($fields,$uid))
                throw new \Exception(Error::DATA_WRITE_ERROR);

            //检查该用户是否已经认证了手机号  如果认证了 则报错
            $userAuth = UserAuthModel::instance()->read($uid,UserUtil::USER_AUTH_SMS);
            if(false == $userAuth){
                if(!UserAuthModel::instance()->save($uid,UserUtil::USER_AUTH_SMS))
                    throw new \Exception(Error::DATA_WRITE_ERROR);
            }else{
                throw new \Exception(Error::AUTH_ALREADY_ERROR);
            }

            if($user['register_type'] != Platform::CLIENT_ORIGIN_MOBILE &&
               $user['register_type'] != Platform::CLIENT_ORIGIN_WEB){
                //重置用户密码并且发送密码
                $sourcePasswd  = substr(uniqid(),0,6);
                $newPasswd = UserUtil::instance()->makePassword(md5($sourcePasswd),$user['user_number']);
                $fields = array(
                    'password' => $newPasswd
                );
                if(!UserModel::instance()->updateUser($fields,$uid))
                        throw new \Exception(Error::DATA_WRITE_ERROR);

                $content = '您的手机号已完成认证，现在可以直接登陆www.16youxi.com开始游戏了（用户名：'.$mobile.'，密码：'.$sourcePasswd.'）';
                Sms::instance()->sendGet($content,$mobile);
            }
            $this->db->commit();
            $data = array(
                'mobile' => Tools::entry_string($mobile,'*')
            );
            $this->response($data,0,false);
        }catch (\Exception $e){
            $this->db->rollback();
            $this->response(null,$e->getMessage());
        }
        $c = new Curl();
        $c -> setOpt(CURLOPT_CONNECTTIMEOUT,2);
        $c ->get($this->config->common['http_monitor'].'/identitiy-changed?type=mobile&opt=bind&uid='.$uid);
        $c -> close();
        if($c -> error)
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'CURL通知游戏服务器绑定手机失败');
    }

    /**
     * 邮箱认证
     * @param $uid
     */
    private function mailAuth($uid){
        $mail = $this->input->post('mail');
        if(!Tools::isValidEmail($mail))
            $this->response(null,Error::FORM_STRING_FORMAT);

        //检查邮箱是否已经被其他人认证过被占用
        $userTemp = UserModel::instance()->getUserByMail($mail);
        if($userTemp)
            $this->response(null,Error::AUTH_ALREADY_ERROR);

        $user = UserModel::instance()->getUserByUid($uid);
        if (false == $user)
            $this->response(null,Error::USER_NOT_EXSIT);

        $sessionid = $this->input->post('sessionid');
        $params = array(
            'email'=>$mail,
            'sessionid' => $sessionid,
            'sign' => md5($sessionid.$mail.$this->config->web['entry_key'])
        );
        $url = WWW_HOST.'/user/mailAuth/?'.http_build_query($params);

        //发送邮件
        $config = $this->config->web['email'];
        $_Email = new Email($config);
        $_Email->from($config['smtp_user'],'新蜂武汉麻将');
        $_Email->to($mail);
        $_Email->subject('[新蜂武汉麻将]请激活您的邮箱!');
        $_Email->message('你好，'.$user['nickname'].'，请点击以下链接激活你的登录邮箱(激活后,可使用该邮箱找回消费密码,也可使用该邮箱及原登录密码登录游戏)：<br/><a href="'.$url.'" target="_blank">'.$url.'</a>(如果不能单击链接，请复制并粘帖到浏览器地址栏）');
        $_Email->send();
        $this->response(null);
    }


    /**
     * 解除邮箱认证
     */
    function mailUnAuth(){
        $session = $this->check_session($this->input->post('sessionid'));
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $mail = $this->input->post('mail');
        if(!Tools::isValidEmail($mail))
            $this->response(null,Error::FORM_STRING_FORMAT);

        $uid  = $session['uid'];
        $user = UserModel::instance()->getUserByUid($uid);
        if(strcmp($user['email'],$mail) !== 0)
            $this->response(null,Error::UN_AUTH_MAIL_NO_MATCH);

        if(!isset($_POST['no_unauth'])) {
            try {
                $this->db->begin();
                if ( !UserAuthModel::instance()->del( $uid , UserUtil::USER_AUTH_MAIL ) )
                    $this->response( null , Error::DATA_WRITE_ERROR );

                $fields = array(
                    'email' => null
                );
                if ( !UserModel::instance()->updateUser( $fields , $uid ) )
                    throw new \Exception( Error::DATA_WRITE_ERROR );

                $this->db->commit();
            }catch (\Exception $e){
                $this->db->rollback();
                $this->response(null,$e->getMessage());
            }
        }

        $this->response(null);
    }

    /**
     * 解除手机认证
     */
    function smsUnAuth(){
        $session = $this->check_session($this->input->post('sessionid'));
        if(!$session)
            $this->response(null,Error::USER_NOT_LOGIN);

        $mobile = $this->input->post('mobile');
        if(!Tools::is_mobile($mobile))
            $this->response(null,Error::FORM_STRING_FORMAT);

        $uid  = $session['uid'];
        $user = UserModel::instance()->getUserByUid($uid);
        if(strcmp($user['mobile'],$mobile) !== 0)
            $this->response(null,Error::UN_AUTH_SMS_NO_MATCH);

        if(!isset($_POST['no_unauth'])){
            try{
                $this->db->begin();
                if(!UserAuthModel::instance()->del($uid,UserUtil::USER_AUTH_SMS))
                        throw new \Exception(Error::DATA_WRITE_ERROR);
                $fields = array(
                    'mobile' => null
                );
                if(!UserModel::instance()->updateUser($fields,$uid))
                        throw new \Exception(Error::DATA_WRITE_ERROR);

                $this->db->commit();
            }catch (\Exception $e){
                $this->db->rollback();
                $this->response(null,$e->getMessage());
            }
        }
        $this->response(null);
    }
} 