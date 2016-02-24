<?php defined('G_IN_ADMIN')or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/global.css" type="text/css">
<link rel="stylesheet" href="<?php echo G_GLOBAL_STYLE; ?>/global/css/style.css" type="text/css">
<style>
tbody tr{ line-height:30px; height:30px;} 
</style>
</head>
<body>
<div class="header lr10">
	<?php echo $this->headerment();?>
</div>
<div class="bk10"></div>
<div class="table-list lr10">
<!--start-->
  <table width="100%" cellspacing="0">
    <thead>
		<tr>
            <th width="100px" align="center">ID</th>
            <th width="100px" align="center">用户名</th>
            <th width="100px" align="center">邮箱</th>
            <th width="100px" align="center">手机</th>
            <th width="100px" align="center">账户金额</th>
            <th width="100px" align="center">邮箱认证</th>
            <th width="100px" align="center">手机认证</th>
            <th width="100px" align="center">管理</th>       
		</tr>
    </thead>
    <tbody>
    	<?php foreach($members as $v){ ?>
		<tr>
			<td align="center"><?php echo $v['uid']; ?></td>
			<td align="center"><?php echo $v['username']; ?></td>	
			<td align="center"><?php echo $v['email']; ?></td>	
			<td align="center"><?php echo $v['mobile']; ?></td>	
			<td align="center"><?php echo $v['money']; ?></td>	
			<td align="center"><?php if($v['emailcode']==1){?><span style="color:red">已认证</span><?php }else{ ?>未认证<?php } ?></td>	
			<td align="center"><?php if($v['mobilecode']==1){?><span style="color:red">已认证</span><?php }else{ ?>未认证<?php } ?></td>
            <td align="center">
				<?php if($table=='@#_member_del'): ?>
				<a href="<?php echo G_MODULE_PATH; ?>/member/huifu/<?php echo $v['uid'];?>">恢复</a>
                <span class="span_fenge lr5">|</span>
                <a href="<?php echo G_MODULE_PATH; ?>/member/del_true/<?php echo $v['uid'];?>" onclick="return confirm('是否真的删除！');">删除</a>
				<?php else: ?>
            	<a href="<?php echo G_MODULE_PATH; ?>/member/modify/<?php echo $v['uid'];?>">修改</a>
                <span class="span_fenge lr5">|</span>
                <a href="<?php echo G_MODULE_PATH; ?>/member/del/<?php echo $v['uid'];?>" onclick="return confirm('是否真的删除！');">删除</a>
				<?php endif; ?>
		   </td>            	
		</tr>
       <?php } ?>
	
  	</tbody>
	
</table>
</div><!--table-list end-->
<div id="pages"><ul><li>共 <?php echo $total; ?> 条</li><?php echo $page->show('one','li'); ?></ul></div>
<script>
</script>
</body>
</html> 