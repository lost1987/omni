<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/29
 * Time: 下午2:09
 */

namespace gms\controller;


use core\AdminController;

/**
 * 系统日志
 * Class SystemLog
 * @package gms\controller
 */
class SystemLog extends AdminController{

    function lists(){
        $this->init_navigator();
        $this->render('index.html');
    }

} 