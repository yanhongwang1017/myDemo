<?php
    $id = $_GET['id'];
    header("content-type:text/html;charset=utf-8");
    $db = new mysqli('localhost', 'yhw', '123456', 'wuiw1703');
    $db->query('set names utf8');
    $sql = "delete from teacher WHERE id=".$id;
    $result = $db->query($sql);
    if($db->affected_rows > 0){
        echo "ok";
    }