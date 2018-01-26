<?php
    session_start();
    if(!isset($_SESSION["username"])){
        $message = "请登陆";
        $url = "../html/login.php";
        include "../../admin/message.php";
        exit();
    }
    $name = addslashes(htmlspecialchars($_POST["name"]));
    $email = addslashes(htmlspecialchars($_POST["email"]));
    $tel = addslashes(htmlspecialchars($_POST["tel"]));
    $text = addslashes(htmlspecialchars($_POST["text"]));
    include "../../public/db.php";
    $sql = "insert into request (name,email,tel,text,file) VALUES ('{$name}','{$email}','{$tel}','{$text}','')";
    if($db->exec($sql)){
        echo $sql;
        echo "<script>alert('添加成功');location.href='../html/contact.php';</script>";
    }