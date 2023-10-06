<div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    
					
					<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?= base_url($this->url_slug.'/assigned_sections') ?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Student Details</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between">
								<div class="media align-items-center">
									<div class="avatar avatar-image" style="width: 150px; height:150px">
										<img src="<?= $view_data->image_path ?>" alt="">
									</div>
									<?php  ?>
									<div class="m-l-10">
										<p class="m-b-0">Student : <?= $view_data->first_name.' '.$view_data->last_name ?></p>
										<p class="m-b-0">Class: <?= $view_data->class_name ?></p>
										<p class="m-b-0">Section: <?= $view_data->section_name ?></p>
									</div>
								</div>
								<div>
								<?php ($view_data->status == 1) ? '<span class="badge badge-pill badge-blue">Active</span>' :'<span class="badge badge-pill badge-blue">InActive</span>'
									?>
									
								</div>
							</div>
						</div>
					</div>
					<div class="card">
					<div class="col-md-4 text-center">
						<h3 class="m-b-0 m-t-30">
						    <a class="text-dark" href="javascript:void(0);">Parent Info</a>
						</h3>
					
					</div>
						<div class="card-body">
						
						<?php 
						
						if(!empty($parents)){ ?>
							<div class="d-flex justify-content-between">
								<div class="media align-items-center">
									<div class="avatar avatar-image" style="width: 150px; height:150px">
										<img src="<?= $parents[0]->image_path ?>" alt="">
									</div>
									<?php  ?>
									<div class="m-l-10">
										<p class="m-b-0">Parent : <?= $parents[0]->first_name.' '.$parents[0]->last_name ?></p>
										<p class="m-b-0">Email: <?= $parents[0]->email ?></p>
										<p class="m-b-0">Mobile: <?= $parents[0]->phone ?></p>
									</div>
								</div>
								<div>
								<?php ($parents[0]->status == 1) ? '<span class="badge badge-pill badge-blue">Active</span>' :'<span class="badge badge-pill badge-blue">InActive</span>'
									?>
									
								</div>
							</div>
						<?php  }else{
							echo 'No Data Found';
						} ?>
						   
						</div>
					</div>
				
								
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

               