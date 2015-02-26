<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/19
 * Time: 上午11:03
 */

namespace uad\core;


use core\Base;
use core\DB;
use core\Encoder;

class UadController extends Base{

    protected $output_data;

    function __construct(){
        $this->output_data = array();
    }

    protected function loadGameDB(){
        $db = new DB();
        $db -> init_db_from_config('game');
        return $db;
    }

    protected function response($data=null,$errCode=0){
        $response = array(
            'error' => $errCode,
            'data' => $data
        );
        die(Encoder::instance()->encode($response));
    }

    /**
     * 去除重写后的c,m,params 这些参数的$_GET
     * 提供纯净的表单get参数
     */
    protected  function http_get_params(){
        $get = array();
        $key_filter = array('c','m','params');
        if(!$this->input->get())
            return array();

        foreach($this->input->get() as $k => $v){
            if(!in_array($k,$key_filter))
                $get[$k] = $v;
        }
        return $get;
    }
} 