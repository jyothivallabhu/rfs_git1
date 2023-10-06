<div class="form-wrapper">
    <div class="container">
        <div class="card">
            <div class="row g-0">
			
			<div class="col d-none d-lg-flex border-start align-items-center justify-content-between flex-column text-center">
                        <div class="row">
						<div class="col-md-6"></div>
						
						</div>
                        <div>
                            <img src="<?= base_url('assets/images/bamboo.png') ?>">
                        </div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
					
					
                <div class="col border-start">
                    <div class="row">
					<div class="logo col-md-6">
                            <img width="80%" src="<?= base_url('/assets/images/rfslogo.png') ?> " alt="logo">
                        </div>
						
						
						<div class="logo col-md-6">
						<?=  $image = (isset($record['logo']) != '') ? '<img width="80%" src="'.base_url().$record["logo"].'" alt="logo">' : ''; ?>
                            
                        </div>
                        <div class="col-md-10 offset-md-1">
						<?php  //echo $record['logo'] ?>
						<?php
				$email = $this->uri->segment(3);
				$token = $this->uri->segment(4);
				?>
                           
                            <div class="my-5 text-center text-lg-start">
							 <div class="d-block d-lg-none text-center text-lg-start">
							
                                <img width="120" src="https://rainbowfishstudio.com/wp-content/uploads/2020/04/rainbowfish-logo1x.png" alt="logo">
                            </div>
                                <h1 class="display-8">Reset Password!</h1>
                                
                            </div>
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
                            <p class="text-center d-block d-lg-none mt-5 mt-lg-0">
                                New to Rainbow Fish? <a href="#">Sign up</a>.
                            </p>
                        </div>
                    </div>
                </div>
				
				
					
					
                <!--<div class="col d-none d-lg-flex border-start align-items-center justify-content-between flex-column text-center">
                    <div class="logo mt-5">
                        <img class="mt-5" width="240" src="<?= $image ?>" alt="logo">
                    </div>
                    <div>

                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
</div>