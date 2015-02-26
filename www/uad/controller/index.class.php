<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/9
 * Time: 上午11:33
 */
namespace uad\controller;

use core\Cookie;
use core\DB;
use core\Redirect;
use uad\core\UadAutoValidationController;
use uad\libs\GameUser;
use uad\libs\Navigator;
use uad\libs\UadUtil;
use uad\libs\UserRelationShip;
use uad\model\User_M;
use uad\model\UserDeposit_M;
use uad\model\UserNewCoinsChange_M;
use utils\Page;
use utils\Tools;

class Index extends UadAutoValidationController{

    function index(){
        $uid = UadUtil::instance()->getUid();
        $total['deposit'] = UserDeposit_M::instance()->readDepositTotal($uid);
        $user = User_M::instance()->read($uid);
        $total['newcoins'] = $user['newcoins'];
        $children = array();
        UserRelationShip::instance($this->db)->getChildren($uid,$children);
        $totalChildren = 0;
        foreach($children as $child){
            $totalChildren += count($child);
        }
        $total['children'] = $totalChildren;
        $total['cny'] = number_format($total['newcoins']/$this->config->common['deposit_ratio'],2);

        //提现记录
        $depositList = UserDeposit_M::instance()->set_condition(array('search_state'=>1))->lists(0,15);
        foreach($depositList as &$item){
            $tempUser = User_M::instance()->read($item['uid']);
            $item['nickname'] = $tempUser['nickname'];
        }

        //读取常见问题
        $gmsDB = new DB();
        $gmsDB -> init_db_from_config('gms');
        $sql = "SELECT id,title FROM gms_articles WHERE category_id = 3";
        $gmsDB->execute($sql);
        $this->output_data['articles'] = $gmsDB->fetch_all();
        unset($gmsDB);

        $this->output_data['navigator'] = Navigator::instance()->htmlString();
        $this->output_data['total'] = $total;
        $this->output_data['user'] = $user;
        $this->output_data['depositList']  = $depositList;

        //初始化参数
        $page = intval($this->args[0]) <= 0 ? 1 : $this->args[0];
        $pagecount = 12;
        $start = ($page-1) *  $pagecount;

        //查询处理
        $search_params = $this->http_get_params();
        foreach($search_params as $k => $v){
            $this->output_data[$k] = $v;
        }

        //列表
        $list = UserNewCoinsChange_M::instance()->set_condition($search_params)->lists($uid,$start,$pagecount);
        foreach($list as &$item){
            $item['change_time'] = date('Y-m-d H:i:s',$item['change_time']);
            $item['action'] = $this->config->uad['newCoinsChangeAction'][$item['change_type']];
        }

        //分页
        $num_rows = UserNewCoinsChange_M::instance()->set_condition($search_params)->num_rows($uid);
        $page_params = array(
            'total_rows'=>$num_rows, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/index/index/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$pagecount, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'am-active'
        );

        $pagiation = new Page($page_params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);

        $this->output_data['list'] = $list;
        $this->output_data['num_rows'] = $num_rows;

        if(Tools::is_ajax_req()){
            $content = $this->tpl->render('index_lite.html',$this->output_data);
            $this->response($content);
        }else
            $this->tpl->display('index.html',$this->output_data);
    }
}