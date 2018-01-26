<?php
    $aid = $_GET['aid'];
    include "../public/db.php";
    $sql = "delete from admin WHERE aid=".$aid;
    if($db -> exec($sql)){
        echo "<script>alert('删除成功');location.href='adminQuery.php';</script>";
    }
