<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["uid"]);
    unset($_SESSION["url"]);
    $message = "退出成功";
    $url = "../index.php";
    include "../../admin/message.php";