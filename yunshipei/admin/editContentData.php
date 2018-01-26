<?php
    $cid = $_POST["cid"];
    $sid = $_GET["sid"];
    $title = isset($_POST["title"])?$_POST["title"]:"";
    $scon = isset($_POST["content"])?$_POST["content"]:"";
    $img = isset($_POST["img"])?$_POST["img"]:"";
    $posid = isset($_POST["posid"])?$_POST["posid"]:0;
    $date = date('y-m-d');
    $author = isset($_POST["author"])?$_POST["author"]:"";
    include "../public/db.php";
    $sql = "update shows set stitle='{$title}',scon='{$scon}',img='{$img}',author='{$author}',date='{$date}',cid='{$cid}',posid='{$posid}' WHERE sid=".$sid;
    if($db->exec($sql)){
        echo "<script>alert('修改成功');location.href='showContent.php';</script>";
    }