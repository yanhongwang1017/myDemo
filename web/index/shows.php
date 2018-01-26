<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
    <style>
        *{margin: 0;padding: 0;}
        nav{width: 800px;height: 50px;margin: 100px auto 0;display: flex;justify-content: space-around;}
        a{text-decoration: none;font-size: 20px;color: #1a1a1a;}
        .shows{width: 800px;margin: 10px auto;}
    </style>
</head>
<body>
    <?php
        $db = new PDO("mysql:host=localhost;port=3306;dbname=cms","yhw","123456");
        $db->exec("set names utf8");
        $sql = "select * from kind WHERE pid=0";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
    ?>
    <nav>
        <a href="index.php">首页</a>
        <?php
        while($row = $result->fetch()){
            if($row['state'] == 0){
                $url = 'lists.php';
            }else{
                $url = "kind.php";
            }
            ?>
            <a href="<?php echo $url; ?>?cid=<?php echo $row['cid'];?>">
                <?php echo $row['cname']; ?>
            </a>
            <?php
        }
        ?>
    </nav>
    <div class="shows">
        <?php
            $sid = $_GET["sid"];
            $sql = "select * from shows WHERE sid=".$sid;
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            echo $row["scon"];
        ?>
    </div>
</body>
</html>