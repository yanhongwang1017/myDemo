<?php
    if(!defined("COME")){
        echo "非法访问";
        exit();
    }
    class route{
        //通过地址栏调度
        private static $m;
        private static $f;
        private static $a;
        private function getInfo(){
            self::$m = isset($_REQUEST["m"]) && !empty($_REQUEST["m"]) ? $_REQUEST["m"] : "index";//目录
            self::$f = isset($_REQUEST["f"]) && !empty($_REQUEST["f"]) ? $_REQUEST["f"] : "index";//类
            self::$a = isset($_REQUEST["a"]) && !empty($_REQUEST["a"]) ? $_REQUEST["a"] : "init";//方法
        }
        public function set(){
            //先获取参数信息，文件夹的名字和类名是一样的
            $this->getInfo();
            $murl = MODULES_PATH."/".self::$m;
            if(is_dir($murl)){
                $furl = MODULES_PATH."/".self::$m."/".self::$f.".class.php";
                if(is_file($furl)){
                    include_once $furl;
                    if(class_exists(self::$f)){//检测$f这个类是否存在
                        $obj = new self::$f();//实例化一个$f类的对象
                        $method = self::$a;
                        if(method_exists($obj,$method)){//检测$这个类是否存在
                            $obj -> $method();
                        }else{
                            echo self::$a."这个方法不存在";
                        }
                    }else{
                        echo self::$f."这个类不存在";
                    }
                }else{
                    echo $furl."这个文件不存在";
                }
            }else{
                echo $murl."这个目录不存在";
            }
        }
    }
