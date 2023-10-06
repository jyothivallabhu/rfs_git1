
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
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto card">
							<div class="card-body">
                                <h2 class="m-b-30">Login</h2>
                                <!-- <p class="m-b-30">Enter your credential to get access</p> -->
                               <form  name="signin_form" id="signin_form">
									<?php /* ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''; */?>
										<div id="signin_msg"></div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Email:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" class="form-control" id="email"  name ="email" placeholder="hello@email.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" class="form-control" id="password" name= "password" placeholder="Password">
											<span class="showOrHide" style=" float: right;margin: 9px -9px 11px -21px;"> <i class="anticon anticon-eye"  ></i> </span >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
											<button class="btn btn-primary">Login</button>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <div class="d-flex align-items-center justify-content-between col-md-8">
                                            <span class="font-size-13 text-muted">
                                                Don't have an account? 
                                                <a href="<?=base_url('Register')?>">Click here</a>
                                            </span>
                                        </div>
										<div class="d-flex align-items-center justify-content-between col-md-4">
                                            <span class="font-size-13 text-muted">
                                                <a href="<?= base_url('Forgotpwd')?>">Forgot Password?</a>
                                            </span>
                                        </div>
                                    </div>
								</form>
								<ul class="list-inline d-flex align-items-center justify-content-between">
									<li class="list-inline-item">
										<a href="<?= base_url('pages/privacy_policy') ?>">Privacy Policy</a>
									</li>
									<li class="list-inline-item">
										<a href="<?= base_url('pages/termsandconditions') ?>">Terms & Conditions</a>
									</li>
								</ul>
                            </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>