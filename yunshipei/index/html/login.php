<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登陆页面</title>
    <link rel="icon" href="../img/favicon.ico">
	<link rel="stylesheet" href="../iconfont/iconfont.css" />
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<div class="login_box">
		<div class="login_img"><img src="../img/logo2_03.png" alt=""></div>
		<form action="../php/login.php" class="form_box" method="post">
			<div class="denglu_box">
				<div class="iconfont icon-yonghu"></div>
				<input type="text" name="user" placeholder="输入用户名" class="login" required autocomplete="off"/><br>
                <label id="user-error" class="error" for="user"></label>
			</div>
			<div class="denglu_box">
				<div class="iconfont icon-yuechi"></div>
				<input type="password" name="password" placeholder="输入密码" class="login" required/><br>
                <label for="password" id="password-error" class="error"></label>
			</div>
            <div class="denglu_box denglu_box1">
                <div class="yanzhengma">输入验证码：</div>
                <div class="code">
                    <input type="text" required name="code" class="code" autocomplete="off"/>
                </div>
                <iframe src="../php/code.php" frameborder="0"></iframe>
            </div>
			<input type="submit" value="登陆">
            <div class="rege">
                还没有用户名？<a href="zhuce.php">去注册</a>
            </div>
		</form>
	</div>
</body>
</html>