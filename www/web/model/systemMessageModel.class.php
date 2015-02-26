<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-28
 * Time: 上午11:59
 */

namespace web\model;


use core\Model;

/**
 * 日志或公告
 * Class SystemMessageModel
 * @package web\model
 */
class SystemMessageModel extends Model {
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }


    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT  $start,$count";

        $sql = "SELECT * FROM system_messages ORDER BY id DESC  $limit";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

    function num_rows(){
        $sql = "SELECT COUNT(*) AS num  FROM system_messages";
        $this->db->execute($sql);
        return $this->db->fetch()['num'];
    }


    function read($id){
        $sql = "SELECT * FROM  system_messages WHERE id = ?";
        $this->db->execute($sql , array($id));
        return $this->db->fetch();
    }

    function save($fields){
        return $this->db->save($fields,'system_messages');
    }
} 