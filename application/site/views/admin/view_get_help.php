<div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    
					
					<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<!--<div class="media m-v-10">
						<a href="<?=base_url()?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>-->
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">View Get Help</a>
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
                                                <div class="" style="margin-bottom: 20px;">
                                                    <img class="img-fluid downloadable" src="<?= base_url($view_data['attachment']) ?>" alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <p class="m-b-0">Name : <?= $view_data['first_name'].' '.$view_data['last_name'] ?></p>
                                                    <p class="m-b-0">Role: <?= $view_data['name'] ?></p>
                                                    <p class="m-b-0">Title: <?= $view_data['title'] ?></p>
                                                    <p class="m-b-0">Email: <?= $view_data['email'] ?></p>
                                                    <p class="m-b-0">Date: <?= date('d-m-Y',strtotime($view_data['added_date'])) ?></p>
                                                    <p class="m-b-0">Description: <?= $view_data['description'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
									
				
								
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

               