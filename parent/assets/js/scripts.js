var cstn ='';var cstv =''; 
var extraData ={};
$(document).ready(function(){
	
	


	$(document).on("click", ".delete_child", function(){ 
		var delRowBtn = $(this);
		var s = delRowBtn.attr('data-s');
		swal({   
			title: "Are you sure, want to unassign children ?",   
			text: "You will not be able to recover this record!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Yes, delete it!",   
			closeOnConfirm: false 
		}, function(){   
			var data = {s:s};
				var req = ajxReq(site_url+'/Children/unassign',data,'POST','json');
				req.done(function(data){
					debugger;
					if(data.success){			
						 window.location=site_url+'/Children';													
						$("#msg").html(data.msg);
					}
				});
		});
		
		return false;
	});

	
	
	
	 $("#section_id").change(function(){
		var id = $(this).val();
		$.ajax({
			url:site_url+'/Children/ajGetLessons',
			data:{section_id:id},
			type:'post',
			success:function(res){
				$('#lesson_id').html(res);	
			}
		});
	});
	
    $("#rfs_parent_form").validate({
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
					$("#msg").html(j.msg);	
			
					/*goTop();*/	
					if(j.status)
						$("#rfs_parent_form").find("input[type=text],input[type=email],input[type=password]").val("");
						$("#msg").html(j.msg);
						
						if(j.url!=undefined && j.url!=''){
							/* goTop(); */
							setTimeout(function() {
							   window.location.href = j.url
							  }, 1000);
							  
							  
							  
							/* window.location=j.url;	 */						
						
					}else{
						$("#msg").html(j.msg);
						goTop();
					}
				}
			}); 
			return false;
		}
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
			confirmButtonColor: "#DD6B55",   
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
	
  
  	/* Super Admin Reports Code */
	$(document).on('click','.getData',function(){
	/*alert();*/
	
	$(this).children('.fa').addClass('fa-spin');
	
	var report_type = $("#report_type").val();
	var start = $('#from').val();
	var end = $('#to').val();
	var feedbackfor = $('#feedbackfor').val();
	
	var student_id = $('#student_id').val();
	
	
	
	
	
	var action = site_url+'/Children/getData';
	var searchReq = ajxReq(action,{report_type:report_type,start:start,end:end,student_id:student_id},'post','json');
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
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
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

