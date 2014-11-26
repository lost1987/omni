<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/5
 * Time: 下午2:54
 */

namespace gms\model;

use core\AdminModel;

class Player_M extends AdminModel{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($id){
        $sql = "SELECT * FROM users WHERE id = ?";
        $this->_game_server->execute($sql,array($id));
        return $this->_game_server->fetch();
    }

    function save($fields){
        return $this->_game_server->save($fields,'users');
    }

    function update($fields,$id){
        return $this->_game_server->update($fields,'users',"WHERE uid = $id");
    }

    function del($id){
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->_game_server->execute($sql,array($id));
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

        $sql = "SELECT * FROM users {$this->_condition}  $limit";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch_all();
    }


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM users {$this->_condition}";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if(!empty($params['login_name']))
            $this->_condition[] = " login_name like '{$params['login_name']}%' ";

        $this->_condition[] = ' is_robot = 0 ';

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }
} 