<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/2/6
     * Time: 下午3:35
     */

    namespace api\controller;

    use api\core\GameServerController;
    use api\libs\Error;
    use core\DB;
    use core\Encoder;
    use core\Redis;
    use utils\Tools;

    /**
     * 游戏事件
     * Class Uad
     * @package api\controller
     */
    class GameEvent extends GameServerController{

        function __construct(){
            parent::__construct(true);
        }

        function event(){
            $event = $this->input->post('t');
            switch($event){
                case 1: $this->levelUpEvent();
                    break;
                case 2: $this->signCountEvent();
                    break;
                default :
                    Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'no such event');
                    $this->response(null);
            }
        }

        private function isUadUser($admDb){
            $uid = $this->input->post('uid');
            $sql = "SELECT * FROM adm_users WHERE uid  =  ?";
            $admDb -> execute($sql,array($uid));
            $user = $admDb->fetch();
            if(false == $user){
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'用户没有激活推广系统所以无法获取升级和签到的奖励');
                $this->response(null);
            }
            return $user;
        }

        /**
         * 玩家升级时触发
         */
        private  function levelUpEvent(){
            $admDb = new DB();
            $admDb->init_db_from_config('adm');
            $user = $this->isUadUser($admDb);
            $lv = $this->input->post('param');
            $uid = $user['uid'];

            if(!empty($user['pids'])) {
                $pids = explode(',',$user['pids']);
                try {
                    $admDb->begin();
                    for ( $i = 0 ; $i < count( $pids ) ; $i ++ ) {//按从下到上的关系依次取出 先取出的是最低级也就是相对该pid是1级下线
                        //读取$i+1级下线的奖励
                        $sql = "SELECT * FROM adm_reward_levelup WHERE uid = ?";
                        $admDb->execute($sql,array($pids[ $i ]));
                        $rewardLvUp = $admDb->fetch();
                        $ratio = Encoder::instance()->decode($rewardLvUp[ 'ratio' . ( $i + 1 ) ]);
                        $newCoinsAdd = 0;
                        for ( $j = 0 ; $j < count( $ratio ) ; $j ++ ) {
                            error_log($j);
                            if ( $lv >= $ratio[ $j ]['lv'] && isset( $ratio[ $j + 1 ] ) ) {
                                if ( $lv >= $ratio[ $j + 1 ]['lv'] ) {//处于条件中
                                    continue;
                                } else {//处于条件中
                                    $newCoinsAdd = $ratio[ $j ]['newcoins'];
                                    break 1;
                                }
                            } else {//最后一个条件且满足条件
                                if($lv ==  $ratio[ $j ]['lv'])
                                    $newCoinsAdd = $ratio[ $j ]['newcoins'];
                                break 1;
                            }
                        }

                        if($newCoinsAdd > 0){
                            $time = time();
                            $sql1 = "UPDATE adm_users SET newcoins = newcoins+$newCoinsAdd WHERE uid = {$pids[$i]};";
                            $sql2 = "INSERT INTO adm_user_newcoins_change (uid,coins_change,change_time,change_type,from_uid)
                                VALUES ({$pids[$i]},$newCoinsAdd,$time,1,$uid);";
                            if ( !$admDb->execute( $sql1 ) || !$admDb->execute( $sql2 ))
                                throw new \Exception( Error::DATA_WRITE_ERROR );
                        }
                        usleep( 100 );
                    }
                    $admDb->commit();
                } catch (\Exception $e) {
                    $admDb->rollback();
                    Tools::debug_log( __CLASS__ , __FUNCTION__ , __FILE__ , '玩家升级推广系统给予奖励数据出错' , $e );
                }
            }
            $this->response(null);
        }

        /**
         * 玩家签到时触发
         */
        private function signCountEvent(){
            $admDb = new DB();
            $admDb->init_db_from_config('adm');
            $user = $this->isUadUser($admDb);
            $uid = $user['uid'];
            $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
            $redis = $r->getResource();
            $redis->select(2);
            $key = 'signCountAccumulate:'.$uid;
            $sign = $redis->incr($key);

            if(!empty($user['pids'])) {
                $pids = explode( ',' , $user['pids'] );
                try {
                    $admDb->begin();
                    for ( $i = 0 ; $i < count( $pids ) ; $i ++ ) {//按从下到上的关系依次取出 先取出的是最低级也就是相对该pid是1级下线
                        //读取$i+1级下线的奖励
                        $sql = "SELECT * FROM adm_reward_login WHERE uid = ?";
                        $admDb->execute($sql,array($pids[ $i ]));
                        $rewardSign = $admDb->fetch();
                        $ratio = Encoder::instance()->decode($rewardSign[ 'ratio' . ( $i + 1 ) ]);
                        $newCoinsAdd = 0;
                        for ( $j = 0 ; $j < count( $ratio ) ; $j ++ ) {
                            if ( $sign >= $ratio[ $j ]['days'] && isset( $ratio[ $j + 1 ] ) ) {
                                if ( $sign >= $ratio[ $j + 1 ]['days'] ) {//处于条件中
                                    continue;
                                } else {//处于条件中
                                    $newCoinsAdd = $ratio[ $j ]['newcoins'];
                                    break 1;
                                }
                            } else {//最后一个条件且满足条件
                                if($sign == $ratio[$j]['days'] ) {
                                    $newCoinsAdd = $ratio[ $j ]['newcoins'];
                                    $redis->set($key,0);
                                }
                                break 1;
                            }
                        }

                        if($newCoinsAdd > 0){
                            $time = time();
                            $sql1 = "UPDATE adm_users SET newcoins = newcoins+$newCoinsAdd WHERE uid = {$pids[$i]};";
                            $sql2 = "INSERT INTO adm_user_newcoins_change (uid,coins_change,change_time,change_type,from_uid)
                                VALUES ({$pids[$i]},$newCoinsAdd,$time,2,$uid);";
                            if ( !$admDb->execute( $sql1 ) || !$admDb->execute( $sql2 ))
                                throw new \Exception( Error::DATA_WRITE_ERROR );
                        }
                        usleep( 100 );
                    }
                    $admDb->commit();
                } catch (\Exception $e) {
                    $redis->decr($key);
                    $admDb->rollback();
                    Tools::debug_log( __CLASS__ , __FUNCTION__ , __FILE__ , '玩家签到推广系统给予奖励数据出错' , $e );
                }
            }
            $redis->close();
            $this->response(null);
        }

    }