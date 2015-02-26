<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/12
 * Time: 下午2:06
 */

namespace gms\model;


use core\AdminModel;

class SystemMessage_M extends AdminModel{

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function lists( $start = null , $count = null )
    {
        $limit = '';
        if ( $start !== null && $count !== null )
            $limit = " LIMIT $start , $count";

        $sql = "SELECT * FROM system_messages  ORDER BY id DESC  $limit";
        $this->_game_server->execute( $sql );
        $this->_condition = '';

        return $this->_game_server->fetch_all();
    }


    function num_rows()
    {
        $sql = "SELECT COUNT(*) as num FROM system_messages";
        $this->_game_server->execute( $sql );
        $this->_condition = '';

        return $this->_game_server->fetch()['num'];
    }

    function save(Array $contents){
        $sql = "INSERT INTO system_messages (title,content,msg_time,publish_time,expire_time,state,handler_id) VALUES ";
        $values = array();
        $time = time();
        foreach($contents as $content){
            $values[] = " ('$content','$content',$time,$time,$time,1,1) ";
        }
        $values = implode(",",$values);
        $sql .= $values;
        return $this->_game_server->execute($sql);
    }

} 