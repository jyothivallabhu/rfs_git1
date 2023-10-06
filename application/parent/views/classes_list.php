   <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?=base_url('Dashboard')?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">View Class Portfolio</a>
						</h3>
					
					</div>
				    <div class="col-md-4">
					<div class="text-md-right m-v-10">
					    <a href="<?=base_url('Artwork/upload_artwork')?>" class="btn btn-primary">
						<i class="anticon anticon-plus"></i>
						<span class="m-l-5">Upload Artwork</span>
					    </a>
					</div>
				    </div>
				</div>
			</div>
		    
				<!--<div class="row">
				<div class="form-group col-md-4">
						    <label for="inputState">Child Name</label>
						    <select id="inputState" class="form-control">
							<option selected="">Please Select</option>
							<option>Child 1</option>
							<option>Child 2</option>
						    </select>
				</div>
				<div class="form-group col-md-4">
						    <label for="inputState">Academic Year</label>
						    <select id="inputState" class="form-control">
							<option selected="">Please Select</option>
							<option>Child 1</option>
							<option>Child 2</option>
						    </select>
				</div>
				</div>-->
				<div class="row">
					<?php
					if ($artworks['num'] == 0) {
					?>
						No data to display
					<?php
					} else {
						foreach ($artworks['data'] as $row) {
						?>
				<div class="col-md-4 col-lg-4">
					
					<div class="card">
						<div class="card-body">
							<div class="m-t-20">
								<div class="text-center text-sm-left m-v-15 p-l-30">
									<h4 class="m-b-5">Class: <?=$row->class_name?></h4>
								 </div>
								    
								
							</div>
							
							<div class="m-t-15 m-l-20">
							
								<a href="<?= base_url('artwork/classportfolio/'.$row->c_id) ?>" class="badge badge-primary">
								    <i class="anticon anticon-eye"></i>ALL Portfolio
								</a>
								<!--<a href="#" class="badge badge-primary">
								    <i class="anticon anticon-eye"></i>Trail
								</a>
								
								<a href="#" class="badge badge-primary">
								    <i class="anticon anticon-eye"></i>Mentoring
								</a>
								<a href="#" class="badge badge-primary">
								    <i class="anticon anticon-eye"></i>Monthly Mentoring
								</a>-->
								
								
							</div>
						  
						</div>
					</div>
				</div>
					<?php
						}
					}
					?>
					   
				
			</div>
		    
		 
		  
	       </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2023 RainbowFish. All rights reserved.</p>
                        <span>
                            <a href="<?= base_url('pages/termsandconditions') ?>" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="<?= base_url('pages/privacy_policy') ?>" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
