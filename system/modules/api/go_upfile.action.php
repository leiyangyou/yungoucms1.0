<?php 

defined('G_IN_SYSTEM') or exit('No permission resources.');

class go_upfile extends SystemAction {


	public function init(){
			$db = System::load_sys_class("model");
			$version = System::load_sys_config('version');	
			$v_time = $version['release'];
			$v_version = $version['version'];
			if($v_time == '20131213'){
				_message("最新版本！");							
			}
			
			
			$ret = $db->GetOne("Describe `@#_member` reg_key");
			if(!$ret){
				$db->Query("alter table `@#_member` add `reg_key` varchar(100) DEFAULT NULL after passcode");
				$db->Query("alter table `@#_member_del` add `reg_key` varchar(255) DEFAULT NULL after passcode");
			}
			
			$ret = $db->GetOne("Describe `@#_member_go_record` ip");
			if(!$ret){
				$db->Query("alter table `@#_member_go_record` add `ip` varchar(255) DEFAULT NULL after pay_type");
			}
			
			$ret = $db->GetOne("Describe `@#_shaidan` sd_ip");
			if(!$ret){
				$db->Query("alter table `@#_member_go_record` add `sd_ip` varchar(255) DEFAULT NULL after sd_qishu");
			}
			
			$ret = $db->GetOne("Describe `@#_shopcodes_1` s_codes_tmp");
			if(!$ret){
				$db->Query("alter table `@#_shopcodes_1` add `s_codes_tmp` varchar(255) DEFAULT NULL after s_codes");
			}
			
			$ret = $db->GetOne("Describe `@#_shoplist` q_showtime");
			if(!$ret){
				$db->Query("alter table `@#_shoplist` add `q_showtime` varchar(1) DEFAULT 'N' after q_end_time");
				$db->Query("alter table `@#_shoplist_del` add `q_showtime` varchar(1) DEFAULT 'N' after q_end_time");		
			}
		
			$file = G_CONFIG.'version.inc.php';
			if(!is_writable($file)) _message('配置文件不能写入!');
			$html = '<?php  return array("version"=>"V2.9.3","release"=>"20131213"); ?>';
			file_put_contents($file,$html);
			_message("数据库升级成功",WEB_PATH.'/api/go_upfile/del');
	}
	
	public function del(){
		unlink(__FILE__);
	}

}	

?>