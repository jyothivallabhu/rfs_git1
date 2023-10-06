<div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters">
                <div class="col-lg-4 d-none d-lg-flex bg" >
				<img src="https://rainbowfishstudio.com/wp-content/uploads/2021/08/Fre.png" alt="">
                </div>
                <div class="col-lg-8 bg-white">
                    <div class="container h-100">
						<div class="row">
						<div class="col-md-6 offset-md-3"><img src="<?= base_url() ?>assets/images/rainbowfish_logo.png" alt="" width="80%"></div>
						
						</div>
						<?php
						$email = $this->uri->segment(3);
						$token = $this->uri->segment(4);
						?>
                        
                        <div class="row no-gutters align-items-center mt-3">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <h2 class="m-b-30">Set Your Password</h2>
                                <!-- <p class="m-b-30">Enter your credential to get access</p> -->
								
								<form class="mb-5" id="forgot_pwd_form"  method="POST" action="<?=base_url('forgotpwd/sendnewpwd/'.$email.'/'.$token)?>">
							
                                <?= ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : ''; ?>
							
								
								
                                <div id="frgt_msg"></div>
                                <div class="mb-3">
                                    <input type="password" class="form-control"  name="new_pass" id="new_pass" placeholder="New Password" autofocus required>
                                </div>
                               <div class="mb-3">
                                    <input type="password" class="form-control"  name="re_pass" id="re_pass"  placeholder="Confirm Password" autofocus required>
                                </div>
                               
                                <div class="text-center text-lg-start">
                                    
                                    <button class="btn btn-primary">Reset Password</button>
                                </div>
                            </form>
							
							
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>



