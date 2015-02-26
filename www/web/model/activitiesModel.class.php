<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-14
 * Time: 上午9:48
 */

namespace web\model;


use core\Model;

class ActivitiesModel extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }


    function lists($start=null,$count=null,$order='DESC'){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT  $start,$count";

        $sql = "SELECT * FROM activities ORDER BY publish_time $order  $limit";
        $this->db->execute($sql);
        return  $this->db->fetch_all();

    }

    function num_rows(){
        $sql = "SELECT COUNT(*) AS num  FROM activities";
        $this->db->execute($sql);
        return $this->db->fetch()['num'];
    }


    function read($id){
        $sql = "SELECT * FROM  activities WHERE id = ? ";
        $this->db->execute($sql , array($id));
        return $this->db->fetch();
    }

    /**
     * @param int $calendarDate 时间戳
     * @return mixed
     */
    function readCalendarActivitiesByDate($calendarDate){
        $sql = "SELECT id,name FROM  activities WHERE calendar_date = ? AND in_calendar_show = 1 ORDER BY publish_time DESC limit 0,2";
        $this->db->execute($sql,array($calendarDate));
        return $this->db->fetch_all();
    }
} 