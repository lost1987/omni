<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 下午5:49
 */

namespace gms\libs;


use core\Configure;
use core\Cookie;
use gms\model\Module_M;
use gms\model\Systemlog_M;
use utils\Tools;

/**
 * 系统日志
 * Class Systemlog
 * @package gms\libs
 */
class SystemLog
{

    private $_systemlog_M = null;

    private static $_instance = null;

    static function instance()
    {
        if (self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function __construct()
    {
        $this->_systemlog_M = Systemlog_M::instance();
    }

    /**
     * 记录日志
     * @param $module_id 请根据ModuleDictionary定义的值传入
     * @param string $desp
     * @return mixed
     */
    function save($module_id, $desp = '')
    {
        $session_data = AdminUtil::instance()->session_data();
        if(!$session_data)
             throw new Exception(Error::LOGIN_TIMEOUT);
        $account = $session_data['account'];
        $module_M = Module_M::instance()->read($module_id);
        $fields = array(
            'admin_id' => $session_data['id'],
            'module_id' => $module_id,
            'operation_time' => time(),
            'ip' => Tools::getip(),
            'desp' => $desp,
            'account' => $account,
            'module_name' => $module_M['module_name']
        );
        return $this->_systemlog_M->save($fields);
    }

} 