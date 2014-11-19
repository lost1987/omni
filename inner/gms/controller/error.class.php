<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/30
 * Time: 下午3:36
 */

namespace gms\controller;


use core\AdminController;

class Error extends AdminController{

    function code(){
        $this->output_data['error_code'] = $this->args[0];
        $this->render('error.html');
    }

} 