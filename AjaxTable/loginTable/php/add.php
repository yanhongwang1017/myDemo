<?php
    session_start();
    $uid = $_SESSION['uid'];
    header("content-type:text/html;charset=utf-8");
    $db = new mysqli('localhost', 'yhw', '123456', 'wuiw1703');
    $db->query('set names utf8');
    $sql = "insert into teacher (name,sex,age,course,uid) VALUES ('','','','',$uid)";
    $db->query($sql);
    if($db->affected_rows > 0){
        echo $db->insert_id;
    }