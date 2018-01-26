<?php
    $id = $_GET['id'];
    $attr = $_GET['attr'];
    $newval = $_GET['newval'];
    include "db.php";
    $sql = "update teacher set $attr = '$newval' WHERE id=".$id;
    $db->query($sql);
    if($db->affected_rows > 0){
        echo "ok";
    }