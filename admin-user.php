<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_GET["id"])){
  $id=$_GET['id'];
  $op=$_GET['op'];
  include_once("conn.php");
  if($op=="delete"){
     $result = mysql_query("DELETE FROM user where id='$id'");
      echo "<script>alert('删除成功')</script>";}
  if($op=="reset"){
      $result = mysql_query("UPDATE user SET password = '123456' WHERE id='$id' ");
      echo "<script>alert('重置成功')</script>";}

}
header('Content-Type: text/html; charset=utf-8');
echo '
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台用户管理</title>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="" method="post">
                    <table class="search-tab">
                        <tr>
                          <th width="70">用户姓名:</th>
                          <td><input class="common-text" placeholder="用户姓名" name="keywords" value="" id="" type="text"></td>
                          <td><input class="btn btn-primary btn2" name="search" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="addUsers.html"><i class="icon-font"></i>新增用户</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"></th>
                            <th>用户编号</th>
                            <th>用户姓名</th>
                            <th>操作</th>
                        </tr>';
                        include_once("conn.php");
                        if(isset($_POST['search'])){
                          $keywords=$_POST['keywords'];
                          $result = mysql_query("SELECT * FROM  user where name ='$keywords'");
                        }else{
                        $result = mysql_query("SELECT * FROM user");}
                        while($row = mysql_fetch_array($result)){
                          echo "<tr>";
                          echo '<td class="tc"><input name="id[]" value="" type="checkbox"></td>';
                          echo "<td>" . $row['id'] . "</td>";
                          echo "<td>" . $row['name'] . "</td>";
                          echo "<td>
                              <a class='ink-del' href='admin-user.php?id=".$row['id']."&op=delete'>删除</a>
                              <a class='ink-update' href='admin-user.php?id=".$row['id']."&op=reset'>重置密码</a>
                          </td>";
                          echo "</tr>";
                        }
                        echo '
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
