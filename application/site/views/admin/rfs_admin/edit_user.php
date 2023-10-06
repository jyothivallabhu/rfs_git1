<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4" id="app">
        <div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Edit Admin</h5>
                </div>
				
				<div id="msg">
					
				</div>

                <form class="mb-5 form_class" id="edit_user_form" method="POST" action="<?= site_url('users/update_user/') . $user->id ?>">
                    <div class="row">
                        <?php //print_r($user) ?>
                      
                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" value="<?= $user->first_name ?>" class="form-control lettersonly" name="first_name" id="first_name" required <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" value="<?= $user->last_name ?>" class="form-control lettersonly" name="last_name" id="last_name" required <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" value="<?= $user->email ?>" class="form-control" name="email" id="email" required <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" value="<?= $user->phone ?>" class="form-control" name="phone" id="phone"   onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="10" <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>
						<div class="mb-3 col-6">
                            <label for="profile_pic" class="form-label">Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic"  <?= ($user->status== '0') ?  'disabled' : '' ?>>
							<img src="<?= $user->image_path ;?>" height="60" width="60" style="margin-top: 8px;" /> 
						</div>
                        
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-select" name="status">
								<option value="1" <?php if($user->status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($user->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>
						
						<div class="mb-3  col-6 options"> Modules <br>
                            <?php $user_modules = explode(',', $user->modules);
                            foreach ($modules as $key => $value) { ?>
                                <input <?= (in_array($value->id, $user_modules)) ?  'checked' : '' ?> <?= ($user->status== '0') ?  'disabled' : '' ?> required type="checkbox" name="modules[]" class="form-check-input checkbox" id="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>">
                                <label class="form-check-label" for="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>"><?= $value->name ?></label>
                            <?php } ?>

                        </div>
						
					
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('users') ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<script>
    $(document).ready(function() {
         var requiredCheckboxes = $('.options :checkbox[required]');
        if (requiredCheckboxes.length >0) {
             requiredCheckboxes.removeAttr('required');


        }
    });
    $(function() {
        var requiredCheckboxes = $('.options :checkbox[required]');
        requiredCheckboxes.change(function() {
            if (requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });
</script>
<!-- ./ content -->