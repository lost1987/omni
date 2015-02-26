<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-14
 * Time: 下午2:32
 */

namespace web\model;


use core\Model;

/**
 * 用户私人助理
 * Class UserMessageModel
 * @package web\model
 */
class UserMessageModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists($uid,$start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null){
            $limit = " LIMIT $start,$count";
        }

        $sql = "SELECT * FROM user_messages WHERE receiver_uid = ? and msg_type = 1 and msg_jsoned_params like '%content%' ORDER BY msg_time DESC $limit";
        $this->db->execute($sql,array($uid));
        $list =  $this->db->fetch_all();
        foreach($list as $k => &$v){
            $temp = json_decode($v['msg_jsoned_params'],true);
            $v['content'] = $temp['content'];
            unset($list[$k]['msg_jsoned_params']);

            $temp_date = $v['msg_time'];
            if(!empty($temp_date)) {
                $y = substr($temp_date, 0, 4);
                $m = substr($temp_date, 4, 2);
                $d = substr($temp_date, 6, 2);
                $h = substr($temp_date, 8, 2);
                $i = substr($temp_date, 10, 2);

                $v['msg_time'] = $y . '/' . $m . '/' . $d . ' ' . $h . ':' . $i;
            }
        }
        reset($list);
        return $list;
    }

    function update($fields,$msg_id){
        return $this->db->update($fields,'user_messages'," WHERE msg_id = $msg_id");
    }

    function save($fields){
        return $this->db->save($fields,'user_messages');
    }

    function num_rows($uid){
        $sql = "SELECT COUNT(*) as num FROM user_messages WHERE receiver_uid = ? and msg_type = 5 and msg_jsoned_params like '%content%'";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch()['num'];
    }

    function num_rows_unread($uid){
        $sql = "SELECT COUNT(*) as num FROM user_messages WHERE receiver_uid = ? and msg_type = 5 and msg_jsoned_params like '%content%' and has_read=0";
        $this->db->execute($sql,array($uid));
        return $this->db->fetch()['num'];
    }
} 