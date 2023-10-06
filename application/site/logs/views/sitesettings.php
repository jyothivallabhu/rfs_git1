<!-- content -->
 <?php if(isset($this->url_slug) && !empty($this->url_slug) || $_SESSION["login_session"]["role_id"] == 5){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Site Settings</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
			<div class="col-md-12">
 <?php }else{ ?>
   <div class="col-md-9" id="app">
   
   
   <div class="row g-4 mb-4">
   <h2>Site Settings</h2>
   
 <?php } ?>
	  
		<div id="msg"> </div>
			  
    <div class="card col-md-9 mb-3 offset-lg-2" >
        <div class="card-body">
			<form class="mb-5" id="reset_password" action="<?= site_url('sitesettings/save') ?>" method="post">
			  
			  <div class="mb-3 col-6">
				<label for="title" class="form-label">Header Color</label>
				<input type="color" value="<?= ($this->headerdata) ? $this->headerdata : '' ?>" name="color_code" required style="width:50px;height:30px;margin-left:30px;">
			  </div>
			 
			 
			   <input name="submit" type="submit" class="btn btn-primary">
			   
			   <?php if($_SESSION['login_session']['role_id'] == '5'){
						$url = base_url('mentor_dashboard');
					}elseif($_SESSION['login_session']['role_id'] == '10'){
						$url = base_url( $this->url_slug.'/teacher_dashboard');
					}else{
						$url = base_url();
					} ?>
			    <a href="<?php  echo $url ?>" class="btn btn-outline-primary">Cancel</a>
				
			</form>
        </div>
    </div>
    

</div>
<script>


</script>
<!-- ./ content -->