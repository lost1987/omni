<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-10-16
 * Time: 上午9:28
 */

namespace web\controller;


use utils\Das;
use web\libs\Error;
use core\Controller;
use core\Cookie;
use core\Redirect;
use web\libs\UserUtil;
use web\model\UserModel;

class Game extends Controller{

    function index(){
        $output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $output_data['errcode'] = empty($this->args[0]) ? 0 : $this->args[0];
        if(!UserUtil::instance()->isLogin()) {
            $this->tpl->display('game_login.html',$output_data);
        }else{
            Redirect::instance()->forward('/game/enter');
        }
    }

    /**
     * 加载游戏页面
     */
    function enter(){
        //写入统计数据
//        $uid = Cookie::instance()->userdata('uid');
//        //判断玩家今日是否登录过
//        if(UserModel::instance()->hasLoginToday($uid))
//            Das::instance()->send(array('uid'=>$uid),Das::LOGIN_COUNT)->close();
//        else
//            Das::instance()->send(array('uid'=>$uid),Das::LOGIN_COUNT | Das::LOGIN_NUM)->close();

        $file_path = BASE_PATH.'/'.BASE_PROJECT.'/media/bin/Portal.swf';
        if(!file_exists($file_path))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_FILE_NOT_EXIST);
        $version = filemtime($file_path);
        $output_data = array(
            'version' => $version
        );
        $this->tpl->display('game.html',$output_data);
    }

} 