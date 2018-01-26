<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改管理员信息</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/upload.js"></script>
    <style>
        .container{width:308px;height:450px;text-align: right;margin-right: 400px;}
        .form-inline{margin-top:30px;}
        .form-inline .form-group{margin-bottom: 20px;}
        .picture img{width: 50px;height: 50px;}
        input[type=file]{display: inherit;width: 179px;}
        .form-inline .parent{text-align: left;margin-left: 50px;  float: left;}
    </style>
</head>
<body>
    <?php
        $aid = $_GET['aid'];
        include "../public/db.php";
        $sql = "select * from admin WHERE aid=".$aid;
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
    ?>
    <div class="container">
        <form class="form-inline" action="editData.php" method="post">
            <div class="form-group">
                <label for="exampleInputName2">user：</label>
                <input type="text" class="form-control" placeholder="Jane Doe" name="aname" value="<?php echo $row['aname']; ?>">
            </div><br>
            <div class="form-group">
                <label for="exampleInputEmail2">password：</label>
                <input type="text" class="form-control" name="apass">
            </div><br>
            <div class="form-group">
                <label for="exampleInputEmail2">昵称：</label>
                <input type="text" class="form-control" name="anicheng" value="<?php echo $row['anicheng']; ?>">
            </div><br>

            <div class="form-group parent">
                <label for="exampleInputEmail2">头像：</label>
                <div class="picture"><img src="<?php echo $row['aphoto']; ?>" alt=""></div><br>
                <input type="file">
                <input type="hidden" name="aphoto">
            </div><br>
            <button type="submit" class="btn btn-default" style="outline: none;">提交</button>
        </form>
    </div>
    <script>
        window.onload = function () {
            let parent = document.querySelector('.parent');
            let selectBtn = document.querySelector('input[type=file]');
            let fileval = document.querySelector('input[type=hidden]');
            let uploadObj = new upload();
            uploadObj.upBtnStyle = "width:85px;height:30px;border:1px solid #000;background:#ddd;line-height:30px;border-radius:6px;";
            uploadObj.createView({
                parent:parent,selectBtn:selectBtn
            })
            uploadObj.up("addPhoto.php",function (e) {
                let str = e.join(";");
                fileval.value += str;
            })
        }
    </script>
</body>
</html>