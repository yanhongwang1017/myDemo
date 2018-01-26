<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>注册</title>
        <link rel="icon" href="../img/favicon.ico">
		<link rel="stylesheet" href="../iconfont/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="../css/zhuce.css"/>
        <script src="../../static/js/jquery-3.2.1.min.js"></script>
        <script src="../../static/js/jquery.validate.min.js"></script>
        <script src="../js/zhuce.js"></script>
        <script src="../public/js/language.js"></script>
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
						<li><a href=javascript:void (0);">English</a></li>
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
				<a href="login.php">登陆</a>
			</div>
		</main>
	</header>
	<!--logo栏-->
	<section class="bigLogo">
		<main>
			<div class="midd_con">
				<div class="leftlogo"><a href="../index.php"><img src="../img/logo.png"/></a></div>
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
					<div class="linkus"><a href="contact.php">联系我们</a></div>
				</div>
			</div>
		</main>
	</section>
	<!--导航栏-->
	<nav>
		<main>
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
	<div class="regist_box">
		<form action="../php/regeit.php" method="post">
			<legend>
				注册用户
				<p>账号可以使用手机或者邮箱注册，但是仔细核对后，填入正确信息。</p>
			</legend>
			<div class="zhanghao">
				<div class="zhanhao_text">账号</div>
				<div class="shuru">
                    <input type="text"  placeholder="输入用户名（至少 6 个字符）" name="user" autocomplete="off" id="user"/>
                </div>
                <div class="error_box">
                    <label id="user-error" class="error" for="user"></label>
                </div>
			</div>
			<div class="zhanghao">
				<div class="zhanhao_text">密码</div>
                <div class="shuru">
                    <input type="password" required placeholder="密码最少6位" name="password" id="password"/>
                </div>
				<div class="error_box">
                    <label id="password-error" class="error" for="password"></label>
                </div>
			</div>
			<div class="zhanghao">
				<div class="zhanhao_text">确认密码</div>
                <div class="shuru">
                    <input type="password" required placeholder="请与上面输入的值一致" name="password2"/>
                </div>
                <div class="error_box">
                    <label id="password2-error" class="error" for="password2"></label>
                </div>
			</div>
            <div class="zhanghao">
                <div class="zhanhao_text yanzhengma">输入验证码：</div>
                <div class="shuru shuru1">
                    <input type="text" required name="code" class="code"/>
                </div>
                <iframe src="../php/code.php" frameborder="0"></iframe>
            </div>
			<input type="submit" value="注册"/>
		</form>
	</div>
	</body>
</html>
