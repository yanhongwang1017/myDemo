<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
    <link rel="icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="iconfont/iconfont.css"/>
	<link rel="stylesheet" href="public/css/header.css"/>
	<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/animate.css">
	<script src="../static/js/jquery-3.2.1.min.js"></script>
	<script src="js/index.js"></script>
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
                <a class="iconfont shejiao icon-qq" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=779291574&site=qq&menu=yes"></a>
				<div class="iconfont shejiao icon-shejiao"></div>
				<div class="iconfont shejiao icon-iconfont"></div>
				<div class="iconfont shejiao icon-weibo"></div>
				<div class="iconfont shejiao icon-umidd17"></div>
                <?php
                    if(!isset($_SESSION['username'])){
                        echo '<a href="html/login.php">登陆</a><a href="html/zhuce.php">注册</a>';
                    }else{
                        echo "<a href=>".$_SESSION['username']."</a><a href='php/loginOut.php'>退出</a>";
                    }
                ?>
			</div>
		</main>
	</header>
	<!--logo栏-->
	<section class="bigLogo">
		<main>
			<div class="midd_con">
				<div class="leftlogo"><img src="img/logo.png"/></div>
				<div class="logoRight">
					<div class="logo_content">
						<div class="logo_content_item">
							<div class="iconfont icon-dianhua"></div>
							<div class="iconright">
								<strong>0(885)233-5358</strong>
								<span>周一~周五,8:00-20:00</span>
							</div>
						</div>
					</div>
					<div class="logo_content">
						<div class="logo_content_item">
							<div class="iconfont icon-xinfeng"></div>
							<div class="iconright">
								<strong>cn@yunshipei.com</strong>
								<span>随时欢迎您的来信</span>
							</div>
						</div>
					</div>
					<div class="logo_content">
						<div class="logo_content_item">
							<div class="iconfont icon-dingwei"></div>
							<div class="iconright">
								<strong>科技大厦二层205</strong>
								<span>太原市小店区</span>
							</div>
						</div>
					</div>
					<div class="linkus"><a href="html/contact.php">联系我们</a></div>
				</div>
			</div>
		</main>
	</section>
	<!--导航栏-->
	<nav>
		<main>
			<ul class="navi">
                <li><a href="javascript:void(0);">首页</a></li>
                <?php
                    $cid = 25;
                    include "../public/db.php";
                    $sql = "select * from kind WHERE pid=0 AND ishow=1";
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while($row = $result->fetch()){
                        $cname = $row["cname"];
                        if($cname == "产品中心"){
                            $url = "html/product.php";
                        }elseif ($cname == "解决方案"){
                            $url = "html/solution.php";
                        }elseif ($cname == "关于我们"){
                            $url = "html/about.php";
                        }elseif ($cname == "联系我们"){
                            $url = "html/contact.php";
                        }elseif ($cname == "加入我们"){
                            $url = "html/join.php";
                        }elseif($cname == "精彩专题"){
                            $url = "html/kind.php";
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
	<ul class="banner">
        <?php
            $sql = "select * from shows WHERE cid=$cid AND posid=1";
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $result->fetch()){
        ?>
		<li>
            <img src="../admin/<?php echo $row['img'];?>" alt=""/>
            <div class="bann_zhezhao">
                <h1><?php echo $row["stitle"];?></h1>
                <span><?php echo $row["scon"];?></span>
                <button><a href="html/content.php?sid=<?php echo $row['cid'];?>">了解更多</a></button>
            </div>
        </li>
        <?php
            }
        ?>
	</ul>
	<section class="banner_bottom">
		<main>
			<ul class="bannerbtn">
				<li>
					<a href="javascript:void(0);">
						<div class="iconfont icon-iconfontcolor26"></div>
						<div class="btn_right_box">
							<strong>办公移动化</strong>
							<p>Enterploer浏览器</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<div class="iconfont icon-dengpao"></div>
						<div class="btn_right_box">
							<strong>网站移动化</strong>
							<p>Xcloud网站跨屏云</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<div class="iconfont icon-qushi"></div>
						<div class="btn_right_box">
							<strong>HTML5移动开发</strong>
							<p>Amaze UI 前端开发框架</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);">
						<div class="iconfont icon-shalou"></div>
						<div class="btn_right_box">
							<strong>How We Work</strong>
							<p>Lorem ipsum asmo dolar</p>
						</div>
					</a>
				</li>
			</ul>
		</main>
	</section>
	<!--核心优势-->
	<section class="advantage">
		<main>
			<h2>核心优势</h2>
			<span>全球领先的HTML5企业移动化解决方案供应商，由前微软美国总部ie浏览器核心研发团队成员及移动互联网行业专家在美国西雅图创立
				<br />获得了微软创投的扶持以及晨星资本，IDG资本，天创资本等国际顶级风投机构的投资
			</span>
			<ul class="advan_content">
                <?php
                    $sql = "select * from kind WHERE pid=".$cid;
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    $arr = array();
                    while ($row = $result->fetch()){
                        $arr[] = $row;
                    }
                    //var_dump($arr);
                    $sql = "select * from shows WHERE cid=".$arr[0]["cid"];
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $result->fetch()){
                ?>
                    <li class="animated">
                        <img src="../admin/<?php echo $row["img"];?>" alt="" />
                        <h3><?php echo $row["stitle"];?></h3>
                        <?php echo $row["scon"];?>
                    </li>
                <?php
                    }
                ?>
			</ul>
            <?php
                $sid = $arr[0]["cid"];
            ?>
			<div class="more"><a href="html/content.php?sid=<?php echo $sid;?>">查看更多</a></div>
		</main>
	</section>	
	<!--功能特点-->
	<section class="function">
		<main>
			<h2>功能特点</h2>
			<ul class="fun_box">
                <?php
                    $sql = "select * from shows WHERE cid=".$arr[1]["cid"];
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $result->fetch()){
                ?>
                    <li>
                        <div class="black_box">
                            <h3><?php echo $row["stitle"];?></h3>
                            <span><?php echo $row["scon"];?></span>
                        </div>
                        <div class="fun_img_box">
                            <img src="../admin/<?php echo $row['img'];?>" alt="" />
                            <h3><?php echo $row["stitle"];?></h3>
                        </div>
                    </li>
                <?php
                    }
                ?>
			</ul>
		</main>
	</section>
	<section class="menu_box">
		<main>
			<ul class="menu_list animated">
				<li>
					<div class="iconfont icon-zuanshi"></div>
					<div class="right_area">
						<h5>多层次的用户管理功能</h5>
						<span>支持用户的添加和导入，与AD可以进行紧密的整<br />合，实时同步最新的用户信息，从而方便对用户进行<br />管理。</span>
					</div>
				</li>
				<li>
					<div class="iconfont icon-anonymous-iconfont"></div>
					<div class="right_area">
						<h5>丰富的日志报表系统</h5>
						<span>提供实时监控平台，日志和报告系统，帮助管理员对<br />系统的整体情况有全面的了解。</span>
					</div>
				</li>
				<li>
					<div class="iconfont icon-peitaoziyuanfengfu"></div>
					<div class="right_area">
						<h5>丰富的应用程序管理</h5>
						<span>支持在线应用，适配应用，本地应用等等多种应用类<br />型，使用户可以最快捷的获取企业的各种应用。</span>
					</div>
				</li>
			</ul>
		</main>
		<div class="rightpic animated">
			<img src="img/promo_detailed_bg.jpg"/>
			<div class="zhezhao_box">提供设备的远程锁定。在设备出现遗失的情况下可以最大程度的保护企业的信息不被泄露。</div>
			<div class="lookmore"><a href="html/content.php">查看更多</a></div>
		</div>
	</section>
    <!--产品介绍-->
    <section class="inttt"></section>
    <section class="introduc">
        <div class="int_mask">
            <h2>专业测评</h2>
            <ul class="row">
                <?php
                    $sql = "select * from shows WHERE cid=".$arr[2]["cid"];
                    $result = $db->query($sql);
                    $result->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $result->fetch()){
                ?>
                    <li>
                        <div class="int_text_area">
                            <?php echo $row["scon"];?>
                            <div class="iconfont icon-yinhao"></div>
                        </div>
                        <p class="author">
                            John Doe, CEO
                            <a href="#">FREEHTML5.co</a>
                            <span>Creative Director</span>
                        </p>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </section>
	<!--我们的服务-->
	<section class="serve">
		<main>
			<h2>我们的服务</h2>
			<span>全球领先的HTML5企业移动化解决方案供应商，由前微软美国总部ie浏览器核心研发团队成员及移动互联网行业专家在美国西雅图创立
				<br />获得了微软创投的扶持以及晨星资本，IDG资本，天创资本等国际顶级风投机构的投资
			</span>
			<ul class="serve_list">
				<li>
					<div class="iconfont listicon icon-zuanshi"></div>
					<h6>多页面工作</h6>
					<span>标签栏可切换，不比为了新内容<br/>而被迫跳转界面，多项工作内容<br/>并行处理</span>
					<a href="html/solution.php">Learn More</a>
				</li>
				<li>
					<div class="iconfont listicon icon-renwu"></div>
					<h6>统一入口</h6>
					<span>集成企业内网所有资源，OA，<br />CRM，ERP，邮件系统，单击登<br />录，无需重复输入密码</span>
					<a href="html/solution.php">Learn More</a>
				</li>
				<li>
					<div class="iconfont listicon icon-yusan"></div>
					<h6>一键直达</h6>
					<span>办公流程太多，搜索框输入(或<br />语音输入)，可以快速找到核心<br />内容</span>
					<a href="html/solution.php">Learn More</a>
				</li>
				<li>
					<div class="iconfont listicon icon-gongwenbao"></div>
					<h6>语音助手</h6>
					<span>不方便打字时，可以直接用语音<br />输入相要的内容，使您的双手地<br />到解放</span>
					<a href="html/solution.php">Learn More</a>
				</li>
			</ul>
		</main>
	</section>
	<!--期待您的加入-->
	<section class="join">
		<div class="join_zhezhao">
			<h1>期待您的加入</h1>
			<span>我们刚刚成立，正在用自己的技术一点点的改变世界。<br />我们开创了开源HTML5跨屏前端框架，可见即可得的IDE，无障碍网页我们是独一无二的<br />云适配技术，我们的目标是打造极致的网络体验。</span>
			<div class="join_more"><a href="html/join.php?cid=17">More</a></div>
		</div>
	</section>
	<!--合作伙伴-->
	<section class="patener">
		<main>
			<ul class="pater_box">
				<li><img src="img/customer_logo_Microsoft.png" path="img/customer_logo_Microsoft_active.png" empty=""/></li>
				<li><img src="img/customer_logo_qhdx.png" path="img/customer_logo_qhdx_active.png" empty=""/></li>
				<li><img src="img/customer_logo_gmw.png" path="img/customer_logo_gmw_active.png" empty=""/></li>
				<li><img src="img/customer_logo_gov.png" path="img/customer_logo_gov_active.png" empty=""/></li>
				<li><img src="img/customer_logo_jl.png" path="img/customer_logo_jl_active.png" empty=""/></li>
				<li><img src="img/customer_logo_hx.png" path="img/customer_logo_hx_active.png" empty=""/></li>
				
			</ul>
		</main>
	</section>
	<!--联系-->
	<section class="tel_mail">
		<main>
			<ul class="tel_mail_box">
				<li>
					<div class="iconfont listicon icon-dianhua"></div>
					<h5>Contact Us</h5>
					<p>Feel free to call us on</p>
					<h6>0(885)233-5358</h6>
					<p>Monday - Friday,8am - 7pm</p>
					<div class="order"><a href="">Order a Call Back</a></div>
				</li>
				<li>
					<div class="iconfont listicon icon-xinfeng"></div>
					<h5>Our Email</h5>
					<p>Drop us a line anytime at</p>
					<h6>info@financed.com</h6>
					<p>and we＇ll get back soon.</p>
					<div class="order"><a href="">Start Writing</a></div>
				</li>
				<li>
					<div class="iconfont listicon icon-dingwei"></div>
					<h5>Our Address</h5>
					<p>Come visit us at</p>
					<h6>Stock Building,Taiyuan</h6>
					<p>TY 86247</p>
					<div class="order"><a href="">See the Map</a></div>
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