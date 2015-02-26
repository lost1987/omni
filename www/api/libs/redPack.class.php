<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/6
 * Time: 下午3:32
 */

namespace api\libs;

use api\core\AdmController;

/**
 * 红包相关
 * Class RedPack
 * @package api\libs
 */
class RedPack extends AdmController{

    /**
     * 检查用户的红包是否领取过红包
     * @param int $uid
     * @return bool
     */
    function redPackGetOnceValidate($uid){
        $sql = "SELECT count(*) as num FROM adm_redpack WHERE uid = ?";
        $this->db->execute($sql,array($uid));
        $num = $this->db->fetch()['num'];
        if(empty($num))
            return false;
        return true;
    }

} 