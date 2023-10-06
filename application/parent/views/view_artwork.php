	<meta property="og:title" content="<?= $artwork->first_name.' '.$artwork->last_name ?>" />
    <meta property="og:description" content="<?= $artwork->lesson_name ?>" />
    <meta property="og:url" content="<?= base_url('artwork_view/view/'.$artwork->id) ?>" />
    <meta property="og:image" content="<?= $artwork->artwork_upload ?>" />

<div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    
					<div class="page-header no-gutters">
						<div class="row align-items-md-center">
							<div class="col-md-4">
							<div class="media m-v-10">
								<a href="<?=base_url()?>">
									<div class="avatar avatar-blue avatar-icon avatar-square">
									<i class="anticon anticon-arrow-left"></i>
									</div>
								</a>
							</div>
							</div>
							<div class="col-md-4 text-center">
								<h3 class="m-b-0">
									<a class="text-dark" href="javascript:void(0);"><?= ucwords($artwork->lesson_name) ?></a>
								</h3>
							
							</div>
							 <div class="col-md-2">
								<div class="">
									<a href="<?=base_url('artwork/classportfolio/'.$artwork->class_id)?>" class="btn btn-primary">
									<i class="anticon anticon-eye"></i>
									<span class="m-l-5">View Similar</span>
									</a>
								</div>
							</div>
						   
						</div>
					</div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 offset-lg-3">
                                <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="img-fluid" src="<?= $artwork->artwork_upload ?>" alt="">
                                    </div>
									
									<div class="col-md-6 m-l-10">
										<h4 class="m-b-0"> <?= $artwork->first_name.' '.$artwork->last_name ?></h4>
										<p class="m-b-0">Class: <?= $artwork->class_name ?></p>
										<p class="m-b-0">Lesson: <?= $artwork->lesson_name ?></p>
										<p class="m-b-0">Artist comment: <?= $artwork->comments ?></p>
									</div>
											
									
                                    <!--<div class="col-md-8">
                                        <h4 class="m-b-10">You Should Know About Enlink</h4>
                                        <div class="d-flex align-items-center m-t-5 m-b-15">
                                            <div class="avatar avatar-image avatar-sm">
                                                <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                            </div>
                                            <!--<div class="m-l-10">
                                                <span class="text-gray font-weight-semibold">Darryl Day</span>
                                                <span class="m-h-5 text-gray">|</span>
                                                <span class="text-gray">Jan 2, 2019</span>
                                            </div>
                                        </div>
                                        <p class="m-b-20">Jelly-o sesame snaps halvah croissant oat cake cookie. Cheesecake bear claw topping. Chupa chups apple pie carrot cake chocolate cake caramels</p>
                                        <div class="text-right">
                                            <a class="btn btn-hover font-weight-semibold" href="blog-post.html">
                                                <span>Read More</span>
                                            </a>
                                        </div>
                                    </div>-->
									<br>
									<div class="sharetastic m-20"></div>
                                </div>
                            </div>
                        </div>
						
						<?php if($artwork->added_by == $this->uid){ ?>
						
						<div class="card">
							<div class="card-body">
								<div class="m-t-20">
										
										
										<ul class="list-group list-group-flush">
										<?php /* if($artwork->comments !=''){ ?>
											
											<li class="list-group-item p-h-0">
												<div class="media m-b-15">
													
													<div class="media-body m-l-20">
														<h6 class="m-b-0">
															<a href="" class="text-dark">Artist comment </a>
														</h6>
														<span class="font-size-13 text-gray"><?=  date('jS M Y', strtotime($artwork->created_at)); ?></span>
													</div>
												</div>
												<p><?= $artwork->comments ?></p>
											 </li>
										<?php }  */?> 
												 
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
												 <p>No Teacher Comments Yet</p>
												 </li>
												<?php
											} ?>
											
											
											
										</ul>
									</div>
									<hr>
									
									<div id="msg"></div>
								<form class="mb-5 form_class" id="rfs_parent_form" method="POST" action="<?= site_url('artwork/save_feedback') ?>">
								
									<input type="hidden" name="artwork_id" value="<?= $artwork->id ?>">
									<input type="hidden" name="added_by" value="<?= $artwork->added_by ?>">
								
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

               