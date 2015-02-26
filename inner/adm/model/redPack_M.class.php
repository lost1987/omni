<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/13
 * Time: 下午3:43
 */

namespace adm\model;


use core\Model;

class RedPack_M extends Model{

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

        $sql = "SELECT * FROM adm_redpack {$this->_condition}  ORDER BY id DESC $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM adm_redpack {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if($params['search_state'] != -1 && $params['search_state'] != '')
            $this->_condition[] = " state = {$params['search_state']} ";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }
} 