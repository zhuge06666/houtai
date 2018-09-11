<?php
include 'conn.php';
$title=$_POST['title'];
$content=$_POST['content'];
$date=$_POST['date'];
$author=$_POST['author'];
      $sql="INSERT INTO `tb_message`(`title`, `author`, `date`,`content`) VALUES ('$title','$author','$date','$content')";
      $r=mysql_query($sql);
      if ($r) {
          echo "添加成功";
      }else{
        echo "添加失败";
      }
?>


