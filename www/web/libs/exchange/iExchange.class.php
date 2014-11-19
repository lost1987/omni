<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-25
 * Time: 上午10:48
 */
namespace web\libs\exchange;

interface IExchange
{
    function doExchange($product, $user, $response);
} 