<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-28
 * Time: 下午3:08
 */

namespace web\libs;

/***
 * 整个站的帮助类 只存放针对该站的特有方法
 * Class Helper
 * @package web\libs
 */
class Helper {

    /**
     * 返回去除命名空间后的类名
     * @param $name_space 命名空间
     * @param $class 完整的类名
     * @return string
     */
    static  function getControllerName($name_space,$class){
        $name = lcfirst(str_replace($name_space.'\\','',$class));
        return $name;
    }

} 