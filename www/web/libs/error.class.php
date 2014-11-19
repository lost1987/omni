<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-24
 * Time: 下午1:34
 */

namespace web\libs;


use core\ReflectClass;

class Error {

    //登录信息过期或未登录
    const ERROR_NO_LOGIN = 1;

    //交易密码错误
    const ERROR_PURCHASE_PWD = 2;

    //数据写入错误 多用于更新或插入数据库
    const ERROR_DATA_WRITE = 3;

    //资源缺少错误 用于用户的资源操作
    const ERROR_RESOURCE_LESS =4;

    //字符串格式验证错误 例如长度或者特定的格式错误或者为空
    const ERROR_STRING_FORMAT =5;

    //登录密码错误
    const ERROR_LOGIN_PWD = 6;

    //csrf_token 验证错误
    const ERROR_CSRF_TOKEN = 7;

    //用户不存在
    const ERROR_NO_USER = 8;

    //错误:需验证的唯一字段已经存在
    const ERROR_EXSIT = 9;

    const ERROR_UPLOAD_MIME = 10;

    const ERROR_UPLOAD_SIZE = 11;

    const ERROR_FOLDER_NOT_EXSIT = 12;

    const ERROR_COMMON = 13;//通用错误 范型

    const ERROR_VALIDATION_COLUMN = 14; //表单字段内容与数据库字段内容验证不匹配

    const ERROR_EXPIRE_TIME = 15; //时效已过期

    const ERROR_ACCESS_TOKEN = 16;//ACCESS_TOKEN 验证失败

    const ERROR_NO_ENOUGH_COUNT = 17; //次数不足

    const ERROR_SIGN = 18;//签名错误

    const ERROR_FILE_NOT_EXIST = 19;//文件不存在

    /**
     * 返回所有的错误的key,value
     */
    static function error_info($code){
            $info = '';
            switch($code) {
                case 1: $info = '登录信息过期或未登录';
                    break;
                case 2: $info = '交易密码错误';
                    break;
                case 3: $info = '出错啦';//数据写入错误
                    break;
                case 4: $info = '资源缺少错误';
                    break;
                case 5: $info = '字符串格式验证错误 ';
                    break;
                case 6: $info = '登录密码错误';
                    break;
                case 7: $info = 'csrf_token 验证错误';
                    break;
                case 8: $info = '用户不存在';
                    break;
                case 9: $info = '错误:需验证的唯一字段已经存在';
                    break;
                case 10: $info = '错误:不支持的文件类型';//上传文件MIME_TYPE错误
                    break;
                case 11: $info = '错误:文件超过大小';//上传超过大小
                    break;
                case 12: $info = '错误:文件夹不存在';
                    break;
                case 13: $info = '出错啦';//通用错误提示
                    break;
                case 14: $info = '验证错误';//表单字段内容与数据库字段内容验证不匹配
                    break;
                case 15: $info = '时效已过期';//例如邮件验证等等
                    break;
                case 16: $info = '授权失败';
                    break;
                case 17: $info = '次数不足'; //只要涉及到次数的都可以用这个错误码
                    break;
                case 18: $info = '签名错误'; //数字签名验证错误
                    break;
                case 19 : $info='资源不存在';

            }
            return $info;
    }
} 