<?php
    $id = $_GET['id'];
    $name = $_GET['name'];
    $value = $_GET['value'];
    $db = new mysqli('localhost','yhw','123456','wuiw1703');
    $db -> query('set names utf8');
    $sql = "update teacher set $name='$value' WHERE id ='$id'";
    var_dump($sql);
    $db -> query($sql);