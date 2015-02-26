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
use web\model\ArticlesModel;
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
            $this->output_data['fwzn']='active';
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            $this->tpl->display('service.html',$this->output_data);
    }

    function selfService(){
            $this->output_data['zzfw'] = 'active';
            $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
            if($this->output_data['is_login'])
                $this->output_data['userAuth'] = UserUtil::instance()->get_auth(Cookie::instance()->userdata('uid'));
            $this->tpl->display('service_selfService.html',$this->output_data);
    }

    function helpCenter(){
        $this->output_data['bzzx'] = 'active';
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_helpCenter.html',$this->output_data);
    }

    /**
     * 用户申述
     */
    function sus(){
        $this->output_data['zzfw']='active';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_account.html',$this->output_data);
    }

    /**
     * 意见反馈
     */
    function fb(){
        UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);
        $this->output_data['zzfw']='active';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_comments.html',$this->output_data);
    }

    /**
     * 举报作弊
     */
    function tf(){
        UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);
        $this->output_data['zzfw']='active';
        $this->output_data['token'] = Cookie::instance()->get_csrf_cookie();
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_report.html',$this->output_data);
    }


    /**
     * 充值记录
     */
    function rl(){
        UserUtil::instance()->checkLogin('/error/index/'.Error::ERROR_NO_LOGIN);
        $this->output_data['zzfw']='active';

        $uid = Cookie::instance()->userdata('uid');
        $page = empty($this->args[0]) ? 1 : $this->args[0];
        $count = 10;
        $start = ($page - 1) * $count;

        $s = $this->input->get('start_time');
        $e = $this->input->get('end_time');
        $start_time = strtotime($s);
        $end_time = strtotime($e);

        if(!empty($s) && !empty($e)){
            $this->output_data['start_time'] = date('Y-m-d H:i:s',$start_time);
            $this->output_data['end_time'] =  date('Y-m-d H:i:s',$end_time);
            $this->output_data['list'] = PaymentOrder::instance()->searchByDate($uid,$start_time,$end_time,$start,$count);
            $total = PaymentOrder::instance()->searchByDateNums($uid,$start_time,$end_time);
            //处理分页
            $params = array(
                'total_rows'=>$total, #(必须)
                'method'    =>'html', #(必须)
                'parameter' =>'/service/rl/?',  #(必须)
                'now_page'  =>$page,  #(必须)
                'list_rows' =>$count, #(可选) 默认为15
                'li_classname' =>'active',
                'use_tag_li' => true,
                'query_string'=>'start_time='.$start_time.'&end_time='.$end_time
            );

            $page = new Page($params);
            if($page->getTotalPage() > 1)
                $this->output_data['pagiation'] = $page->show(1);
        }
        $this->output_data['faq'] = ArticlesModel::instance()->lists(0,10,3);
        $this->tpl->display('service_selfService_history.html',$this->output_data);
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
            $this->output_data['func_title'] = '意见反馈';
            $this->output_data['result_content'] = '您的问题已经提交成功!我们会及时处理';
            $this->tpl->display('service_handle.html',$this->output_data);

        }catch (\Exception $e){
            $this->db->rollback();
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'用户反馈出错',$e);
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
        $time = date('Y-m-d H:i:s');
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
            $this->output_data['func_title'] = '作弊举报';
            $this->output_data['result_content'] = '您的问题已经提交成功!我们会及时处理';
            $this->tpl->display('service_handle.html',$this->output_data);

        }catch (\Exception $e){
            $this->db->rollback();
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'用户举报出错',$e);
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
                'login_name' => $login_name,
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
            $this->output_data['func_title'] = '账号申述';
            $this->output_data['result_content'] = '您的问题已经提交成功!我们会及时处理';
            $this->tpl->display('service_handle.html',$this->output_data);

        }catch (\Exception $e){
            $this->db->rollback();
            Tools::debug_log(__CLASS__,__FUNCTION__,__FILE__,'账号申述出错',$e);
            Redirect::instance()->forward('/error/index/'.$e->getMessage());
        }
    }

}