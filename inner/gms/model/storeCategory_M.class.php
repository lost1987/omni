<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/10
 * Time: 下午4:11
 */

namespace gms\model;


use core\AdminModel;
use gms\libs\Error;

class StoreCategory_M extends AdminModel{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($product_id){
        $sql = "SELECT * FROM store_category WHERE id = ?";
        $this->_game_server->execute($sql,array($product_id));
        return $this->_game_server->fetch();
    }

    function save($fields){
        return $this->_game_server->save($fields,'store_category');
    }

    function del($id){
        //先判断商品表里 是否有关联数据
        $sql = "SELECT COUNT(*)  as  num FROM store_products WHERE category_id = $id";
        $this->_game_server->execute($sql);
        $result = $this->_game_server->fetch()['num'];
        if($result > 0)
            throw new \Exception(Error::DATA_REFERENCE);

        $sql  = "DELETE FROM store_category  WHERE id = ?";
        return $this->_game_server->execute($sql,array($id));
    }

    function update($fields,$id){
        return $this->_game_server->update($fields,'store_category'," WHERE id=$id");
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


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM  store_category  {$this->_condition}";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch()['num'];
    }

} 