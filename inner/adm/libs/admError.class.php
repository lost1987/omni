<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/13
 * Time: 上午11:00
 */

namespace adm\libs;


class AdmError {
    //逻辑上不允许的操作 或 非法操作
    const FORBBIDEN_OPERATION = 400;

    const DATA_WRITE = 500;

    //错误的数据
    const DATA_ERROR = 600;

    //用户名或密码错误
    const UNAME_PWD_ERROR = 2001;

    const LOGIN_FAILED = 5001;

} 