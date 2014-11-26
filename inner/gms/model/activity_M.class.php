<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/20
 * Time: 下午3:04
 */

namespace gms\model;


use core\AdminModel;

class Activity_M extends AdminModel{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save($fields){
         $this->_game_server->save($fields,'activities');
         return $this->_game_server->insert_id();
    }

    function update($fields,$id){
        return $this->_game_server->update($fields,'activities','WHERE id='.$id);
    }


    function read($id){
         $sql = "SELECT * FROM activities WHERE id = ? ";
         $this->_game_server->execute($sql,array($id));
         return $this->_game_server->fetch();
    }

    function del($id){
        $sql = "DELETE FROM activities WHERE id = ?";
        return $this->_game_server->execute($sql,array($id));
    }

    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        $sql = "SELECT * FROM activities  {$this->_condition}  ORDER BY publish_time DESC $limit ";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch_all();
    }


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM activities {$this->_condition}";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch()['num'];
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