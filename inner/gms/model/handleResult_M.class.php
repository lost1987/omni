<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/10
 * Time: 上午10:45
 */

namespace gms\model;


use core\AdminModel;
use gms\libs\AdminUtil;

class HandleResult_M extends AdminModel{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 更新状态
     * @param $result
     * @param $ids  int|array
     */
    function updateResult($result,$ids){
            if(is_array($ids))
                $ids = implode(',',$ids);

            $session_data = AdminUtil::instance()->session_data();
            $handle_time =  date('Y-m-d H:i:s');

            $sql = "UPDATE index_handleresult SET result =  $result,assign_to={$session_data['id']},handle_time='$handle_time' WHERE id in ($ids)";
            return $this->_game_server->execute($sql);
    }


    function update($fields,$id){
        return $this->_game_server->update($fields,'index_handleresult',' WHERE id='.$id);
    }

    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        $sql = "SELECT a.id,a.handler_type,a.reporter_name,a.assign_to,a.handle_time,a.result,b.mobile,b.address,b.user_id,b.create_at,b.ip,b.product_id,c.category_id,c.product_type  FROM index_handleresult a
                      LEFT JOIN store_productorder b ON  a.id = b.handler_id LEFT JOIN store_products c ON b.product_id=c.id  {$this->_condition} ORDER BY b.create_at DESC  $limit ";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch_all();
    }

    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM index_handleresult a  LEFT JOIN store_productorder b ON a.id = b.handler_id
                      LEFT JOIN store_products c ON b.product_id = c.id {$this->_condition}";
        $this->_game_server->execute($sql);
        $this->_condition = '';
        return $this->_game_server->fetch()['num'];
    }


    function set_non_lottery_condition($params){
        $this->_condition = array();

        $this->_condition[] = " a.handler_type = 3 ";

        $this->_condition[] = " c.category_id <> 4";

        if(!empty($params['reporter_name']))
            $this->_condition[] = " a.reporter_name = '{$params['reporter_name']}' ";

        if( intval($params['result']) > -1 && $params['result'] !== null)
            $this->_condition[] = " a.result = {$params['result']} ";

        if(!empty($params['start_time']))
            $this->_condition[] = " b.create_at >= '{$params['start_time']}' ";

        if(!empty($params['end_time']))
            $this->_condition[] = " b.create_at <= '{$params['end_time']}' ";

        if(intval($params['category_id']) > 0)
            $this->_condition[] = " c.category_id = {$params['category_id']}";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }

    function set_condition($params){
        $this->_condition = array();

        if(!empty($params['reporter_name']))
            $this->_condition[] = " a.reporter_name = '{$params['reporter_name']}' ";

        if( intval($params['result']) > -1 && $params['result'] !== null)
            $this->_condition[] = " a.result = {$params['result']} ";

        if(!empty($params['start_time']))
            $this->_condition[] = " b.create_at >= '{$params['start_time']}' ";

        if(!empty($params['end_time']))
            $this->_condition[] = " b.create_at <= '{$params['end_time']}' ";

        if(intval($params['category_id']) > 0)
            $this->_condition[] = " c.category_id = {$params['category_id']}";

        if(intval($params['product_id']) > 0)
            $this->_condition[] = " b.product_id = {$params['product_id']}";

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }

} 