<?php
    class content extends main{
        /********************推荐位管理*************************/
        function showPosition(){
            $pageobj = new pages();
            $dbobj = new db("position");
            $pageobj->nums = 5;
            $pageobj->total = count($dbobj->select());

            $this->smarty->assign("pages",$pageobj->show());
            $limit=$pageobj->limit;
            $result=$dbobj->limit($limit)->select();

            $this->smarty->assign("result",$result);
            $this->smarty->display("admin/showPosition.html");
        }
        //添加推荐位
        function addPosition(){
            $this->smarty->display("admin/addPosition.html");
        }
        function addPositionCon(){
            $pname = P("pname");
            $dbobj = new db("position");
            $result = $dbobj->insert(array("pname"=>"'$pname'"));
            if ($result > 0){
                $message = "添加成功";
                $url = "index.php?m=admin&f=content&a=addPosition";
                $this->jump($message,$url);
            }
        }
        //ajax编辑推荐位
        function editPosition(){
            $pid = P("pid");
            $pname = P("pname");
            $dbobj = new db("position");
            if ($dbobj->where("pid=".$pid)->update("pname='{$pname}'") > 0){
                echo "ok";
            }else{
                echo "no";
            }
        }
        //ajax删除推荐位
        function delPosition(){
            $pid = G("pid");
            $dbobj = new db("position");
            if ($dbobj->where("pid=".$pid)->delete() > 0){
                echo "ok";
            }else{
                echo "no";
            }
        }
        /*********************内容管理**********************/
        function showCon(){
            $pageobj = new pages();
            $pageobj->nums = 4;

            $dbobj = new db();
            $result1 = $dbobj->select("select * from con");//分页所需要的数据

            $pageobj->total = count($result1);

            $this->smarty->assign("pages",$pageobj->show());
            $limit=$pageobj->limit;

            $state = "";
            if(@$_GET["state"]){
                $state = "AND con.state=".G("state");
            }
            $cquanxian = "";
            if(@$_GET["cquanxian"]){
                $cquanxian = "AND con.cquanxian=".G("cquanxian");
            }

            $result2=$dbobj->select("select con.*,user.uname,category.cname from con,user,category WHERE con.uid=user.uid AND con.catid=category.cid ".$state." ".$cquanxian." limit ".$limit);

            $result3 = $dbobj->select("select * from position");

            foreach ($result2 as $k=>$v){
                $arr = explode(",",$v["pid"]);
                $str = "";
                foreach ($result3 as $value){
                    if (in_array($value["pid"],$arr)){
                        $str .= $value["pname"].",";
                    }
                }
                $str=substr($str,0,-1);
                $result2[$k]["pname"]=$str;
            }

            $this->smarty->assign("data",$result2);
            $this->smarty->display("admin/showCon.html");
        }
        //查看内容详情
        function showContent(){
            $cid = G("cid");
            $dbobj = new db("con");
            $result = $dbobj->where("cid=".$cid)->find();

            $this->smarty->assign("data",$result);
            $this->smarty->display("admin/showContent.html");
        }
        //审核文章
        function check(){
            $cid = G("cid");
            $cquanxian = P("cquanxian");
            $state = P("state");
            $dbobj = new db("con");
            $sql = "cquanxian='{$cquanxian}',state='{$state}'";
            $result = $dbobj->where("cid=".$cid)->update($sql);

            if ($result > 0){
                $message = "审核成功";
                $url = "index.php?m=admin&f=content&a=showCon";
                $this->jump($message,$url);
            }else{
                $message = "审核失败";
                $url = "index.php?m=admin&f=content&a=showCon";
                $this->jump($message,$url);
            }
        }
    }

