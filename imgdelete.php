<?php
include 'bzconn.php';
$id=$_GET['id'];
$firtype=$_GET['firtype'];
$sectype= $_GET['sectype'];
switch ($firtype) {
    case 1:
       $firtable='images_bz';
       $filenames='bz';
        break;
        case 2:
        $firtable='images_tx';
         $filenames='tx';
        break;
        case 3:
        $firtable='images_bq';
         $filenames='bq';
        break;
}
 $sql="select * from {$firtable} where id={$id}";
 $r=mysql_query($sql);
 $row=mysql_fetch_array($r);
$arr=explode("/",$row['url']);
$filename=$arr[count($arr)-1];
$url="../images/".$filenames."/".$sectype."/".$filename;
    $sql="delete from {$firtable} where id={$id}";
    if(mysql_query($sql)){
        if(unlink($url)){
          echo "<script>alert('删除成功');window.location.href=document.referrer;</script>";
         }else{
            echo "<script>alert('删除失败');window.location.href=document.referrer;</script>";
         }
    }else{
        echo "<script>alert('删除失败');window.location.href=document.referrer;</script>";
    }



