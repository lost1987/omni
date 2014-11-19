<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 下午3:52
 */

namespace web\controller;


use core\Configure;
use core\Controller;
use core\Cookie;
use core\Encoder;
use core\Redirect;
use utils\Page;
use utils\Tools;
use utils\Upload;
use web\libs\Error;
use web\libs\Helper;
use web\libs\UserUtil;
use web\model\FeedBackModel;
use web\model\IndexHandleResultModel;
use web\model\PaymentOrder;
use web\model\TipOffModel;
use web\model\UserSuspendModel;

/**
 * 客户服务
 * Class Service
 * @package web\controller
 */
class Service extends Controller {

    function __construct(){
        parent::__construct();
        $this->handler_types =Configure::instance()->web['handler_type'];
    }


    function index(){
            $is_login = UserUtil::instance()->isLogin();
            $pay_failed = empty($_GET['pay_failed']) ? 0 : 1;

            $output = array(
                'is_login' => $is_login==true ? 1 : 0,
                'token' => Cookie::instance()->get_csrf_cookie(),
                'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__),
                'pay_failed' => $pay_failed
            );

            $this->tpl->display('service.html',$output);
    }


    /**
     * 充值记录查询
     */
    function rechargelist(){
          $this->csrf_token_validation(false);
          $response['error'] = 0;

           if(!UserUtil::instance()->isLogin()){
               $response['error'] = Error::ERROR_NO_LOGIN;
               die(Encoder::instance()->encode($response));
           }
           $uid = Cookie::instance()->userdata('uid');
          $page = empty($this->args[0]) ? 1 : $this->args[0];
          $count = 10;
          $start = ($page - 1) * $count;

          $start_time = strtotime($this->input->post('start_time'));
          $end_time = strtotime($this->input->post('end_time'));

         $response['data'] = PaymentOrder::instance()->searchByDate($uid,$start_time,$end_time,$start,$count);
         $total = PaymentOrder::instance()->searchByDateNums($uid,$start_time,$end_time);
         //处理分页
        $params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'ajax', #(必须)
            'parameter' =>'',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'ajax_func_name' => 'recharge_page',
            'a_classname' =>'active'
        );

        $page = new Page($params);
        if($page->getTotalPage() > 1)
            $response['pagiation'] = $page->show(1);

        die(Encoder::instance()->encode($response));
    }

    /**
     * 反馈问题
     */
    function feedback(){
        $this->csrf_token_validation();

        UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);
        $uid = Cookie::instance()->userdata('uid');

        $content = $this->input->post('content');
        $feedtype= $this->input->post('feedtype');
        $handler_type = Tools::array_toggle_fetch_value(__FUNCTION__,$this->handler_types);

        try{
            $this->db->begin();

            if(empty($content) || $feedtype=='' )
                throw new \Exception(Error::ERROR_STRING_FORMAT);

            $params = array(
                'handler_type' => $handler_type,
                'reporter_name' => Cookie::instance()->userdata('login_name'),
                'result' => 0,
                'note' => ''
            );

            if(!IndexHandleResultModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $handler_id = $this->db->insert_id();
            $params = array(
                'type' => $feedtype,
                'user_id'=>$uid,
                'ip'=>Tools::getip(),
                'content'=>$content,
                'create_at'=> date('Y-m-d H:i:s'),
                'handler_id' => $handler_id
            );

            if(!FeedBackModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $this->db->commit();
            $output = array('result'=>'你的反馈已提交成功',  'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__));
            $this->tpl->display('service_handle.html',$output);

        }catch (\Exception $e){
            $this->db->rollback();
            Redirect::instance()->forward('/error/index/'.$e->getMessage());
        }
    }


    /**
     * 举报
     */
    function tipoff(){
        $this->csrf_token_validation();

        UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);
        $uid = Cookie::instance()->userdata('uid');

        $file = $_FILES['file'];
        $name = $this->input->post('tipoff_name');
        $time = $this->input->post('tipoff_time');
        $content = $this->input->post('tipoff_content');

        if(empty($_FILES['file']))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_COMMON);

        if(strlen($name) < 3 || strlen($name) > 24)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

        if(empty($time) || empty($content))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

        //上传文件检测
        $config = Configure::instance()->web['upload'];
        $upload = Upload::instance();
        $upload ->set_upload_folder($config['image_folder'])
            ->set_max_size($config['image_max_size'])
            ->set_allowed_ext($config['image_allowed_ext']);
        $img = $upload ->upload($file);

        try{
            $this->db->begin();

            $handler_type = Tools::array_toggle_fetch_value(__FUNCTION__,$this->handler_types);

            $params = array(
                'handler_type' => $handler_type,
                'reporter_name' => Cookie::instance()->userdata('login_name'),
                'result' => 0,
                'note' => ''
            );

            if(!IndexHandleResultModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $handler_id = $this->db->insert_id();
            $params = array(
                'user_id' => $uid,
                'reported'=> $name,
                'notice_time'=>$time,
                'desc' => $content,
                'img' => $img['url'],
                'create_at' => date('Y-m-d H:i:s'),
                'ip' => Tools::getip(),
                'handler_id' => $handler_id
            );

            if(!TipOffModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $this->db->commit();
            $output = array('result'=>'您的举报已提交成功',  'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__));
            $this->tpl->display('service_handle.html',$output);

        }catch (\Exception $e){
            $this->db->rollback();
            Redirect::instance()->forward('/error/index/'.$e->getMessage());
        }

    }

    /**
     * 用户申诉
     */
    function usersuspend(){
        $this->csrf_token_validation();

        $login_name = $this->input->post('suspend_name');
        $mobile = $this->input->post('suspend_mobile');
        $desc = $this->input->post('suspend_content');
        $time = $this->input->post('suspend_time');

        if(strlen($login_name) < 4 || strlen($login_name) > 16)
            Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

        if(empty($time) || empty($desc))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

        if(!Tools::is_mobile($mobile))
            Redirect::instance()->forward('/error/index/'.Error::ERROR_STRING_FORMAT);

        try{
            $this->db->begin();

            $handler_type = Tools::array_toggle_fetch_value(__FUNCTION__,$this->handler_types);

            $params = array(
                'handler_type' => $handler_type,
                'reporter_name' => Cookie::instance()->userdata('login_name'),
                'result' => 0,
                'note' => ''
            );

            if(!IndexHandleResultModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $handler_id = $this->db->insert_id();
            $params = array(
                'login_name' => Cookie::instance()->userdata('login_name'),
                'suspend_time' => $time,
                'mobile' => $mobile,
                'desc' => $desc,
                'create_at' => date('Y-m-d H:i:s'),
                'ip' => Tools::getip(),
                'handler_id' => $handler_id
            );

            if(!UserSuspendModel::instance()->save($params))
                throw new \Exception(Error::ERROR_DATA_WRITE);

            $this->db->commit();
            $output = array('result'=>'您的申诉已提交成功',  'navigator' => Helper::getControllerName(__NAMESPACE__,__CLASS__));
            $this->tpl->display('service_handle.html',$output);

        }catch (\Exception $e){
            $this->db->rollback();
            Redirect::instance()->forward('/error/index/'.$e->getMessage());
        }
    }

}