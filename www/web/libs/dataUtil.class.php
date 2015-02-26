<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/29
 * Time: 下午1:50
 */

namespace web\libs;


use core\Configure;
use core\DB;
use uad\model\RewardRecharge_M;
use utils\Curl;
use utils\Das;
use utils\Tools;
use web\model\PaymentOrder;
use web\model\SystemMessageModel;
use web\model\UserModel;
use web\model\UserResourceLogModel;
use common\Platform;

class DataUtil {

    private static $_instance = null;

    static function instance(){
        if (self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function __construct(){
        $this->_config = Configure::instance();
        $this->_config->load("common");
        $this->_config->load("web");
    }

    /**
     * @param $platform int 平台渠道
     * @param $user array user表数据数组
     */
    function doAfterLogin($platform,$user){
        Das::instance($platform,10001)->send(
            array(
                'new'=>UserUtil::instance()->isNewUser($user['regist_time']),
                'haslogin' => UserUtil::instance()->hasLoginToday($user['uid'])
            ),
            Das::LOGIN_COUNT | Das::LOGIN_NUM
        );
        UserUtil::instance()->createVisitHistory($user['uid'],$platform);
    }

    /**
     * @param $platform int 平台渠道
     * @param $uid int 用户id
     */
    function doAfterRegister($platform,$uid){
        //写入资源变动日志到游戏服务器
        $actionData = array(
            'action_type' => UserResource::ACTION_REGISTER,//资源变动类型:玩家兑换
            'tool_type' => 0,
            'price_type' => 0,
            'price' => 0,
            'tool' => 9200,
            'uid' => $uid
        );
        UserResourceLogModel::instance()->save($actionData);

        //发送注册数据给统计服务器
        Das::instance($platform,10001)->send(null,Das::REGISTER_NUM);

        //发送资源统计给统计服务器
        Das::instance($platform,10001)->send(array(
            't'=>9200,
            't_t'=>0,
            'p'=>0,
            'p_t'=>0
        ),Das::RESOURCE);
    }

    /**
     * @param $order  订单表的数组对象
     * @param $recharge_type 充值类型(支付宝还是网银等等)
     */
    function doAfterRecharge($order,$recharge_type){
        //给予推广的充值奖励
        $money = $order['money'];
        $uid = $order['user_id'];
        $admDb = new DB();
        $admDb -> init_db_from_config('adm');
        $sql = "SELECT pids FROM adm_users WHERE uid = $uid";
        $admDb->execute($sql);
        $user = $admDb->fetch();
        if(false != $user){
            if(!empty($user['pids'])) {
                $pids = explode( ',' , $user['pids'] );
                try {
                    $admDb->begin();
                    for ( $i = 0 ; $i < count( $pids ) ; $i ++ ) {//按从下到上的关系依次取出 先取出的是最低级也就是相对该pid是1级下线
                        //读取$i+1级下线的奖励
                        $rewardRecharge = RewardRecharge_M::instance()->read( $pids[ $i ] );
                        $ratio = $rewardRecharge[ 'ratio' . ( $i + 1 ) ];
                        Configure::instance()->load( 'common' );
                        $newCoinsRatio = Configure::instance()->common['deposit_ratio'];
                        $newCoinsAdd = $money * $ratio * $newCoinsRatio;

                        if($newCoinsAdd > 0){
                            $time = time();
                            $sql1 = "UPDATE adm_users SET newcoins = newcoins+$newCoinsAdd WHERE uid = {$pids[$i]};";
                            $sql2 = "INSERT INTO adm_user_newcoins_change (uid,coins_change,change_time,change_type,from_uid)
                                VALUES ({$pids[$i]},$newCoinsAdd,$time,5,$uid);";
                            if ( !$admDb->execute( $sql1 ) || !!$admDb->execute( $sql2 ) )
                                throw new \Exception( \api\libs\Error::DATA_WRITE_ERROR );
                        }
                        usleep( 100 );
                    }
                    $admDb->commit();
                } catch (\Exception $e) {
                    $admDb->rollback();
                    Tools::debug_log( __CLASS__ , __FUNCTION__ , __FILE__ , '玩家充值推广系统给予奖励数据出错' , $e );
                }
            }
        }
        unset($admDb,$money,$user,$sql);

        $platform = Platform::instance()->getRechargePlatform($order['order_no']);
        //记录为用户的消耗日志
        $actionData = array(
            'action_type' => UserResource::ACTION_PAYMENT ,//资源变动类型:玩家充值
            'tool_type'   => 1 ,
            'price_type'  => 0 ,
            'price'       => 0 ,
            'tool'        => $order['diamond'],
            'uid'         => $order['user_id']
        );
        @UserResourceLogModel::instance()->save( $actionData );

        $http_monitor = $this->_config->common['http_monitor'];
        $c = new Curl();
        $c -> setOpt(CURLOPT_CONNECTTIMEOUT,1);
        //通知游戏服务器充值累计
        $c -> get("$http_monitor/add-consume?uid=".$order['user_id'].'&consume='.$order['money']);
        if($c->error)
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'CURL连接处理推送累计充值失败');

        //通知游戏服务器更新玩家资源
        $c -> get("$http_monitor/item-changed?uid=".$order['user_id'].'&types='.$this->_config->web['game_resource_changetypes'][1]);
        if($c->error)
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'CURL连接处理推送[充值]资源变化失败');
        $c -> close();

        //是否首次充值
        $isFirstRecharge = PaymentOrder::instance()->getNumsByUid($order['user_id']) > 0 ? 0 : 1;
        $data = array(
            'isFirstRecharge' => $isFirstRecharge,
            'money' => intval($order['money']),
            'recharge_type' => $recharge_type
        );
        Das::instance($platform,10001)->send($data,Das::PAYMENT);

        $data = array(
            't' => $order['diamond'],
            't_t'=>1,
            'p'=>0,
            'p_t'=>0
        );
        Das::instance($platform,10001)->send($data,Das::RESOURCE);
    }

    /***
     * @param $product 玩家兑换的商品表数组
     * @param $profile 玩家自己的资源表数组
     */
    function doAfterExchange($product,$profile){
        //处理用户资源日志
        $actionData = array(
            'action_type' => UserResource::ACTION_EXCHANGE,//资源变动类型:玩家兑换
            'tool_type' => $product['tool_type'],
            'price_type' => $product['price_type'],
            'price' => intval( $product['price'] ),
            'tool' => intval( $product['tool'] ),
            'uid' => $profile['user_id']
        );
        UserResourceLogModel::instance()->save($actionData);

        //发送货币出入统计到服务端
        if(intval($product['price']) > 0){
            Das::instance(Platform::CLIENT_ORIGIN_WEB,10001,0)->send(
                array(
                    't'=>0,
                    't_t'=>0,
                    'p'=>$product['price'],
                    'p_t'=>$product['price_type']
                ),
                Das::RESOURCE
            );
        }
        if(intval($product['tool']) > 0){
            Das::instance(Platform::CLIENT_ORIGIN_WEB,10001,0)->send(
                array(
                    't'=>$product['tool'],
                    't_t'=>$product['tool_type'],
                    'p'=>0,
                    'p_t'=>0
                ),
                Das::RESOURCE
            );
        }

        //通知游戏服务器刷新资源
        $http_monitor = $this->_config->common['http_monitor'];
        $ptypes = array();
        if(intval($product['tool']) > 0)
            $ptypes[] = $this->_config->web['game_resource_changetypes'][$product['tool_type']];
        if(intval($product['price']) > 0)
            $ptypes[] =  $this->_config->web['game_resource_changetypes'][$product['price_type']];
        $c = new Curl();
        $c->setOpt(CURLOPT_CONNECTTIMEOUT,2);
        $c->get("$http_monitor/item-changed?uid=".$profile['user_id'].'&types='.implode(',',$ptypes));
        if($c->error)
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'CURL连接处理推送[兑换]资源变化失败');
        $c->close();

        //如果兑换的是实物,写入系统公告并通知游戏服务器广播
        if(intval($product['product_type']) === 0){
            $user = UserModel::instance()->getUserByUid($profile['user_id']);
            $content = $user['nickname'].'兑换了 '.$product['name'];
            $time = time();
            $fields =array(
                'title'=>$content,
                'content'=>$content,
                'msg_time'=>$time,
                'publish_time'=>$time,
                'expire_time'=>$time,
                'state'=>1,
                'handler_id'=>1
            );
            SystemMessageModel::instance()->save($fields);

            $msg_time = date('YmdHi');
            $params = array(
                'uid'=> 0,
                'msg'=>$content,
                'msg_time'=>$msg_time
            );
            $c = new Curl();
            $c->setOpt(CURLOPT_CONNECTTIMEOUT,1);
            $c->post("$http_monitor/user-msg",$params);
            if($c->error)
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'CURL连接处理推送兑换信息公告失败');
            $c->close();
        }
    }
} 