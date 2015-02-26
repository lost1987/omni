<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/6
 * Time: 下午3:32
 */

namespace api\libs;

/**
 * (推广)礼包相关
 * Class GiftBag
 * @package api\libs
 */
class GiftBag {

    /**
     * 检查用户是否已经获取过一次礼包
     * @param $giftID
     * @param $uid
     * @return bool
     */
    function giftGetOnceValidate($giftID,$uid){
        $sql = "SELECT count(*) as num FROM adm_gift_log WHERE gift_id = ? AND uid = ?";
        $this->db->execute($sql,array($giftID,$uid));
        $num = $this->db->fetch()['num'];
        if(empty($num))
            return false;
        return true;
    }



} 