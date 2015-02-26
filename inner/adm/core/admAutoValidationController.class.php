<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/13
 * Time: 上午9:44
 */

namespace adm\core;


use adm\libs\AdmUtil;
use core\Base;

/**
 * 自带login验证
 * Class AdmAutoValidationController
 * @package adm\core
 */
class AdmAutoValidationController extends AdmController{

    function __construct(){
        parent::__construct();
        AdmUtil::instance()->check_login();
    }

} 