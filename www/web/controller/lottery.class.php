<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-8
 * Time: 上午9:17
 */

namespace web\controller;


use core\Controller;
use core\Cookie;
use core\Redis;
use utils\Tools;
use web\libs\Error;
use web\libs\UserResource;
use web\libs\UserUtil;
use web\model\IndexHandleResultModel;
use web\model\LotteryRecordModel;
use web\model\ProductOrderModel;
use web\model\ProfileModel;

/**
 * 抽奖
 * Class Lottery
 * @package web\controller
 */
class Lottery extends Controller{


    private $_redis = null;

    /**
     * 大奖库存的key
     * @var null
     */
    private $_week_key = null;

    /**
     * 其他奖项库存的key
     * @var null
     */
    private $_day_key = null;

    /**
     * 用户今天的抽奖数据key
     * @var null
     */
    private $_today_key = null;

    private $_uid = null;

    /**
     * 此数组的顺序必须是按chance的从小到大来排 奖品的从大到小排
     * @var array
     */
    private $_lottery_default = null;


    private $_user_lottery_default = null;


    function __construct(){
         parent::__construct();

         //检测用户是否登录
         if(!UserUtil::instance()->isLogin())
             $this->response(Error::ERROR_NO_LOGIN);
         $this->_uid = Cookie::instance()->userdata('uid');

         $redis_config = $this->config->web['redis'];
         $r  = new Redis($redis_config['host'],$redis_config['port']);
         $this->_redis = $r->getResource();
         unset($redis_config);
         unset($r);

         //获取今年的第几周
         $week = date('W');
         $day = date('Ymd');
         $this->_week_key = "lottery:#$week:inventory";
         $this->_day_key = "lottery:#$day:inventory";
         $this->_today_key = "lottery:user:#$day:#".$this->_uid;

        $this->_lottery_default = $this->config->common['lottery_default'];
        $this->_user_lottery_default = $this->config->common['user_lottery_default'];
    }


    function index(){
             $this->csrf_token_validation(false);

            //获得用户当天的数据
            $user_lottery = $this->user_lottery();

            //判断用户有没有抽奖的机会
            if($user_lottery['left'] > 0  && $user_lottery['max'] > 0){//剩余机会
                    $user_lottery['left'] -= 1;
                    $user_lottery['max'] -= 1;
            }else{
                    if($user_lottery['plus'] > 0){
                        $user_lottery['plus'] -= 1;
                    }else{
                        $this->response(Error::ERROR_NO_ENOUGH_COUNT);
                    }
            }

            //获取一等奖的库存
            $master_prize = $this->_redis->get($this->_week_key);
            if($master_prize === false || count($master_prize) == 0) {
                $this->_redis->hMset($this->_week_key, array('inventory' => $this->_lottery_default[0]['inventory']) );
                $master_prize = $this->_lottery_default[0];
            }else{
                $inventory = $master_prize['inventory'];
                $master_prize = Tools::array_fetch_child_by_key_value('level', 1 , $this->_lottery_default);
                $master_prize['inventory'] = $inventory;
            }

            $other_prizes = $this->_redis->hGetAll($this->_day_key);
            if($other_prizes === false || count($other_prizes) == 0){
                    $inventory = array();
                    $default_inventory = array();
                    foreach($this->_lottery_default as $k => $v){
                        if($k != 0) {
                            $default_inventory[$v['level']] = $v['inventory'];
                            $inventory[] = $v;
                        }
                    }
                    $this->_redis->hMset($this->_day_key,$default_inventory);
                    $other_prizes = $inventory;
            }else{
                    $temp = array();
                    foreach($other_prizes as $k => $v){
                            $t = Tools::array_fetch_child_by_key_value('level',$k,$this->_lottery_default);
                            $t['inventory'] = $v;
                            $temp[] = $t;
                    }
                    $other_prizes = $temp;
                    unset($t);
                    unset($temp);
            }


            //计算库存
            array_unshift($other_prizes,$master_prize);
            $prizes = $other_prizes;

            //计算得奖
            $result = $this->run($prizes);

            try{
                    $this->db->begin();

                    //扣除用户次数
                    if(!$this->_redis->hMset($this->_today_key,$user_lottery))
                            throw new \Exception(Error::ERROR_DATA_WRITE);

                    //扣库存
                    if($result['level'] == 1)
                        $this->_redis->hIncrBy($this->_week_key,'inventory',-1);
                    else
                        $this->_redis->hIncrBy($this->_day_key,$result['level'],-1);

                    $productOrderModel = ProductOrderModel::instance();
                    $handlerResultModel = IndexHandleResultModel::instance();
                    $lotteryRecordModel = LotteryRecordModel::instance();

                     $fields = array(
                            'handler_type' => 4,
                            'reporter_name' => Cookie::instance()->userdata('login_name'),
                            'note' => ''
                     );

                     if(isset($result['price']) && isset($result['price_type']))$fields['result'] = 4;
                     else $fields['result'] = 0;

                     if(!$handlerResultModel->save($fields))
                                throw new \Exception(Error::ERROR_DATA_WRITE);

                      $handler_id = $this->db->insert_id();

                      $fields = array(
                          'product_id' => $result['product_id'],
                          'user_id' => $this->_uid,
                          'create_at' => date('Y-m-d H:i:s'),
                          'ip' => Tools::getip(),
                          'handler_id' => $handler_id,
                          'name' => '',
                          'address' => '',
                          'mobile' => 0
                      );

                      if(!$productOrderModel->save($fields))
                                throw new \Exception(Error::ERROR_DATA_WRITE);
                      $order_id = $this->db->insert_id();

                      $fields = array(
                            'user_id' => $this->_uid,
                            'price' => $result['level'],
                            'timestamp' => date('YmdHis')
                      );

                      if(!$lotteryRecordModel->save($fields))
                                throw new \Exception(Error::ERROR_DATA_WRITE);

                      $result['type'] = 'normal';
                      if($result['level'] == 1 || $result['level'] == 2){
                                   $result['type'] = 'need_address';
                                   $result['order_id'] = $order_id;
                      }else if($result['level'] == 3 || $result['level'] == 4){
                                  $result['type'] = 'need_mobile';
                                  $result['order_id'] = $order_id;
                      }else{
                                  //给用户加资源
                                  $userResource = UserResource::instance( ProfileModel::instance()->read($this->_uid) );
                                  $userResource->add('_'.$result['price_type'],$result['price']);
                                  if(!$userResource->updateResource())
                                      throw new \Exception(Error::ERROR_DATA_WRITE);

                                  Cookie::instance()->set_userdata($result['price_type'],$userResource->getResource('_'.$result['price_type']));
                      }

                    $this->db->commit();

                      $this->response(0,$result);
            }catch (\Exception $e){
                    $this->db->rollback();
                    $this->response($e->getMessage());
            }
    }


    /**
     * 运行抽奖逻辑 并返回奖品属性数组
     * @param $prizes 库存奖品
     */
    private function run($prizes){
           $total_chance = 0;
           $indexes = array();
           $values = array();
           foreach($prizes as $k =>  $prize){
                if($prize['inventory'] > 0) {
                    $total_chance += $prize['chance'];
                    $indexes[] = $k + 10000*$prize['chance'];//索引和chance数组
                    $values[] = $prize['chance'];//纯chance数组 将会把随机到的chance加入并排序计算
                }
           }

           $chance = mt_rand(1,$total_chance);
           $values[] = $chance;
            sort($values);//从小到大排序

            //判断自己的chance最大
            if(max($values) == $chance){
                    $idx = max($indexes)%10000;
            }else if(min($values) == $chance){
                    $idx = 0;
            }else{
                    //当前随机出的chance的索引
                    $current_idx = array_keys($values,$chance)[0];
                    //下一个chance的值
                    $next_chance =  $values[$current_idx+1];

                    foreach($indexes as $index){
                         $temp_chance = ($index/10000)>>0;

                         if($temp_chance == $next_chance) {
                             $idx = $index % 10000;
                             break;
                         }
                    }
            }

           $prize = $prizes[$idx];
           return $prize;
    }


    /**
     * 获取用户的当天数据
     */
    private function user_lottery(){
        //获得用户当天的数据
        $user_lottery = $this->_redis->hGetAll($this->_today_key);
        if($user_lottery === false || count($user_lottery) == 0){
            $this->_user_lottery_default['uid'] = $this->_uid;
            $this->_redis->hMset($this->_today_key,$this->_user_lottery_default);
            $user_lottery = $this->_user_lottery_default;
        }
        return $user_lottery;
    }


    /**
     * 获得用户的抽奖次数
     */
    function times(){
        $user_lottery = $this->user_lottery();
        $times = $user_lottery['left'] + $user_lottery['plus'];
        return $times;
    }

    /**
     * 新浪微博分享后 加抽奖次数
     */
    function shared(){
        $user_lottery = $this->user_lottery();
        if($user_lottery['shared'] == 0){
            $this->_redis->hIncrBy($this->_today_key,'shared',1);
            $this->_redis->hIncrBy($this->_today_key,'plus',3);
            $this->_redis->hIncrBy($this->_today_key,'max',3);
        }
    }

    /**
     * 抽奖-填补联系方式
     */
    function fillinfo(){
            $this->csrf_token_validation(false);
            if(!UserUtil::instance()->isLogin())
                    $this->response(Error::ERROR_NO_LOGIN);
            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $order_id = $this->input->post('order_id');

            if(empty($name) || empty($mobile))
                $this->response(Error::ERROR_STRING_FORMAT);

            $fields = array(
                'name' => $name,
                'mobile' => $mobile,
                'address' => $address
            );

            if(!ProductOrderModel::instance()->update($fields,$order_id))
                $this->response(Error::ERROR_DATA_WRITE);

            $this->response(0);
    }
}