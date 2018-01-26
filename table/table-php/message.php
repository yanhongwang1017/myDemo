<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跳转页面</title>
    <style>
        .message{
            width: 500px;
            height:500px;
            margin: 150px auto;
            border:1px solid #000000;
            text-align: center;
        }
        .message h4{
            font-size: 30px;
            font-weight: 400;
        }
        a{
            color: blue;
        }
    </style>
</head>
<body>
    <div class="message">
        <h4>提示信息</h4>
        <div class="con">请等待<span>3</span>秒后跳转到原网页，或点击<a href="index.php">这里</a>跳转</div>
    </div>
    <script>
        let span = document.querySelector("span");
        let time = 3;
        setInterval(function () {
            time--;
            if (time<0){
                location.href = 'index.php';
            }else {
                span.innerHTML = time;
            }
        },1000)
    </script>
</body>
</html>