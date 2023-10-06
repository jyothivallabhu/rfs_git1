<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4" id="app">
        <div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add Admin</h5>
                </div>
				<div id="msg">
					
				</div>
			
                <form class="mb-5 form_class" method="POST" id="rfs_Adduser_form"  name="rfs_user_form" action="<?= site_url('users/save_user') ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control lettersonly" name="first_name" id="first_name" required>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control lettersonly" name="last_name" id="last_name" required>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email"  id="email" required>
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
                        <div class="mb-3  col-6 options"> <label class="form-label">Modules</label> <br>
                            <?php foreach ($modules as $key => $value) { ?>
                                <input required type="checkbox" name="modules[]" class="form-check-input" id="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>">
                                <label class="form-check-label" for="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>"><?= $value->name ?></label>
                            <?php } ?>

                        </div>
						<!-- Image loader -->
						<div id='loader' style='display: none;'>
						  <img src='reload.gif' width='32px' height='32px'>
						</div>
						<!-- Image loader -->
						
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('users') ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
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