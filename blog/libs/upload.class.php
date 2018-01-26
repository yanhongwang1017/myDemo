<?php
    /*
     * 1.获取信息 $_FILES
     * 2.检测信息 is_uploaded_file  size type
     * 3.创建上传目录    mkdir(看关于文件的操作)(参数的使用方式)
     * 4.移动文件  move_uploaded_file
     * 5.输出文件存储的路径(给ajax用，ajax.response)
     * */
    class upload{
        public $size;
        public $type = "image/png;image/gif;image/jpeg";
        public $filename = 'file';
        private $data;
        public $uploadRoot = "upload";
        private $filePath;
        public $name;//文件的名字
        function __construct(){
            $this->size = 1024*1024*10;
        }
        private function accept(){
            $this->data = $_FILES[$this->filename];
        }
        private function check(){
            if(is_uploaded_file($this->data['tmp_name'])){
                $this->createDir();
            }
            if($this->data['size'] > $this->size){
                return false;
            }
            if(!strrchr($this->type,$this->data['type'])){
                return false;
            }
        }
        public function createDir(){
            //判断根目录
            if(!is_dir($this->uploadRoot)){
                mkdir($this->uploadRoot);
            }
            //判断当天的目录
            $dir = date('y-m-d');
            if(!is_dir($this->uploadRoot."/".$dir)){
                mkdir($this->uploadRoot."/".$dir);
            }
            //创建文件的名字
            $this->name = time().mt_rand(0,1000).$this->data['name'];
            //整合路径
            $this->filePath = $this->uploadRoot.'/'.$dir.'/'.$this->name;
            $this->fileMove();
        }
        public function fileMove(){
            move_uploaded_file($this->data['tmp_name'],$this->filePath);
            echo $this->filePath;
            /*$jsons = "{
                 'code': 0 ,
                 'msg':'上传失败',
                 'data':{
                    'src': $this->filePath,
                    'title':$this->name
            }";
           echo $jsons;*/
        }
        public function move(){
            //1.接收文件
            $this->accept();
            //2.检查文件
            if($this->check()){
                //创建目录
                $this->createDir();
                //移动到指定目录
                $this->fileMove();
            }
        }
    }
    /*$obj = new upload();
    $obj->move();*/