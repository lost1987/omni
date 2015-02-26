<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/10/28
 * Time: 上午11:45
 */
namespace adm\model;

use core\Model;
use gms\libs\AdminUtil;

class Admin_M extends Model {

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * 通过账号查询管理员
     * @param $email
     * @return mixed
     */
   function get_admin_by_email($email){
         $sql = "SELECT * FROM adm_admin WHERE email=?";
         $this->db->execute($sql,array($email));
         return $this->db->fetch();
   }


    function read($id){
          $sql = "SELECT * FROM adm_admin WHERE id = ?";
          $this->db->execute($sql,array($id));
          return $this->db->fetch();
    }

    function save($fields){
        return $this->db->save($fields,'adm_admin');
    }

    function update($fields,$id){
        return $this->db->update($fields,'adm_admin',"WHERE id = $id");
    }

    function del($id){
        $sql = "DELETE FROM adm_admin WHERE id = ?";
        return $this->db->execute($sql,array($id));
    }


    /**
     * 取得管理员列表
     * @param null $start
     * @param null $count
     * @return mixed
     */
    function lists($start=null,$count=null){
            $limit = '';
            if($start !== null && $count !== null)
                    $limit = " LIMIT $start , $count";

            $sql = "SELECT * FROM adm_admin {$this->_condition}  $limit";
            $this->db->execute($sql);
            $this->_condition = '';
            return $this->db->fetch_all();
    }


    function num_rows(){
           $sql = "SELECT COUNT(*) as num FROM adm_admin {$this->_condition}";
            $this->db->execute($sql);
            $this->_condition = '';
            return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if(!empty($params['email']))
            $this->_condition[] = " email = '{$params['email']}' ";

        if(!AdminUtil::instance()->is_administrator())
        {
            $session_data = AdminUtil::instance()->session_data();
            $pid = $session_data['id'];
            $this->_condition[] = " pid = $pid ";
        }

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }

    /**
     * 根据父ID获得管理员列表
     */
    function get_admins_by_pid($pid){
            $sql = "SELECT * FROM adm_admin WHERE pid = ?";
            $this->db->execute($sql,array($pid));
            return $this->db->fetch_all();
    }

} 