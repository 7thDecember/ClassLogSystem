<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新增文章</title>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">文章管理</a><span class="crumb-step">&gt;</span><span>新增文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action=" " method="post">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="tag" id="catid" class="required">
                                    <option value="请选择">请选择</option>
                                    <option value="运动健身">运动健身</option>
                                     <option value="旅游">旅游</option>
                                    <option value="文学艺术">文学艺术</option>
                                    <option value="演讲">演讲</option>
                                    <option value="经济">经济</option>
                                    <option value="电影">电影</option>
                                    <option value="科技">科技</option>
                                    <option value="时政新闻">时政新闻</option>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>文章内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" name="content" cols="50" rows="20" style="width: 98%;"></textarea></td>
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
	$title=$_POST["title"];
  $tag=$_POST["tag"];
	$content=$_POST["content"];
  $str = str_replace("\r\n","<br/>",$content);
  $str = str_replace("  ","&nbsp;",$str);
  $str = htmlspecialchars($str);
	$date=date("Y-m-d");
  $loginSQL = "UPDATE article SET title = '$title',tag = '$tag',date = '$date',content = '$str' WHERE id='$id'";
  mysql_query($loginSQL);
  echo "<script>alert('已成功发布！')</script>";
}
?>
