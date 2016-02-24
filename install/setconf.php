<?php
header('Content-type: text/html; charset=utf-8');
set_time_limit(0);
ob_end_flush();
ob_implicit_flush(true);


if(isset($_POST['edit'])){
	$db_host = isset($_POST['db_host']) ? trim($_POST['db_host']) : '';
	$db_user = isset($_POST['db_user']) ? trim($_POST['db_user']) : '';
	$db_pwd = isset($_POST['db_pwd']) ? trim($_POST['db_pwd']) : '';
	$db_name = isset($_POST['db_name']) ? trim($_POST['db_name']) : '';
	$db_prefix = isset($_POST['db_prefix']) ? trim($_POST['db_prefix']) : '';
	$user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : '';
	$sqm_num= isset($_POST['sqm_num']) ? trim($_POST['sqm_num']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';
	$repassword = isset($_POST['repassword']) ? trim($_POST['repassword']) : '';
	$conn = mysql_connect($_POST['db_host'],$_POST['db_user'],$_POST['db_pwd']);
	$conn_db = mysql_select_db($_POST['db_name'],$conn);
	if(!$conn){
		echo "数据库主机或数据库用户名或数据库密码错误!";exit;
	}elseif(!$conn_db){
		echo '数据库名称!';exit;
	}elseif($db_name == ''){
		echo '数据库不能为空!';exit;
	}elseif($db_prefix == ''){
		echo '数据库前缀不能为空!';exit;
	}elseif(!preg_match("/^[\w_]+_$/",$db_prefix)){
		echo '数据库前缀格式错误!';exit;
	}elseif($user_name == '' || $password == ''){
		echo '登录名和密码不能为空!';exit;
	}elseif(strlen($password) < 6){
		echo '登录密码不得小于6位';exit;
	}elseif($password!=$repassword){
		echo '两次输入的密码不一致';exit;
	}
	$config_file='../system/config/database.inc.php';	
	$con ="<?php\r\n\r\n";
	$con .= "return array(\r\n";
		$con .= "\t'default' => array (\r\n\t";
			$con .= "\t'hostname' => '".$db_host."',";
			$con .= "\r\n\t\t'database' => '".$db_name."',";                
			$con .= "\r\n\t\t'username' => '".$db_user."',";
			$con .= "\r\n\t\t'password' => '".$db_pwd."',";
			$con .= "\r\n\t\t'tablepre' => '".$db_prefix."',";
			$con .= "\r\n\t\t'charset' => 'utf8',";
			$con .= "\r\n\t\t'type' => 'mysql',";
			$con .= "\r\n\t\t'debug' => true,";
			$con .= "\r\n\t\t'pconnect' => 0,";
			$con .= "\r\n\t\t'autoconnect' => 0";
		$con .= "\r\n\t),";
	$con .= "\r\n);\r\n?>";
	file_put_contents($config_file,$con);	
	
	if(!empty($sqm_num)){		
		$sqm_file='../system/config/code.inc.php';
		$sqm="<?php return array('code'=>'$sqm_num'); ?>";
		file_put_contents($sqm_file,$sqm);		
	}
	
	$conn = @mysql_connect($_POST['db_host'],$_POST['db_user'],$_POST['db_pwd']);
			 mysql_select_db($_POST['db_name'],$conn);
	mysql_query("set names utf8");
	
	$sql = file_get_contents("install.sql");
	$sql = str_replace('DROP TABLE IF EXISTS `',"DROP TABLE IF EXISTS `".$_POST['db_prefix'],$sql);
	$sql = str_replace('CREATE TABLE `',"CREATE TABLE `".$_POST['db_prefix'],$sql);
	$sql = str_replace('INSERT INTO `',"INSERT INTO `".$_POST['db_prefix'],$sql);
	$sql = str_replace('IF EXISTS `',"IF EXISTS `".$_POST['db_prefix'],$sql);
	$array_sql = preg_split("/;[\r\n]/",$sql);
	$query_sql_g=true;
	echo "<h3 style='text-align:center; line-height:50px; font-weight:bold'><font color='#0c0'>正在安装中...请不要结束本页面！</font></h3><br/>";
	echo "<div style='text-align:center;width:100%'>";

	
	if(strlen(end($array_sql)) == 2){
					array_pop($array_sql);
    }
	$ik = 0;
	foreach($array_sql as $sql){
		$sql = trim($sql);		
		if (!empty($sql) && strlen($sql) != 2){
			$query_sql = mysql_query($sql,$conn);
			if(!$query_sql){
				if($ik%9==0){
					echo "<br/>";
				}
				echo $sql."<font color='red'>SQL 执行失败！</font>";$ik++;
			}else{
				if($ik%9==0){
					echo "<br/>";
				}
				echo "【SQL执行成功!】";$ik++;
			}
		}		
	}
	
	$password=md5(trim($password));
	$sql = "INSERT INTO `".$db_prefix."admin` (uid,mid,username,userpass) VALUES ('1','0','$user_name','$password')";
	$q = mysql_query($sql,$conn);
	if(!$q){
			
		echo $sql."<font color='red'>【添加管理员失败】</font>";$ik++;
	}else{
		echo "【添加管理员成功】";$ik++;
	}
	echo "</div>";
	
	if(!$query_sql_g){
		echo "<br/><h3 style='text-align:center; line-height:50px; font-weight:bold'><font color='red'>数据库安装失败,请清空数据库后重新安装！</font></h3><br/>";
	}else{
		echo "<br/><h3 style='text-align:center; line-height:50px; font-weight:bold'><a style='color:#f60' href='finish.php'>安装完成，点击进入！</a></h3><br/>";
	}
	exit;
}

if(file_exists("ok.lock")){
	echo "程序已经安装过";
	echo "<br>";
	echo "重新安装请删除,install 文件夹下的 <font color='red'>ok.lock</font> 文件";
	exit;
}

/*
if(!isset($_POST['startinstall'])){
	echo "<script>javascript:history.back()</script>";
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>云购系统安装</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='images/install.css'>

</head>
<body>
<div id='installbox'>
<div class='msgtitle'>云购系统 安装向导</div>
<table width="780" height="30" border="0" cellpadding="0" cellspacing="0" class="intable3">
  <tr>
    <td style="color:#f5f5f5; text-align:center">
        <span style="display:block;float:left;width:23%;font-size:12px;">1. 许可协议</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">2. 环境检测</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">3. 数据库设置</span>
        <span style="display:block;float:left;width:25%;font-size:12px;color:#FFF;">4. 安装完成</span>
    </td>
  </tr>
</table>
<h3>安装设置：</h3>
<form  method="post" action="" name="conf" id="gxform" style="margin:0; padding:0;">
	<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" class="tableoutline" style="font-size:12px; color:#666;">
		<tr class="firstalt">
			<td width="48%" valign="top"><b>数据库主机</b><br><font>一般为localhost</font></td>
			<td><input type="text" name="db_host" id="db_host" value="localhost" maxlength="50" style="width:250px;" > *</td>
		</tr>		                 
		<tr class="firstalt">
			<td width="48%"><b>数据库用户名</b><br><font color="#666666">一般为root</font><br></td>
			<td><input type="text" name="db_user" id="db_user" value="" maxlength="50" style="width:250px;"> *</td>
		</tr>
		<tr bgcolor="#fdefe5" class="firstalt">
			<td width="48%"><b>数据库密码</b><br><br></td>
			<td><input type="password" name="db_pwd" value="" id="db_pwd" maxlength="50" style="width:250px;" ></td>
		</tr>
		<tr class="firstalt">
			<td width="48%"><b>数据库名称</b><br><font color="#666666">请填写已存在的数据库名</font><br></td>
			<td><input type="text" name="db_name" id="db_name" value="" maxlength="50" style="width:250px;"> *</td>
		</tr>  
		<tr bgcolor="#fdefe5" class="firstalt">
			<td width="48%"><p><b>数据库表前缀</b><br><font color="#666666">建议您修改表前缀</font><br></p></td>
			<td><input type="text" name="db_prefix" id="db_prefix" value="go_"  maxlength="50"  valid="required"  style="width:250px;" > *</td>
		</tr>
		<tr class="firstalt">
			<td width="48%"><p><b>授权码</b><br><font color="#666666"><a target="_blank" href="http://www.yungoucms.com/news-4-1.html">购买授权码 </a></font><br></p></td>
			<td><input type="text" name="sqm_num" id="sqm_num" value="975E312DA2618F549446B6523A6F9730E059AA112448"  maxlength="50"  valid="required"  style="width:250px;" > *</td>			
		</tr>		
	</table>
	<h3>后台设置：</h3>
	<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" class="tableoutline" style="font-size:12px; color:#666;">
		<tr bgcolor="#fdefe5" class="firstalt">
			<td width="48%"><p><b>管理员帐号</b><br><font color="#666666">一般不用修改</font><br></p></td>
			<td><input type="text" name="user_name" id="user_name" value="admin"  maxlength="50"  valid="required"  style="width:250px;" > *</td>
		</tr>
		<tr class="firstalt">
			<td width="48%"><p><b>密码</b><br><font color="#666666">密码大于6位</font><br></p></td>
			<td><input type="password" name="password" id="password" value=""  maxlength="50"  valid="required"  style="width:250px;" > *</td>
		</tr>
		<tr bgcolor="#fdefe5" class="firstalt">
			<td width="48%"><p><b>确认密码</b></p></td>
			<td><input type="password" name="repassword" id="repassword" value=""  maxlength="50"  valid="required"  style="width:250px;" > *</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr class="firstalt" style="height:10px">
			<td height="70" colspan="2" align="center">
				<input style="width:120px; height:30px;" type="button" class="btn"  value="上一步" onClick="history.back();"/> 
				<input style="width:120px; height:30px;" type="submit" name="edit" value="下一步" class="btn" id="submit"> 
				<span id="loading" style="font-size:13px;color:#FF0000;display:none"><font color="#0066CC">请稍等...正在与MYSQL数据库进行连接。</font></span>
			</td>
		</tr>
		<tr class="firstalt" style="height:10px">
			<td colspan="2" align="center"><div id='msgbottom'>Powered By <a target="_blank" href="http://www.yungoucms.com/">YunGouCMS </a></div></td>
		</tr>
	</table>
</form>
</div>

</body>
</html>