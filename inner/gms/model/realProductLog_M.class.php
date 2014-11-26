<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/12
 * Time: 上午9:20
 */

namespace gms\model;
use core\Model;

class RealProductLog_M extends Model{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save($fields){
            return $this->db->save($fields,'gms_real_product_log');
    }

    /**
     * 通过handler_id 查找物品兑换的发货或充值记录
     * @param $handler_id
     * @return mixed
     */
    function getLogByHandlerId($handler_id,$sid){
            $sql = "SELECT express_name,express_no,address,desp  FROM gms_real_product_log WHERE handler_id = ? and sid = ?";
            $this->db->execute($sql,array($handler_id,$sid));
            return $this->db->fetch();
    }
} 