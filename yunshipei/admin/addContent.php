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
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <script src="../static/js/upload.js"></script>
    <script src="../static/utf8-php/ueditor.config.js"></script>
    <script src="../static/utf8-php/ueditor.all.min.js"></script>
    <script src="../static/utf8-php/lang/zh-cn/zh-cn.js"></script>
    <title>添加内容</title>
    <style>
        .container{width: 100%;height: auto;position: absolute;left: 0;right: 0;margin-left: auto;margin-right: auto;top:2px;}
        .container h3{font-size: 22px;color: #1a1a1a;text-align: center;margin-bottom: 15px;}
        selector,input{margin-bottom: 5px;margin-top: 5px;}
        form{margin-left: 100px;}
        #container{width: 80%;margin-bottom: 10px;}
        input[type=file]{display: inline;}
        .other{width: 72px;}
    </style>
</head>
<body>
    <div class="container">
        <h3>添加内容</h3>
        <form action="addContentData.php" method="post">
            所属分类：<select name="cid">
                        <option value="0">一级分类</option>
                        <?php
                            include "../public/db.php";
                            include "../libs/function.php";
                            $obj = new tree();
                            $obj->kind(0,$db,"kind",0,"--");
                            echo $obj->str;
                        ?>
                     </select><br>
            内容标题:<input type="text" name="title"><br>
            内容：<script id="container" name="content" type="text/plain"></script>
            <!--上传照片-->
            <div class="parent">
                <input type="hidden" name="img">
                <input type="file" multiple>
            </div>
            作者：<input type="text" name="author"><br>
            <div class="form-group" style="margin-top: 10px">
                <label class="other" style="float: left;font-weight: 400;">其他分类：</label>
                <div class="col-sm-9" style="float: left;">
                    <?php
                        $sql="select * from positions";
                        $result=$db->query($sql);
                        $result->setFetchMode(PDO::FETCH_ASSOC);
                        while($row=$result->fetch()){
                    ?>
                        <input type="radio" name="posid" value="<?php echo $row['posid']?>"><?php echo $row['posname']?>
                    <?php
                        }
                    ?>
                </div>
            </div><br>
            <input type="submit" value="添加内容">
        </form>
    </div>
    <script>
        window.onload = function () {
            let parent = document.querySelector('.parent');
            let imgval = document.querySelector("input[type=hidden]");
            let selectBtn = document.querySelector("input[type=file]");
            let obj = new upload();
            obj.upBtnStyle = "width:70px;height:25px;background:#eee;border:1px solid #000;";
            obj.multiple = true;
            obj.createView({
                parent:parent,selectBtn:selectBtn
            })
            obj.up("addPhoto.php",function (e) {
                let str = e.join(";");
                imgval.value += str;
            })
            //实例化编辑器
            var ue = UE.getEditor('container');
        }
    </script>
</body>
</html>