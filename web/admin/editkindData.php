<?php
    $pid = $_POST['pid'];
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    include "../public/db.php";
    $sql = "update kind set pid={$pid},cname='{$cname}' WHERE cid=".$cid;
    if($db->exec($sql)){
        echo "<script>alert('修改成功');location.href='queryKind.php';</script>";
    }