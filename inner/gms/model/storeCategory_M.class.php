<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/10
 * Time: 下午4:11
 */

namespace gms\model;


use core\AdminModel;

class StoreCategory_M extends AdminModel{

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

        $sql = "SELECT * FROM store_category {$this->_condition} $limit ";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        $result_array =  $this->_game_server->fetch_all();
        $array = array();
        foreach($result_array as $k => $v){
             $array[$v['id']] = $v;
        }
        unset($result_array);
        return $array;
    }

} 