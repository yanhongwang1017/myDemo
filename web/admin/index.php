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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统首页</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
    <style>
        .header{width: 1226px;height: 100px;border:1px solid #000;border-bottom:none;margin:0 auto;margin-top: 30px;position: relative;}
        .header h2{text-align: center;line-height: 60px;}
        .content{width: 1226px;height: 550px;}
        .left,.right{border:1px solid #0e0e0e;height: 550px;}
        .right{border-left: none;}
        iframe{width: 100%;height: 100%;}
        body{font-size:18px;}
        .content .row ul li a{color: #858585;text-decoration: none;font-size:16px;}
        .header a:first-of-type{width: 80px;height: 20px;display: block;position: absolute;right:20px;bottom:10px;}
        .header a:last-of-type{width: 80px;height: 20px;display: block;position: absolute;right:120px;bottom:10px;}
        .touxiang{width: 60px;height: 60px;border-radius: 50%;position: absolute;  top:0;bottom: 0;  margin-top:auto;margin-bottom: auto;  left:50px;}
        .touxiang img{width: 100%;height: 100%;border-radius: 50%;}
    </style>
</head>
<body>
    <?php
        $aid = $_SESSION['aid'];
        include "../public/db.php";
        $sql = "select * from admin WHERE aid=".$aid;
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $aphoto = $row['aphoto'];
    ?>
    <div class="container header">
        <h2>欢迎<?php echo $_SESSION['auser']; ?>来到CMS后台管理系统</h2>
        <a href="loginOut.php">安全退出</a>
        <a href="../index/index.php">去往首页</a>
        <div class="touxiang"><img src="<?php echo $aphoto; ?>" alt=""></div>
    </div>
    <div class="container content">
        <div class="row">
            <div class="left col-xs-4 col-md-3">
                <ul>
                    <li>管理员</li>
                    <ul>
                        <li><a href="adminQuery.php" target="right">查询管理员</a></li>
                        <li><a href="addAdmin.php" target="right">添加管理员</a></li>
                    </ul>
                </ul>
                <ul>
                    <li>分类管理</li>
                    <ul>
                        <li><a href="queryKind.php" target="right">查看分类</a></li>
                        <li><a href="addkind.php" target="right">添加分类</a></li>
                    </ul>
                </ul>
                <ul>
                    <li>内容管理</li>
                    <ul>
                        <li><a href="showContent.php" target="right">查看内容</a></li>
                        <li><a href="addContent.php" target="right">添加内容</a></li>
                    </ul>
                </ul>
                <ul>
                    <li>其它分类管理</li>
                    <ul>
                        <li><a href="showOtherKind.php" target="right">查看其它分类</a></li>
                        <li><a href="addOtherKind.php" target="right">添加其它分类</a></li>
                    </ul>
                </ul>
                <ul>
                    <li>用户管理</li>
                    <ul>
                        <li><a href="showUser.php" target="right">查看用户</a></li>
                    </ul>
                </ul>
                <ul>
                    <li>留言建议</li>
                    <ul>
                        <li><a href="showRequest.php" target="right">查看留言建议</a></li>
                        <li><a href="jaVaScript:void (0);" target="right">回复留言建议</a></li>
                    </ul>
                </ul>
            </div>
            <div class="right col-xs-8 col-md-9">
                <iframe src="" name="right" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</body>
</html>
