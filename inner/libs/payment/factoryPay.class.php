<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-30
 * Time: 下午2:51
 */
namespace libs\payment;
/**
 * 支付工厂类
 * Class FactoryPay
 */
class FactoryPay {

    static function invoke($className){
            return call_user_func(array(__NAMESPACE__.'\\'.$className,'instance'));
    }

} 