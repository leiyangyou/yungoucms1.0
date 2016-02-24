<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<style>
table th{ border-bottom:1px solid #eee; font-size:12px; font-weight:100; text-align:right; width:200px;}
table td{ padding-left:10px;}
input.button{ display:inline-block}
</style>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table_form lr10">
<!--start-->
<form name="myform" action="#" method="post">
  <table width="100%" cellspacing="0">
  	 <tr>
			<td width="120" align="right">搜索条件：
				<select name="sousuo">
					<option value="id">id</option>
					<option value="nickname" >昵称</option>
					<option value="email">邮箱</option>
					<option value="mobile">电话</option>
				</select>
			</td>
			<td width="220"><input type="text" name="content" class="input-text"></td>
			<td>		
            <input type="submit" class="button" name="submit" value="确认搜索" >
            </td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php 
		if(!empty($arr)){
		?>			
			<tr>
				<td width="100px" align="center">ID</td>
				<td width="100px" align="center">用户名</td>
				<td width="100px" align="center">邮箱</td>
				<td width="100px" align="center">手机</td>
				<td width="100px" align="center">账户金额</td>
				<td width="100px" align="center">邮箱认证</td>
				<td width="100px" align="center">手机认证</td>
				<td width="100px" align="center">管理</td>       
			</tr>

		<?php $v = $arr; ?>
			<tr>
				<td align="center"><?php echo $v['uid']; ?></td>
				<td align="center"><?php echo $v['username']; ?></td>	
				<td align="center"><?php echo $v['email']; ?></td>	
				<td align="center"><?php echo $v['mobile']; ?></td>	
				<td align="center"><?php echo $v['money']; ?></td>	
				<td align="center"><?php if($v['emailcode']==1){?><span style="color:red">已认证</span><?php }else{ ?>未认证<?php } ?></td>	
				<td align="center"><?php if($v['mobilecode']==1){?><span style="color:red">已认证</span><?php }else{ ?>未认证<?php } ?></td>
				<td align="center">
					<a href="<?php echo G_MODULE_PATH; ?>/member/modify/<?php echo $v['uid'];?>">修改</a>
					<span class="span_fenge lr5">|</span>
					<a href="<?php echo G_MODULE_PATH; ?>/member/del/<?php echo $v['uid'];?>" onclick="return confirm('是否真的删除！');">删除</a>
				</td>            	
			</tr>
		<?php } ?>
</table>
</form>
</div><!--table-list end-->
<script>
function upImage(){
	return document.getElementById('imgfield').click();
}
</script>
</body>
</html> 