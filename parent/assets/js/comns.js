/*var site_url = window.location.protocol+'://'+window.location.hostname;*/
var site_url = window.location.origin+'/parent/';
function goTop(){
	 $('body, html').animate({scrollTop: $("#app").offset().top	});
}

function ajxReq(url,data,type,dataType){
	return $.ajax({
		url:url,
		data:data,
		type:type,
		dataType:dataType,
		success:function(res){
			debugger;
			return res;
		}
	});	
}
function setcst(c){
	$("#cstn").val(c.cstn);
	$("#cstv").val(c.cstv);
}	


 $('.showOrHide').click(function(e){
    var target = e.currentTarget
    $(target).hasClass('show')?hidePassword($(target)):showPassword($(target))
})
function hidePassword(e){
    e.removeClass('show').addClass('hide')
	$('#togglePassword').removeClass('bi bi-eye').addClass('bi bi-eye-slash')
    
    e.prev('input').attr('type','password')
}
function showPassword(e){
    e.removeClass('hide').addClass('show')
     $('#togglePassword').removeClass('bi bi-eye-slash').addClass('bi bi-eye')
    e.prev('input').attr('type','text')
}
