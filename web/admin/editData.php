<?php
    session_start();
    $aid = $_SESSION['aid'];
    include "../public/db.php";
    $aname = $_POST['aname'];
    $apass = $_POST['apass'];
    $anicheng = $_POST['anicheng'];
    $aphoto = $_POST['aphoto'];
    if($apass){
       $apass = md5($apass);
       $sql = "update admin set aname='{$aname}',apass='{$apass}',anicheng='{$anicheng}',aphoto='{$aphoto}' WHERE aid=".$aid;
    }else{
        $sql = "update admin set aname='{$aname}',anicheng='{$anicheng}',aphoto='{$aphoto}' WHERE aid=".$aid;
    }
    if($db -> exec($sql)){
        echo "<script>alert('插入成功');location.href='adminQuery.php';</script>";
    }