<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<script src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div class="header-title lr10">
	<b>短信接口设置</b><span style=" padding-left:30px;"><?php echo $text; ?></span>
	<span class="lr10"> | </span>
	<b><a href="<?php echo G_MODULE_PATH; ?>/template/mobile_temp">短信发送模板配置</a><b>
</div>
<div class="bk10"></div>
<div class="table_form lr10">
<form action="" method="post" id="myform">
<table width="100%" class="lr10">
    <tr>
    	<td width="100">短信接口mid：</td> 
   		<td><input type="text" name="mid" class="input-text wid200"  value="<?php echo $mobile['mid']; ?>"></td>
    </tr>
    <tr>
    	<td width="100">短信接口pass：</td> 
   		<td><input type="password" name="mpass" class="input-text wid200"  value="<?php echo $mobile['mpass']; ?>">
		如要修改密码请点 <a href="http://self.zucp.net/default.htm">修改密码</a></td>
    </tr>
	<tr>
    	<td width="100">短信签名：</td>
   		<td><input type="text" name="mqianming" class="input-text wid200"  value="<?php echo $mobile['mqianming']; ?>">
		 请在联系云购官方获取! 格式为: 【<font color="red">你的签名</font>】
		</td>
    </tr>
	 <tr>
	 <td>测试短信：</td>
	 <td>
     <input type="text" id="ceshi" class="input-text" size="30" value="输入测试手机号码..."/>
     <input type="button" value=" 测试短信 " onClick="sendmobile();" class="button">
     </td>
      <tr>
    	<td width="100"></td> 
   		<td> <input type="submit" value=" 提交 " name="dosubmit" class="button"></td>
    </tr>
</table>
</form>
</div><!--table-list end-->
<script>
function sendmobile(){
	var dizhi=document.getElementById('ceshi').value;
	$.post("<?php echo G_MODULE_PATH; ?>/setting/mobile/cesi/"+dizhi,function(data){
		alert(data);
	});	
}
</script>
</body>
</html> 