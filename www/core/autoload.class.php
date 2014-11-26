<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-7-28
 * Time: 下午1:59
 */
class Autoload {

    static function load($class_path){
                /*单独判断模板的加载**/
                if(strtolower(substr($class_path,0,4)) == 'twig'){
                        require_once BASE_PATH.'/libs/'.str_replace('_','/',$class_path).'.php';
                }else{
                        $class_path = str_replace('\\','/',$class_path);
                        $class_name =  preg_replace('/(.*)\/(\w+)/','$2',$class_path);
                        $class_path = preg_replace('/(.*)\/(\w+)/','$1',$class_path);
                        $class_path .= '/'.lcfirst($class_name);
                        $file_path = BASE_PATH.'/'.str_replace('\\','/',$class_path).'.class.php';
                        if(file_exists($file_path))
                            require_once $file_path;
            }
    }

} 