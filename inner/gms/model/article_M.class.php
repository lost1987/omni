<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 15/2/2
 * Time: 下午4:52
 */

namespace gms\model;


use core\AdminModel;

class Article_M extends AdminModel{

    private static $_instance = null;

    private $_condition = '';

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new self;
        return self::$_instance;
    }

    function save($fields){
        $this->db->save($fields,'gms_articles');
        return $this->db->insert_id();
    }

    function update($fields,$id){
        return $this->db->update($fields,'gms_articles','WHERE id='.$id);
    }


    function read($id){
        $sql = "SELECT * FROM gms_articles WHERE id = ? ";
        $this->db->execute($sql,array($id));
        return $this->db->fetch();
    }

    function del($id){
        $sql = "DELETE FROM gms_articles WHERE id = ?";
        return $this->db->execute($sql,array($id));
    }

    function lists($start=null,$count=null){
        $limit = '';
        if($start !== null && $count !== null)
            $limit = " LIMIT $start , $count";

        $sql = "SELECT a.*,b.category_name FROM gms_articles  a LEFT JOIN gms_articles_category b ON a.category_id = b.id   {$this->_condition} ORDER BY publish_time DESC $limit ";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch_all();
    }


    function num_rows(){
        $sql = "SELECT COUNT(*) as num FROM gms_articles {$this->_condition}";
        $this->db->execute($sql);
        $this->_condition = '';
        return $this->db->fetch()['num'];
    }

    /**
     * @param array $cond
     */
    function set_condition($params){
        $this->_condition = array();

        if(count($this->_condition)>0) {
            $this->_condition  =  implode(' AND ',$this->_condition);
            $this->_condition = ' WHERE ' . $this->_condition;
        }else
            $this->_condition = '';

        return $this;
    }
} 