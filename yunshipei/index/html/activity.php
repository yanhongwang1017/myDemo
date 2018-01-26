<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../../static/css/bootstrap.min.css">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../css/activity.css">
    <script src="../public/js/language.js"></script>
    <title>公司动态</title>
</head>
<body>
    <!--头部-->
    <header>
        <main>
            <div class="headleft">
                <div class="iconfont icon-iconset0403"></div>
                <div class="rightLang">
                    <div class="word_lang">Language</div>
                    <div class="sanj"></div>
                    <ul class="two_lang">
                        <li><a href="javascript:void (0);">English</a></li>
                        <li><a href="javascript:void (0);">Chinese</a></li>
                        <div class="sanjx"></div>
                    </ul>
                </div>
            </div>
            <div class="headright">
                <span>Follow us</span>
                <div class="iconfont shejiao icon-qq"></div>
                <div class="iconfont shejiao icon-shejiao"></div>
                <div class="iconfont shejiao icon-iconfont"></div>
                <div class="iconfont shejiao icon-weibo"></div>
                <div class="iconfont shejiao icon-umidd17"></div>
                <?php
                    if(!isset($_SESSION['username'])){
                        echo '<a href="login.php">登陆</a><a href="zhuce.php">注册</a>';
                    }else{
                        echo "<a href=>".$_SESSION['username']."</a><a href='../php/loginOut.php'>退出</a>";
                    }
                ?>
            </div>
        </main>
    </header>
    <?php
        include "../../public/db.php";
        $sql = "select * from kind WHERE pid=0 AND ishow=1";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
    ?>
    <nav>
        <main>
            <div class="left_logo"><img src="../img/logo.png" alt="" /></div>
            <ul class="navi">
                <li><a href="../index.php">首页</a></li>
                <?php
                    while($row = $result->fetch()){
                        $cname = $row["cname"];
                        if($cname == "产品中心"){
                            $url = "product.php";
                        }elseif ($cname == "解决方案"){
                            $url = "solution.php";
                        }elseif ($cname == "关于我们"){
                            $url = "about.php";
                        }elseif ($cname == "联系我们"){
                            $url = "contact.php";
                        }elseif ($cname == "加入我们"){
                            $url = "join.php";
                        }elseif($cname == "精彩专题"){
                            $url = "kind.php";
                        }
                    ?>
                    <li>
                        <a href="<?php echo $url;?>?cid=<?php echo $row['cid'];?>">
                            <?php echo $row['cname']; ?>
                        </a>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </main>
    </nav>
    <section class="banner"><h3>公司动态</h3></section>
    <section class="content_box container-fluid">
        <main>
            <h2>Latest News</h2>
            <?php
                $cid = $_GET["cid"];
                $sql = "select * from shows WHERE cid=".$cid;
                $result = $db->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $arr = array();
                while ($row = $result->fetchAll()){
                    $arr = $row;
                }
                echo $arr[0]["scon"];
            ?>
            <ul class="activity_box row">
                <li class="col-lg-4 col-md-4">
                    <img src="../../admin/<?php echo $arr[1]["img"];?>" alt="">
                    <span><?php echo $arr[1]["date"];?></span>
                    <?php echo $arr[1]["scon"]?>
                </li>
                <li class="col-lg-4 col-md-4">
                    <img src="../../admin/<?php echo $arr[1]["img"];?>" alt="">
                    <span><?php echo $arr[1]["date"];?></span>
                    <?php echo $arr[1]["scon"]?>
                </li>
                <li class="col-lg-4 col-md-4">
                    <img src="../../admin/<?php echo $arr[1]["img"];?>" alt="">
                    <span><?php echo $arr[1]["date"];?></span>
                    <?php echo $arr[1]["scon"]?>
                </li>
            </ul>
        </main>
    </section>
    <footer>
        <div class="foot_zhezhao">
            <main>
                <div class="aboutus">
                    <h5>关于我们</h5>
                    <span>云适配(ALLMobilize lnc)是全球领先的HTML5企业移动化解决方案供应商，由前微软美国总部IE浏览器核心研发团队成员及移动互联网行业专家在美国西雅图成立。</span>
                    <span>云适配跨屏云也成功应用于超过30万家企业网站，包括微软，联想等世界500强企业。</span>
                </div>
                <div class="jishuzhic">
                    <h5>产品中心</h5>
                    <ul class="product">
                        <li>Enterplore 企业浏览器</li>
                        <li>Xclode 网站跨屏云</li>
                        <li>Amaze UI 前端开发框架</li>
                        <li>Enterplore 企业浏览器</li>
                        <li>Xclode 网站跨屏云</li>
                    </ul>
                </div>
                <div class="linh_us">
                    <h5>联系详情</h5>
                    <ul class="footer_icons">
                        <li>
                            <div class="foot_icon iconfont icon-dianhua"></div>
                            <div class="foot_box">服务专线：400 069 0309</div>
                        </li>
                        <li>
                            <div class="foot_icon iconfont icon-xinfeng"></div>
                            <div class="foot_box">yunshipei.com</div>
                        </li>
                        <li>
                            <div class="foot_icon iconfont icon-dingwei"></div>
                            <div class="foot_box">山西省太原市小店区科技大厦</div>
                        </li>
                    </ul>
                </div>
            </main>
        </div>
    </footer>
</body>
</html>