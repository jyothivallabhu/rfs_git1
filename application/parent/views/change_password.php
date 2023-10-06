<div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Change Password</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
			
		
			  
   <div class="row">
				
				
		<div class="col-md-6 col-lg-6 offset-lg-3">
		<div id="msg">
		</div>
			<div class="card">
        <div class="card-body">
			<form class="mb-5 form_class" id="rfs_parent_form" action="<?= site_url('Change_password/updatePass/') ?>" method="post">
			  
				<div class="form-group">
					<label for="new_password" class="font-weight-semibold form-label">Current Password</label>
					<input type="password" class="form-control" id="password" name="cur_pass"  required>
					<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;"> <i class="anticon anticon-eye"  ></i> </span >
				</div>
				<div class="form-group">
					<label for="new_password" class="font-weight-semibold form-label">New Password</label>
					<input type="password" class="form-control" id="new_password" name="new_pass"  required>
					<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;"> <i class="anticon anticon-eye" ></i> </span >
				</div>
				
				<div class="form-group">
					<label for="confirm_password" class="font-weight-semibold form-label">Confirm Password</label>
					<input type="password" class="form-control" id="confirm_password" name="re_pass" onblur="return ConfirmPassword();" oncopy="return false;" onpaste="return false;" required>
					<span class="showOrHide" style=" float: right; margin: -30px 17px 0 0;"> <i class="anticon anticon-eye"  ></i> </span >
					<div id="error"></div>
				</div>
				
			
			   <input name="submit" type="submit" class="btn btn-primary">
			   
			   
			    <a href="<?php  echo base_url() ?>" class="btn btn-outline-primary">Cancel</a>
			</form>
        </div>
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