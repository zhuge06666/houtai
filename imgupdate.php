<?php
include 'conn.php';
$id=$_GET['id'];
$img=$_FILES["file"]["name"];
if ((($_FILES["file"]["type"]=="image/png")
|| ($_FILES["file"]["type"]=="image/jpeg")
|| ($_FILES["file"]["type"]=="image/pjpeg"))
&& ($_FILES["file"]["size"]<20000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }else{
    if (file_exists("images/" . $_FILES["file"]["name"]))
      {
      // echo $_FILES["file"]["name"] . " 已经保存. ";
      }else{
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
      // echo "存入: " . "images/" . $_FILES["file"]["name"];
      }
      $sql="UPDATE `tb_xcx` SET `img`='$img' WHERE id=$id";
      if (mysql_query($sql)) {
          echo "修改图片成功<a href='ceping.php'>返回</a>";
      }else{
        echo "修改图片失败<a href='ceping.php'>返回</a>";
      }
    }
  }
else
  {
  echo "不能上传除图片外的文件或文件太大";
  }
