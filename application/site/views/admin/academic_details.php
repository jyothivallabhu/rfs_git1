<!-- content -->
 <?php if(isset($this->url_slug) && !empty($this->url_slug) || $_SESSION["login_session"]["role_id"] == 5){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Academic Details</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
			<div class="col-md-12">
 <?php }else{ ?>
   <div class="col-md-9" id="app">
   
   
   <div class="row g-4 mb-4 offset-lg-2">
   <h2>Academic Details</h2>
   </div>
   
 <?php } ?>
	  
		<div id="msg"> </div>
			  
    <div class="card col-md-9 mb-3 offset-lg-2" >
        <div class="card-body">
			<form class="mb-5" id="reset_password" action="<?= site_url('admin/update_academic_details') ?>" method="post">
			  
					<div class="mb-3 col-6 ">
                            <label for="state" class="form-label">Academic Year</label>
							 <select class="form-control "  id="academic_year" name="academic_year" required>
                            <option value="">Select Academic Year</option>
							<?php
							if(!empty($academicyear)){
							foreach($academicyear as $year)
							{
						    ?>
							 <option value="<?php echo $year->id  ;?>" <?= ( $year->name == 'currrent_year') ? 'selected' : '' ?>><?php echo $year->values;?></option>
							
							<?php
							}
							}else{
								echo ' <option>No Academic Year Data</option>';
							}
							?>
                           </select>
						</div>
			 
			   <input name="submit" type="submit" value="Update" class="btn btn-primary">
			   
			    
			    <a href="<?php  //echo $url ?>" class="btn btn-outline-primary">Cancel</a>
				
			</form>
        </div>
    </div>
    

</div>
<script>


</script>
<!-- ./ content -->