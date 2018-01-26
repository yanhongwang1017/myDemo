<?php
    session_start();
    include "../../upload/url.php";
    $_SESSION['url'] = $url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>联系我们</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <link rel="stylesheet" href="../css/contact.css">
    <script src="../public/js/language.js"></script>
    <script src="../../static/js/jquery-3.2.1.min.js"></script>
    <script src="../../static/js/jquery.validate.min.js"></script>
    <script src="../js/contact.js"></script>
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
                        <li><a href="">English</a></li>
                        <li><a href="">Chinese</a></li>
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
                            $url = "solution.php";
                        }elseif ($cname == "关于我们"){
                            $url = "about.php";
                        }elseif ($cname == "联系我们"){
                            $url = "#";
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
    <div class="bann">Contact Us</div>
    <section class="content">
        <div class="titles">
            <h4>Get In Touch!</h4>
            <p>云适配致力于为企业提供全球最先进的移动化技术帮助企业最高效安全实现生产力提升</p>
            <p>One Web，Any Device</p>
            <main>
                <div class="bigBox">
                    <ul class="left">
                        <li>
                            <div class="iconfont icon-dianhua"></div>
                            <div class="cont_item">
                                <h3>Call Us</h3>
                                <p>联系电话： <strong>400-069-0309</strong></p>
                                <p>Monday - Friday, 8am - 7pm</p>
                            </div>
                        </li>
                        <li>
                            <div class="iconfont icon-xinfeng"></div>
                            <div class="cont_item">
                                <h3>Drop a Line</h3>
                                <p>service@yunshipei.com</p>
                                <p>期待您的来信...</p>
                            </div>
                        </li>
                        <li>
                            <div class="iconfont icon-dingwei"></div>
                            <div class="cont_item">
                                <h3>Visit Us</h3>
                                <p>科技大厦二层205</p>
                                <p>太原市小店区</p>
                            </div>
                        </li>
                    </ul>
                    <div class="right">
                        <h3>Your Request</h3>
                        <form class="form-inline" action="../php/requset.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="姓名" name="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputPassword3" placeholder="email" name="email">
                            </div>
                            <div class="form-group" style="padding-bottom: 15px;">
                                <input type="tel" class="form-control"  placeholder="电话" name="tel">
                            </div>
                            <textarea placeholder="写下你想说的..." rows="5" name="text"></textarea><br>
                            <label id="text-error" class="error" for="text"></label>
                            <div class="updown">
                                <button class="btn">
                                    <div class="iconfont icon-shangchuanwenjian"></div>
                                    上传文件
                                </button>
                                <input type="file" multiple>
                                <button type="submit">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
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