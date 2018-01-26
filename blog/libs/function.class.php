<?php
    defined("COME") or exit("非法进入");
    function P($params){
        return $_POST[$params];
    }
    function G($params){
        return $_GET[$params];
    }
    function sql($params){
        return addslashes(htmlspecialchars($params));
    }
    /*有&符号是传址，在一个数据上面不断的加数据**/
    function tree($pid=0,&$arr){
        $dbobj = new db();
        $i = 0;
        $sql = "select * from category WHERE pid=".$pid;
        $result = $dbobj->db->query($sql);
        while ($row = $result->fetch_assoc()){
            $arr[$i] = array(
                "id"=>$row["cid"],
                "text"=>$row["cname"]
            );
            tree($row["cid"],$arr[$i]["children"]);
            $i++;
        }
        return $arr;
    }
