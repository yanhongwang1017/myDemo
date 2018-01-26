<?php
    class login extends main {
        //登陆页面
        function init(){
           $this->smarty->display("index/login.html");
        }
        //注册页面
        function showRegist(){
            $this->smarty->display("index/regist.html");
        }
        //登陆验证
        function loginCheck(){
            $sessionobj = new session();
            if (strtolower(P("code")) != $sessionobj->get("code")){
                $message = "验证码输入错误";
                $url = "index.php?m=index&f=login";
                $this->message($message,$url);
                exit();
            }
            $uname = P("username");
            $upass = md5(P("password"));
            $dbobj = new db("user");
            $arr = $dbobj->where("uname='{$uname}' and upass='{$upass}'")->find();

            $nearUrl = isset($_SESSION["nearUrl"])?$_SESSION["nearUrl"]:"index.php?m=index&f=index";

            if(count($arr) > 0){
                $_SESSION["indexLogin"] = "yes";
                $_SESSION["uname"] = $uname;
                $_SESSION["uid"] = $arr["uid"];
                echo "<script>location.href='{$nearUrl}';</script>";
                exit();
            }else{
                $message = '用户名或密码错误';
                $url = 'index.php?m=index&f=login';
                $this->message($message,$url);
                exit();
            }
        }
        //注册验证用户名是否已经被使用
        function registCheck(){
            $registUname = sql(P("value"));
            $dbobj = new db("user");
            $result = $dbobj->where("uname='{$registUname}'")->find();
            if (count($result) > 0){
                echo "no";
            }
        }
        //注册用户
        function regist(){
            /*if (P("phoneCode") != $_SESSION["phonecode"]){
                $message = "手机验证码输入错误";
                $url = "index.php?m=index&f=login";
                $this->jump($message,$url);
                exit();
            }*/
            if (strtolower(P("code")) != $_SESSION["code"]){
                $message = "验证码输入错误";
                $url = "index.php?m=index&f=login";
                $this->message($message,$url);
                exit();
            }
            $uname = sql(P("username"));
            if(!preg_match("/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/",$uname)){
                $message = "用户名不符合规范";
                $url = "index.php?m=index&f=login";
                $this->message($message,$url);
            }
            $upass = md5(P("password"));
            $phoneNum = sql(P("phoneNum"));
            if (!preg_match("/^1[34578]\d{9}$/",$phoneNum)){
                $phoneNum = null;
            }
            $zhongzi = "柜麟绣遥逝愁肖昭芬逢窑捷圜盲闸宙辐披账狼幽绸蜂慎餐酬誓惟叉弥址帜芝砌唉仆涛臭翠盒劫慨炳阖寂椒倘拓畏喉巾颈垦拚兽蔽芦乾爽窃谭挣崩模褐传翅儒伞晃谬胚剖凑眠浊霜礁蔑抄闯洒碑蓉耶猜蹲壶唤澳锯郡玲绵纽梳掏吁锤鼠椅殷遮吵萍厌畜俱夸吕囊捧雌闽饶瞬郁哨凿朝俺浒茂肝勋盯籽耻菊滥稼戒奈帅鞭蚕镁询跌烤坛宅笛鄂蛮颤棍睁鼎岌降侍藩嚷匪岳糟缠迪泄卑氛堪萝盛碘缚悦澄甫攀";
            $nicheng = "";
            for ($i = 0; $i < 4; $i++){
                $nicheng.=$zhongzi[mt_rand(0,strlen($zhongzi) - 1)];
            }
            $arr = array(
                "uname"=>"'$uname'",
                "upass"=>"'$upass'",
                "nicheng"=>"'$nicheng'",
                "phone"=>"'$phoneNum'",
                "level"=>"1"
            );
            $dbobj = new db("user");
            $result = $dbobj->insert($arr);
            if ($result > 0){
                $message = "注册成功，请登录。";
                $url = "index.php?m=index&f=login";
                $this->message($message,$url);
            }else{
                $message = "注册失败,请从新注册。";
                $url = "index.php?m=index&f=login&a=showRegist";
                $this->message($message,$url);
            }
        }
        //验证码
        function imagecode(){
            $obj = new code();
            $obj->width = 136;
            $obj->height = 62;
            $obj->url = "static/fonts/font.ttf";
            $obj->output();
        }
        //退出
        function loginOut(){
            $sessionobj = new session();
            $sessionobj->clear();
            echo "<script>location.href='index.php?m=index&f=index';</script>";
        }

        function showPhoto(){
            $uname = P("uname");
            $db = new db("user");
            $result = $db->exec("select * from user WHERE uname='{$uname}'");
            $arr = $result->fetch_assoc();
            if(count($arr) > 0){
                //echo $arr["photo"];
                if ($arr["photo"] == ""){
                    echo "no";
                }else{
                    echo $arr["photo"];
                }
            }else{
                echo "no";
            }
        }

    }