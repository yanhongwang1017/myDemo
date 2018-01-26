<?php
    class member extends main{
        /*************管理员******************/
        //查询管理员
        function showAdmin(){
            $dbobj = new db();
            $result = $dbobj->exec("select admin.*,level.lname from admin,level WHERE admin.level=level.lid");
            $arr = $result->fetch_all(MYSQL_ASSOC);

            $this->smarty->assign("result",$arr);
            $this->smarty->display("admin/showAdmin.html");
        }
        //添加管理员
        function addAdmin(){
            $dbobj = new db("level");
            $result = $dbobj->select();
            $this->smarty->assign("data",$result);
            $this->smarty->display("admin/addAdmin.html");
        }
        function addAdminCon(){
            $aname = P("aname");
            $level = P("level");
            $dbobj = new db("admin");
            $arr = array(
                "aname"=>"'$aname'",
                "level"=>"'$level'"
            );
            $result = $dbobj->insert($arr);
            if($result > 0){
                $message = "添加成功";
                $url = "index.php?m=admin&f=member&a=showAdmin";
                $this->jump($message,$url);
            }
        }
        //编辑管理员
        function editAdmin(){
            $dbobjl = new db("level");
            $result1 = $dbobjl->select();
            $this->smarty->assign("data1",$result1);//管理员角色

            $aid = G("aid");
            $dbobj2 = new db();
            $result = $dbobj2->exec("select admin.*,level.lname from admin,level WHERE admin.level=level.lid");
            $arr = $result->fetch_all(MYSQL_ASSOC);
            foreach ($arr as $value){
                if($value["aid"] == $aid){
                    $lname = $value["lname"];
                    $aname = $value["aname"];
                }
            }

            $this->smarty->assign("aname",$aname);
            $this->smarty->assign("lname",$lname);
            $this->smarty->assign("aid",$aid);
            $this->smarty->display("admin/editAdmin.html");
        }
        function editAdminCon(){
            $aid = P("aid");
            $aname = P("aname");
            $level = P("level");
            $dbobj = new db("admin");
            $result = $dbobj->where("aid=".$aid)->update("aname='{$aname}',level='{$level}'");
            if ($result > 0){
                $message = "修改成功";
                $url = "index.php?m=admin&f=member&a=showAdmin";
                $this->jump($message,$url);
            }
        }
        //删除管理员
        function delAdmin(){
            $aid = G("aid");
            $dbobj = new db("admin");
            $result = $dbobj->where("aid='{$aid}'")->delete();
            if($result){
                echo "ok";
            }
        }
        /********************管理员角色信息*******************************/
        //查询管理员角色页面
        function showRole(){
            $this->smarty->display("admin/showRole.html");
        }
        //从数据库中获取管理员角色信息
        function showRoles(){
            $dbobj = new db("level");
            $result = $dbobj->select();
            $arr = array();
            $arr["rows"] = $result;
            $arr["results"] = count($arr["rows"]);
            echo json_encode($arr,true);
        }
        function addRole(){
            $type = G("type");
            $lname = P("lname");
            $lids = P("lid");//编辑用到的id
            $connum = P("connum");
            $messagenum = P("messagenum");
            $adminnum = P("adminnum");
            $dbobj = new db("level");

            $lid = $_SESSION["level"];//权限id

            if ($type == "add"){
                $result = $dbobj->where("lid={$lid} and find_in_set('1',adminnum)")->find();//增加
                if (count($result) > 0){
                    $arr = array(
                        "lname"=>"'$lname'",
                        "connum"=>"'$connum'",
                        "messagenum"=>"'$messagenum'",
                        "adminnum"=>"'$adminnum'"
                    );
                    if($dbobj->insert($arr) > 0){
                        echo $dbobj->db->insert_id;
                    }
                }else{
                    $message = "没有权限";
                    $url = "index.php?m=admin&f=member&a=showRole";
                    $this->jump($message,$url);
                }
            }elseif ($type == "edit"){
                $result = $dbobj->where("lid={$lid} and find_in_set('3',adminnum)")->find();//编辑
                if (count($result) > 0){
                    $sql = "lname='{$lname}',connum='{$connum}',messagenum='{$messagenum}',adminnum='{$adminnum}'";
                    $result = $dbobj->where("lid={$lids}")->update($sql);
                    if ($result > 0){
                        echo "edit";
                    }
                }else{
                    $message = "没有权限";
                    $url = "index.php?m=admin&f=member&a=showRole";
                    $this->jump($message,$url);
                }
            }
        }
        //删除管理员角色
        function deleteRole(){
            $lid = $_SESSION["level"];
            $dbobj = new db("level");
            $result = $dbobj->where("lid={$lid} and find_in_set('2',adminnum)")->find();
            if (count($result) > 0){
                $lids = P("lids");
                if ($dbobj->where("lid in ".$lids)->delete() > 0){
                    echo "del";
                }
            }else{
                $message = "没有权限";
                $url = "index.php?m=admin&f=member&a=showRole";
                $this->jump($message,$url);
            }
        }
    }