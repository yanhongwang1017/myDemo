<?php
    session_start();
    $code = $_POST["code"];
    $code1 = $_SESSION["code"];
    if($code != $code1){
        echo "<script>alert('验证码输入错误,请重新登陆');location.href = '../html/zhuce.php';</script>";
        exit();
    }
    $username = $_POST["user"];
    $pass = $_POST['password'];
    if(!preg_match("/^[a-z0-9_-]{6,16}$/",$username)){
        echo "<script>alert('用户名不符合要求，请重新输入');location.href = '../html/zhuce.php';</script>";
        exit();
    }
    if(!preg_match("/^[a-z0-9_-]{6,18}$/",$pass)){
        echo "<script>alert('密码不符合要求，请重新输入');location.href = '../html/zhuce.php';</script>";
        exit();
    }
    $pass = md5($pass);
    include "../../public/db.php";
    $sql = "insert into user (uname,upass) VALUES ('$username','$pass')";
    if($db->exec($sql)){
        $url = "../html/login.php";
        $message = "注册成功";
    }else{
        $url = "../html/zhuce.php";
        $message = "注册失败";
    }
    include "../../admin/message.php";