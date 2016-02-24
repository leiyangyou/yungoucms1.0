<?php
header('Content-type: text/html; charset=utf-8');
if(file_exists("ok.lock")){
	echo "程序已经安装过";
	echo "<br>";
	echo "重新安装请删除,install 文件夹下的 <font color='red'>ok.lock</font> 文件";
	exit;
}
$error = false;
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
	$path= implode("/",$path);
	
	
if(isset($_POST['startinstall'])){
	/*
	//echo "<script>javascript:history.back()</script>";
	//exit;
	//header("Location:http://".$_SERVER['HTTP_HOST']."/install");setconf.php
	
	*/
	
	if($_POST['error'] == 'yes'){
		echo "<script>alert('环境不正确,请检查！');</script>";
	}else{
		header("Location: ".$path."/setconf.php");
	}

}
//需要检测目录、文件
$check_file=array(
	'../install',
	'../install/install.sql',
	'../statics',
	'../system',
	'../system/funcs',
	'../system/caches',
	'../system/modules',
	'../system/libs',
	'../system/plugin',
);		
$error_msg=array();
foreach ($check_file as $file){
	//检测文件是否存在
	if (!file_exists($file)){
		$error_msg[]="<font color='red'>".$file.'不存在'."</font>";
		$error = 1;
		continue;
	}
	if (is_dir($file)){
		//检测目录是否可写				
		$file_test=@fopen($file.'/test.txt','w');
		if(!$file_test){
			$error_msg[] = "<font color='red'>".$file." 不可写!"."</font>";
			$error = 1;
		}else{
			$error_msg[] = "<font color='#0c0'>".$file." 目录可写!"."</font>";
		}
		@fclose($file_test);
		@unlink($file.'/test.txt');
	}else {
		//检测文件是否可写
		if (!is_writeable($file)) {
			$error_msg[] = "<font color='red'>".$file." 不可写!"."</font>";
			$error = 1;
		}else{
			$error_msg[] = "<font color='#0c0'>".$file." 文件可写!"."</font>";
		}
	}
}

		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>云购系统安装</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='images/install.css'>

</head>
<body >
<form action="" method="post">
<input name="setup" type="hidden" value="">
<div id='installbox'>
<div class='msgtitle'>云购系统 安装向导</div>
<table width="780" height="30" border="0" cellpadding="0" cellspacing="0" class="intable2">
  <tr>
    <td style="color:#f5f5f5; text-align:center">
        <span style="display:block;float:left;width:23%;font-size:12px;">1. 许可协议</span>
        <span style="display:block;float:left;width:25%;font-size:12px;color:#FFF;">2. 环境检测</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">3. 数据库设置</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">4. 安装完成</span>
    </td>
  </tr>
</table>
<h3>服务器环境检测： 支持PHP 5.2 以上版本</h3>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" class="tableoutline" style="text-align:left;font-size:12px; color:#666;">        
	
<tr bgcolor="#fdefe5">
	<td width="50%">&nbsp;&nbsp;操作系统</td>
	<td width="50%">&nbsp;&nbsp;<?php echo PHP_OS; ?></td>
</tr>
<tr bgcolor="#fdefe5">
	<td width="50%">&nbsp;&nbsp;PHP 版本</td>
	<td width="50%">&nbsp;&nbsp;<?php echo PHP_VERSION; ?></td>
</tr>
<tr bgcolor="#fdefe5">
	<td width="50%">&nbsp;&nbsp;是否支持MySQL</td>
	<td width="50%">&nbsp;&nbsp;<?php 
	
		if(function_exists('mysql_connect')){
			echo '<font color="#0c0">支持</font>';
			
		}else{
			echo '<font color="red">不支持</font>';
			$error = 1;
		}
	
	?></td>
</tr>
<tr bgcolor="#fdefe5">
	<td width="50%">&nbsp;&nbsp;是否支持gd库</td>
	<td width="50%">&nbsp;&nbsp;<?php 
	if(!function_exists("gd_info")){
		echo '<font color="red">不支持</font>';
		$error = 1;
	}else{
		echo '<font color="#0c0">支持</font>';
	}
	?></td>
</tr>
<tr bgcolor="#fdefe5">
	<td width="50%">&nbsp;&nbsp;是否支持curl</td>
	<td width="50%">&nbsp;&nbsp;<?php 
	if(function_exists("curl_getinfo")){
		echo '<font color="#0c0">支持</font>';
	}else{
		echo '<font color="red">不支持</font>';
		$error = 1;
	}
	?></td>
</tr>
</table>
<h3>目录检测：</h3>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" class="tableoutline" style="text-align:left;font-size:12px; color:#666;">        	
<tr >
	<td width="50%">&nbsp;&nbsp;目录文件检测：</td>
	<td width="50%"><?php 
foreach ($error_msg as $error_m){
			echo $error_m."<br>";
		}
	?></td>
</tr>
</table>
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" class="tableoutline" style="text-align:left;font-size:12px; color:#666;">
<tr>
	<td style="text-align:center"><input style="width:120px; height:30px;" type="button" class="btn"  value="重试" onClick="location.reload();"/></td>
	<td>
    <input type="hidden" name="error" value="<?php if($error){echo "yes";}else{echo "no";} ?>" />
  	  <input id="install" type="submit" name="startinstall" class="btn" style="width:120px;height:30px;" value="下一步">
    </td>
</tr>
</table>

<div id='msgbottom'>Powered By 云购系统</div>
</div>
</form>
</body>
</html>
		