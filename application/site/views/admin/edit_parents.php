<!-- content -->
<!--<div class="col-md-9" id="app">
   <div class="row g-4 mb-4">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Edit Parents - <?= $schools->name ?></h5>
                </div>-->
				
				
				<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
						<div class="main-content">
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> Edit Parents - <?= $schools->name ?></a>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-md-12">
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				   <div class="row g-4 mb-4">
				   <h2>Edit Parents - <?= $schools->name ?></h2>
				   
				 <?php } ?>
				
				<div id="msg"> </div>
			
                <?php //print_r($mentor); ?>
                <form class="mb-5 form_class" id="edit_parent" method="POST" action="<?= site_url('parents/update_parents/') . $mentor->id ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" value="<?= $mentor->first_name ?>" class="form-control lettersonly" name="first_name" id="first_name" required <?= ($mentor->status== '0') ?  'readonly' : '' ?>>
                            <input type="hidden" value="<?= $mentor->school_id ?>" class="form-control" name="school_id"  required >
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" value="<?= $mentor->last_name ?>" class="form-control lettersonly" name="last_name" id="last_name" required <?= ($mentor->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" value="<?= $mentor->email ?>" class="form-control" name="email" id="email"  <?= ($mentor->status== '0') ?  'readonly' : '' ?> required >

                        </div>
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" value="<?= $mentor->phone ?>" class="form-control" name="phone" id="phone"  onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="10" <?= ($mentor->status== '0') ?  'readonly' : '' ?> >
                        </div>
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-control" name="status">
								<option value="1" <?php if($mentor->status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($mentor->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>

                    </div>
					
					<?php 
						if(isset($this->school_id) && $this->school_id !=''){
							$cancelurlid = $_SESSION["login_session"]["url_slug"].'/parents';
						}else{
							$cancelurlid ='parents/'.$schools->id;
						} ?>
						

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url($cancelurlid) ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->