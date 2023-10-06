 <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters">
                <div class="col-lg-4 d-none d-lg-flex bg" >
				<img src="https://rainbowfishstudio.com/wp-content/uploads/2021/08/Fre.png" alt="">
                </div>
                <div class="col-lg-8 bg-white">
                    <div class="container h-100">
						<div class="row">
						<div class="col-md-6 offset-md-3"><img src="assets/images/rainbowfish_logo.png" alt="" width="80%"></div>
						
						</div>
						
                        
                        <div class="row no-gutters align-items-center mt-3">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <h2 class="m-b-30">Register</h2>
                                <!-- <p class="m-b-30">Enter your credential to get access</p> -->
		   <form  name="signup_form" id="signup_form">
				<?=($this->session->flashdata('msg'))?$this->session->flashdata('msg'):'';?>
					<div id="signup_msg"></div>
					<div class="form-group">
						<label class="font-weight-semibold" for="First Name">First Name</label>
						<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
					</div>
					<div class="form-group">
						<label class="font-weight-semibold" for="Last Name">Last Name</label>
						<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
					</div>
					<div class="form-group">
						<label class="font-weight-semibold"  for="school_id">Select School</label>
						<select id="school_id" name="school_id" class="select2 required valid">
							<option value=""> Select School</option>
								<?php
									if($schools['num']>0){
										foreach($schools['data'] as $c){
								?>
									<option value="<?=$c->id?>"><?=$c->name?></option>
								<?php			
										}
									
									}else{
										?>
										<option value=""> No Data Found</option>
										<?php
									}
								?>
						</select>
					</div>
					
					<div class="form-group">
						<label class="font-weight-semibold" for="userName">Email:</label>
					
						    <input type="text" class="form-control" name="email" id="email"  placeholder="Email">
						
					</div>
					<div class="form-group">
						<label class="font-weight-semibold" for="password">Password:</label>
						
						    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
						
					</div>
					
					
								
								
					<div class="form-group">
						<div class="d-flex align-items-center justify-content-between">
							<button  type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
				<div class="form-group row">
					<div class="d-flex align-items-center justify-content-between col-md-8">
						<span class="font-size-13 text-muted">
							Already have an account? 
							<a href="<?=base_url('Login')?>">Click here</a>
						</span>
					</div>
<!-- <div class="d-flex align-items-center justify-content-between col-md-4"> -->
						<!-- <span class="font-size-13 text-muted"> -->
							<!-- <a href="">Forgot Password?</a> -->
						<!-- </span> -->
					<!-- </div> -->
				</div>
				</form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>