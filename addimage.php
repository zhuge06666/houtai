<?php
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
$date= date("Y-m-d H:i:s");
include 'bzconn.php';
$firtype=$_POST['cid'];
if($_POST['cid']==1){
   $sectype= $_POST['sectype'][0];
   $firtable="images_bz";
   $filename="bz";
}else if($_POST['cid']==2){
   $sectype=$_POST['sectype'][1];
   $firtable="images_tx";
   $filename="tx";
}else if($_POST['cid']==3){
    $sectype=$_POST['sectype'][2];
    $firtable="images_bq";
    $filename="bq";
}
$format=array("image/jpeg","image/gif","image/png");
//批量上传文件
for($i=0,$j=count($_FILES["file"]["name"]);$i<$j;$i++){
    //被上传文件的名称
    $name=$_FILES["file"]["name"][$i];
    //被上传文件的类型
    $type=$_FILES["file"]["type"][$i];
    //被上传文件的大小，以字节计
    $size=$_FILES["file"]["size"][$i];
    //存储在服务器的文件的临时副本的名称
    $tmp_name=$_FILES["file"]["tmp_name"][$i];
    //由文件上传导致的错误代码
    $error=$_FILES["file"]["error"][$i];
    //判断文件格式
    if(!in_array($type,$format)){
        exit("无效的文件格式");
    }
    if($error>0){
        exit($error);
    }else{
        if(move_uploaded_file($tmp_name,"../images/".$filename."/".$sectype."/".$name)){
           $url="https://www.kejihu.tv/images/".$filename."/".$sectype."/".$name;
           $sql="INSERT INTO {$firtable}(`name`, `type`, `des`, `state`, `url`, `updateTime`, `downCount`, `likeCount`, `shareCount`) VALUES('',{$sectype},'','','{$url}','{$date}',0,0,0)";
           if(mysql_query($sql)){
            echo "上传成功<a href='bizhi.php'>返回</a>";
           }else{
            echo "上传失败<a href='bizhi.php'>返回</a>";
           }
        }
    }
}

