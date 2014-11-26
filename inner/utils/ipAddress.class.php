<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/21
 * Time: 下午2:45
 */

namespace utils;

/**
 * 利用纯真ip库解析真实IP地址
 * Class IpAddress
 * @package utils
 */
class IpAddress {

    var $StartIP = 0;
    var $EndIP = 0;
    var $Country = '';
    var $Local = '';

    var $CountryFlag = 0; // 标识 Country位置
    // 0x01,随后3字节为Country偏移,没有Local
    // 0x02,随后3字节为Country偏移,接着是Local
    // 其他,Country,Local,Local有类似的压缩。可能多重引用。

    var $fp;

    var $FirstStartIp = 0;
    var $LastStartIp = 0;
    var $EndIpOff = 0;

    private static $_instance = null;

    static function instance($qqwry_path = null){
            if(self::$_instance == null)
                self::$_instance  =  new self($qqwry_path);
            return self::$_instance;
    }

    function __construct($qqwry_path = null){
            if($qqwry_path === null)//如果不传入路径 则取当前文件所在文件夹的路径
                    $this->qqwry_path = dirname(__FILE__).'/QQWry.Dat';
            else
                    $this->qqwry_path = $qqwry_path.'/QQWry.Dat';
    }

    function getStartIp($RecNo)
    {
        $offset = $this->FirstStartIp + $RecNo * 7;
        @fseek($this->fp, $offset, SEEK_SET);
        $buf = fread($this->fp, 7);
        $this->EndIpOff = ord($buf[4]) + (ord($buf[5]) * 256) + (ord($buf[6]) * 256 * 256);
        $this->StartIp = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256) + (ord($buf[3]) * 256 * 256 * 256);
        return $this->StartIp;
    }

    function getEndIp()
    {
        @fseek($this->fp, $this->EndIpOff, SEEK_SET);
        $buf = fread($this->fp, 5);
        $this->EndIp = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256) + (ord($buf[3]) * 256 * 256 * 256);
        $this->CountryFlag = ord($buf[4]);
        return $this->EndIp;
    }

    function getCountry()
    {
        switch($this->CountryFlag)
        {
            case 1:
            case 2:
                $this->Country = $this->getFlagStr($this->EndIpOff + 4);
                $this->Local = (1 == $this->CountryFlag) ? '' : $this->getFlagStr($this->EndIpOff + 8);
                break ;
            default:
                $this->Country = $this->getFlagStr($this->EndIpOff + 4);
                $this->Local = $this->getFlagStr(ftell($this->fp));
        }
    }

    function getFlagStr($offset)
    {
        $flag = 0;

        while(1)
        {
            @fseek($this->fp, $offset, SEEK_SET);
            $flag = ord(fgetc($this->fp));

            if($flag == 1 || $flag == 2)
            {
                $buf = fread($this->fp, 3);

                if($flag == 2)
                {
                    $this->CountryFlag = 2;
                    $this->EndIpOff = $offset - 4;
                }

                $offset = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256);
            }
            else
                break;
        }

        if($offset < 12) return '';

        @fseek($this->fp, $offset, SEEK_SET);

        return $this->getStr();
    }

    function getStr()
    {
        $str = '';

        while(1)
        {
            $c = fgetc($this->fp);

            if(ord($c[0]) == 0) break;

            $str .= $c;
        }

        return $str;
    }

    function QQwry($dotip = '')
    {
        if(!$dotip) return $this;

        if(preg_match("/^(127)/", $dotip))
        {
            $this->Country = '本地网络';
            return $this;
        }
        else if(preg_match("/^(192)/", $dotip))
        {
            $this->Country = '局域网';
            return $this;
        }

        $ip = $this->IpToInt($dotip);
        $this->fp = fopen($this->qqwry_path, "rb");
        if($this->fp == NULL)
        {
            $szLocal = "OpenFileError";
            return 1;
        }

        @fseek($this->fp, 0, SEEK_SET);
        $buf = fread($this->fp, 8);
        $this->FirstStartIp = ord($buf[0]) + (ord($buf[1]) * 256) + (ord($buf[2]) * 256 * 256) + (ord($buf[3]) * 256 * 256 * 256);
        $this->LastStartIp = ord($buf[4]) + (ord($buf[5]) * 256) + (ord($buf[6]) * 256 * 256) + (ord($buf[7]) * 256 * 256 * 256);

        $RecordCount = floor(($this->LastStartIp - $this->FirstStartIp) / 7);

        if($RecordCount <= 1)
        {
            $this->Country = "FileDataError";
            fclose($this->fp) ;
            return 2 ;
        }

        $RangB = 0;
        $RangE = $RecordCount;

        // Match ...
        while($RangB < $RangE - 1)
        {
            $RecNo = floor(($RangB + $RangE) / 2);
            $this->getStartIp($RecNo) ;

            if($ip == $this->StartIp)
            {
                $RangB = $RecNo;
                break;
            }

            if($ip > $this->StartIp) $RangB = $RecNo;
            else $RangE = $RecNo;
        }

        $this->getStartIp($RangB);
        $this->getEndIp();

        if(($this->StartIp <= $ip) && ($this->EndIp >= $ip))
        {
            $this->getCountry();
        }
        else
        {
            $this->Country = '未知';
            $this->Local = '';
        }

        fclose($this->fp);
        return $this;
    }


    function full_address(){
        return $this->Country.$this->Local;
    }

    function IpToInt($Ip)
    {
        $array = explode('.', $Ip);
        $Int = ($array[0] * 256 * 256 * 256) + ($array[1] * 256 * 256) + ($array[2] * 256) + $array[3];

        return $Int;
    }
} 