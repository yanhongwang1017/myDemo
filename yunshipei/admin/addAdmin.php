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
    <title>添加用户</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/upload.js"></script>
    <style>
        .container{width:320px;height:450px;text-align: right;margin-right: 400px;}
        .form-inline{margin-top:30px;}
        .form-inline .form-group{margin-bottom: 20px;}
        input[type=file]{display: inherit;width: 179px;}
        .form-inline .parent{text-align: left;margin-left: 50px;}
    </style>
</head>
<body>
    <div class="container">
        <form class="form-inline" action="addData.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName2">user：</label>
                <input type="text" class="form-control" placeholder="Jane Doe" name="aname">
            </div><br>
            <div class="form-group">
                <label for="exampleInputEmail2">password：</label>
                <input type="password" class="form-control" name="apass">
            </div><br>
            <div class="form-group">
                <label for="exampleInputEmail2">昵称：</label>
                <input type="text" class="form-control" name="anicheng">
            </div><br>
            <div class="form-group parent">
                <label for="exampleInputEmail2">头像：</label>
                <input type="hidden" name="aphoto">
                <input type="file" >
            </div><br>
            <button type="submit" class="btn btn-default" style="outline: none;">提交</button>
        </form>
    </div>
    <script>
        window.onload = function () {
            let parent = document.querySelector('.parent');
            let selectBtn = document.querySelector('input[type=file]');
            let filval = document.querySelector("input[type=hidden]");
            let uploadObj = new upload();
            uploadObj.upBtnStyle = "width:85px;height:30px;border:1px solid #000;background:#ddd;line-height:30px;border-radius:6px;";
            uploadObj.createView({
                parent:parent,selectBtn:selectBtn
            })
            uploadObj.up("addPhoto.php",function (e) {
                let str = e.join(";");
                //str += ";";
                filval.value = str;
            })
        }
    </script>
</body>
</html>