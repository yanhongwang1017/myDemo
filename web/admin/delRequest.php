<?php
    $id = $_GET["id"];
    include "../public/db.php";
    $sql = "delete from request WHERE id=".$id;
    if($db->exec($sql)){
        echo "ok";
    }