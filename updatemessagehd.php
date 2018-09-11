<?php
include 'conn.php';
$id=$_GET['id'];
$title=$_POST['title'];
$content=$_POST['content'];
$date=$_POST['date'];
$author=$_POST['author'];
$sql="UPDATE `tb_message` SET `title`='$title',`author`='$author',`date`='$date',`content`='$content' WHERE id=$id";
if(mysql_query($sql)){
           echo "编辑成功";
        }else{
           echo "编辑失败";
        }
