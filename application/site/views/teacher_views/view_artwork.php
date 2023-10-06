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
						    <a class="text-dark" href="javascript:void(0);">Artwork - <?= $artworks->lesson_name ?></a>
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
                                                    <img class="img-fluid downloadable" src="<?= $artworks->artwork_upload ?>" alt="">
                                                </div>
												<?php $artworks; ?>
                                                <div class="m-l-10">
                                                    <p class="m-b-0">Student : <?= $artworks->first_name.' '.$artworks->last_name ?></p>
                                                    <p class="m-b-0">Class: <?= $artworks->class_name ?></p>
                                                    <p class="m-b-0">Section: <?= $artworks->section_name ?></p>
													<p class="m-b-0">Artist comment: <?= $artworks->comments ?></p>
                                                </div>
                                            </div>
                                            <!--<div>
                                                <span class="badge badge-pill badge-blue">In Progress</span>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="card">
						<div class="card-body">
							<div class="m-t-20">
                                    
									
									<ul class="list-group list-group-flush">
									<?php /* if($artworks->comments !=''){ ?>
										
										<li class="list-group-item p-h-0">
											<div class="media m-b-15">
												
												<div class="media-body m-l-20">
													<h6 class="m-b-0">
														<a href="" class="text-dark">Artist comment </a>
													</h6>
													<span class="font-size-13 text-gray"><?=  date('jS M Y', strtotime($artworks->created_at)); ?></span>
												</div>
											</div>
											<p><?= $artworks->comments ?></p>
										 </li>
									<?php } */ ?> 
											 
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
												<p><?=  $cm['feedback'] ?></p>
											</li>
											
										<?php 												
											}
										}else{
											?>
											 <li class="list-group-item p-h-0">
											 <p>No Feedback Yet</p>
											 </li>
											<?php
										} ?>
										
										
										
									</ul>
                                </div>
								<hr>
							<form class="mb-5 form_class" id="feedbackform" method="POST" action="<?= site_url('teacher_artwork/save_feedback') ?>">
							
								<input type="hidden" name="artwork_id" value="<?= $artworks->id ?>">
								<input type="hidden" name="added_by" value="<?= $artworks->added_by ?>">
							
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

               