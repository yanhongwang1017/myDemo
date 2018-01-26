<?php
    defined("COME") or exit("非法进入");
    class user extends main{
        function role(){
            $dbobj = new db("role");
            $result = $dbobj->limit("0,16")->select();
            $this->smarty->assign("result", $result);
            $this->smarty->display("admin/role.html");
        }
        function ajax(){
            sleep(1);
            $page = $_POST["page"] * 10;
            $dbobj = new db("role");
            $result = $dbobj->limit("{$page},10")->select();
            echo json_encode($result);
        }
        /******************用户管理******************************/
        //查看用户
        function showUser(){
            $dbobj = new db("user");
            //$result = $dbobj->select();
            $result = $dbobj->exec("select user.*,role.rname from user,role where user.level=role.rid");
            $arr = $result->fetch_all(MYSQL_ASSOC);
            $this->smarty->assign("result", $arr);
            $this->smarty->display("admin/showUser.html");
        }
        //删除用户
        function delUser(){
            $level = $_SESSION["level"];
            $dbobj = new db("level");
            $result = $dbobj->where("lid={$level} and find_in_set('2',adminnum)")->find();
            if (count($result) > 0){
                $uid = G("uid");
                $dbobj = new db("user");
                $result = $dbobj->where("uid=".$uid)->delete();
                if ($result > 0) {
                    echo "ok";
                }
            }else{
                echo "no";
            }
        }
        /*******************用户角色****************************/
        //查看用户角色
        function showUserRole(){
            $dbobj = new db("role");
            $data = $dbobj->select();
            $this->smarty->assign("data", $data);
            $this->smarty->display("admin/showUserRole.html");
        }
        //添加用户角色
        function addUserRole(){
            $level = $_SESSION["level"];
            $dbobj = new db("level");
            $result = $dbobj->where("lid={$level} and find_in_set('1',adminnum)")->find();
            if (count($result) > 0){
                $this->smarty->display("admin/addUserRole.html");
            }else{
                $message = "对不起，您没有该权限";
                $url = "index.php?m=admin&f=user&a=showUserRole";
                $this->jump($message,$url);
                exit();
            }
        }
        function addUserRoleData(){
            $rname = P("rname");
            $connum = P("connum");
            $conlevel = P("conlevel");
            $dbobj = new db("role");
            $arr = array(
                "rname" => "'$rname'",
                "connum" => "'$connum'",
                "conlevel" => "'$conlevel'"
            );
            if ($dbobj->insert($arr) > 0) {
                $message = "添加成功";
                $url = "index.php?m=admin&f=user&a=addUserRole";
                $this->jump($message, $url);
                exit();
            }
        }
        //编辑用户角色页面
        function editUserRolePage(){
            $level = $_SESSION["level"];
            $dbobj = new db("level");
            $result = $dbobj->where("lid={$level} and find_in_set('3',adminnum)")->find();
            if (count($result) > 0){
                $rid = G("rid");
                $dbobj = new db("role");
                $data = $dbobj->where("rid=" . $rid)->find();
                $this->smarty->assign("data", $data);
                $this->smarty->display("admin/editUserRolePage.html");
            }else{
                $message = "对不起，您没有该权限";
                $url = "index.php?m=admin&f=user&a=showUserRole";
                $this->jump($message,$url);
                exit();
            }
        }
        function editUserRoleData(){
            $rid = P("rid");
            $rname = P("rname");
            $connum = P("connum");
            $conlevel = P("conlevel");
            $dbobj = new db("role");
            $result = $dbobj->where("rid=".$rid)->update("rname='{$rname}',connum='{$connum}',conlevel='{$conlevel}'");
            if ($result > 0){
                $message = "编辑成功";
                $url = "index.php?m=admin&f=user&a=showUserRole";
                $this->jump($message,$url);
                exit();
            }
        }
        //删除用户角色
        function delUserRole(){
            $level = $_SESSION["level"];
            $dbobj = new db("level");
            $result = $dbobj->where("lid={$level} and find_in_set('2',adminnum)")->find();
            if (count($result) > 0){
                $rid = G("rid");
                $dbobj = new db("role");
                if ($dbobj->where("rid=".$rid)->delete() > 0){
                    echo "ok";
                }
            }else{
                echo "no";
            }
        }
    }