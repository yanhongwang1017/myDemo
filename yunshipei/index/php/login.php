<?php
    session_start();
    $code = $_POST["code"];
    $code1 = $_SESSION["code"];
    if($code != $code1){
        echo "<script>alert('验证码输入错误，请重新输入');location.href = '../html/login.php';</script>";
    }
    $username = addslashes(htmlspecialchars($_POST["user"]));
    $password = $_POST['password'];
    if(!preg_match("/^[a-z0-9_-]{6,16}$/",$username)){
        echo "<script>alert('用户名不符合要求，请重新输入');location.href = '../html/login.php';</script>";
        exit();
    }
    if(!preg_match("/^[a-z0-9_-]{6,18}$/",$password)){
        echo "<script>alert('密码不符合要求，请重新输入');location.href = '../html/login.php';</script>";
        exit();
    }
    $password = md5($password);
    include "../../public/db.php";
    $sql = "select * from user WHERE uname = '{$username}' and upass = '{$password}'";
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    $uid = $row["uid"];
    if($result->rowCount() > 0){
        $_SESSION["username"] = $username;
        $_SESSION["uid"] = $uid;
        if(!isset($_SESSION["url"])){
            echo "<script>location.href = '../index.php';</script>";
        }else{
            $url = $_SESSION["url"];
            header("location:".$url);
        }
    }else{
        $message = "登录失败";
        $url = "../html/login.php";
        include '../../admin/message.php';
    }