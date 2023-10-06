<!-- content -->
<!--<div class="col-md-9" id="app">
   <div class="row g-4 mb-4">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Edit Student - <?= $schools->name ?></h5>
                </div>-->
				
				<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Edit Students - <?= $schools->name ?></a>
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
							<div class="col-md-12">
							 <div class="card widget">
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				   <div class="row g-4 mb-4">
				   <h2>Edit Students - <?= $schools->name ?></h2>
				   
				 <?php } ?>	
				
				<div id="msg"> </div>
				
				 <?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/students' ;
				}else{
					 $cancelurl = base_url().'students/'.$schools->id;
				}  ?>
			
                <form class="mb-5 mt-5 form_class pl-5 pr-5" id="edit_student" method="POST" action="<?= site_url('students/update_student') ?>" enctype="multipart/form-data">
                    <div class="row">
					

                         <input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= $school_data->school_id ?>" required>
						 
                         <input type="hidden" class="form-control" name="student_id" id="student_id" value="<?= $school_data->student_id ?>" required>
						 
                         <input type="hidden" class="form-control" name="parent_id" id="parent_id" value="<?=  $school_data->parent_id ?>" required>
						 
						 <div class="mb-3 col-6 ">
                            <label for="admission_number" class="form-label">Admission Number</label>
                            <input type="text" class="form-control" value="<?= $school_data->admission_number ?>" name="admission_number" id="admission_number" required>
                           
                        </div>
						
						<div class="mb-3 col-6 ">
                            <label for="state" class="form-label">Academic Year</label>
							 <select class="form-control  "  id="academic_year" name="academic_year" required>
                            <option>Select Academic Year</option>
							<?php
							if(!empty($academicyear)){
							foreach($academicyear as $year)
							{
						    ?>
							 <option value="<?php echo $year->id  ;?>" <?= ($year->id == $school_data->sd_academic_year) ? 'selected' : '' ?>><?php echo $year->values;?></option>
							
							<?php
							}
							}else{
								echo ' <option>No Academic Year Data</option>';
							}
							?>
                           </select>
						</div>

						<div class="col-md-6">
                        <label class="form-label">Class Name</label>
                        <select id="class_id" name="class_id" class="form-control" >
                            <option selected="">Select</option>
							<?php 
							if(!empty($classes)){
								foreach ($classes as $key => $value) {
								?>
								<option value="<?=  $value->c_id ?>" <?= ($value->c_id == $school_data->sd_class_id) ? 'selected' : '' ?>><?=  $value->class_name ?></option>
							<?php  
								}
							}else{
								echo ' <option>No classes found</option>';
							}
							?>
							
                        </select>
                    </div>
						
						
						
						<div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">Section</label>
                            <select class="form-control" id="section_id" name="section_id" >
							<?php 
								if(!empty($sections)){	
									foreach ($sections as $key => $c) {
									?>
									<option value="<?= $c['section_id'] ?>" <?= ($c['section_id'] == $school_data->sd_section_id) ? 'selected' : '' ?>><?=  ucwords($c['section_name'])  ?></option>
									
								<?php 
									}
								
								 }else{
									 echo '<option value="">No Data found</option>';
								 } ?>
								
							</select>
                        </div>
						
                        
						
						<div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control lettersonly" name="first_name" value="<?= $school_data->first_name ?>" id="first_name" required>
                        </div>
						
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control lettersonly" name="last_name" value="<?= $school_data->last_name ?>" id="last_name" required>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender">
								<option value="male" <?= ( $school_data->gender == 'male') ? 'selected' : '' ?>>Male</option>
								<option value="female" <?= ( $school_data->gender == 'female') ? 'selected' : '' ?>>Female</option>
							</select>
                        </div>
                        <!--<div class="mb-3 col-6 ">
                            <label for="dob" class="form-label">DOB</label>
                            <input type="date" class="form-control" name="dob"  value="<?=  date('Y-m-d',strtotime($school_data->dob)); ?>" id="dob" required>
                        </div>-->
                         <div class="mb-3 col-6">
                            <label for="student_image" class="form-label">Image </label>
                            <input type="file" class="form-control" name="student_image" id="student_image"  <?= ($school_data->status== '0') ?  'disabled' : '' ?>>
							
							<img src="<?= $school_data->image_path ;?>" height="60" width="60" style="margin-left:8px" /> 
							
                        </div>
                        
                    </div>
					
					<hr>
					<div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Parent Details</h5>
                </div>
					 <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="parent_fname" class="form-label">First Name</label>
                            <input type="text" class="form-control lettersonly" name="parentfirst_name"  value="<?= $school_data->parent_fname  ?>" id="parent_fname" >
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="parent_lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control lettersonly" name="parentlast_name"  value="<?= $school_data->parent_lname ?>" id="parent_lname" >
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email"  value="<?= $school_data->email ?>" id="email"  >
                        </div>
                        <!--<div class="mb-3 col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password"  value="<?= md5($school_data->password )?>" id="password" required>
                        </div>-->
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone"  value="<?= $school_data->phone ?>" id="phone"  onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="10">
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?=  $cancelurl  ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->

<script>
 $(document).on('change','#class_id',function(){

	var class_id = $(this).val();

	$("#section_id").html('');

	var sections_optns ='';

	if(class_id!=''){

		$.ajax({

			'url':"<?=base_url('students/getSections')?>",

			"data":{class_id:class_id},

			"type":"post",

			"success":function(res){

				console.log(res);

				var j = JSON.parse(res);

				if(j.sections_optns!=''){

					$("#section_id").html(j.sections_optns);                         

				}


			}

		});

	}

}); 

$(document).on('blur','#admission_number',function(){

	var admission_number = $(this).val();

	if(admission_number!=''){

		$.ajax({

			'url':"<?=base_url('students/getstudentsByAdmissionNumber')?>",

			"data":{admission_number:admission_number},

			"type":"post",

			"success":function(res){

				console.log(res);

				var j = JSON.parse(res);

				if(j!=''){

					$("#academic_year").val(j.academic_year);                         
					$("#class_id").val(j.class_id);                         
					$("#section_id").val(j.section_id);                         
					$("#first_name").val(j.first_name);                         
					$("#last_name").val(j.last_name);                         
					$("#gender").val(j.gender);                         
					$("#dob").val(j.dob);                         

				}


			}

		});

	}

});
</script>