<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-15
 * Time: 下午5:41
 * newbee 网站前端配置文件
 */

return array(
    'entry_key' => 'q!w@e#r$',//加密可逆算法key

    /*自动初始化DB配置项 如果无需初始化DB 请留 '' **/
    'init_db' => 'game',

    'visit_mode'=>'normal', /**pathinfo,normal**/

    'redis' => array(
        'host' => '127.0.0.1',
        'port' => 6379
    ),

    /*memcache 配置项**/
    'memcache' => array(
        'enable' => false,
        'host' => '127.0.0.1',
        'port' => '11211'
    ),

    /*html 模板设置 **/
    'twig' => array(
        'enable'  => false,
        'cache_enable' => false,
        'template_dir' => '/template',
        'cache_dir'  => '/template_c',
    ),

    /**
     * 在实例化controller之前需要运行的自定义类,方法
     * 类文件必须放在 BASE_PROJECT/hook/beforectl 下面
     */
    'hook_breforectl' => array(
        array('clazz'=>'Server','method'=>array('status','version'))
    ),
);