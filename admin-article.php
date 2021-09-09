<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_GET["id"])){
  $id=$_GET['id'];
  include_once("conn.php");
  $result = mysql_query("DELETE FROM article where id='$id'");
  echo "<script>alert('删除成功')</script>";
}

echo '
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台文章管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
        </div>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <form action="" method="post">
                            <td>
                                <select name="keywords" id="">
                                    <option value="全部">全部</option>
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
                            <td><input class="btn btn-primary btn2" name="search" value="查询" type="submit"></td>
                            </form>
                        </tr>
                  </table>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="addArticle.html"><i class="icon-font"></i>新增文章</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"></th>
                            <th>文章编号</th>
                            <th>文章名称</th>
                            <th>标签名称</th>
                            <th>发布日期</th>
                            <th>操作</th>
                        </tr>';
                        include_once("conn.php");
                        if(isset($_POST['search'])&&$_POST['keywords']!='全部'){
                          $keywords=$_POST['keywords'];
                          $result = mysql_query("SELECT * FROM article where tag ='$keywords'");
                        }else{
                        $result = mysql_query("SELECT * FROM article");}
                        while($row = mysql_fetch_array($result)){
                          echo "<tr>";
                          echo "<td class='tc'><input name='id[]' value='' type='checkbox'></td>";
                          echo "<td>".$row['id']."</td>";
                          echo "<td>" .$row['title']. "</td>";
                          echo "<td>" .$row['tag']. "</td>";
                          echo "<td>" .$row['date']. "</td>";
                          $id=$row['id'];
                          echo "<td>
                              <a class='link-update' href='updateArticle.php?id=".$row['id']."&op=update'>修改</a>
                              <a class='ink-del' href='admin-article.php?id=".$row['id']."'>删除</a>
                                </td>";
                          echo "</tr>";
                        }
echo'
                    </table>
                    <div class="list-page">
                    2 条 1/1 页
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>';
?>
