 <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />

 <!-- City -->
 <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />



<style>
    .video-js .vjs-big-play-button {
    top: 100px;
    left: 179px;}
    
    .size-28{font-size:28px}
	
	.video-js .vjs-big-play-button .vjs-icon-placeholder:before {
    
    padding-top: 3%;
}
</style>

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


 			<div class="row g-4" style="margin-bottom: 15%;">
 				<div class="col-lg-12 col-md-12 col-sm-12">
 					<div class="card card-hover">
 						<div class="card-body row">
 								<div class="col-md-3">
 								    <img src="<?= base_url(). $view_lessons->final_artwork ?>" width="" height="350" class="img-fluid" style="position: sticky;top: 8rem;height: 240px;max-height:250px">
 								    
 								    
 								</div>    
 								
 							<div class="col-md-9">
 								<h5 class="card-title mb-3"><?= $view_lessons->lesson_name ?></h5>
 							
								<div class="row <?= ($view_lessons->description!= '' )? 'border-bottom' : '' ?> mb-3	 mt-3">
 									 <div class="col-md-9"><?= $view_lessons->description ?></div>
 								</div>
								
								<div class="row <?= ($view_lessons->aim_and_objective!= '' )? 'border-bottom' : '' ?>  mb-3	 mt-3">
									<div class="col-md-9"><?= $view_lessons->aim_and_objective ?></div>
 								</div>
								
								<div class="row <?= ($view_lessons->artist_art_movement!= '' )? 'border-bottom' : '' ?>  mb-3	 mt-3">
									<div class="col-md-9"><?= $view_lessons->artist_art_movement ?></div>
 								</div>
								
						<div class="d-flex justify-content-between mt-4 col-md-12">
							<?php if($view_lessons->duration !=''){ ?>
							<div class="text-center  col-3"><p>Duration</p><i class="bi bi-clock size-28"></i>  <p><?= $view_lessons->duration ?></p></div>
							<?php } ?>
							
							<?php if($view_lessons->medium !=''){ ?>
							<div class="text-center  col-3"> <p>Medium</p><i class="bi bi bi-file-text size-28"></i> 
							<p><?= $view_lessons->medium ?></p> </div>
							<?php } ?>
							
							<?php if($view_lessons->technique !=''){ ?>
							<div class="text-center  col-3" ><a href="<?= SITE_URL.'uploads/techniques.pdf' ?>" target=_blank><p>Technique</p><i class="bi bi-file-earmark-font size-28"></i>  <p><?= $view_lessons->technique ?></p></a></div>
							<?php } ?>
							
							<?php if($view_lessons->elements_of_art_covered !=''){ ?>
							<div class="text-center  col-3" ><a href="<?= SITE_URL.'uploads/elements_of_art.pdf' ?>" target=_blank><p>Elements</p><i class="bi bi bi-journals size-28"></i> 
							<p><?= $view_lessons->elements_of_art_covered ?> </p></a></div>
							<?php } ?>	
						</div>
								
								
 								
                              
 						    
                                <div class="row">
                                    <div class="col-md-6 mt-4">
 										<?php if (!empty($view_lessons->introduction_video)) {
												$url = base_url() . $view_lessons->introduction_video;
											?> 
 											<video id="my-video"   class="video-js vjs-theme-city" controls preload="auto"  width="100%" height="400" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
 												<source src="<?php echo $url ?>" type="video/mp4" />
 												
 											</video>
 										<?php }  ?>
 									</div>
                                    <div class="col-md-6 mt-4">
 										<?php if (!empty($view_lessons->demonstration_video)) {
												$url2 = base_url() . $view_lessons->demonstration_video;
											?>
 											<video id="my-video"   class="video-js vjs-theme-city" controls preload="auto" width="100%" height="400" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
 												<source src="<?php echo $url2 ?>" type="video/mp4" />
 												
 											</video>
 										<?php }   ?>
 									</div>
                                </div>
 						    	

							<?php if($view_lessons->teachers_note != ''){
										?>
								<div class="row  mt-3" style="margin-bottom:450px">
 									<div class="col-md-3">
 										<h6>Teacher's Note: </h6>
 									</div>
 									<div class="col-md-9">
									
										<object width="100%" height="300%" type="application/pdf"  data="<?= base_url().$view_lessons->teachers_note ?>#toolbar=0" id="pdf_content"><p>No File Attached</p></object><br><br><br>
									</div>
 								</div>
								
								<?php
									}
									/* else{
										echo 'No File Attached';
									} */ ?>

								
								<?php if($view_lessons->options != ''){
										?>
										
								<div class="row  mt-3" style="margin-bottom:150px">
 									<div class="col-md-3">
 										<h6>Options: </h6>
 									</div>
 									<div class="col-md-9">
									
										<object width="100%" height="300%" type="application/pdf" data="<?= base_url().$view_lessons->options ?>#toolbar=0" id="pdf_content"><p>No File Attached</p></object><br><br><br>
									 </div>
 								</div>
								<?php
									}/* else{
										echo 'No File Attached';
									} */ ?>

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
 
 <style>
 @media screen and (max-width: 480px) {
	.my-video-dimensions {
		width: 100%;
		height: 264px;
	}
	.video-js .vjs-big-play-button{
		top: 100px;
         left: 34%;
	}
 }
 
 .my-video-dimensions {
    width: 100%;
    height: 264px;
}
 </style>

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
	
	function playVid() { 
	alert('test');
		if ($("#my-video").trigger('pause')) {
			$("#my-video").trigger('play') 
		} else {
		   $("#my-video").trigger('pause') 	
		} 
	} 

	/*  jQuery('video').each(function () 
    {
		$("video").click(function() { 
			var video1 = $("#my-video").get(0);
			vid = document.getElementById("my-video");  
			console.log($(this).trigger('pause'));
			
			if ($(this).trigger('pause')) {
				$(this).trigger('play') 
			} else {
			   $(this).trigger('pause') 	
			} 
			return false;
		});    
	}); */ 

$(document).ready(function() {
 var videos = document.querySelectorAll('video');

function pauseAll(elem){
    for(var i=0; i<videos.length; i++)
    {
        //Is this the one we want to play?
        if(videos[i] == elem) continue;
        //Have we already played it && is it already paused?
        if(videos[i].played.length > 0 && !videos[i].paused){
        // Then pause it now
          videos[i].pause();
        }
    }
  }
 
for(var i=0; i<videos.length; i++)
   videos[i].addEventListener('play', function(){pauseAll(this)}, true);
})


 </script>