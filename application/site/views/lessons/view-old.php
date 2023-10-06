<!-- content -->
    <div class="content ">
        
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
								<div class="col-md-4">
								<img src="<?= base_url().$view_lessons->final_artwork ?>" width="100%"></div>
								<div class="col-md-8">
									<h5 class="card-title mb-3"><?= $view_lessons->lesson_name ?></h5>
								<a href="#">
								</a>
								<div class="d-flex gap-3 mb-3 align-items-center">
									<h6 class="mb-0">Duration | <?= $view_lessons->duration ?></h4>
								</div>
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Description: </h4><span><?= $view_lessons->description ?></span>
								</div>
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Aim And Objective: </h4><span><?= $view_lessons->aim_and_objective ?></span>
								</div>
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Artist Art Movement: </h4><span><?= $view_lessons->artist_art_movement ?></span>
								</div>
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Medium: </h4><span><?= $view_lessons->medium ?></span>
								</div>
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Elements of Art Covered: </h4><span><?= $view_lessons->elements_of_art_covered ?></span>
								</div>
								<!--<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Final Artwork: </h4><span><?= $view_lessons->final_artwork ?><img src="<?= base_url().$view_lessons->final_artwork ;?>" height="60" width="60" style="float:right" /> </span>
								</div>-->
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Introduction Video: </h4>
									<?php if(!empty($view_lessons->introduction_video)) {
										$url= base_url().$view_lessons->introduction_video;
								?>
									<span><a href="<?php echo $url ?>" target=_blank><img src="<?= base_url('assets/images/video.jpg') ?>" alt="" width="50" height="50"></a><br><br></span>
									<?php }else{	echo 'No Video';}?>
									
								</div>
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Demonstration Video: </h4>
									<?php if(!empty($view_lessons->demonstration_video)) {
										$url= base_url().$view_lessons->demonstration_video;
								?>
									<span><a href="<?php echo $url ?>" target=_blank><img src="<?= base_url('assets/images/video.jpg') ?>" alt="" width="50" height="50"></a><br><br></span>
									<?php }else{	echo 'No Video';}?>
									<span></span>
								</div>
								<div class="d-flex gap-2 mb-3">
									<h6 class="mb-0">Teachers Note: </h4><span><?= $view_lessons->teachers_note ?></span>
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
	
	<script>
	function searchFilter(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;
		
		alert(page_num);
		
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/admin/applicantsajaxPaginationData/")?>'+page_num,
			data:{page:page_num,job_status:job_status,job_type:job_type,keyword:keyword},
			beforeSend: function () {
				$('.loading').show();
			},
			success: function (res) {
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