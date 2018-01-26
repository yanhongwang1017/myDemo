<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>关于我们</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <link rel="stylesheet" href="../css/about.css">
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
                            $url = "solution.php";
                        }elseif ($cname == "关于我们"){
                            $url = "#";
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
    <div class="bann">About Us</div>
    <!--云适配-->
    <section class="yunshipei">
        <main>
            <h2>云适配</h2>
            <p>全球领先HTML5企业移动化解决方案供应商，由前微软美国总部IE浏览器核心研发团队成员及移动互联网行业专家在美国西雅图创立 </p>
            <p>获得了微软创投的扶持以及晨兴资本、IDG资本、天创资本等国际顶级风投机构的投资。</p>
            <div class="am-g">
                <div class="left_text">
                    <h3>关于云适配你需要知道哪些？</h3>
                    <p>云适配(AllMobilize Inc.) 是全球领先的HTML5企业移动化解决方案供应商，由前微软美国总部IE浏览器核心研发团队成员及移动
                        互联网行业专家在美国西雅图创立，
                        并获得了微软创投的扶持以及晨兴资本、IDG资本、天创资本等国际顶级风投机构的投资。</p>
                    <p>从2012年至今，云适配的开放技术平台已经吸引了超过40万开发者加入；云适配跨屏云也成功应用于超过30万家企业网站，包括微软、联想等世界500强企业，光明网、中国青年报等知名媒体，清华、北大、中科大等知名大学，
                        以及中国政府网、中国共产党网等政府机构。2014年6月，比尔·盖茨先生访华时特地观看了云适配的技术演示，并给予高度的赞赏。</p>
                </div>
                <img src="../img/ben.jpg" alt="">
                <div class="right_text">
                    <p>国家“千人计划”特聘专家、中国企业级HTML5产业联盟主席、HTML5国际标准制定者之一、微软总部IE浏览器核心研发,成功发布了IE8、IE9、IE10,
                        参与了下一代互联网标准HTML5国际标准制定以及IE中HTML5引擎的设计。</p>
                    <div class="iconfont icon-yinhao-copy"></div>
                    <strong>陈本峰 Ben</strong>
                    <span>云适配创始人CEO</span>
                </div>
            </div>
        </main>
    </section>
    <hr>
    <!--我们的宗旨-->
    <section class="our">
        <h2>我们的宗旨</h2>
        <p>让人们无论使用任何设备都能安全高效获取信息 </p>
        <p>One Web，Any Device</p>
        <main>
            <ul class="four_img">
                <li>
                    <img src="../img/f01.jpg" alt="">
                    <h3>品质</h3>
                    <p>全球领先的HTML5解决方案供应商，安全高效解决企业移动化</p>
                    <dl>
                        <dt><div class="iconfont icon-jiantou"></div>快捷的移动适配开发</dt>
                        <dt><div class="iconfont icon-jiantou"></div>统一的办公通讯门户</dt>
                        <dt><div class="iconfont icon-jiantou"></div>完善的安全管理平台</dt>
                    </dl>
                </li>
                <li>
                    <img src="../img/f02.jpg" alt="">
                    <h3>责任</h3>
                    <p>国产最流行的开源HTML5前端框架，组件丰富，为HTML5开发加速</p>
                    <dl>
                        <dt><div class="iconfont icon-jiantou"></div>持续改进</dt>
                        <dt><div class="iconfont icon-jiantou"></div>追求卓越品质</dt>
                        <dt><div class="iconfont icon-jiantou"></div>为顾客创造价值</dt>
                    </dl>
                </li>
                <li>
                    <img src="../img/f03.jpg" alt="">
                    <h3>诚信</h3>
                    <p>全球领先的HTML5解决方案供应商，安全高效解决企业移动化</p>
                    <dl>
                        <dt><div class="iconfont icon-jiantou"></div>平等包容</dt>
                        <dt><div class="iconfont icon-jiantou"></div>互利共赢</dt>
                        <dt><div class="iconfont icon-jiantou"></div>与事业伙伴同成长</dt>
                    </dl>
                </li>
                <li>
                    <img src="../img/f04.jpg" alt="">
                    <h3>责任</h3>
                    <p>全球领先的HTML5解决方案供应商，安全高效解决企业移动化</p>
                    <dl>
                        <dt><div class="iconfont icon-jiantou"></div>快捷的移动适配开发</dt>
                        <dt><div class="iconfont icon-jiantou"></div>统一的办公通讯门户</dt>
                        <dt><div class="iconfont icon-jiantou"></div>完善的安全管理平台</dt>
                    </dl>
                </li>
            </ul>
        </main>
    </section>
    <!--我们的团队-->
    <section class="team">
        <main>
            <h2>我们的团队</h2>
            <p>成员既有超级学霸（来自Harvard、Google、香港科技大学、中国科技大学），</p>
            <p>也有来自行业的技术大拿。</p>
            <ul class="team-box">
                <li>
                    <img src="../img/001.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
                <li>
                    <img src="../img/002.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
                <li>
                    <img src="../img/003.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
                <li>
                    <img src="../img/004.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
                <li>
                    <img src="../img/005.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
                <li>
                    <img src="../img/006.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
                <li>
                    <img src="../img/007.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
                <li>
                    <img src="../img/008.jpg" alt="">
                    <div class="bottom">
                        <h3>John Holland</h3>
                        <span>Chief Executive Officer</span>
                        <span><a href="">john@financed.com</a></span>
                        <dl>
                            <dt class="iconfont shejiao icon-qq"></dt>
                            <dt class="iconfont shejiao icon-shejiao"></dt>
                            <dt class="iconfont shejiao icon-weibo"></dt>
                        </dl>

                    </div>
                </li>
            </ul>
        </main>
    </section>
    <!--客户评价-->
    <section class="pingjia">
        <main>
            <h2>客户评价</h2>
            <p>金龙集团为一家微型跨国企业，在全球有50家工厂，办公人员有近5000人，移动信息化选型之路是摸着石头过河，最终采用了云适配</p>
            <p>的整体解决方案，在移动端也有了像PC端一样的统一办公门户</p>
            <ul class="pingjia_box">
                <?php
                    $cid = $_GET["cid"];
                    $sql = "select * from kind WHERE pid=".$cid;
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $result->fetch();
                    $sql = "select * from shows WHERE cid=".$row['cid'];
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $result->fetch()){
                ?>
                    <li>
                        <?php echo $row["scon"];?>
                        <div class="user">
                            <figure><img src="../../admin/<?php echo $row["img"];?>" alt=""></figure>
                            <strong><?php echo $row["stitle"];?></strong>
                            <span><?php echo $row["author"];?></span>
                        </div>
                    </li>
                <?php
                    }
                ?>
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