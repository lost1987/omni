<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/1
 * Time: 下午2:18
 */

namespace gms\model;


use core\Model;

class WhiteList extends Model{

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

        $sql = "SELECT * FROM gms_white_list {$this->_condition}  $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM gms_white_list {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }
} 