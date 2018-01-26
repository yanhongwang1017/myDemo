<?php
    defined("COME") or exit("非法进入");
    class smarty{
        public $templateUrl;
        public $compileUrl;
        public $arr = array();
        //缓存
        public $cache = false;
        public $cacheUrl;

        //创建文件目录
        public function setTemplateDir($dirname = "template"){
            $this->templateUrl = $dirname;
            $tplurl = APP_PATH."/".$this->templateUrl;
            $this->templateUrl = $tplurl;
            if(!is_dir($tplurl)){
                mkdir($tplurl);
            }
        }
        //创建php文件目录
        public function setCompileDir($dirname = "compile"){
            $this->compileUrl = $dirname;
            $comurl = APP_PATH."/".$this->compileUrl;
            $this->compileUrl = $comurl;
            if(!is_dir($comurl)){
                mkdir($comurl);
            }
        }
        //创建缓存目录
        public function setCacheDir($dirname='cache'){
            $this->cacheURL=$dirname;
            $tem = APP_PATH.'/'.$this->cacheURL;
            $this->cacheURL = $tem;
            if(!is_dir($tem)){
                mkdir($tem);
            }
        }
        //分配
        public function assign($str,$val){
            $this->arr[$str] = $val;
        }
        //显示到页面
        public function display($url){
            //随机文件名
            $md5Url = md5($url);
            //缓存文件路径
            $cacheFullPath = $this->cacheUrl."/".$md5Url.".html";
            //判断是否存在缓存文件
            if(is_file($cacheFullPath)){
                //存在执行缓存文件
                include $cacheFullPath;
            }else{
                $tplFullPath = $this->templateUrl."/".$url;
                //获取文件中的内容
                $str = file_get_contents($tplFullPath);
                //替换{}中的内容
                $newstr = preg_replace("/\{([^\}\s]+)\}/",'<?php echo $this->arr["$1"]?>',$str);
                $cplFullPath = $this->compileUrl."/".$md5Url.".php";
                //开启缓存
                ob_start();
                //替换之后的内容写进php文件
                file_put_contents($cplFullPath,$newstr);
                //执行php文件
                include $cplFullPath;

                if($this->cache){
                    //获得页面中的内容
                    $cachestr = ob_get_contents();
                    //将获取的内容写到缓存文件
                    file_put_contents($cacheFullPath,$cachestr);
                }
            }
        }
    }