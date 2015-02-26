<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/9
 * Time: 上午11:08
 */
session_start();
define('PROJECT_MODE','product');
switch(PROJECT_MODE){
    case 'develop' :
        /***本地配置****/
        define('BASE_HOST','http://dev.adm.com');
        define('DOMAIN','adm.com');
        /***局域网配置***/
//        define('BASE_HOST','http://test.adm.com');
//        define('DOMAIN','adm.com');
        /****sndu服务器配置****/
//        define('BASE_HOST','http://adm.16youxi.cc');
//        define('DOMAIN','16youxi.cc');
        define('XHPROF_ENABLE',0);
        error_reporting(E_ERROR | E_WARNING | E_PARSE );
        ini_set('display_errors','on');
        break;
    case  'product':
        define('BASE_HOST','http://adm.16youxi.cc');
        define('DOMAIN','16youxi.cc');
        define('XHPROF_ENABLE',0);
        error_reporting(E_ERROR | E_WARNING | E_PARSE );
        ini_set('display_errors','off');
        break;
}

define('BASE_PATH',dirname(dirname(__FILE__)));
define('BASE_PROJECT','adm');
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
