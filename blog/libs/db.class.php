<?php
    defined("COME") or exit("非法进入");
    class db{
        private $host;
        private $username;
        private $port;
        private $password;
        public $database;
        private $table;
        private $opt;
        public $db;

        function __construct($tablename = ""){
            global $configs;
            $this->host = $configs["database"]["host"];
            $this->username = $configs["database"]["username"];
            $this->port = $configs["database"]["port"];
            $this->password = $configs["database"]["password"];
            $this->database = $configs["database"]["database"];
            $this->table = $tablename;

            $this->opt["field"] = "*";
            $this->opt["where"] = $this->opt["order"] = $this->opt["limit"] = "";
            $this->connect();
        }

        //连接数据库
        function connect(){
            $this->db = new mysqli($this->host,$this->username,$this->password,$this->database,$this->port);
            if(mysqli_connect_error()){
                echo "数据库连接错误";
                exit();
            }
            $this->db ->query("set names utf8");
        }
        function selectTable($tablename){
            $this->table = $tablename;
        }
        //执行自己的sql语句
        function exec($sql){
            //echo $sql;exit();
            $result = $this->db->query($sql);
            //var_dump($result);exit();
            return $result;
        }
        //查询一条数据
        function find(){
            $sql = "select ".$this->opt["field"]." from ".$this->table." ".$this->opt["where"]." ".$this->opt["order"]." ".$this->opt["limit"];
            //echo $sql;exit();
            $result = $this->db->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }
        //查询多条数据
        function select($params=""){
            $sql = $params ? $params:"select ".$this->opt["field"]." from ".$this->table." ".$this->opt["where"]." ".$this->opt["order"]." ".$this->opt["limit"];
            //echo $sql;exit();
            $result = $this->db->query($sql);
            $arr = $result->fetch_all(MYSQL_ASSOC);
            return $arr;
        }
        function field($field){
            $this->opt["field"] = $field;
            return $this;
        }
        function where($where){
            $this->opt["where"] = "WHERE ".$where;
            return $this;
        }
        function order($order){
            $this->opt["order"] = "ORDER BY ".$order;
            return $this;
        }
        function limit($limit){
            $this->opt["order"] = "LIMIT ".$limit;
            return $this;
        }
        //插入数据
        function insert($arr){
            $attr = "";
            $val = "";
            foreach ($arr as $k => $v){
                $attr.=$k.",";
                $val.=$v.",";
            }
            $attr = substr($attr,0,-1);
            $val = substr($val,0,-1);
            $sql = "insert into ".$this->table." (".$attr.") values (".$val.")";
            $this->db->query($sql);
            return $this->db->affected_rows;
        }
        //更新数据
        function update($sql){
            $sql = "update ".$this->table." set ".$sql." ".$this->opt["where"];
            //echo $sql;exit();
            $this->db->query($sql);
            return $this->db->affected_rows;
        }
        //删除数据
        function delete(){
            $sql = "delete from ".$this->table." ".$this->opt["where"];
            $this->db->query($sql);
            return $this->db->affected_rows;
        }
        function close(){
            mysqli_close($this->db);
        }
    }
