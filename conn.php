<?php
// 连接数据库
header("Content-type:text/html;charset=utf-8");
$dbname='kejihu';
$host='localhost';
$user='root';
$password='root';
$link=@mysql_connect($host,$user,$password);
if(!$link){
  die("错误".mysql_error($link));
}
if(!mysql_select_db($dbname,$link)){
   die("错误".mysql_error($link));
}
mysql_query("set names utf8");
?>