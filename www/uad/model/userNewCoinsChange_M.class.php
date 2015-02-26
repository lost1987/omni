<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/21
 * Time: 上午10:09
 */

namespace uad\model;


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

    function listsOfOthers($uid,$start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        if($this->_condition == ''){
            $this->_condition = " WHERE  uid = $uid AND from_uid <> 0";
        }else{
            $this->_condition .= " AND uid = $uid AND from_uid <> 0";
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

        if(!empty($params['search_from_uid']))
            $this->_condition[] = "from_uid = {$params['search_from_uid']}";

        if(!empty($params['search_change_time_start']))
            $this->_condition[] = " change_time >=  {$params['search_change_time_start']} ";

        if(!empty($params['search_change_time_end']))
            $this->_condition[] = " change_time <=  {$params['search_change_time_end']} ";

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

    /**
     * 获得特定类型的奖励收益总数
     * @param $uid
     * @param $fromUid
     * @param $changeType
     * @return mixed
     */
    function getNewcoinsFromUidAndType($uid,$fromUid,$changeType){
        $sql = "SELECT SUM(coins_change) as coins_change FROM adm_user_newcoins_change WHERE uid = ? AND from_uid = ? AND change_type = ?";
        $this->db->execute($sql,array($uid,$fromUid,$changeType));
        $coins_change = $this->db->fetch()['coins_change'];
        return empty($coins_change) ? 0 : $coins_change;
    }
}