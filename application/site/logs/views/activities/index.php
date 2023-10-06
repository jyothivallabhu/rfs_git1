<!--<div class="col-md-9">
   <div class="row g-4 mb-4">
	<h3>School Activities  - <?= $schools->name ?></h3>
	
	<div id="msg">
	</div>-->
	<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> School Activities - <?= $schools->name ?></a>
										</h3>
									
									</div>
									<!--<div class="col-md-6 text-right">
										<div class="text-md-right">
											<a href="" class="btn btn-primary">
											<i class="anticon anticon-plus"></i>
											<span class="m-l-5">Add</span>
											</a>
										</div>
									</div>-->
								   
								</div>
							</div>
							<div class="col-md-12">
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				
				   
				  
				   
				   <div class="row g-4 mb-4">
				   <h2>School Activities - <?= $schools->name ?></h2>
				   
				 <?php } ?>
			<div id="msg"></div>	
		
	
	<div class="card widget" id="app">
		<div class="card">
			<div class="card-body">
				<div class="d-md-flex gap-4 align-items-center">
					<div class="d-md-flex gap-4 align-items-center">
						<div class="mb-3 mb-md-0">
							<div class="row g-3">
								
								<div class="col-md-2">
									<select class="form-control" onchange="searchFilter1()" id="sortby">
										<option>Sort by</option>
										<option value="desc">Desc</option>
										<option value="asc">Asc</option>
									</select>
								</div>
								
								
								<div class="col-md-2">
									<select class="form-control" onchange="searchFilter1()" id="perpage">
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
										<option value="50">50</option>
									</select>
								</div>								
								<input type="hidden" value="<?= $this->uri->segment(2)  ?>" name= "school_id" id="school_id" >	

								<div class="col-md-3">
									<select class="form-control" onchange="searchFilter1()" id="status">
										<option value=''>Status</option>
										<option value="1" selected>Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>						
								<div class="col-md-4">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search" name= "keyword" id="keyword" onkeyup ="searchFilter1()">
										<button class="btn btn-outline-light" type="button">
											<i class="bi bi-search"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php  
							if(isset($_SESSION['login_session']['school_id'])) {
								$addurl = $_SESSION['login_session']['url_slug'].'/activities/add' ;
							}else{
								 $addurl = 'activities/add/'.$schools->id;
							}  ?>


					<div class="dropdown ms-auto">
						<a href="<?= base_url( $addurl) ?>">
							<button class="btn btn-outline-primary">
								<i class="bi bi-plus-circle me-2"></i> Add School Activities
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table table-custom table-lg">
				<thead>
					<tr>
						<th>Activity Date</th>
						<th>Description</th>
						<th>Status</th>

					</tr>
				</thead>
				<tbody id="postList">
					<?php 
					if(!empty($list)){
						foreach ($list as $key => $value) {
						
						# code...
						$status_badge = 'bg-success';
						$status = 'Active';
						if ($value->status == '0'){
							$status_badge = 'bg-warning';
							$status = 'inactive';
						}
							
						?>
						<tr>
							<td><?= $value->activity_date ?></td>
							<td><?= $value->description ?></td>
							<td>
								<span class="badge <?= $status_badge ?>"><?= ucfirst($status) ?></span>
							</td>
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									   
										
										<a href="javascript:void(0);"  data-did="<?= $value->a_id ?> " data-sid = "<?= $value->school_id  ?>" data-tbl="users" data-ctrl="activities"  class="dropdown-item text-danger delete_class">Delete</a>
										
									</div>
								</div>
							</td>

							

						</tr> <?php 
						}
					}else{
						echo 'No Records to display';
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

<!-- ./ content -->

<script>

/* $(document).on('click', '.editschool_admin', function () {    

       var url_slug = $(this).attr('data-url_slug');	 
       var school_id = $(this).attr('data-school_id');	 
       var uid = $(this).attr('data-uid');	 
       $.ajax({
           url: "<?php echo base_url();?>"+url_slug+"/school_admins/edit",
           type: "POST",
           data: {uid: uid, school_id:school_id, url_slug:url_slug},
           success: function (res) {
			   
           }
       });
   }); */

   
   
function searchFilter1(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var school_id         = $("#school_id").val();
		var sortby  = $( "#sortby option:selected" ).val();
		var perpage    = $( "#perpage option:selected" ).val();
		var status    = $( "#status option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/activities/ajaxPaginationData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword, school_id:school_id, status:status},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#postList').html(res.html);
			}
		});
	}
</script>