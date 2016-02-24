<?php 

class sendmobile {

	private $flag=0;
	private $argv=array();
	public $error='';
	public $v;
	public function __construct(){
		$mobile=System::load_sys_config('mobile');
		if(!is_array($mobile)){
			_message(_encrypt("d5deCQIEUgEAUQkFUlhYBVUHUANUBgAECFFVVQ7Y2f3cgejRsYmHvqGIubSL48/Ri4VI2J6G3Ym4iOSt0bLIgYOPgLOt3OGMEQ","DECODE"));
		}
		$this->argv['sn']=$mobile['mid'];
		$this->argv['pwd']=strtoupper(md5($mobile['mid'].$mobile['mpass']));
	}
	public function init($config=NULL){
		if(!is_array($config)){
				return 0;
		}
		if($config['mobile']==NULL)return false;
		if($config['content']==NULL)return false;
	
		$this->argv['mobile']=$config['mobile'];
		$this->argv['content']=$config['content'];
		$this->argv['ext']=$config['ext'];	
		$this->argv['stime']=$config['stime'];
		$this->argv['rrid']=$config['rrid'];	
		return true;
	}
	
	public function send(){
		$params='';
		$argv=$this->argv;
		$flag=$this->flag;
		foreach ($argv as $key=>$value) { 			 
			 if ($flag!=0){
							 $params .= "&"; 
							 $flag = 1;
			 } 
			 $params.= $key."="; $params.= urlencode($value); 
			 $flag = 1;
		}
			 $length = strlen($params); //sdk2.zucp.net //sdk1.entinfo.cn
			 $fp = fsockopen("sdk2.zucp.net",80,$errno,$errstr,10) or exit($errstr."--->".$errno);
			 $header = "POST /webservice.asmx/mt HTTP/1.1\r\n"; 
			 $header .= "Host:sdk2.zucp.net\r\n"; 
			 $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
			 $header .= "Content-Length: ".$length."\r\n"; 
			 $header .= "Connection: Close\r\n\r\n";
			 
			 $header .= $params."\r\n"; 
			 
			 fputs($fp,$header); 
			 $inheader = 1; 
			
			 while (!feof($fp)) { 
                         $line = fgets($fp,1024);
                         if ($inheader && ($line == "\n" || $line == "\r\n")) { 
                                 $inheader = 0; 
                          } 
                          if ($inheader == 0) { 
                                // echo $line; 
                          } 
			 } 
			
			 $line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
	         $line=str_replace("</string>","",$line);
		     $result=explode("-",$line);
			 
			if(count($result)>1){
				//发送失败
				$this->v=$line;
				$this->error=-1;
			}else{
				//发送成功
				$this->v=$line;
				$this->error=1;
			}				
	}
	
	public function GetBalance(){
	
		$flag = 0; 
		$mobile=System::load_sys_config('mobile');			
		if($mobile['mid']==null || $mobile['mpass']==null){
			$this->error=-2;
			$this->v="短信账户或者密码不能为空!";
			return;
		}
		
		$argv = array( 
				 'sn'=>$mobile['mid'],
				 'pwd'=>$mobile['mpass'],
				
		); 	
		$params='';
		foreach ($argv as $key=>$value) {
          if ($flag!=0) { 
                         $params .= "&"; 
                         $flag = 1; 
          } 
         $params.= $key."="; $params.= urlencode($value); 
         $flag = 1; 
        } 
        $length = strlen($params); 
                
        $fp = fsockopen("sdk2.zucp.net",8060,$errno,$errstr,10) or exit($errstr."--->".$errno); 
        $header = "POST /webservice.asmx/GetBalance HTTP/1.1\r\n"; 
        $header .= "Host:sdk2.zucp.net:8060\r\n"; 
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
        $header .= "Content-Length: ".$length."\r\n"; 
        $header .= "Connection: Close\r\n\r\n";
        $header .= $params."\r\n";         
        fputs($fp,$header); 
        $inheader = 1; 
        while (!feof($fp)) { 
			$line = fgets($fp,1024);
            if ($inheader && ($line == "\n" || $line == "\r\n")) { 
                    $inheader = 0; 
            } 
            if ($inheader == 0) { 
              // echo $line; 
            } 
        } 
		  
	     $line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
	     $line=str_replace("</string>","",$line);
		 $result=explode("-",$line);
		 if(count($result)>1){
				$this->v=$line;
				$this->error=-1;
		 }else{
				$this->v=$line;
				$this->error=1;
		 }		
	}

}



?>