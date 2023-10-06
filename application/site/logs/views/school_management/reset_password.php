<!-- content -->
<!--<div class="content " id="app">
     -->
	  
			<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
					<!-- Content Wrapper START -->
					<div class="main-content">
					
						<div class="page-header no-gutters">
							<div class="row align-items-md-center">
								
								<div class="col-md-6 ">
									<h3 class="m-b-0">
										<a class="text-dark" href="javascript:void(0);">Reset Password </a>
									</h3>
								
								</div>
							</div>
						</div>
						<div class="col-md-12">
				 <?php }else{ ?>
				 <div class="content " id="app">
				   <div class="col-md-9" id="app">
				    <div class="page-title"><h3>Reset Password</h3></div>
				   
				    <div class="row g-4 mb-4">
			<?php } ?>
	  
	  <div id="msg"></div>
	  
	  
	  
    <div class="card col-md-9 mb-3">
        <div class="card-body">
			<form class="mb-5" id="reset_password" action="<?= site_url('school_management/update_password/'.$id) ?>" method="post">
			  
			  <div class="mb-3 col-6">
				<label for="new_password" class="form-label">New Password</label>
				<input type="hidden" class="form-control" id="school_id" name="school_id" value=""  required>
				<input type="password" class="form-control" id="new_password" name="new_password"  required>
				<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;"> <i class="bi bi-eye"  ></i> </span >
			  </div>
			  <div class="mb-3 col-6">
				<label for="confirm_password" class="form-label">Confirm Password</label>
				<input type="password" class="form-control" id="confirm_password" name="confirm_password" onblur="return ConfirmPassword();" oncopy="return false;" onpaste="return false;" required>
				<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;"> <i class="bi bi-eye"  ></i> </span >
				<div id="error"></div>
			  </div>
			   <input name="submit" type="submit" class="btn btn-primary">
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
		else return true;
	}
</script>
<!-- ./ content -->