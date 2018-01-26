<?php
    header("content-type:text/html;charset=utf-8");
    $id = $_GET["id"];
    $db = new mysqli("localhost","yhw","123456","wuiw1703");
    $db -> query("set names utf8");
    $sql = "delete from teacher WHERE id=".$id;
    $db -> query($sql);
    if($db -> affected_rows > 0){
        include "message.php";
    }
?>