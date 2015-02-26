<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-8-5
 * Time: 下午2:57
 * 基于PDO:MYSQL的数据库操作类
 */

namespace core;


use utils\Tools;

class DB {

    private $_resouce = null;
    private $_host = null;
    private $_user = null;
    private $_passwd = null;
    private $_port = null;
    private $_stmt = null;
    private $_charset = null;
    private $_debug = false;

    /**
     * @return boolean
     */
    public function isDebug()
    {
        return $this->_debug;
    }

    /**
     * @param boolean $debug
     */
    public function setDebug($debug)
    {
        $this->_debug = $debug;
    }

    /**
     * @return null
     */
    public function getCharset()
    {
        return $this->_charset;
    }

    /**
     * @return null
     */
    public function getHost()
    {
        return $this->_host;
    }

    /**
     * @return null
     */
    public function getPasswd()
    {
        return $this->_passwd;
    }

    /**
     * @return null
     */
    public function getPort()
    {
        return $this->_port;
    }

    /**
     * @return null
     */
    public function getResouce()
    {
        return $this->_resouce;
    }

    /**
     * @return null
     */
    public function getStmt()
    {
        return $this->_stmt;
    }

    /**
     * @return null
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * 根据配置文件来初始化
     * @param $dbname string
     * @throws \Exception
     */
    public function init_db_from_config($dbname){
        $config = Configure::instance();
        $config->load('db');

        $this->_host = $config->db[$dbname]['host'];
        $this->_user = $config->db[$dbname]['user'];
        $this->_passwd = $config->db[$dbname]['password'];
        $this->_port = $config->db[$dbname]['port'];
        $this->_charset = $config->db[$dbname]['charset'];

        $this->_resouce = new \PDO("mysql:host=$this->_host;dbname=$dbname;charset=$this->_charset",$this->_user,$this->_passwd);
        $this->setOptions(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_WARNING);
        if(!$this->_resouce)
            throw new \Exception('can not connect host '.$this->_host);
    }

    /**
     * 根据server数据表来初始化
     * @param $server array
     * @throws \Exception
     */
    public function init_db($server){
        $this->_host = $server['server_ip'];
        $this->_user = $server['server_user'];
        $this->_passwd = $server['server_pass'];
        $this->_port = $server['server_port'];
        $this->_charset ='utf8';
        $dbname = $server['server_db'];

        $this->_resouce = new \PDO("mysql:host=$this->_host;dbname=$dbname;charset=$this->_charset",$this->_user,$this->_passwd);
        $this->setOptions(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_WARNING);
        if(!$this->_resouce)
            throw new \Exception('can not connect host '.$this->_host);
    }

    /**
     * 设置PDO选项
     * @param int $pdo_attr  PDO属性 PDO::
     * @param bool  $val
     * @return $this
     */
    function setOptions($pdo_attr,$val){
            $this->_resouce->setAttribute($pdo_attr,$val);
            return $this;
    }

    /**
     * @param $sql
     * @param array $params
     * @return $this
     */
    function execute($sql,$params=null){
            $this->_stmt = $this->_resouce->prepare($sql);
            return $this->_stmt->execute($params);
     }

    /**
     * 简单的执行sql
     * @param $sql
     * @return $this
     */
    function simple_exec($sql){
            $this->_resouce->exec($sql);
            return $this;
    }


    /**
     * @param int $style
     * @return mixed
     */
    function fetch($style = \PDO::FETCH_ASSOC){
            return $this->_stmt->fetch($style);
    }

    /**
     * @param int $style
     * @return mixed
     */
    function fetch_all($style = \PDO::FETCH_ASSOC){
            return $this->_stmt->fetchAll($style);
    }

    /**
     * @param array $fields
     * @param string $tableName
     * @return int | false
     */
    function save(Array $fields,$tableName){
          $sql = 'INSERT INTO '.$tableName.' (';
          $keys = array();
          $values = array();
          $symbols = array();
          foreach($fields as $k => $v){
                $keys[] = '`'.$k.'`';
                $values[] = $v;
                $symbols[] = '?';
          }
        if($this->_debug)
            error_log($sql.implode(',',$keys).') VALUES ('.implode(',',$values) . ')');
          $sql .= implode(',',$keys).') VALUES ('.implode(',',$symbols) . ')';
          return $this->execute($sql,$values);
    }

    /**
     * 修改字段
     * @param array $fields
     * @param $tableName
     * @param string $condition  正常的where条件语句即可  必须包含WHERE 关键字
     * @return $this
     */
    function update(Array $fields,$tableName,$condition = ''){
        $sql = 'UPDATE '.$tableName.' SET ';
        $keys = array();
        $values = array();
        foreach($fields as $k => $v){
            $keys[] = '`'.$k.'`'.'=?';
            if($this->_debug)
                $dkeys[] = '`'.$k.'`'.'='.$v;
            $values[] = $v;
        }
        if($this->_debug)
            error_log($sql.implode(',',$dkeys). ' '.$condition);
        $sql .= implode(',',$keys).' '.$condition;
        return $this->execute($sql,$values);
    }

    function inTransaction(){
        return $this->_resouce->inTransaction();
    }

    function insert_id(){
            return $this->_resouce->lastInsertId();
    }


    function begin(){
            $this->_resouce->beginTransaction();
            return $this;
    }


    function commit(){
            $this->_resouce->commit();
            return $this;
    }

    function rollback(){
            $this->_resouce->rollBack();
            return $this;
    }


    function close(){
            $this->_resouce = null;
    }

    function change($dbname){
            $this->close();
            $this->init_db($dbname);
    }

    function errorInfo(){
       return $this->_resouce->errorInfo();
    }

    function errorCode(){
        return $this->_resouce->errorCode();
    }

} 