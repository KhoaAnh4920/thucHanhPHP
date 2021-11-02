<!DOCTYPE html>
<head>
<title>Đăng nhập</title>
<?php
include('./pages/head.php')
?>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
		<form action="validationLogin.php" method="post">
			<input type="text" class="ggg" name="Email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="Password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
</div>
</div>
<!--start script-->
<?php
    include('./pages/script.php')
?>
<!--end script-->
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
