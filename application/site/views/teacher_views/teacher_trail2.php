

<style>

/* li.nav-item.dropdown {
    margin-top: 5px;
}
ul.navbar-nav {
    font-size: 15px;
} */
</style>
<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row col-12 align-items-md-center">
					
					<div class="col-md-6 col-8">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Teacher Trial</a>
						</h3>
					
					</div>
					<div class="col-md-6 col-4 m-t-15 text-right">
						<div class="text-md-right">
						   <a href="<?= base_url().$this->url_slug.'/add_teacher_trial'?>" class="btn btn-primary">
							<i class="anticon anticon-plus"></i>
							<span class="m-l-5">Add</span>
						    </a>
						</div>
					</div>
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				
					<div class="card">
						<div class="card-body"> 
						
						<div class="d-flex justify-content-between align-items-center m-b-10">
								
								<div class="d-flex">
									
									<!--<div class="m-r-15">
										<select onchange="searchFilter()"  id="class_id" name="class_id" class="form-control">
										<option value="">Class</option>
											<?php
											if ($classes['num'] > 0) {
											foreach($classes['data'] as $class)
											{
											?>
											 <option value="<?php echo $class['c_id']  ;?>"><?php echo $class['class_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Class Data Found</option>';
											}
											?>
										</select>
									</div>-->
								</div>
				
							</div>
						
						
							<div class="table-responsive">
							

								<table class="table table-bordered table-hover footable" id="table"  data-module="teacher_trial" data-section_id="" data-class_id="" >
									<thead>
									   <tr>
										
										<th >Class</th>
										<th >Trial</th>
										<th >Actions</th>
										<th data-hide="phone">Uploaded on </th> 
										<th data-hide="phone">Feedback </th>
										
										
									   </tr>
									</thead>
                                    <tbody id="teacher_trial">
									<?php 
									if(!empty($resp)){
									foreach($resp as $res){
										
									 
										if($res->feedback=='1'){
											$feedbackstatus = '<span class="badge badge-pill badge-primary font-size-12">Given</span>';	
										}else{
											$feedbackstatus = '<span class="badge badge-pill badge-primary font-size-12">Pending</span>';	
										}
			
										?>
										 <tr>
											<td><?= $res->class_name  ?></td>
											<td><img src="<?= $res->image_path  ?>" height="60" width="60" />
											<br><?= $res->lesson_name  ?></td> 
											
											<td class="sm_grid"><a href="<?=base_url($this->url_slug.'/view_teacher_trial/'.$res->id )?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="<?= base_url($this->url_slug.'/edit_teacher_trial/'.$res->id )?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" data-t="trial_and_mentoring" data-i="<?= $res->id  ?>" data-c="teacher_trial" class="btn btn-danger btn-sm customdel"><i class="fa fa-trash"></i></a></td>
											<td><?= date('d M Y', strtotime($res->created_at )) ?></td>
											<td><?= $feedbackstatus ?></td>
										 </tr>
										<?php
									}
									}else{
										echo '<td colspan="5" style="text-align: center;">No Data Found</td>';
									}
									?>
									
									
									</tbody>
								</table> 
							</div>
						</div>
					</div>
				</div>
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

<style>

@media only screen and (max-width: 992px) {
	.sm_grid{
		display: inline-grid;
	}
}

/* 
.sm_grid{
		display: table-cell;
	}
	
	@media only screen and (min-width:320px)  { 
		.sm_grid{
		display: inline-grid;
	}
	}
@media only screen and (min-width:480px)  {
	.sm_grid{
		display: inline-grid;
	}
}
	 */
	
	/*  ul.navbar-nav.mr-auto.mt-2.mt-lg-0 {
    position: relative;
    top: 12px!important;
}
li.nav-item.active {
    position: relative;
    top: 4px;
} */

</style>

<style>
				.badge-gold{
					background-color: #ffc107 !important;
					color: #fff !important;
				}
				
				// li.nav-item.active {
					// position: relative;
					// top: 5px;
				// }

/*ul.navbar-nav.mr-auto.mt-2.mt-lg-0 {
    position: relative;
    top: 15px;
}*/

body
{
	font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", "Helvetica Neue", Helvetica, Arial, sans-serif!important;
	    background-color: #f9fbfd!important;
}

.navbar {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    padding: 0.5rem 1rem;
        padding: 8px;
}
ul.navbar-nav.mr-auto.mt-2.mt-lg-0 a.nav-link {
    padding-right: 10px!important;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 14px 15px!important;
    margin-left: -1px;
    border:none!important;
   
}

.pagination>li>a, .pagination>li>span {
    line-height: 0.428571!important;

}

.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    color: #23527c;
    background-color: #fff!important;
    border-color: #fff!important;
}
.pagination .page-item.active .page-link:hover {
    color: #fff!important;
    background: #3f87f5!important;
}
.page-item:last-child .page-link {
    padding-top: 12px!important;
}
.page-header
{
	border:none!important;
}
.page-header.no-gutters h3 {
    font-size: 22px!important;
}
.page-header.no-gutters h3 a
{
    text-decoration: none!important;
}
.page-container .page-header.no-gutters {
    background-color: #fff;
    padding: 10px 30px 27px 30px!important;
}
				</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/footable.core.css'>


   <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/footable.js'></script>



<!-- booottsrap4 -->

<!-- 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




	<script src="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.min.js"></script>

	<script src="<?= base_url('assets') ?>/vendors/select2/select2.min.js"></script>
	<script src="<?= base_url('assets') ?>/dist/js/jquery.validate.js"></script>
  <script src="<?= base_url('assets') ?>/dist/js/comns.js"></script>
  <script src="<?= base_url('assets') ?>/dist/js/lc.js"></script>
  <script src="<?=base_url('assets')?>/dist/js/scripts.js"></script>
  
  
  <script>
   $('.footable').footable({
  calculateWidthOverride: function() {
    return { width: $(window).width() };
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
  

function searchFilter(page_num) {			 
		
		$("#filter-labels").html('');
		var module = $("#table").data('module');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var sortby  = $( "#sortby option:selected" ).val();
		//var perpage    = $( "#perpage option:selected" ).val();
		var perpage    = 10;
		var academic_year    = $( "#academic_year option:selected" ).val();
		var class_id    = $( "#class_id option:selected" ).val();
		var lesson_id    = $( "#lesson_id option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: site_url+'/'+module+'/ajaxpagination/'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,academic_year:academic_year,class_id:class_id,lesson_id:lesson_id},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				console.log(res);
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#'+module).html(res.html);
			}
		});
	}
  </script>