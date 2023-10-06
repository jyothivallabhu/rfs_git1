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
						
                           
                            <div class="my-5 text-center text-lg-start">
							 <div class="d-block d-lg-none text-center text-lg-start">
							
                                <img width="120" src="https://rainbowfishstudio.com/wp-content/uploads/2020/04/rainbowfish-logo1x.png" alt="logo">
                            </div>
                                <h1 class="display-8"> Forgot Password?</h1>
                                <!--<p class="text-muted">Sign in to <b><?= $id = (isset($record['name']) != '') ?  ucwords($record['name']) : 'Rainbow Fish'; ?></b> to continue</p>-->
                            </div>
                            <form class="mb-5" id="forgot_form"  method="POST" action="<?= (isset($record['url_slug']) != '') ? site_url($record['url_slug'].'/Login/check_login') : site_url('Login/check_login'); ?>">
							
                                
								
								
                                <div id="forgot_msg"></div>
                                <div class="mb-3">
                                    <input type="email" class="form-control"   name="email" placeholder="Enter email" autofocus required>
                                </div>
                               
								<input type="hidden" name="school_id" value="<?= (isset($record['id']) != '') ? $record['id'] : ''; ?>" >
                                    <input type="hidden" name="url_slug" value="<?= (isset($record['url_slug']) != '') ? $record['url_slug'] : ''; ?>" >
                                <div class="text-center text-lg-start">
                                    
                                    <button class="btn btn-primary">Reset Password</button>
                                </div>
                            </form>
                            <p class="text-center d-block  mt-5 mt-lg-0">
                                Already have an account?  <a href="<?=base_url('login')?>">Click here</a>.
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

