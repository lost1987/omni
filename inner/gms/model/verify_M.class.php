<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/19
 * Time: 上午10:40
 */

namespace gms\model;


use core\Model;

class Verify_M extends Model{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists($start=null,$count=null){
            $limit = '';
            if($start !== null && $count !==null)
                $limit = " LIMIT $start,$count";
            $sql = " SELECT * FROM gms_verify  {$this->_condition} ORDER BY create_time DESC  $limit";
            $this->db->execute($sql);
            $this->_condition = '';
            return $this->db->fetch_all();
    }

    function  num_rows(){
        $sql = " SELECT COUNT(*) as num  FROM gms_verify  {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    function set_condition($params){
        $this->_condition = array();

        if(isset($params['state']))
            $this->_condition[] = " state = {$params['state']} ";

        if(isset($params['type']))
            $this->_condition[] = " type = {$params['type']} ";

        if(isset($params['server_id']))
            $this->_condition[] = " server_id = {$params['server_id']} ";

        if(isset($params['abstract_id']))
            $this->_condition[] = " abstract_id = {$params['abstract_id']} ";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;

    }

    function save($fields){
            return $this->db->save($fields,'gms_verify');
    }

    function update($fields,$id){
           return $this->db->update($fields,'gms_verify'," WHERE id = $id");
    }
} 