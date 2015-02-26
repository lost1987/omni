<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/3
 * Time: 上午10:01
 */

namespace web\controller;


use core\Controller;
use utils\Page;
use web\model\ArticlesModel;

class Articles extends Controller{

    function index(){
        $page = empty($this->args[0]) ? 1 : $this->args[0];
        $count = 8;
        $start = ($page - 1) * $count;

        $list = ArticlesModel::instance()->lists($start,$count);
        $total = ArticlesModel::instance()->num_rows();

        foreach($list as &$item){
                $item['publish_time'] = date('Y/m/d H:i:s',$item['publish_time']);
        }

        $this->output_data['list'] = $list;

        //处理分页
        $params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'html', #(必须)
            'parameter' =>'/articles/index/?',  #(必须)
            'now_page'  =>$page,  #(必须)
            'list_rows' =>$count, #(可选) 默认为15
            'use_tag_li' => true,
            'li_classname' =>'active'
        );
        $pagiation = new Page($params);
        if($pagiation->getTotalPage() > 1)
            $this->output_data['pagiation'] = $pagiation->show(1);
        $this->output_data['xwzx'] = 'active';

        $this->tpl->display('newsCenter.html',$this->output_data);
    }

    function detail(){
        $id = intval($this->args[0]);
        $article = ArticlesModel::instance()->read($id);
        $article['publish_time'] = date('Y/m/d H:i:s');
        $this->output_data['item'] = $article;
        $this->output_data['right_bar_news'] = ArticlesModel::instance()->listsFlag('j',0,10);
        $this->tpl->display('news_detail.html',$this->output_data);
    }
} 