				  
				function gg_show_Time_fun(num_t,objc,uhtml,data){		
							
					var i =  parseInt((num_t/1000)/60);
					var s =  parseInt((num_t/1000)%60);
					var ms =  String(Math.floor(num_t%1000));
						ms = parseInt(ms.substr(0,2));
						if(i<10)i='0'+i;
						if(s<10)s='0'+s;
						if(ms<0)ms='00';
										
					var html = '<span class="minute">'+i+'</span>:<span class="second">'+s+'</span>:<span class="millisecond">'+ms+'</span>';
					 
					objc.html(html);				
					
					if(num_t >=0 ){
						 num_t -=123;						 
						 setTimeout(function(){
							gg_show_Time_fun(num_t,objc,uhtml,data);				 
						 },123); 
					
					}else{		
						var obj = objc.parent().parent();							
							obj.find(".countdown_div").html('<span class="lateron">正在计算,请稍后…</span>');	
							 setTimeout(function(){
								obj.html(uhtml);						
								obj.attr('class',"new_li");
								$.ajaxSetup({
									async : false
								});								
								$.post(data['path']+"/api/getshop/lottery_shop_set/",{'lottery_sub':'true','gid':data['id']},function(sdata){
									//alert(sdata);							
								});
							},3000);
					}					 
				}
	
			
				function gg_show_time_add_li(div,path,info){				
					var html = '';					
					html+='<li class="countdown_li">';
						html+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="pic">';
							html+='<img src="'+info.upload+'/'+info.thumb+'">';
						html+='</a>';
					html+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="name">'+info.title+'</a>';
					html+='<div class="countdown_div">';
						html+='<img src="'+info.upload+'/photo/zhong.gif">';
						html+='<span class="wenzi">倒计时:</span>';
						html+='<span class="shi"><span class="minute">00</span>:<span class="second">00</span>:<span class="millisecond">00</span></span>';
						html+='</span>';
					html+='</div>';
					html+='<div class="newawary"></div>';
					html+='</li>';
					
					var uhtml = '';
						uhtml += '<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="pic">';
							uhtml +='<img src="'+info.upload+'/'+info.thumb+'">';
						uhtml +='</a>';
						uhtml+='<a href="'+path+'/dataserver/'+info.id+'" target="_blank" class="name">'+info.title+'</a>';
					uhtml +='<span class="winner">';
						uhtml+='获得者：<strong><a rel="nofollow" class="blue" href="'+path+'/uname/'+info.user.uid+'" target="_blank">';	
						uhtml+=info.user;
					uhtml+='</a></strong>';
					uhtml+='</span>';					
					
					var divl = $("#"+div).find('li');
					var len = divl.length;
					if(len==4){
						divl[len-1].remove();
					}
			
					$("#"+div).prepend(html);
					
					//var div_li_obj = $(".countdown_li").eq(0).find(".shi");
					var div_li_obj = $(".countdown_li .shi").eq(0);
					//setInterval(function(){gg_show_Time_fun(div_obj,info.times);},123);
					var data = new Array();
						data['id'] = info.id;
						data['path'] = path;
					gg_show_Time_fun(info.times,div_li_obj,uhtml,data);			
					
				}
				function gg_show_time_init(div,path,g_id){

			
					if(!g_id)g_id='';
					if(!this.arr)this.arr = new Array();				
					var arr = this.arr;
					
					$.ajaxSetup({
						async : false
					});	     

					$.get(path+"/api/getshop/lottery_shop_json/"+g_id,null,function(sdata){						
							var info = jQuery.parseJSON(sdata);						
							if(info.error=='0'){			
								if(!arr[info.id]){
									g_id =  g_id +','+info.id;		
									arr[info.id] = info.id;
									gg_show_time_add_li(div,path,info);
								}														
							}													
					});					
					
					setTimeout(function(){
							gg_show_time_init(div,path,g_id);				 
					},10000);
					
				}			
				
						   