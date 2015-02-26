<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 上午10:06
 * 用户相关工具方法
 */

namespace web\libs;

use core\Configure;
use core\Cookie;
use core\Encoder;
use core\Redirect;
use utils\Date;
use utils\Tools;
use web\controller\User;
use web\model\GameSummaryModel;
use web\model\ProfileModel;
use web\model\SessionModel;
use web\model\UserAuthModel;
use web\model\UserModel;
use web\model\VipLevelModel;
use web\model\VisitHistoryModel;

class UserUtil
{

    private static $_instance = null;

    const THIRD_PARTY_LOGIN = 1;//第三方登录

    const THIRD_PARTY_REGISTER = 2;//第三方注册

    const USER_AUTH_IDCARD = 1; //身份证验证

    const USER_AUTH_MAIL = 2; //邮箱认证

    const USER_AUTH_SMS = 3; //短信认证

    static function instance()
    {
        if (self::$_instance == null)
            self::$_instance = new UserUtil();
        return self::$_instance;
    }

    /**
     * 验证用户是否登录
     * @param $url 如果传入 则用户未登录时 则跳往$url
     * @return bool
     */
    function checkLogin($url='/')
    {
        $cookie = Cookie::instance();
        $uid = $cookie->userdata('uid');
        if (empty($uid)){
            if(Tools::is_ajax_req())
                die('loginTimeExpired');
            else
                Redirect::instance()->forward($url);
        }
    }

    /*
    * 用户的登录状态
    */
    function isLogin()
    {
        $cookie = Cookie::instance();
        $uid = $cookie->userdata('uid');
        if (empty($uid))
            return false;
        return true;
    }

    /**
     * 登录和注册后使用
     * 设置用户的cookie
     */
    function setUserCookie($data)
    {
        $cookie = Cookie::instance();
        $cookie->set_userdata('uid', $data['uid']);
        $cookie->set_userdata('user_number',$data['user_number']);
        $cookie->set_userdata('login_name', $data['login_name']);
        $cookie->set_userdata('nickname', $data['nickname']);
        $cookie->set_userdata('wins', $data['wins']);
        $cookie->set_userdata('total', $data['total']);
        $cookie->set_userdata('vip_level',$data['vip_level']);
    }

    /**
     * 计算用户的胜率
     * @param $wins
     * @param $total
     * @return string
     */
    function userRatio($wins, $total)
    {
        return empty($total) ? '0.00%' : number_format($wins / $total, 2) * 100 . '%';
    }

    /**
     * 验证消费密码是否正确
     * @param $purchasePassword 前端获取的md5消费密码
     * @param $password  数据库中的密码
     * @param $user_number 用户的唯一标识
     * @return bool
     */
    function is_purchase_password_valid($purchasePassword,$password,$user_number){
        if( md5($purchasePassword.'#'.$user_number) == $password)
                return true;
        return false;
    }

    /**
     * 验证登录密码是否正确
     * @param $userPassword 前端获取的md5密码
     * @param $password 数据库中的密码
     * @param $user_number 用户的唯一标识
     * @return bool
     */
    function is_password_valid($userPassword,$password,$user_number){
        if( md5($userPassword.'#'.$user_number) == $password)
            return true;
        return false;
    }

    /**
     * 创建密码,用于web端
     * @param $password
     * @param $user_number
     * @return string
     */
    function makePassword($password,$user_number){
            return md5($password.'#'.$user_number);
    }

    /**
     * 根据原始密码生成符合验证条件的密码(适用于自动注册)
     * @param $source_password 原始密码(明文)
     * @param $user_number
     * @return string
     */
    function makePasswordAuto($source_password,$user_number){
            return md5(md5($source_password).'#'.$user_number);
    }

    /**
     * 只适用第三方注册
     * 根据用户名算出密码
     * @param $login_name 登录名
     * @param $len 密码长度 默认为0 就是全部返回
     * @return  返回转换后的原始密码(明文,并不是MD5)
     */
    function makeSourcePasswordByLoginName($login_name,$len=0){
        Configure::instance()->load('web');
        $password = Tools::authcode($login_name,'ENCODE',Configure::instance()->web['entry_key']);
        if($len == 0)
            return $password;

        return substr($password,0,$len);
    }

    /**
     * 从文件抓取随机昵称
     * @return string
     */
     function randomName()
    {
        $words = Tools::getCSVdata(BASE_PATH . '/web/libs/name_generator.csv');
        $words = array_slice($words, 0, 375);
        $indexes = array_rand($words, 2);
        $chooser1 = $words[$indexes[0]];
        $chooser2 = $words[$indexes[1]];
        $name = ${'chooser' . rand(1, 2)}['first_name'] . ${'chooser' . rand(1, 2)}['last_name'];
        return $name;
    }

    /**
     * 处理第三方登录流程 例如微博
     * @param $type   1=登录 2=注册 请用常量传入
     * @param $login_name 登录名 (一般由 特定标识+第三方UID 组成)
     * @param $nick_name 第三方平台的昵称 如果是登录流程则传入null即可
     * @param $user 如果是登录流程的话 则需要传入users表中读出的user数组
     * @param $game_login 值为''或1 是否登录后直接进游戏
     */
    function third_party_login($type,$login_name,$nick_name=null,$user=null,$game_login=null){

         if($type == 2){
             //走注册写入流程
             $password = md5(str_shuffle($login_name));
             $nickname = $this->randomName();
             while(1){
                 if(!UserModel::instance()->isNickNameExsit($nick_name))
                     break;
                 $nickname = $this->randomName();
             }
             $forbidden = 0;
             $regist_time = date('YmdHis');
             $mobile = 0;
             $is_robot = 0;

             $posts = array(
                  'login_name' => $login_name,
                  'password' => $password,
                  'forbidden' => $forbidden,
                  'regist_time' => $regist_time,
                  'email' => '',
                  'nickname' => $nickname,
                  'forbidden' => $forbidden,
                  'mobile' => $mobile,
                  'is_robot' => $is_robot,
                  'game_login' => $game_login,
                 'token' => Cookie::instance()->get_csrf_cookie()
              );

             $user_controller = new User();
             $user_controller ->register($posts);
         }
        else{
            //走登入流程
            /*处理COOKIE**/
            $cookie = Cookie::instance();
            $cookie->set_timeout(12 * 3600);
            $profile = ProfileModel::instance()->read($user['uid']);
            $gamesummary = GameSummaryModel::instance()->read($user['uid']);
            $cookie_data = array_merge($user, $profile);
            if (false != $gamesummary)
                $cookie_data = array_merge($cookie_data, $gamesummary);
            $this->setUserCookie($cookie_data);
            $expire_time = Configure::instance()->common['cookie']['timeout'];
            $this->createSessionId($expire_time,$user);
            if(!$game_login)
                Redirect::instance()->forward();
            else
                Redirect::instance()->forward('/game/enter');
        }
    }

    /**
     * 生成会话ID 提供给网页端或客户端
     * @param $expire_time 失效时间
     * @param $user 用户表数组
     * @return session_key
     */
    function createSessionId($expire_time,$user,$gameDb=null){
        if(count(Configure::instance()->web) == 0){
            Configure::instance()->load('web');
        }
        //取得加密密匙
        $entry_key = Configure::instance()->web['entry_key'];
        $session_key = md5(uniqid());
        $entry_data = array(
            'login_name' => $user['login_name'],
            'user_number' => $user['user_number'],
            'uid' => $user['uid']
        );
        $entry_data = serialize($entry_data);
        $session_data = Tools::authcode($entry_data,'ENCODE',$entry_key);
        $datetime = date('Y-m-d H:i:s',time()+$expire_time);
        $fields = array(
            'session_key' => $session_key,
            'session_data' => $session_data,
            'expire_date' => $datetime
        );

        if($gameDb !== null){
            if(!$gameDb->save($fields,'django_session'))
                die(Encoder::instance()->encode(array('error'=>Error::ERROR_DATA_WRITE,'data'=>null)));
        }else{
            if(!SessionModel::instance()->save($fields))
                Redirect::instance()->forward('/error/index/'.Error::ERROR_DATA_WRITE);
        }
        Cookie::instance()->set_userdata_no_entry('sessionid',$session_key);
        return $session_key;
    }


    /**
     * 是否是今天注册的新用户
     * @param $register_time
     * @return int
     */
    function isNewUser($register_time){
        $register_date = Date::instance()->format_Ymd($register_time);
        $today = date('Y-m-d');
        if($register_date == $today)
            return 1;
        return 0;
    }

    /**
     * 用户今天是否登录过
     * @param $uid
     * @return int
     */
    function hasLoginToday($uid){
        $haslogin = UserModel::instance()->hasLoginToday($uid);
        return $haslogin ? 1 : 0;
    }

    /**
     * 创建访问记录
     * @param $uid
     * @param $login_type
     */
    function createVisitHistory($uid,$login_type){
        $fields = array(
            'user_id' => $uid,
            'login_time' => date('Y-m-d H:i:s'),
            'ip_address' => Tools::getip(),
            'login_type' => $login_type
        );
        VisitHistoryModel::instance()->save($fields);
    }

    /**
     * 创建登出记录
     * @param $uid
     */
    function createLogoutHistory($uid){
        $id = VisitHistoryModel::instance()->currentUserMaxId($uid);
        $fields = array(
            'logout_time' => date('Y-m-d H:i:s')
        );
        VisitHistoryModel::instance()->update($fields,$id);
    }

    /**
     * 用户认证
     * @param $uid
     * @param $auth_type
     * @return bool
     */
    function auth($uid,$auth_type){
        if (UserAuthModel::instance()->save($uid,$auth_type))
            return true;
        return false;
    }


    /**
     * 检查用户的认证状态
     * @param $uid
     * @return array 以auth_type为下标的数组 值1为已认证 0为未认证
     */
    function get_auth($uid){
        $auths = UserAuthModel::instance()->read($uid);
        $user_auth = array();
        $user_auth[self::USER_AUTH_IDCARD] = 0;
        $user_auth[self::USER_AUTH_MAIL] = 0;
        $user_auth[self::USER_AUTH_SMS] = 0;

        $auth_types = array_keys($user_auth);
        foreach($auths as $auth){
            if(in_array($auth['auth_type'],$auth_types)){
                $user_auth[ $auth['auth_type'] ] = 1;
            }
        }
        unset($auth_types,$auths);
        return $user_auth;
    }


    /**
     * 生成用户签名 - 用于用户自己的私密操作(例如:找回密码)
     * @param int $userNumber
     * @param string $loginName
     * @param int $time
     * @return string
     */
    function createSecretSign($userNumber,$loginName,$time){
         $configure = Configure::instance()->load('web');
         $appSecret = $configure->web['entry_key'];
         $sign = array(
             intval($userNumber),
             $loginName,
             intval($time),
             $appSecret
         );
         asort($sign);
         return md5(implode('|',$sign));
    }

    /**
     * 获取用户折扣后的资源数
     * @param number $sourceResource
     * @param int $vipLevel
     * @return int
     */
    function vipResourceDiscount($sourceResource,$vipLevel){
        $discount = VipLevelModel::instance()->read($vipLevel);
        $discountResource =  $sourceResource*$discount;
        if($discountResource <= 0)
            return $sourceResource;
        return ceil($discountResource);
    }
}