<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 14/11/25
     * Time: 下午1:57
     */

    namespace gms\model;


    use core\AdminModel;

    class UserMatchHistory_M extends AdminModel
    {

        private static $_instance = null;

        private $_condition = '';

        static function instance()
        {
            if ( self::$_instance == null )
                self::$_instance = new self;

            return self::$_instance;
        }

        function lists($start = null , $count = null )
        {
            $limit = '';
            if ( $start !== null && $count !== null )
                $limit = " LIMIT $start , $count";

            $sql = "SELECT a.*,b.login_name,b.nickname,b.is_robot FROM user_match_history a LEFT JOIN users b ON a.uid = b.uid  {$this->_condition}  ORDER BY a.rank ASC  $limit";
            $this->_game_server->execute( $sql );
            $this->_condition = '';

            return $this->_game_server->fetch_all();
        }


        function num_rows()
        {
            $sql = "SELECT COUNT(*) as num FROM user_match_history {$this->_condition}";
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

            if(!empty($params['match_history_id']))
                $this->_condition[] = " match_history_id = {$params['match_history_id']} ";

            if ( count( $this->_condition ) > 0 ) {
                $this->_condition = implode( ' AND ' , $this->_condition );
                $this->_condition = ' WHERE ' . $this->_condition;
            } else
                $this->_condition = '';

            return $this;
        }
    }