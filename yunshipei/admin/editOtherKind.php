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
    #pid{
        margin-top: 8px;
    }
    h2{
        text-align: center;
        padding: 10px;
        box-sizing: border-box;
    }
    .error{
        color:red;
    }
</style>
<body>
    <h2>编辑其他分类</h2>
    <form action="editOtherKindCon.php" method="post"  class="form-horizontal">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类标题</label>
            <div class="col-sm-10">
                <?php
                include '../public/db.php';
                $sql="select * from positions where posid=".$_GET['posid'];
                $result=$db->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                while ($row=$result->fetch()){
                    ?>
                    <input type="text" class="form-control" id="posname" value="<?php echo $row['posname']?>" name="posname">
                    <input type="hidden" name="posid" value="<?php echo $row['posid']?>">
                    <?php
                }
                ?>
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