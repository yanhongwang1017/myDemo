<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻中心</title>
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <link rel="stylesheet" href="../css/news.css">
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
    <div class="bann">News</div>

    <section class="content">
        <main>
            <div class="left_con">
                <h1>云适配企业浏览器获首批"移动信息化可信"认证</h1>
                <ul class="metaa">
                    <li>
                        <div class="iconfont icon-rili"></div>
                        <i>October 10, 2016</i>
                    </li>
                    <li>
                        <div class="iconfont icon-yonghu1"></div>
                        <i>by张三</i>
                    </li>
                    <li>
                        <div class="iconfont icon-pinglun-copy"></div>
                        <i>评论</i>
                    </li>
                </ul>
                <div class="con-text">
                    <p>7月19日，云适配（美通云动（北京）科技有限公司）今日宣布，由中国通信标准化协会管理，工业和信息化部业务指导下
                        的数据中心联盟与移动智能终端技术创新与产业联盟发起的移动信息化可信选型认证（第一批）评选中，云适配两大产品Enterplorer企业浏览器、
                        Enterplorer Studio开发工具，通过了移动企业应用平台的认证，成为“第一批”获得移动信息化可信选型认证的两大产品。
                        该结果已于今天上午在北京召开“2016移动智能终端峰会新闻发布会暨移动信息化可信选型认证结果发布会”上进行了通报。</p>
                    <img src="../img/post01.jpg" alt="">
                </div>
                <div class="con-text">
                    <p>据了解，移动信息化可信选型认证是由工业和信息化部指导，数据中心联盟组织，中国信息通信研究院测试评估面向移动办公、移动应用、移动开发等领域新发起的一个评估认证，是目前国内唯一针对移动信息化选型可信性的权威认证体系，
                        为用户选择可信赖的移动信息化解决方案提供了很好的依据。它是继数据中心联盟推出可信云认证之后，在移动办公、移动信息化领域开辟的又一个权威认证。</p>
                    <img src="../img/post02.jpg" alt="">
                </div>
                <p class="other">据了解，云适配企业级浏览器Enterplorer，融合了HTML5标准以及双渲染引擎技术，在“NO APP、NO API”的前提下，摒弃了企业在移动化过程中开发多个原生APP的传统方式，帮助企业在一周之内开始移动办公模式。</p>
                <p class="other">Enterplorer Studio是一套面向企业级移动信息化建设的开发平台。集聚开发、测试、打包、发布于一体的移动化开发综合平台。用户无需更改任何原有系统后台流程逻辑，无需为移动应用单独开发后台，实现对原有业务系统的零依赖。开发者无需经过复杂的编程，开发平台集成丰富的组件库，通过组件拖拽方式即可帮助企业将复杂的业务系统高效快速的适配到移动终端，极大减小了企业办公系统移动化的难度，加快企业办公移动化的脚步。</p>
                <p class="other">云适配创始人兼CEO陈本峰表示：“移动化已经成为企业发展的标配，随着移动技术的深入发展，国家和企业对移动化服务的安全和可靠性的重视程度在不断加深，这也是移动信息化可信选型认证出台的最关键的原因。云适配凭借全球领先的移动化技术和专业的安全能力与经验，将HTML5技术最高效的应用在了企业移动化进程中。未来，云适配将继续发挥在浏览器和HTML5技术方面的领先优势，为用户提供安全的、高效的企业移动化服务”。</p>
            </div>
            <ul class="right_con">
                <li>
                    <div class="iconfont icon-xinxi1"></div>
                    <h3>最新资讯</h3>
                    <dl>
                        <dt><a href="javascript:void(0);">公司报道</a></dt>
                        <dt><a href="javascript:void(0);">行业资讯</a></dt>
                        <dt><a href="javascript:void(0);">云适配观点</a></dt>
                    </dl>
                </li>
                <li>
                    <div class="iconfont icon-xinxi"></div>
                    <h3>热门动态</h3>
                    <dl>
                        <dt><a href="javascript:void(0);">科大讯飞严峻：借力HTML5 推进“智能语音技术”应用普及</a></dt>
                        <dt><a href="javascript:void(0);">金山万勇：打破信息孤岛 HTML5优势凸显将成核心</a></dt>
                        <dt><a href="javascript:void(0);">阿里吴志华：基于HTML5技术开发Native体验应用</a></dt>
                    </dl>
                </li>
                <li>
                    <div class="iconfont icon-wifi"></div>
                    <h3>站内公告</h3>
                    <dl>
                        <dt>
                            <a href="javascript:void(0);">今天的应用号只是用了HTML技术中无需下载安装、跨平台的功能， 并没有用到HTML开发互联的精髓。 它只是一个...</a>
                            <span>November 10, 2015</span>
                        </dt>
                        <dt>
                            <a href="javascript:void(0);">云适配带来了一个全新的“互联网+政务”解决方案，我们可以非常好的利用你现有的IT系统，就是你还是用原来的PC网站一套系统，只要安装一下云适配的产品Xcloud网站跨屏...</a>
                            <span>November 10, 2015</span>
                        </dt>
                    </dl>
                </li>
            </ul>
            <div class="comment">
                <h2>Comments</h2>
                <form action="">
                    <div class="am-g">
                        <input type="text" placeholder="Name">
                    </div>
                    <div class="am-g">
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="am-g">
                        <input type="text" placeholder="Website URL">
                    </div>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Type in here..."></textarea><br>
                    <button type="submit">确认递交</button>
                </form>
            </div>
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