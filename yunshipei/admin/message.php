<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>跳转页面</title>
    <style>
        .container{width: 300px;height: 300px;border:1px solid #1a1a1a;position: absolute;left:0;right:0;top:0;bottom:0;margin:auto;padding: 0;}
        .title{width: 100%;height: 50px;background: #d4d4d4;font-size: 24px;text-align: center;line-height: 50px;color:#000;}
        .text{width: 250px;height: 100px;margin-left: 25px;margin-top: 50px;font-size: 18px;}
    </style>
</head>
<body>
    <div class="container">
        <div class="title"><?php echo $message ?></div>
        <div class="text">
            页面将在<span>3</span>秒钟后跳转。若没有跳转，请点击<a href="<?php echo $url ?>">这里</a>跳转
        </div>
    </div>
    <script>
        let time = 3;
        setInterval(function () {
            time--;
            if(time < 0){
                location.href = '<?php echo $url ?>';
            }else{
                document.querySelector('span').innerText = time;
            }
        },1000);
    </script>
</body>
</html>