<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/2/25
     * Time: 上午10:36
     */

    namespace core;

    /**
     * 处理未捕获的异常
     * Class ExceptionHandler
     * @package core
     */
    class ExceptionHandler
    {

        private static $_instance = null;

        /**
         * @var array
         */
        private $_ignored_notice = null;

        static function instance()
        {
            if ( self::$_instance == null )
                self::$_instance = new self;

            return self::$_instance;
        }

        function handle( $exception ,$title=' PHP Fatal error : Uncaught exception ')
        {
            // these are our templates
            $traceLine = "#%s %s(%s): %s(%s)";
            $msg = "$title with message '%s' in %s:%s\nStack trace:\n%s\n  thrown in %s on line %s";

            // alter your trace as you please, here
            $trace = $exception->getTrace();
            foreach ( $trace as $key => $stackPoint ) {
                // I'm converting arguments to their type
                // (prevents passwords from ever getting logged as anything other than 'string')
                $trace[ $key ]['args'] = array_map( 'gettype' , $trace[ $key ]['args'] );
            }

            // build your tracelines
            $result = array();
            foreach ( $trace as $key => $stackPoint ) {
                $result[] = sprintf(
                    $traceLine ,
                    $key ,
                    $stackPoint['file'] ,
                    $stackPoint['line'] ,
                    $stackPoint['function'] ,
                    implode( ', ' , $stackPoint['args'] )
                );
            }
            // trace always ends with {main}
            $result[] = '#' . ++ $key . ' {main}';

            // write tracelines into main template
            $msg = sprintf(
                $msg ,
                $exception->getMessage() ,
                $exception->getFile() ,
                $exception->getLine() ,
                implode( "\n" , $result ) ,
                $exception->getFile() ,
                $exception->getLine()
            );

            // log or echo as you please
            error_log( $msg );
        }


        /**
         * 将错误托管给ErrorException
         * @param $errno
         * @param $errstr
         * @param $errfile
         * @param $errline
         *      如 : set_error_handler("error_transfer_exception");
         *      set_error_handler(array($this,"error_transfer_exception"));
         */
        function error_transfer_exception( $errNo , $errStr , $errFile , $errLine )
        {
            switch ($errNo) {
                case E_USER_ERROR:
                    throw new \ErrorException( $errStr , $errNo , 0 , $errFile , $errLine );
                    break;

                case E_ERROR:
                    throw new \ErrorException( $errStr , $errNo , 0 , $errFile , $errLine );
                    break;

                case E_WARNING:
                    $e = new \Exception( $errStr );//此处不要throw 因为抛出异常被set_exception_handler捕获脚本会停止
                    $this->handle( $e ,' PHP WARNING : warning ' );
                    break;

                case E_NOTICE:
                    $this->trace_notice( $errStr );
                    break;

                default:
                    error_log( "未知的错误类型: [$errNo] $errStr \n" );
                    break;
            }

            /* Don't execute PHP internal error handler */

            return true;
        }

        function set_ignored_notice( Array $notice )
        {
            $this->_ignored_notice = $notice;
        }

        private function trace_notice( $errStr )
        {
            if ( !in_array( $errStr , $this->_ignored_notice ) ) {
                $e = new \Exception( $errStr );
                $this->handle( $e ,' PHP NOTICE : notice ');
            }
        }
    }