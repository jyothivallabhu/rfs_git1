$(document).ready(function(){	
	
	$("#signin_form").validate({
		rules:{
	        name:{
				required:true
			},
	        password:{
				required:true
			}
		},
		messages:{
			name:'Please enter username',
			password:'Please enter password',
		},
		submitHandler:function(form){
		//	debugger;
			var fdata = $(form).serialize();
			var action = site_url+'/Login/check_login';
			$.ajax({
				url:action,
				data:fdata,
				type:'post',
				success:function(res){		
					console.log(res);			
					var j=JSON.parse(res);		
					setcst(j.cst);
					if(j.status==1){						
						$("#signin_form").find("input[type=email],input[type=password]").val("");
						$("#signin_msg").html(j.msg);
					  window.location=j.url;
					}else if(j.status==0){							
						$("#signin_msg").html(j.msg);
					}
					
				}
			});
			return false;
		}
	});
$("#forgot_form").validate({
		rules:{
	        email:{
				required:true,
				email:true
			}
		},
		submitHandler:function(form){
			var fdata = $(form).serialize();
			$.ajax({
				url:site_url+'forgotpwd/validate',
				data:fdata,
				type:'post',
				success:function(res){
					
					var j=JSON.parse(res);
					
					setcst(j.cst);				
						$("#forgot_msg").html(j.msg); 
						/*  */
					if(j.status==1){						
						$("#forgot_form").find("input[type=email],input[type=password]").val("");
						 /*window.location=site_url+'/forgotpwd/newpwdset';*/
						 
						 setTimeout(function() {
							   $("#forgot_msg").hide("slow");
							  }, 3000);	
							  
					 }else if(j.status==0){							
						
					}
					
				}
			});
			
			return false;
		}
		
	});
	
	$("#forgot_pwd_form").validate({
		rules:{
			'new_pass':{
				required:true,
				minlength:5,
				maxlength:8
			},
			're_pass':{
				required:true,
				equalTo:'#new_pass'
			}
		},
		submitHandler:function(form){
			var formData = $(form).serialize();
			var action = $(form).attr("action");
			$.ajax({
				url:action,
				data:formData,
				type:'post',
				success:function(res){
					var j=JSON.parse(res);	
					setcst(j.cst);									
					$("#frgt_msg").html(j.msg);
					if(j.status==1){						
						$("#forgot_pwd_form").find("input[type=text],textarea,select").val("");
						$("#frgt_msg").html(j.msg);
						window.location=site_url+'/login';
					
					}else if(j.status==0){							
						goTop();
					}
					
				}
			});
			
			return false;
		}
	});	

});

