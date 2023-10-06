<!-- content -->
<!--<div class="col-md-9">
   <div class="row g-4 mb-4">
            <h2>School Management - <?= $schools->name ?></h2>
			<?=($this->session->flashdata('msg'))?'<div id="msg">'.$this->session->flashdata('msg').'</div>':''?>
			
			<div id="msg"></div>-->
			
			 <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> School Management - <?= $schools->name ?></a>
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
				   <h2>School Management - <?= $schools->name ?></h2>
				   
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
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" name= "keyword" id="keyword" onkeyup ="searchFilter1()">
												 <input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= $schools->id ?>" required>
                                                <button class="btn btn-outline-light" type="button">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<?php 
						if(isset($this->school_id) && $this->school_id !=''){
							$urlid = '';
						}else{
							$urlid =$this->uri->segment(2);
						} ?>
						
						<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
                            <div class="dropdown ms-auto">
                                <a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_management/add_user/'.$urlid) ?>">
                                    <button class="btn btn-outline-primary">
                                        <i class="bi bi-plus-circle me-2"></i> Add School Management
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
                                <th>Designation</th>
                                <th>Access</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody id="postList">
                            <?php 
							if(!empty($school_management)){
							foreach ($school_management as $key => $value) {
                                # code...
                                $status_badge = 'bg-success';
                                if ($value->status == '0')
                                    $status_badge = 'bg-warning';
                                $modules  = $this->user->get_modules($value->modules)[0];
                                
								 $m =$modules->module;

                            ?>
                                <tr>
									<td><img src="<?=  $value->image_path ?> " height="60" width="60"  /> </td>
                                    <td><?= $value->first_name ?> <?= $value->last_name ?></td>
                                    <td><?= $value->email ?></td>
                                    <td><?= $value->phone ?></td>
                                    <td><?= $value->designation ?></td>
                                    <td><?= $m   ?></td>
                                    <td>
                                        <span class="badge <?= $status_badge ?>"><?= ($value->status == 1)? 'Active':'Inactive' ?></span>
                                    </td>
									<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                               <!-- <a href="<?= base_url('admin/user/') ?>" class="dropdown-item">View</a>-->
                                                <a href="<?= base_url('school_management/edit_user/').$schools->id.'/'. $value->id ?>" class="dropdown-item">Edit</a>
                                                <a href="<?= base_url('school_management/reset_password/') . $value->id ?>" class="dropdown-item">Reset Password</a>
												
												 
												<a href="javascript:void(0);"  data-did="<?= $value->id ?>" data-sid = "<?= $value->school_id ?>" data-tbl="users" data-ctrl="school_management"  class="dropdown-item text-danger delete_class">Delete</a>	
                                               
												
                                            </div>
                                        </div>
                                    </td>
									<?php //} ?>


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

</div>
<!-- ./ content -->

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
			url: '<?=base_url("/school_management/ajaxPaginationData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,school_id:school_id,status:status},
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