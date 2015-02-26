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
use core\Pusher;
use core\Redirect;
use gms\libs\AdminUtil;
use gms\libs\Error;
use gms\libs\GameServer;
use gms\libs\ModuleDictionary;
use gms\libs\PlayerUtil;
use gms\libs\SystemLog;
use gms\model\GameSummary_M;
use gms\model\Player_M;
use gms\model\Profile_M;
use utils\Das;
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

        $oldProfile = Profile_M::instance()->read($uid);
        if(!Profile_M::instance()->update($fields,$uid))
             $this->set_error(Error::DATA_WRITE);

        //分析资源变化 并且发给数据统计服务
        $coins = intval($oldProfile['coins']) - intval($fields['coins']);
        $ticket = intval($oldProfile['ticket']) - intval($fields['ticket']);
        $diamond = intval($oldProfile['diamond']) - intval($fields['diamond']);
        $coupon = intval($oldProfile['oldCoupon']) - intval($fields['coupon']);

        $config = $this->config->common['go_das_server'];
        if ($config['enable']){
            $pusher = new Pusher($config);
            $version = '1.001.22';
            if ($coins >0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => 0,
                        't_t'=>0,
                        'p'=> $coins,
                        'p_t'=>0
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }else if($coins < 0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => $coins * -1,
                        't_t'=>0,
                        'p' => 0,
                        'p_t'=>0
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }

            if ($ticket >0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => 0,
                        't_t'=>0,
                        'p'=> $ticket,
                        'p_t'=>2
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }else if($ticket < 0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => $ticket * -1,
                        't_t'=>2,
                        'p' => 0,
                        'p_t'=>0
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }

            if ($diamond >0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => 0,
                        't_t'=>0,
                        'p'=> $diamond,
                        'p_t'=>1
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }else if($diamond < 0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => $diamond * -1,
                        't_t'=>1,
                        'p' => 0,
                        'p_t'=>0
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }

            if ($coupon >0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => 0,
                        't_t'=>0,
                        'p'=> $coupon,
                        'p_t'=>3
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }else if ($coupon < 0){
                $data = array(
                    's'=>10001,
                    'pt'=>Das::PLATFORM_WEB,
                    'v'=>$version,
                    'w'=>Das::RESOURCE,
                    'd' => array(
                        't' => $coupon * -1,
                        't_t'=>3,
                        'p' => 0,
                        'p_t'=>0
                    )
                );
                $data = Encoder::instance()->encode(Tools::array_val_toString($data),Encoder::MSGPACK);
                $pusher->push($data);
            }
        }

        SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_PLAYERS_ADD,'编辑玩家#uid:'.$uid.'的资源属性');
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

    /**
     * 封停
     */
    function forbidden(){
            AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS_ADD);
            $player_id = $this->args[0];
            $login_name = $this->args[1];

            if(!PlayerUtil::instance()->forbidden(PlayerUtil::FORBBIDEN,$player_id))
                      $this->response(null,Error::DATA_WRITE);

            SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_PLAYERS,"封停玩家 $login_name ");
            $this->response(null);
    }

    /**
     * 解封
     */
    function unforbidden(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS_ADD);
        $player_id = $this->args[0];
        $login_name = $this->args[1];

        if(!PlayerUtil::instance()->forbidden(PlayerUtil::UNFORBBIDEN,$player_id))
            $this->response(null,Error::DATA_WRITE);

        SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_PLAYERS,"解封玩家 $login_name ");
        $this->response(null);
    }


    /**
     * 重置密码
     */
    function reset_password(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS_ADD);
        $player_id = $this->args[0];
        $user_number = $this->args[1];
        $login_name = $this->args[2];

        if( !$newpassword = PlayerUtil::instance()->reset_password($player_id,$user_number))
            $this->response(null,Error::DATA_WRITE);

        SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_PLAYERS,"重置玩家 $login_name 的登陆密码为:$newpassword");
        $this->response($newpassword);
    }


    /**
     * 重置消费密码
     */
    function reset_purchase_password(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_PLAYERS_ADD);
        $player_id = $this->args[0];
        $user_number = $this->args[1];
        $login_name = $this->args[2];

        if(!$newpassword = PlayerUtil::instance()->reset_purchase_password($player_id,$user_number))
            $this->response(null,Error::DATA_WRITE);

        SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_PLAYERS,"重置玩家 $login_name 的消费密码为:$newpassword");
        $this->response($newpassword);
    }

} 