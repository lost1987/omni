<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-25
 * Time: 下午4:26
 */

namespace web\model;


use core\Model;

/**
 * 用户反馈
 * Class FeedBackModel
 * @package web\model
 */
class FeedBackModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save(Array $fields){
        return $this->db->save($fields,'index_feedback');
    }

} 