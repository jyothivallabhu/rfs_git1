<div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);"><?= $page_title ?> - <?= $view_data['lesson_name'] ?> - <?= $view_data['class_name'] ?></a>
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
                                                <div class="">
                                                    <img src="<?=  $view_data['image_path'] ?>" class="img-fluid" />
                                                </div>
												 
											</div>
											<div>
											
                                            </div>
                                        </div>
										
										
                                     <div class="m-t-30">
											<?php  
											/* if(!empty($view_data['image2'])){
													?>
													<div class="">
														<img src="<?=  base_url().$view_data['image2'] ?>"  class="img-fluid" />
													</div>
													<?php
												}
												if(!empty($view_data['image3'])){
													?>
													<div class="">
														<img src="<?=  base_url().$view_data['image3'] ?>"  class="img-fluid" />
													</div>
													<?php
												}
												if(!empty($view_data['image4'])){
													?>
													<div class="">
														<img src="<?=  base_url().$view_data['image4'] ?>"  class="img-fluid" />
													</div>
													<?php
												}
												if(!empty($view_data['image5'])){
													?>
													<div class="">
														<img src="<?=  base_url().$view_data['image5'] ?>"  class="img-fluid" />
													</div>
													<?php
												}  */?>
												
												<div class="m-t-30">
									 <?php if($this->uri->segment(1) == 'view_monthlymentoring'){
													?>
									  <div class="" style="width: 350px;">
                                                    <img src="<?=  base_url().$view_data['reference_image'] ?>" class="img-fluid downloadable" />
                                                </div>
												
									 <?php } ?>
											<?php  
											if(!empty($view_data['image2'])){
													?>
													<div class="" style="width: 350px;">
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
										<div class="m-t-30" style="margin-top: 30px;">
											
											<?php 
											/* echo $view_data['type'];
											
											if($view_data['type'] == 'trail'){
												$type = 'trail';
												$data['page_title'] = 'Trial Feedback';
											}elseif($view_data['type'] == 'mentoring'){
												$type = 'mentoring';
												$data['page_title'] = 'Mentoring';
											}elseif($view_data['type'] == 'monthlymentoring'){
												$type = 'monthlymentoring';
												$data['page_title'] = 'Monthly Mentoring';
											}elseif($this->uri->segment("1") == 'section_artwork'){
												$type = 'monthlymentoring';
												$data['page_title'] = 'View Artwork';
											} */
											
													if($view_data['type'] == 'mentoring'){
														?>
                                                    <p class="m-b-0">Stage: <?= $view_data['stage'] ?></p>
													<?php } ?>
													<?php if($view_data['type'] == 'monthlymentoring'){ ?>
													
													<p class="m-b-0">Next Review Date: <?= date('d/m/Y', strtotime($view_data['next_review_date'])) ?></p>
													<p class="m-b-0">Action Plan: <?= $view_data['actionplan'] ?></p>
													<?php } ?>
													
										
											<p class="m-b-0"><?= $view_data['teacher_notes'] ?></p>
											 <div>
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
						
						<?php
							if($view_data['type'] == 'trail'){
								$type = 'Trails';
							}else if($view_data['type'] == 'mentoring'){
								$type= 'Mentoring';
							}else if($view_data['type'] == 'monthlymentoring'){
								$type= 'MonthlyMentoring';
							}else{
								$type = '';
							}
								?>
								
						<div id="msg"></div>
						<form class="mb-5" id="adminfeedbackform" method="POST" action="<?= site_url('feedback_management/save_feedback') ?>">
							
							<input type="hidden" name="receivedfrom" value="<?= $type ?>">
							<input type="hidden" name="trail_id" value="<?= $view_data['id'] ?>">
							<input type="hidden" name="teacher_id" value="<?= $view_data['added_by'] ?>">
							
								<div class="form-group">
									<label for="inputState">Write Feedback</label>
									<textarea class="form-control" name="feedback" aria-label="With textarea" required></textarea>
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

				
               