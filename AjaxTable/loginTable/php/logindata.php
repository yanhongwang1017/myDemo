<?php
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['pass']);
    header("content-type:text/html;charset=utf-8");
    $db = new mysqli('localhost', 'yhw', '123456', 'wuiw1703');
    $db->query('set names utf8');
    $sql = "select * from user WHERE username = '{$username}' and password = '{$password}'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    if($result->num_rows > 0){
        $message = "登录成功";
        $url = "../table.php";
        $_SESSION['login'] = 'yes';
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $id;
        include 'message.php';
    }else{
        $message = "登录失败";
        $url = "login.php";
        include 'message.php';
    }