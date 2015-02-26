<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: lost
     * Date: 13-1-5
     * Time: 上午11:34
     * 工具类
     */
    namespace utils;

    class Tools
    {
        /**
         * 用于非url地址加密
         * @param string $string    原文或者密文
         * @param string $operation 操作(ENCODE | DECODE), 默认为 DECODE
         * @param string $key       密钥
         * @param int    $expiry    密文有效期, 加密时候有效， 单位 秒，0 为永久有效
         * @return string 处理后的 原文或者 经过 base64_encode 处理后的密文
         * @example
         *                          $a = authcode('abc', 'ENCODE', 'key');
         *                          $b = authcode($a, 'DECODE', 'key');  // $b(abc)
         *
         *   $a = authcode('abc', 'ENCODE', 'key', 3600);
         *   $b = authcode('abc', 'DECODE', 'key'); // 在一个小时内，$b(abc)，否则 $b 为空
         */
        static function authcode( $string , $operation = 'DECODE' , $key = '' , $expiry = 0 )
        {

//            $ckey_length = 4;
//
//            $key = md5( $key ? $key : "kalvin.cn" );
//            $keya = md5( substr( $key , 0 , 16 ) );
//            $keyb = md5( substr( $key , 16 , 16 ) );
//            $keyc = $ckey_length ? ( $operation == 'DECODE' ? substr( $string , 0 , $ckey_length ) : substr( md5( microtime() ) , - $ckey_length ) ) : '';
//
//            $cryptkey = $keya . md5( $keya . $keyc );
//            $key_length = strlen( $cryptkey );
//
//            $string = $operation == 'DECODE' ? base64_decode( substr( $string , $ckey_length ) ) : sprintf( '%010d' , $expiry ? $expiry + time() : 0 ) . substr( md5( $string . $keyb ) , 0 , 16 ) . $string;
//            $string_length = strlen( $string );
//
//            $result = '';
//            $box = range( 0 , 255 );
//
//            $rndkey = array();
//            for ( $i = 0 ; $i <= 255 ; $i ++ ) {
//                $rndkey[ $i ] = ord( $cryptkey[ $i % $key_length ] );
//            }
//
//            for ( $j = $i = 0 ; $i < 256 ; $i ++ ) {
//                $j = ( $j + $box[ $i ] + $rndkey[ $i ] ) % 256;
//                $tmp = $box[ $i ];
//                $box[ $i ] = $box[ $j ];
//                $box[ $j ] = $tmp;
//            }
//
//            for ( $a = $j = $i = 0 ; $i < $string_length ; $i ++ ) {
//                $a = ( $a + 1 ) % 256;
//                $j = ( $j + $box[ $a ] ) % 256;
//                $tmp = $box[ $a ];
//                $box[ $a ] = $box[ $j ];
//                $box[ $j ] = $tmp;
//                $result .= chr( ord( $string[ $i ] ) ^ ( $box[ ( $box[ $a ] + $box[ $j ] ) % 256 ] ) );
//            }
//
//            if ( $operation == 'DECODE' ) {
//                if ( ( substr( $result , 0 , 10 ) == 0 || substr( $result , 0 , 10 ) - time() > 0 ) && substr( $result , 10 , 16 ) == substr( md5( substr( $result , 26 ) . $keyb ) , 0 , 16 ) ) {
//                    return substr( $result , 26 );
//                } else {
//                    return '';
//                }
//            } else {
//                return $keyc . str_replace( '=' , '' , base64_encode( $result ) );
//            }

            switch($operation){
                case 'ENCODE' :$content = self::encrypt($string,$key);
                    break;

                case 'DECODE' :$content = self::decrypt($string,$key);
                    break;
            }
            return $content;
        }


        /**
         * 对称加密算法 - (加密)。
         *
         * @param string $s
         * @param string $secure_key
         * @return string
         */
        static function encrypt($s, $secure_key) {
            if (!extension_loaded('mcrypt'))
                throw new \Exception('Mcrypt extension not installed.');

            if (null == $s || !is_string($s))
                return false;

            $td      = mcrypt_module_open('tripledes', '', 'ecb', '');
            $td_size = mcrypt_enc_get_iv_size($td);
            $iv      = mcrypt_create_iv($td_size, MCRYPT_RAND);
            $key     = substr($secure_key, 0, $td_size);
            mcrypt_generic_init($td, $key, $iv);
            $ret     = base64_encode(mcrypt_generic($td, $s));
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);

            return $ret;
        }

        /**
         * 对称加密算法 - (解密)。
         *
         * @param string $s
         * @param string $secure_key
         * @return string
         */
        static function decrypt($s, $secure_key) {
            if (!extension_loaded('mcrypt'))
                throw new \Exception('Mcrypt extension not installed.');

            if (null == $s)
                return false;

            $td      = mcrypt_module_open('tripledes', '', 'ecb', '');
            $td_size = mcrypt_enc_get_iv_size($td);
            $iv      = mcrypt_create_iv($td_size, MCRYPT_RAND);
            $key     = substr($secure_key, 0, $td_size);
            mcrypt_generic_init($td, $key, $iv);
            $ret     = trim(mdecrypt_generic($td, base64_decode($s)));
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);

            return $ret;
        }


        //判断是否是ajax请求
        static function is_ajax_req()
        {
            if ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
                //如果是ajax请求
                return TRUE;
            }

            return FALSE;
        }


        static function getip()
        {
            if ( !empty( $_SERVER["HTTP_CLIENT_IP"] ) ) {
                $cip = $_SERVER["HTTP_CLIENT_IP"];
            } elseif ( !empty( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
                $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } elseif ( !empty( $_SERVER["REMOTE_ADDR"] ) ) {
                $cip = $_SERVER["REMOTE_ADDR"];
            } else {
                $cip = "无法获取！";
            }

            return $cip;
        }

        static function get_server_ip()
        {
            if ( isset( $_SERVER ) ) {
                if ( $_SERVER['SERVER_ADDR'] ) {
                    $server_ip = $_SERVER['SERVER_ADDR'];
                } else {
                    $server_ip = $_SERVER['LOCAL_ADDR'];
                }
            } else {
                $server_ip = getenv( 'SERVER_ADDR' );
            }

            return $server_ip;
        }

        static function createfile( $file_name , $str )
        {
            $file_pointer = fopen( $file_name , "w" );
            fwrite( $file_pointer , $str );
            fclose( $file_pointer );
        }

        static function createDir( $dir )
        {
            if ( !is_dir( $dir ) ) {
                mkdir( $dir , 0777 , true );
            }
        }

        /**
         * 取数组下标从start 到 end条
         *
         */
        static function fetch_array( $start , $limit , $array )
        {
            if ( !is_int( $start ) || !is_int( $limit ) ) {
                return;
            }

            $newarray = array();

            for ( $i = $start ; $i < $limit ; $i ++ ) {
                if ( !empty( $array[ $i ] ) )
                    $newarray[] = $array[ $i ];
            }

            return $newarray;
        }


        /**
         * 取数组下标从start 到 end条
         *
         */
        static function array_fetch( $start , $limit , $array )
        {
            if ( !is_int( $start ) || !is_int( $limit ) ) {
                return;
            }

            $newarray = array();

            for ( $i = $start ; $i < $limit ; $i ++ ) {
                if ( !empty( $array[ $i ] ) )
                    $newarray[] = $array[ $i ];
            }

            return $newarray;
        }

        /**
         * 对二维数组进行排序
         * 例如:
         * array(4) {
        [200] => array(2) {
        ["money"] => string(3) "200"
        ["newcoins"] => string(5) "60000"
        }
        [50] => array(2) {
        ["money"] => string(2) "50"
        ["newcoins"] => string(5) "50000"
        }
        [10] => array(2) {
        ["money"] => string(2) "10"
        ["newcoins"] => string(5) "10000"
        }
        [2] => array(2) {
        ["money"] => string(1) "2"
        ["newcoins"] => string(4) "5000"
        }
        }
         * array_multi_ksort('money',$multiArray,false);
         * @param      $keyName 二维数组中子元素的key
         * @param      $multiArray 二维数组
         * @param bool $asc 是否降序排列 默认降序
         * @return array
         */
        static function array_multi_ksort($keyName,$multiArray,$asc=true){
            $temp = array();
            foreach($multiArray as $k => $v){
                $temp[$v[$keyName]] = $v;
            }
            unset($multiArray);
            if($asc)
                ksort($temp);
            else
                krsort($temp);
            return $temp;
        }

        /**
         * 通过数组的值取得key(只能用于一维数组)
         * @param $value
         * @param $array
         */
        static function array_toggle_fetch_value( $value , $array )
        {
            $return_val = null;
            foreach ( $array as $k => $v ) {
                if ( $value == $v )
                    $return_val = $k;
            }

            return $return_val;
        }

        /**
         * @param $element  要插入的元素
         * @param $index    要插入的索引位置
         * @param $array    原始数组
         * @return array
         *                  将元素插入到$index的数组位置
         */
        static function array_insert_element( $element , $index , $array )
        {
            if ( $index < 0 )
                throw new OutOfRangeException( 'index must be > 0' );
            $next_array = array_slice( $array , $index - 1 );
            $pre_array = array_slice( $array , 0 , $index - 1 );
            $pre_array[] = $element;

            return array_merge( $pre_array , $next_array );
        }

        /**
         * @param $index
         * @param $array
         * @return mixed
         * @throws OutOfRangeException
         * 删除下标为index的数组元素
         */
        static function array_delete_element( $index , $array )
        {
            if ( $index < 0 )
                throw new OutOfRangeException( 'index must be > 0' );
            unset( $array[ $index - 1 ] );

            return $array;
        }

        /**
         * 条件 数组元素必须是对象 索引必须是数字
         * @param $array
         * @return Array
         * 删除指定对象key的数组中value重复的值 ,并将这些不重复的值返回到一个数组中
         */
        static function array_object_delete_repeat_values_by_key( $key , $array )
        {
            $value_array = array();
            foreach ( $array as $obj ) {
                $value_array[] = $obj->$key;
            }

            return array_unique( $value_array );
        }

        /**
         * 条件 数组元素必须是对象 索引必须是数字
         * @param $key       对象key
         * @param $symbol    连接符号
         * @param $array
         * @return String
         *                   将数组中指定对象key的值 , 进行符号连接,返回一个连接后的字符串
         */
        static function array_object_implode_values_by_key( $key , $symbol , $array )
        {
            $value_array = array();
            foreach ( $array as $obj ) {
                $value_array[] = $obj->$key;
            }

            return implode( $symbol , $value_array );
        }

        /**
         * 将数组的所有值转化为string
         * 仅支持非对象数组 , 且数组将不会被转换
         * 支持1维和2维数组
         * @param $array
         * @return array
         */
        static function array_val_toString($array){
            foreach($array as $k1 => &$v1){
                if (is_array($v1)){
                    foreach($v1 as $k2 => &$v2){
                        $v2 = strval($v2);
                    }
                }else{
                    $v1 = strval($v1);
                }
            }
            return $array;
        }

        /**
         * 取二维数组中 $key=$value 的子数组
         * @param $key
         * @param $value
         * @param $array
         */
        static function array_fetch_child_by_key_value( $key , $value , $array )
        {
            $arr = null;
            foreach ( $array as $k => $v ) {
                if ( $v[ $key ] == $value ) {
                    $arr = $v;
                }
            }

            return $arr;
        }


        /**
         * @param $dir String  目录的路径最后需要加'/'
         *             取得指定目录下的所有子目录
         */
        static function fetch_children_dir( $dir )
        {

            if ( !preg_match( '/.*\/$/i' , $dir ) ) {
                $dir = $dir . DIRECTORY_SEPARATOR;
            }

            $files_dirs = scandir( $dir );
            $dirnames = array();
            foreach ( $files_dirs as $dirname ) {
                if ( is_dir( $dir . $dirname ) && strpos( $dirname , '.' ) === false ) {
                    $dirnames[] = $dirname;
                }
            }

            return $dirnames;
        }

        /**
         * @param $extension_name  扩展的名称
         */
        static function check_extension_is_on( $extension_name )
        {
            $extensions = get_loaded_extensions();
            if ( in_array( $extension_name , $extensions ) )
                return TRUE;

            return FALSE;
        }

        /**
         * @param $str
         * @param $start
         * @param $len
         * @return string
         * 截取中文的UTF8字符串
         */
        static function utf8_substr( $str , $start , $len )
        {
            $default = mb_internal_encoding();
            if ( strtolower( mb_internal_encoding() ) != 'utf-8' ) {
                mb_internal_encoding( 'UTF-8' );
            }
            $result = mb_substr( $str , $start , $len );
            mb_internal_encoding( $default );

            return $result;
        }

        /**
         * @param $parttern
         * @param $replacement
         * @param $str
         * @return string
         * 替换中文的UTF8字符串
         */
        static function utf8_parttern_replace( $parttern , $replacement , $str )
        {
            $default = mb_regex_encoding();
            if ( strtolower( mb_regex_encoding() ) != 'utf-8' ) {
                mb_regex_encoding( 'UTF-8' );
            }
            $result = mb_ereg_replace( $parttern , $replacement , $str );
            mb_regex_encoding( $default );

            return $result;
        }


        static function daddslashes( $string , $force = 1 )
        {
            if ( is_array( $string ) ) {
                foreach ( $string as $key => $val ) {
                    unset( $string[ $key ] );
                    $string[ addslashes( $key ) ] = daddslashes( $val , $force );
                }
            } else {
                $string = addslashes( $string );
            }

            return $string;
        }

        static function make_rand_str( $length = 18 ,$onlyNumber = false)
        {
            // 密码字符集，可任意添加你需要的字符
            if($onlyNumber){
                $chars = array('0' , '1' , '2' , '3' , '4' , '5' , '6' , '7' , '8' , '9' );
            }else{
                $chars = array( 'a' , 'b' , 'c' , 'd' , 'e' , 'f' , 'g' , 'h' ,
                    'i' , 'j' , 'k' , 'l' , 'm' , 'n' , 'o' , 'p' , 'q' , 'r' , 's' ,
                    't' , 'u' , 'v' , 'w' , 'x' , 'y' , 'z' , 'A' , 'B' , 'C' , 'D' ,
                    'E' , 'F' , 'G' , 'H' , 'I' , 'J' , 'K' , 'L' , 'M' , 'N' , 'O' ,
                    'P' , 'Q' , 'R' , 'S' , 'T' , 'U' , 'V' , 'W' , 'X' , 'Y' , 'Z' ,
                    '0' , '1' , '2' , '3' , '4' , '5' , '6' , '7' , '8' , '9' );
            }

            // 在 $chars 中随机取 $length 个数组元素键名
            $keys = array_rand( $chars , $length );
            $password = '';
            for ( $i = 0 ; $i < $length ; $i ++ ) {
                // 将 $length 个数组元素连接成字符串
                $password .= $chars[ $keys[ $i ] ];
            }

            return $password;
        }

        /**
         * 读取CSV
         * @param $filename
         * @return array
         */
        static function getCSVdata( $filename )
        {
            $row = 1;//第一行开始
            if ( ( $handle = fopen( $filename , "r" ) ) !== false ) {
                while ( ( $dataSrc = fgetcsv( $handle ) ) !== false ) {
                    $num = count( $dataSrc );
                    for ( $c = 0 ; $c < $num ; $c ++ )//列 column
                    {
                        if ( $row === 1 )//第一行作为字段
                        {
                            $dataName[] = $dataSrc[ $c ];//字段名称
                        } else {
                            foreach ( $dataName as $k => $v ) {
                                if ( $k == $c )//对应的字段
                                {
                                    $data[ $v ] = $dataSrc[ $c ];
                                }
                            }
                        }
                    }
                    if ( !empty( $data ) ) {
                        $dataRtn[] = $data;
                        unset( $data );
                    }
                    $row ++;
                }
                fclose( $handle );

                return $dataRtn;
            }
        }

        /**
         * 将类似 \x30\x31\x32\x33\ 这类字符转换成 10进制的字符串
         * 过程: 以上为例 30,31,32,33 都是16进制
         * 将他们先转为10进制然后再用ascii码来换成字符
         * 再连接起来就是结果
         * @param $x16
         * @return null|string
         */
        static function ascii16toStr( $x16 )
        {
            if ( !is_string( $x16 ) ) return null;
            $charlist = explode( '\x' , $x16 );
            $str = array();
            foreach ( $charlist as $char ) {
                if ( empty( $char ) ) continue;
                $str[] = chr( hexdec( $char ) );
            }

            return implode( $str );
        }

        /**
         * 将str 的每个字母 转换成ascii 再转成16进制
         * 只支持英文 结果类似如下
         * \x30\x31\x32\x33\
         */
        static function strtoAscii16( $str )
        {
            if ( !is_string( $str ) ) return null;
            $asciis = array();
            for ( $i = 0 ; $i < strlen( $str ) ; $i ++ ) {
                $asciis[] = '\x' . dechex( ord( $str[ $i ] ) );
            }

            return implode( $asciis );
        }


        /**
         * 计算命中率(用于概率计算)
         * @param $rate   0-1的小数
         * @param $num    如果传入$num则$num为计算出的1-100之间的一个数字
         * @return bool
         * @throws Exception
         */
        static function hitted( $rate , &$num = null )
        {
            if ( is_string( $rate ) )
                $rate = ( float ) $rate;

            if ( $rate > 1 )
                throw new Exception( '传入的概率值 $rate 必须是 0~1 之间的浮点数或整数(0|1)。' , - 1 );

            $r = 100 * $rate;
            $v = mt_rand( 1 , 100 );

            if ( !empty( $num ) )
                $num = $v;

            if ( $v <= $r )
                return true;

            return false;
        }


        /***
         * 将字符串输出到控制台tty
         * @param $message
         */
        static function debug_output( $message )
        {
            echo '[' . date( 'Y-m-d H:i:s' ) . ']     ' . $message . chr( 10 );
        }


        /**
         * 输出信息到错误日志
         * @param $class   string 类名
         * @param $func    string 方法名
         * @param $file    string 文件
         * @param $message string 信息
         * @param $e EXCEPTION 异常对象 默认为null
         */
        static function debug_log( $class , $func , $file , $message ,\Exception $e = null)
        {
            $str = chr( 10 );
            $str .= "class  :   $class" . chr( 10 );
            $str .= "func   :   $func" . chr( 10 );
            $str .= "file   :   $file" . chr( 10 );
            $str .= "message:   $message" . chr( 10 );
            if($e !== null){
                $str .= "exception code:  " .$e->getCode(). chr( 10 );
                $str .= "exception line:  " .$e->getLine(). chr( 10 );
                $str .= "exception message:  " .$e->getMessage(). chr( 10 );
                $str .= "exception trace:  " .$e->getTraceAsString(). chr( 10 );
            }
            error_log( $str );
        }

        /**
         * 将数组的键值输出至日志
         * @param array $array
         */
        static function debug_array_log( Array $array )
        {
            foreach ( $array as $k => $v ) {
                error_log( 'key : ' . $k . ' | value : ' . $v );
            }
            error_log( '------------------------DONE------------------------' );
        }

        // format var_dump
        static function dump( $var , $echo = true , $label = null , $strict = true )
        {
            $label = ( $label === null ) ? '' : rtrim( $label ) . ' ';
            if ( !$strict ) {
                if ( ini_get( 'html_errors' ) ) {
                    $output = print_r( $var , true );
                    $output = "<pre>" . $label . htmlspecialchars( $output , ENT_QUOTES ) . "</pre><br/>";
                } else {
                    $output = $label . " : " . print_r( $var , true );
                }
            } else {
                ob_start();
                var_dump( $var );
                $output = ob_get_clean();
                if ( !extension_loaded( 'xdebug' ) ) {
                    $output = preg_replace( "/\]\=\>\n(\s+)/m" , "] => " , $output );
                    $output = '<pre>' . $label . htmlspecialchars( $output , ENT_QUOTES ) . '</pre><br/>';
                }
            }
            if ( $echo ) {
                echo( $output );

                return null;
            } else
                return $output;
        }


        /**
         * 身份证号码验证
         * site http://www.jbxue.com
         */
        static function is_valid_idCard($idcard){
            try{
                if(empty($idcard)){
                    return false;
                }
                $City = array(11=>"北京",12=>"天津",13=>"河北",14=>"山西",15=>"内蒙古",21=>"辽宁",22=>"吉林",23=>"黑龙江",31=>"上海",
                              32=>"江苏",33=>"浙江",34=>"安徽",35=>"福建",36=>"江西",37=>"山东",41=>"河南",42=>"湖北",43=>"湖南",44=>"广东",45=>"广西",
                              46=>"海南",50=>"重庆",51=>"四川",52=>"贵州",53=>"云南",54=>"西藏",61=>"陕西",62=>"甘肃",63=>"青海",64=>"宁夏",65=>"新疆",
                              71=>"台湾",81=>"香港",82=>"澳门",91=>"国外");
                $iSum = 0;
                $idCardLength = strlen($idcard);
                //长度验证
                if(!preg_match('/^\d{17}(\d|x)$/i',$idcard) and!preg_match('/^\d{15}$/i',$idcard))
                {
                    return false;
                }
                //地区验证
                if(!array_key_exists(intval(substr($idcard,0,2)),$City))
                {
                    return false;
                }
                // 15位身份证验证生日，转换为18位
                if ($idCardLength == 15)
                {
                    $sBirthday = '19'.substr($idcard,6,2).'-'.substr($idcard,8,2).'-'.substr($idcard,10,2);
                    $d = new \DateTime($sBirthday);
                    $dd = $d->format('Y-m-d');
                    if($sBirthday != $dd)
                    {
                        return false;
                    }
                    $idcard = substr($idcard,0,6)."19".substr($idcard,6,9);//15to18
                    $Bit18 = self::getVerifyBit($idcard);//算出第18位校验码
                    $idcard = $idcard.$Bit18;
                }
                // 判断是否大于2078年，小于1900年
                $year = substr($idcard,6,4);
                if ($year<1900 || $year>2078 )
                {
                    return false;
                }

                //18位身份证处理
                $sBirthday = substr($idcard,6,4).'-'.substr($idcard,10,2).'-'.substr($idcard,12,2);
                $d = new \DateTime($sBirthday);
                $dd = $d->format('Y-m-d');
                if($sBirthday != $dd)
                {
                    return false;
                }
                //身份证编码规范验证
                $idcard_base = substr($idcard,0,17);
                if(strtoupper(substr($idcard,17,1)) != self::getVerifyBit($idcard_base))
                {
                    return false;
                }else{
                    return true;
                }
            }catch (\Exception $e){
                return false;
            }
        }

        // 计算身份证校验码，根据国家标准GB 11643-1999
        static function getVerifyBit($idcard_base)
        {
            if(strlen($idcard_base) != 17)
            {
                return false;
            }
            //加权因子
            $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            //校验码对应值
            $verify_number_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4','3', '2');
            $checksum = 0;
            for ($i = 0; $i < strlen($idcard_base); $i++)
            {
                $checksum += substr($idcard_base, $i, 1) * $factor[$i];
            }
            $mod = $checksum % 11;
            $verify_number = $verify_number_list[$mod];
            return $verify_number;
        }

        /**
         * 验证email 地址格式
         * @param $email
         * @return bool
         */
        static function isValidEmail( $email )
        {
            $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
            if ( preg_match( $pattern , $email ) )
                return true;

            return false;
        }

        /**
         * 加*手机号或电话号码
         * @param $phone
         */
        static function entry_phone( $phone )
        {
            return substr( $phone , 0 , 3 ) . '*****' . substr( $phone , 8 , strlen( $phone ) );
        }

        static function entry_email($email){
            return preg_replace('/(.{3})(.*)/i','***$2',$email);
        }

        /**
         * 验证手机格式是否正确
         * @param $mobile
         * @return bool
         */
        static function is_mobile( $mobile )
        {
            if ( preg_match( "/^(13[0-9]{9})|(15[0|1|2|3|5|6|7|8|9]\d{8})|(18[0|5|6|7|8|9]\d{8})$/" , $mobile ) ) {
                //验证通过
                return true;
            } else {
                //手机号码格式不对
                return false;
            }
        }

        /**
         * 验证是否是全中文汉子
         * @param $str
         * @return bool
         */
        static function is_chinese($str){
            if (preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$str))
                return true;
            else
                return false;
        }

        /**
         * 替换字符串中某些字符为$replaceTo
         * @param $sourceString
         * @param $replaceTo
         */
        static function entry_string($sourceString,$replaceTo){
            if(strlen($sourceString) < 6)
                return $sourceString;

            $idx = strlen($sourceString)/3;
            $a =str_split($sourceString);
            for($i = 0 ; $i < count($a);$i++){
                if($i > $idx && $i< count($a)-$idx ){
                    $a[$i] = $replaceTo;
                }
            }
            return implode('',$a) ;
        }


        /**
         * 匹配正整数
         * @param $val
         */
        static function entry_int( $val )
        {
            $parttern = '/^(0|[1-9][0-9]*)$/';
            if ( preg_match( $parttern , $val ) )
                return true;

            return false;
        }


        /**
         * 匹配正浮点数
         * @param $val
         */
        static function entry_float( $val )
        {
            $parttern = '/^\d+(\.\d+)?$/';
            if ( preg_match( $parttern , $val ) )
                return true;

            return false;
        }


        /* 计算字符串的长度(包括中英数字混合情况)  长度计算和JS一样      */
        static function strlen_ex( $str , $charset = 'UTF-8' )
        {
            return iconv_strlen( $str , $charset );
        }

        /**
         * 格式化数组 如果数组值中有数字则转换为整型 format
         * @param $list
         */
        static function std_array_format( $list )
        {
            if ( !is_array( $list ) )
                throw new \Exception( 'function:std_array_format ,arguments must be array' );

            foreach ( $list as &$item ) {
                if ( self::entry_int( $item ) )
                    $item = intval( $item );
                else if ( self::entry_float( $item ) )
                    $item = floatval( $item );
            }

            return $list;
        }

        /**
         * 格式化二维数组 如果数组值中有数字则转换为整型 format
         * @param $list
         */
        static function std_multi_array_format( $list )
        {
            if ( !is_array( $list ) )
                throw new \Exception( 'function:std_array_format ,arguments must be array' );

            foreach ( $list as &$item ) {
                foreach ( $item as &$iitem ) {
                    if ( self::entry_int( $iitem ) )
                        $iitem = intval( $iitem );
                    else if ( self::entry_float( $iitem ) )
                        $iitem = floatval( $iitem );
                }
            }

            return $list;
        }

        static function inputFilter( $str )
        {
            if ( empty( $str ) && intval( $str ) != 0 ) {
                return;
            }
            if ( $str == "" ) {
                return $str;
            }
            $str = trim( $str );
            $str = str_replace( "&" , "&amp;" , $str );
            $str = str_replace( ">" , "&gt;" , $str );
            $str = str_replace( "<" , "&lt;" , $str );
            $str = str_replace( chr( 32 ) , "&nbsp;" , $str );
            $str = str_replace( chr( 9 ) , "&nbsp;" , $str );
            $str = str_replace( chr( 34 ) , "&" , $str );
            $str = str_replace( chr( 39 ) , "&#39;" , $str );
            $str = str_replace( chr( 13 ) , "<br />" , $str );
            $str = str_replace( "'" , "''" , $str );
            $str = str_replace( "select" , "sel&#101;ct" , $str );
            $str = str_replace( "join" , "jo&#105;n" , $str );
            $str = str_replace( "union" , "un&#105;on" , $str );
            $str = str_replace( "where" , "wh&#101;re" , $str );
            $str = str_replace( "insert" , "ins&#101;rt" , $str );
            $str = str_replace( "delete" , "del&#101;te" , $str );
            $str = str_replace( "update" , "up&#100;ate" , $str );
            $str = str_replace( "like" , "lik&#101;" , $str );
            $str = str_replace( "drop" , "dro&#112;" , $str );
            $str = str_replace( "create" , "cr&#101;ate" , $str );
            $str = str_replace( "modify" , "mod&#105;fy" , $str );
            $str = str_replace( "rename" , "ren&#097;me" , $str );
            $str = str_replace( "alter" , "alt&#101;r" , $str );
            $str = str_replace( "cast" , "ca&#115;" , $str );

            return $str;
        }

        static function objectToArray($obj){
            $_arr = is_object($obj) ? get_object_vars($obj) :$obj;
            foreach ($_arr as $key=>$val){
                $val = (is_array($val) || is_object($val)) ? self::objectToArray($val):$val;
                $_arr[$key] = $val;
            }
            return $_arr;
        }


        static function xml_to_array($xml){
            $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
            if(preg_match_all($reg, $xml, $matches)){
                $count = count($matches[0]);
                for($i = 0; $i < $count; $i++){
                    $subxml= $matches[2][$i];
                    $key = $matches[1][$i];
                    if(preg_match( $reg, $subxml )){
                        $arr[$key] = self::xml_to_array( $subxml );
                    }else{
                        $arr[$key] = $subxml;
                    }
                }
            }
            return $arr;
        }


        /**
         * Luhn算法验证银行卡的有效性
         * @param $cardNo
         * @return bool
         */
        static function bankCardLuhn($cardNo){
            $cardChars = str_split(strrev($cardNo));
            $odd_sum = 0;
            $even_sum = 0;
            for($i = 0 ; $i <count($cardChars) ; $i++){
                if(($i+1) % 2 != 0){
                    //从卡号最后一位数字开始，逆向将奇数位(1、3、5等等)相加。
                    $odd_sum += $cardChars[$i];
                }else{
                    //从卡号最后一位数字开始，逆向将偶数位数字，先乘以2（如果乘积为两位数，则将其减去9），再求和
                    $temp = $cardChars[$i] * 2;
                    if($temp > 10)
                        $temp = $temp-9;
                    $even_sum += $temp;
                }
            }

            //将奇数位总和加上偶数位总和，结果应该可以被10整除。
            if( ($odd_sum + $even_sum) % 10 == 0)
                return true;
            else
                return false;
        }

        /**
         * 是否是手机端的请求
         * @return bool
         */
        static function is_mobile_request()
        {
            $_SERVER['ALL_HTTP'] = isset( $_SERVER['ALL_HTTP'] ) ? $_SERVER['ALL_HTTP'] : '';
            $mobile_browser = '0';
            if ( preg_match( '/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i' , strtolower( $_SERVER['HTTP_USER_AGENT'] ) ) )
                $mobile_browser ++;
            if ( ( isset( $_SERVER['HTTP_ACCEPT'] ) ) and ( strpos( strtolower( $_SERVER['HTTP_ACCEPT'] ) , 'application/vnd.wap.xhtml+xml' ) !== false ) )
                $mobile_browser ++;
            if ( isset( $_SERVER['HTTP_X_WAP_PROFILE'] ) )
                $mobile_browser ++;
            if ( isset( $_SERVER['HTTP_PROFILE'] ) )
                $mobile_browser ++;
            $mobile_ua = strtolower( substr( $_SERVER['HTTP_USER_AGENT'] , 0 , 4 ) );
            $mobile_agents = array(
                'w3c ' , 'acs-' , 'alav' , 'alca' , 'amoi' , 'audi' , 'avan' , 'benq' , 'bird' , 'blac' ,
                'blaz' , 'brew' , 'cell' , 'cldc' , 'cmd-' , 'dang' , 'doco' , 'eric' , 'hipt' , 'inno' ,
                'ipaq' , 'java' , 'jigs' , 'kddi' , 'keji' , 'leno' , 'lg-c' , 'lg-d' , 'lg-g' , 'lge-' ,
                'maui' , 'maxo' , 'midp' , 'mits' , 'mmef' , 'mobi' , 'mot-' , 'moto' , 'mwbp' , 'nec-' ,
                'newt' , 'noki' , 'oper' , 'palm' , 'pana' , 'pant' , 'phil' , 'play' , 'port' , 'prox' ,
                'qwap' , 'sage' , 'sams' , 'sany' , 'sch-' , 'sec-' , 'send' , 'seri' , 'sgh-' , 'shar' ,
                'sie-' , 'siem' , 'smal' , 'smar' , 'sony' , 'sph-' , 'symb' , 't-mo' , 'teli' , 'tim-' ,
                'tosh' , 'tsm-' , 'upg1' , 'upsi' , 'vk-v' , 'voda' , 'wap-' , 'wapa' , 'wapi' , 'wapp' ,
                'wapr' , 'webc' , 'winw' , 'winw' , 'xda' , 'xda-'
            );
            if ( in_array( $mobile_ua , $mobile_agents ) )
                $mobile_browser ++;
            if ( strpos( strtolower( $_SERVER['ALL_HTTP'] ) , 'operamini' ) !== false )
                $mobile_browser ++;
            // Pre-final check to reset everything if the user is on Windows
            if ( strpos( strtolower( $_SERVER['HTTP_USER_AGENT'] ) , 'windows' ) !== false )
                $mobile_browser = 0;
            // But WP7 is also Windows, with a slightly different characteristic
            if ( strpos( strtolower( $_SERVER['HTTP_USER_AGENT'] ) , 'windows phone' ) !== false )
                $mobile_browser ++;
            if ( $mobile_browser > 0 )
                return true;
            else
                return false;
        }
    }

    ?>