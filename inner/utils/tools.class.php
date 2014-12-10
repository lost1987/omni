<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: lost
     * Date: 13-1-5
     * Time: 上午11:34
     * 工具类
     */
    namespace utils;
    if ( !defined( 'BASE_PATH' ) ) exit( 'No direct script access allowed' );

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

            $ckey_length = 4;

            $key = md5( $key ? $key : "kalvin.cn" );
            $keya = md5( substr( $key , 0 , 16 ) );
            $keyb = md5( substr( $key , 16 , 16 ) );
            $keyc = $ckey_length ? ( $operation == 'DECODE' ? substr( $string , 0 , $ckey_length ) : substr( md5( microtime() ) , - $ckey_length ) ) : '';

            $cryptkey = $keya . md5( $keya . $keyc );
            $key_length = strlen( $cryptkey );

            $string = $operation == 'DECODE' ? base64_decode( substr( $string , $ckey_length ) ) : sprintf( '%010d' , $expiry ? $expiry + time() : 0 ) . substr( md5( $string . $keyb ) , 0 , 16 ) . $string;
            $string_length = strlen( $string );

            $result = '';
            $box = range( 0 , 255 );

            $rndkey = array();
            for ( $i = 0 ; $i <= 255 ; $i ++ ) {
                $rndkey[ $i ] = ord( $cryptkey[ $i % $key_length ] );
            }

            for ( $j = $i = 0 ; $i < 256 ; $i ++ ) {
                $j = ( $j + $box[ $i ] + $rndkey[ $i ] ) % 256;
                $tmp = $box[ $i ];
                $box[ $i ] = $box[ $j ];
                $box[ $j ] = $tmp;
            }

            for ( $a = $j = $i = 0 ; $i < $string_length ; $i ++ ) {
                $a = ( $a + 1 ) % 256;
                $j = ( $j + $box[ $a ] ) % 256;
                $tmp = $box[ $a ];
                $box[ $a ] = $box[ $j ];
                $box[ $j ] = $tmp;
                $result .= chr( ord( $string[ $i ] ) ^ ( $box[ ( $box[ $a ] + $box[ $j ] ) % 256 ] ) );
            }

            if ( $operation == 'DECODE' ) {
                if ( ( substr( $result , 0 , 10 ) == 0 || substr( $result , 0 , 10 ) - time() > 0 ) && substr( $result , 10 , 16 ) == substr( md5( substr( $result , 26 ) . $keyb ) , 0 , 16 ) ) {
                    return substr( $result , 26 );
                } else {
                    return '';
                }
            } else {
                return $keyc . str_replace( '=' , '' , base64_encode( $result ) );
            }
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

        static function make_rand_str( $length = 18 )
        {
            // 密码字符集，可任意添加你需要的字符
            $chars = array( 'a' , 'b' , 'c' , 'd' , 'e' , 'f' , 'g' , 'h' ,
                'i' , 'j' , 'k' , 'l' , 'm' , 'n' , 'o' , 'p' , 'q' , 'r' , 's' ,
                't' , 'u' , 'v' , 'w' , 'x' , 'y' , 'z' , 'A' , 'B' , 'C' , 'D' ,
                'E' , 'F' , 'G' , 'H' , 'I' , 'J' , 'K' , 'L' , 'M' , 'N' , 'O' ,
                'P' , 'Q' , 'R' , 'S' , 'T' , 'U' , 'V' , 'W' , 'X' , 'Y' , 'Z' ,
                '0' , '1' , '2' , '3' , '4' , '5' , '6' , '7' , '8' , '9' );

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
         */
        static function debug_log( $class , $func , $file , $message )
        {
            $str = chr( 10 );
            $str .= "class  :   $class" . chr( 10 );
            $str .= "func   :   $func" . chr( 10 );
            $str .= "file   :   $file" . chr( 10 );
            $str .= "message:   $message" . chr( 10 );
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

        /**
         * 验证手机格式是否正确
         * @param $mobile
         * @return bool
         */
        static function is_mobile( $mobile )
        {
            if ( preg_match( "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/" , $mobile ) ) {
                //验证通过
                return true;
            } else {
                //手机号码格式不对
                return false;
            }
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
    }

    ?>