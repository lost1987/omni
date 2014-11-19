<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/19
 * Time: 下午2:45
 */

namespace gms\libs;
use core\Encoder;
use gms\model\Verify_M;

/**
 * gms审核辅助类
 * Class VerifyUtil
 * @package gms\libs
 */
class VerifyUtil {

    const  TYPE_DAILY_MATCH = 1;
    const  TYPE_KNOCKOUT_MATCH = 2;
    const  TYPE_MATCH_PRIZE = 3;

    private static  $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 审核通过
     * @param $verify_id
     * @param $remark
     * @return mixed
     * @throws \Exception
     */
    function pass($verify_id,$remark){
        $session_data = AdminUtil::instance()->session_data();
        $fields = array(
            'state' => 1,
            'op_time' => time(),
            'op_admin_id' => $session_data['id'],
            'remark' => $remark
        );
        return Verify_M::instance()->update($fields,$verify_id);
    }


    /**
     * 审核不通过
     * @param $verify_id
     * @param $remark
     * @return mixed
     * @throws \Exception
     */
    function unpass($verify_id,$remark){
        $session_data = AdminUtil::instance()->session_data();
        $fields = array(
            'state' => 2,
            'op_time' => time(),
            'op_admin_id' => $session_data['id'],
            'remark' => $remark
        );
        return Verify_M::instance()->update($fields,$verify_id);
    }

    /**
     * 读取未审核的该审核类型的列表
     * @param $abstract_id
     * @param $type
     * @return mixed
     */
    function read_verify($abstract_id,$type){
        $selected_server = AdminUtil::instance()->selected_server();
        $params = array(
            'state' => 0,
            'type' => $type,
            'server_id' => $selected_server['id'],
            'abstract_id' => $abstract_id
        );
        return Verify_M::instance()->set_condition($params)->lists();
    }

    /**
     * 增加一条审核数据
     * @param $abstract_id  抽象ID
     * @param $json_content 数据类容 json|array
     * @param $verify_type  审核类型
     */
    function add_verify($abstract_id,$json_content,$verify_type){
        if(is_array($json_content))
            $json_content = Encoder::instance()->encode($json_content);

        $session_data = AdminUtil::instance()->session_data();
        $fields = array(
            'json_content' => $json_content,
            'type' => $verify_type,
            'server_id' => $session_data['selected_server_id'],
            'create_time' => time(),
            'source_admin_id' => $session_data['id'],
            'abstract_id' => $abstract_id
        );

        return Verify_M::instance()->save($fields);
    }

    /**
     * 查询该审核类型有多少未审核的条目,用来判断是否有未审核的条目
     * @param $type
     * @param $abstract_id
     * @return mixed
     */
    function unverified_nums($type,$abstract_id){
        $selected_server = AdminUtil::instance()->selected_server();
        $match_verify_params = array(
            'state' => 0,
            'type' => $type,
            'server_id' => $selected_server['id'],
            'abstract_id' => $abstract_id
        );
        return Verify_M::instance()->set_condition($match_verify_params)->num_rows();
    }

}