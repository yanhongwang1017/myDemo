<?php
    defined("COME") or exit("非法进入");
    class code{
        public $width = 110;
        public $height = 40;
        public $code = "2345678abcdefhjkmnprtuvwxyABCDEFHJKMNPRTUVWXY";
        public $codeLength = 4;
        public $codesize = array("min"=>25,"max"=>35);
        public $codeangle = array("min"=>-10,"max"=>10);
        public $image;
        public $pixNum = array("min"=>60,"max"=>120);
        public $lineNum = array("min"=>3,"max"=>6);
        public $type = "png";
        public $url;
        public $strs = "";
        public $session;

        //创建画布
        private function createCanvas(){
            $this->image = imagecreatetruecolor($this->width,$this->height);
            imagefill($this->image,0,0,$this->getColor());
        }
        //创建随机颜色
        private function getColor($type="back"){
            $r = $type == "back" ? mt_rand(0,120) : mt_rand(130,255);
            $g = $type == "back" ? mt_rand(0,120) : mt_rand(130,255);
            $b = $type == "back" ? mt_rand(0,120) : mt_rand(130,255);
            return imagecolorallocate($this->image,$r,$g,$b);
        }
        //创建文字
        private function getText(){
            $str = "";
            for ($i = 0; $i < $this->codeLength; $i++){
                $str .= $this->code[mt_rand(0,strlen($this->code) - 1)];
            }
            $this->strs = $str;
        }
        //创建内容
        function setCon(){
            $this->getText();
            for ($i = 0; $i < $this->codeLength; $i++){
                $fontsize = mt_rand($this->codesize["min"],$this->codesize["max"]);
                $fontangle = mt_rand($this->codesize["min"],$this->codesize["max"]);
                $space = $this->width/$this->codeLength;
                $arr = imagettfbbox($fontsize,$fontangle,$this->url,$this->strs[$i]);
                $height = $arr[1] - $arr[5];
                imagettftext($this->image,$fontsize,$fontangle,mt_rand(10,15)+$space*$i,$height,$this->getColor("abc"),$this->url,$this->strs[$i]);
            }
        }
        //创建点
        function createPix(){
            $pixNum = mt_rand($this->pixNum["min"],$this->pixNum["max"]);
            for($i = 0; $i < $pixNum; $i++){
                imagesetpixel($this->image,mt_rand(0,$this->width),mt_rand(0,$this->height),$this->getColor("abc"));
            }
        }
        //创建线条
        function createLine(){
            $lineNum = mt_rand($this->lineNum["min"],$this->lineNum["max"]);
            for ($i = 0; $i < $lineNum; $i++){
                $startX = mt_rand(0,$this->width/3);
                $endX = mt_rand($this->width/3*2,$this->width);
                $startY = mt_rand(0,$this->height);
                $endY = mt_rand(0,$this->height);
                imageline($this->image,$startX,$startY,$endX,$endY,$this->getColor("abc"));
            }
        }
        //输出到浏览器
        function output(){
            header("content-type:image/".$this->type.";charset=utf-8");
            $this->createCanvas();
            $this->createPix();
            $this->createLine();
            $this->setCon();
            $_SESSION["code"] = strtolower($this->strs);
            $type = "image".$this->type;
            $type($this->image);
            imagedestroy($this->image);//从内存中销毁图像
        }
    }
    /*$obj = new code();
    $obj->url = "font.ttf";
    $obj->output();*/