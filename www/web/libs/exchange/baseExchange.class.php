<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/3
 * Time: 上午10:45
 */

namespace web\libs\exchange;


use core\Controller;

class BaseExchange extends Controller{
    /**
     * 给服务器发送资源变更通知
     */
    protected function resourceChangeNotify( $uid )
    {
        $http_monitor = $this->config->common['http_monitor'];
        @file_get_contents( "$http_monitor/diamonds-changed?uid=$uid" );
        @file_get_contents( "$http_monitor/coins-changed?uid=$uid" );
    }
} 