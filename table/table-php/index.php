<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教师详情页</title>
    <style>
        table{
            width: 1000px;
            height:auto;
            border:1px solid #000000;
            border-collapse: collapse;
            margin:  auto;
            margin-top: 100px;
        }
        th,td{
            border:1px solid #000000;
            text-align: center;
        }
        .add{
            width: 998px;
            height:30px;
            display: block;
            text-align: center;
            line-height:30px;
            color: #00bc0c;
            border:1px solid #000000;
            border-top: none;
            margin:  auto;
            text-decoration: none;
            font-size: 30px;
        }
        td a{
            text-decoration: none;
            width: 20px;
            height: 10px;
            background: #e9e9e9;
            border:1px solid #606060;
            color: #000000;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>编号</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>性别</th>
            <th>课程</th>
            <th>操作</th>
        </tr>
        <?php
            header("content:text/html;charset=utf-8");
            $db = new mysqli("localhost","yhw","123456","wuiw1703");
            $db -> query("set names utf8");
            $sql = "select * from teacher";
            $result = $db->query($sql);
            while ($row = $result -> fetch_assoc()){
        ?>
                <tr>
                    <td><?php echo $row["id"]?></td>
                    <td><?php echo $row["name"]?></td>
                    <td><?php echo $row["age"]?></td>
                    <td><?php echo $row["sex"]?></td>
                    <td><?php echo $row["course"]?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['id']?>">删除</a>
                        <a href="edit.php?id=<?php echo $row['id']?>">编辑</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    <a href="insert.php" class="add">+</a>
</body>
</html>