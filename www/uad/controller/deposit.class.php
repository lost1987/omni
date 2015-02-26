<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/20
 * Time: 上午10:50
 */

namespace uad\controller;


use uad\core\UadAutoValidationController;
use uad\libs\UadError;
use uad\libs\UadUtil;
use uad\model\Banks_M;
use uad\model\User_M;
use uad\model\UserAplipay_M;
use uad\model\UserBank_M;
use uad\model\UserDeposit_M;
use uad\model\UserNewCoinsChange_M;
use web\libs\UserUtil;

class Deposit extends UadAutoValidationController{

    function index(){
        $user = UadUtil::instance()->getUser();
        $uid = $user['uid'];
        unset($user);
        $list = UserDeposit_M::instance()->readByUid($uid);
        foreach($list as &$item){
            if(!empty($item['done_time']))
                $item['done_time'] = date('Y-m-d H:i:s',$item['done_time']);
            $item['state'] = $this->config->uad['depositState'][$item['state']];
        }
        $this->output_data['list'] =  $list;
        $content = $this->tpl->render('deposit_list.html',$this->output_data);
        $this->response($content);
    }


    function deposit(){
        $uid = UadUtil::instance()->getUid();
        $user = User_M::instance()->read($uid);
        $this->output_data['depositMoney'] = number_format($user['newcoins']/$this->config->common['deposit_ratio'],2);
        $this->output_data['money'] = $user['newcoins']/$this->config->common['deposit_ratio'];
        $this->output_data['uid'] = $uid;
        $this->output_data['banks'] = Banks_M::instance()->lists();
        $content = $this->tpl->render('deposit.html',$this->output_data);
        $this->response($content);
    }


    function doDeposit(){
        $money = $this->input->post('money');
        $purchasePasswd = $this->input->post('purchasePasswd');
        $type = $this->input->post('type');

        //先从cookie取uid 然后去数据库取最新的数据
        $user = UadUtil::instance()->getUser();
        $user = User_M::instance()->read($user['uid']);
        $uid = $user['uid'];
        $newcoins = $user['newcoins'];
        //验证该账户是否被封禁
        if($user['state'])
            $this->response(null,UadError::FORBIDDEN_USER_DEPOSIT);
        unset($user);

        if(empty($money) || empty($purchasePasswd) || strlen($purchasePasswd) != 32)
            $this->response(null,UadError::DATA_ERROR);

        //验证是否绑定该type
        if($type == 1)
            $binding = UserAplipay_M::instance()->read($uid);
        else if($type == 0)
            $binding = UserBank_M::instance()->read($uid);
        if(false == $binding)
            $this->response(null,UadError::UNBIND_SUCH_ACCOUNT);

        $covertMoney = ($newcoins/$this->config->common['deposit_ratio'])>>0;
        if($covertMoney < $money)
            $this->response(null,UadError::DEPOSIT_NEWCOINS_NOT_ENOUGH);

        $gamedb = $this->loadGameDB();
        $sql = "SELECT a.user_number,b.purchase_password FROM users a,gauth_purchaseprofile b WHERE b.user_id = ? and a.uid = b.user_id";
        $gamedb->execute($sql,array($uid));
        $gamePurchaseProfile = $gamedb->fetch();
        if(empty($gamePurchaseProfile['purchase_password']))
            $this->response(null,UadError::PURCHASE_PASSWD_UNSET);

        if(!UserUtil::instance()->is_purchase_password_valid($purchasePasswd,$gamePurchaseProfile['purchase_password'],$gamePurchaseProfile['user_number']))
            $this->response(null,UadError::PURCHASE_PASSWD_ERROR);

        unset($gamedb,$gamePurchaseProfile);

        try{
            $this->db->begin();

            $fields = array(
                'uid' => $uid,
                'money' => $money,
                'order_no' => UadUtil::instance()->createDepositOrderNo(),
                'platform' => $type,
                'state'=>0,
                'create_time'=>time(),
                'deposit_account'=>empty($binding['account']) ? $binding['card_no'] : $binding['account'],
                'deposit_name' => $binding['name'],
                'deposit_bank_name'=>empty($binding['bank_name']) ? '' : $binding['bank_name']
            );

            if(!UserDeposit_M::instance()->save($fields))
                throw new \Exception(UadError::DATA_WRITE);

            $remainNewCoins = ($newcoins - $money*$this->config->common['deposit_ratio'])>>0;
            $fields = array(
                'newcoins' => $remainNewCoins
            );
            if(!User_M::instance()->update($fields,$uid))
                throw new \Exception(UadError::DATA_WRITE);

            $fields = array(
                'uid' => $uid,
                'coins_change' => $money*$this->config->common['deposit_ratio']*-1,
                'change_time' => time(),
                'change_type' => UadUtil::NEWCOINS_CHANGE_DEPOSIT
            );
            if(!UserNewCoinsChange_M::instance()->save($fields))
                throw new \Exception(UadError::DATA_WRITE);

            $this->db->commit();
            $this->response( number_format( ($remainNewCoins/$this->config->common['deposit_ratio'])>>0  ,2 ) );
        }catch (\Exception $e){
            $this->db->rollback();
            $this->response(null,$e->getMessage());
        }

    }

    function checkBank(){
        $uid = $this->input->post('uid');
        $userBank = UserBank_M::instance()->read($uid);
        if(false == $userBank)
            $this->response();
        $this->response($userBank);
    }

    function checkAlipay(){
        $uid = $this->input->post('uid');
        $userAlipay = UserAplipay_M::instance()->read($uid);
        if(false == $userAlipay)
            $this->response();
        $this->response($userAlipay);
    }
}