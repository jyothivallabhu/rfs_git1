<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4" id="app">
        <div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">FAQ</h5>
                </div>
				<div id="msg">
					
				</div>
			
                <?php //print_r($mentor); ?>
                <form class="mb-5 form_class" id="edit_mentor" method="POST" action="<?= site_url('faq/update_faq/') . $mentor->faq_id ?>" enctype="multipart/form-data">
                    <div class="row">
					<!--<input type="hidden" name="faq_id" value="<?= $mentor->faq_id ?>">-->
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Role</label>
                            <select class="form-select" name="role">
								<option value=""  >Select Role</option>
								<option value="Parent"  <?php if($mentor->role=='Parent') { echo 'selected=selected';}  ?>>Parent</option>
								<option value="Teacher" <?php if($mentor->role=='Teacher') { echo 'selected=selected';}  ?> >Teacher</option>
								<option value="School" <?php if($mentor->role=='School') { echo 'selected=selected';}  ?> >School</option>
								<option value="Mentor" <?php if($mentor->role=='Mentor') { echo 'selected=selected';}  ?> >Mentor</option>
								
								
							</select>
                        </div>
						
						 
                        <div class="mb-3 col-6 ">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="faq_title" id="faq_title" required <?= ($mentor->faq_status== '0') ?  'readonly' : '' ?> value="<?= $mentor->faq_title ?>">
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="faq_desc" class="form-label">Description</label>
							
                            <textarea type="text" class="form-control" name="faq_desc" id="faq_desc" <?= ($mentor->faq_status== '0') ?  'readonly' : '' ?>><?= $mentor->faq_desc ?></textarea>
                        </div>
						
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image" id="faq_image" >
							<?php if($mentor->faq_image != '' ){
								?>
								<img src="<?= base_url().$mentor->faq_image ;?>" height="60" width="60" style="margin-top: 8px;" /> 
								<?php
							} ?>
							
                        </div>
						
						
							<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image2 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image2" id="faq_image2" >
							<?php if($mentor->faq_image2 != '' ){
								?>
								<img src="<?= base_url().$mentor->faq_image2 ;?>" height="60" width="60" style="margin-top: 8px;" /> 
								<?php
							} ?>
                        </div>
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image3 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image3" id="faq_image3" >
							<?php if($mentor->faq_image3 != '' ){
								?>
								<img src="<?= base_url().$mentor->faq_image3 ;?>" height="60" width="60" style="margin-top: 8px;" /> 
								<?php
							} ?>
                        </div>
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image4 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image4" id="faq_image4" >
							<?php if($mentor->faq_image4 != '' ){
								?>
								<img src="<?= base_url().$mentor->faq_image4 ;?>" height="60" width="60" style="margin-top: 8px;" /> 
								<?php
							} ?>
                        </div>
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image5 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image5" id="faq_image5" >
							<?php if($mentor->faq_image5 != '' ){
								?>
								<img src="<?= base_url().$mentor->faq_image5 ;?>" height="60" width="60" style="margin-top: 8px;" /> 
								<?php
							} ?>
                        </div>
						
						 
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-select" name="faq_status">
								<option value="1" <?php if($mentor->faq_status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($mentor->faq_status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('faq') ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->