<!-- content -->
 <?php if(isset($this->url_slug) && !empty($this->url_slug) || $_SESSION["login_session"]["role_id"] == 5){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Get Help</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
			<div class="col-md-12">
 <?php }else{ ?>
   <div class="col-md-9" id="app">
   
   
   <div class="row g-4 mb-4">
   <h2>Get Help</h2>
   
 <?php } ?>
	  
		<div id="msg"> </div>
			  
    <div class="card col-md-9 mb-3 offset-lg-2" >
        <div class="card-body">
			<form class="mb-5" id="reset_password" action="<?= site_url('get_help/save') ?>" method="post">
			  
			  <div class="mb-3 col-6">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control pass" id="title" name="title"   required>
			  </div>
			 <div class="mb-3 col-6">
				<label for="description" class="form-label">Description</label>
				<textarea type="text" class="form-control pass" id="description" name="description"   required></textarea>
			  </div>
			  
			  <div class="mb-3 col-6">
					<label for="attachment" class="form-label">Attach File</label>
					<input type="file" class="form-control" name="attachment" id="attachment" >
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