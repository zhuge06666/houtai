<!DOCTYPE html>
<html lang="zh-cn">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>科技狐管理</title>
    <meta name="keywords" content="简单,实用,网站后台,后台管理,管理系统,网站模板" />
    <meta name="description" content="简单实用网站后台管理系统网站模板下载。" />
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>
<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.html");
}
?>
<body style="background-color:#AEEEEE;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="images/huli.jpg" class="radius-circle rotate-hover" height="50" alt="" />科技狐管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp; &nbsp;&nbsp;<a class="button button-little bg-red" href="loginout.php"><span class="icon-power-off"></span> 退出登录</a> &nbsp;&nbsp; &nbsp;&nbsp;<a class="button button-little bg-blue" href="http://bj.96weixin.com/" target="_blank"><span class="icon-sign-in"></span> 编辑器</a></div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">


    <!-- <li><a href="page.html" target="right"><span class="icon-caret-right"></span>单页管理</a></li> -->
    <li><a href="https://www.kejihu.tv" target="right"><span class="icon-caret-right"></span>官网</a></li>
    <li><a href="ceping.php" target="right"><span class="icon-caret-right"></span>测评小程序</a></li>
    <li><a href="other.php" target="right"><span class="icon-caret-right"></span>其他小程序</a></li>
    <li><a href="bizhi.php" target="right"><span class="icon-caret-right"></span>壁纸管理</a></li>
    <li><a href="message.php" target="right"><span class="icon-caret-right"></span>公告通知</a></li>
    <li><a href="pass.html" target="right"><span class="icon-caret-right"></span>修改密码</a></li>

   <!--  <li><a href="book.html" target="right"><span class="icon-caret-right"></span>留言管理</a></li> -->

  </ul>
 <!--  <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
    <li><a href="list.html" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li>
  </ul> -->
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);
	  $(this).toggleClass("on");
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="https://www.kejihu.tv" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">官网</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="https://www.kejihu.tv" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>