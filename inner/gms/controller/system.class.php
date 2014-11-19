<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/29
 * Time: 上午11:50
 */

namespace gms\controller;


use core\AdminController;
use core\Redirect;
use core\Redis;
use gms\libs\AdminUtil;
use gms\libs\ModuleDictionary;

/**
 * 系统功能控制器
 * Class System
 * @package gms\controller
 */
class System extends AdminController{

    /**
     * 清除缓存:
     * 1.redis导航缓存
     */
    function ajax_clear_cache()
    {
        $r = new Redis($this->config->gms['redis']['host'], $this->config->gms['redis']['port']);
        $redis = $r->getResource();
        $redis->select(2);
        $modules_ids = $redis->hGetAll('gms_modules');
        foreach ($modules_ids as $module_id) {
            $redis->del('gms_modules_' . $module_id);
        }
        $redis->del('gms_modules');
        Redirect::instance()->forward();
    }


    function php_info(){
            AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SYSTEM_INFO_PHP);
            $this->init_navigator();
            $this->output_data['obj'] = $this;
            $this->render('php_env.html');
    }

    function twig_info(){
        if(function_exists('phpinfo'))
            phpinfo();
    }
} 