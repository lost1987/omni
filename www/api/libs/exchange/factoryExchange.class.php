<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/21
 * Time: 下午4:54
 */
namespace api\libs\exchange;

class FactoryExchange{
    static function invoke($className){
        return call_user_func(array(__NAMESPACE__.'\\'.$className,'instance'));
    }
} 