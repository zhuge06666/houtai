<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.html");
}
?>

<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
  <button type="button" class="button border-yellow" onclick="window.location.href='add.html'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="10%">图片</th>
      <th width="15%">标题</th>
      <th width="10%">日期</th>
      <th width="10%">作者</th>
      <th width="15%">操作</th>
    </tr>


    <?php
    include 'conn.php';
    $sql="select * from tb_xcx where type=0 order by id desc";
    $r=mysql_query($sql);
    while ($row=mysql_fetch_array($r)){
      echo "<tr><td>".$row['id']."</td>
      <td><img src='images/".$row['img']."' alt='' width='120' height='100' /></td>
      <td>".$row['title']."</td>
      <td>".$row['date']."</td>
      <td>".$row['author']."</td>
      <td><div class='button-group'>
      <a class='button border-main' href='update.php?id=".$row['id']."'><span class='icon-edit'></span> 修改</a>
      <a class='button border-main' href='updateimg.php?id=".$row['id']."'><span class='icon-edit'></span> 修改图片</a>
      <a class='button border-red' href='javascript:void(0)' onclick='return del(".$row['id'].")'><span class='icon-trash-o'></span> 删除</a>
      </div></td></tr>";
    }
    ?>
  </table>
</div>
<script type="text/javascript">
function del(id){
	if(confirm("您确定要删除吗?")){
       window.location.href="delete.php?id="+id;
	}
}
</script>
</body></html>