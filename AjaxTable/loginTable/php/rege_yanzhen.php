<?php
    header("content-type:text/html;charset=utf-8");
    $userval = $_POST['uservalue'];
    $db = new mysqli('localhost', 'yhw', '123456', 'wuiw1703');
    $db->query('set names utf8');
    $sql = "select * from user WHERE username = '{$userval}'";
    $result = $db->query($sql);
    if($result->num_rows > 0){
        echo "ok";
    }