<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/13
 * Time: 上午11:37
 */

namespace uad\libs;


class Navigator {

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function htmlString(){
        return  '<li><a href="/index"><span class="am-icon-home"></span> 概览</a></li>'.
                '<li><a href="javascript:;" rel="/user/inviteFriends" class="usable"><span class="am-icon-users"></span> 邀请好友</a></li>'.
                '<li><a href="javascript:;" rel="/children" class="usable"><span class="am-icon-user-md"></span> 好友管理</a></li>'.
                '<li><a href="javascript:;" rel="/deposit/deposit" class="usable"><span class="am-icon-jpy"></span> 申请提现</a></li>'.
                '<li><a href="javascript:;" rel="/deposit" class="usable"><span class="am-icon-list"></span> 提现记录</a></li>';
               // '<li><a href="/index"><span class="am-icon-home"></span> 奖品兑换</a></li>';
    }
}