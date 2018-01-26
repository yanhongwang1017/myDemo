<?php
    $db = new mysqli('localhost','yhw','123456','wuiw1703');
    $db -> query('set names utf8');
    $sql = 'select * from teacher';
    $reault = $db -> query($sql);
    $arr = array();
    while ($row = $reault -> fetch_assoc()){
        $arr[] = $row;
    }
    echo json_encode($arr);