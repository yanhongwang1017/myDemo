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
    <title>用户查询表</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/jquery-3.2.1.min.js"></script>
    <style>
        .container{margin:10px auto 0;}
        caption{text-align: center;font-size:20px;color:#0e0e0e;}
        .container table tr td img{width: 50px;height: 50px;}
    </style>
</head>
<body>
    <div class="container">
        <table class="table table-striped table-bordered">
            <caption>用户详细资料</caption>
            <tr>
                <th>编号</th>
                <th>照片</th>
                <th>姓名</th>
                <th>昵称</th>
                <th>操作</th>
            </tr>
            <?php
                include "../public/db.php";
                $sql = "select * from admin";
                $result = $db->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $result->fetch()){
            ?>
                <tr>
                    <td><?php echo $row['aid'];?></td>
                    <td><img src="<?php echo $row['aphoto']; ?>" alt=""></td>
                    <td><?php echo $row['aname'];?></td>
                    <td><?php echo $row['anicheng'];?></td>
                    <td>
                        <a href="delete.php?aid=<?php echo $row['aid'];?>">删除</a>
                        <a href="edit.php?aid=<?php echo $row['aid'];?>">编辑</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>