<!-- content -->
<div class="col-md-9">
   <div class="row g-4 mb-4">
   
            <div class="card widget" id="app">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add School Admin - <?= $schools->name ?></h5>
                </div>
				
				<div id="msg"> </div>
	
	
	
                <form class="mb-5 form_class" method="POST" id="add_schooladminForm" action="<?= site_url('school_admins/save_school_admin') ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control lettersonly" name="first_name" id="first_name" required>
                            <input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= $schools->id ?>">
                            <input type="hidden" class="form-control" name="role_id" id="role_id" value="4">
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control lettersonly" name="last_name" id="last_name" required>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <!--<div class="mb-3 col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" autocomplete="new-password" id="password" required>
                        </div>-->
						
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"  onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="10">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="profile_pic" class="form-label">Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic" >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_admins/'.$this->uri->segment(3)) ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
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

</script>
<!-- ./ content -->