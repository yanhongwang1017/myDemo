<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>加入我们</title>
        <link rel="icon" href="../img/favicon.ico">
		<link rel="stylesheet" href="../public/css/header.css" />
		<link rel="stylesheet" type="text/css" href="../css/join.css"/>
		<link rel="stylesheet" href="../iconfont/iconfont.css" />
        <script src="../public/js/language.js"></script>
        <script src="../../static/js/jquery-3.2.1.min.js"></script>
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
                                $url = "#";
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
		<section class="title">加入我们</section>
		<section class="youshi">
			<main>
				<h2>我们的优势</h2>
				<p>我们开创了中国首个开源HTML5跨屏前端框架、可见即可得的IDE、无障碍网页我们是全球独一无二的 </p>
				<p>云适配技术，我们的目标是打造极致的网页体验。</p>
				<div class="zhu">
					<div class="left">
						<h5>Why Work For Us?</h5>
                        <ul class="lists">
                            <li>
                                <div class="iconfont icon-zuanshi"></div>
                                <h3>我们的团队</h3>
                                <p>成员既有超级学霸（来自Harvard、
                                    Google、香港科技大学、中国科技大
                                    学），也有来自行业的技术大拿。</p>
                                <a href="">Learn More</a>
                            </li>
                            <li>
                                <div class="iconfont icon-yuechi"></div>
                                <h3>我们的装备和趴体</h3>
                                <p>顶配iMac、MacBook Pro、MacBook Air 3台瑞士Air空气净化器，
                                    PM2.5常年低于50,大趴每月一次，周三享用不尽的免费零食、饮料、水果</p>
                                <a href="">Learn More</a>
                            </li>
                            <li>
                                <div class="iconfont icon-feiji"></div>
                                <h3>我们的队友</h3>
                                <p>充满热情的队友，也是一起撸串、篮球、足球、动感单车、甚至桌上足球组队互虐的好基友</p>
                                <a href="">Learn More</a>
                            </li>
                        </ul>
					</div>
                    <div class="right">
                        <h5>What Work For Us?</h5>
                        <div class="big_box">
                            <div class="head_title">
                                <div class="blue_box"></div>
                                <h5>高级产品经理</h5>
                            </div>
                            <div class="cont_box" style="display: block;">
                                <div class="cont_main">
                                    <h5>职位描述：</h5>
                                    <p>熟练应用各种市场分析工具及产品原型工具，能够撰写和输出规范的产品白皮书；</p>
                                    <p>有产品策划和产品管理思维，能够撰写市场调研、市场分析、可行性分析报告等；</p>
                                    <p>具备良好的沟通协调能力、系统性思维和创新意识；</p>
                                    <p>具有产品需求、归纳能力、市场敏觉洞察能力；</p>
                                    <p>经历过完整的企业级应用产品生命周期；</p>
                                    <p>有TOB企业5年以上产品经理工作经验；</p>
                                    <p>有前端相关技术背景，具有产品架构师能力者优先考虑。</p>
                                    <h5>请将您的简历发送至：<a href=""> jobs@yunshipei.com</a></h5>
                                </div>
                            </div>

                            <div class="head_title">
                                <div class="blue_box"></div>
                                <h5>Android开发工程师</h5>
                            </div>
                            <div class="cont_box">
                                <div class="cont_main">
                                    <h5>1-3年Android开发实际工作经验；</h5>
                                    <p>拥有良好的代码规范,熟悉TCP/IP，HTTP等网络协议；</p>
                                    <p>了解进程/多线程编程；</p>
                                    <p>深入了解html及http协议；</p>
                                    <p>有良好的学习能力，有一定软件架构的思考能力。</p>
                                    <h5>请将您的简历发送至：<a href=""> jobs@yunshipei.com</a></h5>
                                </div>
                            </div>

                            <div class="head_title">
                                <div class="blue_box"></div>
                                <h5>iOS开发工程师</h5>
                            </div>
                            <div class="cont_box">
                                <div class="cont_main">
                                    <h5>有iOS开发项目经验；</h5>
                                    <p>拥有文档能力、有进程/多线程编程经验；</p>
                                    <p>拥有良好的代码规范，熟悉TCP/IP，HTTP等网络协议；</p>
                                    <p>能够对iOS手机不同分辨率、不同屏幕大小的界面进行适配；</p>
                                    <p>有iOS底层开发经验；</p>
                                    <p>熟悉html。</p>
                                    <h5>请将您的简历发送至：<a href=""> jobs@yunshipei.com</a></h5>
                                </div>
                            </div>

                            <div class="head_title">
                                <div class="blue_box"></div>
                                <h5>测试工程师</h5>
                            </div>
                            <div class="cont_box">
                                <div class="cont_main">
                                    <h5>本科以上学历，2年ToB产品测试经验；</h5>
                                    <p>掌握linux操作系统；</p>
                                    <p>了解Loadrunner、QTP等测试工具者；</p>
                                    <p>熟练搭建各种网络环境、服务器；</p>
                                    <p>有较强的逻辑思维能力和较强的团队精神。</p>
                                    <h5>请将您的简历发送至：<a href=""> jobs@yunshipei.com</a></h5>
                                </div>
                            </div>

                            <div class="head_title">
                                <div class="blue_box"></div>
                                <h5>高级前端开发工程师</h5>
                            </div>
                            <div class="cont_box">
                                <div class="cont_main">
                                    <h5>职位描述：</h5>
                                    <p>本科及以上，3-5年开发经验；</p>
                                    <p>熟练掌握JS原生代码开发，对原型编程有深入的理解；</p>
                                    <p>熟练使用过至少一种前端框架（如:Angularjs/reactjs/backbonejs/emberjs/knockoutjs）；</p>
                                    <p>熟悉模块化开发思路，实际使用过至少一种框架（如：requirejs/seajs）；</p>
                                    <h5>有下列经验者优先：</h5>
                                    <p>计算机相关专业统招本科以上学历；</p>
                                    <p>具有Nodejs后端开发经验；</p>
                                    <p>具有Nodejs后端开发经验；</p>
                                    <h5>请将您的简历发送至：<a href=""> jobs@yunshipei.com</a></h5>
                                </div>
                            </div>
                        </div>

                    </div>
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
        <script>
            $(".head_title").click(function () {
                $(this).next(".cont_box").show().siblings(".cont_box").hide();
            })
        </script>
	</body>
</html>
