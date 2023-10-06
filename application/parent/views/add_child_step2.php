  <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="dashboard.html">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Add Child</a>
						</h3>
						<p>Please check details and confirm to add</p>
					</div>
				</div>
			</div>
		  	<form action="<?=base_url('Children/step2')?>" method="post" enctype="multipart/form-data" name="rfs_parent_form" id="rfs_parent_form">
			 <?php $this->load->view('include/msgs'); ?>
			 <div id="msg"></div>  
			<div class="row text-center">
				<div class="col-md-4 col-lg-4 offset-md-4 offset-lg-4 text-center">
					<div class="card">
						<div class="card-body">
							<div class="m-t-20">
								<div class="avatar avatar-image m-l-20" style="height: 100px; width: 100px;">
								    <img src="assets/images/avatars/thumb-1.jpg" alt="">
								</div>
							
								<div class="text-center text-center">
									<h4 class="m-b-5"><?=$stu_det['first_name']?></h4>
									<p class="text-dark m-b-5"><?=$stu_det['admission_number']?></p>
									<p class="text-dark m-b-5"><?=$stu_det['class_name']?>/ <?=$stu_det['section_name']?></p>
									<p class="text-dark m-b-5"><?=$stu_det['school_name']?></p>
									<p class="text-dark m-b-20">DOB: <?=$stu_det['dob']?></p>
								</div>
							</div>
							
							<div class="form-group ">
								<div class="text-center">
									<a href="<?= base_url('Children') ?>" class="btn btn-primary-outline">Cancel</a>
									<button type="submit" class="btn btn-primary">Confirm</button>
								</div>
							</div>
						  
						</div>
					</div>
				</div>
				
			</div>
			</form>
		    
		 
		  
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


            <!-- Search End-->

          
        </div>
    </div>