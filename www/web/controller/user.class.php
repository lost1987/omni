<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 下午5:14
 * 用户相关操作
 */

namespace web\controller;


use core\Configure;
use core\Controller;
use core\Cookie;
use core\DB;
use core\Encoder;
use core\Redirect;
use core\Redis;
use libs\badwords\BadWords;
use utils\Curl;
use utils\Email;
use utils\StreamImage;
use web\libs\DataUtil;
use web\libs\Error;
use web\libs\Helper;
use common\Platform;
use web\libs\LoginSync;
use web\libs\UserUtil;
use web\model\ArticlesModel;
use web\model\FeedBackModel;
use web\model\IndexHandleResultModel;
use web\model\ProfileModel;
use web\model\PurchaseProfileModel;
use web\model\SessionModel;
use web\model\UserAuthModel;
use web\model\UserModel;
use utils\Tools;

/**
 * 用户操作
 * Class User
 * @package web\controller
 */
class User extends Controller
{

    /**
     * 用户登录
     */
    function login()
    {
        /*验证csrf**/
        $this->csrf_token_validation();

        $username = $this->input->post('login_name');
        $password = $this->input->post('password');
        $gamelogin = !isset($_POST['game_login']) ? 0 : $this->input->post('game_login');
        $redirect = Redirect::instance();

        $errcode = 0;

        if (!empty($username)
            && !empty($password)
            && strlen($password) == 32
        ) {
            $user = UserModel::instance()->getUserByLoginName($username);
            if(false == $user){//如果用户名不存在 则尝试用手机号登录
                $user = UserModel::instance()->getUserByMobile($username);
                if(false == $user){//如果手机号登录失败 则尝试用邮箱登录
                    $user = UserModel::instance()->getUserByMail($username);
                    if(false == $user)
                            $this->loginFailed(0);
                    else{
                        //判断邮箱是否认证过
                        $auth = UserUtil::instance()->get_auth($user['uid']);
                        if (!$auth[UserUtil::USER_AUTH_MAIL])
                            $this->loginFailed(0);
                    }
                }else{
                    //判断手机号是否认证过
                    $auth = UserUtil::instance()->get_auth($user['uid']);
                    if (!$auth[UserUtil::USER_AUTH_SMS])
                        $this->loginFailed(0);
                }
            }

            if (UserUtil::instance()->is_password_valid($password, $user['password'], $user['user_number'])) {
                LoginSync::instance()->loginSuccess($user,$this->db);
                $admDB = new DB();
                $admDB->init_db_from_config('adm');
                $this->loginSync($user,$this->db,$admDB);
                if($gamelogin)
                    $redirect->addGetParam('code', $errcode)->forward('/game/enter');
                else
                    $redirect->addGetParam('code', $errcode)->forward();
            }
            //密码错误
            $errcode = Error::ERROR_LOGIN_PWD;
            if($gamelogin)
                $redirect->addGetParam('code', $errcode)->forward('/game/enter');
            else
                $redirect->addGetParam('code', $errcode)->forward();
        }
        //用户名或密码为空
        $errcode = Error::ERROR_STRING_FORMAT;
        $redirect->addGetParam('code', $errcode)->forward();
    }

    function loginWithAjax(){
        /*验证csrf**/
        $username = $this->input->post('login_name');
        $password = $this->input->post('password');
        $redirect = Redirect::instance();

        if (!empty($username)
            && !empty($password)
            && strlen($password) == 32
        ) {
            $user = UserModel::instance()->getUserByLoginName($username);
            if(false == $user){//如果用户名不存在 则尝试用手机号登录
                $user = UserModel::instance()->getUserByMobile($username);
                if(false == $user){//如果手机号登录失败 则尝试用邮箱登录
                    $user = UserModel::instance()->getUserByMail($username);
                    if(false == $user)
                        $this->response(null,Error::ERROR_NO_USER);
                    else{
                        //判断邮箱是否认证过
                        $auth = UserUtil::instance()->get_auth($user['uid']);
                        if (!$auth[UserUtil::USER_AUTH_MAIL])
                            $this->response(null,Error::ERROR_NO_USER);
                    }
                }else{
                    //判断手机号是否认证过
                    $auth = UserUtil::instance()->get_auth($user['uid']);
                    if (!$auth[UserUtil::USER_AUTH_SMS])
                        $this->response(null,Error::ERROR_NO_USER);
                }
            }

            if (UserUtil::instance()->is_password_valid($password, $user['password'], $user['user_number'])) {
                LoginSync::instance()->loginSuccess($user,$this->db);
                $admDB = new DB();
                $admDB->init_db_from_config('adm');
                $this->loginSync($user,$this->db,$admDB);
                $this->response();
            }
           $this->response(null,Error::ERROR_LOGIN_PWD);
        }
        //用户名或密码为空
        $this->response(null,Error::ERROR_LOGIN_PWD);
    }

    private function loginSync($user,$gameDB,$admDB){
        \uad\libs\LoginSync::instance()->loginSuccess($user,$gameDB,$admDB);
    }

    private function loginFailed($game_login){
        $errcode = Error::ERROR_NO_USER;
        //用户名不存在
        if(!$game_login)
            Redirect::instance()->addGetParam('code', $errcode)->forward();
        else
            Redirect::instance()->forward('/game/index/'.$errcode);
        exit;
    }


    /**
     * 跳转到注册页面
     */
    function signup()
    {
        $areas = Configure::instance()->web['areas'];

        $output_data = array(
            'csrf_token' => Cookie::instance()->get_csrf_cookie(),
            'areas' => $areas,
            'navigator' => Helper::getControllerName(__NAMESPACE__, __CLASS__)
        );
        $this->tpl->display('signin.html', $output_data);
    }


    /**
     * 获取随机昵称 并且得到是否已存在
     * @return JSON
     */
    function getRandomName()
    {
        $this->csrf_token_validation(false);
        $result['name'] = UserUtil::instance()->randomName();
        $this->response($result);
    }

    /**
     * 检测用户名是否存在
     */
    function checkLoginName()
    {
        $this->csrf_token_validation(false);
        $login_name = $this->input->post('login_name');
        $userModel = UserModel::instance();
        $noExsit = true;
        if ($userModel->isLoginNameExsit($login_name) || !BadWords::instance()->checkBadUserName($login_name))
            $noExsit = false;

        if($noExsit)
            echo 'true';
        else
            echo 'false';
    }

    /**
     * 检测昵称是否已经存在
     */
    function checkNickName()
    {
        $this->csrf_token_validation(false);
        $nickname = $this->input->post('nickname');
        $userModel = UserModel::instance();
        $noExsit = true;
        if ($userModel->isNickNameExsit($nickname) || !BadWords::instance()->checkBadWords($nickname) || !BadWords::instance()->checkBadUserName($nickname))
            $noExsit = false;

        if($noExsit)
            echo 'true';
        else
            echo 'false';
    }

    /**
     * 检测邮箱是否被占用
     */
    function checkEmail()
    {
        $this->csrf_token_validation(false);
        $email = $this->input->post('email');
        $userModel = UserModel::instance();
        $output['exsit'] = false;
        if ($userModel->isEmailExsit($email))
            $output['exsit'] = true;
        echo Encoder::instance()->encode($output);
    }

    /***
     * 找回密码流程 检测用户名和邮件是否匹配
     */
    function checkForgetPassword(){
        $this->csrf_token_validation(false);
        $login_name = $this->input->post('login_name');
        $email = $this->input->post('email');

        $userModel = UserModel::instance();
        $user = $userModel->getUserByLoginName($login_name);
        if(empty($user['uid']))
            die('false');

        if($user['email'] != $email)
            die('false');

        die('true');
    }


    /**
     * 用户注册
     * @param null $post_fields 内部调用提供的参数 表单提交无此参数
     */
    function register($post_fields=null)
    {
        /*验证CSRF**/
        $token = empty($post_fields['token']) ? null : $post_fields['token'];
        $this->csrf_token_validation(true,$token);

        //获取参数
        if($post_fields === null) {
            $login_name = $this->input->post('login_name');
            $nickname = $this->input->post('nickname');
            $password = $this->input->post('hid_password');
            $isrobot = 0;
            $register_time = intval(date('YmdHis'));
            $gender = $this->input->post('gender');
            $area = $this->input->post('area');

            $error = 0;
            if (strlen($login_name) < 4 || strlen($login_name) > 16 || preg_match('/^test(.*)/i',$login_name))
                $error = Error::ERROR_STRING_FORMAT;

            if (Tools::strlen_ex($nickname) < 3 || Tools::strlen_ex($nickname) > 8 || preg_match('/^test(.*)/i',$nickname))
                $error = Error::ERROR_STRING_FORMAT;

            if (strlen($password) != 32)//已转为MD5
                $error = Error::ERROR_STRING_FORMAT;

            if ($error == Error::ERROR_STRING_FORMAT)
                Redirect::instance()->forward('/error/index/'.$error);

        }else{//第三方登陆接口将不验证token
            $login_name = $post_fields['login_name'];
            $nickname = $post_fields['nickname'];
            $password = $post_fields['password'];
            $isrobot = $post_fields['is_robot'];
            $register_time = $post_fields['regist_time'];
            $gender =  0;
            $area = 1;
            $game_login = $post_fields['game_login'];
        }

        $userModel = UserModel::instance();
        $user_number = $userModel->getMaxUserNumber() + 1;

        /*users**/
        $fields1 = array(
            'login_name' => $login_name,
            'nickname' => $nickname,
            'password' => UserUtil::instance()->makePassword($password, $user_number),
            'user_number' => $user_number,
            'regist_time' => $register_time,
            'is_robot' => $isrobot,
            'forbidden' => 0,
            'register_type'=>Platform::CLIENT_ORIGIN_WEB,
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

        try {
            $this->db->begin();
            /*写入user**/
            if (!$userModel->saveUser($fields1))
                throw new \Exception(Error::ERROR_DATA_WRITE);
            $uid = $this->db->insert_id();
            $fields1['uid'] = $uid;

            /*写入profile**/
            $fields2['user_id'] = $uid;
            if (!ProfileModel::instance()->saveProfile($fields2))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            /*写入purchase_profile**/
            $fields3['user_id'] = $uid;
            if(!PurchaseProfileModel::instance()->saveProfile($fields3))
                throw new \Exception(Error::ERROR_DATA_WRITE);
            $this->db->commit();

            DataUtil::instance()->doAfterRegister(Platform::CLIENT_ORIGIN_WEB,$uid);
            $gamesummary['wins'] = 0;
            $gamesummary['total'] = 0;
            $expire_time = $this->config->common['cookie']['timeout'];
            UserUtil::instance()->setUserCookie(array_merge($fields1, $fields2, $gamesummary));
            $user = array('login_name'=>$login_name,'user_number'=>$user_number,'uid'=>$uid);
            UserUtil::instance()->createSessionId($expire_time,$user);

            if(isset($game_login) && $game_login)
                Redirect::instance()->forward('/game/enter');
            else
                Redirect::instance()->forward();

        } catch (\Exception $e) {
            $this->db->rollback();
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'注册出错',$e);
            Redirect::instance()->forward('/error/index/'.$e->getMessage());
        }

    }

    /**
     * 登出
     */
    function logout()
    {
        UserUtil::instance()->createLogoutHistory(Cookie::instance()->userdata('uid'));
        Cookie::instance()->sess_destroy();
        unset($_SESSION);
        if(isset($this->args[0])){//如果是传入args[0]则跳到args[0]指定的页面
            Redirect::instance()->forward('/'.$this->args[0]);
        }
        Redirect::instance()->forward();
    }

    /**
     * 用户服务协议
     */
    function agreement()
    {
        $this->tpl->display('agreement.html');
    }



    /**
     * 忘记密码
     */
    function password()
    {
        $step = empty($this->args[0]) ? 1 : $this->args[0];
        switch ($step) {
            case 1:
                $this->password_1();
                break;
            case 2:
                $this->password_2();
                break;
            case 3:
                $this->password_3();
                break;
            case 4:
                $this->password_4();
                break;
        }
    }


    /**
     * 跳转到表单页面
     */
    private function password_1()
    {
          $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
          $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
          $this->tpl->display('service_selfService_findPw1.html',$this->output_data);
    }

    /**
     *验证并发送给邮箱
     */
    private function password_2()
    {
        $this->csrf_token_validation();
        $login_name = $this->input->post('login_name');
        $email = $this->input->post('email');

        $userModel = UserModel::instance();
        $user = $userModel->getUserByLoginName($login_name);
        if(empty($user['uid']))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_NO_USER);

        if($user['email'] != $email)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_VALIDATION_COLUMN);

        //生成签名
        $time = time();
        $sign = UserUtil::instance()->createSecretSign($user['user_number'],$login_name,$time);
        $params = array(
            'n'=>$login_name,
            't'=>$time
        );
        $request_uri = http_build_query($params);

        //写入签名到redis
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        if(!$redis){
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'找回密码第二步无法连接redis数据库');
            Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);
        }
        $redis->select(2);
        $key = 'findPwd:mail:sign'.$login_name;
        $redis -> set($key,$sign);
        $redis->setTimeout($key,60*30);
        $redis->close();

        //发送邮件
        $config = Configure::instance()->web['email'];
        $_Email = new Email($config);
        $_Email->from($config['smtp_user'],'[新蜂武汉麻将]');
        $_Email->to($email);
        $_Email->subject('重置登录密码-[新蜂武汉麻将]');
        $_Email->message('点击重设登录密码<a href="'.BASE_HOST.'/user/password/3?'.$request_uri.'"  target="_blank">'.BASE_HOST.'/user/password/3?'.$request_uri.'</a>');
        $_Email->send();

        $this->output_data['email'] = $email;
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_findPw2.html',$this->output_data);
    }

    /**
     * 重设密码
     */
    private function password_3()
    {
            $login_name = $this->input->get('n');
            $time = $this->input->get('t');

            //校验用户是否存在
            $user = UserModel::instance()->getUserByLoginName($login_name);
            if(empty($user))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_NO_USER);

            //验证签名
            $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
            $redis = $r->getResource();
            if(!$redis){
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'找回密码第三步无法连接redis数据库');
                Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);
            }
            $redis->select(2);
            $key = 'findPwd:mail:sign'.$login_name;
            $sign = $redis -> get($key);
            $redis->close();

            if($sign == false)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_EXPIRE_TIME);

            $mySign = UserUtil::instance()->createSecretSign($user['user_number'],$login_name,$time);
            if(strcmp($sign,$mySign) !== 0)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_SIGN);


             $output_data = array(
                 'token' => Cookie::instance()->get_csrf_cookie(),
                 'n' => $login_name,
                 't' => $time,
                 'faq'=> ArticlesModel::instance()->lists(0,10,3)
             );

            $this->tpl->display('service_selfService_findPw3.html',$output_data);
    }

    private function password_4()
    {
            $this->csrf_token_validation();

            $login_name = $this->input->post('n');
            $time = $this->input->post('t');
            if(empty($login_name))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_NO_USER);

            $password = $this->input->post('hid_password');
            if(strlen($password) != 32)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

            //验证签名
            $user = UserModel::instance()->getUserByLoginName($login_name);
            $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
            $redis = $r->getResource();
            if(!$redis){
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'找回密码第四步无法连接redis数据库');
                Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);
            }
            $redis->select(2);
            $key = 'findPwd:mail:sign'.$login_name;
            $sign = $redis -> get($key);

            if($sign == false)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_EXPIRE_TIME);

            $mySign = UserUtil::instance()->createSecretSign($user['user_number'],$login_name,$time);
            if(strcmp($sign,$mySign) !== 0)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_SIGN);

            $fields = array(
                'password' => UserUtil::instance()->makePassword($password,$user['user_number'])
            );

            if(! UserModel::instance()->updateUser($fields,$user['uid']))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_DATA_WRITE);

            $redis->del($key);
            $redis->close();
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            $this->tpl->display('service_selfService_findPw4.html',$this->output_data);
    }


    function mailAuth(){
        $sessionid = $this->input->get('sessionid');
        $sign = $this->input->get('sign');
        $email = $this->input->get('email');

        //验证签名
        $mysign = md5( $sessionid.$email.$this->config->web['entry_key'] );
        if($sign != $mysign)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_SIGN);

        $session = $this->check_session($sessionid);
        if(false == $session)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_EXPIRE_TIME);

        $uid = $session['uid'];
        $user = UserModel::instance()->getUserByMail($email);
        if($user) {
            $auth = UserUtil::instance()->get_auth($uid);
            if($auth[UserUtil::USER_AUTH_MAIL])
                Redirect::instance()->forward( '/error/index/' . Error::ERROR_EMAIL_AUTH_ALREALLY );
        }
        unset($user,$auth);

        try{
            $this->db->begin();

            $fields = array(
                'email' => $email,
            );

            if (!UserModel::instance()->updateUser($fields,$uid))
                throw new \Exception(Error::ERROR_COMMON);

            $userAuth = UserAuthModel::instance()->read($uid,UserUtil::USER_AUTH_MAIL);
            if(false == $userAuth){
                if (!UserAuthModel::instance()->save($uid,UserUtil::USER_AUTH_MAIL))
                    throw new \Exception(Error::ERROR_COMMON);
            }

            $this->db->commit();
            $c = new Curl();
            $c -> setOpt(CURLOPT_CONNECTTIMEOUT,2);
            $c ->get($this->config->common['http_monitor'].'/identitiy-changed?type=email&opt=bind&uid='.$uid);
            $c -> close();
            if($c -> error)
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'CURL通知游戏服务器绑定邮箱失败');
            Redirect::instance()->forward('/userAuth/authDone/e');
        }catch (\Exception $e){
            $this->db->rollback();
            Redirect::instance()->forward('/error/index/'.$e->getMessage());
        }
    }

    /**
     * 忘记支付密码
     */
    function payPassword()
    {
        $step = empty($this->args[0]) ? 1 : $this->args[0];
        switch ($step) {
            case 1:
                $this->payPassword_1();
                break;
            case 2:
                $this->payPassword_2();
                break;
            case 3:
                $this->payPassword_3();
                break;
            case 4:
                $this->payPassword_4();
                break;
        }
    }

    /**
     * 跳转到表单页面
     */
    private function payPassword_1()
    {
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_findPayPw1.html',$this->output_data);
    }

    /**
     *验证并发送给邮箱
     */
    private function payPassword_2()
    {
        $this->csrf_token_validation();
        $login_name = $this->input->post('login_name');
        $email = $this->input->post('email');

        $userModel = UserModel::instance();
        $user = $userModel->getUserByLoginName($login_name);
        if(empty($user['uid']))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_NO_USER);

        if($user['email'] != $email)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_VALIDATION_COLUMN);

        //生成签名
        $time = time();
        $sign = UserUtil::instance()->createSecretSign($user['user_number'],$login_name,$time);
        $params = array(
            'n'=>$login_name,
            't'=>$time
        );
        $request_uri = http_build_query($params);

        //写入签名到redis
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        if(!$redis){
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'找回密码第二步无法连接redis数据库');
            Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);
        }
        $redis->select(2);
        $key = 'findPayPwd:mail:sign'.$login_name;
        $redis -> set($key,$sign);
        $redis->setTimeout($key,60*30);
        $redis->close();

        //发送邮件
        $config = Configure::instance()->web['email'];
        $_Email = new Email($config);
        $_Email->from($config['smtp_user'],'[新蜂武汉麻将]');
        $_Email->to($email);
        $_Email->subject('重置消费密码-[新蜂武汉麻将]');
        $_Email->message('点击重设消费密码<a href="'.BASE_HOST.'/user/payPassword/3?'.$request_uri.'"  target="_blank">'.BASE_HOST.'/user/payPassword/3?'.$request_uri.'</a>');
        $_Email->send();

        $this->output_data['email'] = $email;
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_findPayPw2.html',$this->output_data);
    }

    /**
     * 重设密码
     */
    private function payPassword_3()
    {
        $login_name = $this->input->get('n');
        $time = $this->input->get('t');

        //校验用户是否存在
        $user = UserModel::instance()->getUserByLoginName($login_name);
        if(empty($user))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_NO_USER);

        //验证签名
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        if(!$redis){
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'找回密码第三步无法连接redis数据库');
            Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);
        }
        $redis->select(2);
        $key = 'findPayPwd:mail:sign'.$login_name;
        $sign = $redis -> get($key);
        $redis->close();

        if($sign == false)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_EXPIRE_TIME);

        $mySign = UserUtil::instance()->createSecretSign($user['user_number'],$login_name,$time);
        if(strcmp($sign,$mySign) !== 0)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_SIGN);


        $output_data = array(
            'token' => Cookie::instance()->get_csrf_cookie(),
            'n' => $login_name,
            't' => $time,
            'faq'=> ArticlesModel::instance()->lists(0,10,3)
        );

        $this->tpl->display('service_selfService_findPayPw3.html',$output_data);
    }

    private function payPassword_4()
    {
        $this->csrf_token_validation();

        $login_name = $this->input->post('n');
        $time = $this->input->post('t');
        if(empty($login_name))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_NO_USER);

        $password = $this->input->post('hid_password');
        if(strlen($password) != 32)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

        //验证签名
        $user = UserModel::instance()->getUserByLoginName($login_name);
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        if(!$redis){
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'找回密码第四步无法连接redis数据库');
            Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);
        }
        $redis->select(2);
        $key = 'findPayPwd:mail:sign'.$login_name;
        $sign = $redis -> get($key);

        if($sign == false)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_EXPIRE_TIME);

        $mySign = UserUtil::instance()->createSecretSign($user['user_number'],$login_name,$time);
        if(strcmp($sign,$mySign) !== 0)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_SIGN);

        $fields = array(
            'purchase_password' => UserUtil::instance()->makePassword($password,$user['user_number'])
        );

        if(! PurchaseProfileModel::instance()->updateProfile($fields,$user['uid']))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_DATA_WRITE);

        $redis->del($key);
        $redis->close();
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_findPayPw4.html',$this->output_data);
    }


    /**
     * flash端提交反馈 : 默认类型游戏bug
     */
    function feedback(){
        $session_id = $this->input->post('session_id');
        $session = SessionModel::instance()->read($session_id);
        if(false == $session)
            $this->response(Error::ERROR_NO_LOGIN);

        if(strtotime($session['expire_date']) <= time())
            $this->response(Error::ERROR_EXPIRE_TIME);

        $session_data = unserialize(Tools::authcode($session['session_data'],'DECODE',$this->config->web['entry_key']));
        $content  =  $this->input->post('content');

        try{
            $this->db->begin();

            if(empty($content))
                throw new \Exception(Error::ERROR_STRING_FORMAT);

            $params = array(
                'handler_type' => 0,
                'reporter_name' => $session_data['login_name'],
                'result' => 0,
                'note' => ''
            );

            if(!IndexHandleResultModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $handler_id = $this->db->insert_id();
            $params = array(
                'type' => 0,
                'user_id'=>$session_data['uid'],
                'ip'=>Tools::getip(),
                'content'=>$content,
                'create_at'=> date('Y-m-d H:i:s'),
                'handler_id' => $handler_id
            );

            if(!FeedBackModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $this->db->commit();
            $this->response(null);
        }catch (\Exception $e){
            $this->db->rollback();
            $this->response($e->getMessage());
        }
    }

    /**
     *flash端 炫耀
     */
    function peacock()
    {
        $session_id = $this->input->get('session_id');
        $session = SessionModel::instance()->read($session_id);
        if (false == $session)
            $this->response(Error::ERROR_NO_LOGIN);

        if (strtotime($session['expire_date']) <= time())
            $this->response(Error::ERROR_EXPIRE_TIME);

        $s = StreamImage::instance(BASE_PATH.'/web/upload/peacock');
        $image_name = $s->stream2Image();
        $url = 'http://v.t.sina.com.cn/share/share.php?url='.BASE_HOST.'&title=我正在玩新蜂武汉麻将，随时约，随地搓，喜欢武汉麻将的伙伴们有福了，快来和我一起吧!&pic='.STATIC_HOST.'/upload/peacock/'.$image_name;
        $this->response(array('url'=>$url));
    }

    /**
     * 邀请码分享
     */
    function iShared(){
        $code = $this->input->get('code');
        $words = '致我亲爱的麻油们，给你送上一个开心大红包，小小现金，只为开心。我在新蜂武汉麻将等你，快来和我一起吧！（我的专属邀请码：'.$code.'）';
        $url = 'http://v.t.sina.com.cn/share/share.php?url='.BASE_HOST.'&title='.$words;
        $this->response(array('url'=>$url));
    }

}