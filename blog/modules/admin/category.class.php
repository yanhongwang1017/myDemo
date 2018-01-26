<?php
    class category extends main{
        function addCategory(){
            $this->smarty->display("admin/addCategory.html");
        }
        //展示所以分类
        function showCategory(){
            $arr = array(
                array(
                    "id"=>0,
                    "text"=>"一级分类",
                    "children"=>array()
                )
            );
            tree(0,$arr[0]["children"]);
            echo json_encode($arr);
        }
        function addCategoryCon(){
            $pid = P("pid");
            $cname = sql(P("cname"));
            $cimage = P("thumb");
            $cinfo = sql(P("cinfo"));
            $dbobj = new db("category");
            $arr = array(
                "cname"=>"'{$cname}'",
                "cimage"=>"'{$cimage}'",
                "cinfo"=>"'{$cinfo}'",
                "pid"=>"'{$pid}'"
            );
            if ($dbobj->insert($arr) > 0){
                $message = "添加成功";
                $url = "index.php?m=admin&f=category&a=addCategory";
                $this->jump($message,$url);
            }else{
                $message = "添加失败";
                $url = "index.php?m=admin&f=category&a=addCategory";
                $this->jump($message,$url);
            }
        }
        //查看分类页面
        function showCategoryPage(){
            $this->smarty->display("admin/showCategoryPage.html");
        }
        //从数据库中取出所有分类
        function showCategoryDate(){
            $dbobj = new db("category");
            $result = $dbobj->select();

            $arr = array();
            $arr["total"] = count($result);
            $arr["rows"] = array(
                array(
                    "id"=>0,
                    "cname"=>"一级分类",
                    "cinfo"=>"",
                    "iconCls"=>"icon-ok"
                )
            );
            foreach ($result as $value){
                $arr["rows"][] = array(
                    "id" => $value["cid"],
                    "cname"=>$value["cname"],
                    "cinfo"=>$value["cinfo"],
                    "_parentId"=>$value["pid"]
                );
            }
            $arr["footer"] = array(array(
                "cname"=>"分类列表",
                "cinfo"=>count($result),
                "iconCls"=>"icon-sum"
            ));
            echo json_encode($arr);
        }
        //编辑分类
        function editCategory(){
            $cid = P("cid");
            $field = P("field");
            $cname = P("val");
            $dbobj = new db("category");
            if ($dbobj->where("cid=".$cid)->update("$field ="."'{$cname}'")){
                echo "ok";
            }
        }
        //删除分类
        function delCategory(){
            $cid = P("cid");
            $dbobj = new db("category");
            if ($dbobj->where("cid=".$cid)->delete() > 0){
                echo "ok";
            }
        }
    }
