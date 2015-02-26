<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 上午9:39
 */

namespace uad\controller;


use core\Cookie;
use core\DB;
use core\Redirect;
use uad\core\UadController;
use uad\libs\GameUser;
use uad\libs\UadError;
use web\controller\User;
use web\libs\LoginSync;
use web\libs\UserUtil;
use web\model\UserModel;

/**
 * 登陆控制器
 * Class Login
 * @package uad\controller
 */
class Login extends UadController{

    function index(){
        $this->tpl->display('login.html');
    }

    function doo(){
        $login_name = $this->input->post('login_name');
        $password = $this->input->post('password');

        if(strlen($password) != 32 || empty($login_name) || empty($password))
            $this->response(null,UadError::UNAME_PWD_ERROR);

        $gameUser = GameUser::instance()->getGameUserByLoginName($login_name);
        if(false == $gameUser){
              $gameUser = GameUser::instance()->getGameUserByEmail($login_name);
              if(false == $gameUser){
                  $gameUser == GameUser::instance()->getGameUserByMobile($login_name);
                  if(false == $gameUser)
                      $this->response(null,UadError::UNAME_PWD_ERROR);
                  else{
                      $auths = GameUser::instance()->getAuth($gameUser['uid']);
                      if(!$auths[UserUtil::USER_AUTH_SMS])
                          $this->response(null,UadError::UNAME_PWD_ERROR);
                  }
              }else{
                  $auths = GameUser::instance()->getAuth($gameUser['uid']);
                  if(!$auths[UserUtil::USER_AUTH_MAIL])
                      $this->response(null,UadError::UNAME_PWD_ERROR);
              }
        }

        $password = UserUtil::instance()->makePassword($password,$gameUser['user_number']);
        if($password == $gameUser['password']){
                $gamedb = new DB();
                $gamedb->init_db_from_config('game');
                \uad\libs\LoginSync::instance()->loginSuccess($gameUser,$gamedb,$this->db);
                $this->loginSync($gameUser,$gamedb);
                $this->response();
        }
        $this->response(null,UadError::UNAME_PWD_ERROR);
    }

    private function loginSync($gameUser,$gameDB){
        LoginSync::instance()->loginSuccess($gameUser,$gameDB);
    }

    /**
     * 注销
     */
    function logout(){
            Cookie::instance()->sess_destroy();
            Redirect::instance()->forward();
    }

}