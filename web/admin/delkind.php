<?php
    $cid = $_GET['cid'];
    include "../public/db.php";
    include "../libs/function.php";
    $obj = new tree();
    $obj->del($cid,$db,"kind");
