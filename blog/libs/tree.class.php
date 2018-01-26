<?php
    class tree{
        public $str = "";
        function getTree($pid,$db,$table){
            $sql = "select * from ".$table." where pid=".$pid;
            $result = $db->query($sql);
            $this->str .= "<ul class='tree_list'>";
            while ($row = $result->fetch_assoc()){
                $sql1 = "select * from ".$table." where pid=".$row["cid"];
                $result1 = $db->query($sql1);
                if ($result1->num_rows > 0){
                    $this->str.="<li class='word_list'><span class='glyphicon glyphicon-triangle-bottom'></span>{$row['cname']}</li>";
                }else{
                    $cid = $row["cid"];
                    $this->str.="<li class='word_list'><span class='glyphicon glyphicon-hand-right'></span><a href='index.php?m=index&f=write&a=addCon&cid={$cid}' target='content'>{$row['cname']}</a></li>";
                }
                $this->getTree($row["cid"],$db,$table);
            }
            $this->str .= "</ul>";
        }
    }