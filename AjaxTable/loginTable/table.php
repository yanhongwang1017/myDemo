<?php
    session_start();
    if(!isset($_SESSION["login"])){
        $message = "请登录";
        $url = "php/login.php";
        include 'php/message.php';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>可编辑表格</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/table.js"></script>
    <style>
        .container{
            margin: 30px auto 0;
        }
        caption{
            font-size: 30px;
            text-align: center;
        }
        table tbody tr{
            text-align: center;
        }
        table tbody tr th{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>欢迎<?php echo $_SESSION['username'];?>登陆表格编辑系统</h4>
        <a href="php/loginout">退出系统</a>
        <table class="table table-striped table-bordered table-hover">
            <caption>可编辑表格</caption>
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>课程</th>
                <th>操作</th>
            </tr>
        </table>
        <button type="button" class="btn btn-default btn-lg" style="outline: none">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
    </div>
</body>
</html>