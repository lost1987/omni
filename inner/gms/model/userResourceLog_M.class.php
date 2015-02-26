<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/19
 * Time: 下午2:54
 */

namespace gms\model;


use core\AdminModel;

class UserResourceLog_M extends AdminModel{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        $sql = "SELECT *  FROM user_resource_log   {$this->_condition} ORDER BY create_time DESC $limit";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch_all();
    }

    function num_rows(){
        $sql = "SELECT count(*) as num  FROM user_resource_log   {$this->_condition}";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch()['num'];
    }

    function set_condition($params){
        $this->_condition = array();

        if(isset($params['uid']))
            $this->_condition[] = " uid = {$params['uid']} ";

        if(!empty($params['start_time'])) {
            $time = strtotime($params['start_time']);
            $this->_condition[] = " create_time >= $time ";
        }

        if(!empty($params['end_time'])) {
            $time = strtotime($params['end_time']);
            $this->_condition[] = " create_time <= $time ";
        }

        if(intval($params['action_type']) >0)
            $this->_condition[] = " action_type = {$params['action_type']}";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }
} 