<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/14
 * Time: 下午2:11
 */

namespace gms\controller;


use core\AdminController;
use core\Cookie;
use core\Encoder;
use core\Permission;
use core\Redirect;
use gms\libs\AdminUtil;
use gms\libs\Error;
use gms\libs\Helper;
use gms\libs\ModuleDictionary;
use gms\libs\SystemLog;
use gms\libs\VerifyUtil;
use gms\model\Admin_M;
use gms\model\KnockoutMatch_M;
use gms\model\KnockoutSignupPrice_M;
use gms\model\MatchPrize_M;
use gms\model\Verify_M;
use utils\Tools;

/**
 * 淘汰赛
 * Class KnockoutMatch
 * @package gms\controller
 */
class KnockoutMatch extends AdminController{

    function lists(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_LIST);
        $this->init_navigator();
        $this->output_data['btn_edit_permission'] = 0;
        $this->output_data['btn_prize_permission'] = 0;
        $this->output_data['btn_verify_permission'] = 0;

        //检查按钮权限
        if(Cookie::instance()->userdata('is_administrator')){
            $this->output_data['btn_edit_permission'] = 1;
            $this->output_data['btn_prize_permission'] = 1;
            $this->output_data['btn_verify_permission'] = 1;
        }else{
            $session_p = Cookie::instance()->userdata('session_p');
            if(!empty($session_p)){
                $session_p = Encoder::instance()->decode($session_p);
                foreach($session_p as $p){
                    if($p['module_id'] == ModuleDictionary::ROOT_MODULE_GAME){
                        if( Permission::instance()->hasPermission($p['admin_permission'],16)) {
                            $this->output_data['btn_edit_permission'] = 1;
                            $this->output_data['btn_prize_permission'] = 1;
                        }else if(Permission::instance()->hasPermission($p['admin_permission'],64)){
                            $this->output_data['btn_verify_permission'] = 1;
                        }

                    }
                }
            }
        }

        $list = KnockoutMatch_M::instance()->lists();
        foreach($list as &$item)
        {
            $item['match_type_name'] = $this->config->gms['match_types'][ $item['match_type'] ];
            $match_verify_counts = VerifyUtil::instance()->unverified_nums(VerifyUtil::TYPE_KNOCKOUT_MATCH,$item['match_id']);
            $match_prize_verify_counts = VerifyUtil::instance()->unverified_nums(VerifyUtil::TYPE_MATCH_PRIZE,$item['match_id']*10000+$item['match_type']);
            //检查是否需要审核
            if($match_verify_counts > 0) {
                $item['verify_match'] = 0;//未审核
            }else
                $item['verify_match'] = 1;//已审核

            if($match_prize_verify_counts > 0) {
                $item['verify_match_prize'] = 0;//未审核
            }else
                $item['verify_match_prize'] = 1;//已审核
        }
        $this->output_data['list']  = $list;
        $this->render('knockout_match_list.html');
    }

    function add(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_EDIT);
        $this->output_data['success'] = $this->args[1] == 'success' ? 1 : 0;
        $this->init_navigator();
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['match_types'] = $this->config->gms['match_types'];

        if($this->args[1] == 'edit'){
            $id = $this->args[2];
            $this->output_data['item'] =  KnockoutMatch_M::instance()->read($id);
            $this->output_data['action'] = '/knockoutMatch/cacheMatch/'.$id;
            $this->output_data['action_name'] = '编辑';
            $this->output_data['prize_types'] = $this->config->gms['prize_types'];
            $this->output_data['signup_price'] = KnockoutSignupPrice_M::instance()->read($id);
        }

        $this->render('knockout_match_add.html');
    }

    /**
     * 缓存需要审核的数据到gms审核表
     * @throws \gms\libs\Exception
     */
    function cacheMatch(){
        $this->csrf_token_validation();
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_EDIT);
        $fields = $this->input->post();
        $id = $this->args[0];

        if(!VerifyUtil::instance()->add_verify($id,$fields,VerifyUtil::TYPE_KNOCKOUT_MATCH))
            $this->set_error(Error::DATA_WRITE);
        $verify_id = $this->db->insert_id();
        SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_EDIT,"提交更改淘汰赛请求 淘汰赛id#$id 审核id#$verify_id");
        Redirect::instance()->forward('/knockoutMatch/lists/19');
    }

    /**
     * 跳转审核页面
     * @throws \Exception
     */
    function verifyList(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_MATCH_VERIFY);
        $this->init_navigator();
        $match_id = $this->args[1];
        $this->output_data['list'] = VerifyUtil::instance()->read_verify($match_id,VerifyUtil::TYPE_KNOCKOUT_MATCH);
        foreach($this->output_data['list'] as &$item){
            $item['create_time'] = date('Y-m-d H:i:s',$item['create_time']);
            $item['source_admin_name'] = Admin_M::instance()->read($item['source_admin_id'])['account'];
            $item['type_name'] = $this->config->gms['verify_types'][$item['type']];
            $item['match'] = Encoder::instance()->decode($item['json_content']);
            $item['match']['price_type'] = $this->config->gms['prize_types'][$item['match']['price_type']]['name'];
            $item['match']['base_price_type'] =  $this->config->gms['prize_types'][$item['match']['base_price_type']]['name'];
            $item['match']['match_type_name'] = $this->config->gms['match_types'][$item['match']['match_type']];
        }
        $this->render('knockout_match_verify.html');
    }

    /**
     * 审核比赛
     * @throws \Exception
     * @throws \gms\libs\Exception
     */
    function verifyMatch(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_MATCH_VERIFY);
        $match_id = $this->input->post('match_id');
        $verify_id = $this->input->post('verify_id');
        $remark = $this->input->post('remark');
        $verify = $this->input->post('verify');
        if($verify == 0){
            if(!VerifyUtil::instance()->unpass($verify_id,$remark))
                $this->set_error(Error::DATA_WRITE);
            SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_MATCH_VERIFY,"审核淘汰赛id#$match_id 审核id#$verify_id 为不通过");
        }else{
            $fields = Encoder::instance()->decode($this->input->post('json_content'));
            $signup_price['price_amount'] = $fields['price_amount'];
            $signup_price['price_type'] = $fields['price_type'];
            unset($fields['price_amount'],$fields['price_type']);
            $gamedb = $this->getGameDB();
            try{
                $gamedb->begin();
                $this->db->begin();
                if(!KnockoutMatch_M::instance()->update($fields,$match_id))
                    throw new \Exception(Error::DATA_WRITE);

                if(!KnockoutSignupPrice_M::instance()->update($signup_price,$match_id))
                    throw new \Exception(Error::DATA_WRITE);

                if(!VerifyUtil::instance()->pass($verify_id,$remark))
                    throw new \Exception(Error::DATA_WRITE);

                $gamedb->commit();
                $this->db->commit();
                @file_get_contents($this->config->gms['notify_server_match_update_address']);
                SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_MATCH_VERIFY,"审核淘汰赛id#$match_id 审核id#$verify_id 为通过");
            }catch (\Exception $e){
                $gamedb->rollback();
                $this->db->rollback();
                $this->set_error($e->getMessage());
            }
        }
        Redirect::instance()->forward('/knockoutMatch/lists/19');
    }

    function editPrize(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_EDIT);
        $this->init_navigator();
        $match_id  = $this->args[1];
        $match_type = $this->args[2];
        $match_prize_redis_key = Helper::instance()->get_match_prize_key($match_type,$match_id);

        $json_str = MatchPrize_M::instance()->list_prize_struct($match_prize_redis_key);

        $this->output_data['action'] = '/knockoutMatch/cachePrize/';
        $this->output_data['action_name'] = '编辑';
        $this->output_data['match_id'] = $match_id;
        $this->output_data['match_type'] = $match_type;
        $this->output_data['prize_types'] = Encoder::instance()->encode($this->config->gms['prize_types']);
        $this->output_data['list'] = $json_str;

        $this->render("knockout_match_prize.html");
    }

    function cachePrize(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_EDIT);
        $prize_data =$this->input->post('match_prize_info');
        $match_id = $this->input->post('match_id');
        $match_type = $this->input->post('match_type');;
        $abstract_id = $match_id * 10000 + $match_type;

      if(!VerifyUtil::instance()->add_verify($abstract_id,$prize_data,VerifyUtil::TYPE_MATCH_PRIZE))
            $this->set_error(Error::DATA_WRITE);

        $verify_id = $this->db->insert_id();
        SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_EDIT,"提交更改淘汰赛奖励请求 积分赛id#$match_id 审核id#$verify_id");
        Redirect::instance()->forward('/knockoutMatch/lists/19');
    }

    function verifyPrizeList(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_MATCH_VERIFY);
        $this->init_navigator();
        $match_id = $this->args[1];
        $match_type = $this->args[2];
        $abstract_id = $match_id*10000+$match_type;
        $this->output_data['list'] = VerifyUtil::instance()->read_verify($abstract_id,VerifyUtil::TYPE_MATCH_PRIZE);
        $this->output_data['action'] = "/knockoutMatch/verifyPrize";
        foreach($this->output_data['list'] as &$item){
            $match_type = $item['abstract_id']%10000;
            $match_id = ($item['abstract_id']/10000)>>0;
            $item['create_time'] = date('Y-m-d H:i:s',$item['create_time']);
            $item['source_admin_name'] = Admin_M::instance()->read($item['source_admin_id'])['account'];
            $item['type_name'] = $this->config->gms['verify_types'][$item['type']];
            $item['prizes_content'] = Encoder::instance()->decode($item['json_content']);
            $item['match_type_name'] = $this->config->gms['match_types'][$match_type];
            $item['match_id'] = $match_id;

            foreach($item['prizes_content'] as &$prize){
                $prize_temp = array();
                foreach($prize['prizes'] as $p){
                    $prize_temp[]=  $p['prize_amount'].$this->config->gms['prize_types'][$p['prize_type']]['name'];
                }
                $prize['content'] = implode(',',$prize_temp);
            }
        }
        $this->render('match_prize_verify.html');
    }

    function verifyPrize(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_MATCH_VERIFY);
        $abstract_id = $this->input->post('abstract_id');
        $match_type = $abstract_id%10000;
        $match_id = ($abstract_id/10000)>>0;
        $key = Helper::instance()->get_match_prize_key($match_type,$match_id);
        $verify = $this->input->post('verify');
        $verify_id = $this->input->post('verify_id');
        $remark = $this->input->post('remark');

        if($verify==0){//不通过
            if(!VerifyUtil::instance()->unpass($verify_id,$remark))
                $this->set_error(Error::DATA_WRITE);
            SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_MATCH_VERIFY,"审核比赛奖励 比赛id#$match_id 审核id#$verify_id 为不通过");
        }else{
            $prize_data = $this->input->post('json_content');
            $gamedb =  $this->getGameDB();
            try{
                $gamedb->begin();
                $this->db->begin();
                //删除原有数据
                if(!MatchPrize_M::instance()->del($match_id,$match_type))
                    throw new \Exception(Error::DATA_DELETE);

                $match_data_array = Encoder::instance()->decode($prize_data);
                $sqls = array();
                $sql = "INSERT INTO match_prize (match_id,match_type,rank,prize_type,prize_amount) VALUES ";
                foreach($match_data_array as $data){
                    if(strpos($data['rank'],'-') > -1){//批量写入
                        list($start,$end) = explode('-',$data['rank']);
                        for($i = $start;$i < $end+1; $i++){
                            foreach($data['prizes'] as $prize){
                                $tempsql = " ($match_id,$match_type,$i,{$prize['prize_type']},{$prize['prize_amount']})";
                                echo $tempsql.'<br/>';
                                $sqls[] = $tempsql;
                            }
                        }
                    }else{//单个写入
                        foreach($data['prizes'] as $prize){
                            $tempsql = " ($match_id,$match_type,{$data['rank']},{$prize['prize_type']},{$prize['prize_amount']})";
                            $sqls[] = $tempsql;
                        }
                    }
                }
                $sqls = $sql.implode(',',$sqls);

                if(!$gamedb->execute($sqls))
                    throw new \Exception(Error::DATA_WRITE);

                if(!VerifyUtil::instance()->pass($verify_id,$remark))
                    throw new \Exception(Error::DATA_WRITE);

                $gamedb->commit();
                $this->db->commit();
                //将结构 写入redis缓存
                MatchPrize_M::instance()->save_prize_struct($key,$prize_data);
                @file_get_contents($this->config->gms['notify_server_match_update_address']);
                SystemLog::instance()->save(ModuleDictionary::MODULE_GAME_MATCH_VERIFY,"审核比赛奖励 比赛id#$match_id 审核id#$verify_id 为通过");
            }catch (\Exception $e){
                $gamedb->rollback();
                $this->db->rollback();
                $this->set_error($e->getMessage());
            }
        }
        Redirect::instance()->forward('/knockoutMatch/lists/19');
    }


    function match_info(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_KNOCKOUT_MATCH_LIST);
        $match_id  = $this->args[0];
        $match_type =  $this->args[1];
        $match_prize_key = Helper::instance()->get_match_prize_key($match_type,$match_id);
        $match_prize = MatchPrize_M::instance()->list_prize_struct($match_prize_key);
        if($match_prize) {
            $match_prize = Encoder::instance()->decode($match_prize);
            foreach ($match_prize as &$prize) {
                foreach ($prize['prizes'] as &$p) {
                    $p['prize_type_name'] = $this->config->gms['prize_types'][$p['prize_type']]['name'];
                }
            }
        }
        $signup_price = KnockoutSignupPrice_M::instance()->read($match_id);
        $signup_price['price_type_name'] = $this->config->gms['prize_types'][$signup_price['price_type']]['name'];
        $data = array(
            'match_prize' => $match_prize,
            'signup_price' => $signup_price
        );
        $this->response($data);
    }
} 