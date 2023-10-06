
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?=base_url('teacher_trial')?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Edit Teacher Trial</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-6 col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
						
							 <form action="<?=base_url('teacher_trial/update')?>" method="post" enctype="multipart/form-data" name="teacher_trial_form" id="teacher_trial_form" class="form_class">
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
									<label class="font-weight-semibold" for="teacher_notes">Teacher Notes</label>
									<textarea class="form-control" name="teacher_notes" id="teacher_notes" ><?=  $view_data['teacher_notes'] ?></textarea >
								</div>
								
								
								<div class="form-group ">
									<div class="text-center">
										<a href="<?=base_url('teacher_trial')?>" class="btn btn-primary-outline">Cancel</a>
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