<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/29
 * Time: 下午2:09
 */

namespace gms\controller;


use core\AdminController;
use gms\libs\AdminUtil;
use gms\libs\ModuleDictionary;
use gms\model\Module_M;
use gms\model\Systemlog_M;
use utils\IpAddress;
use utils\Page;
use utils\Tools;

/**
 * 系统日志
 * Class SystemLog
 * @package gms\controller
 */
class SystemLog extends AdminController{

    function lists(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULES_SYSTEM_LOG_LIST);
        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 10;
        $start = ($page-1) * $count;

        //获取查询条件
        $search_params = $this->http_get_params();
        foreach($search_params as $k => $v){
            if(!empty($v) || $v == '0')
                $this->output_data['search_'.$k] = $v;
            else
                unset($search_params[$k]);
        }
        $query_string = http_build_query($search_params);

        $list = Systemlog_M::instance()->set_condition($search_params)->lists($start,$count);
        $ipAddr = IpAddress::instance();
        foreach($list as &$item){
            $item['operation_time'] = date('Y-m-d H:i:s',$item['operation_time']);
            $item['ip'] = $item['ip'].'('.$ipAddr->QQwry($item['ip'])->full_address().')';
        }
        $total = Systemlog_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/systemLog/lists/'.ModuleDictionary::ROOT_MODULE_LOGS.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $this->output_data['module_list'] = array_merge(array('module_name'=>'全部','id' => 0),Module_M::instance()->lists());
        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('system_log_list.html');
    }

} 