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
    <script src="../static/js/upload.js"></script>
    <title>添加分类</title>
    <style>
        .container{width: 500px;height: 300px;position: absolute;left:0;right:0;margin-left: auto;margin-right: auto;  top: 20px;}
        .container h3{font-size: 22px;text-align: center;font-weight: 300;}
        form{width: 300px;height: 200px;margin-left: 100px;}
    </style>
</head>
<body>
    <div class="container">
        <h3>添加分类</h3>
        <form action="addkindData.php" method="post">
            选择目录：<select name="pid">
                <option value="0">一级目录</option>
                <?php
                    include "../public/db.php";
                    include "../libs/function.php";
                    $obj = new tree();
                    $obj->kind("0",$db,'kind',0,"--","");
                    echo $obj->str;
                ?>
            </select><br>
            目录名称：<input type="text" name="cname"><br>
            是否显示在页面中:<input type="radio" name="ishow" value="1" checked>显示
            <input type="radio" name="ishow" value="0">不显示
            <div class="parent">
                <input type="hidden" name="kindimg">
                <input type="file">
            </div>
            <input type="submit" value="添加分类">
        </form>
    </div>
    <script>
        window.onload = function () {
            let parent = document.querySelector('.parent');
            let imgval = document.querySelector("input[type=hidden]");
            let selectBtn = document.querySelector("input[type=file]");
            let obj = new upload();
            obj.upBtnStyle = "width:70px;height:25px;background:#eee;border:1px solid #000;margin-bottom:20px;";
            obj.createView({
                parent:parent,selectBtn:selectBtn
            })
            obj.up("addPhoto.php",function (e) {
                let str = e.join(";");
                imgval.value = str;
            })
        }
    </script>
</body>
</html>