<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/20
 * Time: 下午1:10
 * 接口错误返回代码
 */
namespace api\libs;

class Error {
    /**500:系统错误****/

    //数据库写入错误
    const DATA_WRITE_ERROR = 500;
    //参数错误
    const ARGUMENTS_ERROR = 501;


    /**1000:参数错误或逻辑错误********/

    //用户不存在
    const USER_NOT_EXSIT = 1000;

    //表单字段格式错误
    const FORM_STRING_FORMAT=1001;

    //用户未登录
    const USER_NOT_LOGIN = 1002;

    //字符串相等验证错误
    const STRING_CMP_ERROR = 1003;

    //密码错误
    const PASSWORD_INVALID = 1004;

    //字段唯一性验证失败[已存在,非唯一]
    const FIELD_VALUE_ALREALLY_EXSITS = 1005;

    //字段为空错误
    const FIELD_NULL_ERROR = 1006;

    //密码未设定
    const PASSWORD_UNSET = 1007;

    //登录已过期
    const LOGIN_OUTTIME = 1008;




    /**2000 开头特殊及具体的错误******/
    const NOT_ENOUGH_RESOURCE = 2000;


    //资源兑换类型错误
    const EXCHANGE_TYPE_ERROR = 2010;
    //商品不存在
    const NO_SUCH_PRODUCT = 2011;
    //客户端版本过低,需强制升级
    const CLIENT_FORCE_UPDATE = 2012;
    //服务器正在维护
    const SERVER_ON_UPHOLD = 2013;
    //未检测到版本号
    const  CLIENT_VERSION_MISS = 2014;


}