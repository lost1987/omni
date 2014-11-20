<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/5
 * Time: 下午2:22
 */

namespace gms\controller;


use core\AdminController;
use core\Cookie;
use core\Encoder;
use core\Permission;
use core\Redirect;
use gms\libs\AdminUtil;
use gms\libs\Error;
use gms\libs\GameServer;
use gms\libs\ModuleDictionary;
use gms\libs\SystemLog;
use gms\model\GameSummary_M;
use gms\model\Player_M;
use gms\model\Profile_M;
use utils\Page;
use utils\Tools;

/**
 * 玩家管理
 * Class Player
 * @package gms\controller
 */
class Player extends AdminController{

    function lists(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS);

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

        $list = Player_M::instance()->set_condition($search_params)->lists($start,$count);
        $total = Player_M::instance()->set_condition($search_params)->num_rows();
        $this->init_navigator();

        $this->output_data['btn_edit_permission'] = 0;

        //检查按钮权限
        if(Cookie::instance()->userdata('is_administrator')){
            $this->output_data['btn_edit_permission'] = 1;
        }else{
            $session_p = Cookie::instance()->userdata('session_p');
            if(!empty($session_p)){
                $session_p = Encoder::instance()->decode($session_p);
                foreach($session_p as $p){
                    if($p['module_id'] == ModuleDictionary::ROOT_MODULE_GAME){
                        if( Permission::instance()->hasPermission($p['admin_permission'],2))
                            $this->output_data['btn_edit_permission'] = 1;
                    }
                }
            }
        }

        //初始化分页
        $page_params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/player/lists/'.ModuleDictionary::ROOT_MODULE_GAME.'/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active',
            'query_string' => $query_string
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render('player_list.html');
    }

    function add(){
            AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS_ADD);
            $this->init_navigator();
            $this->output_data['uid'] = $this->args[2];
            $this->output_data['login_name'] = $this->args[3];
            $this->output_data['item'] = Profile_M::instance()->readResource($this->output_data['uid']);
            $this->output_data['action']  = '/player/update';
            $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
            $this->render('player_add.html');
    }

    function update(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS_ADD);
        $this->csrf_token_validation();
        $fields = $this->input->post();
        $uid = $fields['id'];
        unset($fields['id']);

        if(!Profile_M::instance()->update($fields,$uid))
             $this->set_error(Error::DATA_WRITE);
        SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_PLAYERS_ADD,'编辑玩家#'.$uid.'的资源属性');
        Redirect::instance()->forward('/player/lists/19');
    }

    function detail(){
            AdminUtil::instance()->check_permission(20);
            $uid = $this->args[0];
            $profile = Profile_M::instance()->read($uid);
            $profile['area'] =  $this->config->gms['areas'][$profile['area']];
            $profile['gender'] = empty($profile['gender']) ? '男' : '女';
            $profile['real_name'] = empty($profile['real_name']) ? '/' : $profile['real_name'];
            $profile['id_card'] = empty($profile['id_card']) ? '/' : $profile['id_card'];

            $gamesummary = GameSummary_M::instance()->read($uid);
            if(false == $gamesummary)
                $data = $profile;
            else {
                $data = array_merge($profile, $gamesummary);
            }
            $this->response($data,0);
    }

} 