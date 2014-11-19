<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-26
 * Time: 下午4:03
 */

namespace web\model;


use core\Model;

class PaymentOrder extends Model{
    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }


    function save(Array $fields){
        return $this->db->save($fields,'payment_order');
    }


    function updateByOrderNo(Array $fields,$order_no){
        return $this->db->update($fields,'payment_order'," WHERE order_no = '$order_no'");
    }

    /**
     * 按日期查询充值
     * 只针对前台网站使用此方法
     * 其他情况不要用
     * @param $uid
     * @param int $start_time
     * @param int $end_time
     * @param string $start
     * @param string $count
     * @return mixed
     */
    function searchByDate($uid,$start_time,$end_time,$start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null ){
            $limit = " LIMIT  $start,$count";
        }

        $sql = "SELECT money as m,create_at as time FROM payment_order WHERE user_id = ? and UNIX_TIMESTAMP(create_at) > ? and UNIX_TIMESTAMP(create_at) < ? ORDER BY create_at ASC $limit";
        $this->db->execute($sql,array($uid,$start_time,$end_time));
        return $this->db->fetch_all();
    }

    function searchByDateNums($uid,$start_time,$end_time){
        $sql = "SELECT count(*) as num FROM payment_order WHERE user_id = ? and UNIX_TIMESTAMP(create_at) > ? and UNIX_TIMESTAMP(create_at) < ?";
        $this->db->execute($sql,array($uid,$start_time,$end_time));
        return $this->db->fetch()['num'];
    }

    /**
     * 根据订单号获取一条信息
     * @param $order_no
     * @return mixed
     */
    function getByOrderNo($order_no){
        $sql = "SELECT * FROM payment_order WHERE order_no = ?";
        $this->db->execute($sql,array($order_no));
        return $this->db->fetch();
    }
} 