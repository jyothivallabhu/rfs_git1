<div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?= base_url($this->url_slug.'/teacher_mentoring') ?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);"> Continuous Mentoring -  <?= $view_data['lesson_name'] ?> - <?= $view_data['class_name'] ?> - <?= $view_data['section_name'] ?></a>
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
                                                <div class="" style="width: 350px;">
                                                    <img src="<?=  $view_data['image_path'] ?>" class="img-fluid downloadable" />
                                                </div>
												 
											</div>
											
                                        </div>
										
										
                                     <div class="m-t-30">
											<?php  
											if(!empty($view_data['image2'])){
													?>
													<div style="width: 350px;">
														<img src="<?=  base_url().$view_data['image2'] ?>" class="img-fluid downloadable" />
													</div>
													<?php
												}
												if(!empty($view_data['image3'])){
													?>
													<div class="" style="width: 350px;">
														<img src="<?=  base_url().$view_data['image3'] ?>" class="img-fluid downloadable" />
													</div>
													<?php
												}
												if(!empty($view_data['image4'])){
													?>
													<div class="" style="width: 350px;">
														<img src="<?=  base_url().$view_data['image4'] ?>" class="img-fluid downloadable" />
													</div>
													<?php
												}
												if(!empty($view_data['image5'])){
													?>
													<div class="" style="width: 350px;">
														<img src="<?=  base_url().$view_data['image5'] ?>" class="img-fluid downloadable" />
													</div>
													<?php
												} ?>
										</div>
                                    </div>
									<div class="m-l-10">
										
									</div>
									<div class="m-t-30 m-l-10">
										
										<p class="m-b-0">Stage: <?= $view_data['stage'] ?></p>
										<span class="m-b-0">Teacher Note: <?= $view_data['teacher_notes'] ?></span>
										<div>
											
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
											if ($view_data['status']=='1'){
												echo '<span class="badge badge-pill badge-gold">Submitted</span>';
											} elseif ($view_data['status']=='2'){
												echo '<span class="badge badge-pill badge-green">Approved</span>';
											} else{
												echo '<span class="badge badge-pill badge-blue">Not Started</span>';
											}
											?>
											
                                            </div>
									</div>
                                   
								 </div>
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
																		<a href="" class="text-dark"><?=  $cm['from_username'] ?></a>
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
						
						<form class="mb-5 form_class" id="feedbackform" method="POST" action="<?= site_url('teacher_trial/save_feedback') ?>">
							
							<input type="hidden" name="receivedfrom" value="<?= ($this->uri->segment(2) == 'view_teacher_trial')? 'Trails' : 'Mentoring' ?>">
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
				
                            
							
							</div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

				
               