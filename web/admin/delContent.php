<?php
    $sid = $_GET["sid"];
    include "../public/db.php";
    $sql = "delete from shows WHERE sid=".$sid;
    if($db->exec($sql)){
        echo "ok";
    }