$(document).ready(function(){	
	

	$(".allocate_lc_form").validate({
		rules:{
	        customer:{
				required:true
			},
	        quantity:{
				required:true,
				max: function() {
					return parseInt($('#avl').val());
				}
			},
	        expirate_date:{
				required:true
			}
		},
		messages:{
			customer:'Please select Customer',
			quantity:{
				required: 'Please enter Quantity',
				max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
			},
			expirate_date:'Please enter Expiry Date',
		},
		submitHandler:function(form){
           // debugger;
           
			var fdata = $(form).serialize();
			var action = site_url+'/dashboard/save_allocate_lc';
          
			$.ajax({
				url:action,
				data:fdata,
				type:'post',
				success:function(res){	
                    debugger;	
					console.log(res);			
					var j=JSON.parse(res);		
					setcst(j.cst);
					$(".allocate_lc_form").find("input[type=email],input[type=text]").val("");
					if(j.status==1){						
						
						$("#msg").html(j.msg);
					  
					}else if(j.status==0){							
						$("#msg").html(j.msg);
					}
                    $('.modal').modal('toggle');
					
				}
			});
			return false;
		}
	});

	
	$(".allocate_lc_form_org_3").validate({
		rules:{
	        first_name:{
				required:true
			},
			last_name:{
				required:true
			},
	        spending_cap:{
				required:true,
				max: function() {
					return parseInt($('#avl').val());
				}
			},
	        email:{
				required:true,
				email:true
			}
		},
		messages:{
			first_name:'Please enter first name',
			last_name:'Please enter last name',
			spending_cap:{
				required: 'Please enter Quantity',
				max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
			},
			email:'Please enter email',
		},
		submitHandler:function(form){
           // debugger;
           
			var fdata = $(form).serialize();
			var action = site_url+'/dashboard/save_allocate_lc_org_3';
          
			$.ajax({
				url:action,
				data:fdata,
				type:'post',
				success:function(res){	
                    debugger;	
							
					var j=JSON.parse(res);		
					setcst(j.cst);
					$(".allocate_lc_form_org_3").find("input[type=email],input[type=text]").val("");
					if(j.status==1){						
						
						$("#msg").html(j.msg);
					  
					}else if(j.status==0){							
						$("#msg").html(j.msg);
					}
                    $('.modal').modal('toggle');
					
				}
			});
			return false;
		}
	});


});

