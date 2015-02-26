<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/2
 * Time: 下午5:10
 */

namespace gms\model;


use core\AdminModel;

class ArticleCategory_M extends AdminModel {

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists(){
        $sql = "SELECT * FROM gms_articles_category";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }
} 