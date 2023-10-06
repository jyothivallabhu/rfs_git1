<div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
					
					<?php if($this->uri->segment(1) == 'view_mentor_trial'){
						$url = base_url().'mentor_trails';
						$pagename = 'Trials';
						$receivedfrom = base_url().'mentor_trails';
					} elseif($this->uri->segment(1) == 'view_monthlymentoring'){
						$url = base_url().'mentor_monthly_mentoring';
						$pagename = 'Monthly Mentoring';
						$receivedfrom = base_url().'mentor_monthly_mentoring';
					}else{
						$url =  base_url().'mentor_continuous_mentoring';
						$pagename =  'Continuous Mentoring';
						$receivedfrom =  base_url().'mentor_continuous_mentoring';
					}   ?>
						<a href="<?= $url  ?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">View  <?= $pagename .' - '.$view_data['school_name']  ?></a>
						</h3>
					
					</div>
				   
				</div>
			</div>
			
			
                        <div class="row">
                            <div class="col-md-6 col-lg-6 offset-lg-3">
							
							
                                <div class="card">
                                    <div class="card-body">
									
									 <?php if($view_data['image1'] !=''){?>
                                        <div class="d-flex justify-content-between">
                                            <div class="media align-items-center">
                                                <div class="" style="width: 350px;">
                                                    <img src="<?=  base_url().$view_data['image1'] ?>" class="img-fluid downloadable" />
                                                </div>
											 </div>
										 </div>
										<?php } ?>
									 
									
									 <?php if($view_data['reference_image'] !=''){?>
										
                                     <div class="m-t-30">
									 <?php if($this->uri->segment(1) == 'view_monthlymentoring'){
													?>
									  <div class="" style="width: 350px;">
									  <label class="">Reference Doc</label>
									  <a href="<?=   base_url().$view_data['reference_image'] ?>" class="downloadable" target=_blank > View Document</a>
									   
												
									 <?php }
									 }
									 ?>
											 
										</div>
										
										<div class="m-t-30">
										
										<div>
											
											 <div class="m-l-10">
											 
											
											 
                                                    <h4 class="m-b-0">School:<?= $view_data['school_name'] ?></h4>
                                                     
													<?php 
													if($this->uri->segment(1) == 'view_continuous_mentoring'){
														?>
                                                    <p class="m-b-0">Stage: <?= $view_data['stage'] ?></p>
													<?php } ?>
													<?php if($this->uri->segment(1) == 'view_monthlymentoring'){ ?>
													
													<p class="m-b-0">Next Review Date: <?= date('d/m/Y', strtotime($view_data['next_review_date'])) ?></p>
													<p class="m-b-0">Action Plan: <?= $view_data['actionplan'] ?></p>
													<?php } ?>
													
													<p class="m-b-0"><?= $view_data['teacher_notes'] ?></p>
                                                </div>
											<?php 
											if ($view_data['status']=='1'){
												$status = 'Submitted';
											} elseif ($view_data['status']=='2'){
												$status = 'Approved';
											} else{
												$status ='Not Started';
											}
											?>
                                                
												<?php 
													
														?>
												<?php 
												if ($view_data['status']=='1'){
													if($this->uri->segment(1) != 'view_monthlymentoring'){
													?>
													<!--<div class="form-group d-flex align-items-center ">
														<div class="switch m-r-10 approve">
															<input type="checkbox" id="switch-2" class="changestatus" data-did="<?= $view_data['id'] ?>">
															<label for="switch-2"></label>
														</div>
														<label class="approve">Approve</label>
													</div>-->
												<?php }
												}
												elseif ($view_data['status']=='2'){ ?>
													<span class="badge badge-pill badge-green">Approved</span>
												<?php }else{ ?>
													<span class="badge badge-pill badge-blue">Not Started</span>
												<?php } ?>
												
												<span class="badge badge-pill badge-blue approved" style="display:none">Approved</span>
                                            </div>
											
										</div>
                                    </div>
                                   
								 </div>
								 <?php 
										if($this->uri->segment(1) != 'view_monthlymentoring'){
													?>
													
								 	<div class="card">
									 <div class="m-t-30">
                                        <ul class="nav nav-tabs">
                                           
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#project-details-comments">Comments</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content m-t-15 p-25">
                                            
                                            <div class="tab-pane fade active show" id="project-details-comments">
                                                <ul class="list-group list-group-flush">
													<?php 
													if(!empty($comments)){
														foreach($comments as $cm ){
													?>
													
													<li class="list-group-item p-h-0">
															<div class="media m-b-15">
																<div class="avatar avatar-image">
																	<img src="<?=  $cm['from_user_image_path'] ?>" alt="">
																</div>
																<div class="media-body m-l-20">
																	<h6 class="m-b-0">
																		<span class="text-dark"><?=  $cm['from_username'] ?></span>
																	</h6>
																	<span class="font-size-13 text-gray"><?=  date('jS M Y', strtotime($cm['created_at'])); ?></span>
																</div>
															</div>
															<p><?=  $cm['comments'] ?></p>
														</li>
														
													<?php 												
														}
													}else{
														?>
														 <li class="list-group-item p-h-0">
														 <p>No Comments Yet</p>
														 </li>
														<?php
													} ?>
                                                    
													
													
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
										<hr>
										
						<div class="card-body">
						<div id="msg"></div>
						
							<form class="mb-5 form_class" id="feedbackform" method="POST" action="<?= site_url('mentor_trails/save_feedback') ?>">
							
							<input type="hidden" name="receivedfrom" value="<?= $receivedfrom ?>">
							<input type="hidden" name="trail_id" value="<?= $view_data['id'] ?>">
							<input type="hidden" name="teacher_id" value="<?= $view_data['added_by'] ?>">
							
								<div class="form-group">
									<label for="inputState">Write Feedback</label>
									<textarea class="form-control" name="feedback" aria-label="With textarea" ></textarea>
								</div>	
								<div class="form-group ">
								<div id="feedbackValid"></div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							
							</form>
						</div>
						
						   
					</div>
				
										<?php } ?>
                            
							
							</div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

				<script>
				 $(document).on('click', '.changestatus', function () {    

				   var id = $(this).attr('data-did');
				   if ($(this).is(':checked')) {
					   status_val = 1;
				   }
				   else {
					   status_val = 0;
				   }
				  
					
				   $.ajax({
					   url: "<?php echo base_url();?>mentor_trails/update_status/",
					   type: "POST",
					   data: {"status": status_val, "id": id},
					   success: function (res) {
						 $("#msg").html(res);
						 $(".approve").css("display","none");
						 $(".approved").css("display","block");
					   }
				   });
			   });
				</script>
               