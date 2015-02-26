<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/1/5
     * Time: 下午2:39
     */

    namespace common;


    class Platform {
        //注册端渠道
        const CLIENT_ORIGIN_MOBILE = 1;
        const CLIENT_ORIGIN_WEB = 2;
        const CLIENT_WEIBO = 3;
        const CLIENT_360 = 4;
        const CLIENT_BAIDU = 5;


        //充值平台
        const RECHARGE_APLIPAY = 1;
        const RECHARGE_CHINABANK = 2;
        const RECHARGE_APPSTORE = 3;
        const RECHARGE_QIHU = 4;
        const RECHARGE_BAIDU = 5;


        private static $_instance = null;

        static function instance(){
            if (self::$_instance == null)
                self::$_instance = new self;
            return self::$_instance;
        }

        function getRechargeType($orderNo){
            list($orderNoPrefix,)= explode('_',$orderNo);
            switch($orderNoPrefix){
                case '360':
                    $rechargeType = self::RECHARGE_QIHU;
                    break;

                case 'bd':
                    $rechargeType = self::RECHARGE_BAIDU;
                    break;
            }
            return $rechargeType;
        }

        /**
         * 根据充值订单号 返回充值的平台渠道
         * @param $orderNo
         * @return int
         */
        function getRechargePlatform($orderNo){
            list($orderNoPrefix,)= explode('_',$orderNo);
            switch($orderNoPrefix){
                case 'web':
                    $platform = self::CLIENT_ORIGIN_WEB;
                    break;

                case 'mb':
                    $platform = self::CLIENT_ORIGIN_MOBILE;
                    break;

                case '360':
                    $platform = self::CLIENT_360;
                    break;

                case 'bd':
                    $platform = self::CLIENT_BAIDU;
                    break;

                default:
                    $platform = self::CLIENT_ORIGIN_WEB;
                    break;
            }

            return $platform;
        }

        /**
         * anysdk专用判断平台渠道来源
         * @param $userSdk
         * @return int
         */
        function getPlatformFromAnySdk($userSdk){
            switch($userSdk){
                case '360':
                    $platform = self::CLIENT_360;
                    break;

                case 'bdyouxi':
                    $platform = self::CLIENT_BAIDU;
                    break;
            }
            return $platform;
        }

    }