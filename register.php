
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
						<h3>欢迎注册</h3>
						<form action=" " name="r" method="post">
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入真实姓名">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="password1" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请再次输入密码">
							</div>
							<div class="mb"><input type="submit" name="zhuce" value="注册" ></div>
						</form>
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
if(isset($_POST['zhuce'])) {
  $userName=$_POST["name"];
	$password=$_POST["password"];
  $password1=$_POST["password1"];
	$userNameSQL = "select name from user where name = '$userName'";
  $result = mysql_query($userNameSQL);
	if($userName==NULL|$password==NULL){
		  echo "<script>alert('请输入账号密码！')</script>";
	}
  else if (mysql_num_rows($result) > 0) {
      echo "<script>alert('您已注册，请等待审批或直接登录')</script>";
  }
	else if(strlen($password)>20){
      echo "<script>alert('密码最多为20个字符')</script>";
	}
	else if($password!=$password1){
		echo "确认密码应与密码必须一致";
	}else{
		$insertSQL = "Insert into user_to_be(name,password)  values('$userName','$password');";
		mysql_query($insertSQL);
    echo "<script>alert('注册成功，请等待审批！')</script>";

	}
}


?>
