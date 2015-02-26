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

    class RewardDeposit_M extends Model
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
            $sql = "SELECT * FROM adm_reward_deposit WHERE uid = ?";
            $this->db->execute( $sql , array( $uid ) );
            $deposit = $this->db->fetch();
            for($i = 1; $i < 5; $i++){
                $deposit['ratio'.$i] = Encoder::instance()->decode($deposit['ratio'.$i]);
            }
            return $deposit;
        }

        function save( $fields )
        {
            return $this->db->save( $fields , 'adm_reward_deposit' );
        }

        function update( $fields , $uid )
        {
            return $this->db->update( $fields , 'adm_reward_deposit' , " WHERE uid = $uid" );
        }
    }