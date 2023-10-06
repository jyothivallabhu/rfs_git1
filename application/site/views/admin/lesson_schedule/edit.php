<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-12 col-md-12">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Users</h5>
                </div>
				
				<div id="msg">
					
				</div>

                <form class="mb-5 form_class" method="POST" action="<?= site_url('users/update_user/') . $user->id ?>">
                    <div class="row">
                        <?php //print_r($user) ?>
                      
                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" value="<?= $user->first_name ?>" class="form-control" name="first_name" id="first_name" required <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" value="<?= $user->last_name ?>" class="form-control" name="last_name" id="last_name" required <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" value="<?= $user->email ?>" class="form-control" name="email" id="email" required <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" value="<?= $user->phone ?>" class="form-control" name="phone" id="phone"   onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="10" <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3  col-6 options"> Modules <br><br>
                            <?php $user_modules = explode(',', $user->modules);
                            foreach ($modules as $key => $value) { ?>
                                <input <?= (in_array($value->id, $user_modules)) ?  'checked' : '' ?> <?= ($user->status== '0') ?  'disabled' : '' ?> required type="checkbox" name="modules[]" class="form-check-input" id="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>">
                                <label class="form-check-label" for="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>"><?= $value->name ?></label>
                            <?php } ?>

                        </div>
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-control" name="status">
								<option value="1" <?php if($user->status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($user->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>
						
						
						
						<div class="tree_main">
						<ul id="bs_main" class="main_ul">
							 <?php foreach ($classes as $key => $value) {
								
							?>
							<li id="bs_2">
							
								<input type="checkbox"  value="<?=  $value->c_id ?>" id="c_bs_2" /> <span><?=  $value->class_name ?></span>
								<?php 
								$sections= $this->Admin_model->get_sectionsByClassID($value->c_id);
								$sections['num'];
								if($sections['num'] > 0){	
								?>
								<ul id="bs_l_2"  class="sub_ul">
								<?php foreach ($sections['data'] as $value2) {  ?>
									<li id="bf_3">
										<input type="checkbox" name="section_ids[]"  value="<?= $value2['section_id'] ?>" id="c_bf_3" /> <span><?= $value2['section_name'] ?></span>
										
									</li>
								<?php } ?>
								</ul>
							 <?php }
							 }
							 ?>
							</li>
						</ul>
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