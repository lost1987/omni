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
use core\Redirect;
use utils\Tools;
use web\controller\User;
use web\model\GameSummaryModel;
use web\model\ProfileModel;
use web\model\SessionModel;

class UserUtil
{

    private static $_instance = null;

    const THIRD_PARTY_LOGIN = 1;//第三方登录

    const THIRD_PARTY_REGISTER = 2;//第三方注册

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
        if (empty($uid))
            Redirect::instance()->forward($url);
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
             $nickname = $nick_name == null ? $this->randomName() : $nick_name;
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
    function createSessionId($expire_time,$user){
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

        if(!SessionModel::instance()->save($fields))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_DATA_WRITE);

        Cookie::instance()->set_userdata_no_entry('sessionid',$session_key);
        return $session_key;
    }

} 