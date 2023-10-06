
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<!--<a href="<?= base_url().$this->url_slug.'/teacher_mentoring/add' ?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>-->
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Grade Entry</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-6 col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
						
							 <form action="<?=base_url('grade_entry/create_bulk_entry_step1')?>" method="post" enctype="multipart/form-data" name="teacher_mentoring" id="teacher_mentoring" class="form_class">
								 <?php $this->load->view('include/msgs'); ?>
							
									
									<div class="form-group">
										<label for="inputState" class="form-label">Class</label>
										 <select name="class_id" id="gradeentry_class_id" class="form-control  valid" required>
											<option value = '' selected="">Select Class</option>
											<?php
											if ($classes['num'] > 0) {
											foreach($classes['data'] as $class)
											{
											?>
											 <option value="<?php echo $class['c_id']  ;?>"><?php echo $class['class_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Class Data Found</option>';
											}
											?>
										</select>
									</div>
									
									<div class="form-group">
										<label for="first_name" class="form-label">Section</label>
										<select class="form-control  valid"  data-id="1" id="gsection_id" required name="section_id" >
								   
										</select>
									</div>
									<div class="form-group">
										<label for="first_name" class="form-label">Lesson</label>
										<div data-id="1" id="lesson_id" >
								   
										</div>
									</div>
						
									<div class="form-group">
										<label for="exam_type" class="form-label">Exam Types</label>
										<select class="form-control  valid"  data-id="1" id="exam_type" required name="exam_type" >
										<option value = '' selected="">Select Exam Types</option>
								   <?php
											if ($exam_types['num'] > 0) {
											foreach($exam_types['data'] as $exam_type)
											{
											?>
											 <option value="<?php echo $exam_type['id']  ;?>"><?php echo $exam_type['exam_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option value="">No Exam Data Found</option>';
											}
											?>
										</select>
									</div>
						
									
								
								
								<div class="form-group ">
									<div class="text-center">
										<!--<button class="btn btn-primary-outline">Cancel</button>-->
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