<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-16
 * Time: 下午3:49
 */

namespace web\controller;


use core\Controller;
use utils\Page;
use utils\Tools;
use web\libs\Helper;
use web\model\ActivitiesModel;
use web\model\ArticlesModel;

/**
 * 最新活动/公告
 * Class Activity
 * @package web\controller
 */
class Activity extends Controller{


    function index(){
            $this->lists();
    }


    function lists(){
        $page = empty($this->args[0]) ? 1 : $this->args[0];
        $count = 3;
        $start = ($page - 1) * $count;

        $list = ActivitiesModel::instance()->lists($start,$count);
        $total = ActivitiesModel::instance()->num_rows();

        foreach($list as &$item){
            $temp_date = $item['publish_time'];
            if(!empty($temp_date)) {
                $y = substr($temp_date, 0, 4);
                $m = substr($temp_date, 4, 2);
                $d = substr($temp_date, 6, 2);
                $h = substr($temp_date, 8, 2);
                $i = substr($temp_date, 10, 2);

                $item['publish_time'] = $y . '/' . $m . '/' . $d . ' ' . $h . ':' . $i;
            }

            if(!empty($item['content'])) {
                $item['content'] = preg_replace('/&(.*)?;/','',$item['content']);
                $item['content'] =htmlspecialchars_decode(mb_substr( strip_tags( $item['content'] ) , 0 , 50 ));
            }
        }

        $this->output_data['list'] = $list;

        //处理分页
        $params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/activity/index/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active'
        );
        $pagiation = new Page($params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);
        $this->output_data['hdzq'] = 'active';

        $this->tpl->display('activity.html',$this->output_data);

    }


    function detail()
    {
        $id = intval($this->args[0]);
        $activity = ActivitiesModel::instance()->read($id);
        $temp_date = $activity['publish_time'];
        if (!empty($temp_date)) {
            $y = substr($temp_date, 0, 4);
            $m = substr($temp_date, 4, 2);
            $d = substr($temp_date, 6, 2);
            $h = substr($temp_date, 8, 2);
            $i = substr($temp_date, 10, 2);

            $activity['publish_time'] = $y . '/' . $m . '/' . $d . ' ' . $h . ':' . $i;
        }

        $this->output_data['right_bar_news'] = ArticlesModel::instance()->listsFlag('j',3,0,10);
        $this->output_data['item'] = $activity;
        $this->tpl->display('news_detail.html',$this->output_data);
    }


    function calendarActivity(){
        $time = $this->input->post('time');
        $date = strtotime(date('Ymd',$time));
        $activities = ActivitiesModel::instance()->readCalendarActivitiesByDate($date);
        $this->response($activities);
    }

} 