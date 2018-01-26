<?php
    class write extends main {
        //默认的提示页面
        function defaults(){
            $this->smarty->display("index/defaults.html");
        }
        function addCon(){
            $uid = $_SESSION["uid"];
            $cid = G("cid");
            $dbobj = new db();
            $result = $dbobj->exec("select user.nicheng,user.photo,con.*,hits.hnum from user,con,hits WHERE user.uid=con.uid AND hits.conid = con.cid AND con.uid=".$uid." AND con.catid=".$cid);
            $data = $result->fetch_all(MYSQL_ASSOC);
            foreach ($data as $key=>$value){
                $arr = $dbobj->select("select * from message WHERE conid=".$value["cid"]);
                $data[$key]["messageNum"] = count($arr);
            }
            //var_dump($data);exit();
            $this->smarty->assign("data",$data);

            $result1 = $dbobj->exec("select category.cname from category,con WHERE category.cid=con.catid AND con.catid=".$cid);
            $data1 = $result1->fetch_assoc();
            $this->smarty->assign("data1",$data1);

            $this->smarty->assign("cid",$cid);
            $this->smarty->display("index/addCon.html");
        }
        function addConCon(){
            $cid = G("cid");
            $dbobj = new db("position");
            $result = $dbobj->select();
            $this->smarty->assign("data",$result);
            $this->smarty->assign("cid",$cid);
            $this->smarty->display("index/addConCon.html");
        }
        //文件上传
        function upload(){
            $uploadobj = new upload();
            $uploadobj->move();
        }
        function addContent(){
            $ctitle = sql(P("ctitle"));
            $jianjie = sql(P("jianjie"));
            $con = addcslashes(P("con"),"s");
            $uid = $_SESSION["uid"];
            $thumb = P("thumb");
            $catid = P("cid");
            $price = sql(P("price"));
            $state = G("state");
            $pid = P("pid");
            $pid = implode(",",$pid);

            $dbobj = new db("con");
            $arr = array(
                "ctitle"=>"'{$ctitle}'",
                "jianjie"=>"'{$jianjie}'",
                "con"=>"'{$con}'",
                "uid"=>"'{$uid}'",
                "cquanxian"=>1,
                "thumb"=>"'{$thumb}'",
                "catid"=>"'{$catid}'",
                "price"=>"'{$price}'",
                "state"=>"'{$state}'",
                "pid"=>"'{$pid}'"
            );
            if ($dbobj->insert($arr) > 0){
                $message = "内容上传成功";
                $url = "index.php?m=index&f=write&a=addConCon&cid=".$catid;
                $this->jump($message,$url);
            }else{
                $message = "内容上传失败";
                $url = "index.php?m=index&f=write&a=addConCon&cid=".$catid;
                $this->jump($message,$url);
            }
        }
        //编辑内容
        function editCon(){
            $cid = G("cid");
            $dbobj = new db("position");
            $result = $dbobj->select();
            $this->smarty->assign("data",$result);
            $this->smarty->assign("cid",$cid);

            $dbobj->selectTable("con");
            $data1 = $dbobj->where("cid=".$cid)->find();

            $this->smarty->assign("data1",$data1);
            $this->smarty->display("index/editCon.html");
        }
        //删除缩略图
        function delThumb(){
            $cid = G("cid");
            $dbobj = new db("con");
            $thumbUrl = $dbobj->field("thumb")->where("cid=".$cid)->find();
            unlink($thumbUrl["thumb"]);
            if($dbobj->update("thumb=''")){
                echo "ok";
            }
        }
        //编辑内容
        function editContent(){
            $ctitle = sql(P("ctitle"));
            $jianjie = sql(p("jianjie"));
            $con = addcslashes(P("con"),"scrityle");
            $thumb = P("thumb");
            $price = sql(P("price"));
            $catid = P("cid");
            $state = G("state");
            $pid = P("pid");
            $pid = implode(",",$pid);
            $cid = P("cid");

            $dbobj = new db("con");

            $thumbUrl = $dbobj->field("thumb")->where("cid=".$cid)->find();
            if ($thumbUrl != $thumb){
                unlink($thumbUrl["thumb"]);
            }

            $sql = "ctitle='{$ctitle}',jianjie='{$jianjie}',con='{$con}',thumb='{$thumb}',price='{$price}',state='{$state}',pid='{$pid}'";
            $result = $dbobj->where("cid=".$cid)->update($sql);
            if ($result > 0){
                $message = "内容修改成功";
                $url = "index.php?m=index&f=write&a=addConCon&cid=".$catid;
                $this->jump($message,$url);
            }else{
                $message = "内容修改失败";
                $url = "index.php?m=index&f=write&a=addConCon&cid=".$catid;
                $this->jump($message,$url);
            }
        }
        //删除内容
        function delCon(){
            $cid = G("cid");
            $dbobj = new db("con");
            $result = $dbobj->where("cid=".$cid)->delete();
            if ($result > 0){
                echo "ok";
            }
        }
    }