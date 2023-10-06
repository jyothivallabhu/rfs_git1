<!-- content -->
<!--<div class="col-md-9">
   <div class="row g-4 mb-4">
            <h2>School Management - <?= $schools->name ?></h2>
			<?=($this->session->flashdata('msg'))?'<div id="msg">'.$this->session->flashdata('msg').'</div>':''?>
			
			<div id="msg"></div>-->
			
			<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> School Management - <?= $schools->name ?></a>
										</h3>
									
									</div>
									<!--<div class="col-md-6 text-right">
										<div class="text-md-right">
											<a href="" class="btn btn-primary">
											<i class="anticon anticon-plus"></i>
											<span class="m-l-5">Add</span>
											</a>
										</div>
									</div>-->
								   
								</div>
							</div>
							<div class="col-md-12">
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
					
				   
				  
				   
				   <div class="row g-4 mb-4">
				   <h2>School Management - <?= $schools->name ?></h2>
				   
				 <?php } ?>
				 
				 <?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/school_management' ;
				}else{
					 $cancelurl = base_url().'school_management/'.$schools->id;
				}  ?>
				 
			<div id="msg"> </div>
            <div class="card" id="app">
                <div class="card-body">
				
                <div class="card-header mb-5  d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Edit </h5>
                </div>
				

                <form class="mb-5 form_class" method="POST" id="edit_schoolManagement" action="<?= site_url('school_management/update_user/') . $user->id ?>">
                    <div class="row">
                        <?php //print_r($user) ?>
                      
                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="hidden" value="<?= $schools->id ?>"  name="school_id" id="school_id"  <?= ($user->status== '0') ?  'readonly' : '' ?>>
                            <input type="hidden" value="<?= $user->id ?>"  name="id"  <?= ($user->status== '0') ?  'readonly' : '' ?>>
							
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
                            <label for="phone" class="form-label">Designation</label>
                            <input type="text" value="<?= $user->designation ?>" class="form-control" name="designation" id="designation"   <?= ($user->status== '0') ?  'readonly' : '' ?>>
                        </div>
						<div class="mb-3 col-6">
                            <label for="profile_pic" class="form-label">Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic"  <?= ($user->status== '0') ?  'disabled' : '' ?>>
							<img src="<?= $user->image_path ;?>" height="60" width="60" style="margin-top: 8px;" /> 
						</div>
                        <div class="mb-3  col-6 options"> Modules <br>
                            <?php $user_modules = explode(',', $user->modules);
                            foreach ($modules as $key => $value) { ?>
                                <input <?= (in_array($value->id, $user_modules)) ?  'checked' : '' ?> <?= ($user->status== '0') ?  'disabled' : '' ?> required type="checkbox" style="margin-left: 2px;"  name="modules[]" class="form-check-input checkbox" id="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>">
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
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= $cancelurl ?>" class="btn btn-outline-primary">Cancel</a>
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