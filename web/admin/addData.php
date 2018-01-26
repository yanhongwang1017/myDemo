<?php
    $aname = $_POST['aname'];
    $apass = md5($_POST['apass']);
    $anicheng = $_POST['anicheng'];
    $aphoto = $_POST['aphoto'];
    include "../public/db.php";
    $sql = "insert into admin (`aname`,`apass`,`anicheng`,`aphoto`) VALUES ('{$aname}','{$apass}','{$anicheng}','{$aphoto}')";
    if($db -> exec($sql)){
        echo "<script>alert('插入成功');location.href='addAdmin.php';</script>";
    }

