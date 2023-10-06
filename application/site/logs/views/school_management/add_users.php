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
                
				
                <div class="card-header mb-5 d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add </h5>
                </div>
				
			
                <form class="mb-5 form_class  pl-5 pr-5" method="POST" id="add_userForm" action="<?= site_url('school_management/save_user') ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="hidden" class="form-control" name="school_id" value="<?= $schools->id ?>" required>
                            <input type="text" class="form-control lettersonly" name="first_name" id="first_name" required>
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
                            <label for="phone" class="form-label">Designation</label>
                            <input type="text" value="" class="form-control" name="designation" id="designation"  >
                        </div>
						<div class="mb-3 col-6">
                            <label for="profile_pic" class="form-label">Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic" >
                        </div>
                        <div class="mb-3  col-6 options"> <label class="form-label">Modules</label> <br>
                            <?php foreach ($modules as $key => $value) { ?>
                                <input required style="margin-left: 2px;"  type="checkbox" name="modules[]" class="form-check-input checkbox" id="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>">
                                <label class="form-check-label" for="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>"><?= $value->name ?></label>
                            <?php } ?>

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