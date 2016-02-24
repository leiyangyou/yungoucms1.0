<?php 
defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base','member','no');
System::load_app_fun('my','go');
System::load_app_fun('user','go');
class index extends SystemAction {
	
	public function tag(){		
		
		$search =$this->segment(4);
		if(!$search)_message("输入搜索关键字");
		$search = urldecode($search);
		$search = htmlspecialchars($search);		
		if(!_is_utf8($search)){
			$search =  iconv("GBK", "UTF-8", $search); 
		}	
		$mysql_model=System::load_sys_class('model');
		$title=$search.' - '._cfg('web_name');
		$shoplist=$mysql_model->GetList("select thumb,id,sid,zongrenshu,canyurenshu,shenyurenshu,money from `@#_shoplist` WHERE `title` LIKE '%".$search."%'");
		$list=count($shoplist);
		include templates("search","search");
		
	}

}

?>