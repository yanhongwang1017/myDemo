<?php
    header("content-type:text/html;charset=utf-8");
    $username = $_POST["username"];
    $pass = md5($_POST['pass1']);
    $db = new mysqli('localhost', 'yhw', '123456', 'wuiw1703');
    $db->query('set names utf8');
    $sql = "insert into user (username,password) VALUES ('$username','$pass')";
    $result = $db->query($sql);
    if($db->affected_rows > 0){
        $message = "注册成功";
        $url = "login.php";
        include 'message.php';
    }