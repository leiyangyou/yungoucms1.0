<div class="footer_content">
   	<div class="footer_line"></div>
   	<div class="footservice">
   		<div class="support">
		<?php 
		$getlis= $this->mysql_model->GetList("select * from `@#_category` where `parentid`='1'");
		//var_dump($getlis);
		?>
			<?php
			
			foreach($getlis as $articl){
			
			?>
   			<dl class="ft-newbie">
   				<dt><span><?php echo  $articl['name']?></span></dt>
				 <?php  echo help($articl['cateid']);?> 
   			</dl>
			
			<?php 
										}
			?>
   			
   			<dl class="ft-fwrx">
   				<dt><span>服务热线</span></dt>
   				<dd class="ft-fwrx-tel"><i style="display: none;">4006859800</i></dd>
   				<dd class="ft-fwrx-time">周一至周五 8:30-18:30</dd>
		
   			</dl>
   			<dl class="ft-weixin">
   				<dt><span>微信扫一扫</span></dt>
   				<dd class="ft-weixin-img"><s></s></dd>
   				<dd class="gray02">关注1元云购免费抽大奖</dd>
   			</dl>
   		</div>
   	</div>
   	<div class="service-promise">
   		<ul>
   			<li class="sp-fair"><a href="<?php echo WEB_PATH;?>/help/4" target="_blank"><span>100%公平公正</span></a></li>
   			<li class="sp-wares"><a href="<?php echo WEB_PATH;?>/help/5" target="_blank"><span>100%正品保障</span></a></li>
   			<li class="sp-free-delivery"><a href="<?php echo WEB_PATH;?>/help/7" target="_blank"><span>全国免费配送</span></a></li>
   			<li class="sp-business service-promise-border-r0"><a href="<?php echo WEB_PATH;?>/help/business" target="_blank"><span>商务合作023-67898642</span></a></li>
   		</ul>
   	</div>
	<div class="service_date">
   		<div class="Service_Time">
   			<p>服务器时间</p>
   			<span id="sp_ServerTime"></span>
   		</div>
   		<div class="Service_Fund">
   			<a href="{WEB_PATH}/single/fund" target="_blank">
   				<p>云购公益基金</p>
   				<span id="spanFundTotal">0000000.00<i>元</i></span>
   			</a>
   		</div>
   	</div>
</div>
<script type="text/javascript">  
get=function (id){return document.getElementById(id)}   
webDate=function(fn){  
	var Htime=new XMLHttpRequest();  
	Htime.onreadystatechange=function(){Htime.readyState==4&&(fn(new Date(Htime.getResponseHeader('Date'))))};  
	Htime.open('HEAD', '/?_='+(-new Date));  
	Htime.send(null);  
}   
time2String=function (t){  
	with(t)return [  
		,('0'+getHours()).slice(-2),':'  
		,('0'+getMinutes()).slice(-2),':'  
		,('0'+getSeconds()).slice(-2)].join('')  
}  
setInterval(function (){  
	webDate(function (webTime){  
		get('sp_ServerTime').innerHTML=time2String(time=webTime);  
	})    
},1000)
//云购基金
$(function(){
	$.ajax({
		url:"<?php echo WEB_PATH;?>/go/fund/get",
		success:function(msg){
			$("#spanFundTotal").text(msg);
		}
	})
})
 </script>      
<!--footercontent end-->
<div class="footer" style="height:auto;">
	<div class="footer_links">
		<?php echo Getheader('foot');?>
  	</div>
	<div class="copyright"><?php echo _cfg('web_copyright');?></div>
	<div class="footer_icon" style="width:599px;">
		<ul>
			<li class="fi_ectrustchina"><a target="_blank" href=""><span>可信网站</span></a></li>
			<li class="fi_315online"><a target="_blank" href="http://www.yungoucms.com/get.php?url=<?php echo G_WEB_PATH;?>"><span>云购商业授权值得信赖</span></a></li>
			<li class="fi_cnnic"><a target="_blank" href="#"><span>中国电子商务诚信单位</span></a></li>
  			<li class="fi_anxibao"><a target="_blank" href="#"><span>安信保</span></a></li>
			<li class="fi_pingan"><a target="_blank" href="#"><span>平安银行</span></a></li>			
		</ul>
	</div>
</div>
<!--footer end-->
<div id="divRighTool" class="quickBack">
	<dl class="quick_But">
		<dd class="quick_service"><a id="btnRigQQ" href="http://wpa.qq.com/msgrd?v=3&uin=1274117743&site=qq&menu=yes" target="_blank" class="quick_serviceA"><b>在线客服</b><s></s></a></dd>
		<dd class="quick_Collection"><a id="btnFavorite" href="javascript:;" class="quick_CollectionA"><b>收藏本站</b><s></s></a></dd>
		<dd class="quick_Return"><a id="btnGotoTop" href="javascript:;" class="quick_ReturnA"><b>返回顶部</b><s></s></a></dd>
	</dl>
</div>
<script>
$("#divRighTool").hide(); 
var wids=($(window).width()-980)/2-70;
if(wids>0){
	$("#divRighTool").css("right",wids);
}else{
	$("#divRighTool").css("right",10);
}
$(function(){
	if($(window).scrollTop()>100){
			$("#divRighTool").fadeIn(1500);
		}else{
			$("#divRighTool").fadeOut(1500);
		};
	$(window).scroll(function(){
		if($(window).scrollTop()>100){
			$("#divRighTool").fadeIn(1500);
		}else{
			$("#divRighTool").fadeOut(1500);
		}
	});
	$("#btnGotoTop").click(function(){
		$("html,body").animate({scrollTop:0},1500);
	});
	$("#btnFavorite,#addSiteFavorite").click(function(){
		var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
		if(document.all){
			window.external.addFavorite('<?php echo G_WEB_PATH;?>','<?php echo _cfg("web_name");?>');
		}
		else if(window.sidebar){
		   window.sidebar.addPanel('<?php echo _cfg("web_name");?>','<?php echo G_WEB_PATH;?>', "");
		}else{ 
			alert('您可以通过快捷键' + ctrl + ' + D 加入到收藏夹');
		}
    });
	$("#divRighTool a").hover(		
		function(){
			$(this).addClass("Current");
		},
		function(){
			$(this).removeClass("Current");
		}
	)
});
</script>
</body>
</html>