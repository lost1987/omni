<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/3
 * Time: 下午4:36
 */

namespace web\controller;


use core\Controller;

class Match extends Controller{

    function index(){
        $this->tpl->display('match.html');
    }

} 