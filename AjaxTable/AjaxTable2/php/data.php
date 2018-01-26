<?php
    include "db.php";
    $sql = 'select * from teacher';
    $result = $db->query($sql);
    $arr = array();
    while ($row = $result->fetch_assoc()){
        $arr[] = $row;
    }
    echo json_encode($arr);



