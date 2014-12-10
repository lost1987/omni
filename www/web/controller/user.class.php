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
use core\Encoder;
use core\Redirect;
use utils\Das;
use utils\Email;
use utils\Page;
use utils\StreamImage;
use web\libs\Error;
use web\libs\Helper;
use web\libs\UserUtil;
use web\model\FeedBackModel;
use web\model\IndexHandleResultModel;
use web\model\ProductOrderModel;
use web\model\ProfileModel;
use web\model\PurchaseProfileModel;
use web\model\SessionModel;
use web\model\StoreProductsModel;
use web\model\UserMessageModel;
use web\model\UserModel;
use web\model\GameSummaryModel;
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

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $auto_login = $this->input->post('auto_login');
        $game_login = $this->input->post('game_login');
        $redirect = Redirect::instance();

        $errcode = 0;

        if (!empty($username)
            && !empty($password)
            && strlen($username) >= 4
            && strlen($username) <= 18
            && strlen($password) == 32
        ) {
            $user = UserModel::instance()->getUserByLoginName($username);
            if (false == $user) {
                $errcode = Error::ERROR_NO_USER;
                //用户名不存在
                if(!$game_login)
                    $redirect->addGetParam('code', $errcode)->forward();
                else
                    $redirect->forward('/game/index/'.$errcode);
            }

            if (UserUtil::instance()->is_password_valid($password, $user['password'], $user['user_number'])) {
                Das::instance(Das::PLATFORM_WEB,10001,$user['uid'])->send(array('login'=>1),Das::LOGIN_COUNT | Das::LOGIN_NUM);
                /*处理COOKIE**/
                $cookie = Cookie::instance();
                if ($auto_login == 1)
                    $expire_time = 30 * 24 * 3600;
                else
                    $expire_time = $this->config->common['cookie']['timeout'];

                $cookie->set_timeout($expire_time);
                UserUtil::instance()->createSessionId($expire_time,$user);
                $profile = ProfileModel::instance()->read($user['uid']);
                $gamesummary = GameSummaryModel::instance()->read($user['uid']);
                $cookie_data = array_merge($user, $profile);
                if (false != $gamesummary)
                    $cookie_data = array_merge($cookie_data, $gamesummary);
                UserUtil::instance()->setUserCookie($cookie_data);
                if(!$game_login)
                    $redirect->addGetParam('code', $errcode)->forward();
                else
                    $redirect->forward('/game/enter');
            }
            //密码错误
            $errcode = Error::ERROR_LOGIN_PWD;
            if(!$game_login)
                $redirect->addGetParam('code', $errcode)->forward();
            else
                $redirect->forward('/game/index/'.$errcode);
        }
        //用户名或密码为空
        $errcode = Error::ERROR_STRING_FORMAT;
        if(!$game_login)
            $redirect->addGetParam('code', $errcode)->forward();
        else
            $redirect->forward('/game/index/'.$errcode);
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
        $this->tpl->display('signup.html', $output_data);
    }


    /**
     * 获取随机昵称 并且得到是否已存在
     * @return JSON
     */
    function getRandomName()
    {
        $this->csrf_token_validation(false);
        $result['name'] = UserUtil::instance()->randomName();
        echo Encoder::instance()->encode($result);
    }

    /**
     * 检测用户名是否存在
     */
    function checkLoginName()
    {
        $this->csrf_token_validation(false);
        $login_name = $this->input->post('login_name');
        $userModel = UserModel::instance();
        $output['exsit'] = false;
        if ($userModel->isLoginNameExsit($login_name))
            $output['exsit'] = true;

        echo Encoder::instance()->encode($output);
    }

    /**
     * 检测昵称是否已经存在
     */
    function checkNickName()
    {
        $this->csrf_token_validation(false);
        $nickname = $this->input->post('nickname');
        $userModel = UserModel::instance();
        $output['exsit'] = false;
        if ($userModel->isNickNameExsit($nickname))
            $output['exsit'] = true;

        echo Encoder::instance()->encode($output);
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
        $response['error'] = 0;
        $this->csrf_token_validation(false);
        $login_name = $this->input->post('login_name');
        $email = $this->input->post('email');

        $userModel = UserModel::instance();
        $user = $userModel->getUserByLoginName($login_name);
        if(empty($user['uid'])){
            $response['error'] = Error::ERROR_NO_USER;
            die(Encoder::instance()->encode($response));
        }

        if($user['email'] != $email){
            $response['error'] = Error::ERROR_VALIDATION_COLUMN;
            die(Encoder::instance()->encode($response));
        }

        die(Encoder::instance()->encode($response));
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
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $mobile = empty($_POST['mobile']) ? 0 : $this->input->post('mobile');
            $isrobot = 0;
            $register_time = intval(date('YmdHis'));
            $gender = $this->input->post('gender');
            $area = $this->input->post('area');

            $error = 0;
            if (strlen($login_name) < 4 || strlen($login_name) > 16)
                $error = Error::ERROR_STRING_FORMAT;

            if (Tools::strlen_ex($nickname) < 3 || Tools::strlen_ex($nickname) > 8)
                $error = Error::ERROR_STRING_FORMAT;

            if (strlen($password) != 32)//已转为MD5
                $error = Error::ERROR_STRING_FORMAT;

            if (!Tools::isValidEmail($email))
                $error = Error::ERROR_STRING_FORMAT;

            if ($error == Error::ERROR_STRING_FORMAT)
                Redirect::instance()->forward('/error/index/'.$error);

        }else{//第三方登陆接口将不验证token
            $login_name = $post_fields['login_name'];
            $nickname = $post_fields['nickname'];
            $password = $post_fields['password'];
            $email = $post_fields['email'];
            $mobile = $post_fields['mobile'];
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
            'email' => $email,
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
            Das::instance(Das::PLATFORM_WEB,10001,$uid)->send(array('register'=>1),Das::REGISTER_NUM);

            $gamesummary['wins'] = 0;
            $gamesummary['total'] = 0;
            $expire_time = $this->config->common['cookie']['timeout'];
            UserUtil::instance()->setUserCookie(array_merge($fields1, $fields2, $gamesummary));
            $user = array('login_name'=>$login_name,'user_number'=>$user_number);
            UserUtil::instance()->createSessionId($expire_time,$user);

            if(isset($game_login) && $game_login)
                Redirect::instance()->forward('/game/enter');
            else
                Redirect::instance()->forward();

        } catch (\Exception $e) {
            $this->db->rollback();
            Redirect::instance()->forward('/error/index/'.$e->getMessage());
        }

    }

    /**
     * 登出
     */
    function logout()
    {
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
          $output_data = array(
              'token' => Cookie::instance()->get_csrf_cookie()
          );
          $this->tpl->display('forget_password_1.html',$output_data);
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

        //生成下一步用户的验证key
        $key = md5($user['uid'].'#'.time());
        $user_number = $user['user_number'];

        $purchaseModel = PurchaseProfileModel::instance();
        $params  = array(
            'confirmation_key' => $key,
            'confirmation_key_created' => date('Y-m-d H:i:s')
        );

        //写入user_purchaseprofile
        if(!$purchaseModel->updateProfile($params,$user['uid']))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_DATA_WRITE);

        //发送邮件
        $config = Configure::instance()->web['email'];
        $_Email = new Email($config);
        $_Email->from($config['smtp_user'],'NewBee');
        $_Email->to($email);
        $_Email->subject('重置密码-NEWBEE');
        $_Email->message('点击重设密码<a href="'.BASE_HOST.'/user/password/3/'.$key.'/'.$user_number.'"  target="_blank">'.BASE_HOST.'/user/password/3/'.$key.'/'.$user_number.'</a>');
        $_Email->send();

        $this->tpl->display('forget_password_2.html');
    }

    /**
     * 重设密码
     */
    private function password_3()
    {
            //验证加密链接
            $confirm_key = $this->args[1];
            $user_number = $this->args[2];

            if(strlen($confirm_key) != 32 || empty($user_number))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

             $output_data = array(
                 'token' => Cookie::instance()->get_csrf_cookie(),
                 'confirm_key' => $confirm_key,
                 'unum' => $user_number
             );

            $this->tpl->display('forget_password_3.html',$output_data);
    }

    private function password_4()
    {
            $this->csrf_token_validation();

            $confirm_key = $this->input->post('confirm_key');
            $user_number = $this->input->post('unum');
            if(empty($confirm_key) || empty($user_number))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

            $password = $this->input->post('password');
            if(strlen($password) != 32)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

            //校验用户是否存在
            $user = UserModel::instance()->getUserByUserNumber($user_number);
            if(empty($user))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_NO_USER);

            //读取purchaseProfile
            $purchase_profile_model  = PurchaseProfileModel::instance();
            $profile = $purchase_profile_model->read($user['uid']);

            //验证时效
            $timediff = time() - strtotime($profile['confirmation_key_created']);
            $expire_time = Configure::instance()->web['email']['expire_time'];
            if($timediff > $expire_time)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_EXPIRE_TIME);

            //验证key
            if($profile['confirmation_key'] != $confirm_key)
                Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);

            $fields1 = array(
                'password' => UserUtil::instance()->makePassword($password,$user_number)
            );

            $fields2 = array(
                'confirmation_key' => '',
                'confirmation_key_created' => null
            );

            try{
                $this->db->begin();
                if(! UserModel::instance()->updateUser($fields1,$user['uid']))
                    throw new \Exception(Error::ERROR_DATA_WRITE);

                if(! PurchaseProfileModel::instance()->updateProfile($fields2,$user['uid']))
                    throw new \Exception(Error::ERROR_DATA_WRITE);

                $this->db->commit();
                $this->tpl->display('forget_password_4.html');
            }catch (\Exception $e){
                $this->db->rollback();
                Redirect::instance()->forward('/error/index/'.$e->getMessage());
            }
    }

    /**
     * 最新的获奖名单
     */
    function newlottery(){
        $this->csrf_token_validation(false);
        $productOrders = ProductOrderModel::instance()->lists_lottery(0,4);
        $userModel = UserModel::instance();
        $productModel = StoreProductsModel::instance();
        foreach($productOrders as &$order){
            $user = $userModel->getUserByUid($order['user_id']);
            $order['login_name'] = $user['nickname'].' ';
            $product = $productModel->read($order['product_id']);
            $order['product_name'] = $product['name'];
            unset($order['user_id'],$order['id'],$order['product_id']);
        }

        $this->response(0,$productOrders);
    }

    /**
     * 获取个人的私信列表
     */
    function messages(){
        UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);
        $uid = Cookie::instance()->userdata('uid');
        $pagecount = 10;
        $page = empty($this->args[0]) ? 1 : $this->args[0];
        $start  =  ($page - 1) * $pagecount ;

        $total = UserMessageModel::instance()->num_rows($uid);
        $list = UserMessageModel::instance()->lists($uid,$start,$pagecount);

        $output_data = array(
            'list' => $list,
        );

        //分页代码初始化
        $page_params = array(
            'total_rows'=> $total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/user/messages/?',  #(必须)
            'now_page'  => $page,  #(必须)
            'list_rows' => $pagecount, #(可选) 默认为15
            'li_classname'=>'active',
            'use_tag_li' => true
        );
        $pagination  = new Page($page_params);
        if($pagination->getTotalPage() > 1)
            $output_data['pagination'] =  $pagination->show(1);

        $this->tpl->display('user_message.html',$output_data);
    }

    /**
     * 将个人消息设置为只读状态[ajax]
     */
    function readMessage(){
         if(!UserUtil::instance()->isLogin())
             $this->response(Error::ERROR_NO_LOGIN);

         $msg_id = intval($this->args[0]);
         $fields = array(
             'has_read' => 1
         );

         if(!UserMessageModel::instance()->update($fields,$msg_id))
             $this->response(Error::ERROR_DATA_WRITE);
         $this->response(0);
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
            $this->response(0);
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
        $url = 'http://v.t.sina.com.cn/share/share.php?url='.BASE_HOST.'&title=新蜂武汉麻将&pic='.STATIC_HOST.'/upload/peacock/'.$image_name;
        $this->response(0,array('url'=>$url));
    }
}