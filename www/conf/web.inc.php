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

    /**
     * 在实例化controller之前需要运行的自定义类,方法
     * 类文件必须放在 BASE_PROJECT/hook/beforectl 下面
     */
    'hook_breforectl' => array(
         array('clazz'=>'Server','method'=>array('status'))
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
        'image_folder' => 'upload/images',//存放上传图片的文件夹
        'image_max_size' => 524288, //512KB 文件最大限制
        'image_allowed_ext' => array('jpg','png')//允许的图片格式
    ),


    'pay_type' => array(
        0 => 'PayChinaBank',//'网银在线',
        1 => 'PayAliPay',//'支付宝',
        2 => 'PayMobile',//'手机卡支付'
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
     * 新浪微博设定
     */
    'sina_weibo'=> array(
        'wb_akey' => '3926068220',
        'wb_skey' => '0f2c6ecfce75cb95ceff26d588d70c8f',
        'callback_url' =>BASE_HOST.'/weibo/sina/callback'
    ),


    /**
     * 网银支付 的rmb:diamond的比例 例如 6元=60钻石
     */
    'pay_amount_ratio' => array(
        6 => 60,
        18 => 180,
        30 => 310,
        50 => 530,
        98 => 1100,
        168 => 1900,
        208 => 2400,
        328 => 3800
    ),

    /**
     * 手机充值卡支付 rmb:diamond的比例
     */
    'pay_amount_ratio_mobile' => array(
        20 => 200,
        30 => 310,
        50 => 530,
        100 => 1000
    ),

    'product_type' => array(
        0=>'实物',
        1=>'充值卡',
        2=>'道具'
    ),

    //映射游戏项目的资源类型变化 索引对应price_types的索引
    'game_resource_changetypes' => array(
        0 => 0,
        1 => 3,
        2 => 1,
        3 => 2,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7
    )

);