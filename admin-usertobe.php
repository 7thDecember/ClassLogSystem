<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_GET["id"])){
  $id=$_GET['id'];
  $op=$_GET['op'];
  include_once("conn.php");
  if($op=="delete"){
     $result = mysql_query("DELETE FROM user_to_be where id='$id'");
    echo "<script>alert('已拒绝！')</script>";}
  if($op=="permit"){
    $result = mysql_query("SELECT * FROM user_to_be where id='$id'");
    $row = mysql_fetch_array($result);
    $name=$row['name'];
    $password=$row['password'];
    $result = mysql_query("Insert into user(name,password)  values('$name','$password')");
    echo "<script>alert('已同意！')</script>";}
}
header('Content-Type: text/html; charset=utf-8');
echo '
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台新用户申请管理</title>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">新用户管理</span></div>
        </div>
        <div class="search-wrap">
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量同意</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"></th>
                            <th>新用户编号</th>
                            <th>用户姓名</th>
                            <th>操作</th>
                        </tr>';

                        include_once("conn.php");
                        $result = mysql_query("SELECT * FROM user_to_be");
                        while($row = mysql_fetch_array($result)){
                          echo "<tr>";
                          echo '<td class="tc"><input name="id[]" value="" type="checkbox"></td>';
                          echo "<td>" . $row['id'] . "</td>";
                          echo "<td>" . $row['name'] . "</td>";
                          echo "<td>
                              <a class='ink-del' href='admin-usertobe.php?id=".$row['id']."&op=delete'>拒绝 &nbsp;&nbsp;</a>
                              <a class='ink-update' href='admin-usertobe.php?id=".$row['id']."&op=permit'>同意</a>
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
