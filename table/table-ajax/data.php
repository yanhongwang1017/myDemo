<?php
    $db = new mysqli('localhost','yhw','123456','wuiw1703');
    $db -> query('set names utf8');
    $sql = "select * from teacher";
    $result = $db -> query($sql);
    $arr = array();
    while ($row=$result -> fetch_assoc()){
        $arr[] = $row;
    }
    echo json_encode($arr);
?>