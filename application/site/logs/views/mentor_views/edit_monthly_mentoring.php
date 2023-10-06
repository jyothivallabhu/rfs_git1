
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?=base_url('mentor_monthly_mentoring')?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Upload Monthly Mentoring</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
		    
			<div class="row" id="app">
				
				
				<div class="col-md-6 col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
						
							 <form action="<?=base_url('mentor_monthly_mentoring/update')?>" method="post" enctype="multipart/form-data" name="mentor_monthly_mentoring_form" id="mentor_monthly_mentoring_form" class="form_class">
								 
								 
							
									<input type="hidden" name = "trail_id" value="<?= $view_data['id'] ?>">
									
									<div class="form-group">
										<label for="inputState" class="form-label">Schools</label>
										 <select name="school_id" id="school_id" class="form-control  valid" required>
											<option value = '' selected="">Select School</option>
											<?php 
											if(!empty($schools)){
												foreach ($schools as $key => $value) {
												?>
												<option value="<?=  $value['id'] ?>" <?= ($value['id'] == $view_data['school_id']) ? 'selected':'' ?>><?=  $value['school_name'] ?></option>
											<?php  
												}
											}else{
												echo ' <option>No Schools found</option>';
											}
											?>
										</select>
									</div>
									
									<div class="form-group">
										<label for="inputState">Classes</label>
										 <select name="class_id" id="class_id" class="form-control required valid">
											<?php 
											if(!empty($classes)){
												foreach ($classes as $r) {
												?>
												<option value="<?=  $r->c_id ?>" <?= ($r->c_id == $view_data['class_id']) ? 'selected':'' ?>><?=  $r->class_name ?></option>
												
											<?php  
												}
											}else{
												echo ' <option>No classes found</option>';
											}
											?>	
										</select>
									</div>
									
									<div class="form-group">
										<label for="inputState">Lessons</label>
										 <select name="lesson_id" id="lesson_id" class="form-control required valid">
											<?php 
											if(!empty($lessons)){
												foreach ($lessons as $r) {
													
												?>
												<option value="<?=  $r->lesson_id ?>" <?= ($r->lesson_id == $view_data['lesson_id']) ? 'selected':'' ?>><?=  $r->lesson_name ?></option>
											<?php  
												}
											}else{
												echo ' <option>No lessons found</option>';
											}
											?>	
										</select>
									</div>
								
									<div class="form-group">
										<label for="inputState">Upload art work</label>
										 <input id="cropzee-input" name="artwork_upload1" type="file" name="">
										 <input id="base_code_cropzee-input" type="hidden" name="base_code1" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input"><img src="<?=  $view_data['image_path'] ?>" height="100" width="100" /></div>
									</div>
									
									
									
								
								<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input3" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input3" type="hidden" name="base_code3" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input3"><?php 
										if(!empty($view_data['image2'])){
												echo '<img src="'.base_url().$view_data["image2"].'" height="60" width="60" />';
											} ?></div>
									</div>
								
								<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input4" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input4" type="hidden" name="base_code4" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input4">
										<?php
												if(!empty($view_data['image3'])){
													echo '<img src="'.base_url().$view_data["image3"].'" height="60" width="60" />';
												}
												?></div>
									</div>
								
								<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input5" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input5" type="hidden" name="base_code5" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input5">
										<?php
												if(!empty($view_data['image4'])){
														echo '<img src="'.base_url().$view_data["image4"].'" height="60" width="60" />';
												}
													?>
													</div>
									</div>
									
									<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input6" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input6" type="hidden" name="base_code6" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input6">
										<?php
												if(!empty($view_data['image5'])){
													echo '<img src="'.base_url().$view_data["image5"].'" height="60" width="60" />';
												}
													?>
										</div>
									</div>
									
									
									<div class="form-group">
										<label for="inputState">Reference Image</label>
										 <input id="cropzee-input2" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input2" type="hidden" name="base_code2" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input2"><img src="<?=  $view_data['reference_image'] ?>" height="100" width="100" /></div>
									</div>
									
								<div class="form-group">
									<label class="font-weight-semibold" for="actionplan">Action plan</label>
									<textarea class="form-control" name="actionplan" id="actionplan" ><?=  $view_data['actionplan'] ?></textarea >
								</div>
								<div class="form-group">
									<label class="font-weight-semibold" for="teacher_notes">Next review date</label>
									<input type="date" name="next_review_date" required class="form-control" placeholder="Enter Date"  value="<?= date('Y-m-d', strtotime($view_data['next_review_date'])) ?>">
								</div>
								
								
								<div class="form-group ">
									<div class="text-center">
										<a href="<?=base_url('mentor_monthly_mentoring')?>" class="btn btn-primary-outline">Cancel</a>
										<button class="btn btn-primary">Submit</button>
										
									</div>
										<?php $this->load->view('include/msgs'); ?>
								</div>
									
				</form>
						
						   
						</div>
					</div>
				</div>
				
				
			</div>
		    
		 
		  
	       </div>
               
			
			  
    <style>
	.wrap{
  width:120px;
  margin:0 auto;
  text-align:center;
  overflow: hidden;
}
label[for=upload]{
  display:inline-block;
  border: 1px solid #ccc;
    color: #666;
    font-weight: 400;
    background: #f4f4f4;
  padding:8px 15px;
  border-radius:5px;
  cursor:pointer
}
label[for=upload]:hover{
  background:#ddd
}
label[for=upload] input{ display:none }
.thumb{
  position:relative;
  height:120px;
  width:120px;
  border-radius: 100%;
  overflow:hidden;
  margin:10px 0;
  cursor:move;
  
}
.thumb:before{
  content:"";
  display:block;
  position:absolute;
  width:96%;
  height:96%;
  border:3px dashed #eee;
  z-index:9;
  top:1%;
  left:1%;
  opacity:0;
  transition:all 0.2s;
  pointer-events:none
}
.thumb:hover::before{
  opacity:0.6
}
.thumb img{
  min-height:100%;
  max-height:51vh;
  width:auto !important;
  transition:all 0.4s;
}

    </style>