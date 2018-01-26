<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑页面</title>
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
    <?php
    header("content-type:text/html;charset=utf-8");
    $id = $_GET['id'];
    $db = new mysqli('localhost','yhw','123456','wuiw1703');
    $db -> query("set names utf8");
    $sql = "select * from teacher WHERE id=".$id;
    $result = $db -> query($sql);
    $row = $result -> fetch_assoc();
    ?>
    <div>
        <form action="editcount.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            教师姓名:<input type="text" name="name" required value="<?php echo $row['name']?>"><br>
            教师性别：&nbsp;&nbsp;&nbsp;
            <?php
                if($row['sex'] == "男"){
                    echo '男:<input type="radio" name="sex" value="男" checked>
                          女:<input type="radio" name="sex" value="女"><br>';

                }else{
                    echo '男:<input type="radio" name="sex" value="男">
                          女:<input type="radio" name="sex" value="女" checked><br>';
                }
            ?>
            教师年龄：<input type="text" name="age" required value="<?php echo $row['age']?>"><br>
            所教科目：
            <?php
                if($row['course'] == 'JavaScript'){
                    echo '<select name="course">
                                <option name="course" value="JavaScript" selected="selected">JavaScript</option>
                                <option name="course" value="HTML+css">HTML+css</option>
                                <option name="course" value="PHP">PHP</option>
                                <option name="course" value="jQuery">jQuery</option>
                                <option name="course" value="UI">UI</option>
                           </select><br>';
                }elseif ($row['course'] == 'HTML+css'){
                    echo '<select name="course">
                                <option name="course" value="JavaScript">JavaScript</option>
                                <option name="course" value="HTML+css" selected="selected">HTML+css</option>
                                <option name="course" value="PHP">PHP</option>
                                <option name="course" value="jQuery">jQuery</option>
                                <option name="course" value="UI">UI</option>
                           </select><br>';
                }elseif($row['course'] == 'PHP'){
                    echo '<select name="course">
                                <option name="course" value="JavaScript">JavaScript</option>
                                <option name="course" value="HTML+css">HTML+css</option>
                                <option name="course" value="PHP" selected="selected">PHP</option>
                                <option name="course" value="jQuery">jQuery</option>
                                <option name="course" value="UI">UI</option>
                           </select><br>';
                }elseif($row['course'] == 'jQuery'){
                    echo '<select name="course">
                                <option name="course" value="JavaScript">JavaScript</option>
                                <option name="course" value="HTML+css">HTML+css</option>
                                <option name="course" value="PHP">PHP</option>
                                <option name="course" value="jQuery" selected="selected">jQuery</option>
                                <option name="course" value="UI">UI</option>
                           </select><br>';
                }elseif($row['course'] == UI){
                    echo '<select name="course">
                                <option name="course" value="JavaScript">JavaScript</option>
                                <option name="course" value="HTML+css">HTML+css</option>
                                <option name="course" value="PHP">PHP</option>
                                <option name="course" value="jQuery">jQuery</option>
                                <option name="course" value="UI" selected="selected">UI</option>
                           </select><br>';
                }
            ?>
            <input type="submit" value="提交">
        </form>
    </div>
</body>
</html>




