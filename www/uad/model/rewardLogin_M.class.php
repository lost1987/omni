<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/1/15
     * Time: 上午9:48
     */

    namespace uad\model;


    use core\Encoder;
    use core\Model;

    class RewardLogin_M extends Model
    {
        private static $_instance = null;

        static function instance()
        {
            if ( self::$_instance == null )
                self::$_instance = new self;

            return self::$_instance;
        }

        function read( $uid )
        {
            $sql = "SELECT * FROM adm_reward_login WHERE uid = ?";
            $this->db->execute( $sql , array( $uid ) );
            $login = $this->db->fetch();
            for($i = 1; $i < 5; $i++){
                $login['ratio'.$i] = Encoder::instance()->decode($login['ratio'.$i]);
            }
            return $login;
        }

        function save( $fields )
        {
            return $this->db->save( $fields , 'adm_reward_login' );
        }

        function update( $fields , $uid )
        {
            return $this->db->update( $fields , 'adm_reward_login' , " WHERE uid = $uid" );
        }

    }