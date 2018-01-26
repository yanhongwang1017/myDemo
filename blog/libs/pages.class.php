<?php
    defined("COME") or exit("非法进入");
    class pages{
        public $nums = 10;
        public $total;
        public $pageNum;//页数
        public $limit;

        function show(){
            if (!defined("PORT")){
                define("PORT",strtolower(strchr($_SERVER["SERVER_PROTOCOL"],"/",true)));
                //主机地址
                define("HOST",$_SERVER["HTTP_HOST"]);
            }
            define("PAGE_URL",PORT."://". HOST .$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"]);//页面的url地址
            $this->pageNum = ceil($this->total / $this->nums);
            $originUrl = PAGE_URL;
            if (!strrpos($originUrl,"pages")){
                $originUrl = $originUrl."&pages=0";
            }
            $fullUrl = substr($originUrl,0,strrpos($originUrl,"&pages"));
            $pages = substr($originUrl,strrpos($originUrl,"=") + 1);

            $str = "";
            $str.="<a style='display: inline-block;vertical-align: middle;padding: 0 15px;height: 28px;line-height: 28px;margin: 0 -1px 5px 0;background-color: #fff;
        color: #333;font-size: 16px;box-sizing: content-box;border: 1px solid #e2e2e2;' href='{$fullUrl}&pages=0'>首页</a>";

            $up = $pages-1 < 0 ? 0 : $pages - 1;
            $str.="<a style='display: inline-block;vertical-align: middle;padding: 0 15px;height: 28px;line-height: 28px;margin: 0 -1px 5px 0;background-color: #fff;
        color: #333;font-size: 16px;box-sizing: content-box;border: 1px solid #e2e2e2;' href='{$fullUrl}&pages={$up}'>上一页</a>";
            $pageNums = $this->pageNum;
            $start = $pages - 3 < 0 ? 0 :$pages - 3;
            $end = $pages + 6 > $pageNums - 1 ? $pageNums - 1 : $pages + 6;

            for ($i = $start; $i <= $end; $i++){
                $num = $i + 1;
                if ($i == $pages){
                    $style = "style='background-color: #1E9FFF;display: inline-block;vertical-align: middle;padding: 0 15px;height: 28px;line-height: 28px;margin: 0 -1px 5px 0;
        color: #333;font-size: 16px;box-sizing: content-box;border: 1px solid #e2e2e2;'";
                }else{
                    $style = "style='background-color: #FFF;display: inline-block;vertical-align: middle;padding: 0 15px;height: 28px;line-height: 28px;margin: 0 -1px 5px 0;
        color: #333;font-size: 16px;box-sizing: content-box;border: 1px solid #e2e2e2;'";
                }
                $str.="<a href='{$fullUrl}&pages={$i}' {$style}>{$num}</a>";
            }
            $next=$pages +1 > $pageNums - 1 ? $pageNums - 1 : $pages + 1;
            $str.="<a style='display: inline-block;vertical-align: middle;padding: 0 15px;height: 28px;line-height: 28px;margin: 0 -1px 5px 0;background-color: #fff;
        color: #333;font-size: 16px;box-sizing: content-box;border: 1px solid #e2e2e2;' href='{$fullUrl}&pages={$next}'>下一页</a>";
            $last=$pageNums-1;
            $str.="<a style='display: inline-block;vertical-align: middle;padding: 0 15px;height: 28px;line-height: 28px;margin: 0 -1px 5px 0;background-color: #fff;
        color: #333;font-size: 16px;box-sizing: content-box;border: 1px solid #e2e2e2;' href='{$fullUrl}&pages={$last}'>尾页</a>";
            $nums=$pages*$this->nums;
            $this->limit=$nums.", ".$this->nums;
            return $str;
        }
    }