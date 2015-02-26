<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/12/19
 * Time: 下午2:48
 */

namespace gms\controller;


use core\AdminController;
use gms\libs\AdminUtil;
use gms\libs\ModuleDictionary;
use gms\model\UserResourceLog_M;
use utils\Page;

/**
 * 用户资源日志
 * Class UserResourceLog
 * @package gms\controller
 */
class UserResourceLog extends AdminController{


    function lists(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS);

        $page = empty($this->args[3]) ? 1 : $this->args[3];
        $count = 10;
        $start = ($page-1) * $count;

        $this->output_data['login_name'] = $this->args[1];
        $this->output_data['uid'] = $this->args[2];

        //获取查询条件
        $search_params = $this->http_get_params();
        foreach($search_params as $k => $v){
            if(!empty($v) || $v == '0')
                $this->output_data['search_'.$k] = $v;
            else
                unset($search_params[$k]);
        }
        $search_params['uid']= $this->args[2];
        $query_string = http_build_query($search_params);

        $list = UserResourceLog_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = UserResourceLog_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        foreach($list as &$item){
            $item['price_type'] = $this->config->gms['price_type'][$item['price_type']];
            $item['tool_type'] = $this->config->gms['tool_type'][$item['tool_type']];
            $item['action'] = $this->config->gms['user_resource_log_action_type'][$item['action_type']];
            $item['create_time'] = date('Y-m-d H:i:s',$item['create_time']);
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/userResourceLog/lists/'.ModuleDictionary::ROOT_MODULE_GAME.'/'.$this->args[1].'/'.$this->args[2].'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        $this->output_data['actions'] = $this->config->gms['user_resource_log_action_type'];
        array_unshift($this->output_data['actions'],'全部');
        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('user_resource_log_list.html');
    }
} 