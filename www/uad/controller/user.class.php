<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/1/20
 * Time: 上午9:29
 */

namespace uad\controller;


use core\Cookie;
use uad\core\UadAutoValidationController;
use uad\libs\UadError;
use uad\libs\UadUtil;
use uad\model\RewardDeposit_M;
use uad\model\RewardLevelUp_M;
use uad\model\RewardLogin_M;
use uad\model\RewardRecharge_M;
use uad\model\UserAplipay_M;
use uad\model\UserBank_M;
use uad\model\UserNewCoinsChange_M;

class User extends UadAutoValidationController{

    function inviteFriends(){
        $user = UadUtil::instance()->getUser();
        $uid = $user['uid'];
        unset($user);

        $rechargeReward = RewardRecharge_M::instance()->read($uid);
        $levelUpReward = RewardLevelUp_M::instance()->read($uid);
        $loginReward = RewardLogin_M::instance()->read($uid);
        $depositReward = RewardDeposit_M::instance()->read($uid);
        $this->output_data['rechargeReward'] = $rechargeReward;
        $this->output_data['levelUpReward'] = $levelUpReward;
        $this->output_data['loginReward'] = $loginReward;
        $this->output_data['depositReward'] = $depositReward;

        $content = $this->tpl->render('invite_friends.html',$this->output_data);
        $this->response($content);
    }

    function bindBank(){
        $post = $this->input->post();
        $user = UadUtil::instance()->getUser();
        $post['uid']  = $user['uid'];
        $post['card_no'] = str_replace(' ','',$post['card_no']);
        unset($user);

        $userBank = UserBank_M::instance()->read($post['uid']);
        if(false == $userBank){
            if(!UserBank_M::instance()->save($post))
                $this->response(UadError::DATA_WRITE);
        }else{
            $uid = $post['uid'];
            unset($post['uid']);
            if(!UserBank_M::instance()->update($post,$uid))
                $this->response(UadError::DATA_WRITE);
        }
        $this->response($post['card_no']);
    }

    function bindAlipay(){
        $post = $this->input->post();
        $user = UadUtil::instance()->getUser();
        $post['uid']  = $user['uid'];
        unset($user);

        $userAlipay = UserAplipay_M::instance()->read($post['uid']);
        if(false == $userAlipay){
            if(!UserAplipay_M::instance()->save($post))
                $this->response(UadError::DATA_WRITE);
        }else{
            $uid = $post['uid'];
            unset($post['uid']);
            if(!UserAplipay_M::instance()->update($post,$uid))
                $this->response(UadError::DATA_WRITE);
        }
        $this->response($post['account']);
    }
}