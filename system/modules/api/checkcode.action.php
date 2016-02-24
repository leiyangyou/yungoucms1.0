<?php

defined('G_IN_SYSTEM')or exit("no");

class checkcode extends SystemAction {

	public function image(){	
		$width = intval($this->segment(4));
		$height = intval($this->segment(5));
		$color = $this->segment(6);
		$bgcolor = $this->segment(7);
		$lenght = intval($this->segment(8));
		$type = intval($this->segment(9));	//数字，字母， 数字与字母， 汉字		
		$checkcode=System::load_app_class("checkcodeimg");
		$checkcode->config($width,$height,$color,$bgcolor,$lenght,$type);
		if(isset($_GET['dian'])){
			$checkcode->dian(50,$color);
		}
		_setcookie("checkcode",md5($checkcode->code));
		$checkcode->image();
		
	}

}

?>