<!-- content -->
<div class="content ">

      <div class="page-title"><h3>Change Password</h3></div>
	  <?php echo $this->session->flashdata('cmsg');?>
    <div class="card col-md-9 mb-3">
        <div class="card-body">
			<form class="row g-3" action="<?= site_url('admin/change_password') ?>" method="post">
			  <div class="col-12">
				<label for="current_password" class="form-label">Current Password</label>
				<input type="text" class="form-control" id="current_password" name="current_password"  required>
			  </div>
			  <div class="col-12">
				<label for="new_password" class="form-label">New Password</label>
				<input type="text" class="form-control" id="new_password" name="new_password"  required>
			  </div>
			  <div class="col-md-6">
				<label for="confirm_password" class="form-label">Confirm Password</label>
				<input type="text" class="form-control" id="confirm_password" name="confirm_password" onblur="return ConfirmPassword();" oncopy="return false;" onpaste="return false;" required>
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