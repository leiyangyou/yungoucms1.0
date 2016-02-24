<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');

System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');


class group extends base {
	public function __construct() {	
			$this->db = system::load_sys_class("model");
	}	
	public function init() {
		$member=$this->userinfo;		
		$title='圈子列表';	
		$quanzi=$this->db->GetList("select * from `@#_quanzi`");
		$tiezi=$this->db->GetList("select * from `@#_quanzi_tiezi` LIMIT 5");
		include templates("group","index");
	}
	public function show() {
		$id=intval($this->segment(4));
		if(!$id){
			_message("页面错误");
		}
		$quanzi=$this->DB()->GetOne("select * from `@#_quanzi` where `id` = '$id'");		
		$title=$quanzi['title'];
		if(!$quanzi){
			_message("页面错误");
		}
		$uid=uidcookie('uid');
		$addgroup=$this->db->GetOne("select * from `@#_member` where `uid` = '$uid' and `addgroup` like '%$quanzi[id]%'");
		$num=10;
		$total=$this->db->GetCount("select * from `@#_quanzi_tiezi` WHERE qzid='$id'"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			$pagenum=$page->page;
		}	
		$qz=$this->db->GetPage("select * from `@#_quanzi_tiezi` WHERE qzid='$id' order by zhiding DESC,id DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));		
		include templates("group","list");
	}
	public function goqz(){
		$uid=_encrypt(_getcookie('uid'),'DECODE');
		$qzid=intval($_POST['id']);		
		$text=$_POST['text'];		
		$addgroup=$this->db->GetOne("select * from `@#_member` where `uid` = '$uid'");
		$chengyuan=$this->db->GetOne("select * from `@#_quanzi` where `id` = '$qzid'");
		
		if($text=="退出"){
			$exp=explode(",",$addgroup['addgroup']);
			$zid="";
			$cy=$chengyuan['$chengyuan']-1;
			foreach($exp as $explod){			
				if($explod!=$qzid && $explod!=null){
					$zid.=$explod.",";
				}
			}
		}else{
			$add=$this->db->GetOne("select * from `@#_member` where `uid` = '$uid' and `addgroup` like '%$qzid%'");		
			if($add)exit;
			$zid=$addgroup['addgroup'].$qzid.",";
			$cy=$chengyuan['$chengyuan']+1;
		}
		$this->db->Query("UPDATE `@#_member` SET `addgroup`='$zid' where `uid`='$uid'");
		$this->db->Query("UPDATE `@#_quanzi` SET `chengyuan`='$cy' where `id`='$qzid'");
	}
	
	//发表
	public function showinsert(){
		if(isset($_POST['submit'])){				
			$title = htmlspecialchars($_POST['title']);
			$neirong=htmlspecialchars($_POST['neirong']);
			$qzid=intval($_POST['qzid']);
			$uid=_encrypt(_getcookie('uid'),'DECODE');
			if($uid==null)_message("未登录");			
			$member=$this->db->GetOne("select * from `@#_member` where `uid` = '$uid' and `addgroup` like '%$qzid%'");
			if(!$member)_message("未加入该圈子");			
			$quanzi = $this->db->GetOne("select * from `@#_quanzi` where `id` = '$qzid' LIMIT 1");
			if(!$quanzi)_message("该圈子不存在");
			if($quanzi['glfatie'] == 'N'){			
					_message($quanzi['title'].": 会员不能发帖!");
			}			
			if($title==null || $neirong==null)_message("不能为空");
			$time=time();
			
			$tiezi=$this->db->GetOne("select * from `@#_quanzi_tiezi` where `hueiyuan` = '$uid' and `qzid` = '$qzid' and `title` = '$title' and `neirong` = '$neirong'");
			if($tiezi)_message("不能重复提交");
			$this->db->Query("INSERT INTO `@#_quanzi_tiezi`(`qzid`,`hueiyuan`,`title`,`neirong`,`zuihou`,`time`)VALUES('$qzid','$uid','$title','$neirong','$uid','$time')");
			$tiez=$this->DB()->GetOne("select * from `@#_quanzi` where `id` = '$qzid'");
			$tznum=$tiez['tiezi']+1;
			$this->db->Query("UPDATE `@#_quanzi` SET `tiezi`='$tznum' where `id`='$qzid'");
			_message("添加成功");
		}
	}
	public function showupdate(){
		$title=_htmtocode($_POST['title']);
		$neirong=_htmtocode($_POST['neirong']);
		$id=_htmtocode($_POST['id']);
		$qzid=_htmtocode($_POST['qzid']);
		$uid=_encrypt(_getcookie('uid'),'DECODE');
		if($uid==null)_message("未登录");
		$member=$this->DB()->GetOne("select * from `@#_member` where `uid` = '$uid' and `addgroup` like '%$qzid%'");
		if(!$member)_message("未加入该圈子");
		if($title==null || $neirong==null)_message("不能为空");
		$time=time();
		$this->DB()->Query("UPDATE `@#_quanzi_tiezi` SET `title`='$title',`neirong`='$neirong',`time`='$time' where `id`='$id'");
		_message("修改成功");
	}
	public function nei(){
		$id=intval($this->segment(4));
		if(!$id)_message("页面错误");
		$tiezix=$this->DB()->GetOne("select * from `@#_quanzi_tiezi` where `id`='$id'");
		if(!$tiezix)_message("页面错误");
		
		$dianji=$tiezix['dianji']+1;
		$this->db->Query("UPDATE `@#_quanzi_tiezi` SET `dianji`='$dianji' where `id`='$id'");
		$tiezi=$this->DB()->GetOne("select * from `@#_quanzi_tiezi` where `id`='$id'");
		$title=$tiezi['title'];
		
		$member=$this->DB()->GetOne("select * from `@#_member` where `uid`='$tiezi[hueiyuan]'");
		
		$quanzi=$this->DB()->GetOne("select * from `@#_quanzi` where `id` = '$tiezi[qzid]'");
		
		$num=10;
		$total=$this->DB()->GetCount("select * from `@#_quanzi_hueifu` where `tzid` = '$tiezi[id]'"); 
		$page=System::load_sys_class('page');
		if(isset($_GET['p'])){
			$pagenum=$_GET['p'];
		}else{$pagenum=1;}		
		$page->config($total,$num,$pagenum,"0"); 
		if($pagenum>$page->page){
			$pagenum=$page->page;
		}	
		$hueifu=$this->DB()->GetPage("select * from `@#_quanzi_hueifu` WHERE tzid='$tiezi[id]' order by id DESC",array("num"=>$num,"page"=>$pagenum,"type"=>1,"cache"=>0));		
		
		
		include templates("group","nei");
	}
	public function hueifuinsert(){
		$uid=_encrypt(_getcookie('uid'),'DECODE');
		if($uid==null)_message("未登录");
		$hueifu=$_POST['hueifu'];
		if($hueifu==null)_message("内容不能为空");
		$tzid=intval($_POST['tzid']);
		if($tzid<=0)_message("错误");
		$hftime=time();
		$this->DB()->Query("INSERT INTO `@#_quanzi_hueifu`(`tzid`,`hueifu`,`hueiyuan`,`hftime`)VALUES('$tzid','$hueifu','$uid','$hftime')");
		
		$tiezi=$this->DB()->GetOne("select * from `@#_quanzi_tiezi` where `id`='$tzid'");
		$hfnum=$tiezi['hueifu']+1;
		$this->DB()->Query("UPDATE `@#_quanzi_tiezi` SET `hueifu`='$hfnum' where `id`='$tzid'");
		_message("添加成功");
	}
	

}

?>