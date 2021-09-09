<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新增留言</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                      <li><a href="admin-article.php"><i class="icon-font">&#xe008;</i>文章管理</a></li>
                      <li><a href="admin-message.php"><i class="icon-font">&#xe008;</i>留言管理</a></li>
                      <li><a href="admin-user.php"><i class="icon-font">&#xe006;</i>用户管理</a></li>
                      <li><a href="admin-usertobe.php"><i class="icon-font">&#xe006;</i>新用户请求</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">留言板管理</a><span class="crumb-step">&gt;</span><span>新增留言</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action=" " method="post">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th>留言内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="50" rows="10" style="width: 98%;"></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="发布" name="fabu" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>


<?php
include_once("conn.php");
if(isset($_POST['fabu'])) {
  $content=$_POST["content"];
  $str = str_replace("\r\n","<br/>",$content);
  $str = str_replace("  ","&nbsp;",$content);
  if($content==NULL){
    echo "<script>alert('您还没输入内容！')</script>";
  }else{
  	$name="管理员";
  	$date=date("Y-m-d");
    $loginSQL = "Insert into message(date,name,text)  values('$date','$name','$str')";
    mysql_query($loginSQL);
    echo "<script>alert('已成功发布！')</script>";
  }
}
?>
