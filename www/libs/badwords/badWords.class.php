<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/26
 * Time: 下午3:12
 */

namespace libs\badwords;


class BadWords {

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * @param $myWord
     * @return bool  true=不包含敏感词 false=包含敏感词
     */
    function checkBadWords($myWord){
        $isOk = true;
        $words = include(BASE_PATH.'/libs/badwords/badWords.php');
        foreach($words as $word){
            if(mb_strpos($myWord,$word)> -1){
                $isOk = false;
                break;
            }
        }
        return $isOk;
    }

    /**
     * @param $userName
     * @return bool true=不包含敏感词 false=包含敏感词
     */
    function checkBadUserName($userName){
        if(preg_match('/^test(.*)/i',$userName))
            return  false;

        if(preg_match('/^admin(.*)/i',$userName))
            return  false;

        if(preg_match('/^mb_(.*)/i',$userName))
            return  false;

        if(preg_match('/^wb_(.*)/i',$userName))
            return  false;

        if(preg_match('/^quick(.*)/i',$userName))
            return  false;

        return true;
    }
} 