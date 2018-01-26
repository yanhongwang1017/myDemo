<?php
    session_start();
    $auser = addslashes(htmlspecialchars($_POST['auser']));
    $auser = preg_replace("/'/","\'",$_POST['auser']);
    $apass = md5($_POST['apass']);
    include "../public/db.php";
    $sql = "select * from admin WHERE aname = '{$auser}' AND apass = '{$apass}'";
    $result = $db->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    $aid = $row['aid'];
    if($result->rowCount() > 0){
        $_SESSION['login'] = 'yes';
        $_SESSION['auser'] = $auser;
        $_SESSION['aid'] = $aid;
        echo "<script>location.href = 'index.php';</script>";
    }else{
        $message = '登录失败';
        $url = 'login.php';
        include 'message.php';
    }