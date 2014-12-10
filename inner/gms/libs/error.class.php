<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 14/10/28
     * Time: 下午2:47
     */

    namespace gms\libs;

    /**
     * 错误定义
     * Class Error
     * @package gms\libs
     */
    class Error
    {

        const PAGE_NOT_FOUND = 404;//页面未找到

        const DATA_WRITE = 500;//数据写入错误

        const DATA_DELETE = 501;//删除数据出错

        const DATA_REFERENCE = 502;//删除数据时如果该数据存在子数据关系关联 则报错

        const LOGIN_TIMEOUT = 1000;//登陆超时

        const PERMISSION_DIEND = 1001;//权限不足

        const CSRF_TOKEN = 1002; //csrf_token错误

        const DATA_DEL_FORBBIDEN = 1003; //禁止删除的数据

        const ARGUMENTS = 1004; //参数错误

        const UPLOAD_FILE_IS_TOO_LARGE = 1005; //上传文件过大

        const UPLOAD_FILE_FAILED = 1006; //文件上传失败

        const UPLOAD_MIME_TYPE_INVALID = 1007;//mimetype

        const UPLOAD_INVALID_PATH = 1008;//上传路径不存在

        const ADMIN_PASSWORD_VALIDATE_FAILED = 1009;//管理员密码验证错误

        const OUT_OF_IP_WHITE_LIST = 1010;//不在IP白名单之内

        /**
         * 输出错误代码的含义
         * @param int $code
         * @return  string
         */
        static function transfer( $code )
        {
            $str = '';
            switch ($code) {
                case 404:
                    $str = '页面未找到';
                    break;
                case 500:
                    $str = '数据写入错误';
                    break;
                case 501:
                    $str = '删除数据出错';
                    break;
                case 502:
                    $str = '删除数据时,存在子数据关系关联,不予删除';
                    break;
                case 1000:
                    $str = '登陆超时';
                    break;
                case 1001:
                    $str = '权限不足';
                    break;
                case 1002:
                    $str = 'csrf_token错误';
                    break;
                case 1003:
                    $str = '禁止删除的数据';
                    break;
                case 1004:
                    $str = '参数错误';
                    break;
                case 1005:
                    $str = '上传文件过大';
                    break;
                case 1006:
                    $str = '文件上传失败';
                    break;
                case 1007:
                    $str = '上传文件mimetype错误';
                    break;
                case 1008:
                    $str = '上传路径不存在';
                    break;
                case 1009:
                    $str = '管理员密码验证错误';
                    break;
                case 1010:
                    $str = '不在IP白名单之内';
                    break;
            }

            return $str;
        }

    }