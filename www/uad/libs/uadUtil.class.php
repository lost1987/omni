<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/19
 * Time: 下午2:45
 */

namespace uad\libs;


use core\Cookie;
use core\Encoder;
use core\Redirect;
use utils\Tools;

class UadUtil {

    private static $_instance = null;

    const NEWCOINS_CHANGE_CHILDREN_DEPOSIT = 0; //下线提现
    const NEWCOINS_CHANGE_CHILDREN_LEVELUP = 1; //下线升级
    const NEWCOINS_CHANGE_CHILDREN_SIGN = 2;//下线签到
    const NEWCOINS_CHANGE_DEPOSIT = 3;//本人提现
    const NEWCOINS_CHANGE_DEPOSIT_FAILED = 4;//本人提现失败
    const NEWCOINS_CHANGE_CHILDREN_RECHARGE = 5;//下线充值返利

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function check_login(){
        $user = Cookie::instance()->userdata('uad_session_data');
        if(false == $user){
            if(Tools::is_ajax_req()){
                die('loginTimeExpired');
            }else
                Redirect::instance()->forward('/login');
        }
    }

    function getUser(){
        $user = Encoder::instance()->decode(Cookie::instance()->userdata('uad_session_data'));
        return $user;
    }

    function getUid(){
       $u =  $this->getUser();
       return $u['uid'];
    }

    function createDepositOrderNo(){
        return date('YmdHis').uniqid();
    }

    function createInviteCode($uid){
        return $uid;
    }
}