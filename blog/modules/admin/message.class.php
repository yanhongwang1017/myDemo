<?php
    class message extends main{
        function showMessage(){
            $pageobj = new pages();
            $pageobj->nums = 5;
            $dbobj = new db();
            $result = $dbobj->select("select * from message");
            $pageobj->total = count($result);
            $this->smarty->assign("pages",$pageobj->show());
            $limit = $pageobj->limit;

            $messages = $dbobj->select("select message.*,con.ctitle,user.nicheng from message,con,user WHERE message.conid=con.cid AND message.uid1 = user.uid limit ".$limit);
            $this->smarty->assign("data",$messages);
            $this->smarty->display("admin/showMessage.html");
        }
        function delMessage(){
            $mid = G("mid");
            $dbobj = new db("message");
            $result = $dbobj->where("mid=".$mid)->find();
            if ($result["state"] == 0){
                $del = $dbobj->where("state=".$mid)->delete();
                if ($del > 0){
                    echo "ok";
                }else{
                    echo "no";
                }
            }else{
                $del = $dbobj->where("mid=".$mid)->delete();
                if ($del > 0){
                    echo "ok";
                }else{
                    echo "no";
                }
            }
        }
    }