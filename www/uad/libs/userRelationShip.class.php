<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/13
 * Time: 下午2:27
 */

namespace uad\libs;

use api\libs\Error;
use core\Base;
use core\Configure;
use core\DB;
use core\Encoder;
use utils\Tools;

/**
 * 用户关系类 此类供 api/web/uad 三个项目公共用
 * Class UserRelationShip
 * @package adm\libs
 * 1.一个用户只允许有一个上线,且绑定下线后,再无法绑定上线
 * 2.不管是向上取和向下取 只取4级算收益有效,其他不管
 */
class UserRelationShip extends Base{

    private $_gameDB = null;

    private $_admDb = null;

    private static $_instance = null;

    /**
     * 两个DB必须传一个
     * @param null $admDb
     * @param null $gameDB
     * @return null|UserRelationShip
     */
    static function instance(DB &$admDb = null,DB &$gameDB = null){
        if(self::$_instance == null)
            self::$_instance  = new self($admDb,$gameDB);
        return self::$_instance;
    }

    function __construct($admDb,$gameDB){
        $this->_admDb = $admDb;
        $this->_gameDB = $gameDB;
    }


    function getChildrenNumTopLeaf($uid){
        $sql = "SELECT COUNT(*) as num FROM adm_users WHERE pid = $uid";
        $this->_admDb->execute($sql);
        return $this->_admDb->fetch()['num'];
    }

    /**
     * 取出该用户的4级下线
     * @param     $uid   用户uid
     * @param     $users 必需传入一个空数组
     * @param int $leaf  树叶层级 此参数是给递归调用,外部调用请忽视
     * @return array[$leaf]["u$uid"][adm_users的数据map]
     */
    function getChildren($uid,&$users,$leaf=1){
        if($leaf == 5)
            return;

        $sql = "SELECT * FROM adm_users WHERE pid=?";
        $this->_admDb->execute($sql,array($uid));

        $temp = $this->_admDb->fetch_all();
        $tempUser = array();
        foreach($temp as $k=>$v){
            $tempUser['u'.$v['uid']] = $v;
        }

        if(count($users[$leaf]) > 0){
            $users[$leaf] = array_merge($users[$leaf],$tempUser);
        }else{
            $users[$leaf] = $tempUser;
        }
        unset($temp,$tempUser);

        $nextLeaf = $leaf+1;
        foreach($users[$leaf] as $uleaf){
            $this->getChildren( $uleaf['uid'] ,$users, $nextLeaf);
        }

        if(count($users[$leaf]) == 0)
            unset($users[$leaf]);
    }

    /**
     * 取用户的4级上线
     * @param $uid
     * @param $users 必需传入一个空数组
     * @param $limit 取层数 默认只取包括当前用户在内的向上4层 也就是该值是5
*    * @param $total 从0层开始 不可改变
     * @return 空数组 | 上层用户数组
     */
    function getParents($uid,&$users,$limit=5,$total = 0){
        if($total == $limit)
            return;
        $sql = "SELECT * FROM adm_users WHERE uid = ?";
        $this->_admDb->execute($sql,array($uid));
        $user = $this->_admDb->fetch();
        if(false == $user){
            return $users;
        }
        if($total > 0){
            $users[] = $user;
        }
        $total++;
        $this->getParents($user['pid'],$users,$limit,$total);
    }

    /**
     * 取出用户的上级用户
     * @param $uid
     * @return mixed
     */
    function getParent($uid){
        $sql = "SELECT * FROM adm_users WHERE uid = ?";
        $this->_admDb->execute($sql,array($uid));
        return $this->_admDb->fetch();
    }

    /**
     * 注意:必须在外面使用事务
     * 绑定上线
     * @param $uid
     * @param $pid
     * @return $code 错误代码或成功返回1
     */
    function bindParent($uid,$pid){
        if(!$this->_admDb->inTransaction() || !$this->_gameDB->inTransaction()){
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'function bindParent need beginTransaction');
            throw new \Exception('function bindParent need beginTransaction');
            exit;
        }

        //如果该用户没有和adm库users建立关联则建立关联
        $sql = "SELECT * FROM adm_users WHERE uid = ?";
        $this->_admDb->execute($sql,array($uid));
        $user = $this->_admDb->fetch();
        if(false == $user)
        {
            $sql = "SELECT * FROM users WHERE uid = ?";
            $this->_gameDB->execute($sql,array($uid));
            $gameUser = $this->_gameDB->fetch();
            if(!$this->createRelationShipFromGame($gameUser)){
                Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'error in line 139');
                throw new \Exception(UadError::DATA_WRITE);
            }
        }else{
            //确定用户无上线 才可绑定上线
            if($user['pid'] != 0)
                return Error::BIND_FAILED_ALREADY_HAS_PARENT;
        }

        //确定该用户无下线 才可绑定上线
        $children = array();
        $this->getChildren($uid,$children);
        if(count($children) == 0){
               //取该pid的3个上线 加上该pid 就是该用户的4级上线
               $parents = array();
               $this->getParents($pid,$parents,4);
               $pids = array();
               foreach($parents as $p){
                   $pids[] = $p['uid'];
               }
               array_unshift($pids,$pid);
               $pids = implode(',',$pids);
               $time = time();
               $sql = "UPDATE adm_users SET pid = ?,pids = ?,relation_time = ? WHERE uid = ?";
               if(!$this->_admDb->execute($sql,array($pid,$pids,$time,$uid))){
                   Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'error in line 160');
                   throw new \Exception(UadError::DATA_WRITE);
               }
               return 1;
        }
        else
            return Error::BIND_FAILED_CHILDREN_ALREADY_EXSITS;
    }

    /**
     * 注意:必须在外面使用事务
     * 建立用户推广和游戏用户的关联
     * @param $gameUser game库user表数组
     * @return bool
     */
    function createRelationShipFromGame($gameUser,&$inviteCode = null){

        if(!$this->_admDb->inTransaction() || !$this->_gameDB->inTransaction()){
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'function createRelationShipFromGame need beginTransaction');
            throw new \Exception('function createRelationShipFromGame need beginTransaction');
            exit;
        }

        if(empty($gameUser['invite_code'])){
            $sql = "UPDATE users SET invite_code = ? WHERE uid = ?";
            $inviteCode = UadUtil::instance()->createInviteCode($gameUser['uid']);
            if(!$this->_gameDB->execute($sql , array($inviteCode,$gameUser['uid'])))
                throw new \Exception(UadError::DATA_WRITE);
        }

        $time = time();
        $sql = "INSERT INTO adm_users (uid,pid,newcoins,login_name,nickname,state,create_time) VALUES ({$gameUser['uid']},0,0,'{$gameUser['login_name']}','{$gameUser['nickname']}',0,$time)";
        if(!$this->_admDb->execute($sql))
            throw new \Exception(UadError::DATA_WRITE);

        Configure::instance()->load('uad');
        $uadConfig = Configure::instance()->uad;

        //写入默认充值提成比例
        $rewardRecharge =$uadConfig['default_reward_recharge'];
        $sql = "INSERT INTO adm_reward_recharge (uid,ratio1,ratio2,ratio3,ratio4) VALUES
              ({$gameUser['uid']},{$rewardRecharge['ratio1']},{$rewardRecharge['ratio2']},{$rewardRecharge['ratio3']},{$rewardRecharge['ratio4']})";
        if(!$this->_admDb->execute($sql))
            throw new \Exception(UadError::DATA_WRITE);

        //写入默认登录奖励
        $rewardLogin = $uadConfig['default_reward_login'];
        $ratio1 = Encoder::instance()->encode($rewardLogin['ratio1']);
        $ratio2 = Encoder::instance()->encode($rewardLogin['ratio2']);
        $ratio3 = Encoder::instance()->encode($rewardLogin['ratio3']);
        $ratio4 = Encoder::instance()->encode($rewardLogin['ratio4']);
        $sql = "INSERT INTO adm_reward_login (uid,ratio1,ratio2,ratio3,ratio4) VALUES
              ({$gameUser['uid']},'{$ratio1}','{$ratio2}','{$ratio3}','{$ratio4}')";
        if(!$this->_admDb->execute($sql))
            throw new \Exception(UadError::DATA_WRITE);

        //写入默认升级奖励
        $rewardLevelup = $uadConfig['default_reward_levelup'];
        $ratio1 = Encoder::instance()->encode($rewardLevelup['ratio1']);
        $ratio2 = Encoder::instance()->encode($rewardLevelup['ratio2']);
        $ratio3 = Encoder::instance()->encode($rewardLevelup['ratio3']);
        $ratio4 = Encoder::instance()->encode($rewardLevelup['ratio4']);
        $sql = "INSERT INTO adm_reward_levelup (uid,ratio1,ratio2,ratio3,ratio4) VALUES
              ({$gameUser['uid']},'{$ratio1}','{$ratio2}','{$ratio3}','{$ratio4}')";
        if(!$this->_admDb->execute($sql))
            throw new \Exception(UadError::DATA_WRITE);

        //写入默认提现奖励
        $rewardDeposit = $uadConfig['default_reward_deposit'];
        $ratio1 = Encoder::instance()->encode($rewardDeposit['ratio1']);
        $ratio2 = Encoder::instance()->encode($rewardDeposit['ratio2']);
        $ratio3 = Encoder::instance()->encode($rewardDeposit['ratio3']);
        $ratio4 = Encoder::instance()->encode($rewardDeposit['ratio4']);
        $sql = "INSERT INTO adm_reward_deposit (uid,ratio1,ratio2,ratio3,ratio4) VALUES
              ({$gameUser['uid']},'{$ratio1}','{$ratio2}','{$ratio3}','{$ratio4}')";
        if(!$this->_admDb->execute($sql))
            throw new \Exception(UadError::DATA_WRITE);
        return true;
    }
}