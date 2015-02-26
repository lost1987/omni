<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/13
 * Time: 上午11:00
 */

namespace uad\libs;


class UadError {

    //逻辑上不允许的操作 或 非法操作
    const FORBBIDEN_OPERATION = 400;

    const DATA_WRITE = 500;

    //错误的数据
    const DATA_ERROR = 600;

    //用户名或密码错误
    const UNAME_PWD_ERROR = 2001;

    const LOGIN_FAILED = 5001;

    const PURCHASE_PASSWD_ERROR = 5002;

    const PURCHASE_PASSWD_UNSET = 5003;
    //新蜂币不足
    const DEPOSIT_NEWCOINS_NOT_ENOUGH = 5004;
    //该用户不是指定用户的下线
    const USER_HAS_NO_SUCH_CHILD = 5005;
    //提现时 未绑定该类型账户
    const UNBIND_SUCH_ACCOUNT = 5006;
    //禁止提现
    const FORBIDDEN_USER_DEPOSIT = 5007;

} 