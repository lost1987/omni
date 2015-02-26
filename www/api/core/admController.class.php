<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/6
 * Time: 下午3:37
 */
namespace api\core;

use core\Base;
use core\DB;

class AdmController extends Base{

    protected $db = null;

    function __construct(){
        $this->db = new DB();
        $this->db->init_db_from_config('adm');
    }

} 