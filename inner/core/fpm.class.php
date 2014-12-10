<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-8-18
 * Time: 下午4:54
 */

namespace core;


use interfaces\IStartup;
use utils\Http;
use utils\Tools;

class Fpm implements IStartup{

    private static $_instance = null;


    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new Fpm();
        return self::$_instance;
    }

    /**
     * @param $dir  BASE_PROJECT 项目文件夹名称
     * @param \Omni $omni 统启类
     */
    function run($dir,\Omni &$omni)
    {
        /*判断入口 根据入口解析pathinfo**/
        $visit_mode = Configure::instance()->{$dir}['visit_mode'] ;
        switch($visit_mode){
            case 'normal' :             //通过重写成pathinfo模式
                                        $omni -> args = null;
                                        $controller_name = str_replace('/','',$_GET['c']);
                                        $method_name = str_replace('/','',$_GET['m']);
                                        $params = $omni->input->get_post('params');
                                        if(!empty($params)){//将controller和method后的pathinfo参数写到$omni->request数组中(并不影响get,post的使用)
                                             $params = explode('/',$params);
                                             foreach($params as $v){
                                                 if(!empty($v) || $v == '0')
                                                        $omni -> args[] = $v;
                                             }
                                        }
                                        break;
            case 'pathinfo':
                                        list(,$controller_name,$method_name) = explode('/',$_SERVER['PATH_INFO']);
                                        break;
        }

        //执行hook_before_controller
        $hooks = Configure::instance()->{$dir}['hook_breforectl'];
        if(count($hooks) > 0){
                foreach($hooks as $hook){
                        $clazz = '\\'.$dir.'\hook\beforectl\\'.$hook['clazz'];
                        $hook_c = new $clazz;
                        if(is_array($hook['method'])){
                            foreach($hook['method'] as $method){
                                call_user_func(array($hook_c,$method));
                            }
                        }else
                            call_user_func(array($hook_c,$hook['method']));
                }
        }

        if(empty($controller_name))$controller_name = 'Index';
        $controller_name = '\\'.$dir.'\controller\\'.ucfirst($controller_name);

        /*检查类和方法是否存在 不存在则定位到404**/
        if(class_exists($controller_name)){
            $r = new ReflectClass($controller_name);
            $c =  $r -> newInstance() ;

            if(empty($method_name))$method_name = 'index';
            if(method_exists($c,$method_name)){
                    call_user_func(array($c,$method_name));
            }else
                Http::sendHttpStatus(404);
        }else
            Http::sendHttpStatus(404);
    }

} 