<?php
    class tree{
        public $str = "";
        public $ul = "";
        public $ol = "";
        //添加分类
        public function kind($pid,$db,$table,$step,$flag,$currentcid){
            //通过当前的cid   获取当前的pid
            $currentPid = "";
            if($currentcid){
                $sql = "select * from ".$table." where cid=".$currentcid;
                $result = $db->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
                $currentPid = $row['pid'];
            }
            $sql = "select * from ".$table." where pid=".$pid;
            $step += 1;
            $str = str_repeat($flag,$step);
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $result->fetch()){
                $cid = $row['cid'];
                $cname = $row['cname'];
                if($cid == $currentPid){
                    $this->str.= "<option value=".$cid." selected>".$str.$cname."</option>";
                }else{
                    $this->str.="<option value=".$cid.">".$str.$cname."</option>";
                }
                //递归
                $this->kind($cid,$db,$table,$step,$flag,$currentcid);
            }
        }
        //查看分类
        public function kind1($pid,$db,$table,$step,$flag){
            $sql = "select * from ".$table." where pid=".$pid;
            $result = $db->query($sql);
            if($result->rowCount() == 0){
                return false;
            }
            $this->ul .= "<ul>";
            $result->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $result->fetch()){
                $cid = $row['cid'];
                $cname = $row['cname'];
                $this->ul.= "<li>".$cid."&nbsp;.&nbsp;".$cname."<a href='delkind.php?cid={$cid}'>删除</a><a href='editkind.php?cid={$cid}'>编辑</a></li>";
                $this->kind1($cid,$db,$table,$step,$flag);
            }
            $this->ul.= "</ul>";
        }
        //删除分类
        function del($cid,$db,$table){
            $sql = "select * from " .$table." where pid=".$cid;
            $result = $db->query($sql);
            if($result->rowCount() > 0){
                echo "<script>alert('有子分类不能删除');location.href='queryKind.php';</script>";
            }else{
                //根据cid查找pid
                $sqls = "select pid from ".$table." where cid=".$cid;
                $result = $db->query($sqls);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
                $pid = $row['pid'];
                $sql = "delete  from ".$table." WHERE cid=".$cid;
                if($db->exec($sql)){
                    $sql = "select cname from kind WHERE pid=".$pid;
                    $result = $db->query($sql);
                    if($result->rowCount() == 0){
                        $sql = "update ".$table." set state=0 where cid=".$pid;
                        if($db->query($sql)){
                            echo "<script>alert('删除成功');location.href='queryKind.php';</script>";
                        }else{
                            echo "<script>alert('删除成功');location.href='queryKind.php';</script>";
                        }
                    }
                }
            }
        }
        public function edit($pid,$db,$table,$step,$flag,$currentcid){
            $sql="select * from ".$table." where cid=".$currentcid;
            $result=$db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row1=$result->fetch();
            $currentPid=$row1["pid"];
            $sql1="select * from ".$table." where pid=".$pid;
            $step+=1;
            $str1=str_repeat($flag,$step);
            $result1=$db->query($sql1);
            $result1->setFetchMode(PDO::FETCH_ASSOC);
            while($row=$result1->fetch()){
                $cid=$row['cid'];
                $cname=$row['cname'];
                if($cid==$currentPid){
                    $this->str.='<option value="'.$cid.'" selected>'.$str1.$cname.'</option>';
                }else{
                    $this->str.='<option value="'.$cid.'">'.$str1.$cname.'</option>';
                }
                $this->edit($cid,$db,$table,$step,$flag,$currentcid);
            }
        }
        //查看其它分类
        public function showOtherCategory($db,$table){
            $sql="select * from ".$table;
            $result=$db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            while($row=$result->fetch()){
                $posid=$row['posid'];
                $posname=$row['posname'];
                $this->ol.="<ul>";
                $this->ol.="<li>".$posid."&nbsp;.&nbsp;"."{$posname}"."<a href='editOtherKind.php?posid={$posid}' style='float: right'>编辑</a>"."<div></div>"."<a href='delOtherKind.php?posid={$posid}' style='float: right'>删除</a></li>";
                $this->ol.="</ul>";
            }
        }
        //删除其它分类
        public function delOther($posid,$db,$table){
            $sql='delete from '.$table.' where posid='.$posid;
            if($db->exec($sql)){
                echo "<script>alert('删除成功');location.href='showOtherKind.php'</script>";
            }
        }
    }
