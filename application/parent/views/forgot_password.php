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
                                <h2 class="m-b-30">Forgot Password</h2>
                                <!-- <p class="m-b-30">Enter your credential to get access</p> -->
								
								<form class="mb-5" id="forgot_form"  method="POST" action="<?=  site_url('Forgotpwd/validate'); ?>">
							
                                <?= ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : ''; ?>
							
								
								
                                <div id="forgot_msg"></div>
								
								<div class="form-group">
                                        <label class="font-weight-semibold" for="userName">Email:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="email" class="form-control"   name="email" placeholder="Enter email" autofocus required>
                                        </div>
                                    </div>
									
									
                                <div class="mb-3">
                                    
                                </div>
                               
								<input type="hidden" name="school_id" value="<?= (isset($record['id']) != '') ? $record['id'] : ''; ?>" >
                                    <input type="hidden" name="url_slug" value="<?= (isset($record['url_slug']) != '') ? $record['url_slug'] : ''; ?>" >
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


