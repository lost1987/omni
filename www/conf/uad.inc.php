<?php

    return array(
        'admin_secrect' => '&^$##$#@@Tggsss!Q@WS',

        'entry_key' => 'q!w@e#r$',//加密可逆算法key

        /*自动初始化DB配置项 如果无需初始化DB 请留 '' **/
        'init_db' => 'adm',

        'visit_mode'=>'normal', /**pathinfo,normal**/

        /**
         * 在实例化controller之前需要运行的自定义类,方法
         * 类文件必须放在 BASE_PROJECT/hook/beforectl 下面
         */
        'hook_breforectl' => array(
            // array('clazz'=>'HookSample','method'=>'call1')
        ),

        'redis' => array(
            'host' => '127.0.0.1',
            'port' => 6379
        ),

        /*html 模板设置 **/
        'twig' => array(
            'enable'  => true,
            'cache_enable' => true,
            'template_dir' => '/template',
            'cache_dir'  => '/template_c',
        ),

        'csrf' => array(
            'expire_time' => 7200,
            'token_name' => 'csrf_token',
            'cookie_name' => 'csrf_token'
        ),

        'default_reward_recharge'=>array(
            'ratio1' => 0.05,
            'ratio2' => 0.01,
            'ratio3' => 0.01,
            'ratio4' => 0.01
        ),

        'default_reward_deposit' => array(
            'ratio1' => array(
                    array('money'=>2,'newcoins'=>5000),
                    array('money'=>10,'newcoins'=>10000),
                    array('money'=>50,'newcoins'=>30000),
                    array('money'=>200,'newcoins'=>100000)
            ),
            'ratio2' => array(
                array('money'=>2,'newcoins'=>500),
                array('money'=>10,'newcoins'=>1000),
                array('money'=>50,'newcoins'=>3000),
                array('money'=>200,'newcoins'=>10000)
            ),
            'ratio3' => array(
                array('money'=>2,'newcoins'=>200),
                array('money'=>10,'newcoins'=>400),
                array('money'=>50,'newcoins'=>1200),
                array('money'=>200,'newcoins'=>4000)
            ),
            'ratio4' => array(
                array('money'=>2,'newcoins'=>100),
                array('money'=>10,'newcoins'=>200),
                array('money'=>50,'newcoins'=>600),
                array('money'=>200,'newcoins'=>2000)
            )
        ),

        'default_reward_levelup'=>array(
            'ratio1' => array(
                array('lv'=>10,'newcoins'=>10000),
                array('lv'=>20,'newcoins'=>60000),
                array('lv'=>30,'newcoins'=>200000)
            ),
            'ratio2' => array(
                array('lv'=>10,'newcoins'=>1000),
                array('lv'=>20,'newcoins'=>6000),
                array('lv'=>30,'newcoins'=>20000)
            ),
            'ratio3' => array(
                array('lv'=>10,'newcoins'=>250),
                array('lv'=>20,'newcoins'=>1500),
                array('lv'=>30,'newcoins'=>5000)
            ),
            'ratio4' => array(
                array('lv'=>10,'newcoins'=>125),
                array('lv'=>20,'newcoins'=>750),
                array('lv'=>30,'newcoins'=>2500)
            )
        ),

        'default_reward_login' => array(
            'ratio1' => array(
                array('days'=>5,'newcoins'=>500),
                array('days'=>10,'newcoins'=>1000),
                array('days'=>30,'newcoins'=>2000)
            ),
            'ratio2' => array(
                array('days'=>5,'newcoins'=>50),
                array('days'=>10,'newcoins'=>100),
                array('days'=>30,'newcoins'=>200)
            ),
            'ratio3' => array(
                array('days'=>5,'newcoins'=>10),
                array('days'=>10,'newcoins'=>20),
                array('days'=>30,'newcoins'=>40)
            ),
            'ratio4' => array(
                array('days'=>5,'newcoins'=>4),
                array('days'=>10,'newcoins'=>8),
                array('days'=>30,'newcoins'=>16)
            )
        ),

        'depositPlatform' => array(
            0 => '银行卡',
            1 => '支付宝'
        ),

        'depositState' => array(
            0 => '未处理',
            1 => '已汇款',
            2 => '不予汇款'
        ),

        'newCoinsChangeAction' => array(
            0=>'下线提现',
            1=>'下线升级',
            2=>'下线签到',
            3=>'本人提现',
            4=>'本人提现失败',
            5=>'下线充值返利'
        )
    );