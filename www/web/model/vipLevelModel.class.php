<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/5
 * Time: 上午10:34
 */

namespace web\model;


use core\Model;

class VipLevelModel extends Model{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function read($vipLevel){
        $sql = "SELECT mall_discount FROM vip_user_priv WHERE level = ? ";
        $this->db->execute($sql,array($vipLevel));
        $discount = $this->db->fetch()['mall_discount'];
        if(empty($discount))
            $discount = 1;
        return $discount;
    }

} 