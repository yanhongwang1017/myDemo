<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跳转页</title>
    <style>
        .container{
            width: 300px;height:300px;position: absolute;
            left:0;right:0;bottom:0;top:0;margin:auto;
            border:1px solid #000000;
        }
        .title{
            width: 100%;height:50px;background: #c0c0c0;
            text-align: center;font-size: 20px;color:#000000;line-height: 50px;
        }
        .mess{
            text-align: center;color:#000000;font-size: 18px;line-height:230px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title"><?php echo $message;?></div>
        <div class="mess">请等待<span>3</span>秒后跳转,或点击<a href="<?php echo $url;?>">这里</a>跳转</div>
    </div>
    <script>
        let time = 3;
        setInterval(function () {
            time--;
            if(time < 0){
                location.href = "<?php echo $url;?>";
            }else{
                document.querySelector('span').innerText = time;
            }
        },1000)
    </script>
</body>
</html>

