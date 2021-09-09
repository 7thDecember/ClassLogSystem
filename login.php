<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>login</title>
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="css/component.css" />
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>欢迎你</h3>
						<form action=" " name="g" method="post">
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="mb"><input type="submit" name="login" value="登录" ></div>
						</form>
							<div class="mb"><a href="register.php">还未注册 >></a></div>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="js/TweenLite.min.js"></script>
		<script src="js/EasePack.min.js"></script>
		<script src="js/rAF.js"></script>
		<script src="js/demo-1.js"></script>
	</body>
</html>

<?php
include_once("conn.php");

if(isset($_POST['login'])) {
	$name=$_POST["name"];
	$password=$_POST["password"];
	$loginSQL = "select * from user where name='$name'";
	$username = mysql_query($loginSQL);
	$loginSQL = "select * from admin where name='$name'";
	$adminname = mysql_query($loginSQL);
	echo $row;
	$truepassword=$row['password'];
	if (mysql_num_rows($username)) {
			$row=mysql_fetch_assoc($username);
			$truepassword=$row['password'];
			if($truepassword!=$password){
				 	echo $truepassword;
					echo "<script>alert('密码错误')</script>";
			}
			else{
					session_start();
					$_SESSION['userName']= $name;
					header("location:index.php");

			}
	 }else if(mysql_num_rows($adminname)){
			$row=mysql_fetch_assoc($adminname);
			$truepassword=$row['password'];
			if($truepassword!=$password){
				echo "<script>alert('密码错误！')</script>";
			}else{
					header("location:admin-article.php");
			}
		}else{
				echo "<script>alert('用户不存在，请先注册！')</script>";
		}

}

?>
