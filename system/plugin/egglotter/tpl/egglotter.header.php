<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php if(isset($title)){echo $title;}else{echo _cfg("web_name");}?></title>
<meta name="keywords" content="<?php if(isset($keywords)){echo $keywords;}else{echo _cfg("web_key");}?>"/>
<meta name="description" content="<?php if(isset($description)){echo $description;}else{echo _cfg("web_des");}?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_CSS; ?>/register.css"/>
<script type="text/javascript" src="<?php echo G_GLOBAL_STYLE; ?>/global/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jquery.cookie.js"></script>
</head>
<body>
<div class="header">
	<div class="site_top">
		<div class="head_top">
		<p class="collect"><a href="javascript:;" id="addSiteFavorite">收藏<?php echo _cfg("web_name"); ?></a></p>
		<ul class="login_info" style="display: block;">
			<?php if(uidcookie('uid')){ ?>
			<li class="h_wel" id="logininfo">
				<a href="<?php echo WEB_PATH; ?>/member/home" class="gray01" >
					<?php if(uidcookie('img')){ ?>
					<img src="<?php echo G_UPLOAD_PATH."/".uidcookie('img'); ?>" width="30" height="30"/>
					<?php }else{?>
					<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg" width="30" height="30"/>
					<?php } ?>
					<?php 
						if(uidcookie('username')!=null){
							echo _strcut(uidcookie('username'),7);
						}elseif(uidcookie('mobile')!=null){
							echo _strcut(uidcookie('mobile'),7);
						}else{
							echo _strcut(uidcookie('email'),7);
						}
					?>
				</a>&nbsp;&nbsp;
				<a href="<?php echo WEB_PATH; ?>/member/user/cook_end" class="gray01">[退出]</a>
			</li>
			<?php }else{ ?>
			<li id="logininfo" class="h_login">
				<i>您好，欢迎光临！</i>				
				<a class="gray01" href="<?php echo WEB_PATH; ?>/member/user/login" >登录</a>
				<span>|</span>
				<a class="gray01" href="<?php echo WEB_PATH; ?>/member/user/register" >注册</a>
			</li>
			<?php } ?>
			<li class="h_1yyg">
				<a  href="<?php echo WEB_PATH; ?>/home/member">我的<?php echo _cfg('web_name_two'); ?><b></b></a>
				<div class="h_1yyg_eject" style="display:none;">
					<dl>
						<dt><a  href="<?php echo WEB_PATH; ?>/member/home">我的<?php echo _cfg('web_name_two'); ?><i></i></a></dt>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home/userbuylist">云购记录</a></dd>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home">获得的商品</a></dd>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home/userrecharge">帐户充值</a></dd>
						<dd><a  href="<?php echo WEB_PATH; ?>/member/home/modify">个人设置</a></dd>
					</dl>
				</div>
			</li>
			<li class="h_help"><a href="<?php echo WEB_PATH; ?>/help/1" target="_blank">帮助</a></li>
			<li class="h_inv"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg("qq"); ?>&site=qq&menu=yes"><img border="0" src="images/pa" style="display:none;">在线客服</a></li>
			<li class="h_tel"><b><?php echo _cfg("cell"); ?></b></li>
		</ul>
		</div>
	</div>
	<div class="head_mid">
		<div class="head_mid_bg">			
			<h1 class="logo_1yyg"><a class="logo_1yyg_img" href="<?php echo G_WEB_PATH ;?>/" title="<?php echo _cfg("web_name"); ?>">
				<img src="<?php echo G_UPLOAD_PATH.'/'.Getlogo();?>" />
			</a></h1>			
			<div class="head_number">
				<a href="#" target="_blank">已
					<span id="spBuyCount" style="color:#22AAFF; background:#F5F5F5; opacity:1;"><?php echo go_count_renci(); ?></span>
					人次参与云购
				</a>
			</div>			
			<div class="head_search">
				<input type="text" id="txtSearch" class="init" value="iPhone5"/>
				<input type="button" id="butSearch" class="search_submit" value="搜索"/>
				<div class="keySearch">
					<a href="<?php echo WEB_PATH;?>/search/index/tag/苹果" target="_blank">苹果</a>
					<a href="<?php echo WEB_PATH;?>/search/index/tag/iPhone" target="_blank">iPhone</a>
					<a href="<?php echo WEB_PATH;?>/search/index/tag/智能手机" target="_blank">智能手机</a>
					<a href="<?php echo WEB_PATH;?>/search/index/tag/G手机" target="_blank">3G手机</a>
					<a href="<?php echo WEB_PATH;?>/search/index/tag/宝马" target="_blank">宝马</a>
					<a href="<?php echo WEB_PATH;?>/search/index/tag/单反" target="_blank">单反</a>                 
				</div>
			</div>
		</div>
	</div>
</div>
<!--header end-->
<div class="head_nav">
 	<div class="nav_center">
 		<ul class="nav_list">
			<li class="sort-all" ><a href="<?php echo G_WEB_PATH;?>">首页</a></li>
			<?php echo Getheader('index');?>
 		</ul>
 		<!--<div class="mini_mycart" id="sCart">
 			<input type="hidden" id="hidChanged" value="0"/>
 			<a id="sCartNavi" class="cart"><s></s>购物车<span id="sCartTotal">0</span></a>
			<a href="<?php echo WEB_PATH;?>/member/cart/cartlist" target="_blank" class="checkout">去结算</a>
 		</div>-->
 	</div>
</div>
<div class="nav_class">
	<ul>
		<?php 
			$data=$this->mysql_model->GetList("select * from `@#_category` where `model`='1'"); 		
			foreach($data as $categoryx){
		?>

		<li><a href="<?php echo WEB_PATH;?>/go/index/glist/<?php echo $categoryx['cateid'];?>"><?php echo $categoryx['name'];?></a></li>
		
		<?php } ?>
		<li><a href="<?php echo WEB_PATH;?>/go/index/glist">全部</a></li>
	</ul>
</div>
<script>
$(function(){
	$(".h_1yyg").mouseover(function(){
		$(".h_1yyg_eject").show();
	});
	$(".h_1yyg").mouseout(function(){
		$(".h_1yyg_eject").hide();
	});
	$(".h_news").mouseover(function(){
		$(".h_news_down").show();
	});
	$(".h_news").mouseout(function(){
		$(".h_news_down").hide();
	});
});
$(function(){
	$("#txtSearch").focus(function(){
		$("#txtSearch").css({background:"#FFFFCC"});
		var va1=$("#txtSearch").val();
		if(va1=="iPhone5"){
			$("#txtSearch").val("");
		}
	});
	$("#txtSearch").blur(function(){
		$("#txtSearch").css({background:"#FFF"});
		var va2=$("#txtSearch").val();
		if(va2==""){
			$("#txtSearch").val("iPhone5");
		}			
	});
	$("#butSearch").click(function(){
		window.location.href="<?php echo WEB_PATH;?>/search/index/tag/"+$("#txtSearch").val();
	});
});

$(document).ready(function(){
	$.get("<?php echo WEB_PATH;?>/member/cart/getnumber",{},function(data){
		$("#sCartTotal").text(data);											
	});
});
</script>