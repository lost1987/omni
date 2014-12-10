<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-23
 * Time: 下午2:11
 */

namespace web\model;


use core\Model;

class StoreProductsModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists($start=null,$count=null,$category_id=0){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start,$count";

        $category = '';
        if($category_id != 0)
            $category = ' AND category_id = '.$category_id.' ';

        $sql = "SELECT * FROM store_products WHERE is_visible=1 $category ORDER BY id ASC $limit";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

    function read($product_id){
        $sql = "SELECT * FROM store_products WHERE id = ?";
        $this->db->execute($sql,array($product_id));
        return $this->db->fetch();
    }

    function num_rows($category_id=0){
        $category = '';
        if($category_id != 0)
            $category = ' AND category_id = '.$category_id.' ';
        $sql = "SELECT COUNT(*) as num  FROM store_products WHERE is_visible=1 $category ";
        $this->db->execute($sql);
        return $this->db->fetch()['num'];
    }
} 