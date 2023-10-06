<!-- content -->
<div class="content ">

      <div class="page-title"><h3>Reset Password</h3></div>
	  <?php echo $this->session->flashdata('cmsg');?>
    <div class="card col-md-9 mb-3">
        <div class="card-body">
			<form class="row g-3" action="<?= site_url('schools/reset_password/'.$id) ?>" method="post">
			  
			  <div class="col-6">
				<label for="new_password" class="form-label">New Password</label>
				<input type="password" class="form-control" id="new_password" name="new_password"  required>
			  </div>
			  <div class="col-md-6">
				<label for="confirm_password" class="form-label">Confirm Password</label>
				<input type="password" class="form-control" id="confirm_password" name="confirm_password" onblur="return ConfirmPassword();" oncopy="return false;" onpaste="return false;" required>
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