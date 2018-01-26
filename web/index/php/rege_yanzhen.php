<?php
    $username = $_POST["user"];
    include "../../public/db.php";
    $sql = "select * from user WHERE uname='{$username}'";
    $result = $db->query($sql);
    if($result->rowCount() > 0){
        echo "false";
    }else{
        echo "true";
    }