<?php
    session_start();
    if(!isset($_SESSION['login'])){
        $message='请登录';
        $url='login.php';
        include 'message.php';
        exit;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
</head>
<style>
    h2{text-align: center;  padding: 10px;  box-sizing: border-box;}
    ul{margin-left: 20px;}
    li{width:50%;  height: 20px;  font-size: 20px;}
    div{width:20px;  height:1px;  float: right;}
</style>
<body>
    <h2>查看其他分类</h2>
    <?php
        include '../public/db.php';
        include '../libs/function.php';
        $obj=new tree();
        $obj->showOtherCategory($db,'positions');
        echo $obj->ol;
    ?>
</body>
</html>