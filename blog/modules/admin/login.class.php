<?php
    defined("COME") or exit("非法进入");
    class login extends main {
        function init(){
            $this->smarty->display("admin/login.html");
        }
        function check(){
            //1.验证码
            if (strtolower($_POST["captcha"]) !== $_SESSION["code"]){
                echo "<script>alert('验证码输入错误');location.href = 'index.php?m=admin&f=login'</script>";
                exit();
            }
            //2.手机验证码
            $phonecode = P("phonecode");
            if ($phonecode !== $_SESSION["phonecode"]){
                $message = "短信验证码输入有误";
                $url = "ndex.php?m=admin&f=login";
                $this->jump($message,$url);
                exit();
            }
            //3.验证用户名和密码
            $aname = P("username");
            $apass = md5(P("password"));
            $dbobj = new db("admin");
            $arr = $dbobj->where("aname='{$aname}' and apass='{$apass}'")->find();
            $level = $arr["level"];
            if(count($arr) > 0){
                $_SESSION["adminLogin"] = "yes";
                $_SESSION["aname"] = $aname;
                $_SESSION["level"] = $level;
                echo "<script>location.href='index.php?m=admin&f=index';</script>";
            }else{
                echo "<script>alert('用户名或密码错误');location.href='index.php?m=admin&f=login';</script>";
            }
        }

        //给手机发送短信验证码
        function sendCode(){
            include_once LIBS_PATH."/Ucpaas.class.php";
            //初始化必填
            $options['accountsid']='19fbb0c3a2f274bf53f1c887379efec2';
            $options['token']='eed6d49359cd9fb6f86c0154097daf0c';
            //初始化 $options必填
            $ucpass = new Ucpaas($options);
            //开发者账号信息查询默认为json或xml
            header("Content-Type:text/html;charset=utf-8");
            //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
            $appId = "c8ad891ec1d847e6b4c2dac669e56703";
            $to = $_POST["phonenum"];
            $templateId = "185164";
            $codes = "0123456789";
            $param = "";
            for ($i = 0; $i < 4; $i++){
                $param.=$codes[mt_rand(0,strlen($codes) - 1)];
            }
            $_SESSION["phonecode"] = $param;
            //echo $ucpass->templateSMS($appId,$to,$templateId,$param);
        }
        //实例化验证码
        function imagecode(){
            $obj = new code();
            $obj->url = "static/fonts/font.ttf";
            $obj->output();
        }
        function logout(){
            unset($_SESSION["aname"]);
            unset($_SESSION["adminLogin"]);
            unset($_SESSION["phonecode"]);
            $message = "退出成功";
            $url = "index.php?m=admin&f=login";
            $this->message($message,$url);
            exit();
        }
    }