<?php

return array(
    'admin_secrect' => '&^$##$#@@Tggsss!Q@WS',

    'entry_key' => 'q!w@e#r$',//加密可逆算法key

    /*自动初始化DB配置项 如果无需初始化DB 请留 '' **/
    'init_db' => 'gms',

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

    /*memcache 配置项**/
    'memcache' => array(
        'enable' => false,
        'host' => '127.0.0.1',
        'port' => '11211'
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

    'areas' => array(
        0 => '江岸',
        1  => '江汉',
        2 => '硚口',
        3 => '武昌',
        4 => '青山',
        5 => '洪山',
        6 => '东西湖',
        7 =>  '汉南',
        8 =>  '蔡甸',
        9 =>  '江夏',
        10 => '黄陂',
        11  => '新洲',
        12 => '汉阳',
        13 => '火星'
    ),

    /*订单状态值**/
    'order_status' => array(
        0 => '未处理',
        1 => '已指派',
        2 => '已处理',
        3 => '已回复',
        4 => '已发货'
    ),

    'tool_type' => array(
        0 => '金币',
        1 => '钻石',
        2 => '门票',
        3 => '奖券',
        4 => '鲜花',
        5 => '鸡蛋',
        6 => '喇叭',
        7 => '包房卡'
    ),


    'tool_type_columns' => array(
        0 => 'coins',
        1 => 'diamond',
        2 => 'ticket',
        3 => 'coupon',
        4 => 'flower',
        5 => 'egg',
        6 => 'horn',
        7 => 'private_room_card'
    ),

    'price_type' => array(
        0 => '金币',
        1 => '钻石',
        2 => '门票',
        3 => '奖券',
//        4 => '鲜花',
//        5 => '鸡蛋',
//        6 => '喇叭',
//        7 => '包房卡'
    ),

    'price_type_columns' => array(
        0 => 'coins',
        1 => 'diamond',
        2 => 'ticket',
        3 => 'coupon',
//        4 => 'flower',
//        5 => 'egg',
//        6 => 'horn',
//        7 => 'privateRoomCard'
    ),

    /**
     * 封神榜对应的key
     */
    'rank_keys' => array(
        "all258" => '将一色',
        "allonesuite" => '清一色',
        "allothers" => '全球人',
        "alltriples" => '碰碰胡',
        "allwind" => '风一色',
        "fengs" => '封顶数',
        "lastdrawablecard" => '海底捞',
        "littlewin" => '小胡',
        "quadruplerobbery" => '抢杠',
        "topdiamond" => ' 钻石顶',
        "topgold" => '金顶',
        "winquadruplecard" => '杠上开花',
        "win_rate" => '胜率',
        'coins' => '金币'
    ),


    'handler_type' => array(//对应index_handleresult 的handler_type
        0 => 'feedback', //用户反馈
        1 => 'tipoff',   //举报
        2 => 'usersuspend',//用户申述
        3 => 'paymentorder', //用户兑换
        4 => 'lottery'//用户抽奖
    ),

    //用户反馈类型
    'feedback_type' => array(
        0 => '游戏bug',
        1 => '商城兑换错误',
        2 => '充值失败',
        3 => '游戏记录错误',
        4 => '处罚申诉',
        5 => '其他问题'
    ),

    /***
     * 上传定义
     */
    'upload' => array(
        'image_folder' => 'upload/images/product',//存放上传图片的文件夹
        'image_max_size' => 524288, //512KB 文件最大限制
        'image_allowed_ext' => array('jpg','png','gif'),//允许的图片格式
        'image_product_max_size' => 802400,//商品图片大小100KB
    ),


    'pay_type' => array(
        0 => 'PayChinaBank',//'网银在线',
        1 => 'PayAliPay',//'支付宝',
        2 => 'PayMobile',//'手机支付'
    ),

    /**
     * 支付状态
     */
    'pay_status' => array(
        0 => '等待付款',
        1 => '已付款',
        2 => '已过期',
        3 => '已取消'
    ),

    /***
     * 公告state字段的含义
     */
    'system_message_state' => array(
        0 => 'NOT_START' , // 未开始
        1 => 'ACTIVE', //可见的
        2 => 'EXPIRED' //过期的
    ),

    /**
     * 发送邮件的相关设定
     */
    'email' => array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.ym.163.com',
        'smtp_user' => 'kf@16youxi.com',
        'smtp_pass' => 'newbeeeee',
        'smtp_port'  => 25,
        'charset' => 'utf-8',
        'wordwrap' => TRUE,
        'mailtype' => 'html',
        'expire_time' => 60*60*12 //失效时间为12个小时
    ),


    /**
     * 网银支付 的rmb:diamond的比例 例如 6元=60钻石
     */
    'pay_amount_ratio' => array(
        '0.01'=> 100,
        6 => 60,
        15 => 160,
        30 => 330,
        50 => 560,
        80 => 900,
        100 => 1200,
        200 => 2500
    ),

    /**
     * 手机充值卡支付 rmb:diamond的比例
     */
    'pay_amount_ratio_mobile' => array(
        20 => 215,
        30 => 330,
        50 => 560,
        100 => 1200
    ),

    'product_type' => array(
        0=>'实物',
        1=>'充值卡',
        2=>'道具'
    ),

    'match_types' => array(
        0=>'积分赛',
        1=>'淘汰日赛',
        2=>'淘汰周赛',
        3=>'淘汰月赛'
    ),

    'prize_types' => array(
        0 => array('type' => 0, 'name' => '金币'),
        1 => array('type' => 1,'name'=>'门票'),
        2 => array('type' => 2,'name' => '奖券'),
        3 => array('type' => 3, 'name' => '钻石')
    ),

    'verify_types' => array(
        1 => '积分赛',
        2 => '淘汰赛',
        3 => '比赛奖励'
    ),

    'service_reply' => array(
        '您反馈的问题,我们核实后会立即处理,感谢您对游戏的支持',
        '自定义'
    ),
    //玩家资源消耗日志里的动作类型
    'user_resource_log_action_type' => array(
        1 => '玩家兑换',
        2 => '玩家抽奖',
        3 => '玩家充值',
        4 => '玩家注册',
        5 => '设定手机号',
        6 => '创建包房',
        7 => '牌局结算',
        8 => '给予金币',
        9 => '领取奖励',
        10 => '淘汰赛报名',
        11 =>'淘汰赛竞拍',
        12 => '包房续时',
        13 => '接受金币'
    ),

    //通知游戏服务器更新比赛时间的地址
//    'notify_server_match_update_address' => 'http://127.0.0.1:6626/reload-matches',
    'notify_server_match_update_address' => 'http://10.144.181.190:6626/reload-matches',

    'article_flags' => array(
        'j' => '焦点资讯',
        'i' => '首页资讯带图片'
    )
);
