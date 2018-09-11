<?php
include 'conn.php';
$sectype = $_GET['sectype'];
if($sectype==""){
$sql="select * from tb_xcx where type=1";
}else{
$sql="select * from tb_xcx where type=1 and secoundtype='$sectype'";
}
 $r=mysql_query($sql);
 echo "<table class='table table-hover text-center' id='table'><tr>
      <th width='5%'>ID</th>
      <th width='10%'>图片</th>
      <th width='15%'>标题</th>
      <th width='10%'>日期</th>
      <th width='10%'>作者</th>
      <th width='15%'>操作</th>
    </tr>";
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
    echo "</table>";
    ?>