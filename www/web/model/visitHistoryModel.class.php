<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/11
 * Time: 下午5:02
 */

namespace web\model;


use core\Model;

class VisitHistoryModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function currentUserMaxId($uid){
        $sql = "SELECT MAX(id) as id FROM visit_history WHERE user_id = ?";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch()['id'];
    }

    function save($fields){
        return $this->db->save($fields,'visit_history');
    }

    function update($fields , $id){
        return $this->db->update($fields,'visit_history'," WHERE id = $id");
    }
} 