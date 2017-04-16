<?php
header("Content-Type:text/html;charset=utf-8");
class db
{
    /*protected $host = "sqld.duapp.com:4050";
    protected $user = "863e0d415d20478a980a93204cf4b0cf";
    protected $pass = "b4b5f74e09554a00977710a0e4e72040";
    protected $database = "AxvYPwjUFmjvflfagOrZ";
    protected $table = "";
    protected $options;*/
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "";
    protected $database = "p2pProject";
    protected $table = "";
    protected $options;
    //属性，晚绑定  后添加值
    function __construct($table)
    {
        $this->table = $table;
        $this->config($table);
    }
    protected function config($table)
    {
        $this->db = new mysqli($this->host, $this->user, $this->pass, $this->database);
        $this->db->query("set names utf8");
        $this->options["field"] = "*";
        $this->options["where"] = $this->options["order"] = $this->options["limit"] = "";
    }

    public function field($field){
        $this->options["field"] = is_string($field)?$field:"*";
        return $this;
    }
    public function where($where){
        $this->options["where"] = is_string($where)?" WHERE ".$where:"";
        return $this;
    }
    public function order($order){
        $this->options["order"] = is_string($order)?" ORDER BY ".$order:"";
        return $this;
    }
    public function limit($limit){
        $this->options["limit"] = is_string($limit)?" LIMIT ".$limit:"";
    }


    //查询数据库
    public function select($sql = "")
    {
        $sql = !empty($sql) ? $sql : "select {$this->options['field']} from {$this->table} {$this->options['where']} {$this->options['order']} {$this->options['limit']}";
        $result = $this->db->query($sql);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        return $array;
    }

    //更新数据库
    public function update($sql=""){
        $sql=!empty($sql)?$sql:"update {$this->table} set {$this->options['field']} {$this->options['where']}";
        $result=$this->db->query($sql);
        return $this->db->affected_rows;
    }


    //插入数据
    public function insert($sql = "")
    {
        if (empty($sql)) {
            $arr = explode(",", $this->options['field']);
            $keys = "";
            $values = "";
            foreach ($arr as $v) {
                $arr1 = explode("=", $v);
                $keys .= $arr1[0] . ",";
                $values .= $arr1[1] . ",";
            }
            $keys = substr($keys, 0, -1);
            $values = substr($values, 0, -1);
            $sql = "insert into {$this->table} ($keys) VALUES ($values)";
        } else {
            $sql = $sql;
        }
         $this->db->query($sql);
        return $this->db->affected_rows;
    }
    public function del($sql = ""){
        $sql = !empty($sql)?$sql:"DELETE FROM {$this->table} {$this->options['where']} {$this->options['order']} {$this->options['limit']}";
        $this->db->query($sql);
        return  $this->db->affected_rows;
    }
}





