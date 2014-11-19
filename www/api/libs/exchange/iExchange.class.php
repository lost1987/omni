<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/23
 * Time: 上午9:45
 */

namespace api\libs\exchange;


interface IExchange {
    /**
     * 兑换的具体实现
     * @param $profile 用户的资源信息
     * @param $product_id 商品ID
     * @param $login_name 用户的登录账号
     * @return json
     */
    function doExchange($profile,$product_id,$login_name);
}