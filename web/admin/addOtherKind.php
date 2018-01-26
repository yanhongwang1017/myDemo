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
    h2{text-align: center;padding: 10px;box-sizing: border-box;}
    select{margin-left: 16px;}
</style>
<body>
    <h2>添加其他分类</h2>
    <form action="addOtherKindCon.php" method="post"  class="form-horizontal">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类标题</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="posname">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
</body>

</html>