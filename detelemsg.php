<?php
include 'conn.php';
$id=$_GET['id'];
$sql="DELETE FROM `tb_message` WHERE id='$id'";
$r=mysql_query($sql);
if($r){
    echo "<script>alert('删除成功');window.location.href=document.referrer;</script>";
}else {
    echo "<script>alert('删除失败');window.location.href=document.referrer;</script>";
}