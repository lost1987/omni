<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/19
 * Time: 上午11:03
 */

namespace uad\core;


use core\Cookie;
use uad\libs\UadUtil;

class UadAutoValidationController extends UadController{

    function __construct(){
        parent::__construct();
        UadUtil::instance()->check_login();
        $this->output_data['invite_code'] = Cookie::instance()->userdata('uad_invite_code');
    }
} 