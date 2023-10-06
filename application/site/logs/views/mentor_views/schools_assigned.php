<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Schools Assigned</a>
						</h3>
					
					</div>
					<!--<div class="col-md-6 text-right">
						<div class="text-md-right">
						    <a href="<?= base_url().$this->url_slug.'/add_teacher_trial/'.$lesson_id.'/'.$class_id ?>" class="btn btn-primary">
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
							<div class="table-responsive">
								<table class="table table-hover" id="data-table"  data-module="mentor_schools" data-section_id="" data-class_id="" class="table">
									<thead>
									   <tr>
										<th data-sortable="false">School Logo</th>
										<th data-sortable="false">School Name</th>
										<th data-sortable="false">City </th>
										<th data-sortable="false">Status</th>
									   </tr>
									</thead>
                                    <tbody id="mentor_schools"></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

              