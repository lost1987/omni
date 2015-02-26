<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/13
 * Time: 下午2:27
 */

namespace adm\libs;


use core\Base;
use core\DB;

/**
 * 用户关系类
 * Class UserRelationShip
 * @package adm\libs
 * 1.一个用户只允许有一个上线,且绑定下线后,再无法绑定上线
 * 2.不管是向上取和向下取 只取4级算收益有效,其他不管
 */
class UserRelationShip extends Base{

    private $_gamedb = null;

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance  = new self;
        return self::$_instance;
    }

    function __construct(){
        $this->_gamedb = new DB();
        $this->_gamedb->init_db_from_config('game');
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
        $this->db->execute($sql,array($uid));

        $temp = $this->db->fetch_all();
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
     * @param $total 总层数 默认只取包括当前用户在内的向上5层
     * @return 空数组 | 上层用户数组
     */
    function getParents($uid,&$users,$total = 0){
        if($total == 5)
            return;
        $sql = "SELECT * FROM adm_users WHERE uid = ?";
        $this->db->execute($sql,array($uid));
        $user = $this->db->fetch();
        if(false == $user){
            return $users;
        }
        if($total > 0){
            $users[] = $user;
        }
        $total++;
        $this->getParents($user['pid'],$users,$total);
    }

    /**
     * 取出用户的上级用户
     * @param $uid
     * @return mixed
     */
    function getParent($uid){
        $sql = "SELECT * FROM adm_users WHERE uid = ?";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch();
    }

}