<?php
    class content extends main{
        //点击量 or 阅读量
        function hitNmu(){
            $conid = G("cid");
            $dbobj = new db("hits");
            $result = $dbobj->where("conid=".$conid)->select();
            if (count($result)){
                if($dbobj->where("conid=".$conid)->update("hnum=hnum+1")){
                    echo "ok";
                }
            }else{
                if ($dbobj->insert(array("conid"=>"'{$conid}'","hnum"=>1))){
                    echo "ok";
                }
            }
        }
        //关注
        function guanzhu(){
            if (!isset($_SESSION["indexLogin"])){
                echo "noLogin";
            }else{
                $uid1 = P("uid1");
                $uid2 = P("uid2");
                $dbobj = new db("guanzhu");
                if ($dbobj->insert(array("uid1"=>"'{$uid1}'","uid2"=>"'{$uid2}'")) > 0){
                    echo "ok";
                }
            }
        }
        //取消关注
        function cancelguanzhu(){
            $uid1 = P("uid1");
            $uid2 = P("uid2");
            $dbobj = new db("guanzhu");
            if($dbobj->where("uid1=".$uid1." AND uid2=".$uid2)->delete()){
                echo "ok";
            }
        }
        //添加收藏
        function addCollect(){
            if (!isset($_SESSION["indexLogin"])){
                echo "noLogin";
            }else{
                $conid = P("conid");
                $uid = P("uid");
                $dbobj = new db("shoucang");
                if ($dbobj->insert(array("conid"=>"'{$conid}'","uid"=>"'{$uid}'")) > 0){
                    echo "ok";
                }
            }
        }
        //取消收藏
        function delCollect(){
            $conid = P("conid");
            $uid = P("uid");
            $dbobj = new db("shoucang");
            if ($dbobj->where("conid=".$conid." AND uid=".$uid)->delete()){
                echo "ok";
            }
        }
        //添加留言
        function addMessage(){
            if(!isset($_SESSION["indexLogin"])){
                echo "noLogin";
            }else{
                $uid1 = P("uid1");
                $uid2 = P("uid2");
                $conid = P("conid");
                $mcon = P("mcon");
                $state = P("state");
                $dbobj = new db("message");
                $arr = array(
                    "uid1"=>$uid1,
                    "uid2"=>$uid2,
                    "conid"=>$conid,
                    "mcon"=>"'{$mcon}'",
                    "state"=>$state
                );
                if ($dbobj->insert($arr)){
                    $dbobj->selectTable("user");
                    $mid = $dbobj->db->insert_id;
                    $this->smarty->assign("idNum",$mid);
                    $result = $dbobj->where("uid=".$uid1)->find();
                    $this->smarty->assign("nicheng",$result["nicheng"]);
                    $this->smarty->assign("photo",$result["photo"]);

                    $this->smarty->assign("mcon",$mcon);
                    $this->smarty->assign("uid",$uid1);
                    $dbobj->selectTable("message");
                    $result1 = $dbobj->where("mid=".$mid)->find();
                    $this->smarty->assign("mdate",$result1["mdate"]);
                    $this->smarty->display("index/articleMessage.html");
                }
            }
        }
        //添加喜欢
        function addLike(){
            $uid = P("uid");
            $conid = P("conid");
            $db = new db("good");
            if($db->insert(array("uid"=>$uid,"conid"=>$conid))){
                echo "ok";
            }
        }
        //取消喜欢
        function cancleLike(){
            $uid = P("uid");
            $conid = P("conid");
            $db = new db("good");
            if($db->where("uid=".$uid." and conid=".$conid)->delete()){
                echo "ok";
            }
        }
        //更改设置
        function setting(){
            $db = new db("user");
            $uid = $_SESSION["uid"];
            $photo = $_POST["photo"];
            $nicheng = $_POST["nicheng"];
            $set = $db->where("uid=".$uid)->update("photo='{$photo}',nicheng='{$nicheng}'");
            if ($set > 0){
                echo "<script>location.href='index.php?m=index&f=index&a=setting&uid={$uid}';</script>";
            }
        }
    }