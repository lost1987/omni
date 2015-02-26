<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/14
 * Time: 上午11:25
 */

namespace uad\model;


use core\Model;

class UserDeposit_M extends Model {

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

        $sql = "SELECT a.*,b.nickname,b.login_name FROM adm_user_deposit a LEFT JOIN adm_users b ON a.uid = b.uid {$this->_condition}  $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }

    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM adm_user_deposit {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if(!empty($params['search_order_no']))
            $this->_condition[] = " a.order_no = '{$params['search_order_no']}' ";

        if(!empty($params['search_create_time_start']))
            $this->_condition[] = " a.create_time >= '".strtotime($params['search_create_time_start'])."'";

        if(!empty($params['search_create_time_end']))
            $this->_condition[] = " a.create_time <= '".strtotime($params['search_create_time_end'])."'";

        if($params['search_state'] >= 0 && $params['search_state']!='')
            $this->_condition[] = " a.state = {$params['search_state']}";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }

    function read($id){
        $sql = "SELECT * FROM adm_user_deposit WHERE id = ?";
        $this->db->execute($sql,array($id));
        return $this->db->fetch();
    }

    function readByUid($uid){
        $sql = "SELECT * FROM adm_user_deposit WHERE uid = ?";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch_all();
    }

    function readByOrderNo($orderNo){
        $sql = "SELECT * FROM adm_user_deposit WHERE order_no = ?";
        $this->db->execute($sql,array($orderNo));
        return $this->db->fetch();
    }

    //累计提现
    function readDepositTotal($uid){
        $sql = "SELECT SUM(money) as money FROM adm_user_deposit WHERE uid = ? AND state = 1";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch()['money'];
    }

    function update($fields,$id){
        return $this->db->update($fields,'adm_user_deposit'," WHERE id = $id");
    }

    function save($fields){
        return $this->db->save($fields,'adm_user_deposit');
    }
} 