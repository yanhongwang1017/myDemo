<?php
    header("content-type:text/html;charset=utf-8");
    $name = $_GET["name"];
    $sex = $_GET["sex"];
    $age = $_GET["age"];
    $course = $_GET["course"];
    $db = new mysqli("localhost","yhw","123456","wuiw1703");
    $db -> query("set names utf8");
    $sql = "insert into teacher(name,sex,age,course) VALUES ('$name','$sex','$age','$course')";
    $db->query($sql);
    if($db->affected_rows > 0){
        echo "<script>alert('插入成功');location.href = 'index.php';</script>";
    }
?>