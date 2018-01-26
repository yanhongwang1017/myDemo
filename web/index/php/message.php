<?php
    session_start();
    if(!isset($_SESSION["username"])){
        $message = "请登陆";
        $url = "../html/login.php";
        include "../../admin/message.php";
        exit();
    }
    include "../../public/db.php";
    //留言人
    $uname = $_SESSION['username'];
    //被留言人,管理员
    $sql = "select admin.aname,shows.* from admin,shows WHERE admin.aid=shows.aid";
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    $aname = $row['aname'];
    //给那篇文章留言
    $sid = $_POST["sid"];
    //留言标题
    $mtitle = addslashes(htmlspecialchars($_POST["mtitle"]));
    //留言内容
    $mcon = addslashes(htmlspecialchars($_POST["mcon"]));
    $sql = "insert into message (uname,aname,sid,mtitle,mcon) VALUES ('{$uname}','{$aname}','{$sid}','{$mtitle}','{$mcon}')";
    if($db->exec($sql)){
        echo "<script>alert('留言成功');location.href = '../html/content.php?sid=".$sid."';</script>";
    }

