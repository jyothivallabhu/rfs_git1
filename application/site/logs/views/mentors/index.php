<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-12 col-md-12">
            <h2>Mentors</h2>
			
			<div id="msg">
				
			</div>
			
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-md-flex gap-4 align-items-center">
                            <div class="mb-3 mb-md-0">
                                <div class="row g-3">
                                    <div class="col-md-2">
                                        <select class="form-select" onchange="searchFilter()" id="sortby">
                                            <option>Sort by</option>
                                            <option value="desc">Desc</option>
                                            <option value="asc">Asc</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-select" onchange="searchFilter()" id="perpage">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
									<div class="col-md-3">
										<select class="form-select" onchange="searchFilter()" id="status">
											<option>Status</option>
											<option value="1" selected>Active</option>
											<option value="0">Inactive</option>
										</select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name= "keyword" id="keyword" onkeyup ="searchFilter()">
                                            <button class="btn btn-outline-light" type="button">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="<?= base_url('mentors/add_mentor') ?>">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Add Mentor
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Schools</th>
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
								
								$mentors = $this->admin->get_mentors_assigned_schoolnames($value->id);
								
                        ?>
                            <tr>
								<td><img src="<?= $value->image_path ;?>" height="60" width="60"  /> </td>
                                <td><?= $value->first_name ?> <?= $value->last_name ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->phone ?></td>
                                <td><?php
								if(isset($mentors[0]->school_name) && $mentors[0]->school_name != ''){ 
									echo $mentors[0]->school_name;						
								}else{
									echo 'No Schools Assigned';
								}
								?></td>
                                <td>
                                    <span class="badge <?= $status_badge ?>"><?= $status ?></span>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!--<a href="<?= base_url('admin/mentors') ?>" class="dropdown-item">View</a>
											<a href="<?= base_url('mentors/delete_mentor/') . $value->id ?>" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to Delete?');">Delete</a>-->
                                            
											<a href="<?= base_url('mentors/edit_mentor/') . $value->id ?>" class="dropdown-item">Edit</a>
                                            <a href="<?= base_url('mentors/reset_password/') . $value->id ?>" class="dropdown-item">Reset Password</a>
											<a  href="javascript:void(0);"  data-did="<?= $value->id ?>" data-tbl="users" data-ctrl="mentors"  class="dropdown-item text-danger delete_class">Delete</a>		
											
											
                                        </div>
                                    </div>
                                </td>

                            </tr> <?php }
						}else{
								echo 'No Data Found';
							}?>
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
function searchFilter(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var sortby  = $( "#sortby option:selected" ).val();
		var perpage    = $( "#perpage option:selected" ).val();
		var status    = $( "#status option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/mentors/ajaxPaginationMentorData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,status:status},
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