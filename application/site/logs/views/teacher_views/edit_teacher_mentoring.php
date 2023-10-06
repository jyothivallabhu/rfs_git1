
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
						    <a class="text-dark" href="javascript:void(0);">Edit Teacher Mentoring</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-6 col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
						
							 <form action="<?=base_url('teacher_continuous_mentoring/update')?>" method="post" enctype="multipart/form-data" name="teacher_mentoring" id="teacher_mentoring" class="form_class">
								 <?php $this->load->view('include/msgs'); ?>
							
									
									<input type="hidden" name='trail_id' value="<?=  $view_data['id'] ?>">
									
									<div class="form-group">
										<label for="inputState" class="form-label">Class</label>
										 <select name="class_id" id="class_id" class="form-control  valid" required>
											<option value = '' selected="">Select Class</option>
											<?php 
											if(!empty($classes)){
												foreach ($classes as $key => $value) {
												?>
												<option value="<?=  $value['c_id'] ?>" <?php if($value['c_id'] == $view_data['c_id']){echo 'selected';} ?>><?=  $value['class_name'] ?></option>
											<?php  
												}
											}else{
												echo ' <option>No classes found</option>';
											}
											?>
										</select>
									</div>
									
									<div class="form-group">
										<label for="inputState" class="form-label">Lesson</label>
										
										 <select name="lesson_id" id="lesson_id" class="form-control required valid" >
										 <option value = '' selected="">Select Lesson</option>
											<?php 
											if(!empty($lessons)){
												foreach ($lessons as $key => $value) {
												?>
												<option value="<?=$value['lesson_id'] ?>" data-id="1" <?php if($value['lesson_id'] == $view_data['lesson_id']){echo 'selected';} ?> ><?=  $value['lesson_name'] ?></option>
											<?php  
												}
											}else{
												echo ' <option>No lessons found</option>';
											}
											?>	
										</select>
									</div>
								
									<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input" name="artwork_upload1" type="file" name="">
										 <input id="base_code_cropzee-input" type="hidden" name="base_code1" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input"><img src="<?=  $view_data['image_path'] ?>" height="100" width="100" /></div>
									</div>
								
											
												
									<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input2" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input2" type="hidden" name="base_code2" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input2">
										<?php 
										if(!empty($view_data['image2'])){
												echo '<img src="'.base_url().$view_data["image2"].'" height="60" width="60" />';
											} ?>
										</div>
									</div>
								
								<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input3" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input3" type="hidden" name="base_code3" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input3">
										<?php
												if(!empty($view_data['image3'])){
													echo '<img src="'.base_url().$view_data["image3"].'" height="60" width="60" />';
												}
												?>
										</div>
									</div>
								
								<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input4" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input4" type="hidden" name="base_code4" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input4">
										<?php
												if(!empty($view_data['image4'])){
														echo '<img src="'.base_url().$view_data["image4"].'" height="60" width="60" />';
												}
													?>
										</div>
									</div>
								
								<div class="form-group">
										<label for="inputState">Image</label>
										 <input id="cropzee-input5" name="artwork_upload2" type="file" name="">
										 <input id="base_code_cropzee-input5" type="hidden" name="base_code5" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input5">
										<?php
												if(!empty($view_data['image5'])){
													echo '<img src="'.base_url().$view_data["image5"].'" height="60" width="60" />';
												}
													?>
										</div>
									</div>
								
								<div class="form-group">
									<label class="font-weight-semibold" for="teacher_notes">Teacher Notes</label>
									<textarea class="form-control" name="teacher_notes" id="teacher_notes" ><?=  $view_data['teacher_notes'] ?></textarea >
								</div>
								
								<div class="form-group">
										<label for="inputState" class="form-label">Stage</label>
										 <select name="stage" id="class_id" class="form-control  valid" required>
											<option value = '' selected="">Select Stage</option>
											<option value = 'Started Drawing' <?php if($view_data['stage'] == 'Started Drawing'){echo 'selected';} ?>>Started Drawing</option>
											<option value = 'Completed Drawing'<?php if($view_data['stage'] == 'Completed Drawing'){echo 'selected';} ?>>Completed Drawing</option>
											<option value = 'Started Coloring' <?php if($view_data['stage'] == 'Started Coloring'){echo 'selected';} ?>>Started Coloring</option>
											<option value = 'Completed Activity' <?php if($view_data['stage'] == 'Completed Activity'){echo 'selected';} ?>>Completed Activity</option>
											
										</select>
									</div>
									
									<!--<div class="wrap">Started Drawing / Completed Drawing / Started Coloring / Completed Activity
									   <div class="thumb"><img id="img" src="https://placeimg.com/300/300/people"/></div>
									   <form action="">
										<label for="upload">Add Images
										  <input type='file' id="upload"></label>

									  </form>
									  
									</div>-->
									

								
								<!--<div class="form-group">
									<label class="font-weight-semibold" for="Status">Status</label>
									<input type="text" class="form-control" id="Status" placeholder="Status">
								</div>-->
								
								
								<div class="form-group ">
									<div class="text-center">
										<button class="btn btn-primary-outline">Cancel</button>
										<button class="btn btn-primary">Submit</button>
									</div>
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