
<!-- content -->
<!--div class="col-md-9">
   <div class="row g-4 mb-4">
            <div class="card widget">
			
			<div id="msg">
					<?=($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
				</div>
				
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Roll Over Students for <b> <?= $schools->name ?></b> School</h5>
                </div>-->
				
			<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Roll Over Students for - <?= $schools->name ?></a>
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
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				   <div class="row g-4 mb-4">
				   <h2>Roll Over Students for - <?= $schools->name ?></h2>
				   
				 <?php } ?>	
				
				<div id="msg"> </div>
			
			
                <form class="mb-5 form_class" method="POST" id="roll_overForm" action="<?= site_url('roll_over/save') ?>" enctype="multipart/form-data">
                    <div class="row">
					<input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3") ?>" required>
					
						<div class="mb-3 col-6 ">
                            <label for="state" class="form-label">Academic Year</label>
							<!--<input type = "hidden"  name ="school_id" value = "<?= $schools->id ?>">-->
							 <select class="form-control col-md-7 col-xs-12"  id="academic_year" name="academic_year" required>
                            <option>Select Academic Year</option>
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
						
						

						<!--<div class="col-md-6">
                        <label class="form-label">Class Name</label>
                        <select id="class_id" name="class_id" class="form-select" required>
                            <option selected="">Select</option>
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
						
						
						
						<div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">Section</label>
                            <select class="form-control " id="section_id" name="section_id" required>
                       
							</select>
                        </div>-->
						
						<div class="mb-3 col-6 ">
                            <label for="state" class="form-label">Roll Over Academic Year</label>
							 <select class="form-control col-md-7 col-xs-12"  id="roll_over_academic_year" name="roll_over_academic_year" required>
                            <option>Select Academic Year</option>
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

					
					<div class="loading" style="display:none">
						<img src="<?= base_url().'/assets/images/others/Loading_icon.gif' ?>" alt="Logo" width="100" height="100">
					</div>
                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/students/'.$this->uri->segment("3")) ?>" class="btn btn-outline-primary">Cancel</a>
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

