<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/7
 * Time: 上午9:53
 */

namespace gms\controller;


use core\AdminController;
use core\Cookie;
use core\Encoder;
use core\Permission;
use gms\libs\AdminUtil;
use gms\libs\Error;
use gms\libs\ModuleDictionary;
use gms\libs\PlayerUtil;
use gms\libs\SystemLog;
use gms\model\Admin_M;
use gms\model\FeedBack_M;
use gms\model\HandleResult_M;
use gms\model\MobileProductLog_M;
use gms\model\Player_M;
use gms\model\RealProductLog_M;
use gms\model\StoreCategory_M;
use gms\model\StoreProducts_M;
use gms\model\Suspend_M;
use gms\model\TipOff_M;
use utils\Page;
use utils\Tools;

/**
 * 客服管理
 * Class Services
 * @package gms\controller
 */
class Services extends AdminController{

    /**
     * 玩家反馈
     */
    function lists_feedback(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_FEEDBACK);

        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 7;
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

        $list = FeedBack_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = FeedBack_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/services/lists_feedback/'.ModuleDictionary::ROOT_MODULE_SERVICES.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        //处理状态
        $this->output_data['handle_result_list'] = $this->config->gms['order_status'];

        foreach($list as &$item){
            $item['type_name'] = $this->config->gms['feedback_type'][$item['type']];
            $item['result_name'] = $this->config->gms['order_status'][$item['result']];
            $assign_to = Admin_M::instance()->read($item['assign_to']);
            $item['assign_to'] = $assign_to['account'];
        }

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('services_feedback_list.html');
    }

    /**
     * 玩家举报
     */
    function lists_tipoff(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_TIPOFF);

        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 7;
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

        $list = TipOff_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = TipOff_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/services/lists_tipoff/'.ModuleDictionary::ROOT_MODULE_SERVICES.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        //处理状态
        $this->output_data['handle_result_list'] = $this->config->gms['order_status'];

        foreach($list as &$item){
            $item['result_name'] = $this->config->gms['order_status'][$item['result']];
            $assign_to = Admin_M::instance()->read($item['assign_to']);
            $item['assign_to'] = $assign_to['account'];
        }

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('services_tipoff_list.html');
    }

    /**
     * 玩家申诉
     */
    function lists_suspend(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_SUSPEND);

        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 7;
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

        $list = Suspend_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = Suspend_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/services/lists_suspend/'.ModuleDictionary::ROOT_MODULE_SERVICES.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        //处理状态
        $this->output_data['handle_result_list'] = $this->config->gms['order_status'];

        foreach($list as &$item){
            $item['result_name'] = $this->config->gms['order_status'][$item['result']];
            $assign_to = Admin_M::instance()->read($item['assign_to']);
            $item['assign_to'] = $assign_to['account'];
        }

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('services_suspend_list.html');
    }

    /**
     * 玩家兑换
     */
    function lists_exchange(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_EXCHANGE);

        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 7;
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

        $list = HandleResult_M::instance()->set_non_lottery_condition($search_params)->lists($start,$count);
        $total = HandleResult_M::instance()->set_non_lottery_condition($search_params)->num_rows();
        $this->init_navigator();

        $this->output_data['btn_handle_permission'] = 0;
        $this->output_data['btn_fahuo_permission'] = 0;

        //检查按钮权限
        if(Cookie::instance()->userdata('is_administrator')){
            $this->output_data['btn_handle_permission'] = 1;
            $this->output_data['btn_fahuo_permission'] = 1;
        }else{
            $session_p = Cookie::instance()->userdata('session_p');
            if(!empty($session_p)){
                $session_p = Encoder::instance()->decode($session_p);
                foreach($session_p as $p){
                    if($p['module_id'] == ModuleDictionary::ROOT_MODULE_SERVICES){
                        if( Permission::instance()->hasPermission($p['admin_permission'],8)) {
                            $this->output_data['btn_handle_permission'] = 1;
                            $this->output_data['btn_fahuo_permission'] = 1;
                        }
                    }
                }
            }
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/services/lists_exchange/'.ModuleDictionary::ROOT_MODULE_SERVICES.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        //处理状态
        $this->output_data['handle_result_list'] = $this->config->gms['order_status'];

        //兑换分类
        $this->output_data['categories'] = StoreCategory_M::instance()->lists();
        unset($this->output_data['categories'][4]);//去除抽奖

        foreach($list as &$item){
            $assign_to = Admin_M::instance()->read($item['assign_to']);
            $item['assign_to'] = $assign_to['account'];
            $item['result_name'] = $this->config->gms['order_status'][$item['result']];
            $item['category_name'] = $this->output_data['categories'][$item['category_id']]['name'];
        }

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('services_exchange_list.html');
    }

    /**
     * 玩家抽奖
     */
    function lists_lottery(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_LOTTERY);

        $page = empty($this->args[1]) ? 1 : $this->args[1];
        $count = 7;
        $start = ($page-1) * $count;

        //获取查询条件
        $search_params = $this->http_get_params();
        foreach($search_params as $k => $v){
            if(!empty($v) || $v == '0')
                $this->output_data['search_'.$k] = $v;
            else
                unset($search_params[$k]);
        }
        $search_params['category_id'] = 4;//默认设置只读取抽奖分类
        $query_string = http_build_query($search_params);

        $list = HandleResult_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = HandleResult_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        $this->output_data['btn_handle_permission'] = 0;
        $this->output_data['btn_fahuo_permission'] = 0;

        //检查按钮权限
        if(Cookie::instance()->userdata('is_administrator')){
            $this->output_data['btn_handle_permission'] = 1;
            $this->output_data['btn_fahuo_permission'] = 1;
        }else{
            $session_p = Cookie::instance()->userdata('session_p');
            if(!empty($session_p)){
                $session_p = Encoder::instance()->decode($session_p);
                foreach($session_p as $p){
                    if($p['module_id'] == ModuleDictionary::ROOT_MODULE_SERVICES){
                        if( Permission::instance()->hasPermission($p['admin_permission'],8)) {
                            $this->output_data['btn_handle_permission'] = 1;
                            $this->output_data['btn_fahuo_permission'] = 1;
                        }
                    }
                }
            }
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/services/lists_lottery/'.ModuleDictionary::ROOT_MODULE_SERVICES.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        //处理状态
        $this->output_data['handle_result_list'] = $this->config->gms['order_status'];

        //兑换分类
        $this->output_data['products'] = StoreProducts_M::instance()->lottery_lists();

        foreach($list as &$item){
            $assign_to = Admin_M::instance()->read($item['assign_to']);
            $item['assign_to'] = $assign_to['account'];
            $item['result_name'] = $this->config->gms['order_status'][$item['result']];
        }

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('services_lottery_list.html');
    }

    function read_feedback(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_FEEDBACK);
        $id = $this->args[0];
        $feedback = FeedBack_M::instance()->read($id);
        $this->response($feedback);
    }

    function read_tipoff(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_TIPOFF);
        $id = $this->args[0];
        $tipoff = TipOff_M::instance()->read($id);
        $tipoff['img'] = WWW_HOST.$tipoff['img'];
        $this->response($tipoff);
    }

    function read_suspend(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_SUSPEND);
        $id = $this->args[0];
        $tipoff = Suspend_M::instance()->read($id);
        $this->response($tipoff);
    }

    /**
     * 处理反馈
     */
    function handle_result(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_SERVICES_FEEDBACK);
        $ids = $this->input->post('ids');
        $msg = $this->input->post('msg');
        $result = $this->input->post('result');
        if(empty($ids))
            $this->response(null,Error::ARGUMENTS);

        $ids = explode(',',$ids);
        $gamedb = $this->getGameDB();
        try{
                $gamedb->begin();
                $handler_ids = array();
                foreach($ids as $id_uid){
                       list($id,$uid) = explode('#',$id_uid);
                    $handler_ids[] = $id;
                        if(!empty($msg)) {
                            if (!PlayerUtil::instance()->sendMsg($uid, $msg))
                                throw new \Exception(Error::DATA_WRITE);
                        }
                }

                if(!HandleResult_M::instance()->updateResult($result,$handler_ids))
                     throw new \Exception(Error::DATA_WRITE);

                $gamedb->commit();
                SystemLog::instance()->save(ModuleDictionary::MODULE_SERVICES_FEEDBACK,'处理handler_id #'.implode(',',$handler_ids).',状态变更为['.$this->config->gms['order_status'][$result].']');
                $this->response(null);
        }catch (\Exception $e){
                $gamedb->rollback();
                $this->response(null,$e->getMessage());
        }
    }

    /**
     * 处理发货(兑换/抽奖)
     */
    function handle_consignment(){
        $post = $this->input->post();
        $module_id = $post['module_id'];
        AdminUtil::instance()->check_permission($module_id);
        $admin =  AdminUtil::instance()->session_data();
        $post['admin_id'] = $admin['id'];
        $post['admin_account'] = $admin['account'];
        $post['create_time'] = time();
        $server = Encoder::instance()->decode(Cookie::instance()->userdata('selected_server'));
        $post['sid'] = $server['id'];
        $handler_id = $post['handler_id'];
        $product_id = $post['product_id'];
        unset($admin,$server,$post['handler_id'],$post['module_id']);

        $gamedb =  $this->getGameDB();
        try{
                $gamedb->begin();
                $this->db->begin();
                //写入发货记录
                if(!RealProductLog_M::instance()->save($post))
                    throw new \Exception(Error::DATA_WRITE);
                $product_log_id = $this->db->insert_id();

                //修改该条记录的状态
                $handle_time = date('Y-m-d H:i:s');
                $fields  =  array(
                    'assign_to' => $post['admin_id'],
                    'handle_time' => $handle_time,
                    'result' => 4
                );
                if(!HandleResult_M::instance()->update($fields,$handler_id))
                    throw new \Exception(Error::DATA_WRITE);

                $product  =  StoreProducts_M::instance()->read($product_id);
                $msg = "您的{$product['name']}已经发货 , 请注意签收";
                if(!PlayerUtil::instance()->sendMsg($post['user_id'],$msg))
                    throw new \Exception(Error::DATA_WRITE);

                $gamedb->commit();
                $this->db->commit();
                SystemLog::instance()->save($module_id,'提交发货单 #id:'.$product_log_id.',#product_id:'.$product_id.',#handler_id:'.$handler_id);
                $this->response(null);
        }catch (\Exception $e){
                $gamedb->rollback();
                $this->db->rollback();
                $this->response(null,$e->getMessage());
        }
    }

    function handle_mobile(){
        $post = $this->input->post();
        $module_id = $post['module_id'];
        AdminUtil::instance()->check_permission($module_id);
        $admin =  AdminUtil::instance()->session_data();
        $post['admin_id'] = $admin['id'];
        $post['admin_account'] = $admin['account'];
        $post['create_time'] = time();
        $server = Encoder::instance()->decode(Cookie::instance()->userdata('selected_server'));
        $post['sid'] = $server['id'];
        $handler_id = $post['handler_id'];
        $product_id = $post['product_id'];
        unset($admin,$server,$post['handler_id'],$post['module_id']);

        $gamedb =  $this->getGameDB();
        try{
            $gamedb->begin();
            $this->db->begin();
            //写入发货记录
            if(!MobileProductLog_M::instance()->save($post))
                throw new \Exception(Error::DATA_WRITE);
            $product_log_id = $this->db->insert_id();

            //修改该条记录的状态
            $handle_time = date('Y-m-d H:i:s');
            $fields  =  array(
                'assign_to' => $post['admin_id'],
                'handle_time' => $handle_time,
                'result' => 2
            );
            if(!HandleResult_M::instance()->update($fields,$handler_id))
                throw new \Exception(Error::DATA_WRITE);

            $product  =  StoreProducts_M::instance()->read($product_id);
            $msg = "您的{$product['name']}已经发货 , 请注意签收";
            if(!PlayerUtil::instance()->sendMsg($post['user_id'],$msg))
                throw new \Exception(Error::DATA_WRITE);

            $gamedb->commit();
            $this->db->commit();
            SystemLog::instance()->save($module_id,'提交充值记录['.$post['mobile'].'] #id:'.$product_log_id.',#product_id:'.$product_id.',#handler_id:'.$handler_id);
            $this->response(null);
        }catch (\Exception $e){
            $gamedb->rollback();
            $this->db->rollback();
            $this->response(null,$e->getMessage());
        }
    }

    function handle_done(){
        $post = $this->input->post();
        $module_id = $post['module_id'];
        AdminUtil::instance()->check_permission($module_id);
        $admin =  AdminUtil::instance()->session_data();
        $fields = array(
            'assign_to' => $admin['id'],
            'handle_time' => date('Y-m-d H:i:s'),
            'result' => 2
        );

        if(!HandleResult_M::instance()->update($fields,$post['handler_id']))
            $this->response(null,Error::DATA_WRITE);

        SystemLog::instance()->save($module_id,'将发货单设为已完成状态,#handler_id:'.$post['handler_id'].',#product_id:'.$post['product_id']);
        $this->response(null);
    }
}