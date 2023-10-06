 <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Sections - <?= $schools->name ?></a>
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
	<div class="card widget mb-4">
        
   <h2>Sections - <?= $schools->name ?></h2>
   
 <?php } ?>
	

        
		<!--<div id="loadSections"></div>-->
		
			
			<div id="msg"> </div>
			
			<?php  
		if(isset($_SESSION['login_session']['school_id'])) {
			$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/sections' ;
		}else{
			 $cancelurl = base_url().'sections/'.$schools->id;
		}  ?>
			
			<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
			<p>
				<a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style='float: right;'>
					<i class="bi bi-plus-circle"></i> Add New Section
				</a>
			</p>
			<?php //} ?>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form class="mb-5 form_class" method="POST" action="<?= site_url('sections/save_sections') ?>" >
                <div class="row mb-3">
				 <input type="hidden" name="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2") ?>" class="form-control">
					<div class="col-md-3">
                        <label class="form-label">Class Name</label>
                        <select id="billingState" name="class_id" class="form-control" required>
                            <option value="">Select Class</option>
							<?php foreach ($classes as $key => $value) {
								?>
								<option value="<?=  $value->c_id ?>"><?=  $value->class_name ?></option>
							<?php  } ?>
							
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Section Name</label>
                        <input type="text" name="section_name" class="form-control" required>
                    </div>
					
					<div class="col-md-3">
						<label for="name" class="form-label">	Day</label>
							<select id="week_day" name="week_day" class="form-control" required >
								<option value="">Select</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
							</select>
					</div>
                    
                </div>
                <button class="btn btn-primary">Save</button>
					<a href="<?= $cancelurl ?>" class="btn btn-outline-primary">Cancel</a>
            </form>
        </div>
    </div>


		<?php 
		
		$i=1;
		if(!empty($classes)){
		foreach ($classes as  $value) { 
		//print_r($value);
		
		$sections = $this->admin->get_sectionsByClassID($value->c_id);
		
		$sections['num'];
		if($sections['num'] > 0){	
		?>
		<div class="card-body">
		    <div class="d-flex gap-4 align-items-center" data-bs-toggle="collapse"
                 aria-expanded="false" data-bs-target="#myOrders26598<?= $i ?>" role="button">
                <div><strong><?= $value->class_name?></strong></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div><?= $sections['num'] ?> Sections</div>
                <div class="bi bi-chevron-down ms-auto"></div>
            </div>
			
			
			<div class="collapse show mt-4" id="myOrders26598<?= $i ?>">
                <hr class="mb-0">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <tbody>
                        <?php foreach ($sections['data'] as $value2) { 
                            $status_badge = 'bg-success';
                			if ($value2['status'] == '0')
                				$status_badge = 'bg-warning'; 
							
							$studentscount = $this->admin->get_studentscountByClassID($value2['section_id']);
							$parentscount = $this->admin->get_parentscountByClassID($value2['section_id']);
							
							?>
						<tr>
                            <td><?= $value2['section_name'] ?></td>
                            <td><?= $studentscount[0]->scount; ?> Students</td>
							<td><?= $parentscount[0]->pcount; ?> Parents</td>
							<td><span class="badge <?= $status_badge ?>"><?= ($value2['status'] == 1)? 'Active':'Inactive' ?></span></td>
							<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
                            <td class="text-end">
                                <div class="d-flex">
                                    <div class="dropdown ms-auto">
                                        <a href="#" data-bs-toggle="dropdown"
                                           class="btn btn-floating"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" data-bs-toggle="collapse" href="#collapseExample<?= $value2['section_id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample"> Edit </a>
                                            <?php //if ($value2['status']  != '0'){ ?>
											<a  href="<?php echo  base_url('sections/delete_section/'.$value2['school_id'].'/'.$value2['section_id']) ?>" onclick="return confirm('Are you sure you want to Delete?');" class="dropdown-item">Delete</a>
											<?php //} ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
							<?php  //} ?>
                        </tr>
						
                         <tr>
							<div class="collapse" id="collapseExample<?= $value2['section_id'] ?>">
								<div class="card card-body">
									<form class="mb-5 form_class" id="section_edit"  method="POST" action="<?= site_url('sections/update_sections/'.$value2['section_id'] ) ?>" >
										
										<input type="hidden" name="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2") ?>" class="form-control">
										
											<div class="row mb-3">
											 	<div class="col-md-3">
													<label class="form-label">Class Name</label>
													<?php  ?>
													<input type="hidden" name="class_id" value="<?= $value2['class_id'] ?>">
													
													<select id="class_id" name="class_id" class="form-control" <?= ($value2['status'] == '0') ?  'disabled' : '' ?>>
														<option value="">Select Class</option>
														<?php foreach ($classes as $key => $value) {
															?>
															<option value="<?=  $value->c_id ?>" <?php if($value->c_id==$value2['class_id']) { echo 'selected=selected';}  ?> ><?=  $value->class_name ?></option>
														<?php  } ?>
														
													</select>
												</div>
												<div class="col-md-3">
													<label class="form-label">Section Name</label>
													<input type="text" name="section_name" <?= ($value2['status'] == '0') ?  'readonly' : '' ?>  class="form-control" value="<?= $value2['section_name'] ?>">
												</div>
												
												<div class="col-md-3">
													<label for="name" class="form-label">	Day</label>
														<select id="week_day" name="week_day" class="form-control" required <?= ($value2['status'] == '0') ?  'readonly' : '' ?> >
															<option value="">Select</option>
															<option value="Monday" <?php if($value2['week_day']=='Monday') { echo 'selected=selected';}  ?>>Monday</option>
															<option value="Tuesday" <?php if($value2['week_day']=='Tuesday') { echo 'selected=selected';}  ?>>Tuesday</option>
															<option value="Wednesday" <?php if($value2['week_day']=='Wednesday') { echo 'selected=selected';}  ?>>Wednesday</option>
															<option value="Thursday" <?php if($value2['week_day']=='Thursday') { echo 'selected=selected';}  ?>>Thursday</option>
															<option value="Friday" <?php if($value2['week_day']=='Friday') { echo 'selected=selected';}  ?>>Friday</option>
															<option value="Saturday" <?php if($value2['week_day']=='Saturday') { echo 'selected=selected';}  ?>>Saturday</option>
															<option value="Sunday" <?php if($value2['week_day']=='Sunday') { echo 'selected=selected';}  ?>>Sunday</option>
														</select>
												</div>
												
												<div class="mb-3 col-3">
													<label for="demonstration_video" class="form-label">Status</label>
													<select class="form-control" name="status">
														<option value="1" <?php if($value2['status']=='1') { echo 'selected=selected';}  ?>>Active</option>
														<option value="0" <?php if($value2['status']=='0') { echo 'selected=selected';}  ?>>InActive</option>
													</select>
												</div>
												
											</div>
											<div class="form-group col-md-3">
                            <button class="btn btn-primary" >Update</button>
											<a href="<?= $cancelurl ?>" class="btn btn-outline-primary">Cancel</a>
                        </div>
											
										</form>
								   
								</div>
							</div>
						 </tr>	
								
						<?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
				
			
            
		</div>
		<?php 
			}else{
				?>
				<div class="card-body">
				<div class="d-flex gap-4 align-items-center" data-bs-toggle="collapse"
                 aria-expanded="false" data-bs-target="#myOrders26598<?= $i ?>" role="button">
                <div><strong><?= $value->class_name?></strong></div>
				<div><?= $sections['num'] ?> Sections</div>
                <div class="bi bi-chevron-down ms-auto"></div>
            </div>
            </div>
				<?php 
			} ?>
		<?php 
		$i++;
		}
		}else{
			echo ' <div class="text-center text-red" >Data not available</div>';
		}
		
		?>
		
    </div>
	
        </div>
    
	
	
	<script>
	


	$(document).ready(function() {
		
	   var school_id=<?= $this->uri->segment(2) ?>;
	   $.ajax({
	   type: "POST",
	   url: "<?php echo base_url();?>admin/loadSections",
	   data: {'school_id':school_id},
	   success: function(data){
	   $('#loadSections').html(data);
	   }  
	   });
	   });
	</script>
	