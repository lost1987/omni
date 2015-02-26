<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-8-4
 * Time: 下午2:13
 * 通用配置项
 */

return array(
    /***memcache 里存储的队列key*/
    'message_queue_keys' => array(
            1000, //测试队列key  key
    ),

    /*cookie设置**/
    'cookie' => array(
           'secret' => 'web_newbee',
           'timeout' => 3600*3,
           'path'  => '/',
           'domain' => DOMAIN
    ),

    /**
     * golang 统计队列ip,端口
     */
    'go_das_server'=>array(
        'host' => 'tcp://192.168.1.24',
        'port' => 5000,
        'enable'=>false//是否开启数据统计
    ),

    /**
     * 此数组的顺序必须是按chance的从小到大来排 奖品的从大到小排
     * @var array
     */
    'lottery_default' => array(
        array(//大奖
            'name' => 'iPad mini2',
            'chance' => 1,
            'inventory' => 1,
            'index' => 2,//页面上的商品位置
            'product_id' => 15,
            'level' => 1//奖品等级
        ),
        array(//以下全是其他奖
            'name' => '5KG有机大米',
            'chance' => 4,
            'inventory' => 3,
            'index' => 6,
            'product_id' => 14,
            'level' => 2
        ),
        array(
            'name' => '20元电话充值卡',
            'chance' => 5,
            'inventory' => 4,
            'index' => 3,
            'product_id' => 13,
            'level' => 3
        ),
        array(
            'name' => '10元电话充值卡',
            'chance' => 8,
            'inventory' => 5,
            'index' => 7,
            'product_id' => 12,
            'level' => 4
        ),
        array(
            'name' => '100钻石',
            'chance' => 40,
            'inventory' => 50,
            'index' => 4,
            'product_id' => 11,
            'price' => 100,
            'price_type' => 'diamond',
            'level' => 5
        ),
        array(
            'name' => '10钻石',
            'chance' => 50,
            'inventory' => 80,
            'index' => 8,
            'product_id' => 10,
            'price' => 10,
            'price_type' => 'diamond',
            'level' => 6
        ),
        array(
            'name' => '2000金币',
            'chance' => 80,
            'inventory' => 100,
            'index' => 5,
            'product_id' => 9,
            'price' => 2000,
            'price_type' => 'coins',
            'level' => 7
        ),
        array(
            'name' => '500金币',
            'chance' => 100,
            'inventory' => 500,
            'index' => 1,
            'product_id' => 8,
            'price' => 500,
            'price_type' => 'coins',
            'level' => 8
        ),
    ),

    'user_lottery_default' => array(
        'uid' => null,
        'max' => 3, //用户的最大抽取上限, 不含分享获得的
        'round' => 0,//记录用户今天的局数, 游戏服务器会调用网页api 见API_MOBILE.md的15号, 每五局增加left直到max
        'left' => 1,//用户可抽取次数, 其间值为0 至 max, left减少一次, max也需要减少一次
        'shared' => 0,//是否微博分享了, 如果分享了则plus变为3
        'plus' => 0 //先减完left, 然后在考虑时候可以减少plus
    ),

    /**
     * 玩家每玩几次 就加一次抽奖机会
     */
    'lottery_add_round' => 5,
);