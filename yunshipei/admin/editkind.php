<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>编辑分类</title>
    <style>
        .container{width: 500px;height: 300px;position: absolute;left:0;right:0;top:0;  bottom:0;  margin:auto;}
        .container h3{font-size: 22px;text-align: center;font-weight: 300;}
        form{width: 300px;height: 200px;margin-left: 100px;}
    </style>
</head>
<body>
    <div class="container">
        <h3>修改分类</h3>
        <form action="editkindData.php" method="post">
            选择目录：<select name="pid">
                <option value="0">一级目录</option>
                <?php
                    $cid = $_GET["cid"];
                    include "../public/db.php";
                    include "../libs/function.php";
                    $obj = new tree();
                    $obj->kind("0",$db,'kind',0,"--",$cid);
                    echo $obj->str;
                    $sql = "select * from kind WHERE cid=".$cid;
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $result->fetch();
                ?>
            </select><br>
            目录名称：<input type="text" value="<?php echo $row['cname'];?>" name="cname"><br>
            <input type="hidden" value="<?php echo $cid; ?>" name="cid">
            <input type="submit" value="修改分类">
        </form>
    </div>
</body>
</html>