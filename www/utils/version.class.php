<?php
    namespace utils;

    Class Version
    {
        /**
         * @var int 主版本号
         */
        protected $_mainNumber = 1;
        /**
         * @var int 次版本号
         */
        protected $_subNumber = 0;
        /**
         * @var int 修订版本号
         */
        protected $_fixNumber = 0;

        private static $_instance = null;

        static function instance( $currentVer = null )
        {
            if ( self::$_instance == null )
                self::$_instance = new self( $currentVer );

            return self::$_instance;
        }

        function __construct( $currentVer )
        {
            if ( $currentVer !== null ) {
                list( $this->_mainNumber , $this->_subNumber , $this->_fixNumber ) =
                    explode( '.' , $currentVer );
            }
        }

        function createMainVer()
        {
            $this->_mainNumber ++;

            return $this->outputVersion();
        }

        function createSubVer()
        {
            $this->_subNumber ++;

            return $this->outputVersion();
        }

        function createFixVer()
        {
            $this->_fixNumber ++;

            return $this->outputVersion();
        }

        private function outputVersion()
        {
            $version = array();
            $version[] = $this->_mainNumber;
            $version[] = $this->_subNumber;
            $version[] = $this->_fixNumber;

            return implode( '.' , $version );
        }
    }