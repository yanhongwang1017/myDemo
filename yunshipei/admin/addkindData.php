<?php
    $pid = $_POST['pid'];
    $cname = $_POST['cname'];
    $kindimg = $_POST["kindimg"];
    $ishow = $_POST["ishow"];
    include "../public/db.php";
    $sql = "insert into kind (cname,pid,state,kindimg,ishow) VALUES ('{$cname}','{$pid}','0','{$kindimg}','{$ishow}')";
    echo $sql;
    if($db->exec($sql)){
        if($pid != 0){
            $sql = "update kind set state = 1 WHERE cid=".$pid;
            $db->exec($sql);
            echo "<script>alert('添加成功');location.href='addkind.php';</script>";
        }else{
            echo "<script>alert('添加成功');location.href='addkind.php';</script>";
        }
    }