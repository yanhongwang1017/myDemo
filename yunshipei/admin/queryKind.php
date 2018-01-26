<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("content-type:text/html;charset=utf-8");
        $message = "请登录";
        $url = "login.php";
        include "message.php";
        exit();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看分类</title>
    <style>
        a{width: 50px;height: 20px;margin-right: 20px;margin-left: 20px;text-decoration: none;color: #0076d2;}
        ul,li{margin-right: 20px;margin-bottom: 20px;}
    </style>
</head>
<body>
    <?php
        include "../public/db.php";
        include "../libs/function.php";
        $obj = new tree();
        $obj->kind1(0,$db,'kind',0,"");
        echo $obj->ul;
    ?>
</body>
</html>