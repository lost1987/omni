<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 下午5:46
 */

namespace gms\model;


use core\Model;

class Systemlog_M extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }


    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        $sql = "SELECT * FROM gms_core_system_log {$this->_condition}  ORDER BY operation_time DESC $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM gms_core_system_log {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if(!empty($params['module_id']))
            $this->_condition[] = " module_id = {$params['module_id']} ";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }

    /**
     * 保存日志
     */
    function save($fields){
        return $this->db->save($fields,'gms_core_system_log');
    }

    function del_by_admin_id($admin_id){
          $sql = "DELETE FROM gms_core_system_log WHERE admin_id = ?";
          return $this->db->execute($sql,array($admin_id));
    }
} 