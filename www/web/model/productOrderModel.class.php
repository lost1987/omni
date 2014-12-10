<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-19
 * Time: 上午9:58
 */

namespace web\model;


use core\Model;

class ProductOrderModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 联表查询 store_product_order 和 store_products
     * @param $uid
     */
    function read($uid,$start= null ,$count = null){
            $limit = '';
            if($start !== null && $count !== null){
                $limit = " LIMIT $start,$count";
            }
            $sql = "SELECT  a.id,a.create_at, b.name,b.tool,b.tool_type,b.price,b.price_type,c.result FROM store_productorder a LEFT JOIN store_products b ON a.product_id = b.id LEFT JOIN index_handleresult c  ON a.handler_id = c.id WHERE user_id = ? $limit ";
            $this->db->execute($sql,array($uid));
            return $this->db->fetch_all();
    }

    /**
     * 联表查询 store_product_order 和 store_products
     * @param $uid
     */
    function readByOrderId($orderid){
        $sql = "SELECT  a.id,a.create_at,b.name,b.tool,b.tool_type,b.price,b.price_type,c.result,c.handler_type FROM store_productorder a LEFT JOIN store_products b ON a.product_id = b.id LEFT JOIN  index_handleresult c ON a.handler_id = c.id  WHERE a.id = ?";
        $this->db->execute($sql,array($orderid));
        return $this->db->fetch();
    }

    /**
     * 通过主键ID获取一条数据
     * @param $id
     * @return mixed
     */
    function readById($id){
        $sql = "SELECT * FROM store_productorder WHERE id = ?";
        $this->db->execute($sql,array($id));
        return $this->db->fetch();
    }


    function lists($start = null , $count = null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT  $start,$count";
        $sql = "SELECT * FROM store_productorder  ORDER BY create_at DESC $limit";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

    function lists_lottery($start = null , $count = null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT  $start,$count";
        $sql = "SELECT * FROM store_productorder a,store_products b WHERE a.product_id = b.id AND b.category_id = 4 ORDER BY a.create_at  DESC $limit";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }


    function update(Array $fields,$id){
        return $this->db->update($fields,'store_productorder','WHERE id = '.$id);
    }

    function save(Array $fields){
        return $this->db->save($fields,'store_productorder');
    }

} 