<?php
define('G_IN_ADMIN',true);
define('G_ADMIN_PATH',WEB_PATH.'/'.G_ADMIN_DIR);
class admin extends SystemAction {	
	protected $AdminInfo;
	private $db;
	public function __construct(){		
		$this->CheckAdmin();
	}

	//判断用户是否登陆
	final protected function CheckAdmin(){
		if(ROUTE_A != 'login'){
			$check = $this->CheckAdminInfo();
			if(!$check)_message("请登录后在查看页面",WEB_PATH.'/'.G_ADMIN_DIR.'/user/login');
			
		}
	}
	//判断用户
	final protected function CheckAdminInfo($uid=null,$ashell=null){
		$this->db=System::load_app_model('admin_model',G_ADMIN_DIR);
		if($uid && $ashell){
			$CheckId = _encrypt($uid,'DECODE');
			$CheckAshell =  _encrypt($ashell,'DECODE');	
		}else{			
			$CheckId=_encrypt(_getcookie("AID"),'DECODE');
			$CheckAshell=_encrypt(_getcookie("ASHELL"),'DECODE');
		}
		if(!$CheckId || !$CheckAshell){			
			return false;
		}		
		$info=$this->db->GetOne("SELECT * FROM `@#_admin` WHERE `uid` = '$CheckId'");		
		if(!$info)return false;
		$infoshell=md5($info['username'].$info['userpass']);
		if($infoshell!=$CheckAshell)return false;
		$this->AdminInfo=$info;
		return true;
	}
	
	final protected function tpl($module = 'admin', $template = 'index'){			
			$file =  G_SYSTEM.'modules/'.$module.'/tpl/'.$template.'.tpl.php';
			if(file_exists($file))return $file;
			else
				_message("没有找到<font color='red'>".$module."</font>模块下的<font color='red'>".$template.".tpl.php</font>文件!");
	}
	
	final protected function headerment($ments=null){
		$html='';
		$html_l='';
		$URL=trim(get_web_url(),'/');
		if(is_array($ments)){
			$ment=$ments;
		}else{
			if(!isset($this->ment))return false;
			$ment=$this->ment;
		}		
		foreach($ment as $k=>$v){			
			if(WEB_PATH.'/'.$v[2]==$URL){
				$html_l='<h3 class="nav_icon">'.$v[1].'</h3><span class="span_fenge lr10"></span>';
			}
			if(!isset($v[3])){				
				$html.='<a href="'.WEB_PATH.'/'.$v[2].'">'.$v[1].'</a>';	
				$html.='<span class="span_fenge lr5">|</span>';
			}			
		}
		
		return $html_l.$html;
	}
}
?>
