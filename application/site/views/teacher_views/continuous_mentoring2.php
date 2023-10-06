
<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 col-8">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Continuous Mentoring</a>
						</h3>
					
					</div>
					<div class="col-md-6 col-4 text-right m-t-15">
						<div class="text-md-right">
						    <a href="<?= base_url().$this->url_slug.'/teacher_mentoring/add_cmentoring' ?>" class="btn btn-primary">
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
										<select class="form-control" onclick="searchFilter()" id="perpage">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
									</div>-->
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
								<table class="table table-bordered table-hover footable" id="table"  data-module="teacher_continuous_mentoring" data-section="" >
									<thead>
										<tr>
										<th >Class</th>
										<th >Lesson</th>
										<th data-hide="phone">Stage  </th>
										<th data-hide="phone">Status</th>
										<th >Actions</th>
										<th data-hide="phone">Feedback </th>
										<th data-hide="phone">Date</th>
										</tr>
									</thead>
                                    <tbody id="teacher_continuous_mentoring">
									
										<?php
										if(!empty($list)){
											foreach ($list as $req) { 
												/* if ($req->status=='1'){
													$status = 'Submitted';
												} elseif ($req->status=='2'){
													$status = 'Approved';
												} else{
													$status ='Not Started';
												}
										
												if($req->status=='1'){
													$status = '<a class="badge badge-pill badge-cyan font-size-12">'.$status.'</a>';	
												}else{
													$status = '<a class="badge badge-pill badge-gold font-size-12">'.$status.'</a>';	
												} */
												
												if($req->status=='1'){
													$status = '<span class="badge badge-pill badge-gold">Submitted</span>';	
												}elseif ($req->status=='2'){
													$status = '<span class="badge badge-pill badge-green">Approved</span>';	
												} else{
													$status = '<a class="badge badge-pill badge-gold font-size-12">Not Started</a>';	
												}
												
												if($req->feedback=='1'){
													$feedbackstatus = '<a class="badge badge-pill badge-cyan font-size-12">Given</a>';	
												}else{
													$feedbackstatus = '<a class="badge badge-pill badge-gold font-size-12">Pending</a>';	
												}
				
											?>
												
												<tr>
													<td><?= $req->class_name?></td>
													<td><?=$req->lesson_name ?></td>
													<td><?=$req->stage ?></td>
													<td><?=$status ?></td>
													
													
													
													
													<td>
													<a href="<?=base_url($this->url_slug.'/view_mentoring/'.$req->id)?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
													
													<a href="<?=base_url($this->url_slug.'/edit_mentoring/'.$req->id)?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
													
													<a href="javascript:void(0);" data-t="trial_and_mentoring" data-i=<?= $req->id ?> data-c="teacher_continuous_mentoring" class="btn btn-danger btn-sm customdel"><i class="fa fa-trash"></i></a>
													
													<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<a href="<?=base_url($this->url_slug.'/section_artwork/'.$req->section_id)?>" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>-->
													</td>
													
													<td><?= $feedbackstatus ?></td>
													<td><?=date('d M Y', strtotime($req->created_at)); ?></td>

												</tr>
												
												<?php
												
											}
										}else{
											echo "<tr><td>No Data Found</td></tr>";
										}
										?>
									</tbody>
								</table>
								<div id="pagination"><?=$pagination?></div>
								<span id="showing_text"><?=$showing_text?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		   
		    
	       </div>
                <!-- Content Wrapper END -->
				
				
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

              