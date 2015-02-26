<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/20
 * Time: 下午5:38
 */

namespace utils;

/**
 * 日期类型格式化
 * Class Date
 * @package utils
 */
class Date {

    /**
     * 输出Y-m-d H:i:s
     */
    const FORMAT_YMDHIS_STANDARD = 1;

    /**
     * 输出Y-m-d H:i
     */
    const FORMAT_YMDHI_STANDARD = 2;


    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 将YmdHi 这样格式的时间转成 $format的格式
     * @param string $date_string  要格式化的时间字串 类似20121211010101
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


    function format_YmdHis($date_string){
        $_year = substr($date_string,0,4);
        $_month = substr($date_string,4,2);
        $_day = substr($date_string,6,2);
        $_H = substr($date_string,8,2);
        $_i = substr($date_string,10,2);
        $_s = substr($date_string,12,2);
        $date = "$_year-$_month-$_day $_H:$_i:$_s";

        return $date;
    }

    function format_Ymd($date_string){
        $_year = substr($date_string,0,4);
        $_month = substr($date_string,4,2);
        $_day = substr($date_string,6,2);
        $date = "$_year-$_month-$_day";
        return $date;
    }

    /**
     * 将标准时间字符串 转换成YmdHi这样的格式
     * @param string $date_string
     * @param int $format
     */
    function transTo_YmdHi($date_string,$format=self::FORMAT_YMDHIS_STANDARD){
                $date = str_replace(array(':','-',' '),'',$date_string);
                return substr($date,0,12);
    }

    /**
     * 获得当前周的开始时间戳和结束时间戳
     * @return mixed
     */
    function weekTimeStampSE(){
        $date=date('Y-m-d');  //当前日期
        $first=1; //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期
        $w=date('w',strtotime($date));  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
        $week['start'] = strtotime("$date -".($w ? $w - $first : 6).' days'); //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
        $week['end'] = date('Y-m-d',strtotime("{$week['start']} +6 days"));  //本周结束日期
        return $week;
    }

    /**
     * 获得当前月的开始时间戳和结束时间戳
     * @return mixed
     */
    function monthTimeStampSE(){
        $month['start'] = mktime(0,0,0,date('m'),1,date('Y'));
        $month['end'] = mktime(23,59,59,date('m'),date('t'),date('Y'));
        return $month;
    }
} 