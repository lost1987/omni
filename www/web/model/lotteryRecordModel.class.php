<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-8
 * Time: 下午2:58
 */

namespace web\model;


use core\Model;

class LotteryRecordModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save(Array $fields){
        return $this->db->save($fields,'lottery_record');
    }
} 