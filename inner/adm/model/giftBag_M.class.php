<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/6
 * Time: 上午11:22
 */

namespace adm\model;

use core\Encoder;
use core\Model;

class GiftBag_M extends Model
{

    private static $_instance = null;

    static function instance()
    {
        if ( self::$_instance == null )
            self::$_instance = new self;

        return self::$_instance;
    }

    function lists(){
        $sql = "SELECT * FROM adm_gift_bag";
        $this->db->execute($sql);
        $gifts = $this->db->fetch_all();
        $list = array();
        foreach($gifts as $g){
            $g['items'] = Encoder::instance()->decode($g['items']);
            $list[$g['id']] = $g;
        }
        return $list;
    }

    function update($fields,$id){
        return $this->db->update($fields,'adm_gift_bag',' WHERE id = '.$id);
    }
}