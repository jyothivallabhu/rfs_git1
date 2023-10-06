var cstn ='';var cstv =''; 
var extraData ={};

jQuery.validator.addMethod("emailExt", function(value, element, param) {
    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
},'Your E-mail is wrong');

jQuery.validator.addMethod("lettersonly", function(value, element, param) {
  return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Please enter  Alphabets only"); 


$('.lettersonly').keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
		   
        }
        else {
            e.preventDefault();
            return false;
        }
    });
	
$(document).ready(function(){

	 $("#rfs_Adduser_form").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#rfs_Adduser_form").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);			
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	 $("#edit_user_form").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);				
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	 $("#reset_password").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					console.log(j);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					$("#reset_password").find("input[type=text],input[type=email],input[type=password]").val("");
					if(j.status){					
						$("#msg").html(j.msg);
							setTimeout(function() {
							   window.location.href = j.url;
							  }, 1000);	
							  
						if(j.url!=undefined && j.url!=''){
							
										
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
	 $("#add_mentors").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_mentors").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);			
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	 $("#edit_mentor").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);					
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	 $("#add_school").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_school").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	 $("#edit_school").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".state").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
	
	 $("#add_schooladminForm").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_schooladminForm").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	 $("#edit_schooladminForm").validate({
		  rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".state").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
	
	 $("#add_schoolMentors").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_schoolMentors").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#add_userForm").validate({
		 rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_userForm").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#edit_class").validate({
		rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#add_class").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_class").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});
	$("#update_class").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#update_class").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#edit_schoolManagement").validate({
		rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
	
	$("#add_schoolteachers").validate({
		rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_schoolteachers").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#edit_schoolteachers").validate({
		rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(".modules").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#add_student").validate({
		/* rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		}, 
		validClass: "success",*/
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_student").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#edit_student").validate({
		/* rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success", */
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(".modules").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
	$("#add_parent").validate({
		rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_parent").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#edit_parent").validate({
		rules:{
			email:{
				required:true,
				emailExt: true
			}
		},
		messages:{
			email:'Please enter valid email',
		},
		validClass: "success",
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(".modules").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#assign_lessons").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#assign_lessons").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#add_lessonSchedule").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_lessonSchedule").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#lessons_add_form").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#lessons_add_form").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#lesson_edit_form").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(".checkbox").removeAttr('disabled');
		$(".modules").removeAttr('disabled');
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(4000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);							
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
		$("#teacher_trial_form").validate({
		/* rules: {
            artwork_upload1: {required: true, accept: "image/jpg,image/jpeg,image/png,image/gif"}
        }, */
		
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
					 $("#trail_submit").attr("disabled", true);
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#teacher_trial_form").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#teacher_mentoring").validate({
		 
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
					
					var loading_img = site_url+'/assets/images/loading_blue.gif';
					
					$('#loading-div').html('<img src="'+loading_img+'" style="width: 25%;" />');
					
					
					$("#teacher_mentoring_submit").attr("disabled", true); 
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					$('#loading-div').html('');
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#teacher_mentoring").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#roll_overForm").validate({
		submitHandler:function(form){	
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
					$('.loading').show();
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					$('.loading').hide();
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#roll_overForm").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							//window.location=j.url;	

							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						  
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	function tinymceValidation() {
		var content = tinyMCE.activeEditor.getContent();
		if (content === "" || content === null) {
			$("#feedbackValid").html("<span style='color:red'>Please enter feedback statement</span>");
		} else {
			$("#feedbackValid").html("");
		}
	}

	
	$("#feedbackform").validate({
		submitHandler:function(form){	
		 tinymceValidation();
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#feedbackform").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	$("#adminfeedbackform").validate({
		
		submitHandler:function(form){	
		 /* tinymceValidation(); */
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#adminfeedbackform").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
	
	$("#mentor_monthly_mentoring_form").validate({
		submitHandler:function(form){	
		 tinymceValidation();
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#mentor_monthly_mentoring_form").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	$("#add_activities").validate({
		submitHandler:function(form){	
		/*  tinymceValidation(); */
		cstn = $("#cstn").val();
		cstv = $("#cstv").val();
		extraData[cstn]=cstv;
		$(form).ajaxSubmit({
				data:extraData,
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;						
				},
				success: function() {
						debugger;						
				},
				complete: function(xhr) {
					var j = JSON.parse(xhr.responseText);
					setcst(j.cst);
					$("#msg").show("slow").delay(5000).hide("slow");
					$("#msg").html(j.msg);		
					/*goTop();*/	
					if(j.status){					
						$("#add_activities").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						if(j.url!=undefined && j.url!=''){
							
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
						}
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
					
				}
			}); 
			return false;
		}
	});	
	
	
	  $(document).on('click',".delete_class",function(){
		var elm = $(this);
		var i = elm.data('did');
		var t = elm.data('tbl');
		var c = elm.data('ctrl');
		var sid = elm.data('sid');
		swal({   
			title: "Do you want to delete this record ?",   
			text: "",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Yes",   
			closeOnConfirm: false 
		}, function(){   
			var data = {i:i,sid:sid};
				var req = ajxReq(site_url + "/" + c + "/del", data, "POST", "json");
				req.done(function(data){
					debugger;
					if(data.success){	
						swal.close()	
						//$("#msg").html(data.msg);
						$(this).parents("tr").hide();
						$("#msg").show("slow").delay(5000).hide("slow");
						$("#msg").html(data.msg);
						 setTimeout(function() {
						   window.location.href = window.location.href = data.url
						  }, 1000);
																			
						
					}
				});
		});
	});	
	
	
   $(document).on("click", ".del", function () {
    var i = $(this).data("i");
    var t = $(this).data("t");
    var c = $(this).data("c");
    if (
      i != "" &&
      i != undefined &&
      t != "" &&
      t != undefined &&
      c != "" &&
      c != undefined
    ) {
     
	       swal({   
			title: "Would you like to delete",   
			text: "",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#8CD4F5",   
			confirmButtonText: "Yes",   
			closeOnConfirm: false 
		}, function(){   
			var data = {i:i};
				 var req = ajxReq(site_url + "/" + c + "/del", data, "POST", "json");
				req.done(function(data){
					debugger;
					if(data.success){		
						window.location=site_url+'/'+c+'';													
						$("#msg").html(data.msg);
					}
				});
		});
    }
  });
  
  $(document).on("click", ".customdel", function () {
    var i = $(this).data("i");
    var t = $(this).data("t");
    var c = $(this).data("c");
    if (
      i != "" &&
      i != undefined &&
      t != "" &&
      t != undefined &&
      c != "" &&
      c != undefined
    ) {
     
	       swal({   
			title: "Would you like to delete",   
			text: "",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#8CD4F5",   
			confirmButtonText: "Yes",   
			closeOnConfirm: false 
		}, function(){   
			var data = {i:i};
				 var req = ajxReq(site_url + "/" + c + "/del", data, "POST", "json");
				req.done(function(data){
					debugger;
					if(data.success){		
						window.location.href = data.url												
						$("#msg").html(data.msg);
					}
				});
		});
    }
  });
  
  
  
	 $("#school_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/mentor_monthly_mentoring/ajGetClasses',
			data:{school_id:id},
			type:'post',
			success:function(res){
				$('#class_id').html(res);	
			}
		});
	});
	
	
	 $("#class_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/mentor_monthly_mentoring/ajGetLessons',
			data:{class_id:id},
			type:'post',
			success:function(res){
				$('#lesson_id').html(res);	
			}
		});
	});
  	
	$("#lessonsClass_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/teacher_dashboard/ajGetLessonsList',
			data:{class_id:id},
			type:'post',
			success:function(res){
				$('#lessonslist').html(res);	
			}
		});
	});
  	
	$("#artworkClass_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/teacher_dashboard/ajGetLessons',
			data:{class_id:id},
			type:'post',
			success:function(res){
				$('#artworkLessonId').html(res);	
			}
		});
	});
  	
	$("#artworkLessonId").change(function(){
		var id = $(this).val();
		/* var artworkClass_id = $('#artworkClass_id').val(); */
		var artworkClass_id    = $( "#artworkClass_id option:selected" ).val();
		$.ajax({
			url:site_url+'/teacher_dashboard/ajGetArtworkslist',
			data:{class_id:artworkClass_id,lesson_id:id},
			type:'post',
			success:function(res){
				$('#artworksList').html(res);	
			}
		});
	});
	
	$("#school_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/Admin_reports/ajGetTeachers',
			data:{school_id:id},
			type:'post',
			success:function(res){
				$('#school_teachers').html(res);	
			}
		});
	});
	
	$("#school_teachers").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/Admin_reports/ajGetTeacherassignedClasses',
			data:{teacherID:id},
			type:'post',
			success:function(res){
				$('#class_id').html(res);	
			}
		});
	});
	
	 $("#lesson_library_school_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/mentor_monthly_mentoring/ajGetClasses',
			data:{school_id:id},
			type:'post',
			success:function(res){
				$('#lesson_library_class_id').html(res);	
			}
		});
	});
	 $("#artwork_school_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/mentor_monthly_mentoring/ajGetClasses',
			data:{school_id:id},
			type:'post',
			success:function(res){
				$('#artwork_class_id').html(res);	
			}
		});
	});
	
	$("#grade_school_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/mentor_monthly_mentoring/ajGetClasses',
			data:{school_id:id},
			type:'post',
			success:function(res){
				$('#grade_class_id').html(res);	
			}
		});
	});
	$("#grade_school_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/Admin_reports/ajGetGrades',
			data:{school_id:id},
			type:'post',
			success:function(res){
				$('#grade_term').html(res);	
			}
		});
	});
	
	$("#sclass_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/students/ajGetClasses',
			data:{class_id:id},
			type:'post',
			success:function(res){
				$('#gsection_id').html(res);	
			}
		});
	});
	
	$("#sclass_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/teacher_dashboard/ajGetLessons',
			data:{class_id:id},
			type:'post',
			success:function(res){
				$('#lesson_id').html(res);	
			}
		});
	});
	
	$("#gradeentry_class_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/students/ajGetClasses',
			data:{class_id:id},
			type:'post',
			success:function(res){
				$('#gsection_id').html(res);	
			}
		});
	});
	
	$("#gradeentry_class_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/teacher_dashboard/ajGradeGetLessons',
			data:{class_id:id},
			type:'post',
			success:function(res){
				$('#lesson_id').html(res);	
			}
		});
	});
	
	
	
	
	$("#trailClassId").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/teacher_dashboard/ajTrailCounts',
			data:{class_id:id},
			type:'post',
			success:function(res){
				re = JSON.parse(res);
				$('#trailsubmittedcount').html(re.trailsubmittedcount);
				$('#trailnotstartedcount').html(re.trailnotstartedcount);
				$('#trailapprovedcount').html(re.trailapprovedcount);
			}
		});
	});
	$("#countiniousmentoringclassID").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/teacher_dashboard/ajCMentoringCounts',
			data:{class_id:id},
			type:'post',
			success:function(res){
				re = JSON.parse(res);
				$('#mentoringsubmitted').html(re.mentoringsubmitted);
				$('#mentoringapproved').html(re.mentoringapproved);
			}
		});
	});
	
	
	
	
	$("#gsection_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/students/ajGetSectionStudents',
			data:{section_id:id},
			type:'post',
			success:function(res){
				$('#student_id').html(res);	
			}
		});
	});
	
	
	
	
	
	$('#feedbackDiv').hide();
	$('#escalationDiv').hide();
	$('#usage_tracking').hide();
	$('#lesson_library').hide();
	$('#artwork_report').hide();
	$('#grade_report').hide();
	$(document).on('change','#report_type',function(){
	var keyword = $("#report_type").val();
	
	if(keyword=='feedback'){
		$('#feedbackDiv').show();
	}else{
		$('#feedbackDiv').hide();
		
	}
	if(keyword=='escalation_report'){
		$('#escalationDiv').show();
	}else{
		$('#escalationDiv').hide();
	}
	if(keyword=='usage_tracking'){
		$('#usage_tracking').show();
	}else{
		$('#usage_tracking').hide();
	}
	if(keyword=='lesson_library'){
		$('#lesson_library').show();
	}else{
		$('#lesson_library').hide();
	}
	
	if(keyword=='artwork_report'){
		$('#artwork_report').show();
	}else{
		$('#artwork_report').hide();
	}
	
	if(keyword=='grade_report'){
		$('#grade_report').show();
	}else{
		$('#grade_report').hide();
	}
	
	
	
});

  	/* Super Admin Reports Code */
	$(document).on('click','.getData',function(){
	/*alert();*/
	
	$(this).children('.fa').addClass('fa-spin');
	
	var report_type = $("#report_type").val();
	var start = $('#from').val();
	var end = $('#to').val();
	var feedbackfor = $('#feedbackfor').val();
	var school_id ='';
	var teacherID = $('#school_teachers').val();
	
	var feedback_status = $('#feedback_status').val();
	var esfeedbackfor = $('#esfeedbackfor').val();
	var school_roles = $('#school_roles').val();
	var class_id = $('#class_id').val();
	
	if(report_type == 'feedback'){
		var school_id = $('#school_id').val();
		var class_id = $('#class_id').val();
	}else if(report_type == 'escalation_report'){
		var school_id = $('#school_id').val();
	}else if(report_type == 'usage_tracking'){
		var school_id = $('#track_school_id').val();
	}else if(report_type == 'lesson_library'){
		var school_id = $('#lesson_library_school_id').val();
		var class_id = $('#lesson_library_class_id').val();
	}else if(report_type == 'artwork_report'){
		var school_id = $('#artwork_school_id').val();
		var class_id = $('#artwork_class_id').val();
	}
	else if(report_type == 'grade_report'){
		var school_id = $('#grade_school_id').val();
		var class_id = $('#grade_class_id').val();
		var exam_type = $('#exam_type').val();
		
	}
		
		var section_id = $('#gsection_id').val();
		var lesson_id = $('#lesson_id').val();
		var grade_term = $('#grade_term').val();
		var grade_report_type = $('#grade_report_type').val();
	
	
	
	var action = site_url+'/Admin_reports/getData';
	var searchReq = ajxReq(action,{report_type:report_type,start:start,end:end,feedbackfor:feedbackfor,school_id:school_id,teacherID:teacherID,class_id:class_id,feedback_status:feedback_status,esfeedbackfor:esfeedbackfor,school_roles:school_roles,grade_term:grade_term,grade_report_type:grade_report_type,section_id:section_id,lesson_id:lesson_id,exam_type:exam_type},'post','json');
	searchReq.done(function(j){
		$('.getData').children('.fa').removeClass('fa-spin');
			if(j.success){
				
				$("table#dataTables-example").remove();
				$("table#tot_wrk").remove();
				$("div.dt-buttons").remove();
				$("div.dataTables_info").remove();
				$("div.dataTables_paginate").remove();
				$("div.repStats").html('');
				$("div.repStats").append('</table><table id="dataTables-example" class="table table-striped table-bordered dt-responsive nowrap repOutput"></table><table id="tot_wrk"  class="table table-striped table-bordered dt-responsive nowrap repOutput1">');
				$(".repOutput").html(j.tbl);
				$(".repOutput1").html(j.tot);
				$('#dataTables-example').DataTable({
					dom: 'Brtip',
					buttons: /* [
						'copy', 'csv', 'excel', 'pdf', 'print'
					] */
					[
						{
							extend: 'csv',
							filename: report_type,
							text: 'csv',
												
						},
						{
							extend: 'excel',
							filename: report_type,
							text: 'excel',							
						},
						{
							extend: 'pdf',
							filename: report_type,
							text: 'pdf',
							/* title:	report_type.replace("_", " ").toUpperCase(), */								
							customize: function (doc) {
                        var rdoc = doc;
                        var rcout = doc.content[doc.content.length - 1].table.body.length - 1;
                        doc.content.splice(0, 1);
                        var now = new Date();
                        var jsDate = now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear() + '  and Time:' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();
                        doc.pageMargins = [30, 90, 30, 30];
                        doc.defaultStyle.fontSize = 8;
                        doc.styles.tableHeader.fontSize = 9;
                        doc.content[doc.content.length - 1].table.headerRows = 2;
                        /* for (var i = 0; i < rcout; i++) {
                            var obj = doc.content[doc.content.length - 1].table.body[i + 1];
                            doc.content[doc.content.length - 1].table.body[(i + 1)][0] = { text: obj[0].text, style: [obj[0].style], bold: true };
                            doc.content[doc.content.length - 1].table.body[(i + 1)][3] = {
                                text: obj[3].text,
                                style: [obj[3].style],
                                alignment: 'center',
                                bold: obj[3].text > 60 ? true : false,
                                fillColor: obj[3].text > 60 ? 'red' : null
                            };

                        } */

                        doc['header'] = (function (page, pages) {
                            return {
                                table: {
                                    //widths: ['100%'],
                                    widths: ['auto', 'auto'],
                                    headerRows: 0,
                                    body: [
                                        [
                                            {
                                                text: report_type.replace("_", " ").toUpperCase(), alignment: 'center', fontSize: 14, bold: true, width: 'auto',
                                                 margin: [30, 5, 50, 30]
                                            },
											{
                                                margin: [0, 0, -140, 0],
                                                width: 100,//'auto',
                                                alignment: 'right',
                                                //image: 'data:image/png;base64,' + logo,
                                                image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAYkAAACQCAYAAAD9c5daAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQ1IDc5LjE2MzQ5OSwgMjAxOC8wOC8xMy0xNjo0MDoyMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTkgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MTZCNzUwNUU4MEU0MTFFQThCQUFDNzkzQzM4NDM5MTciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QjNEQzRDNkE4MTIzMTFFQThCQUFDNzkzQzM4NDM5MTciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxNkI3NTA1QzgwRTQxMUVBOEJBQUM3OTNDMzg0MzkxNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxNkI3NTA1RDgwRTQxMUVBOEJBQUM3OTNDMzg0MzkxNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PpyiFIgAAFUpSURBVHja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',
                                                //image: './ReddyInfoSoft.png'
                                            }
                                            
                                        ],
                                        
                                    ]
                                },
                                layout: 'noBorders',
                                margin: 30
                            }
                        });

                        

                        var objLayout = {};
                        objLayout['hLineWidth'] = function (i) { return .8; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 5; };
                        objLayout['paddingRight'] = function (i) { return 35; };
                        doc.content[doc.content.length - 1].layout = objLayout;

                    }
						},
					
					]
				});
			}else{
				$(".repOutput").html(j.msg);
				$(".repOutput1").html('');
				$(".repStats").html('<span style="color:red;font-size:18px">'+j.msg+'</span>');
			}
	});
});
	
		
});

