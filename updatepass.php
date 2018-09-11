<?php
include 'conn.php';
$password=md5($_POST['mpass']);
$newpass=$_POST['newpass'];
$renewpass=$_POST['renewpass'];
$newpassword=md5($newpass);
if($newpass==$renewpass){
    $sql="select * from tb_user where password='$password' and user='admin'";
    $r=mysql_query($sql);
    $num=mysql_num_rows($r);
    if($num==0){
        echo "原密码不不正确<a href='pass.html'>返回</a>";
    }else{
        $sql1="UPDATE `tb_user` SET `password`='$newpassword' WHERE user='admin'";
        if(mysql_query($sql1)){
           echo "修改密码成功<a href='pass.html'>返回</a>";
        }else{
           echo "修改密码失败<a href='pass.html'>返回</a>";
        }
    }
}


