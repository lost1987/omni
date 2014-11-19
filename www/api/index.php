<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-8-18
 * Time: 下午4:23
 * newbee api接口入口
 * 独立配置文件对应 conf目录下BASE_PROJECT.'.inc.php'
 */
session_start();
define('PROJECT_MODE','develop');

switch(PROJECT_MODE){
    case 'develop' :
        /**本地服务器配置*/
        define('BASE_HOST','http://api.newbee.com');
        define('WWW_HOST','http://dev.newbee.com');//API host地址
        /**局域网服务器配置*/
//        define('BASE_HOST','http://api.newbee.com');
//        define('WWW_HOST','http://test.newbee.com');//API host地址
        /**sndu 服务器配置*/
//        define('BASE_HOST','http://api.sndu.cn');
//        define('WWW_HOST','http://www2.sndu.com');//API host地址

        define('XHPROF_ENABLE',0);
        error_reporting(E_ERROR | E_WARNING | E_PARSE );
        ini_set('display_errors','on');
        break;
    case  'product':
        define('BASE_HOST','http://api.16youxi.com');
        define('WWW_HOST','http://www.16youxi.com');//API host地址
        define('XHPROF_ENABLE',0);
        error_reporting(E_ERROR | E_WARNING | E_PARSE );
        ini_set('display_errors','off');
        break;
}

define('BASE_PATH',dirname(dirname(__FILE__)));
define('BASE_PROJECT','api');
define('STATIC_HOST',BASE_HOST);

require BASE_PATH.'/core/autoload.class.php';
require BASE_PATH.'/core/configure.class.php';
require BASE_PATH.'/core/db.class.php';
require BASE_PATH.'/core/base.class.php';
require BASE_PATH.'/core/cookie.class.php';
require BASE_PATH.'/core/utf8.class.php';
require BASE_PATH.'/core/security.class.php';
require BASE_PATH.'/core/input.class.php';
require BASE_PATH . '/omni.class.php';

$omni = Omni::instance();
$omni->run(BASE_PROJECT);
