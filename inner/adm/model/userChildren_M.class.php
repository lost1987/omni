<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/22
 * Time: 上午9:15
 */

namespace adm\model;


use core\Model;

class UserChildren_M extends Model{

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
    function lists($uid,$start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        if(empty($this->_condition))
            $this->_condition = " WHERE FIND_IN_SET($uid,pids) > 0";
        else
            $this->_condition .= " AND FIND_IN_SET($uid,pids) > 0";

        $sql = "SELECT * FROM adm_users {$this->_condition}  $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }


    function num_rows($uid){
        if(empty($this->_condition))
            $this->_condition = " WHERE FIND_IN_SET($uid,pids) > 0";
        else
            $this->_condition .= " AND FIND_IN_SET($uid,pids) > 0";

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
} 