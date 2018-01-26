<?php
    header("content-type:text/html;charset=utf-8");
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $course = $_POST['course'];
    $db = new mysqli('localhost','yhw','123456','wuiw1703');
    $db -> query('set names utf8');
    $sql = "update teacher set name='$name',age='$age',sex='$sex',course='$course' WHERE id=".$id;
    $db -> query($sql);
    if($db->affected_rows>0){
        echo "<script>alert('修改成功');location.href = 'index.php';</script>";
    }