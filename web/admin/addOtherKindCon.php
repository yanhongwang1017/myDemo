<?php
    include '../public/db.php';
    $posname=$_POST['posname'];
    $sql="insert into positions (posname) values ('{$posname}')";
    $result=$db->exec($sql);
    if($result){
        echo "<script>alert('添加成功');location.href='showOtherKind.php'</script>";
    }