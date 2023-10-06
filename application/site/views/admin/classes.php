   
   <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Classes - <?= $schools->name ?></a>
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
   <h2>Classes - <?= $schools->name ?></h2>
   
 <?php } ?>
 
 <?php  
		if(isset($_SESSION['login_session']['school_id'])) {
			$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/classes' ;
		}else{
			 $cancelurl = base_url().'classes/'.$schools->id;
		}  ?>
 
  <div id="msg"></div>
  
  <?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
	<p>
        <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style='float: right;'>
            <i class="bi bi-plus-circle"></i> Add New Class
        </a>
    </p>
  <?php //} ?>
	<div class="collapse" id="collapseExample">
        <div class="card card-body">
             <form class="mb-5 form_class" id="add_class"  method="POST" action="<?= site_url('classes/save_class') ?>" >
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Class Name</label>
                        <input type="text" name="class_name" required class="form-control">
                        <input type="hidden" name="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2") ?>" class="form-control">
                    </div>
					<div class="col-md-6 ">
                        <label class="form-label">Class Order</label>
                        <input type="text" name="class_order" required class="form-control">
                    </div>
					
					<br><br><div class="mt-3  col-6 options"> <label class="form-label">Grades</label> <br>
					
					
					<?php
						if (!empty($grades) > 0) {
						foreach($grades as $g)
						{
						?>
						 
						 <input required type="checkbox" name="grades[]" class="form-check-input" id="exampleCheck<?= $g->id ?>" value="<?= $g->id ?>">
						<label class="form-check-label" for="exampleCheck<?= $g->id ?>" value="<?= $g->id ?>"><?= $g->grade_name ?></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						<?php
						}
						}else{
							echo ' No Grades Data Found';
						}
						?>

				</div>
					
					
                </div>
                <button class="btn btn-primary">Add</button>
				<a href="<?= $cancelurl ?>" class="btn btn-outline-primary">Cancel</a>
            </form>
        </div>
    </div>
   
        <?php 
		if(!empty($classes)){
		foreach ($classes as $key => $value) {
			 $status_badge = 'bg-success';
			if ($value->status == '0')
				$status_badge = 'bg-warning'; 
			
			//print_r($value);
		?>
		
		
							
							
		<div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center row">
                        <h5 class="mb-0 col-md-4"><?=  $value->class_name ?></h5>
                        <h5 class="mb-0 col-md-4"><?=  $value->class_order ?></h5>
                        <span class="col-md-1 badge <?= $status_badge ?>"><?= ($value->status == '1')? 'Active' : 'Inactive'  ?></span>
						
						<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
						        <div class="d-flex col-md-1">
						           <div class="dropdown">
                                        <a class="btn btn-floating"  id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                            
											<a class="dropdown-item" data-bs-toggle="collapse" href="#collapseExample_<?= $value->c_id ?>" role="button" aria-expanded="false" aria-controls="collapseExample"> Edit </a>
											<a href="javascript:void(0);"  data-did="<?= $value->c_id ?> " data-sid = "<?= $value->school_id  ?>" data-tbl="users" data-ctrl="classes"  class="dropdown-item text-danger delete_class">Delete</a>
										   
                                        </div>
                                    </div>
                                 </div>
							<?php //} ?>
								
								<div class="collapse" id="collapseExample_<?= $value->c_id ?>">
									<div class="card card-body">
										<form class="mb-5 form_class" id="update_class" method="POST" action="<?= site_url('classes/update_class/'.$value->c_id ) ?>" >
											<div class="row mb-3">
												<div class="col-md-4">
													<label class="form-label">Class Name</label>
													<input type="text" <?= ($value->status== '0') ?  'readonly' : '' ?>  name="class_name" class="form-control" value="<?=  $value->class_name ?>" required>
													<input type="hidden" name="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2") ?>" class="form-control">
												</div>
												<div class="mb-3 col-4">
													<label for="demonstration_video" class="form-label">Order</label>
													 <input type="text" name="class_order" required class="form-control" <?= ($value->status== '0') ?  'readonly' : '' ?> value="<?=  $value->class_order ?>">
												</div>
												<div class="mb-3 col-4">
													<label for="demonstration_video" class="form-label">Status</label>
													<select class="form-control" name="status">
														<option value="1" <?php if($value->status=='1') { echo 'selected=selected';}  ?>>Active</option>
														<option value="0" <?php if($value->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
													</select>
												</div>
												
												<br><br><div class="mt-3  col-6 eoptions"> <label class="form-label">Grades</label> <br>
					
					
													<?php
													$class_grades = explode(',', $value->grades);
													
														if (!empty($grades) > 0) {
														foreach($grades as $g)
														{
														?>
														 
														 <input <?= (in_array($g->id, $class_grades)) ?  'checked' : '' ?> <?= ($value->status== '0') ?  'disabled' : '' ?> required type="checkbox" name="grades[]" class="form-check-input" id="exampleCheck<?= $g->id ?>" value="<?= $g->id ?>">
														<label class="form-check-label" for="exampleCheck<?= $g->id ?>" value="<?= $g->id ?>"><?= $g->grade_name ?></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														
														<?php
														}
														}else{
															echo ' No Grades Data Found';
														}
														?>

												</div>
												
												
											</div>
											<button class="btn btn-primary">Update</button>
											<a href="<?= $cancelurl ?>" class="btn btn-outline-primary">Cancel</a>
										</form>
									</div>
								</div>
				
				
                            	
							
                        <!--<a class="col-md-2" href="#">Edit</a>
						<a class="col-md-2" href="<?php echo  base_url('admin/delete_class/'.$value->c_id) ?>" onclick="return confirm('Are you sure you want to Delete?');">Delete</a>-->
                    </div>
                </div>
            </div>
        </div>
		<?php 
		}
		}else{
			echo ' <tr><td class="text-center text-red" colspan="4">Data not available</td></tr>';
		} ?>
	</div>
    
    
    </div>
	
	
	<script>
        $(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});

$(function(){
	var requiredCheckboxes = $('.eoptions :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});


	
</script>
	
	
	
	
	




