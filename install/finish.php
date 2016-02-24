<?php
header('Content-type: text/html; charset=utf-8');
if(file_exists("ok.lock")){
	echo "程序已经安装过";
	echo "<br>";
	echo "重新安装请删除,install 文件夹下的 <font color='red'>ok.lock</font> 文件";
	exit;
}else{
	file_put_contents("ok.lock","ok");
}

if(!isset($_POST['edit'])){
	//echo "<script>javascript:history.back()</script>";
	//exit;
}

function safe_replace($string) {
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('%2527','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','&quot;',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace('"','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','&lt;',$string);
	$string = str_replace('>','&gt;',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	$string = str_replace('\\','',$string);
	return $string;
}

function get_web_url() {
	$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
	$php_self = $_SERVER['PHP_SELF'] ? safe_replace($_SERVER['PHP_SELF']) : safe_replace($_SERVER['SCRIPT_NAME']);
	$path_info = isset($_SERVER['PATH_INFO']) ? safe_replace($_SERVER['PATH_INFO']) : '';
	$relate_url = isset($_SERVER['REQUEST_URI']) ? safe_replace($_SERVER['REQUEST_URI']) : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.safe_replace($_SERVER['QUERY_STRING']) : $path_info);
	return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}

	$path = get_web_url();
	$path = explode("/",$path);
	array_pop($path);
	array_pop($path);
	$path= implode("/",$path);
	
	$houtai_url= $path.'?/admin/';
	$qiantai_url= $path.'?/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>云购系统安装</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='images/install.css'>

</head>
<body >
<div id='installbox'>
	<div class='msgtitle'>云购系统 安装向导</div>
<table width="780" height="30" border="0" cellpadding="0" cellspacing="0" class="intable4">
  <tr>
    <td style="color:#f5f5f5; text-align:center">
        <span style="display:block;float:left;width:23%;font-size:12px;">1. 许可协议</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">2. 环境检测</span>
        <span style="display:block;float:left;width:25%;font-size:12px;color:#FFF;">3. 数据库设置</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">4. 安装完成</span>
    </td>
  </tr>
</table>
  <div id='msgbody'>
<h3 style="text-align:center; line-height:100px;">恭喜你！云购系统 安装成功！</h3>
<div style="text-align:center; font-size:16px;font-family:'黑体';color:#f60;">现在就开始体验！</div>
<div style="margin-top:2em;align:center;width:100%;">
<table width="50%" height="80" align=center>
    <tr>
		<td align=left><input type="button" class="btn" style="width:120px;height:30px;" value="进入网站首页" onClick="location.href='<?php echo $qiantai_url; ?>'"/></td>
		<td align=right><input type="button" class="btn" style="width:120px;height:30px;" value="登陆网站后台" onClick="location.href='<?php echo $houtai_url; ?>'"/></td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr class="firstalt" style="height:10px">
		<td colspan="2" align="center"><div id='msgbottom'>Powered By 云购系统</div></td>
	</tr>
</table>
</div>
</div>
</body>
</html>
