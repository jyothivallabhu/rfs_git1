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
			var fdata = $(form).serialize();
			var action = site_url+'/Login/validate';
			$.ajax({
				url:action,
				data:fdata,
				type:'post',
				success:function(res){					
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
	$("#signup_form").validate({
		rules:{
	        first_name:{
				required:true
			},
	        password:{
				required:true
			}
		},
		messages:{
			first_name:'Please enter first name',
			password:'Please enter password',
		},
		submitHandler:function(form){
			var fdata = $(form).serialize();
			var action = site_url+'/Register/create';
			$.ajax({
				url:action,
				data:fdata,
				type:'post',
				success:function(res){					
					var j=JSON.parse(res);		
					setcst(j.cst);
					if(j.status==1){						
						$("#signup_form").find("input[type=email],input[type=password]").val("");
						$("#signup_msg").html(j.msg);
					  window.location=j.url;
					}else if(j.status==0){							
						$("#signup_msg").html(j.msg);
					}
					
				}
			});
			return false;
		}
	});
		$("#change_form").validate({
		rules:{
			'cur_pass':{
				required:true
			},
			'new_pass':{
				required:true,
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
					if(j.status==1){						
						$("#change_form").find("input[type=text],textarea,select").val("");
						$("#change_msg").html(j.msg);
						window.location=site_url+'/logout?m=pass';
					
					}else if(j.status==0){							
						$("#change_msg").html(j.msg);
						goTop();
					}
					
				}
			});
			
			return false;
		}
	});			$("#forgot_form").validate({				rules:{		        email:{				required:true,				email:true			}			},		submitHandler:function(form){			var fdata = $(form).serialize();			$.ajax({				url:site_url+'/forgotpwd/validate',				data:fdata,				type:'post',				success:function(res){										var j=JSON.parse(res);					setcst(j.cst);											$("#forgot_msg").html(j.msg);					if(j.status==1){												$("#forgot_form").find("input[type=email],input[type=password]").val("");						 /*window.location=site_url+'/forgotpwd/newpwdset';*/					 }else if(j.status==0){																		}									}			});						return false;		}			});		$("#forgot_pwd_form").validate({		rules:{			'new_pass':{				required:true,				minlength:5,				maxlength:8			},			're_pass':{				required:true,				equalTo:'#new_pass'			}		},		submitHandler:function(form){			var formData = $(form).serialize();			var action = $(form).attr("action");			$.ajax({				url:action,				data:formData,				type:'post',				success:function(res){					var j=JSON.parse(res);						setcst(j.cst);														$("#frgt_msg").html(j.msg);					if(j.status==1){												$("#forgot_pwd_form").find("input[type=text],textarea,select").val("");						$("#frgt_msg").html(j.msg);						window.location=site_url+'/login';										}else if(j.status==0){													goTop();					}									}			});						return false;		}	});	
});

