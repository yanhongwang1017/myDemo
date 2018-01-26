<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>插入页面</title>
    <style>
        div{
            width: 800px;
            height: 500px;
            margin:100px auto;
        }
        form{
            width: 600px;
            height: 300px;
            background: #000000;
            opacity:0.7;
            padding: 100px;
            color: #ffffff;
            font-weight: 300;
        }
        input,select{
            margin-left: 20px;
            outline:none;
            margin-top: 20px;
        }
        input:last-child{
            margin-left: 0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <form action="insertcount.php" method="get">
            教师姓名:<input type="text" name="name" placeholder="请输入老师的姓名" required ><br>
            教师性别：&nbsp;&nbsp;&nbsp;男:<input type="radio" name="sex" value="男">
                      女:<input type="radio" name="sex" value="女"><br>
            教师年龄：<input type="text" name="age" placeholder="请输入教师的年龄" required><br>
            所教科目：<select name="course">
                            <option name="course" value="JavaScript" selected="selected">JavaScript</option>
                            <option name="course" value="HTML+css">HTML+css</option>
                            <option name="course" value="PHP">PHP</option>
                            <option name="course" value="jQuery">jQuery</option>
                            <option name="course" value="UI">UI</option>
                    </select><br>
            <input type="submit">
        </form>
    </div>
</body>
</html>