<?php
/*基类   主类    父类*/
    defined("COME") or exit("非法进入");
    class main{
        function __construct(){
            $smarty = new Smarty();
            $smarty->setCompileDir("./compile");
            $smarty->setTemplateDir("./template");
            $this->smarty = $smarty;
        }
        function jump($message,$url){
            echo "<script>alert('{$message}');location.href = '{$url}';</script>";
        }
        //跳转信息页面
        function message($message,$url){
            $this->smarty->assign("message",$message);
            $this->smarty->assign("url",$url);
            $this->smarty->display("admin/message.html");
        }
    }