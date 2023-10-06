<!-- content -->
<!-- content -->
<!--<div class="col-md-9" id="app">
   <div class="row g-4 mb-4">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title"> Students - <?= $schools->name ?></h5>
                </div>
				-->
				
				<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> Students - <?= $schools->name ?></a>
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
				   <h2>Students - <?= $schools->name ?></h2>
				   
				 <?php } ?>
				 <div id="msg"> </div>
			
            <div class="card">
                <div class="card-body">
                    <div class="align-items-center">
                        <div class="align-items-center">
                            <div class="mb-3 mb-md-0">
                                <div class="row">
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
									
									<div class="col-2 ">
										
										<select class="form-control" onchange="searchFilter1()"  id="academic_year" name="academic_year" required>
										<option value="">Select Academic Year</option>
										<?php
										if(!empty($academicyear)){
										foreach($academicyear as $year)
										{
										?>
										 <option value="<?php echo $year->id  ;?>" <?php if($year->name=='currrent_year') { echo 'selected=selected';}  ?>><?php echo $year->values;?></option>
										
										<?php
										}
										}else{
											echo ' <option>No Academic Year Data</option>';
										}
										?>
									   </select>
									</div>
									
									<div class="col-md-3">
										<select class="form-control" onchange="searchFilter1()" id="status">
											<option value=''>Status</option>
											<option value="1" selected>Active</option>
											<option value="0">Inactive</option>
										</select>
									</div>	
									
                                   <input type="hidden" id="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2") ?>">
								   
                                    <div class="col-md-3">
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
						if(isset($this->school_id) && $this->school_id !=''){
							$urlid = '';
						}else{
							$urlid =$this->uri->segment(2);
						} ?>
						
						<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
                        <div class="dropdown ms-auto" style="    float: right;margin-top: 14px;">
                            <a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/students/import/'.$urlid) ?>">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Import Student
                                </button>
                            </a>
							
							<a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/students/add_students/'.$urlid) ?>">
							
							
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Add Student
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
                            <th>Admission Number</th>
                            <th>Student Name </th>
                            <th>Class </th>
                            <th>Section </th>
                            <!--<th>Gender</th>
                            <th>DOB</th>
                            <th>Parent Info</th>-->
                            <th>status</th>



                        </tr>
                    </thead>
                    <tbody id="schoolsList">
                        <?php
					if(!empty($students)){
						foreach ($students as $key => $value) {
							 $status_badge = 'bg-success';
                            if ($value->status == '0')
                                $status_badge = 'bg-warning'; 
                        ?>
                            <tr>
								<td><img src="<?= $value->image_path ;?>" height="60" width="60"  /> </td>
                                <td><?= $value->admission_number ?> </td>
                                <td><?= $value->first_name.' '. $value->last_name ?> </td>
								<td><?= $value->class_name ?></td> 
								<td><?= $value->section_name ?>  </td>
								<!--<td><?= $value->gender ?>  </td>
								<td><?= date('d/m/Y', strtotime($value->dob)) ?></td>
                                <td> <?= $value->parent_fname .' '. $value->parent_lname ?><br><?= $value->parent_email ?><br><?= $value->mobile_number ?>  </td>-->
								<td>
                                    <span class="badge <?= $status_badge ?>"><?= ($value->status == 1)? 'Active':'Inactive' ?></span>
                                </td>
								
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!--a href="<?php echo  base_url('students/view_student/'.$value->student_id) ?>" class="dropdown-item">View</a-->
											
											<?php if($value->academic_year == $academic_year->id){ ?>
                                            
                                           <?php } ?>
										   
										   <a href="<?= base_url('students/view_student/') . $value->student_id ?>" class="dropdown-item">View</a>
										   <?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
										   <a href="<?= base_url('students/edit_students/') . $value->student_id ?>" class="dropdown-item">Edit</a>
											
											<a href="javascript:void(0);"  data-did="<?= $value->student_id ?>" data-sid = "<?= $value->school_id ?>" data-tbl="students" data-ctrl="students"  class="dropdown-item text-danger delete_class">Delete</a>
											<?php //} ?>
                                        </div>
                                    </div>
                                </td>
								

                            </tr> <?php 
							}
					}else{
						echo 'Data not available';
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
		var academic_year    = $( "#academic_year option:selected" ).val();
		var status    = $( "#status option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/students/ajaxPaginationstudentsData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,school_id:school_id,academic_year:academic_year,status:status},
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