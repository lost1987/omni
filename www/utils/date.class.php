<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/20
 * Time: 下午5:38
 */

namespace utils;


class Date {

    /**
     * 输出Y-m-d H:i:s
     */
    const FORMAT_YMDHIS_STRANDARD = 1;

    /**
     * 输出Y-m-d H:i
     */
    const FORMAT_YMDHI_STRANDARD = 2;


    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 将YmdHi 这样格式的时间转成 $format的格式
     * @param $date_string  要格式化的时间字串
     * @param int $format 格式 取自常量
     * @return string
     */
    function format_YmdHi($date_string,$format=self::FORMAT_YMDHIS_STRANDARD){
            $date = '';
            $_year = substr($date_string,0,4);
            $_month = substr($date_string,4,2);
            $_day = substr($date_string,6,2);
            $_H = substr($date_string,8,2);
            $_i = substr($date_string,10,2);
            switch($format){
                case 1:     $date = "$_year-$_month-$_day $_H:$_i:00";break;

                case 2:     $date = "$_year-$_month-$_day $_H:$_i";break;
            }
            return $date;
    }

} 