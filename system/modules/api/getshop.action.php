<?php 

class getshop extends SystemAction {

	//ajax
	public function lottery_shop_json(){
		
		$gid  = trim($this->segment(4),',');		
		$times = (int)System::load_sys_config('system','goods_end_time');
		if(!$times)$times = 3;		
		$times = $times*1000;					//揭晓动画毫秒值
		$db = System::load_sys_class('model');
	
		$info = $db->GetOne("select id,thumb,title,q_uid,q_user,q_end_time from `@#_shoplist` where `id` not in('$gid') and `q_uid` is not null and `q_showtime` = 'Y' order by `id` DESC");
		if(!$info){
			echo json_encode(array("error"=>'1'));
			return;
		}
		System::load_sys_fun("user");
		$user = unserialize($info['q_user']);
		$user = get_user_name($info['q_uid']);	
		$uid  = $info['q_uid'];
		$upload = G_UPLOAD_PATH;
		
		$q_time = substr($info['q_end_time'],0,10);
		$c_time = time() - $q_time;
		
		if($c_time < 30 || $c_time > $times){
			echo json_encode(array("error"=>'-1'));
			return;		
		}
		$times -= $c_time;		
		echo json_encode(array("error"=>"0","upload"=>$upload,"thumb"=>$info['thumb'],"id"=>$info['id'],"uid"=>"$uid","title"=>$info['title'],"user"=>$user,"times"=>$times));
	}
	
	//ajax
	public function lottery_shop_set(){
		if(isset($_POST['lottery_sub'])){
			$gid = isset($_POST['gid']) ? intval($_POST['gid']) : exit();
			$db = System::load_sys_class('model');
			$q = $db->Query("update `@#_shoplist` SET `q_showtime` = 'N' where `id` = '$gid' and `q_showtime` = 'Y'");			
			if($q)
				echo '1';
			else
				echo '0';
		}
	}//
}

?>