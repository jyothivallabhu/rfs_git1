  <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?= base_url() ?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Re-Upload Artwork</a>
						</h3>
						<p>Please check details and confirm to add</p>
					</div>
				</div>
			</div>
		  	<form action="<?=base_url('artwork/reupload_artwork')?>" method="post" enctype="multipart/form-data" name="rfs_parent_form" id="rfs_parent_form">
			 
			<div class="row text-center">
				<div class="col-md-4 col-lg-4 offset-md-4 offset-lg-4 text-center">
				<?php $this->load->view('include/msgs'); ?>
			 <div id="msg"></div>  
					<div class="card">
						<div class="card-body">
							<div class="m-t-20">
								
							
								<div class="text-center text-center">
									<input type="hidden" name="artwork_id" value="<?= $art_det->id ?>">
									<input type="hidden" name="base_code" value="<?= $base_code ?>">
									
									
									<h4 class="m-b-5"><?= $art_det->first_name.' '.$art_det->last_name ?></h4>
									<p class="m-b-0">Class: <?= $art_det->class_name ?></p>
									<p class="m-b-0">Lesson: <?= $art_det->lesson_name ?></p>
									<div class="row text-center">
									<div class="col-md-6">
                                        Old Image: <img class="img-fluid" src="<?= base_url().$art_det->artwork_upload ?>" alt="">
                                    </div>
									<div class="col-md-6">
                                        New Image: <img class="img-fluid" src="<?= $base_code ?>" alt="">
                                    </div>
                                    </div>
								</div>
							</div>
							<p class="m-t-20" style="color: red;font-size: 18px;">Would you like to re-upload Artwork</p>
							<div class="form-group ">
								<div class="text-center">
									<a href="<?=base_url()?>" class="btn btn-primary-outline">Cancel</a>
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