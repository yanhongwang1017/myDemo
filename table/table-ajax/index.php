<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <script src="jquery-3.2.1.js"></script>
    <style>
        .box{
            width: 1000px;
            height: 500px;
            border:1px solid #000000;
            margin: 100px auto;
        }
        button{
            margin-left: 470px;
            margin-top: 50px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .content{
            width: 800px;
            height: 360px;
            border:1px solid #f900d0;
            margin: 0 auto;
        }
        table{
            width: 700px;
            height:auto;
            border:1px solid #000000;
            border-collapse: collapse;
            margin: auto;
            margin-top: 20px;
        }
        tr{
            text-align: center;
        }
        td,th{
            border:1px solid #000000;
        }
    </style>
</head>
<body>
    <div class="box">
        <button>点击</button>
        <div class="content">
            <table>
                <tr>
                    <td>编号</td>
                    <td>姓名</td>
                    <td>年龄</td>
                    <td>性别</td>
                    <td>课程</td>
                </tr>
            </table>
        </div>
    </div>
    <!--<script>
        $(document).ready(function () {
            $('button').click(function () {
                let ajax = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
                ajax.responseType = "json";
                ajax.onload = function () {
                    let dom = ajax.response;
                    $('.content').html(dom);
                    console.log(dom);
                }
                ajax.open("post","data.php",true);
                ajax.setRequestHeader("content-Type","application/x-www-form-urlencoded");
                ajax.send();
            })
        })
    </script>-->
</body>
</html>
<script>

    ajax({
        url:"data.php",
        type:"get",
        dataType:'json',
        //data:{id:2},
        success:function (data) {
            console.log(data);
        }
    })
</script>

