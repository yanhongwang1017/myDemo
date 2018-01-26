<?php
    include "db.php";
    $sql = 'insert into teacher (name,sex,age,course) VALUES ("","","","")';
    $db->query($sql);
    if($db->affected_rows > 0){
        echo $db->insert_id;
    }