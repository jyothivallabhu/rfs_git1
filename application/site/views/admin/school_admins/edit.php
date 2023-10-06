<div class="col-md-9">
   <div class="row g-4 mb-4">
            <div class="card widget" id="app">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Edit School Admin</h5>
                </div>
				
				<div id="msg"> </div>
				
				
                <?php //print_r($mentor); ?>
                <form class="mb-5 form_class" id="edit_schooladminForm" method="POST" action="<?= site_url('school_admins/update_school_admin/').$mentor->id ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="hidden" value="<?= $mentor->school_id ?>" class="form-control" name="school_id" id="first_name" required>
                            <input type="text" value="<?= $mentor->first_name ?>" class="form-control" name="first_name" id="first_name" required <?= ($mentor->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" value="<?= $mentor->last_name ?>" class="form-control lettersonly" name="last_name" id="last_name" required <?= ($mentor->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" value="<?= $mentor->email ?>" class="form-control lettersonly" name="email" id="email" required <?= ($mentor->status== '0') ?  'readonly' : '' ?>>

                        </div>
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" value="<?= $mentor->phone ?>" class="form-control" name="phone" id="phone"  onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="10" <?= ($mentor->status== '0') ?  'readonly' : '' ?>>
                        </div>
						<div class="mb-3 col-6">
                            <label for="profile_pic" class="form-label">Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic"  <?= ($mentor->status== '0') ?  'disabled' : '' ?>>
							<img src="<?= $mentor->image_path ;?>" height="60" width="60" style="margin-top: 8px;" /> 
						</div>
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-select" name="status">
								<option value="1" <?php if($mentor->status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($mentor->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_admins/'.$mentor->school_id) ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>
