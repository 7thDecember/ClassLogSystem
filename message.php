<?php
session_start();
if(isset($_SESSION['userName'])){
	$userName = $_SESSION['userName'];
}
else{
  echo "<script>alert('您还未登录！')</script>";}
header('Content-Type: text/html; charset=utf-8');
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Fireworks
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20090905

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>留言板</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">软工1604留言板   </a></h1>
			<p> Welcome to our class net</p>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
		<li><a href="index.php">主页</a></li>
		<li><a href="articles.php">文章</a></li>
		<li><a href="#">照片</a></li>
		<li class="current_page_item"><a href="message.php">留言板</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="contentB">
      <div class="post">
        <form action="" method="post" class="STYLE-NAME">
          <textarea id="message" name="message" placeholder="你的留言" cols="131" rows="5"></textarea>
          <input type="submit" class="button" name="fabu" value="发送" />
        </form>
			</div>';
			include_once("conn.php");
			$result = mysql_query("SELECT * FROM message");
			while($row = mysql_fetch_array($result)){
				echo '<div class="post">';
				 		echo '<p class="mtime"> '.$row['id'].'楼&nbsp;&nbsp;</p>';
						echo '<p class="message">'.$row['name'].'</p>';
						echo '<p class="name">'.$row['text'].'</p>';
	          echo '<p class="mtime"> 发表于&nbsp;&nbsp;'.$row['date'].'&nbsp;&nbsp;&nbsp;&nbsp;</p><br><br>';
				echo '</div>';
			}
		echo '

		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">
		<p>Copyright (c) 2008 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
	</div>
	<!-- end #footer -->
</body>
</html>';

include_once("conn.php");
if(isset($_POST['fabu'])) {
	$content=$_POST["message"];
	$str = str_replace("\r\n","<br/>",$content);
	$str = str_replace("  ","&nbsp;",$content);
	if($content==NULL){
		echo "<script>alert('您还没输入内容！')</script>";
	}else{
			$date=date("Y-m-d");
		  $loginSQL = "Insert into message(date,name,text)  values('$date','$userName','$str')";
		  mysql_query($loginSQL);
		  echo "<script>alert('已成功发布！')</script>";
			header("location:message.php");
	}
}
?>
