
			
			
			 <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">School Mentors - <?= $schools->name ?></a>
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
        
   <h2>School Mentors - <?= $schools->name ?></h2>
   
 <?php } ?>
			
			<div id="msg"></div>
			
            <div class="card" id="app">
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
									<div class="col-md-3">
										<select class="form-control" onchange="searchFilter1()" id="status">
											<option value=''>Status</option>
											<option value="1" selected>Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>									
									<input type="hidden" value="<?= $schools->id ?>" name= "school_id" id="school_id" >
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

						<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
                        <div class="dropdown ms-auto">
						<?php 
						if(isset($this->school_id) && $this->school_id !=''){
							$urlid = '';
						}else{
							$urlid =$this->uri->segment(2);
						} ?>
						
                            <a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_mentors/add/'.$urlid) ?>">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Assign School Mentor
                                </button>
                            </a>
                        </div>
							<?php //} ?>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table table-custom table-lg">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>



                        </tr>
                    </thead>
                    <tbody id="mentorsList">
                        <?php 
						if(!empty($mentors)){
						foreach ($mentors as $key => $value) {
                            $status_badge = 'bg-success';
                            $status = 'Active';
                            if ($value->status == '0'){
                                $status_badge = 'bg-warning';
                                $status = 'Inactive';
							}
                        ?>
                            <tr>
							<td><img src="<?=  $value->image_path ?> " height="60" width="60"  /> </td>
                                <td><?= $value->first_name ?> <?= $value->last_name ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->phone ?></td>
                                <td>
                                    <span class="badge <?= $status_badge ?>"><?= ucfirst($status) ?></span>
                                </td>
								<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            
                                            <!--<a href="<?= base_url('school_mentors/delete_school_mentor/') . $value->school_id .'/'.$value->id  ?>" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to Delete?');">Delete</a>-->
                                            
											<a href="javascript:void(0);"  data-did="<?= $value->id ?> " data-sid = "<?= $value->school_id  ?>" data-tbl="users" data-ctrl="school_mentors"  class="dropdown-item text-danger delete_class">Delete</a>
											
											
                                        </div>
                                    </div>
                                </td>
								<?php //} ?>
					
                            </tr> <?php 
							
							}
						}else echo 'No Data to display';
						
							?>
                    </tbody>
                </table>
				<div id="pagination"><?=$pagination?></div>
				<span id="showing_text"><?=$showing_text?></span>
            </div>



        </div>
    </div>

</div>

<script>
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
			url: '<?=base_url("/school_mentors/ajaxPaginationSMentorData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,school_id:school_id,status:status},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#mentorsList').html(res.html);
			}
		});
	}
</script>