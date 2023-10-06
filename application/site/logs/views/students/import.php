
<!-- content -->
<!--<div class="col-md-9">
   <div class="row g-4 mb-4">
            <div class="card widget">
			
			<div id="msg">
					<?=($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
				</div>
				
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Import Students for <b> <?= $schools->name ?></b> School</h5>
                </div>-->
				
				<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Import Students - <?= $schools->name ?></a>
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
				   <h2>Import Students - <?= $schools->name ?></h2>
				   
				 <?php } ?>
				 <div id="msg"> </div>
				
			
			 <?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/students' ;
				}else{
					 $cancelurl = base_url().'students/'.$schools->id;
				}  ?>
			
                <form class="mb-5 mt-5 form_class pl-5 pr-5" method="POST" id="add_schooladminForm" action="<?= site_url('students/submitimport') ?>" enctype="multipart/form-data">
                    <div class="row">
					<input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3") ?>" >
					
					<div class="mb-3 col-6 ">
                            <label for="state" class="form-label">Academic Year</label>
							 <select class="form-control"  id="academic_year" name="academic_year" required>
                            <option value="">Select Academic Year</option>
							<?php
							if(!empty($academicyear)){
							foreach($academicyear as $year)
							{
						    ?>
							 <option value="<?php echo $year->id  ;?>"><?php echo $year->values;?></option>
							
							<?php
							}
							}else{
								echo ' <option>No Academic Year Data</option>';
							}
							?>
                           </select>
						</div>
						</div>

						
						<!--<div class="col-md-4">
                        <label class="form-label">Class Name</label>
                        <select id="class_id" name="class_id" class="form-control" required>
                            <option value="">Select</option>
							<?php 
							if(!empty($classes)){
								foreach ($classes as $key => $value) {
								?>
								<option value="<?=  $value->c_id ?>"><?=  $value->class_name ?></option>
							<?php  
								}
							}else{
								echo ' <option>No classes found</option>';
							}
							?>
							
                        </select>
                    </div>
						
						
						
						<div class="mb-3 col-4 ">
                            <label for="first_name" class="form-label">Section</label>
                            <select class="form-control" id="section_id" name="section_id" required>
                       
							</select>
                        </div>-->
						
					<div class="row">
                        <div class="mb-3 col-6">
                            <label for="import_students" class="form-label"><h5>Please Upload  CSV file Only</h5></label><br><label>  <small>For Sample Format <a style="text-decoration: underline;" href="<?php echo base_url() ?>uploads/students_import.csv">click here to download</a> </small></label>
                            <input type="file" class="form-control" name="import_students" id="import_students"  <?= ($schools->status== '0') ?  'disabled' : '' ?>required>
							
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?=  $cancelurl  ?>" class="btn btn-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>
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
</script>

