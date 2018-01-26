<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="index.js"></script>
    <title>ajax上传文件</title>
    <style>
        form{width: 200px;height: 200px;  position: absolute;left:0;right:0;top:0;bottom:0;margin:auto;border:1px solid #1a1a1a;padding: 100px 100px;}
        .look{width: 150px;height: 150px;  border:1px solid #1a1a1a;margin-bottom: 5px;position: relative;}
        input{margin-bottom: 20px;}
        .progress{width: 100%;height: 10px;position: absolute;left: 0;bottom: 0;}
        .back{width: 0%;height: 100%;background: #00c304;}
        .tishi{width: 100px;height: 16px;font-size: 16px;color: #ff0000;margin-bottom: 10px;}
        .look img{width: 100%;height: 100%;}
    </style>
</head>
<body>
    <form>
        <input type="file" name="file" multiple>
        <div class="look">
            <img src="" alt="">
            <div class="progress">
                <div class="back"></div>
            </div>
        </div>
        <div class="tishi"></div>
        <input type="button" value="上传">
    </form>
</body>
</html>