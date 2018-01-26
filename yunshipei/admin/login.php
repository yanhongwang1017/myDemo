<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("content-type:text/html;charset=utf-8");
        echo "<script>alert('已登录');location.href='index.php';</script>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/jquery-3.2.1.min.js"></script>
    <script src="../static/js/jquery.validate.min.js"></script>
    <style>
        .container{width: 300px;height:300px;border:1px solid #1a1a1a;position: absolute;left:0;right:0;top:0;bottom:0;margin:auto;padding: 0px;}
        .title{width: 100%;height: 60px;background: #9f9f9f;color: #ffffff;font-size: 24px;text-align: center;line-height: 60px;}
        .form-horizontal{margin-top: 10px;margin-right: 10px;}
        .error{color: red;font-weight: 300;}
    </style>
</head>
<body>
    <div class="container">
        <div class="title">登录页面</div>
        <form class="form-horizontal" action="loginyanzheng.php" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">用户名</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" name="auser">
                    <label for="inputEmail3" id="inputEmail3-error" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">密码</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword3" name="apass">
                    <label for="inputPassword3" id="inputPassword3-error" class="error"></label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="on"> 记住密码
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                    <button type="submit" class="btn btn-default" style="outline: none;">登录</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        /*let check = document.querySelector("input[type=checkbox]");
        let name = $(":text").val();
        check.onclick = function () {
            if(check.checked){
                let pass = $(":password").val();
                setCookie(name,pass,1)
            }
        }
        function setCookie(name, value, timeout) {
            var d = new Date();
            d.setDate(d.getDate() + timeout);
            document.cookie = name + '=' + value + ';expires=' + d;
        }
        function getCookie(name) {
            var arr = document.cookie.split('; ');
            for ( var i = 0; i < arr.length; i++) {
                var arr2 = arr[i].split('=');
                if (arr2[0] == name) {
                    return arr2[1];
                    console.log(arr2[1]);
                }
            }
            return '';

        }
        console.log(document.cookie);*/

        $('.form-horizontal').validate({
            rules:{
                auser:{
                    required:true,
                    maxlength:5
                },
                apass:{
                    required:true,
                    maxlength:16
                }
            },
            messages:{
                auser:{
                    required:"用户名必填"
                },
                apass:{
                    required:"密码必填"
                }
            }
        })
    </script>
</body>
</html>