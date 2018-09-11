<?php
include 'bzconn.php';
$ids=explode(",", $_GET['ids']);
$firtype=$_GET['firtype'];
$sectype=$_GET['sectype'];
switch ($firtype) {
    case 1:
       $firtable="images_bz";
       $filenames='bz';
        break;
    case 2:
       $firtable="images_tx";
       $filenames='tx';
        break;
        case 3:
       $firtable="images_bq";
       $filenames='bq';
        break;
}
for($i=0;$i<count($ids)-1;$i++){
    $sql="select * from {$firtable} where id=".$ids[$i];
 $r=mysql_query($sql);
 $row=mysql_fetch_array($r);
$arr=explode("/",$row['url']);
$filename=$arr[count($arr)-1];
$url="../images/".$filenames."/".$sectype."/".$filename;
    $sql="delete from {$firtable} where id=".$ids[$i];
    if(mysql_query($sql)){
        if(unlink($url)){
          echo '';
         }else{
            echo "<script>alert('删除失败');window.location.href=document.referrer;</script>";
         }
    }else{
        echo "<script>alert('删除失败');window.location.href=document.referrer;</script>";
    }
}

