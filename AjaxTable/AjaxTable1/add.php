<?php
    //sleep(3);
    $db = new mysqli('localhost','yhw','123456','wuiw1703');
    $db -> query('set names utf8');
    $sql = "insert into teacher (name,sex,age,course) VALUES ('','','','')";
    $db -> query($sql);
    if($db->affected_rows > 0){
        echo $db->insert_id;
    }