<?php
    $posid=$_GET['posid'];
    include '../public/db.php';
    include '../libs/function.php';
    $obj=new tree();
    $obj->delOther($posid,$db,'positions');