<?php
    class index extends main {
        //判断登录状态
        function checkSession(){
            $sessionobj = new session();
            $logins = $sessionobj->get("indexLogin");
            $this->smarty->assign("logins",$logins);
            $header = TPL_PATH."/index/header.html";

            if (isset($_SESSION["uid"])){
                $uid = $_SESSION["uid"];
                $db = new db("user");
                $result = $db->where("uid=".$uid)->find();
                $this->smarty->assign("photo",$result["photo"]);
            }

            $this->smarty->assign("header",$header);
            $_SESSION["nearUrl"] = SELF_URL;
        }
        function init(){
            $this->checkSession();
            $dbobj = new db();

            $data1 = $dbobj->select("select * from category");//分类信息
            $this->smarty->assign("data1",$data1);

            //作者和内容关联
            $data2 = $dbobj->select("select user.nicheng,user.photo,con.*,hits.hnum from user,con,hits WHERE user.uid=con.uid AND con.cid=hits.conid AND con.state=3");

            //查询分类
            $data3 = $dbobj->select("select cid,cname from category");
            foreach ($data2 as $k=>$v){
                $arr = explode(",",$v["catid"]);
                $str = "";
                foreach ($data3 as $value){
                    if (in_array($value["cid"],$arr)){
                        $str = $value["cname"];
                    }
                }
                $data2[$k]["cname"]=$str;
            }
            //添加留言数
            foreach ($data2 as $key=>$item){
                $arrs = $dbobj->select("select * from message WHERE conid=".$item["cid"]);
                $data2[$key]["messageNum"] = count($arrs);
            }

            $this->smarty->assign("data2",$data2);
            $this->smarty->display("index/index.html");
        }
        //消息页
        function messages(){
            $this->checkSession();
            $this->smarty->display("index/message.html");
        }
        //个人主页
        function homepage(){
            $this->checkSession();
            $uid = $_SESSION["uid"];
            $dbobj = new db("user");
            $data1 = $dbobj->where("uid=".$uid)->find();
            $this->smarty->assign("data1",$data1);

            $dbobj->selectTable("");
            $data2 = $dbobj->select("select user.nicheng,user.photo,guanzhu.* FROM user,guanzhu WHERE user.uid=guanzhu.uid2 AND guanzhu.uid1=".$uid);
            $this->smarty->assign("data2",$data2);

            $data3 = $dbobj->select("select user.nicheng,user.photo,guanzhu.uid1 from user,guanzhu WHERE user.uid=guanzhu.uid1 AND guanzhu.uid2=".$uid);
            $this->smarty->assign("data3",$data3);


            $guanzhuArr = $dbobj->select("select * from guanzhu WHERE uid1=".$uid);
            $this->smarty->assign("uidNum",count($guanzhuArr));

            $fans = $dbobj->select("select * from guanzhu WHERE uid2=".$uid);
            $this->smarty->assign("fansNum",count($fans));

            $articNum = $dbobj->select("select * from con WHERE uid=".$uid);
            $this->smarty->assign("articNum",count($articNum));

            $this->smarty->display("index/homepage.html");
        }
        //收藏页
        function collection(){
            $this->checkSession();
            $kind = G("kind");
            $this->smarty->assign("kind",$kind);

            $dbobj = new db();
            if ($kind == 1){
                //新上榜
                $data1 = $dbobj->select("select con.*,user.nicheng,user.photo,hits.hnum,category.cname from con,user,hits,category WHERE DATE_SUB(CURDATE(), INTERVAL 2 DAY) <= date(condate) AND con.uid=user.uid AND hits.conid=con.cid AND con.catid=category.cid");
                foreach ($data1 as $key=>$value){
                    $arr = $dbobj->select("select * from message WHERE conid=".$value["cid"]);
                    $data1[$key]["messageNum"] = count($arr);
                }
            }elseif ($kind == 2){
                //7日热门
                $data1 = $dbobj->select("select con.*,user.nicheng,user.photo,hits.hnum,category.cname from con,user,hits,category WHERE DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(condate) AND con.uid=user.uid AND hits.conid=con.cid AND con.catid=category.cid AND hits.hnum>10");
                foreach ($data1 as $key=>$value){
                    $arr = $dbobj->select("select * from message WHERE conid=".$value["cid"]);
                    $data1[$key]["messageNum"] = count($arr);
                }
            }elseif ($kind == 3){
                //30日热门
                $data1 = $dbobj->select("select con.*,user.nicheng,user.photo,hits.hnum,category.cname from con,user,hits,category WHERE DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(condate) AND con.uid=user.uid AND hits.conid=con.cid AND con.catid=category.cid AND hits.hnum>10");
                foreach ($data1 as $key=>$value){
                    $arr = $dbobj->select("select * from message WHERE conid=".$value["cid"]);
                    $data1[$key]["messageNum"] = count($arr);
                }
            }else{
                //收藏的文章页面
                $uid = $_SESSION["uid"];
                $data1 = $dbobj->select("select shoucang.*,con.*,user.nicheng,user.photo,hits.hnum,category.cname from shoucang,con,user,hits,category WHERE shoucang.conid=con.cid AND user.uid=con.uid AND hits.conid=con.cid AND con.catid=category.cid AND shoucang.uid=".$uid);
                foreach ($data1 as $key=>$value){
                    $arr = $dbobj->select("select * from message WHERE conid=".$value["cid"]);
                    $data1[$key]["messageNum"] = count($arr);
                }
            }
            $this->smarty->assign("data1",$data1);
            $this->smarty->display("index/collection.html");
        }
        //内容页
        function content(){
            $this->checkSession();
            $cid = G("cid");
            $dbobj = new db();

            $data1 = $dbobj->exec("select user.nicheng,user.photo,con.* from user,con WHERE user.uid=con.uid AND con.cid=".$cid);
            $data1 = $data1->fetch_assoc();
            $uid2 = $data1["uid"];
            $this->smarty->assign("nicheng",$data1["nicheng"]);

            $this->smarty->assign("uid2",$uid2);//被关注者的uid,作者
            $this->smarty->assign("data1",$data1);

            $data2 = $dbobj->exec("select * from hits WHERE conid=".$cid);//阅读量
            $data2 = $data2->fetch_assoc();
            $this->smarty->assign("data2",$data2);

            $uid1 = isset($_SESSION["uid"])?$_SESSION["uid"]:0;//此时登陆人的uid

            $this->smarty->assign("uid1",$uid1);

            //是否关注查询
            $data3 = $dbobj->select("select * from guanzhu WHERE uid1=".$uid1." and uid2=".$uid2);
            $this->smarty->assign("flag",count($data3));
            //查询该篇文章是否被收藏
            $data4 = $dbobj->select("select * from shoucang WHERE conid=".$cid." AND uid=".$uid1);
            $this->smarty->assign("data4",count($data4));
            //查询该文章是否被喜欢
            $islike = $dbobj->select("select * from good WHERE conid=".$cid." and uid = ".$uid1);
            $this->smarty->assign("islike",count($islike));

            //留言部分
            $data5 = $dbobj->select("select user.nicheng,user.photo,message.* from user,message WHERE user.uid=message.uid1 AND 
message.state=0 AND message.conid=".$cid);
            foreach ($data5 as $key=>$value){
                $data6 = $dbobj->select("select user.nicheng,message.* from user,message WHERE user.uid=message.uid1 AND 
message.state={$value['mid']}"." and message.conid=".$cid);
                if (!isset($data5[$key]["son"])){
                    $data5[$key]["son"] = array();
                }
                foreach ($data6 as $item){
                    $data5[$key]["son"][] = $item;
                }
            }
            $this->smarty->assign("messageNum",count($data5));
            $this->smarty->assign("data5",$data5);

            $this->smarty->display("index/content.html");
        }
        //喜欢的文章页
        function like(){
            $this->checkSession();
            $uid = $_SESSION["uid"];
            $dbobj = new db();
            $username = $dbobj->select("select nicheng from user WHERE uid=".$uid);
            $this->smarty->assign("nicheng",$username[0]["nicheng"]);

            $guanzhuArr = $dbobj->select("select * from guanzhu WHERE uid1=".$uid);
            $this->smarty->assign("uidNum",count($guanzhuArr));

            $fans = $dbobj->select("select * from guanzhu WHERE uid2=".$uid);
            $this->smarty->assign("fansNum",count($fans));

            $articNum = $dbobj->select("select * from con WHERE uid=".$uid);
            $this->smarty->assign("articNum",count($articNum));

            //喜欢的文章列表
            $likeList = $dbobj->select("select user.photo,user.nicheng,con.cid,con.thumb,con.ctitle,con.jianjie,con.condate,hits.hnum FROM user,con,hits WHERE user.uid=con.uid AND con.cid=hits.conid AND user.uid=".$uid);
            foreach ($likeList as $key=>$item){
                $message = $dbobj->select("select * from message WHERE conid = ".$item["cid"]);
                $likeList[$key]["messageNum"] = count($message);
            }
            $this->smarty->assign("likeNum",count($likeList));
            $this->smarty->assign("likeList",$likeList);

            $this->smarty->display("index/like.html");
        }
        //列表页
        function lists(){
            $this->checkSession();
            $cid = G("cid");
            $dbobj = new db("category");
            $data1 = $dbobj->where("cid=".$cid)->find();//分类信息
            $this->smarty->assign("data1",$data1);

            //分类列表内容
            $db = new db();
            $data2 = $db->select("select user.nicheng,user.photo,con.*,hits.hnum from user,con,hits WHERE user.uid=con.uid AND con.state=3 AND con.cid=hits.conid AND con.catid=".$cid);
            foreach ($data2 as $key=>$value){
                $arr = $db->select("select * from message WHERE conid=".$value["cid"]);
                $data2[$key]["messageNum"] = count($arr);
            }
            $this->smarty->assign("data2",$data2);

            $this->smarty->display("index/lists.html");
        }
        //钱包页面
        function wallet(){
            $this->checkSession();
            $this->smarty->display("index/wallet.html");
        }
        //写文章页面
        function write(){
            $this->checkSession();
            $dbobj = new db();
            $db = $dbobj->db;
            $tree = new tree();
            $tree->getTree(0,$db,"category");
            $str = $tree->str;
            $this->smarty->assign("str",$str);
            $this->smarty->display("index/write.html");
        }
        //购物车
        function car(){
            $this->checkSession();
            $this->smarty->display("index/car.html");
        }
        //设置页面
        function setting(){
            $this->checkSession();

            $uid = $_SESSION["uid"];
            $db = new db("user");
            $arr = $db->where("uid=".$uid)->find();
            $this->smarty->assign("data",$arr);
            $this->smarty->display("index/setting.html");
        }
        function addPhone(){
            $code = P("code");
            if ($code != $_SESSION["phonecode"]){
                $message = "验证码输入错误";
                $url = "index.php?m=index&f=index&a=setting";
                $this->message($message,$url);
                exit();
            }
            $phone = p("phone");
            $dbobj = new db("user");
            if($dbobj->where("uid=".$_SESSION["uid"])->update("phone='{$phone}'") > 0){
                $message = "修改成功！";
                $url = "index.php?m=index&f=index&a=setting";
                $this->jump($message,$url);
            }
        }
    }