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
    <title>查看留言</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/jquery-3.2.1.min.js"></script>
</head>
<style>
    .container{width: 100%;height: auto;margin: 20px auto 0;text-align: center;}
    h2{font-size: 22px;}
    button a{color:#fff;}
    button:hover a{color: #fff;text-decoration: none;}
    button{margin-top: 20px;font-size: 20px;}
</style>
<body>
    <div class="container">
        <h2>查看留言</h2>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>邮箱</th>
                <th>电话</th>
                <th>内容</th>
                <th>操作</th>
            </tr>
            <?php
                include "../public/db.php";
                $sql = "select * from request";
                $result = $db->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $result->fetch()){
            ?>
                <tr>
                    <td><?php echo $row["id"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["tel"];?></td>
                    <td><?php echo $row["text"];?></td>
                    <td>
                        <button class="btn btn-danger" attr="<?php echo $row["id"];?>">删除</button>
                    </td>
            </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <script>
        $("tbody").on("click",".btn-danger",function () {
            let id = $(this).attr("attr");
            let that = $(this);
            $.ajax({
                url:"delRequest.php",
                async:true,
                data:{id},
                success:function (e) {
                    if(e == "ok"){
                        that.parent().parent().remove();
                        alert("删除成功");
                    }
                }
            })
        })
    </script>
</body>
</html>