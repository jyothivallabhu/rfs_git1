<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Lessons Schedules</a>
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
				
					<div class="card">
						<div class="card-body"> 
						<div class="d-flex justify-content-between align-items-center m-b-10">
								<h5>Lessons Schedules</h5>
								<div class="d-flex">
									<div class="m-r-15">
										<select onchange="searchFilter()"  id="academic_year" name="academic_year" class="form-control">
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
								</div>
				
							</div>
							<div class="table-responsive">
								<table class="table table-hover" id="table"  data-module="Teacher_lessons" data-section="" class="table">
									<thead>
										<tr>
										 <th data-field="class_id" data-sortable="false">Class</th>
										<th data-field="section_id" data-sortable="false">Section</th>
										<th data-field="lesson_name" data-sortable="false">Lessons</th>
										<th data-field="id" data-sortable="false">Actions</th>
								
										</tr>
									</thead>
                                    <tbody id="Teacher_lessons">
									
										<?php
										$academic_year = $this->admin->get_academic_year()[0];
										if(!empty($list)){
											foreach ($list as $req) {  
											
											$count_data = $this->Teacher_lessons_model->getLessonsCount($req->section_id,$academic_year->id);
											
												?>
												
												<tr>
													<td><?= $req->class_name?></td>
													<td><?=$req->section_name ?></td>
													
													<td><?=$count_data[0]->total_lessons?></td>
													
													
													<td>
														<a href="<?=base_url($this->url_slug.'/sectionwiselessons/'.$req->section_id)?>" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
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
								<div id="pagination"><?=$pagination?></div>
								<span id="showing_text"><?=$showing_text?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		    
		    
	       </div>
                <!-- Content Wrapper END -->

              