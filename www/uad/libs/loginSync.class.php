<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/5
 * Time: 下午8:11
 */

namespace uad\libs;


use core\Cookie;
use core\Encoder;
use uad\core\UadController;

class LoginSync extends UadController{

    private static $_instance = null;

    static function instance(){
        if (self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function loginSuccess($gameUser,$gameDB,$admDB){
        $sql = "SELECT * FROM adm_users WHERE uid = ?";
        $admDB->execute($sql,array($gameUser['uid']));
        $user = $admDB->fetch();
        if(false == $user){
            $inviteCode = null;
            try{
                $admDB->begin();
                $gameDB->begin();
                if(!UserRelationShip::instance($admDB,$gameDB)->createRelationShipFromGame($gameUser,$inviteCode))
                    throw new \Exception(UadError::LOGIN_FAILED);

                $admDB->commit();
                $gameDB->commit();
            }catch (\Exception $e){
                $admDB->rollback();
                $gameDB->rollback();
                $this->response(null,$e->getMessage());
            }

            $sql = "SELECT * FROM adm_users WHERE uid = ?";
            $admDB -> execute($sql,array($gameUser['uid']));
            $user = $admDB->fetch();
        }
        $inviteCode = empty($gameUser['invite_code']) ? $inviteCode : $gameUser['invite_code'];
        Cookie::instance()->set_userdata('uad_session_data',Encoder::instance()->encode($user));
        Cookie::instance()->set_userdata('uad_uid',$gameUser['uid']);
        Cookie::instance()->set_userdata('uad_invite_code',$inviteCode);
    }
} 