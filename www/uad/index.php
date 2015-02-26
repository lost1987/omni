<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/1/9
     * Time: 上午11:08
     */
    session_start();
    define('PROJECT_MODE','develop');
    switch(PROJECT_MODE){
        case 'develop' :
            /***本地配置****/
            define('BASE_HOST','http://uad.16yx.com');
            define('WWW_HOST','http://newbee.16yx.com');
            define('DOMAIN','16yx.com');
            /***局域网配置***/
//        define('BASE_HOST','http://uad.newbee.com');
//        define('WWW_HOST','http://test.newbee.com');
//        define('DOMAIN','newbee.com');
            /****sndu服务器配置****/
//        define('BASE_HOST','http://uad.sndu.cc');
//        define('WWW_HOST','http://16youxi.cc');
//            define('DOMAIN','newbee.com');
            define('XHPROF_ENABLE',0);
            error_reporting(E_ALL &~ E_NOTICE);
            ini_set('display_errors','on');
            break;
        case  'product':
            define('BASE_HOST','http://uad.16youxi.com');
            define('WWW_HOST','http://www.16youxi.com');
            define('DOMAIN','16youxi.com');
            define('XHPROF_ENABLE',0);
            error_reporting(E_ALL &~ E_NOTICE );
            ini_set('display_errors','off');
            break;
    }

    define('BASE_PATH',dirname(dirname(__FILE__)));
    define('BASE_PROJECT','uad');
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
