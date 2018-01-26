<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>解决方案</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <link rel="stylesheet" href="../css/solution.css">
    <script src="../../static/js/jquery-3.2.1.min.js"></script>
    <script src="../public/js/language.js"></script>
</head>
<body>
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
    <!--导航栏-->
    <nav>
        <main>
            <div class="left_logo"><img src="../img/logo.png" alt="" /></div>
            <ul class="navi">
                <li><a href="../index.php">首页</a></li>
                <?php
                    include "../../public/db.php";
                    $sql = "select * from kind WHERE pid=0 AND ishow=1";
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while($row = $result->fetch()){
                        $cname = $row["cname"];
                        if($cname == "产品中心"){
                            $url = "product.php";
                        }elseif ($cname == "解决方案"){
                            $url = "#";
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
    <div class="bann">
        <h2>自主创新跨平台企业级解决方案</h2>
        <div class="word">
            <p>光明网曾考虑过通过原生App来实现移动化，但是由于无法复用原始业务流程和数据就放弃了，直到选用了云适配整体解决方案后，可以</p>
            <p>很方便的在Enterplorer上使用一个帐号登录我们的系统，通过VPN随时进入内网。</p>
        </div>
        <button><a href="content.php?sid=<?php echo $_GET["cid"];?>">了解更多</a></button>
    </div>
    <!--案例展示-->
    <?php
        $cid = $_GET["cid"];
        $sql = "select * from kind WHERE pid=".$cid;
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $arr = array();
        while ($row = $result->fetch()){
            $arr[] = $row;
        }
    ?>
    <section class="show">
        <main>
            <h2>解决方案案例展示</h2>
            <p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有PC版网页适配成HTML5跨屏网页，跨平台的企业统一办公 </p>
            <p>门户，快捷的移动适配开发能力，完备的数据安全保护</p>
            <ul class="pic_box">
                <li><img src="../img/solution-show-1.png" alt=""></li>
                <li><img src="../img/solution-show-2.png" alt=""></li>
                <li><img src="../img/solution-show-3.png" alt=""></li>
                <li><img src="../img/solution-show-4.png" alt=""></li>
                <li><img src="../img/solution-show-5.png" alt=""></li>
                <li><img src="../img/solution-show-6.png" alt=""></li>
            </ul>
        </main>
    </section>
    <!--o2o解决方案-->
    <section class="program">
        <main>
            <h3>O2O解决方案</h3>
            <p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有PC版网页适配成HTML5跨屏网页，跨平台的企业统一办公 </p>
            <p>门户，快捷的移动适配开发能力，完备的数据安全保护</p>
            <ul class="program_box">
                <?php
                    $sql = "select * from shows WHERE cid=".$arr[0]['cid'];
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $result->fetch()){
                ?>
                    <li>
                        <img src="../../admin/<?php echo $row['img'];?>" alt="">
                        <div class="des_boxs">
                            <h5><?php echo $row["stitle"];?></h5>
                            <?php echo $row["scon"];?>
                        </div>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </main>
    </section>
    <!--服务合作厂家-->
    <section class="serve">
        <main>
            <h2>服务合作厂家</h2>
            <p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有PC版网页适配成HTML5跨屏网页，跨平台的企业统一办公 </p>
            <p>门户，快捷的移动适配开发能力，完备的数据安全保护</p>
            <ul class="serve_box">
                <li><a href=""><img src="../img/cooperation-logo1.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo2.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo3.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo4.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo5.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo6.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo7.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo8.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo9.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo10.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo11.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo12.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo13.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo14.jpg" alt=""></a></li>
                <li><a href=""><img src="../img/cooperation-logo15.jpg" alt=""></a></li>
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
    <script>
        $('.navi>li:eq(3)').hover(
            function  () {
                $(this).children('.hideBox').stop().slideDown({height:171});
            },function(){
                $(this).children('.hideBox').stop().slideUp({height:0});
            }
        )
    </script>
</body>
</html>