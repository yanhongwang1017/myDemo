<?php
    //echo "<pre>";
    //var_dump($_SERVER);
    //http  https
    $arrport = explode("/",$_SERVER["SERVER_PROTOCOL"]);
    $port = strtolower($arrport[0]);
    //网址  host
    $strs = $_SERVER["HTTP_HOST"];
    //目录
    $arr = explode("/",$_SERVER["REQUEST_URI"]);
    $str = "";
    for($i = 0; $i < count($arr); $i++){
        $str.=$arr[$i]."/";
    }
    $url = $port."://".$strs.$str;
    $url = substr($url,0,strlen($url)-1);
    //echo $url;