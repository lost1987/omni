<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 下午9:58
 */

namespace gms\model;


use core\Model;

class Module_M extends Model{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 读取模块列表
     * @param $visible  -1/1/0 是否用户可见 默认只取可见的
     * @return mixed
     */
    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        $sql  = "SELECT * FROM gms_core_module {$this->_condition}  ORDER BY orders $limit";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }

    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM gms_core_module {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
            if(count($params) == 0)return $this;
            $this->_condition = array();
            if(isset($params['visible']))
                $this->_condition[] = " visible={$params['visible']} ";

            if( (intval($params['pid']) === 0 && $params['pid'] !== null) || !empty($params['pid']))
                $this->_condition[] = " pid = {$params['pid']} ";

            if(count($this->_condition)>0) {
                     $this->_condition  =  implode(' AND ',$this->_condition);
                     $this->_condition = ' WHERE ' . $this->_condition;
            }else
                    $this->_condition = '';

            return $this;
    }

    /**
     * 取得一条模块信息
     * @param $module_id
     * @return mixed
     */
    function read($module_id){
        $sql = "SELECT * FROM gms_core_module WHERE id = ?";
        $this->db->execute($sql,array($module_id));
        return $this->db->fetch();
    }


    function root_lists(){
        $sql = "SELECT module_name,id,pid,visible,module_permission FROM gms_core_module WHERE pid = 0 ORDER BY orders";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

    function root_lists_adminid($admin_id){
        $sql = "SELECT a.module_name,a.id,a.pid,a.visible,a.module_permission,b.admin_permission,b.admin_id  FROM gms_core_module a LEFT JOIN gms_core_admin_module b ON a.id = b.module_id WHERE a.pid = 0 AND b.admin_id = ?";
        $this->db->execute($sql,array($admin_id));
        return $this->db->fetch_all();
    }


    /**
     * 如果不传入$pid 则查询所有非根模块
     * @param int $pid
     * @return mixed
     */
    function child_lists($pid = 0){
        $cond = ' pid ';
        if($pid == 0)
                $cond .= " <> 0";
        else
               $cond .= " = $pid";

        $sql = "SELECT module_name,id,pid,visible,module_permission  FROM gms_core_module WHERE $cond ORDER BY orders ";
        $this->db->execute($sql);
        return $this->db->fetch_all();
    }

    function save($fields){
         return $this->db->save($fields,'gms_core_module');
    }

    function update($fields,$id){
        return $this->db->update($fields,'gms_core_module',"WHERE id = $id");
    }

    function del($id){
        $sql = "DELETE FROM gms_core_module WHERE id = ?";
        return $this->db->execute($sql,array($id));
    }
} 