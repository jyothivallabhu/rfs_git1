<!-- content -->
<!--<div class="content " id="app" >

      <div class="page-title"><h3>Change Password</h3></div>
	  
		<div id="msg">
			
		</div>-->
		
		<?php if($this->role_id == 5){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Change Password</a>
										</h3>
									
									</div>
									 
								</div>
							</div>
							<div class="col-md-12">
							 
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				   <div class="row g-4 mb-4">
				   <h2>Change Password</h2>
				   
				 <?php } ?>	
				
				<div id="msg"> </div>
			  
    <div class="card col-md-9 mb-3 offset-lg-2" >
        <div class="card-body">
			<form class="mb-5" id="reset_password" action="<?= site_url('Changepwd/updatePass') ?>" method="post">
			  
			  <div class="mb-3 col-6">
				<label for="new_password" class="form-label">Current Password</label>
				<input type="password" class="form-control pass" id="password" name="cur_pass"   required>
				<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;">
					<i class="bi bi-eye"  ></i>
				</span >
				
			  </div>
			  <div class="mb-3 col-6">
				<label for="new_password" class="form-label">New Password</label>
				<input type="password" class="form-control pass" id="new_password" name="new_pass"  required>
				<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;">
					<i class="bi bi-eye"  ></i>
				</span >
			  </div>
			  
			  
			  <div class="mb-3 col-6">
				<label for="confirm_password" class="form-label">Confirm Password</label>
				<input type="password" class="form-control pass" id="confirm_password" name="re_pass"  onblur="return ConfirmPassword();" oncopy="return false;" onpaste="return false;" required>
				<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;"> <i class="bi bi-eye"  ></i> </span >
				<div id="error"></div>
			  </div>
			   <input name="submit" type="submit" class="btn btn-primary">
			   
			    <?php 
			   
					if($_SESSION['login_session']['role_id'] == '1' ){
						$url = base_url('admin/index');
					}else if($_SESSION['login_session']['role_id'] == '2'){
						$url = base_url('admin/index');
					} else if($_SESSION['login_session']['role_id'] == '3'){
						$url = base_url('admin/index');
					}  else if($_SESSION['login_session']['role_id'] == '4'){
						$url = base_url( $this->url_slug.'/school_dashboard');
					} else if($_SESSION['login_session']['role_id'] == '5'){
						$url = base_url( 'mentor_dashboard');
					}  else if($_SESSION['login_session']['role_id'] == '9'){
						$url = base_url( $this->url_slug.'/school_dashboard');
					}  else if($_SESSION['login_session']['role_id'] == '10'){
						$url = base_url( $this->url_slug.'/teacher_dashboard');
					} 
					
					?>
			    <a href="<?php  echo $url ?>" class="btn btn-outline-primary">Cancel</a>
				
			</form>
        </div>
    </div>
    

</div>
<script>






	function ConfirmPassword() {
		var txtNewPwd = document.getElementById("new_password").value;
		var txtConfPwd = document.getElementById("confirm_password").value;
		if (txtNewPwd != txtConfPwd) {
			$('#error').html('New Password and Confirm Password should match');
			document.getElementById("confirm_password").value = "";
			return false;
		}
		else {
			$('#error').html('');
			return true;
		}
	}
</script>
<!-- ./ content -->