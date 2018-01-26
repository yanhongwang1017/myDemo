<?php
    session_start();
    $str = "23456789abcdefghijklmnopqrstuvwxyz";
    $code="";
    for($i = 0; $i < 4; $i++){
        $code.= $str[mt_rand(0,strlen($str) - 1)];
    }
    $_SESSION["code"] = $code;
    //echo $code;
    echo <<<EOT
<span onclick="location.href='../php/code.php'">{$code}</span>
EOT;
