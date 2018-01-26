<?php
    session_start();
    $message = '退出成功';
    $url = 'login.php';
    unset($_SESSION['login']);
    unset($_SESSION['username']);
    unset($_SESSION['uid']);
    include 'message.php';