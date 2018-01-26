<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['auser']);
    unset($_SESSION['aid']);
    $message = "退出成功";
    $url = "login.php";
    include "message.php";