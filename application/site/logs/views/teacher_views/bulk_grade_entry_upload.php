<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);"><?php echo $classInfo['data']['class_name'].' - '.$sectionInfo['data']['section_name'].' - '.$exam_typeInfo['data']['exam_name'] ?></a>
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
		    
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				 <?php $this->load->view('include/msgs'); ?>
				<form class="mb-5 form_class" method="POST"  action="<?= site_url('grade_entry/save_bulk_entry') ?>" name="teacher_mentoring" id="teacher_mentoring">
					<div class="card">
						<div class="card-body"> 
							<div class="table-responsive">
								<table class="table table-hover" id="data-table1"   class="table">
									<thead>
										<tr>
										<th data-sortable="false">Admission Number</th>
										<th data-sortable="false">Student Name </th>
										<th data-sortable="false">Grade </th>
										<th data-sortable="false">Comments </th> 
								
										</tr>
									</thead>
                                    <tbody>
									<?php
										$academic_year = $this->admin->get_academic_year()[0];
										if(!empty($students)){
											foreach ($students as $req) {  
											?>
												
											<tr>
												<td><?= $req->admission_number?></td>
												<td><?= $req->first_name.' '. $req->last_name ?></td>
												<input type='hidden' name="school_id" value = <?= $this->school_id ?>>
												<input type='hidden' name="student_id[]" value = <?= $req->student_id ?>>
												<td> <select name="grade_id[]" id="grade_id" class="form-control  valid" >
														<option value = '' selected="">Select Grade</option>
														<?php
														if (!empty($grades) > 0) {
														foreach($grades as $g)
														{
														?>
														 <option value="<?php echo $g->id  ;?>"><?php echo $g->grade_name;?></option>
														
														<?php
														}
														}else{
															echo ' <option>No Grades Data Found</option>';
														}
														?>
													</select> 
												</td>
												<td>
													<textarea type="text" class="form-control mceeditor" id="grade_comments" placeholder="Search" name="comments[]" ></textarea>
												</td>
												

											</tr>
											
											<?php
												
											}
										}else{
											echo "<tr><td>No Data Found</td></tr>";
										}
										?>
									</tbody>
								</table>
									<button type="submit" class="btn btn-primary" style="float: right;">Save</button>
							</div>
							
								
						
						</div>
					</div>
					</form>
				</div>
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

              <script>
			  
              </script>