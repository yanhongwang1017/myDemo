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
    <title>查看内容</title>
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
        <h2>内容查看</h2>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>标题</th>
                <th>内容</th>
                <th>图片地址</th>
                <th>作者</th>
                <th>日期</th>
                <th>cid</th>
                <th>posid</th>
                <th>操作</th>
            </tr>
            <?php
                include "../public/db.php";
                $sql = "select * from shows";
                $result = $db->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $result->fetch()){
            ?>
                <tr>
                    <td><?php echo $row["stitle"];?></td>
                    <td><?php echo $row["scon"];?></td>
                    <td>
                        <?php echo $row["img"];?><br>
                        <img src="<?php echo $row['img'];?>" alt="" width="200px">
                    </td>
                    <td><?php echo $row["author"];?></td>
                    <td><?php echo $row["date"];?></td>
                    <td><?php echo $row["cid"];?></td>
                    <td><?php echo $row["posid"];?></td>
                    <td>
                        <button class="btn btn-warning"><a href="editContent.php?sid=<?php echo $row['sid'];?>&cid=<?php echo $row['cid'];?>">编辑</a></button>
                        <button class="btn btn-danger" attr="<?php echo $row["sid"];?>">删除</button>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <script>
        $("tbody").on("click",".btn-danger",function () {
            let sid = $(this).attr("attr");
            let that = $(this);
            $.ajax({
                url:"delContent.php",
                async:true,
                data:{sid},
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