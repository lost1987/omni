<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/13
 * Time: 上午11:37
 */

namespace adm\libs;


class Navigator {

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function htmlString(){
        return '<li><a href="/index"><span class="am-icon-home"></span> 概览</a></li>'.

                '<li class="admin-parent">'.
                '<a class="am-cf" data-am-collapse="{target: \'#collapse-nav\'}"><span class="am-icon-users"></span> 用户 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>'.
                '<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">'.
                    '<li><a href="javascript:;" rel="/user/lists" class="am-cf usable"><span></span> 用户列表</a></li>'.
                    '<li><a href="javascript:;" rel="/user/depositList" class="am-cf usable"><span></span> 提现申请</a></li>'.
                '</ul>'.
                '</li>'.

                '<li class="admin-parent">'.
                '<a class="am-cf" data-am-collapse="{target: \'#collapse-nav-redpack\'}"><span class="am-icon-users"></span> 红包 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>'.
                '<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-redpack">'.
                    '<li><a href="javascript:;" rel="/redPack/lists" class="am-cf usable"><span class="am-icon-star"></span> 列表</a></li>'.
                    '<li><a href="javascript:;" rel="/redPack/add" class="am-cf usable"><span class="am-icon-star"></span> 添加</a></li>'.
                '</ul>'.
                '</li>'.

                '<li><a href="javascript:;" rel="/giftBag" class="am-cf usable"><span class="am-icon-star"></span> 礼包设置</a></li>'.
                '<li><a href="/login/logout"><span class="am-icon-sign-out"></span> 注销</a></li>';
    }
}