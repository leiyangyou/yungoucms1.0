<?php 

/*
* 获取用户昵称
* uid 用户id，或者 用户数组
* type 获取的类型, username,email,mobile
* key  获取完整用户名, sub 截取,all 完整
*/
function get_user_name($uid='',$type='username',$key='sub'){
	if(is_array($uid)){			
			if(isset($uid['username']) && !empty($uid['username'])){
				return $uid['username'];
			}
			if(isset($uid['email']) && !empty($uid['email'])){
				if($key=='sub'){
					$email = explode('@',$uid['email']);				
					return $uid['email'] = substr($uid['email'],0,2).'*'.$email[1];
				}else{
					return $uid['email'];
				}
			}
			if(isset($uid['mobile']) && !empty($uid['mobile'])){	
				if($key=='sub'){
					return $uid['mobile'] = substr($uid['mobile'],0,4).'****'.substr($uid['mobile'],9,3);
				}else{
					return $uid['mobile'];
				}
			}
			return '';
	}else{		
		$db = System::load_sys_class("model");
		$uid = intval($uid);
		$info = $db->GetOne("select username,email,mobile from `@#_member` where `uid` = '$uid' limit 1");	
		if(isset($info['email']) && !empty($info['email'])){	
			 if($key=='sub'){
				$email = explode('@',$info['email']);			
				return $info['email'] = substr($info['email'],0,2).'*'.$email[1];
			 }else{
				return $info['email'];
			 }
		}
		if(isset($info['mobile']) && !empty($info['mobile'])){	
				if($key=='sub'){
					return $info['mobile'] = substr($info['mobile'],0,4).'****'.substr($info['mobile'],9,3);
				}else{
					return $info['mobile'];
				}
		} 
		if(isset($info[$type]) && !empty($info[$type])){				
				return $info[$type];
		}
		return '';
	}
}

/*
* 获取用户信息
*/
function get_user_key($uid='',$type='img'){
	if(is_array($uid)){
		if(isset($uid[$type])){			
			return $uid[$type];
		}
		return 'null';
	}else{
		$db = System::load_sys_class("model");
		$uid = intval($uid);
		$info = $db->GetOne("select * from `@#_member` where `uid` = '$uid' limit 1");
		if(isset($info[$type])){			
			return $info[$type];
		}
		return 'null';
	}
}

/**
*	获取登陆用户UID	
*/
function get_user_uid(){
	$uid=intval(_encrypt(_getcookie("uid"),'DECODE'));
	if(!$uid){return false;}
	return $uid;
}

/*
	获取用户单个商品的总云购次数
*/

function get_user_goods_num($uid=null,$sid=null){
	if(empty($uid) || empty($sid)){
		return false;
	}
	$db = System::load_sys_class("model");
	$list = $db->GetList("select * from `@#_member_go_record` where `uid` = '$uid' and `shopid` = '$sid' and `status` LIKE '%已付款%'");
	$num=0;
	foreach($list as $v){
		$num+=$v['gonumber'];
	}
	return $num;
	
}


?>