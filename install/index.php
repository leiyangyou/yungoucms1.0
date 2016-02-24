<?php
//检测 right enter
session_start();
header('Content-type: text/html; charset=utf-8');
$_SESSION['enter']='session';
if($_SESSION['enter']!='session') {
	echo '系统不支持session!';
	unset($_SESSION['enter']);
	exit;
}

if(file_exists("ok.lock")){
	echo "程序已经安装过";
	echo "<br>";
	echo "重新安装请删除,install 文件夹下的 <font color='red'>ok.lock</font> 文件";
	exit;
}
if(isset($_POST['startinstall'])){
	header("Location:check.php");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>云购系统安装</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='images/install.css'>
<style>
.intable2{
	text-align:center;
	font-weight:bold;
	font-size:12pt;
	background:url(images/set02_top_nav.gif);
	margin:10px 0 0 10px;	
}
</style>
</head>
<body>
<form action="" method="post" id="gxform">
<div id='installbox'>
<div class='msgtitle'>云购系统,安装向导</div>
<table width="780" height="30" border="0" cellpadding="0" cellspacing="0" class="intable">
  <tr>
    <td style="color:#f5f5f5; text-align:center">
        <span style="display:block;float:left;width:23%;font-size:12px;color:#FFF;">1. 许可协议</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">2. 环境检测</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">3. 数据库设置</span>
        <span style="display:block;float:left;width:25%;font-size:12px;">4. 安装完成</span>
    </td>
  </tr>
</table>
<div id='msgbody'>
  <h3>云购系统 使用许可协议</h3>
  <div style="text-align:center;">
    <textarea name="textarea" rows="12" style="width:700px;border:1px solid #ccc;font-size:12px;line-height:20px;padding:8px;">
　感谢您选择云购系统，云购系统是一款使用方便、操作简单、安装部署灵活的自主建站系统，简约而不简单，智能而不傻瓜，可应用于图片站，企业站，文章资迅站，下载站等。
　云购系统 的官方网址是：www.yungoucms.com、官方论坛网址是：bbs.tao-long.com。
　为了使你正确并合法的使用本软件，请你在使用前务必阅读下面的协议条款：
　一、本协议适用于云购系统全部版本，云购系统官方网站对本协议有最终解释权。
　二、协议许可的权利 
　1、云购系统是具有自主知识产权的开源的网站管理系统！我们愿意为个人研究、学习、测试以及教学、公益活动等无偿提供，但是如果您或您的企业用以商业用途，请购买我们的正版授权许可（授权许可查询）。
　2、您可以在协议规定的约束和限制范围内修改本系统的源代码或界面风格以适应您的网站要求。
　二、协议规定的约束和限制 
　1、不得将本软件用于国家不允许开设的网站（包括色情、反动、含有病毒，赌博类网站）。
　2、未经官方许可，不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。
　3、未经官方许可，禁止在本软件的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。
　4、如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。 
　三、有限担保和免责声明 
　1、本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。
　2、个人用户出于自愿（研究、学习、教学、公益活动等）而使用本软件，您必须了解使用本软件的风险，我们不承诺对用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。
　3、电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始确认本协议并安装本系统，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。
　4、如果本软件带有其它软件的整合API示范例子包，这些文件版权不属于本软件官方，并且这些文件是没经过授权发布的，请参考相关软件的使用许可合法的使用。
　版权所有 (c)2013，www.yungoucms.com 保留所有权利。
　协议发布时间：2013年9月25日 By YunGouCMS </textarea>
  </div>
  <br />
  <div style="text-align:center;">
    <input type="checkbox" name="accept" id="setup"  valeu="1"  onClick="if(this.checked){document.getElementById('install').disabled=''}else{document.getElementById('install').disabled='disabled'}" style="border:none">
    <label for="setup">接受许可协议</label>
    <h5><input id="install" type="submit" name="startinstall" class="btn" style="width:120px;height:30px;" value="开始安装" disabled="disabled"></h5>
  </div>
</div>
<div id='msgbottom'>Powered By 云购系统</div>
</div>
</form>
</body>
</html>