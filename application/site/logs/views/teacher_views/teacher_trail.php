<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Teacher Trial</a>
						</h3>
					
					</div>
					<div class="col-md-6 text-right">
						<div class="text-md-right">
						    <a href="<?= base_url().$this->url_slug.'/add_teacher_trial/'.$lesson_id.'/'.$class_id ?>" class="btn btn-primary">
							<i class="anticon anticon-plus"></i>
							<span class="m-l-5">Add</span>
						    </a>
						</div>
					</div>
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				
					<div class="card">
						<div class="card-body"> 
							<div class="table-responsive">
								<table class="table table-hover" id="data-table"  data-module="teacher_trial" data-section_id="" data-class_id="" class="table">
									<thead>
									   <tr>
										
										<th data-sortable="false">Class</th>
										<th data-sortable="false">Lesson Name</th>
										<th data-sortable="false">Trial Image </th>
										<th data-sortable="false">Status</th>
										<th data-sortable="false">Feedback </th>
										<th data-sortable="false">Uploaded on </th>
										<th data-sortable="false">Actions</th>
									   </tr>
									</thead>
                                    <tbody id="teacher_trial"></tbody>
								</table>
								<!--<div id="pagination"><?=$pagination?></div>
								<span id="showing_text"><?=$showing_text?></span>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

              