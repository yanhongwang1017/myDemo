<?php
    header("content-type:image/png;charset=utf-8");
    $image = imagecreatetruecolor(110,40);
    $background = imagecolorallocate($image,255,255,255);
    $black = imagecolorallocate($image,0,0,0);
    imagefill($image,0,0,$background);
    for($i = 0; $i < 100; $i++){
        $color = imagecolorallocate($image,mt_rand(0,220),mt_rand(0,220),mt_rand(0,220));
        imagesetpixel($image,mt_rand(0,110),mt_rand(0,40),$color);
    }
    for ($i = 0; $i < 5; $i++){
        $color = imagecolorallocate($image,mt_rand(0,220),mt_rand(0,220),mt_rand(0,220));
        imageline($image,mt_rand(0,110),mt_rand(0,40),mt_rand(0,110),mt_rand(0,40),$color);
    }
    $zhongzi = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $code = "";
    for($i = 0; $i < 4; $i++){
        $color = imagecolorallocate($image,mt_rand(0,200),mt_rand(0,200),mt_rand(0,200));
        $code = $zhongzi[mt_rand(0,strlen($zhongzi) - 1)];
        $fontsize = mt_rand(20,30);
        $angle = mt_rand(-10,10);
        $arr = imagettfbbox($fontsize,$angle,'font.ttf',$code);
        $height = $arr[1] - $arr[5];
        $arrs = imagettftext ($image,$fontsize,$angle,$i*$fontsize,$height,$color,'font.ttf',$code);
    }
    imagepng($image);