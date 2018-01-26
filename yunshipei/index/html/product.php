<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>产品中心</title>
        <link rel="icon" href="../img/favicon.ico">
		<script src="../../static/js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/index.js" type="text/javascript" charset="utf-8"></script>
        <script src="../js/product.js"></script>
        <script src="../public/js/language.js"></script>
        <link rel="stylesheet" href="../css/animate.css">
		<link rel="stylesheet" href="../iconfont/iconfont.css" />
		<link rel="stylesheet" href="../public/css/header.css" />
		<link rel="stylesheet" href="../css/product.css"/>
        <link rel="stylesheet" href="../css/animate.css">
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
                                $url = "#";
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
        <!--banner图-->
        <section class="banner1">
            <ul class="img_box">
                <?php
                    include "../../public/db.php";
                    $cid = $_GET["cid"];
                    $sql = "select * from shows WHERE cid=$cid AND posid=1";
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $result->fetch()){
                ?>
                <li>
                    <img src="../../admin/<?php echo $row["img"];?>" alt="">
                    <div class="wordAtea">
                        <h4><?php echo $row["stitle"];?></h4>
                        <p><?php echo $row["scon"];?></p>
                    </div>
                </li>
                <?php
                    }
                ?>
            </ul>
            <ul class="btn">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </section>
        <section class="zhuce">
            <span>注册即获 Enterplorer账号，畅想不一定的移动办公时代。</span>
            <button><a href="zhuce.php">注册</a></button>
        </section>
        <!--功能特色-->
        <?php
            $sql = "select * from kind WHERE pid=".$cid;
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $arr = array();
            while($row = $result->fetch()){
               $arr[] = $row;
            }
            //var_dump($arr);
        ?>
        <section class="gongneng">
            <h2><?php echo $arr[0]["cname"];?></h2>
            <ul class="gongneng_box">
                <?php
                    $sql = "select * from shows WHERE cid=".$arr[0]["cid"];
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while($row = $result->fetch()){
                ?>
                    <li class="animated">
                        <img src="../../admin/<?php echo $row["img"];?>" alt="">
                        <h3><?php echo $row["stitle"];?></h3>
                        <?php echo $row["scon"];?>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </section>
        <!--十张图片-->
        <section class="brown">
            <h2>跨平台企业级浏览器内核</h2>
            <p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有PC版网页适配成HTML5跨屏网页，跨平台的企业统一办公 </p>
            <p>门户，快捷的移动适配开发能力，完备的数据安全保护</p>
            <ul class="product_show">
                <li>
                    <img src="../img/product_show1.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show2.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show3.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show4.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show5.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show6.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show7.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show8.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show9.jpg" alt="">
                    <div class="mask"></div>
                </li>
                <li>
                    <img src="../img/product_show10.jpg" alt="">
                    <div class="mask"></div>
                </li>
            </ul>
        </section>
        <section class="bro_neihe">
        	<main>
        		<h2>跨平台企业级浏览器内核</h2>
	        	<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有PC版网页适配成HTML5跨屏网页，跨平台的企业统一办公 门户，快</p>
	        	<p>捷的移动适配开发能力，完备的数据安全保护</p>
	        	<ul class="bro_four">
	        		<li>
	        			<div class="iconfont icon-wujiaoxing"></div>
	        			<h4>企业级浏览器内核</h4>
	        			<p>基于风靡社区的React.js封装组件沿袭</p>
	        			<p>高性能、可复用、易扩展等特性保证</p>
	        			<p>企业应用技术栈保持国际领先</p>
	        			<hr />
	        		</li>
	        		<li>
	        			<div class="iconfont icon-xin"></div>
	        			<h4>企业级浏览器内核</h4>
	        			<p>基于风靡社区的React.js封装组件沿袭</p>
	        			<p>高性能、可复用、易扩展等特性保证</p>
	        			<p>企业应用技术栈保持国际领先</p>
	        			<hr />
	        		</li>
	        		<li>
	        			<div class="iconfont icon-feiji"></div>
	        			<h4>企业级浏览器内核</h4>
	        			<p>基于风靡社区的React.js封装组件沿袭</p>
	        			<p>高性能、可复用、易扩展等特性保证</p>
	        			<p>企业应用技术栈保持国际领先</p>
	        			<hr />
	        		</li>
	        		<li>
	        			<div class="iconfont icon-zuanshi"></div>
	        			<h4>企业级浏览器内核</h4>
	        			<p>基于风靡社区的React.js封装组件沿袭</p>
	        			<p>高性能、可复用、易扩展等特性保证</p>
	        			<p>企业应用技术栈保持国际领先</p>
	        			<hr />
	        		</li>
	        	</ul>
        	</main>
        </section>
        <!--产品服务-->
        <section class="serves">
        	<h2>产品服务
        		<img src="../img/product2_service_icon1.png" alt="" />
        	</h2>
        	<div class="prod_box">
        		<ul class="pro_left">
        			<li>
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        				<img src="../img/product2_service_icon2.png" alt="" />
        			</li>
        			<li>
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        				<img src="../img/product2_service_icon4.png" alt="" />
        			</li>
        			<li>
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        				<img src="../img/product2_service_icon3.png" alt="" />
        			</li>
        			<li>
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        				<img src="../img/product2_service_icon5.png" alt="" />
        			</li>
        		</ul>
        		<div class="pro_img"><img src="../img/product2-phone.jpg" alt="" /></div>
        		<ul class="pro_right">
        			<li>
        				<img src="../img/product2_service_icon6.png" alt="" />
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        			</li>
        			<li>
        				<img src="../img/product2_service_icon7.png" alt="" />
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        			</li>
        			<li>
        				<img src="../img/product2_service_icon8.png" alt="" />
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        			</li>
        			<li>
        				<img src="../img/product2_service_icon9.png" alt="" />
        				<div class="tex_are">
        					<h3>企业级浏览器内核</h3>
        					<p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有.</p>
        				</div>
        			</li>
        		</ul>
        	</div>
        </section>
        <section class="bgimg">
            <div class="maskBox">
                <h2>统一的移动办公门户</h2>
                <p>Enterplorer提供企业级HTML5应用统一运行及管理平台，一个入口整合</p><p>所有的企业级应用</p>
                <button><a href="content.php?sid=<?php echo $_GET['cid'];?>">了解详情</a></button>
            </div>
        </section>
        <!--技术介绍-->
        <section class="jieshao">
        	<main>
	        	<h2>跨平台企业级浏览器内核</h2>
	            <p>全球独创专利技术：一行代码部署，帮助企业快速安全地将现有PC版网页适配成HTML5跨屏网页，跨平台的企业统一办公 </p>
	            <p>门户，快捷的移动适配开发能力，完备的数据安全保护</p>
	            <ul class="contentBox">
                    <?php
                        $sql = "select * from shows WHERE cid=".$arr[1]["cid"];
                        $result = $db->query($sql);
                        $result->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $result->fetch()){
                    ?>
                        <li>
                            <div class="pic_box">
                                <div class="pic_mask">
                                    <div class="iconfont icon-12"></div>
                                </div>
                                <img src="../../admin/<?php echo $row["img"];?>" alt="" />
                            </div>
                            <div class="word_box">
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
