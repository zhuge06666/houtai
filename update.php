<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.html");
}
?>

<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>编辑内容</strong></div>
  <div class="body-content">
  <?php
   include 'conn.php';
    $id=$_GET['id'];
     $sql="select * from tb_xcx where id='$id'";
     $r=mysql_query($sql);
     while ($row=mysql_fetch_array($r)) {

         echo "<form method='post' class='form-x' action='updatehandle.php?id=".$id."' enctype='multipart/form-data'>

      <div class='form-group'>
        <div class='label'>
          <label>标题：</label>
        </div>
        <div class='field'>
          <input type='text' class='input w50' value='".$row['title']."' name='title' data-validate='required:请输入标题' />
          <div class='tips'></div>
        </div>
      </div>
        <div class='form-group'>
          <div class='label'>
            <label>分类标题：</label>
          </div>
          <div class='field'>
            <select name='cid' class='input w50' id='type'>";
               if($row['type']==0){
                 echo "<option value=''>请选择分类</option>
              <option value='0' selected='selected'>测评小程序</option>
              <option value='1'>其他小程序</option>";
               }else{
             echo "<option value=''>请选择分类</option>
              <option value='0'>测评小程序</option>
              <option value='1' selected='selected'>其他小程序</option>";
              }

            echo "</select>
            <div class='tips'></div>
          </div>
        </div>
 <div class='form-group xcxtype' hidden='true'>
          <div class='label'>
            <label>类型:</label>
          </div>
          <div class='field'>
            <select name='sectype' class='input w50' id='tid'>
              <option value=''>请选择分类</option>
              <option value='1'>游戏</option>
              <option value='2'>视频</option>
              <option value='3'>社交</option>
              <option value='4'>旅游</option>
              <option value='5'>出行</option>
              <option value='6'>生活</option>
              <option value='7'>购物</option>
              <option value='8'>教育</option>
              <option value='9'>办公</option>
              <option value='10'>音乐</option>
              <option value='11'>工具</option>
              <option value='12'>阅读</option>
            </select>
            <div class='tips'></div>
          </div>
        </div>

      <div class='form-group'>
        <div class='label'>
          <label>内容：</label>
        </div>
        <div class='field'>
          <textarea name='content' class='input' style='height:450px; border:1px solid #ddd;'>".$row['content']."</textarea>
          <div class='tips'></div>
        </div>
      </div>


      <div class='form-group'>
        <div class='label'>
          <label>发布时间：</label>
        </div>
        <div class='field'>
          <input type='text' class='laydate-icon input w50' name='date' value='".$row['date']."'  data-validate='required:日期不能为空' style='padding:10px!important; height:auto!important;border:1px solid #ddd!important;' />
          <div class='tips'></div>
        </div>
      </div>
      <div class='form-group'>
        <div class='label'>
          <label>作者：</label>
        </div>
        <div class='field'>
          <input type='text' class='input w50' name='author' value='".$row['author']."'  />
          <div class='tips'></div>
        </div>
      </div>
      <div class='form-group'>
        <div class='label'>
          <label></label>
        </div>
        <div class='field'>
          <button class='button bg-main icon-check-square-o' type='submit'> 提交</button>
        </div>
      </div>
    </form>";


 }
  ?>
  </div>
</div>
<script type="text/javascript">
  $(function(){
   $("#type").change(function(event) {
      if($("#type").val()==1){
          $(".xcxtype").show();
      }else{
        $(".xcxtype").hide();
      }
   });
  });
</script>
</body></html>
