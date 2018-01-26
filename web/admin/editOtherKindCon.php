<?php
    $posid=$_POST['posid'];
    $posname=$_POST['posname'];
    include '../public/db.php';
    $sql="update positions set posname='{$posname}' where posid=".$posid;
    $result=$db->exec($sql);
    if($result){
        echo "<script>alert('修改成功');location.href='showOtherKind.php'</script>";
    }