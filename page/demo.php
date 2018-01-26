<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layPage快速使用</title>
</head>
<body>
<?php
    $pageNum = 1;
    $pageSize = 3;
    $pages = 7;
    $db = new mysqli("localhost","root","123456","blog");
    $db->query("set names utf8");

    $search=$_SERVER["QUERY_STRING"];
    $port = strtolower(strchr($_SERVER["SERVER_PROTOCOL"],"/",true));
    $host = $_SERVER["HTTP_HOST"];
    $url = $port."://".$host.$_SERVER["SCRIPT_NAME"];
    $pageUrl = $url."?m=admin&pages=".$pageNum;

    $originurl=substr($pageUrl,0,strrpos($pageUrl,"&pages="));
    $current=substr($pageUrl,strrpos($pageUrl,"=")+1);

    $str="";
    $str.="<a href='{$originurl}&pages=0'>[首页]</a>";

    $up=($current-1)<0?0:$current-1;
    $str.="<a href='{$originurl}&pages={$up}'>[上一页]</a>";


    $start=($current-3)<0?0:$current-3;
    $end=($start+6)>$pages?$pages:$start+6;
    for($i=$start;$i<$end;$i++){
        $num=$i+1;
        if($i==$current){
            $style="style='color:red'";
        }else{
            $style="style='color:#000'";
        }
        $str.="<a href=".$originurl."&pages={$i}' {$style}>[".$num."]</a> ";
    }


    $next = $current+1 > $pages ? $pages-1 : $current+1;
    $str.="<a href='{$originurl}&pages={$next}'>[下一页]</a>";
    $last=$pages-1;
    $str.="<a href='{$originurl}&pages={$last}'>[尾页]</a>";

    $currentNum=$current*$pageNum;
    $limit="limit ".$currentNum. " , ".$pageNum;

    $sql = "select * from level limit ".(($pageNum - 1) * $pageSize) . "," . $pageSize;
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()){
?>
    <li><?php echo $row["lname"];?></li>
<?php
    }
    echo $str;
?>
</body>
</html>