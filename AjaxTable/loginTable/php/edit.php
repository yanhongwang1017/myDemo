<?php
    $id = $_GET['id'];
    $attr = $_GET['attr'];
    $newval = $_GET['newval'];
    header("content-type:text/html;charset=utf-8");
    $db = new mysqli('localhost', 'yhw', '123456', 'wuiw1703');
    $db->query('set names utf8');
    $sql = "update teacher set $attr = '$newval' where id =".$id;
    $db -> query($sql);
    if($db->affected_rows > 0){
        echo "ok";
    }
