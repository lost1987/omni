<?php
    /**
     * Created by PhpStorm.
     * User: shameless
     * Date: 15/1/16
     * Time: 上午10:31
     */

    namespace adm\controller;


    use adm\core\AdmAutoValidationController;
    use adm\libs\AdmError;
    use adm\model\RedPack_M;
    use utils\Page;
    use utils\Tools;

    class RedPack extends AdmAutoValidationController
    {

        function lists()
        {
            //初始化参数
            $page = intval( $this->args[0] ) <= 0 ? 1 : $this->args[0];
            $pagecount = 20;
            $start = ( $page - 1 ) * $pagecount;

            //查询处理
            $search_params = $this->http_get_params();
            foreach ( $search_params as $k => $v ) {
                $this->output_data[ $k ] = $v;
            }

            //列表
            $list = RedPack_M::instance()->set_condition( $search_params )->lists( $start , $pagecount );
            foreach ( $list as &$item ) {
                $item['state'] = $item['state'] == 0 ? '未发放' : '已发放';
            }

            //分页
            $num_rows = RedPack_M::instance()->set_condition( $search_params )->num_rows();
            $page_params = array(
                'total_rows'   => $num_rows , #(必须)
                'method'       => 'html' , #(必须)
                'parameter'    => '/redPack/lists/?' ,  #(必须)
                'now_page'     => $page ,  #(必须)
                'list_rows'    => $pagecount , #(可选) 默认为15
                'use_tag_li'   => true ,
                'li_classname' => 'am-active'
            );

            $pagiation = new Page( $page_params );
            if ( $pagiation->getTotalPage() > 1 )
                $this->output_data['pagiation'] = $pagiation->show( 1 );

            $this->output_data['search_states'] = array('-1'=>'全部','0'=>'未发放','1'=>'已发放');
            $this->output_data['list'] = $list;
            $this->output_data['total'] = $num_rows;

            //输出
            $content = $this->tpl->render( 'redpack_list.html' , $this->output_data );
            $this->response( $content );
        }

        function add()
        {
            $content = $this->tpl->render( 'redpack_add.html' );
            $this->response( $content );
        }

        function save()
        {
            $content = $this->input->post( 'content' );
            $cards = explode( "\n" , trim( $content ) );
            $sql = "INSERT INTO adm_redpack (cardno,cardpasswd,money) VALUES ";
            $vals = array();
            foreach ( $cards as $card ) {
                list( $cardno , $cardpasswd , $money ) = explode( ':' , $card );
                $vals[] = "('$cardno','$cardpasswd',$money)";
            }
            $sql .= implode( ',' , $vals );
            if ( !$this->db->execute( $sql ) )
                $this->response( null , AdmError::DATA_WRITE );
            $this->response();
        }

        function check()
        {
            $cardno = $this->input->get( 'cardno' );
            $sql = "SELECT * FROM adm_redpack WHERE cardno = ?";
            $this->db->execute( $sql , array( $cardno ) );
            $card = $this->db->fetch();
            if ( $card ) {
                if ( $card['state'] )
                    $this->response( 1 );
            }
            $this->response( 0 );
        }

    }