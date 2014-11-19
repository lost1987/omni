<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/12
 * Time: 上午11:20
 */

namespace gms\model;


use core\Model;

class MobileProductLog_M extends  Model{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save($fields){
        return $this->db->save($fields,'gms_mobile_product_log');
    }
} 