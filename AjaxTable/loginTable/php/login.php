<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.2.1.js"></script>
    <style>
        .container{
            margin: 50px auto 0;
        }
        .container h3{
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>登录页面</h3>
        <form class="form-horizontal" action="logindata.php" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="用户名" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pass" id="inputPassword3" placeholder="密码" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> 记住密码
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">登录</button>
                    没有用户名，点击<a href="regist.php">这里</a>注册
                </div>
            </div>
        </form>
    </div>
</body>
</html>