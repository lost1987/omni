<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/14
 * Time: 上午11:25
 */

namespace uad\model;


use core\Model;

class User_M extends Model {

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }


    /**
     * 取得管理员列表
     * @param null $start
     * @param null $count
     * @return mixed
     */
    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        $sql = "SELECT * FROM adm_users {$this->_condition}  $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM adm_users {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if(!empty($params['search_user']))
            $this->_condition[] = " login_name = '{$params['search_user']}' or nickname = '{$params['search_user']}' ";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }

    function read($uid){
        $sql = "SELECT * FROM adm_users WHERE uid = ?";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch();
    }

    function readByNickName($nickname){
        $sql = "SELECT * FROM adm_users WHERE nickname = ?";
        $this->db->execute($sql,array($nickname));
        return $this->db->fetch();
    }

    function save($fields){
        return $this->db->save($fields,'adm_users');
    }

    function update($fields,$uid){
        return $this->db->update($fields,'adm_users'," WHERE uid = $uid");
    }
} 