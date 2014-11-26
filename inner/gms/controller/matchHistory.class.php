<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/25
 * Time: 上午10:16
 */

namespace gms\controller;


use core\AdminController;
use gms\libs\AdminUtil;
use gms\libs\ModuleDictionary;
use gms\model\MatchHistory_M;
use gms\model\UserMatchHistory_M;
use utils\Date;
use utils\Page;

/**
 * 比赛历史
 * Class MatchHistory
 * @package gms\controller
 */
class MatchHistory extends AdminController{

    function lists(){
        //检查权限
        AdminUtil::instance()->check_permission( ModuleDictionary::MODULE_GAME_MATCH_HISTORY_LIST );

        $page = empty( $this->args[1] ) ? 1 : $this->args[1];
        $count = 10;
        $start = ( $page - 1 ) * $count;

        //获取查询条件
        $search_params = $this->http_get_params();
        foreach ( $search_params as $k => $v ) {
            if ( !empty( $v ) || $v == '0' )
                $this->output_data[ 'search_' . $k ] = $v;
            else
                unset( $search_params[ $k ] );
        }
        $query_string = http_build_query( $search_params );

        $list = MatchHistory_M::instance()->set_condition( $search_params )->lists( $start , $count );
        foreach($list as &$item){
            $item['match_type_name'] = $this->config->gms['match_types'][$item['match_type']];
            $item['start_time'] = Date::instance()->format_YmdHi($item['start_time'],Date::FORMAT_YMDHI_STANDARD);
            $item['end_time'] = Date::instance()->format_YmdHi($item['end_time'],Date::FORMAT_YMDHI_STANDARD);
        }
        $total = MatchHistory_M::instance()->set_condition( $search_params )->num_rows();
        $this->init_navigator();

        //初始化分页
        $page_params = array(
            'total_rows'   => $total , #(必须)
            'method'       => 'html' , #(必须)
            'parameter'    => '/matchHistory/lists/' . ModuleDictionary::ROOT_MODULE_GAME . '/?' ,  #(必须)
            'now_page'     => $page ,  #(必须)
            'list_rows'    => $count , #(可选) 默认为15
            'use_tag_li'   => true ,
            'li_classname' => 'active' ,
            'query_string' => $query_string
        );

        $pagiation = new Page( $page_params );
        if ( $pagiation->getTotalPage() > 1 )
            $this->output_data['pagiation'] = $pagiation->show( 1 );

        $this->output_data['match_types'] = $this->config->gms['match_types'];
        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render( 'match_history_list.html' );
    }


    function  match_history_detail_list(){
        AdminUtil::instance()->check_permission(ModuleDictionary::MODULE_GAME_MATCH_HISTORY_LIST);

        $page = empty( $this->args[1] ) ? 1 : $this->args[1];
        $count = 14;
        $start = ( $page - 1 ) * $count;

        //获取查询条件
        $search_params = $this->http_get_params();
        foreach ( $search_params as $k => $v ) {
            if ( !empty( $v ) || $v == '0' )
                $this->output_data[ 'search_' . $k ] = $v;
            else
                unset( $search_params[ $k ] );
        }
        $query_string = http_build_query( $search_params );

        $list = UserMatchHistory_M::instance()->set_condition( $search_params )->lists( $start , $count );
        $total = UserMatchHistory_M::instance()->set_condition( $search_params )->num_rows();
        $this->init_navigator();

        //初始化分页
        $page_params = array(
            'total_rows'   => $total , #(必须)
            'method'       => 'html' , #(必须)
            'parameter'    => '/matchHistory/match_history_detail_list/' . ModuleDictionary::ROOT_MODULE_GAME . '/?' ,  #(必须)
            'now_page'     => $page ,  #(必须)
            'list_rows'    => $count , #(可选) 默认为15
            'use_tag_li'   => true ,
            'li_classname' => 'active' ,
            'query_string' => $query_string
        );

        $pagiation = new Page( $page_params );
        if ( $pagiation->getTotalPage() > 1 )
            $this->output_data['pagiation'] = $pagiation->show( 1 );

        $this->output_data['http_referer'] = '/matchHistory/lists/19';
        $this->output_data['list'] = $list;
        $this->output_data['total'] = $total;
        $this->render( 'user_match_history_list.html' );
    }

} 