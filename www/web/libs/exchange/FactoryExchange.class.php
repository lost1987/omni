<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-25
 * Time: 上午11:04
 * 兑换工厂类
 */

namespace web\libs\exchange;

class FactoryExchange {

     static  function invoke($exchange_type){
            return call_user_func(array(__NAMESPACE__.'\\'.$exchange_type,'instance'));
    }

} 