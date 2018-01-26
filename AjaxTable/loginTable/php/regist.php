<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/regist.js"></script>
    <style>
        .container{
            margin: 50px auto 0;
        }
        .container h3{
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
        }
        .form-group{position:relative;}
        .error_box{
            width: 180px;height:34px;
            position: absolute;
            right:120px;top:0;color:red;
            line-height: 34px;text-align: center;
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>注册页面</h3>
    <form class="form-horizontal" action="registdata.php" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="用户名">
            </div>
            <div class="error_box"></div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="pass1" placeholder="密码">
            </div>
            <div class="error_box"></div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">确认输入密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="pass2" placeholder="密码">
            </div>
            <div class="error_box"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" disabled>注册</button>
                已经有有用户名，点击<a href="../php/login.php">这里</a>登录
            </div>
        </div>
    </form>
</div>
</body>
</html>