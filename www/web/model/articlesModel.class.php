<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-14
 * Time: 上午9:48
 */

namespace web\model;


use core\DB;
use core\Model;

class ArticlesModel extends Model{

    private static $_instance = null;

    protected $db;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function __construct(){
        $this->db = new DB();
        $this->db->init_db_from_config('gms');
    }


    function lists($start=null,$count=null,$category_id=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT  $start,$count";

        if($category_id !== null){
            $category = " WHERE  a.category_id = $category_id";
        }

        $sql = "SELECT a.*,b.category_name FROM gms_articles a LEFT JOIN gms_articles_category b ON a.category_id = b.id $category ORDER BY a.publish_time DESC  $limit";
        $this->db->execute($sql);
        return  $this->db->fetch_all();
    }

    function listsFlag($flag,$unEqualCategoryId=null,$start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT  $start,$count";

        if($unEqualCategoryId !== null){
            $category = " and a.category_id <> $unEqualCategoryId";
        }

        $sql = "SELECT a.*,b.category_name FROM gms_articles a LEFT JOIN gms_articles_category b ON a.category_id = b.id WHERE FIND_IN_SET('$flag',a.flag) > 0 $category ORDER BY a.publish_time DESC  $limit";
        $this->db->execute($sql);
        return  $this->db->fetch_all();
    }

    function listsWithOutFlag($flag,$unEqualCategoryId=null,$start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT  $start,$count";

        if($unEqualCategoryId !== null){
            $category = " and a.category_id <> $unEqualCategoryId";
        }

        $sql = "SELECT a.*,b.category_name FROM gms_articles a LEFT JOIN gms_articles_category b ON a.category_id = b.id WHERE (a.flag is NULL or FIND_IN_SET('$flag',a.flag) = 0) $category ORDER BY a.publish_time DESC  $limit";
        $this->db->execute($sql);
        return  $this->db->fetch_all();
    }

    function num_rows(){
        $sql = "SELECT COUNT(*) AS num  FROM gms_articles";
        $this->db->execute($sql);
        return $this->db->fetch()['num'];
    }


    function read($id){
        $sql = "SELECT * FROM  gms_articles WHERE id = ? ";
        $this->db->execute($sql , array($id));
        return $this->db->fetch();
    }
} 