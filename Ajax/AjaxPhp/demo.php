<?php
    $db = new mysqli('localhost','yhw','123456','wuiw1703');
    $db -> query("set names utf8");
    $sql = "select * from student";
    $result = $db -> query($sql);
    $item = array();
    if($result){
        $row = mysql_fetch_row($result,student);
        echo json_decode(array('jsonObj' => $row));
    }
?>