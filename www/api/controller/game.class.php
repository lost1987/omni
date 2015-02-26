<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/23
 * Time: 下午4:48
 */

namespace api\controller;


use api\core\GameServerController;
use api\libs\Error;
use core\DB;
use core\Redis;
use uad\libs\UserRelationShip;
use utils\Tools;
use web\model\SystemMessageModel;
use web\model\UserModel;

/**
 * 处理游戏服务的接口
 * Class Game
 * @package api\controller
 */
class Game extends GameServerController{

    /**
     * 获取最新的10条公告内容
     */
    function system_msg(){
         $list = SystemMessageModel::instance()->lists(0,10);
         $output = array();
         foreach($list as $v){
             $output[]['content'] = $v['content'];
         }
         unset($list);
         $this->response($output);
    }

    /**
     * 输入邀请码
     * @http post params
     *       string uid
     *       string inviteCode
     */
    function invite(){
        $this->initRedis();
        $this->signVerify();

        $post = $this->input->post();
        $uid = $post['uid'];
        $inviteCode = $post['inviteCode'];
        $parent = UserModel::instance()->getUserByInviteCode($inviteCode);
        if(false == $parent)
            $this->response(null,Error::INVITE_CODE_NOT_EXSIT);

        if($uid == $parent['uid'])
            $this->response(null,Error::BIND_FAILED_UNKOWN_PARENT);

        $admDb = new DB();
        $admDb->init_db_from_config('adm');

        //判断邀请人是否已经加入过推广系统
        $sql = "SELECT COUNT(*) as num FROM adm_users WHERE uid = ?";
        $admDb->execute($sql,array($parent['uid']));
        $num = $admDb->fetch()['num'];
        if(intval($num) <=  0)
            $this->response(null,Error::BIND_FAILED_UNKOWN_PARENT);

        //判断被邀请人是否已经是邀请人的下线了
        $sql = "SELECT pids FROM adm_users WHERE uid = ?";
        $admDb->execute($sql,array($uid));
        $user = $admDb->fetch();
        if(!empty($user['pids'])){
            $pids = explode(',',$user['pids']);
            if(in_array($parent['uid'],$pids))
                $this->response(null,Error::BIND_FAIED_IS_PARENT_CHILD);
            unset($pids);
        }

        try{
            $admDb -> begin();
            $this->db->begin();
            $relationShip = UserRelationShip::instance($admDb,$this->db);
            $result = $relationShip->bindParent($uid,$parent['uid']);
            if($result != 1){//如果绑定关系不成功
                $admDb -> rollback();
                $this->db->rollback();
                $this->response(null,$result);
            }

            $admDb->commit();
            $this->db->commit();
            $this->response(null);
        }catch (\Exception $e){
            $admDb->rollback();
            $this->db->rollback();
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'输入邀请码绑定关系失败',$e);
            $this->response(null,$e->getMessage());
        }
    }

    function invitePrizes(){
        $uid = $this->input->post('uid');
        $admDb = new DB();
        $admDb->init_db_from_config('adm');

        $sql = " SELECT  pid  FROM adm_users WHERE uid = ? ";
        $admDb->execute($sql,array($uid));
        $pid = $admDb->fetch()['pid'];
        if(empty($pid))
            $this->response(null,Error::BIND_FAILED_UNKOWN_PARENT);

        $parent = UserModel::instance()->getUserByUid($pid);
        $r = new Redis($this->config->web['redis']['host'],$this->config->web['redis']['port']);
        $redis = $r->getResource();
        $redis->select(2);
        $redPackKey = 'redpack:'.date('Ymd');

        $redpack_id = 0;
        $countPrize_id = 0;
        $time = time();

        try{
            $admDb -> begin();
            $this->db->begin();
            $relationShip = UserRelationShip::instance($admDb,$this->db);

            $sql = "SELECT count(*) as num FROM adm_gift_log WHERE uid = ? AND gift_id = ?";
            $admDb->execute($sql,array($parent['uid'],3));
            $num = $admDb->fetch()['num'];
            if(intval($num) == 0){
                //查看累计邀请
                $childrenNum = $relationShip->getChildrenNumTopLeaf($parent['uid']);

                if($childrenNum >= 10){
                    //发送累计礼包
                    $countPrize_id = 3;
                    $sql = "INSERT INTO adm_gift_log (uid,gift_id,create_time) VALUES ({$parent['uid']},3,$time)";
                    if(!$admDb->execute($sql))
                        throw new \Exception(Error::DATA_WRITE_ERROR);
                }
            }

            //判断红包
            $sql = "SELECT count(*) as num FROM adm_redpack_log WHERE uid = ?";
            $admDb->execute($sql,array($uid));
            $num = $admDb->fetch()['num'];
            if(intval($num) == 0){
                $sql = "SELECT * FROM adm_redpack WHERE state=0";
                $admDb->execute($sql);
                $packs = $admDb->fetch_all();

                if(count($packs) > 0){
                    $redPackCountLimit = $redis->get($redPackKey);
                    if(intval($redPackCountLimit) < 100){
                        //发送红包
                        $redpack = $packs[0];
                        $sql = "UPDATE adm_redpack SET state=1 WHERE id = ?";
                        if(!$admDb -> execute($sql,array($redpack['id'])))
                            throw new \Exception(Error::DATA_WRITE_ERROR);

                        $sql = "INSERT INTO adm_redpack_log (uid) VALUES ($uid)";
                        if(!$admDb -> execute($sql))
                            throw new \Exception(Error::DATA_WRITE_ERROR);

                        if(empty($redPackCountLimit))
                            $redis->setTimeout($redPackKey,48*60*60);
                        $redis->incr($redPackKey);//如果 key 不存在，那么 key 的值会先被初始化为 0 ，然后再执行 INCR 操作。

                        $redpack_id = $redpack['id'];
                    }
                }
            }

            if($redpack_id != 0){
                $invitedPrizes[] = array(
                    'type'=>'red',
                    'id' => intval($redpack_id)
                );
            }else{
                $sql = "INSERT INTO adm_gift_log (uid,gift_id,create_time) VALUES ($uid,1,$time)";
                if(!$admDb->execute($sql))
                    throw new \Exception(Error::DATA_WRITE_ERROR);
                $invitedPrizes[] = array(
                    'type' => 'prize',
                    'id' => 1//新手礼包
                );
            }

            $sql = "INSERT INTO adm_gift_log (uid,gift_id,create_time) VALUES ({$parent['uid']},2,$time)";
            if(!$admDb->execute($sql))
                throw new \Exception(Error::DATA_WRITE_ERROR);
            $invitePrizes[] = array(
                'type' => 'prize',
                'id' => 2//邀请普通礼包
            );

            if($countPrize_id != 0){
                $invitePrizes[] = array(
                    'type' => 'prize',
                    'id' => intval($countPrize_id)
                );
            }

            $response = array(
                'invited' => intval($uid),
                'invite' => intval($parent['uid']),
                'invited_prizes' => $invitedPrizes,
                'invite_prizes' => $invitePrizes
            );

            $admDb->commit();
            $this->db->commit();
            $redis->close();
            $this->response($response);
        }catch (\Exception $e){
            $admDb->rollback();
            $this->db->rollback();
            if($redpack_id != 0){
                $redis->decr($redPackKey);
            }
            $redis->close();
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'获取礼包失败',$e);
            $this->response(null,$e->getMessage());
        }
    }
} 