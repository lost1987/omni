<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/5
 * Time: 下午8:11
 */

namespace web\libs;


use core\Base;
use core\Cookie;
use utils\Tools;

class LoginSync extends Base{

    private static $_instance = null;

    static function instance(){
        if (self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function loginSuccess($user,$gameDB){
        /*处理COOKIE**/
        $cookie = Cookie::instance();
        $expire_time = $this->config->common['cookie']['timeout'];

        $cookie->set_timeout($expire_time);
        UserUtil::instance()->createSessionId($expire_time,$user,$gameDB);
        $sql = "SELECT coins,diamond,ticket,coupon FROM profile WHERE user_id = ?";
        $gameDB->execute($sql,array($user['uid']));
        $profile = $gameDB->fetch();
        $sql = "SELECT * FROM gauth_gamesummary WHERE player_id = ?";
        $gameDB->execute($sql,array($user['uid']));
        $gamesummary = $gameDB->fetch();
        unset($gameDB);
        $cookie_data = array_merge($user, $profile);
        if (false != $gamesummary)
            $cookie_data = array_merge($cookie_data, $gamesummary);
        UserUtil::instance()->setUserCookie($cookie_data);
    }
} 