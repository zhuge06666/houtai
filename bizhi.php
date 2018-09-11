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
<button type="button" class="button border-yellow" onclick="window.location.href='addimage.html'"><span class="icon-plus-square-o"></span> 添加内容</button>
<button type="button" class="button border-yellow" id="selectdelete"><span class="icon-trash-o"></span> 删除</button>

<select name="firtype" class="input w50" id="tid" style="width:200px;">
          <option value="1">壁纸</option>
          <option value="2">头像</option>
          <option value="3">表情</option>
        </select>
         <span id="type1">
        <select name="sectype" class="input w50" id="tid1" style="width:200px;">
          <option value="0">推荐</option>
          <option value="1">自然</option>
          <option value="2">人物</option>
          <option value="3">动漫</option>
          <option value="4">创意</option>
        </select>
</span>
<span id="type2" hidden="true">
         <select name="sectype" class="input w50" id="tid2" style="width:200px;"  >
          <option value="0">推荐</option>
          <option value="1">人物</option>
          <option value="2">情侣</option>
          <option value="3">个性</option>
          <option value="4">二次元</option>
        </select>
        </span>
        <span id="type3" hidden="true">
         <select name="sectype" class="input w50" id="tid3" style="width:200px;" >
          <option value="0">推荐</option>
          <option value="1">可爱</option>
          <option value="2">呆萌</option>
          <option value="3">抖音</option>
          <option value="4">个性</option>
        </select>
        </span>


</div>
<table class="table table-hover text-center table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
 <td  width="5%"><input type='checkbox' id="checkAll" name='checkAll'>全选</td>
  <th width="5%">ID</th>
  <th width="10%">图片</th>
  <th width="10%">日期</th>
  <th width="15%">操作</th>
</tr>
</thead>
<tbody>
<?php
include 'bzconn.php';
$sql="select * from images_bz where type=0";
$r=mysql_query($sql);
while ($row=mysql_fetch_array($r)){
    ?>
 <tr>
 <td><input type="checkbox" value="<?=$row['id']?>"/></td>
     <td><?=$row['id']?></td>
     <td><img src="<?=$row['url']?>" alt="" width='120' height='100'></td>
     <td><?=$row['updateTime']?></td>
      <td><div class='button-group'>
  <a class='button border-main' href='#' onclick='return update(<?=$row['id']?>)'><span class='icon-edit'></span> 修改</a>
  <a class='button border-red' href='javascript:void(0)' onclick='return del(<?=$row['id']?>)'><span class='icon-trash-o'></span> 删除</a>
  </div></td>
  </tr>
 <?php
}
?>
</tbody>
</table>
</div>
<script src="js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="js/dataTables/jquery.dataTables.js"></script>
<script src="js/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">

$(function(){
$('#dataTables-example').dataTable({
 "bLengthChange": false,
 "searching" : false,
})
$("#tid").change(function(){
if($("#tid").val()==2){
   $("#type2").show();
   $("#type1").hide();
   $("#type3").hide();
   ajaximg(2)
}else if($("#tid").val()==1){
$("#type2").hide();
   $("#type1").show();
   $("#type3").hide();
   ajaximg(1)
}else if($("#tid").val()==3){
 $("#type2").hide();
   $("#type1").hide();
   $("#type3").show();
   ajaximg(3)
}
})
$("#tid1").change(function(){
    ajaximg(1)
})
$("#tid2").change(function(){
    ajaximg(2)
})
$("#tid3").change(function(){
    ajaximg(3)
})
$("#checkAll").click(function(){
    var userid=this.checked;
    $("input[type=checkbox]").each(function(){
        this.checked=userid;
    })
})
$("#selectdelete").click(function(){
var select=$("input[type=checkbox]");
 var selected="";
$("input[type=checkbox]:checked").each(function() {
// 遍历选中的checkbox

  selected+=this.value+",";
});
if(confirm("您确定要删除吗?")){
var firtype=$("#tid").val();
    if(firtype==1){
    sectype=$("#tid1").val();
}else if(firtype==2){
       sectype=$("#tid2").val();
}else if(firtype==3){
 sectype=$("#tid3").val();
}
$.ajax({
    type:'GET',
data:{
ids:selected,
 firtype:firtype,
sectype:sectype
},
url:'selectdelete.php',
success:function(res){
  if(res==''){
    alert('删除成功');
    window.location.reload();
  }else{
    alert('删除失败');
    window.location.reload();
  }
}
})
}
})
})
function ajaximg(id){
var sectypeid="#tid"+id
  var firtype=$("#tid").val();
  var sectype=$(sectypeid).val();
$.ajax({
type:'GET',
data:{
firtype:firtype,
sectype:sectype
},
url:'getImage.php',
success:function(res){
  $(".table").replaceWith(res);
  $('#dataTables-example').dataTable({
    "bLengthChange": false,
    "searching" : false
  });
   $("#checkAll").click(function(){
    var userid=this.checked;
    $("input[type=checkbox]").each(function(){
        this.checked=userid;
    })
})
 }
 })
}
function update(id){
    var firtype=$("#tid").val();
    if(firtype==1){
    sectype=$("#tid1").val();
}else if(firtype==2){
       sectype=$("#tid2").val();
}else if(firtype==3){
 sectype=$("#tid3").val();
}
    window.location.href="updatebizhi.php?id="+id+"&&firtype="+firtype+"&&sectype="+sectype;
}
function del(id){
if(confirm("您确定要删除吗?")){
   var firtype=$("#tid").val();
    if(firtype==1){
    sectype=$("#tid1").val();
}else if(firtype==2){
       sectype=$("#tid2").val();
}else if(firtype==3){
 sectype=$("#tid3").val();
}
    window.location.href="imgdelete.php?id="+id+"&&firtype="+firtype+"&&sectype="+sectype;
}
}
</script>
</body></html>