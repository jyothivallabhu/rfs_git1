<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Trials Submitted</a>
						</h3>
					
					</div>
					
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				
					<div class="card">
						<div class="card-body"> 
						
						<div class="d-flex">
									
									<!--<div class="m-r-15">
										<select onchange="searchFilter()"  id="class_id" name="class_id" class="form-control">
										<option value="">Class</option>
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
									</div>-->
								</div>
							<div class="table-responsive">
								<table class="table table-hover" id="data-table"  data-module="mentor_trails" data-section_id="" data-class_id="" class="table">
									<thead>
									   <tr>
										<th data-sortable="false">Image</th>
										<th data-sortable="false">Lesson Name</th>
										<th data-sortable="false">Teacher  Name</th>
										<th data-sortable="false">Class </th>
										<th data-sortable="false">School Name</th>
										<th data-sortable="false">Feedback </th>
										<th data-sortable="false">Date </th>
										<th data-sortable="false">Action </th>
									   </tr>
									</thead>
                                    <tbody id="mentor_trails"></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

              