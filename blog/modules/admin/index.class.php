<?php
    defined("COME") or exit("非法进入");
    class index extends main {
        //后台首页
        function init(){
            if (!isset($_SESSION["adminLogin"])){
                $message = "请登录";
                $url = "index.php?m=admin&f=login";
                $this->message($message,$url);
            }else{
                $aname = $_SESSION["aname"];
                $this->smarty->assign("admin",$aname);
                $this->smarty->display("admin/index.html");
            }
        }
        //首页欢迎页面
        function welcome(){
            $aname = $_SESSION["aname"];
            $this->smarty->assign("admin",$aname);
            $this->smarty->display("admin/welcome.html");
        }
        //文件上传
        function upload(){
            $uploadobj = new upload();
            $uploadobj->move();
        }
    }
