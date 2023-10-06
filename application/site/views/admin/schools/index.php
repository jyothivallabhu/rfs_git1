<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-12 col-md-12">
            <h2>Schools</h2>
			
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
											<option value=''>Status</option>
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
                            <a href="<?= base_url('schools/add_school') ?>">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Add School
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
                            <th>School Logo</th>
                            <th>School Name</th>
                            <th>City</th>
                            <th>Mentors </th>
                            <th>Status</th>



                        </tr>
                    </thead>
                    <tbody id="schoolsList">
                        <?php
						if(!empty($schools)){

						foreach ($schools as $key => $value) {
                             $status_badge = 'bg-success';
                            if ($value->school_status == '0')
                                $status_badge = 'bg-warning'; 
							
							
							$mentors = $this->admin->get_school_mentor_names($value->school_id);
						 ?>
                            <tr>
							<td> <a href="<?php echo  base_url('school_dashboard/'.$value->school_id) ?>" ><img src="<?= $value->image_path ;?>" height="" width="100"  /> </a></td>
                                <td> <a href="<?php echo  base_url('school_dashboard/'.$value->school_id) ?>" ><?= $value->school_name ?> </a></td>
                                <td><?= $value->city ?></td>
                                <td><?= $mentors[0]->mentor_name ?></td>
                                
								<td>
                                    <span class="badge <?= $status_badge ?>"><?= ($value->school_status == '1') ? 'Active' : 'Inactive' ?></span>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="<?php echo  base_url('school_dashboard/'.$value->school_id) ?>" class="dropdown-item">View</a>
                                            <a href="<?= base_url('schools/edit_school/') . $value->school_id ?>" class="dropdown-item">Edit</a>
                                            
											<a  href="javascript:void(0);"  data-did="<?= $value->school_id ?>" data-tbl="schools" data-ctrl="schools"  class="dropdown-item text-danger delete_class">Delete</a>
											
                                        </div>
                                    </div>
                                </td>

                            </tr> <?php } 
						}else{
							echo ' <tr><td class="text-center text-red" colspan="4">No Schools Found</td></tr>';
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
			url: '<?=base_url("/schools/ajaxPaginationSchoolsData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,status:status},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#schoolsList').html(res.html);
			}
		});
	}
</script>