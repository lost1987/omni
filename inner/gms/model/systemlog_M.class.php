<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 下午5:46
 */

namespace gms\model;


use core\Model;

class Systemlog_M extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 保存日志
     */
    function save($fields){
        return $this->db->save($fields,'gms_core_system_log');
    }

    function del_by_admin_id($admin_id){
          $sql = "DELETE FROM gms_core_system_log WHERE admin_id = ?";
          return $this->db->execute($sql,array($admin_id));
    }
} 