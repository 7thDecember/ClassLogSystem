<?php
$conn=mysql_connect("localhost","root","111");
if (!$conn) {
  die('连接数据库失败: ' . mysql_error());
}
mysql_query("set names utf8");
mysql_select_db("classblog",$conn);
?>
