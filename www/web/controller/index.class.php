<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-15
 * Time: 下午6:08
 */

namespace web\controller;


use core\Controller;
use core\Cookie;
use web\libs\Helper;
use web\libs\UserUtil;
use web\model\ActivitiesModel;
use web\model\ProfileModel;
use web\model\SystemMessageModel;
use web\model\UserMessageModel;

/**
 * 首页
 * Class Index
 * @package web\controller
 */
class Index extends Controller{

    function index(){
        $errcode =  isset($_GET['code']) ? $this->input->get('code') : 0;
        $cookie = Cookie::instance();

        $output_data = array(
            'code' => $errcode,
            'csrf_token'=>$cookie->get_csrf_cookie()
        );

        $is_login = UserUtil::instance()->isLogin();
        $output_data['is_login'] = $is_login ? 1 : 0;
        $output_data['lottery_times'] = 0;
        if($is_login){
            $uid = Cookie::instance()->userdata('uid');
            $user = ProfileModel::instance()->read($uid);
            $output_data['coins'] = empty($user['coins']) ? 0 : $user['coins'];
            $output_data['nickname'] = $cookie->userdata('nickname');
            $output_data['coupon'] = empty($user['coupon']) ? 0 : $user['coupon'];
            $output_data['ticket'] = empty($user['ticket']) ? 0 : $user['ticket'];
            $output_data['diamond'] = empty($user['diamond']) ? 0 : $user['diamond'];
            $total = $cookie->userdata('total');
            $wins = $cookie->userdata('wins');
            $output_data['ratio'] = UserUtil::instance()->userRatio($wins,$total);
            //读取用户的抽奖次数
            $lottery = new Lottery();
            $output_data['lottery_times'] = $lottery->times();

            //读取用户未读的个人消息
            $unread_messages = UserMessageModel::instance()->num_rows_unread($uid);
            $output_data['unread_messages'] = $unread_messages;
        }

        //读取公告,活动
        $activity_list = ActivitiesModel::instance()->lists(0,5);
        foreach($activity_list as &$item) {
            $temp_date = $item['publish_time'];
            if (!empty($temp_date)) {
                $m = substr($temp_date, 4, 2);
                $d = substr($temp_date, 6, 2);

                $item['publish_time'] = $m . '-' . $d;
            }
        }

        $output_data['activity'] = $activity_list;

        //读取系统公告
        $sysmessage = SystemMessageModel::instance()->lists(0,5);
        foreach($sysmessage as &$item){
            $temp_date = $item['publish_time'];
            if (!empty($temp_date)) {
                $m = substr($temp_date, 4, 2);
                $d = substr($temp_date, 6, 2);

                $item['publish_time'] = $m . '-' . $d;
            }
        }
        $output_data['sysmessage'] = $sysmessage;

        $output_data['navigator'] = Helper::getControllerName(__NAMESPACE__,__CLASS__);
        $this->tpl->display('index.html',$output_data);
    }

} 