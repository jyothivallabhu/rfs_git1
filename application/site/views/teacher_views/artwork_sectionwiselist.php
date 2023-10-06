<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Artwork - <?= $lesson_details[0]->lesson_name ?>  - <?= $classdetails[0]->class_name ?> - <?= $classdetails[0]->section_name ?> </a>
						</h3>
					
					</div>
					<!--<div class="col-md-6 text-right">
						<div class="text-md-right">
						    <a href="" class="btn btn-primary">
							<i class="anticon anticon-plus"></i>
							<span class="m-l-5">Add</span>
						    </a>
						</div>
					</div>-->
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				
					<div class="card">
						<div class="card-body"> 
							<div class="table-responsive">
							<form action="<?=base_url('teacher_artwork/save_bulk_feedback')?>" method="post" enctype="multipart/form-data" name="teacher_mentoring" id="teacher_mentoring" class="form_class">
							
								 <?php $this->load->view('include/msgs'); ?>
								 
								<table class="table table-hover" id=""  data-module="teacher_artwork" data-section_id="<?= $section_id?>" data-lesson_id="<?= $lesson_id?>" class="table">
									<thead>
										<tr>
										 
										<th data-sortable="false">Student </th>
										<th data-sortable="false">Artwork Image</th> 
										<th data-sortable="false">Feedback</th>
										<th data-sortable="false">Action </th>
								
										</tr>
									</thead>
                                    <tbody>
									<input type='hidden' name="school_id" value = <?= $this->school_id ?>>
									<input type='hidden' name="section_id" value = <?= $section_id ?>>
									<input type='hidden' name="lesson_id" value = <?= $lesson_id ?>>
									<?php
										if(!empty($artworks)){
											foreach ($artworks as $req) {  
											?>
												
												<input type='hidden' name="artwork_id[]" value = <?= $req->id ?>>
												<input type='hidden' name="added_by[]" value = <?= $req->added_by ?>>
												
											<tr>
												<td><?= $req->first_name.' '.$req->last_name?></td>
												<td  class="popup"><img id="myImg" src="<?= $req->artwork_upload ?> " height="60" width="60" />
												
												</td>
												<!--<td><?php 
												if($req->feedback=='1'){
													$feedbackstatus = '<a class="badge badge-pill badge-cyan font-size-12">Given</a>';	
												}else{
													$feedbackstatus = '<a class="badge badge-pill badge-gold font-size-12">Pending</a>';	
												}
												echo $feedbackstatus;

												?>
												</td>-->
			
												<td>
												<?php 
												if($req->feedback=='1'){
														echo $req->artwork_feedback;
												}else{
													?>
													<textarea type="text" class="form-control mceeditor" id="grade_comments" placeholder="Search" name="comments[]" ></textarea>
													<?php
													
												}

												?>
												
													
												</td>
												
												<td>
													<a href="<?= base_url($this->url_slug.'/view_artwork/'.base64_encode($req->id)) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
												</td>

											</tr>
											
											<?php
												
											}
										}else{
											echo "<tr><td>No Data Found</td></tr>";
										}
										?>
									
									
									</tbody>
								</table>
								<button type="submit" class="btn btn-primary" style="float: right;">Save</button>
								</form>
								
								<div id="myModal" class="modal">
								  <span class="close">&times;</span>
								  <img class="modal-content" id="img01">
								  <div id="caption"></div>
								</div>
								
								<div class="show1">
								  <div class="overlay"></div>
								  <div class="img-show">
									<span>X</span>
									<img src="">
								  </div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

              <script>
			  
			  $(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show1").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show1").fadeOut();
    });
    
});

</script>

<style>

/* .popup{
    width: 900px;
    margin: auto;
    text-align: center
}
.popup img{
    width: 200px;
    height: 200px;
    cursor: pointer
} */
.show1{
    z-index: 999;
    display: none;
}
.show1 .overlay{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
.show1 .img-show{
    width: 600px;
    height: 400px;
    background: #FFF;
    position: absolute;
    top: 25%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
/*End style*/


</style>