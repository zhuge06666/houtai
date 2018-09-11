<?php
include 'bzconn.php';
$firtype=$_GET['firtype'];
$sectype=$_GET['sectype'];


switch ($firtype) {
    case 1:
       $firtype="images_bz";
        break;
    case 2:
       $firtype="images_tx";
        break;
        case 3:
       $firtype="images_bq";
        break;
}
$sql="select * from {$firtype} where type=".$sectype;
$r=mysql_query($sql);
echo '<table class="table table-hover text-center table-striped table-bordered table-hover" id="dataTables-example">
     <thead>
    <tr>
    <td  width="5%"><input type="checkbox" id="checkAll" name="checkAll">全选</td>
      <th width="5%">ID</th>
      <th width="10%">图片</th>
      <th width="10%">日期</th>
      <th width="15%">操作</th>
      </tr></thead><tbody>';
while ($row=mysql_fetch_array($r)) {
   echo "<tr>
            <td><input type='checkbox' value='".$row['id']."'/></td>
            <td>".$row['id']."</td>
            <td><img src='".$row['url']."' alt='' width='120' height='100'></td>
            <td>".$row['updateTime']."</td>
             <td><div class='button-group'>
         <a class='button border-main' href='#'><span class='icon-edit'></span> 修改</a>
         <a class='button border-red' href='javascript:void(0)' onclick='return del(".$row['id'].")'><span class='icon-trash-o'></span> 删除</a>
         </div></td>
         </tr>";
}

    echo "</tbody></table>";

