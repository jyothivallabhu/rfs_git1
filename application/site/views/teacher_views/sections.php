<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Students</a>
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
								<h5>Students</h5>
								<div class="d-flex">
									<!--<div class="m-r-15">
										<select onchange="searchFilter()"  id="sortby" name="sortby" class="form-control">
											<option value="">SortBy</option>
											<option value="desc">Desc</option>
                                            <option value="asc">Asc</option>
										</select>
									</div>-->
									<div class="m-r-15">
										<select onchange="searchFilter()"  id="class_id" name="class_id" class="form-control">
										<option value="">Select Class</option>
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
									</div>
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
								<table class="table table-hover" id="table"  data-module="teacher_assigned_sections" data-section="" >
									<thead>
										<tr>
										 <th data-field="class_id" data-sortable="false">Class</th>
										<th data-field="section_id" data-sortable="false">Section</th>
										<th data-field="id" data-sortable="false">Students</th>
										<th data-field="id" data-sortable="false">Actions</th>
								
										</tr>
									</thead>
                                    <tbody id="teacher_assigned_sections">
									
										<?php
										if(!empty($list)){
											foreach ($list as $req) {  
											$count_data = $this->db->query("SELECT COUNT(*) as total_students FROM students s join student_academic_details as sa ON s.student_id = sa.sd_student_id join academic_year as a on a.id = sa.sd_academic_year WHERE sa.sd_section_id = '$req->section_id' AND sa.sd_school_id = $this->school_id and a.name= 'currrent_year' ")->row_array();
												
												$total_count = $count_data['total_students'];
												?>
												
												<tr>
															<td><?= $req->class_name?></td>
															<td><?=$req->section_name ?></td>
															
															<td><?=$total_count?></td>
															
															
															<td>
																<a href="<?=base_url($this->url_slug.'/teacher_students/'.$req->section_id)?>" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
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
		
		    
			<!--<div class="row">
			<?php 
			if(!empty($classes_assigned)){
				foreach($classes_assigned as $sec){
					$s =  explode (',',$sec->sections);
					foreach($s as $s1){
						$details = explode('-',$s1);
						?>
						<div class="col-md-2 col-lg-2">
							<div class="card">
								<div class="card-body">
									<div class="m-t-20">
										<div class="text-center text-sm-left m-v-15 p-l-30">
											<h4 class="m-b-5">Calss: <?= $details[0] ?></h4>
											<p class="text-opacity font-size-13">Section: <?= $details[1] ?></p>
										 </div>
									</div>
									
									<div class="m-t-15 m-l-20">
									
										<a href="<?= base_url().$this->url_slug.'/teacher_students/'.$details[2]; ?>"  class="m-r-5 btn btn-icon btn-hover btn-rounded view_students">
											<i class="anticon anticon-user"></i>
										</a>
										<a  href="<?= base_url().$this->url_slug.'/teacher_artwork/'.$details[2]; ?>" class="m-r-5 btn btn-icon btn-hover btn-rounded view_artwork">
											<i class="anticon anticon-edit"></i>
										</a>
										<a href="<?= base_url().$this->url_slug.'/teacher_lessons/'.$details[2]; ?> " class="m-r-5 btn btn-icon btn-hover btn-rounded view_reports">
											<i class="anticon anticon-bar-chart"></i>

										</a>
										
										
									</div>
								  
								</div>
							</div>
						</div>
						<?php
					}
				}
			}
			?>
				
				<?php ?>	
					   
				
			</div>-->
		    
	       </div>
                <!-- Content Wrapper END -->

              