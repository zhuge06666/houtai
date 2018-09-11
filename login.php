<?php
include 'conn.php';
session_start();
$user=$_POST['user'];
$password=md5($_POST['password']);
$sql="select * from tb_user where user='$user' and password='$password'";
$r=mysql_query($sql);
$num=mysql_num_rows($r);

if($num==0){
    echo "用户名或密码错误,<a href='login.html'>返回</a>";
}else{
    if(isset($_REQUEST['authcode'])){
    if(strtolower($_REQUEST['authcode'])==$_SESSION['authcode']){
         $_SESSION['user']=$user;
     echo "<script>alert('登陆成功'))</script>";
     header("Location:index.php");
    }else{
        echo "验证码错误<a href='login.html'>返回</a>";
    }

}

}


