<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 下午3:50
 */

namespace web\controller;


use core\Configure;
use core\Controller;
use core\Cookie;
use core\Encoder;
use utils\Tools;
use web\libs\Helper;
use web\model\GameSummaryModel;
use web\model\ProfileModel;
use web\model\RankModel;
use web\model\UserModel;

/**
 * 封神榜
 * Class Rank
 * @package web\controller
 */
class Rank extends Controller{

    private $_rankModel = null;

    function __construct(){
        parent::__construct();
        $this->_rankModel = RankModel::instance();
    }

    function index(){
        $token = Cookie::instance()->get_csrf_cookie();

        $type = empty($this->args[0]) ? 'global' : $this->args[0];
        $key = empty($this->args[1]) ? 'coins' : $this->args[1];
        $data = $this->_rankModel->getOrderList($type,$key);
        $areas = Configure::instance()->web['areas'];

        $in_orders = false;//自己是否在前20名中 如果不是则要去取自己的排名放在最下面
        $my_user_number = Cookie::instance()->userdata('user_number');
        $order = 1;
        foreach($data as $user_number => &$d){
            if($user_number == $my_user_number) {
                $d['isme'] = 1;
                $in_orders = true;
            }
            else
                $d['isme'] = 0;
            $d['area'] = $areas[$d['area']];
            $d['order'] = $order;
            $order++;
        }

        $output_data = array(
            'orderlist' => array_values($data),
            'token' => $token,
            'rank_keys' => Configure::instance()->web['rank_keys'],
            'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__)
        );

        if(!$in_orders){
            //取自己的排名
            $myrank = $this->_rankModel->getUserRank($my_user_number,$key);
            $myrank['isme'] = 1;
            $myrank['area'] = $areas[$myrank['area']];
        }

        /**
         * 缓存中没有排名数据
         */
        if(false == $myrank['nickname']){
            $uid = Cookie::instance()->userdata('uid');
            $gamesummary = GameSummaryModel::instance()->read($uid);
            $user = UserModel::instance()->getUserByUid($uid);
            $profile = ProfileModel::instance()->read($uid);

            $myrank['nickname'] = $user['nickname'];
            $myrank['area'] = $areas[$profile['area']];
            $myrank['coins'] = $profile['coins'];
            if(false != $gamesummary) {
                foreach ($myrank as $k => $v) {
                    if (array_key_exists($k, $gamesummary)) {
                        $myrank[$k] = $gamesummary[$k];
                    }
                }
            }else{
                foreach($myrank as $k=>$v){
                    if(false == $myrank[$k])
                        $myrank[$k] = 0;
                }
            }
            $myrank['order'] = '未取得名次';
        }
        $output_data['orderlist'][$myrank['order']] = $myrank;

        $this->tpl->display('rank.html',$output_data);
    }


    /**
     * errorcode 1.参数错误 0.正常
     * @throws \Exception
     */
    function getData(){
            $this->csrf_token_validation(false);
            $type = $this->args[0];
            $key = $this->args[1];
            $response = array(
                'error_code' => 1,
                'data' => ''
            );

            if(!empty($type) && !empty($key)) {
                $data = $this->_rankModel->getOrderList($type,$key);
                $areas = Configure::instance()->web['areas'];
                $my_user_number = Cookie::instance()->userdata('user_number');

                $in_orders = false;//自己是否在前20名中 如果不是则要去取自己的排名放在最下面

                $order = 1;
                foreach($data as $user_number =>  &$d){
                    if($my_user_number == $user_number) {
                        $d['isme'] = 1;
                        $in_orders = true;
                    }
                    else
                        $d['isme'] = 0;
                    $d['area'] = $areas[$d['area']];
                    $d['order'] = $order;
                    $order++;
                }

                $response['error_code'] = 0;
                $response['data'] = array_values($data);
                if(!$in_orders){
                    //取自己的排名
                    $myrank = $this->_rankModel->getUserRank($my_user_number,$key);
                    $myrank['isme'] = 1;
                    $myrank['area'] = $areas[$myrank['area']];

                    /**
                     * 缓存中没有排名数据
                     */
                    if(false == $myrank['nickname']){
                            $uid = Cookie::instance()->userdata('uid');
                            $gamesummary = GameSummaryModel::instance()->read($uid);
                            $user = UserModel::instance()->getUserByUid($uid);
                            $profile = ProfileModel::instance()->read($uid);

                            $myrank['nickname'] = $user['nickname'];
                            $myrank['area'] = $areas[$profile['area']];
                            $myrank['coins'] = $profile['coins'];
                            if(false != $gamesummary) {
                                foreach ($myrank as $k => $v) {
                                    if (array_key_exists($k, $gamesummary)) {
                                        $myrank[$k] = $gamesummary[$k];
                                    }
                                }
                            }else{
                                    foreach($myrank as $k=>$v){
                                        if(false == $myrank[$k])
                                            $myrank[$k] = 0;
                                    }
                            }
                        $myrank['order'] = '未取得名次';
                    }
                    $response['data'][$myrank['order']] = $myrank;
                }
            }
            die(Encoder::instance()->encode($response));
    }
} 