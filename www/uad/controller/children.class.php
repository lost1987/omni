<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/21
 * Time: 上午10:56
 */

namespace uad\controller;


use uad\core\UadAutoValidationController;
use uad\libs\UadError;
use uad\libs\UadUtil;
use uad\libs\UserRelationShip;
use uad\model\User_M;
use uad\model\UserChildren_M;
use uad\model\UserNewCoinsChange_M;
use utils\Date;
use utils\Page;

class Children extends UadAutoValidationController{


    function index(){

        //统计下线人数
        $uid = UadUtil::instance()->getUid();
        $childlist = array();
        UserRelationShip::instance($this->db)->getChildren($uid,$childlist);

        $todayStartTime = strtotime(date('Y-m-d').' 00:00:00');
        $todayEndTime = strtotime(date('Y-m-d').' 23:59:59');

        $weekTime = Date::instance()->weekTimeStampSE();
        $monthTime = Date::instance()->monthTimeStampSE();

        $todayChild = 0;
        $weekChild = 0;
        $monthChild = 0;
        $totalChild = 0;

        $todayIncome = 0;
        $weekIncome = 0;
        $monthIncome = 0;
        $totalIncome = 0;

        foreach($childlist as $c){
            foreach($c as $cc){
                $totalChild++;

                if($cc['relation_time'] > $todayStartTime && $cc['relation_time'] < $todayEndTime)
                    $todayChild++;

                if($cc['relation_time'] > $weekTime['start'] && $cc['relation_time'] < $weekTime['end'])
                    $weekChild++;

                if($cc['relation_time'] > $monthTime['start'] && $cc['relation_time'] < $monthTime['end'])
                    $monthChild++;

                usleep(100);
            }
        }

        //统计下线收益
        $condition = array(
            'search_change_time_start' => $monthTime['start'],
            'search_change_time_end' => $monthTime['end']
        );

        $myIncomeList = UserNewCoinsChange_M::instance()->set_condition($condition)->listsOfOthers($uid);
        foreach($myIncomeList as $nc){
            if($nc['coins_change'] > 0){
                $totalIncome += (int)$nc['coins_change'];
                if($nc['change_time'] > $todayStartTime && $nc['change_time'] < $todayEndTime)
                    $todayIncome += (int)$nc['coins_change'];
                if($nc['change_time'] > $weekTime['start'] && $nc['change_time'] < $weekTime['end'])
                    $weekIncome += (int)$nc['coins_change'];
                if($nc['change_time'] > $monthTime['start'] && $nc['change_time'] < $monthTime['end'])
                    $monthIncome += (int)$nc['coins_change'];
            }
        }

        $this->output_data['todayChild'] = $todayChild;
        $this->output_data['weekChild'] = $weekChild;
        $this->output_data['monthChild'] = $monthChild;
        $this->output_data['totalChild'] = $totalChild;
        $this->output_data['todayIncome'] = $todayIncome;
        $this->output_data['weekIncome'] = $weekIncome;
        $this->output_data['monthIncome'] = $monthIncome;
        $this->output_data['totalIncome'] = $totalIncome;

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
        $list = UserChildren_M::instance()->set_condition($search_params)->lists($uid,$start,$pagecount);
        foreach($list as &$item){
            //查询该下线给本人创造的提现奖励
            $item['incomeDeposit'] = UserNewCoinsChange_M::instance()->getNewcoinsFromUidAndType($uid,$item['uid'],UadUtil::NEWCOINS_CHANGE_CHILDREN_DEPOSIT);
            //成长收益
            $item['incomeLevelup'] = UserNewCoinsChange_M::instance()->getNewcoinsFromUidAndType($uid,$item['uid'],UadUtil::NEWCOINS_CHANGE_CHILDREN_LEVELUP);
            //签到收益
            $item['incomeSign'] = UserNewCoinsChange_M::instance()->getNewcoinsFromUidAndType($uid,$item['uid'],UadUtil::NEWCOINS_CHANGE_CHILDREN_SIGN);
            //充值返利
            $item['incomeRecharge'] = UserNewCoinsChange_M::instance()->getNewcoinsFromUidAndType($uid,$item['uid'],UadUtil::NEWCOINS_CHANGE_CHILDREN_RECHARGE);
            $item['incomeTotal'] = $item['incomeDeposit']+$item['incomeLevelup']+$item['incomeSign']+$item['incomeRecharge'];
        }

        //分页
        $num_rows = UserChildren_M::instance()->set_condition($search_params)->num_rows($uid);
        $page_params = array(
            'total_rows'=>$num_rows, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/children/index/?',  #(必须)
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

        $content = $this->tpl->render('children.html',$this->output_data);
        $this->response($content);
    }
}