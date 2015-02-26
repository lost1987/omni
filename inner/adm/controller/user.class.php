<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/1/13
     * Time: 下午2:03
     */
    namespace adm\controller;

    use adm\core\AdmAutoValidationController;
    use adm\libs\AdmError;
    use adm\libs\AdmUtil;
    use adm\model\RewardDeposit_M;
    use adm\model\RewardLevelUp_M;
    use adm\model\RewardLogin_M;
    use adm\model\RewardRecharge_M;
    use adm\model\User_M;
    use adm\model\UserChildren_M;
    use adm\model\UserDeposit_M;
    use adm\model\UserNewCoinsChange_M;
    use core\Encoder;
    use gms\libs\Error;
    use utils\Page;
    use utils\Tools;

    class User extends AdmAutoValidationController
    {


        function lists()
        {
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
            $list = User_M::instance()->set_condition($search_params)->lists($start,$pagecount);
            foreach ( $list as &$item ) {
                if ( $item['pid'] != 0 ) {
                    $tempUser = User_M::instance()->read( $item['pid'] );
                    $item['parent'] = '<a class="am-badge am-badge-primary am-radius">'.$tempUser['uid'] . '</a>&nbsp;<a class="am-badge am-badge-secondary am-radius">' . $tempUser['login_name'] . '</a>&nbsp;<a class="am-badge am-badge-success am-radius">' . $tempUser['nickname'].'</a>';
                } else {
                    $item['parent'] = '/';
                }

                $item['money'] = number_format($item['newcoins']/$this->config->adm['deposit_ratio'],2);
                $item['state'] = $item['state'] == 1 ? '禁止提现' : '正常';
            }

            //分页
            $num_rows = User_M::instance()->set_condition($search_params)->num_rows();
            $page_params = array(
                'total_rows'=>$num_rows, #(必须)
                'method'    =>'html', #(必须)
                'parameter' =>'/user/lists/?',  #(必须)
                'now_page'  =>$page,  #(必须)
                'list_rows' =>$pagecount, #(可选) 默认为15
                'use_tag_li' => true,
                'li_classname' =>'am-active'
            );

            $pagiation = new Page($page_params);
            if($pagiation->getTotalPage() > 1)
                $this->output_data['pagiation'] = $pagiation->show(1);

            $this->output_data['list'] = $list;
            $this->output_data['total'] = $num_rows;

            //输出
            $content = $this->tpl->render( 'user_list.html' , $this->output_data );
            $this->response($content);
        }


        function readReward(){
            $uid = $this->input->get('uid');
            $user = User_M::instance()->read($uid);

            $reward['recharge'] =  RewardRecharge_M::instance()->read($uid);
            $reward['deposit'] = RewardDeposit_M::instance()->read($uid);
            $reward['levelup'] = RewardLevelUp_M::instance()->read($uid);
            $reward['login'] =  RewardLogin_M::instance()->read($uid);

            if($reward['deposit']) {
                foreach ( $reward['deposit'] as $k => $v ) {
                    if ( strpos( $k , 'ratio' ) > - 1 ) {
                        $reward['deposit'][ $k ] = Encoder::instance()->decode( $v );
                    }
                }
            }else
                $this->response(null,AdmError::DATA_ERROR);

            if($reward['levelup']) {
                foreach ( $reward['levelup'] as $k => $v ) {
                    if ( strpos( $k , 'ratio' ) > - 1 ) {
                        $reward['levelup'][ $k ] = Encoder::instance()->decode( $v );
                    }
                }
            }else
                $this->response(null,AdmError::DATA_ERROR);

            if($reward['login']) {
                foreach ( $reward['login'] as $k => $v ) {
                    if ( strpos( $k , 'ratio' ) > - 1 ) {
                        $reward['login'][ $k ] = Encoder::instance()->decode( $v );
                    }
                }
            }else
                $this->response(null,AdmError::DATA_ERROR);

            $this->output_data['reward'] = $reward;
            $this->output_data['user'] = $user;

            $content = $this->tpl->render('reward_setting.html',$this->output_data);
            $this->response($content);
        }

        function updateReward(){
            $post = $this->input->post();
            $uid = $post['uid'];
            $recharge = array();
            $recharge['ratio1'] = $post['recharge_ratio1'];
            $recharge['ratio2'] = $post['recharge_ratio2'];
            $recharge['ratio3'] = $post['recharge_ratio3'];
            $recharge['ratio4'] = $post['recharge_ratio4'];

            $deposit = array();
            for($i=1 ; $i<5 ; $i++){
                $ratio = array();
                for($k = 0; $k < 4; $k++){
                    $ratio[] =  array('money'=>$post['deposit_money_ratio'.$k.$i],'newcoins'=>$post['deposit_coins_ratio'.$k.$i]);
                }
                $deposit['ratio'.$i] = Encoder::instance()->encode($ratio);
            }

            $levelup = array();
            for($i=1 ; $i<5 ; $i++){
                $ratio = array();
                for($k = 0; $k < 4; $k++){
                    $ratio[] =  array('lv'=>$post['levelup_ratio'.$k.$i],'newcoins'=>$post['levelup_coins_ratio'.$k.$i]);
                }
                $levelup['ratio'.$i] = Encoder::instance()->encode($ratio);
            }

            $login = array();
            for($i=1 ; $i<5 ; $i++){
                $ratio = array();
                for($k = 0; $k < 4; $k++){
                    $ratio[] =  array('days'=>$post['login_ratio'.$k.$i],'newcoins'=>$post['login_coins_ratio'.$k.$i]);
                }
                $login['ratio'.$i] = Encoder::instance()->encode($ratio);
            }

            try{
                $this->db->begin();

                if(!RewardRecharge_M::instance()->update($recharge,$uid))
                    throw new \Exception(AdmError::DATA_WRITE);

                if(!RewardDeposit_M::instance()->update($deposit,$uid))
                    throw new \Exception(AdmError::DATA_WRITE);

                if(!RewardLogin_M::instance()->update($login,$uid))
                    throw new \Exception(AdmError::DATA_WRITE);

                if(!RewardLevelUp_M::instance()->update($levelup,$uid))
                    throw new \Exception(AdmError::DATA_WRITE);

                $this->db->commit();
                $this->response();
            }catch (\Exception $e){
                $this->db->rollback();
                $this->response(null,$e->getMessage());
            }
        }

        /**
         * 提现申请
         */
        function depositList(){
            //初始化参数
            $page = intval($this->args[0]) <= 0 ? 1 : $this->args[0];
            $pagecount = 20;
            $start = ($page-1) *  $pagecount;

            //查询处理
            $search_params = $this->http_get_params();
            foreach($search_params as $k => $v){
                $this->output_data[$k] = $v;
            }

            //列表
            $list = UserDeposit_M::instance()->set_condition($search_params)->lists($start,$pagecount);
            foreach ( $list as &$item ) {
                 $user = User_M::instance()->read($item['uid']);
                 $item['nickname']=$user['nickname'];
                 $item['login_name'] = $user['login_name'];

                 $item['deposit_platform'] = $this->config->adm['depositPlatform'][$item['platform']];
                 $item['deposit_state'] = $this->config->adm['depositState'][$item['state']];
                 $item['create_time'] = date('Y-m-d H:i:s',$item['create_time']);
                 $item['done_time'] = empty($item['done_time']) ? '/' : date('Y-m-d H:i:s',$item['done_time']);

                 if($item['state'] == 0)
                     $item['importantClass'] = 'am-badge am-badge-primary am-round';
                 else if($item['state'] == 1)
                     $item['importantClass'] = 'am-badge am-badge-success am-round';
                 else
                     $item['importantClass'] = 'am-badge am-badge-danger am-round';
            }

            //分页
            $num_rows = UserDeposit_M::instance()->set_condition($search_params)->num_rows();
            $page_params = array(
                'total_rows'=>$num_rows, #(必须)
                'method'    =>'html', #(必须)
                'parameter' =>'/user/deposit_list/?',  #(必须)
                'now_page'  =>$page,  #(必须)
                'list_rows' =>$pagecount, #(可选) 默认为15
                'use_tag_li' => true,
                'li_classname' =>'am-active'
            );

            $pagiation = new Page($page_params);
            if($pagiation->getTotalPage() > 1)
                $this->output_data['pagiation'] = $pagiation->show(1);

            $this->output_data['search_states'] = $this->config->adm['depositState'];
            $this->output_data['list'] = $list;
            $this->output_data['total'] = $num_rows;

            //输出
            $content = $this->tpl->render( 'user_deposit_list.html' , $this->output_data );
            $this->response($content);
        }

        /**
         * 汇款
         */
        function depositGive(){
            $id = $this->input->post('id');
            $real_cost = $this->input->post('real_cost');
            $handing_cost = $this->input->post('handing_cost');
            $deposit = UserDeposit_M::instance()->read($id);
            $money = $deposit['money'];
            $uid = $deposit['uid'];
            if($deposit['state'] != 0)
                $this->response(null,AdmError::FORBBIDEN_OPERATION);

            $time = time();
            $totalDeposit = UserDeposit_M::instance()->totalUserDeposit($uid);
            if(empty($totalDeposit))
                $totalDeposit = $money;
            else
                $totalDeposit += intval($money);
            if(intval($id) > 0){
                try{
                    $this->db->begin();
                    $fields = array(
                        'real_cost' => $real_cost,
                        'handing_cost' => $handing_cost,
                        'state' => 1,
                        'done_time'=>$time
                    );
                    if(!UserDeposit_M::instance()->update($fields,$id))
                        throw new \Exception(AdmError::DATA_WRITE);

                    $myDepositReward = RewardDeposit_M::instance()->read($uid);
                    if($myDepositReward['reach_max'] == 0){
                        $reach_max = 0;
                        $user = User_M::instance()->read($uid);
                        $pids = explode(',',$user['pids']);
                        for($i= 0; $i < count($pids) ; $i++){//按从下到上的关系依次取出 先取出的是最低级也就是相对该pid是1级下线
                            //读取$i+1级下线的奖励
                            $rewardDeposit = RewardDeposit_M::instance()->read($pids[$i]);
                            $ratio = Encoder::instance()->decode($rewardDeposit['ratio'.($i+1)]);
                            $newCoinsAdd = 0;
                            for($j = 0 ; $j < count($ratio) ; $j++){
                                if($totalDeposit >= $ratio[$j]['money'] && isset($ratio[$j+1])){
                                    if($totalDeposit >= $ratio[$j+1]['money']){//处于条件中
                                        continue;
                                    }else{//处于条件中
                                        $newCoinsAdd = $ratio[$j]['newcoins'];
                                        break 1;
                                    }
                                }else{//最后一个条件且满足条件
                                    if($totalDeposit >= $ratio[$j]['money']) {
                                        $newCoinsAdd = $ratio[ $j ]['newcoins'];
                                        $reach_max = 1;
                                    }
                                    break 1;
                                }
                            }

                            if($newCoinsAdd > 0){
                                $time = time();
                                $sql1 = "UPDATE adm_users SET newcoins = newcoins+$newCoinsAdd WHERE uid = {$pids[$i]}";
                                $sql2 = "INSERT INTO adm_user_newcoins_change (uid,coins_change,change_time,change_type,from_uid)
                                VALUES ({$pids[$i]},$newCoinsAdd,$time,0,$uid)";
                                $sql3 = "UPDATE adm_reward_deposit SET reach_max = $reach_max WHERE uid = $uid";
                                if(!$this->db->execute($sql1) || !$this->db->execute($sql2) || !$this->db->execute($sql3))
                                    throw new \Exception(Error::DATA_WRITE);
                            }
                            usleep(100);
                        }
                    }
                    $this->db->commit();
                }catch (\Exception $e){
                    $this->db->rollback();
                    Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'批准提现出错!',$e);
                    $this->response(null,AdmError::DATA_WRITE);
                }

                $response = array(
                    'real_cost' => $real_cost,
                    'handing_cost' => $handing_cost,
                    'depositState'=>$this->config->adm['depositState'][1],
                    'doneTime' => date('Y-m-d H:i:s',$time)
                );
                $this->response($response);
            }
            $this->response(null,AdmError::DATA_ERROR);
        }

        function depositUnGive(){
            $id = $this->input->post('id');
            $remark = $this->input->post('remark');
            $deposit = UserDeposit_M::instance()->read($id);
            if($deposit['state'] != 0)
                $this->response(null,AdmError::FORBBIDEN_OPERATION);

            $time = time();
            if(intval($id) > 0){
                $fields = array(
                    'state' => 2,
                    'done_time'=>$time,
                    'remark' => $remark
                );

                try{
                    $this->db->begin();

                    if(!UserDeposit_M::instance()->update($fields,$id))
                        throw new \Exception(AdmError::DATA_WRITE);

                    $coins_change = $deposit['money'] * $this->config->adm['deposit_ratio'];

                    $fields = array(
                      'uid'=>$deposit['uid'],
                      'coins_change' => $coins_change,
                      'change_time' => $time,
                      'change_type' => AdmUtil::NEWCOINS_CHANGE_DEPOSIT_FAILED
                    );

                    if(!UserNewCoinsChange_M::instance()->save($fields))
                        throw new \Exception(AdmError::DATA_WRITE);

                    $sql = "UPDATE adm_users SET newcoins = newcoins+$coins_change WHERE uid = ?";
                    if(!$this->db->execute($sql,array($deposit['uid'])))
                        throw new \Exception(AdmError::DATA_WRITE);

                    $this->db->commit();
                }catch (\Exception $e){
                    $this->db->rollback();
                    $this->response(null,$e->getMessage());
                }

                $response = array(
                    'depositState'=>$this->config->adm['depositState'][2],
                    'doneTime' => date('Y-m-d H:i:s',$time),
                    'remark' => $remark
                );
                $this->response($response);
            }
            $this->response(null,AdmError::DATA_ERROR);
        }

        function children(){
            //初始化参数
            $page = intval($this->args[0]) <= 0 ? 1 : $this->args[0];
            $pagecount = 20;
            $start = ($page-1) *  $pagecount;

            $uid = $this->input->get('uid');
            $user = User_M::instance()->read($uid);

            $list = UserChildren_M::instance()->lists($uid,$start,$pagecount);
            foreach($list as &$item){
                $pids = explode(',',$item['pids']);
                $leaf = array_search($uid,$pids);
                $item['leaf'] = $leaf+1;
            }
            $num_rows = UserChildren_M::instance()->num_rows($uid);
            $page_params = array(
                'total_rows'=>$num_rows, #(必须)
                'method'    =>'html', #(必须)
                'parameter' =>'/user/children/?',  #(必须)
                'now_page'  =>$page,  #(必须)
                'list_rows' =>$pagecount, #(可选) 默认为15
                'use_tag_li' => true,
                'li_classname' =>'am-active'
            );
            $pagiation = new Page($page_params);
            if($pagiation->getTotalPage() > 1)
                $this->output_data['pagiation'] = $pagiation->show(1);

            $this->output_data['user'] = $user;
            $this->output_data['list'] = $list;
            $this->output_data['total'] = $num_rows;
            $content = $this->tpl->render('children.html',$this->output_data);
            $this->response($content);
        }


        function newCoinsDetail(){
            //初始化参数
            $page = intval($this->args[0]) <= 0 ? 1 : $this->args[0];
            $pagecount = 12;
            $start = ($page-1) *  $pagecount;

            $uid = $this->input->get('uid');
            $user = User_M::instance()->read($uid);

            $list = UserNewCoinsChange_M::instance()->lists($uid,$start,$pagecount);
            foreach($list as &$item){
                $item['change_time'] = date('Y-m-d H:i:s',$item['change_time']);
                $item['action'] = $this->config->adm['newCoinsChangeAction'][$item['change_type']];
            }
            $num_rows = UserNewCoinsChange_M::instance()->num_rows($uid);
            $page_params = array(
                'total_rows'=>$num_rows, #(必须)
                'method'    =>'html', #(必须)
                'parameter' =>'/user/newCoinsDetail/?',  #(必须)
                'now_page'  =>$page,  #(必须)
                'list_rows' =>$pagecount, #(可选) 默认为15
                'use_tag_li' => true,
                'li_classname' =>'am-active'
            );
            $pagiation = new Page($page_params);
            if($pagiation->getTotalPage() > 1)
                $this->output_data['pagiation'] = $pagiation->show(1);

            $this->output_data['user'] = $user;
            $this->output_data['list'] = $list;
            $this->output_data['total'] = $num_rows;
            $content = $this->tpl->render('newcoins_detail.html',$this->output_data);
            $this->response($content);
        }

        function forbidden(){
            $uid = $this->input->post('uid');
            $fields = array(
                'state' => 1
            );
            if(!User_M::instance()->update($fields,$uid))
                $this->response(null,AdmError::DATA_WRITE);
            $this->response();
        }

        function unForbidden(){
            $uid = $this->input->post('uid');
            $fields = array(
                'state' => 0
            );
            if(!User_M::instance()->update($fields,$uid))
                $this->response(null,AdmError::DATA_WRITE);
            $this->response();
        }
    }