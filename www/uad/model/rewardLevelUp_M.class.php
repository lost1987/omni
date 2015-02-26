<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/1/15
     * Time: 上午9:49
     */

    namespace uad\model;


    use core\Encoder;
    use core\Model;

    class RewardLevelUp_M extends Model
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
            $sql = "SELECT * FROM adm_reward_levelup WHERE uid = ?";
            $this->db->execute( $sql , array( $uid ) );
            $levelUp = $this->db->fetch();
            for($i = 1; $i < 5; $i++){
                $levelUp['ratio'.$i] = Encoder::instance()->decode($levelUp['ratio'.$i]);
            }

            return $levelUp;
        }

        function save( $fields )
        {
            return $this->db->save( $fields , 'adm_reward_levelup' );
        }

        function update( $fields , $uid )
        {
            return $this->db->update( $fields , 'adm_reward_levelup' , " WHERE uid = $uid" );
        }
    }