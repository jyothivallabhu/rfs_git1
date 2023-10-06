<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Teacher Trail</a>
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
								<h5>Teacher Trail Lessons Assigned</h5>
								<div class="d-flex">
									
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
								</div>
				
							</div>
							<div class="table-responsive">
								<table class="table table-hover" id="table"  data-module="teacher_trial" data-section="" >
									<thead>
										<tr>
										 <th data-field="class_id" data-sortable="false">Class</th>
										<th data-field="section_id" data-sortable="false">Lesson</th>
										<th data-field="id" data-sortable="false">Actions</th>
								
										</tr>
									</thead>
                                    <tbody id="teacher_trial">
									
										<?php
										if(!empty($list)){
											foreach ($list as $req) {  
											
											$total_count = '';
												?>
												
												<tr>
															<td><?= $req->class_name?></td>
															<td><?=$req->lesson_name ?></td>
															
															<td>
															<a href="<?=base_url($this->url_slug.'/teacher_triallessonwise/'.$req->lesson_id.'/'.$req->c_id)?>" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
																<i class="anticon anticon-eye"></i>
															</a>
									
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

              