<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/21
 * Time: 上午10:09
 */

namespace adm\model;


use core\Model;

class UserNewCoinsChange_M extends Model{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /*
     * @param $uid
     * @param null $start
     * @param null $count
     * @return mixed
     */
    function lists($uid,$start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        if($this->_condition == ''){
            $this->_condition = " WHERE  uid = $uid ";
        }else{
            $this->_condition .= " AND uid = $uid ";
        }

        $sql = "SELECT * FROM adm_user_newcoins_change {$this->_condition}  $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }


    function num_rows($uid){
        if($this->_condition == ''){
            $this->_condition = " WHERE  uid = $uid ";
        }else{
            $this->_condition .= " AND uid = $uid ";
        }
        $sql = "SELECT COUNT(*) as num FROM adm_user_newcoins_change {$this->_condition}";
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

    function save($fields){
            return $this->db->save($fields,'adm_user_newcoins_change');
    }
}