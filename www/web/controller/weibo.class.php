<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-29
 * Time: 下午2:39
 */

namespace web\controller;

use core\Configure;
use core\Controller;
use core\Redirect;
use core\Redis;
use libs\weibo\sina\SaeTClientV2;
use libs\weibo\sina\SaeTOAuthV2;
use web\libs\Error;
use web\libs\UserUtil;
use web\model\UserModel;

/**
 * 微博相关
 * Class Weibo
 * @package web\controller
 */
class Weibo extends Controller{

    function __construct(){
        parent::__construct();
        $this->config = Configure::instance()->web;
    }

    function sina(){
        $method = $this->args[0];
        $game_login = empty($this->args[1]) ? '' : 1;
        $this->{__FUNCTION__.'_'.$method}($game_login);
    }

    /**
     * @param $game_login 是否是直接登录游戏 值 ''或1
     */
    function sina_login($game_login){
            $wb_akey = $this->config['sina_weibo']['wb_akey'];
            $wb_skey = $this->config['sina_weibo']['wb_skey'];
            $callback = $this->config['sina_weibo']['callback_url'];
            $o = new SaeTOAuthV2($wb_akey,$wb_skey);
            $url = $o->getAuthorizeURL($callback.'/'.$game_login);
            Redirect::instance()->forward($url);
    }

    /**
     * @param $game_login 是否是直接登录游戏 值 ''或1
     */
    function sina_callback($game_login){
        $wb_akey = $this->config['sina_weibo']['wb_akey'];
        $wb_skey = $this->config['sina_weibo']['wb_skey'];
        $callback = $this->config['sina_weibo']['callback_url'];
        $o = new SaeTOAuthV2($wb_akey,$wb_skey);

        if (isset($_REQUEST['code'])) {
            $keys = array();
            $keys['code'] = $_REQUEST['code'];
            $keys['redirect_uri'] = $callback;
            try{
                $token = $o->getAccessToken( 'code', $keys ) ;
            }catch (\Exception $e){
                die($e->getMessage());
            }
        }

        if ($token) {
            $_SESSION['token'] = $token;
            $_COOKIE['weibojs_'.$o->client_id] = http_build_query($token);
            setcookie('weibojs_' . $o->client_id, http_build_query($token),time()+12*60*60,'/');

            $c = new SaeTClientV2($wb_akey,$wb_skey,$token['access_token']);
            $get_uid = $c->get_uid();
            $wb_uid = $get_uid['uid'];

            $login_name = 'wb_'.$wb_uid;
            $userModel = UserModel::instance();
            $user = $userModel->getUserByLoginName($login_name);
            //如果账号存在则登入 如果不存在则自动注册后再登入
            if(false == $user)//注册
            {
                $wb_user = $c->show_user_by_id($wb_uid);//此方法有频次限制
                UserUtil::instance()->third_party_login(UserUtil::THIRD_PARTY_REGISTER, $login_name, $wb_user['screen_name'],null,$game_login);
            }
            else{
                UserUtil::instance()->third_party_login(UserUtil::THIRD_PARTY_LOGIN, $login_name, null, $user,$game_login);
            }

        }else{
            Redirect::instance()->forward('/error/index/'.Error::ERROR_ACCESS_TOKEN);
        }
    }

    /**
     * 新浪微博分享
     */
    function sina_shared(){
            UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);
            $lottery = new Lottery();
            $lottery->shared();
            Redirect::instance()->forward('http://v.t.sina.com.cn/share/share.php?url='.BASE_HOST.'&title=我刚刚在@新蜂武汉麻将 抽到了' .$this->args[1] . ' 体验正宗武汉麻将，立刻登陆游戏网站');
    }
}