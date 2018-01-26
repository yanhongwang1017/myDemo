<?php
    header("content-type:html/text;charset=utf-8");
    $file = $_FILES['file'];
    $size = 1024*1024*70;
    $type = array(
        "image/jpeg","image/png","image/gif"
    );
    $name = mt_rand(1,1000).'_'.$file['name'];
    if(is_uploaded_file($file['tmp_name'])){
        if(!is_dir("temp")){//判断是否存在文件夹temp
            mkdir("temp");//创建一个文件夹temp
        }
        if($file['size'] > $size){
            echo "文件大小超过限制";
            exit();
        }
        if(!in_array($file['type'],$type,false)){
            echo "文件类型不对";
            exit();
        }
        move_uploaded_file($file['tmp_name'],'temp/'.$name);
        echo 'ok';
    }


