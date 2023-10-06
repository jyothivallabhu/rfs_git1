<!-- content -->
<!--<div class="col-md-9" id="app">
   <div class="row g-4 mb-4">-->
    
			<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
						<div class="main-content">
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> Add Parents - <?= $schools->name ?></a>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-md-12">
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				   <div class="row g-4 mb-4">
				   <h2>Add Parents - <?= $schools->name ?></h2>
				   
				 <?php } ?>

			<div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add Parents - <?= $schools->name ?></h5>
                </div>
				<div id="msg"> </div>
                <form class="mb-5 form_class" method="POST" id="add_parent" action="<?= site_url($_SESSION["login_session"]["url_slug"].'/parents/save_parent') ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="hidden"  name="school_id" id="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3") ?>" required>
							
                            <!--<input type="hidden"  name="student_id" id="student_id" value='<?= $student_id ?>' required>-->
							
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
                            <label for="inputState">Select Student</label>
							<select id="student_id" name="student_id" class="form-select select2 valid">
								<option value=""> Select Student</option>
									<?php
										if($students['num']>0){
											foreach($students['data'] as $c){
									?>
										<option value="<?=$c->student_id?>"><?=$c->first_name?>-<?=$c->class_name?>-<?=$c->section_name?></option>
									<?php			
											}
										
										}
									?>
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

