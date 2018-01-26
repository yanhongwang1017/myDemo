<?php
    $cid = $_POST["cid"];
    $title = isset($_POST["title"])?$_POST["title"]:"";
    $scon = isset($_POST["content"])?$_POST["content"]:"";
    $img = isset($_POST["img"])?$_POST["img"]:"";
    $posid = isset($_POST["posid"])?$_POST["posid"]:0;
    $date = date('y-m-d');
    $author = isset($_POST["author"])?$_POST["author"]:"";
    $aid = $_SESSION["aid"];
    include "../public/db.php";
    $sql = "insert into shows (aid,stitle,scon,img,author,date,cid,posid) VALUES ('{$aid}','{$title}','{$scon}','{$img}','{$author}','{$date}','{$cid}','{$posid}')";
    if($db->exec($sql)){
        echo "<script>alert('添加成功');location.href='addContent.php';</script>";
    }