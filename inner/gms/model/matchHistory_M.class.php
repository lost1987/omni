<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 14/11/25
     * Time: 上午10:20
     */

    namespace gms\model;


    use core\AdminModel;
    use utils\Date;

    class MatchHistory_M extends AdminModel
    {

        private static $_instance = null;

        private $_condition = '';

        static function instance()
        {
            if ( self::$_instance == null )
                self::$_instance = new self;

            return self::$_instance;
        }

        function lists( $start = null , $count = null )
        {
            $limit = '';
            if ( $start !== null && $count !== null )
                $limit = " LIMIT $start , $count";

            $sql = "SELECT * FROM match_history {$this->_condition}  ORDER BY end_time DESC  $limit";
            $this->_game_server->execute( $sql );
            $this->_condition = '';

            return $this->_game_server->fetch_all();
        }


        function num_rows()
        {
            $sql = "SELECT COUNT(*) as num FROM match_history {$this->_condition}";
            $this->_game_server->execute( $sql );
            $this->_condition = '';

            return $this->_game_server->fetch()['num'];
        }

        /**
         * @param array $cond
         */
        function set_condition( $params )
        {
            $this->_condition = array();

            if(!empty($params['start_time'])){
                $start_time = Date::instance()->transTo_YmdHi($params['start_time']);
                $this->_condition[] = " start_time >= $start_time ";
            }

            if(!empty($params['end_time'])){
                $end_time = Date::instance()->transTo_YmdHi($params['end_time']);
                $this->_condition[] = " end_time <= $end_time ";
            }

            if(intval($params['match_type']) > -1 && $params['match_type'] !== null)
                $this->_condition[] = " match_type = {$params['match_type']} ";

            if ( count( $this->_condition ) > 0 ) {
                $this->_condition = implode( ' AND ' , $this->_condition );
                $this->_condition = ' WHERE ' . $this->_condition;
            } else
                $this->_condition = '';

            return $this;
        }
    }