
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?=base_url('teacher_lessons')?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Edit Lesson Schedule</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
		    
			<div class="row">
				
				
				<div class="col-md-6 col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
						
							 <form action="<?=base_url('teacher_lessons/update')?>" method="post" enctype="multipart/form-data" name="teacher_trial_form" id="teacher_trial_form" class="form_class">
								 <?php $this->load->view('include/msgs'); ?>
							
										<input  type="hidden" name="schedule_id" value="<?= $view_data->id ?>" readonly>
										<input  type="hidden" name="section_id" value="<?= $view_data->section_id ?>" readonly>
									
									<div class="form-group">
										<label for="inputState" class="form-label">Lesson</label>
										<input class="form-control" type="text" name="class_name" value="<?= $view_data->lesson_name ?>" readonly>
									</div>
									
									<div class="form-group">
										<label for="inputState" class="form-label">Class</label>
										<input class="form-control" type="text" name="class_name" value="<?= $view_data->class_name ?>" readonly> 
									</div>
									
									<div class="form-group">
										<label for="inputState" class="form-label">Section</label>
										<input class="form-control" type="text" name="class_name" value="<?= $view_data->section_name ?>" readonly> 
									</div>
								
								<div class="form-group">
										<label for="inputState" class="form-label">From Date</label>
										<input type="date" name="from_date"  value="<?= date('Y-m-d', strtotime($view_data->from_date)) ?>" required class="form-control" placeholder="From Date" >
									</div>
								
								<div class="form-group">
										<label for="inputState" class="form-label">To Date</label>
										<input type="date" name="to_date" value="<?= date('Y-m-d', strtotime($view_data->to_date)) ?>" required class="form-control" placeholder="To Date"  > 
									</div>
								
								
								
									
									<div class="form-group">
										<label for="inputState" class="form-label">Lesson Progress</label>
										<select class="form-control" name="lesson_status">
											<option value="0" <?php if($view_data->lesson_status=='0') { echo 'selected=selected';}  ?>>Not Started</option>
											<option value="1" <?php if($view_data->lesson_status=='1') { echo 'selected=selected';}  ?>>In Progress</option>
											<option value="2" <?php if($view_data->lesson_status=='2') { echo 'selected=selected';}  ?>>Completed</option>
											
										</select>
									</div>

								
								
								
								<div class="form-group ">
									<div class="text-center">
										<a  href="<?=base_url('teacher_lessons')?>" class="btn btn-primary-outline">Cancel</a>
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