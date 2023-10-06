
          
            <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
				
				<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<!--<div class="media m-v-10">
						<a href="<?=base_url('Dashboard')?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>-->
				    </div>
					<div class="col-md-5 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">View <?= ($this->uri->segment(2) == 'classportfolio') ? 'Class Portfolio' : 'Portfolio' ?></a>
						</h3>
					
					</div>
					
				    <div class="col-md-3 d-flex">
					<div class="" style="margin-right:10px">
					    <a href="<?=base_url('Artwork/classes_list')?>" class="btn btn-primary">
						<i class="anticon anticon-eye"></i>
						<span class="m-l-5">Class  Artwork</span>
					    </a>
					</div>
				  
					<div class="">
					    <a href="<?=base_url('Artwork/upload_artwork')?>" class="btn btn-primary">
						<i class="anticon anticon-plus"></i>
						<span class="m-l-5">Upload Artwork</span>
					    </a>
					</div>
				    </div>
					
					
				</div>
			</div>
			
			<div class="page-header no-gutters">
				<div class=" row col-12 justify-content-right">
				<div id="msg"></div>
				
				<?php if($this->uri->segment(2) == 'classportfolio'){
					?>
					
					<div class="col-md-2 ">
						<div class="form-group ">
							<label for="inputState">Select Lesson</label>
							<select id="lesson_id" name="lesson_id" onchange="searchFilter()" class="select2 required valid">
								<option value="">Select Lesson</option>
									<?php
										if($lessons['num']>0){
											foreach($lessons['data'] as $r){
									?>
										<option value="<?=$r->lesson_id?>"><?=$r->lesson_name?></option>
									<?php			
											}
										
										}
									?>
							</select>
						</div>
					</div>
			
					<?php
				}else{ ?>
             <div class="col-md-2 ">
				<div class="form-group ">
					<label for="inputState">Select Student</label>
					<select id="student_id" name="student_id" onchange="searchFilter()" class="select2 required valid">
						<option selected="">Please Select</option>
							<?php
								if($childen['num']>0){
									foreach($childen['data'] as $c){
							?>
								<option value="<?=$c->student_id?>" <?php if($childen['num'] == 1) echo 'selected'; ?>><?=$c->first_name?>-<?=$c->class_name?>-<?=$c->section_name?></option>
							<?php			
									}
								
								}
							?>
					</select>
					
					
				</div>
			</div>
			
			<div class="col-md-2">
			  <div class="form-group">
				<label for="inputState">Select Academic Year</label>
				<select onchange="searchFilter()"  id="academic_year" name="academic_year" class="form-control">
				<option value="">Select Academic Year</option>
					<?php
					if(!empty($academicyear)){
					foreach($academicyear as $year)
					{
					?>
					 <option value="<?php echo $year->id  ;?>" <?php if($year->name=='currrent_year') { echo 'selected=selected';}  ?>><?php echo $year->values;?></option>
					
					<?php
					}
					}else{
						echo ' <option>No Academic Year Data</option>';
					}
					?>
				</select>
			 </div>
			</div>
				<?php } ?>
				
				<input type='hidden' name="request_from" id="request_from" value="<?=$this->uri->segment(2)?>">
			</div>
			</div>
		
             <div class="col-12">
			  <ul class="row first" style="list-style: none;" id="artworklist">
					<?php
					if(empty($artworks)) {
					?>
						No data to display
					<?php
					} else {
						foreach ($artworks as $key => $row) {
							
						?> 
						<li class="col-2">
								<div class="artwork_card card">
									<img class="card-img-top" src="<?=$row->artwork_upload?>" alt="">
								</div>
								<div class="card-body">
									<div class="m-t-20">
										<div class="text-center text-sm-left m-v-15 p-l-30">
											<p class="text-dark"><?=$row->lesson_name?></p>
										</div>
									</div>
							
								
								
									<div class="m-t-15">
										<a href="<?= base_url('artwork/view/'.base64_encode($row->id)) ?>" class="m-r-5 btn btn-icon btn-hover btn-rounded" style="display: contents;"> <i class="anticon anticon-eye"></i>  
										</a>
										<?php if($row->added_by == $this->uid){ ?>
											<a href="javascript:void(0);"  data-did="<?= $row->id ?> "  data-tbl="artwork" data-ctrl="artwork"  class="m-r-5 btn btn-icon btn-hover btn-rounded text-danger delete_class"><i class="anticon anticon-delete"></i></a>
										<?php } ?>
										
									</div>
								</div>
				 
							</li>
					<?php
						}
					}
					?>
					   
				
			</div>
			</ul>
		    
		      <div id="pagination"><?=$pagination?></div>
				<span id="showing_text"><?=$showing_text?></span>
		    
			<!--<div class="row ">
				<div class="col-md-3 col-lg-3">
					<div class="card">
						<div class="card-body">
						
							<div class="">
							    <div class="d-flex align-items-center justify-content-between">
								<div class="media align-items-center">
								    <div class="avatar avatar-icon avatar-lg avatar-blue">
									    <i class="anticon anticon-user"></i>
									</div>
								    <div class="m-l-10">
									<h3 class="m-b-0">
									    <a class="text-dark" href="<?=base_url('Children')?>">Manage Children</a>
									</h3>
									<p>You have added <a href="<?=base_url('Children')?>"><?= $childen['num'] ?> children</a> </p>
								
								    </div>
								</div>
								<div class="dropdown dropdown-animated scale-left">
									<a href="<?=base_url('Children')?>">
										<div class="avatar avatar-icon avatar-lg avatar-blue">
											<i class="anticon anticon-arrow-right"></i>
										</div>
									</a>
								
								</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-lg-3">
					<div class="card">
						<div class="card-body">
						
							<div class="">
							    <div class="d-flex align-items-center justify-content-between">
								<div class="media align-items-center">
								    <div class="avatar avatar-icon avatar-lg avatar-blue">
									    <i class="anticon anticon-appstore"></i>
									</div>
								    <div class="m-l-15">
									<h3 class="m-b-0">
									    <a class="text-dark" href="<?=base_url('Artwork')?>">Upload Portfolio</a>
									</h3>
									<p><a href="<?=base_url('Artwork')?>"><?= $artworks['num'] ?> artworks</a> are uploaded</p>
								    </div>
								</div>
								<div class="dropdown dropdown-animated scale-left">
									<a href="<?=base_url('Artwork')?>">
										<div class="avatar avatar-icon avatar-lg avatar-blue">
											<i class="anticon anticon-arrow-right"></i>
										</div>
									</a>
								
								</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-lg-3">
					<div class="card">
						<div class="card-body">
						
							<div class="">
							    <div class="d-flex align-items-center justify-content-between">
								<div class="media align-items-center">
								    <div class="avatar avatar-icon avatar-lg avatar-blue">
									    <i class="anticon anticon-eye"></i>
									</div>
								    <div class="m-l-15">
									<h3 class="m-b-0">
									    <a class="text-dark" href="<?=base_url('artwork/classes_list')?>">Class Portfolio</a>
									</h3>
									
								    </div>
								</div>
								<div class="dropdown dropdown-animated scale-left">
									<a href="<?=base_url('artwork/classes_list')?>">
										<div class="avatar avatar-icon avatar-lg avatar-blue">
											<i class="anticon anticon-arrow-right"></i>
										</div>
									</a>
								
								</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 col-lg-3">
					<div class="card">
						<div class="card-body">
						
							<div class="">
							    <div class="d-flex align-items-center justify-content-between">
								<div class="media align-items-center">
								    <div class="avatar avatar-icon avatar-lg avatar-blue">
									    <i class="anticon anticon-eye"></i>
									</div>
								    <div class="m-l-15">
									<h3 class="m-b-0">
									    <a class="text-dark" href="<?=base_url('children/grade_report')?>">Grade Report</a>
									</h3>
									
								    </div>
								</div>
								<div class="dropdown dropdown-animated scale-left">
									<a href="<?=base_url('children/grade_report')?>">
										<div class="avatar avatar-icon avatar-lg avatar-blue">
											<i class="anticon anticon-arrow-right"></i>
										</div>
									</a>
								
								</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				
			</div>-->
		    
			<!--<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Manage Children</a>
						</h3>
					
					</div>
				    
				</div>
			</div>
			<div class="row">
			
			<?php
					if ($childen['num'] == 0) {
					?>
						No data to display
					<?php
					} else {
						foreach ($childen['data'] as $row) {
						?>
							<div class="col-md-3 col-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="m-t-20">
								<div class="avatar avatar-image m-l-20" style="height: 100px; width: 100px;">
								    <img src="<?= $row->image_path ?>" alt="">
								</div>
							
								<div class="text-center text-sm-left m-v-15 p-l-30">
									<h4 class="m-b-5"><?=$row->first_name?></h4>
									<p class="text-dark m-b-5"><?=$row->admission_number?></p>
									<p class="text-dark m-b-5"><?=$row->class_name?>/ <?=$row->section_name?></p>
									<p class="text-dark m-b-20"><?=$row->school_name?></p>
								</div>
							</div>
							
							<div class="m-t-15 m-l-20">
								<a data-s="<?=$row->student_id;?>" class="m-r-5 btn btn-icon btn-hover btn-rounded delete_child">
								    <i class="anticon anticon-delete"></i>
								</a>
								
								<!--<a href="<?= base_url('view_child/'.$row->student_id) ?>" class="m-r-5 btn btn-icon btn-hover btn-rounded">
								    <i class="anticon anticon-eye"></i>
								</a>-->
								
								<!--<button class="m-r-5 btn btn-icon btn-hover btn-rounded">
								    <i class="anticon anticon-edit"></i>
								</button>
								
								
								<button class="m-r-5 btn btn-icon btn-hover btn-rounded">
								    <i class="anticon anticon-appstore"></i>
								</button>-->
							<!--</div>
						  
						</div>
					</div>
				</div>
						<?php
						}
					}
					?>
				
			</div>-->
		 
		  
	       </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2023 RainbowFish. All rights reserved.</p>
                        <span>
                            <a href="<?= base_url('pages/termsandconditions') ?>" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="<?= base_url('pages/privacy_policy') ?>" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>   
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5> 
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

          
        </div>
    </div>

    <script>
function searchFilter(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var request_from         = $("#request_from").val();
		var student_id         = $("#student_id").val();
		var sortby  = $( "#sortby option:selected" ).val();
		//var perpage    = $( "#perpage option:selected" ).val();
		var perpage    = 10;
		var academic_year    = $( "#academic_year option:selected" ).val();
		var lesson_id    = $( "#lesson_id option:selected" ).val();
		var status    = $( "#status option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/dashboard/ajaxPagination/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,student_id:student_id,academic_year:academic_year,status:status,lesson_id:lesson_id,request_from:request_from},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#artworklist').html(res.html);
			}
		});
	}
</script>
    <style>
	.justify-content-right{
		justify-content: right !important;
	}
    </style>