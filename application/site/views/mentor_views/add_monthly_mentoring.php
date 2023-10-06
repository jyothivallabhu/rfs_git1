
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
		    
			<div class="row">
				
				
				<div class="col-md-6 col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
						
						
							 <form action="<?=base_url('mentor_monthly_mentoring/create')?>" method="post" enctype="multipart/form-data" name="mentor_monthly_mentoring_form" id="mentor_monthly_mentoring_form" class="form_class">
								 
								
									<div class="form-group">
										<label for="inputState" class="form-label">Schools</label>
										 <select name="school_id" id="school_id" class="form-control  valid" required>
											<option value = '' selected="">Select School</option>
											<?php 
											if(!empty($schools)){
												foreach ($schools as $key => $value) {
												?>
												<option value="<?=  $value['id'] ?>" data-id="1"><?=  $value['school_name'] ?></option>
											<?php  
												}
											}else{
												echo ' <option>No Schools found</option>';
											}
											?>
										</select>
									</div>
									
									  
									
									<div class="form-group">
										<label for="inputState">Reference Doc</label>
										
										<input type="radio" id="imagecheck" name="tab" value="imagecheck" onclick="show1();" />
										<label for="imagecheck">Image</label>
										<input type="radio" id="filecheck" name="tab" value="filecheck" onclick="show2();" />
										<label for="filecheck">File</label>
										
										
										  
									</div>
									
									<div class="form-group" id="imagecheck_div">
										<label for="inputState">Upload Image</label>
										 <input id="cropzee-input" name="artwork_upload1" type="file" name="">
										 <input id="base_code_cropzee-input" type="hidden" name="base_code1" value="">
										<div id="" class="image-previewer" data-cropzee="cropzee-input"></div>
									</div>
									
									<div class="form-group" id="filecheck_div">
										<label for="inputState">Document</label>
										  <input id=" " name="refernce_doc" type="file"  >
									</div>
									
									
									
									
								<div class="form-group">
									<label class="font-weight-semibold" for="actionplan">Plan of Action </label>
									<textarea class="form-control" name="actionplan" id="actionplan" ></textarea >
								</div>
								<div class="form-group">
									<label class="font-weight-semibold" for="teacher_notes">Next review date</label>
									<input type="date" name="next_review_date" required class="form-control" placeholder="Enter Date"  aria-label="Recipient's username" aria-describedby="basic-addon2">
								</div>
								
								
								<div class="form-group ">
									<div class="text-center">
										<a href="<?=base_url('mentor_monthly_mentoring')?>" class="btn btn-primary-outline">Cancel</a>
										<button class="btn btn-primary">Submit</button>
									</div>
								</div>
								
								 <?php $this->load->view('include/msgs'); ?>
									
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
	
	
	
	
	<script>
	
 $("#imagecheck_div").hide('slow');
$("#filecheck_div").hide('slow');

$('input[name=tab]').click(function () {
    if (this.id == "imagecheck") {
        $("#imagecheck_div").show();
		$("#filecheck_div").hide();
    } else {
        $("#imagecheck_div").hide();
		$("#filecheck_div").show();
    }
});
	</script>