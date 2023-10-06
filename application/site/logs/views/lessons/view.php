 <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />

 <!-- City -->
 <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />

 <!-- content -->
 <div class="content ">

 <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Lesson Details</a>
						</h3>
					
					</div>
				</div>
			</div>
 <?php } ?>
 	<!--<div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>-->

 	<div class="row">
 		<div class="col-md-12">


 			<div class="row g-4" style="margin-bottom: 15px;">
 				<div class="col-lg-12 col-md-12 col-sm-12">
 					<div class="card card-hover">
 						<div class="card-body row">
 							
 							<div class="col-md-10 offset-1">
 								<h5 class="card-title mb-3"><?= $view_lessons->lesson_name ?></h5>
 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6> Final Artwork </h6>
 									</div>
 									<div class="col-md-9"> 
										<img src="<?= base_url(). $view_lessons->final_artwork ?>" width="40%" height="250"></div>
 								</div>
								
								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Keywords:</h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->keywords ?></div>
 								</div>
								
								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Material Required:</h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->material_required ?></div>
 								</div>
								
								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6> Duration </h6>
 									</div>
 									<div class="col-md-9"> <?= $view_lessons->duration ?></div>
 								</div>
								
								

 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6> Description: </h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->description ?></div>
 								</div>
 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Aim And Objective: </h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->aim_and_objective ?></div>
 								</div>
 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Artist Art Movement: </h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->artist_art_movement ?></div>
 								</div>
								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Technique: </h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->technique ?></div>
 								</div>
								
								
 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Medium: </h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->medium ?></div>
 								</div>
 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Elements of Art Covered:</h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->elements_of_art_covered ?></div>
 								</div>
 								<!-- <div class="row border-bottom mt-3">
 									<div class="col-md-3">
 										<h6>Final Artwork:</h6>
 									</div>
 									<div class="col-md-9"><?= $view_lessons->final_artwork ?></div>
 								</div> -->

 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Introduction Video:</h6>
 									</div>
 									<div class="col-md-9">
 										<?php if (!empty($view_lessons->introduction_video)) {
												$url = base_url() . $view_lessons->introduction_video;
											?>
 											<!--<video width="320" height="240" controls>
 												<source src="<?=$url?>" type="video/mp4">
 												<source src="<?=$url?>" type="video/ogg">
 												Your browser does not support the video tag.
 											</video>-->
 											<video id="my-video" class="video-js vjs-theme-city" controls preload="auto" width="640" height="264" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
 												<source src="<?php echo $url ?>" type="video/mp4" />
 												<p class="vjs-no-js">
 													To view this video please enable JavaScript, and consider upgrading to a
 													web browser that
 													<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
 												</p>
 											</video>
 										<?php } else {
												echo 'No Video';
											} ?>
 									</div>
 								</div>
 								<div class="row border-bottom mb-3	 mt-3">
 									<div class="col-md-3">
 										<h6>Demonstration Video</h6>
 									</div>
 									<div class="col-md-9">
 										<?php if (!empty($view_lessons->demonstration_video)) {
												$url = base_url() . $view_lessons->demonstration_video;
											?>
 											<video id="my-video" class="video-js vjs-theme-city" controls preload="auto" width="640" height="264" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
 												<source src="<?php echo $url ?>" type="video/mp4" />
 												<p class="vjs-no-js">
 													To view this video please enable JavaScript, and consider upgrading to a
 													web browser that
 													<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
 												</p>
 											</video>
 										<?php } else {
												echo 'No Video';
											} ?>
 									</div>
 								</div>


 								
								
								

 								<div class="row  mt-3" style="margin-bottom:150px">
 									<div class="col-md-3">
 										<h6>Options</h6>
 									</div>
 									<div class="col-md-9">
									<!--<a href="<?= base_url().$view_lessons->teachers_note ?>" target="_blank"> Click to View PDF</a>
									<br>-->
									<object width="100%" height="150%" type="application/pdf" data="<?= base_url().$view_lessons->options ?>#toolbar=0" id="pdf_content"><p>No File Attached</p></object><br><br><br>
									</div>
 								</div>


								<div class="row  mt-3" style="margin-bottom:150px">
 									<div class="col-md-3">
 										<h6>Teachers Note:</h6>
 									</div>
 									<div class="col-md-9">
									<!--<a href="<?= base_url().$view_lessons->teachers_note ?>" target="_blank"> Click to View PDF</a>
									<br>-->
									<object width="100%" height="150%" type="application/pdf"  data="<?= base_url().$view_lessons->teachers_note ?>#toolbar=0" id="pdf_content"><p>No File Attached</p></object><br><br><br>
									</div>
 								</div>





 							</div>

 						</div>
 					</div>
 				</div>
 			</div>




 		</div>

 	</div>

 </div>
 <!-- ./ content -->
 <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>

 <script>
 	function searchFilter(page_num) {
 		//alert(checkedVal);
 		$("#filter-labels").html('');
 		page_num = page_num ? page_num : 0;

 		alert(page_num);

 		$.ajax({
 			type: 'POST',
 			url: '<?= base_url("/admin/applicantsajaxPaginationData/") ?>' + page_num,
 			data: {
 				page: page_num,
 				job_status: job_status,
 				job_type: job_type,
 				keyword: keyword
 			},
 			beforeSend: function() {
 				$('.loading').show();
 			},
 			success: function(res) {
 				res = JSON.parse(res);
 				setcst(res.cst);

 				$('#pagination').html(res.pagination);
 				$('#showing_text').html(res.showing_text);
 				$('#postList').html(res.html);
 				$('.loading').fadeOut("slow");
 			}
 		});
 	}
 </script>