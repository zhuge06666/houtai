<?php
include 'conn.php';
$title=$_POST['title'];
$type=$_POST['cid'];
$content=$_POST['content'];
$date=$_POST['date'];
$author=$_POST['author'];
$img=$_FILES["file"]["name"];
$sectype=$_POST['sectype'];
//上传图片
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
      $sql="INSERT INTO `tb_xcx`(`title`, `author`, `date`, `img`, `content`, `type`,`secoundtype`) VALUES ('$title','$author','$date','$img','$content','$type','$sectype')";
      $r=mysql_query($sql);
      if ($r) {
          echo "添加成功";
      }else{
        echo "添加失败";
      }
    }
  }
else
  {
  echo "不能上传除图片外的文件或文件太大";
  }
?>


