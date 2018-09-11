<?php
include 'conn.php';
$id=$_GET['id'];
$title=$_POST['title'];
$type=$_POST['cid'];
$content=$_POST['content'];
$date=$_POST['date'];
$author=$_POST['author'];
$sectype=$_POST['sectype'];
$sql="UPDATE `tb_xcx` SET `title`='$title',`author`='$author',`date`='$date',`content`='$content',`type`='$type',`secoundtype`='$sectype' WHERE id=$id";
if(mysql_query($sql)){
           echo "编辑成功";

        }else{
           echo "编辑失败";
        }
