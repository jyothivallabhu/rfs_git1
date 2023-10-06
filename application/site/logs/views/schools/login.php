<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RainbowFish</title>

<!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url('assets')?>/assets/images/favicon.png" />

    <!-- Core css -->
    <link href="<?= base_url() ?>assets/school_assets/css/app.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.css" type="text/css">

 <link rel="stylesheet" href="<?=base_url('assets')?>/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css" type="text/css">
 
 
    <style>
	.client-logo{margin-top: 15px;}
	.m-t-10{margin-top: 15px;}
    </style>
</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters">
                <!--<div class="col-lg-4 d-none d-lg-flex bg" >
					<img src="https://rainbowfishstudio.com/wp-content/uploads/2021/08/Fre.png" alt="">
                </div>-->
                <div class="col-lg-12 bg-white">
                    <div class="container h-100">
		    
			
						
						<?php 
						 ?>
                        
                        <div class="row no-gutters align-items-center mt-4">
                            <div class="col-md-6 col-lg-6 col-xl-6 m-t-100" >
				<img src="https://rainbowfishportfolio.com/assets/images/bamboo.png" alt="" style="width: 90%;">
                </div>
                            <div class="col-md-6 col-lg-6 col-xl-6 mx-auto m-t-100">
							
							<div class="row">
								<?php   $image = (isset($record['logo']) != '') ? '<img  src="'.base_url().$record["logo"].'" alt="logo" style="height: 75px;" >' : ''; ?>
								
								<div class="col-md-6  client-logo"><?= $image ?></div>
									
									<div class="col-md-6 text-right m-t-10"><img src="<?= base_url() ?>assets/school_assets/images/rainbowfish_logo.png" alt="" style="height: 75px;"></div>
									
								</div>
			
			
                                <div class="card">
                                <div class="card-body">
                                    <h2 class="m-b-30">Login</h2>
							    	<div id="signin_msg"></div>
								
                                     <!-- <p class="m-b-30">Enter your credential to get access</p> -->
                                     <form class="mb-2" id="signin_form"  method="POST" action="<?= (isset($record['url_slug']) != '') ? site_url($record['url_slug'].'/Login/check_login') : site_url('Login/check_login'); ?>">
							
                               
								
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Email:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="hello@email.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                           <input type="password" class="form-control"  name="password" placeholder="Enter password" required>
										   <span class="showOrHide suffix-icon"> <i class="bi bi-eye-slash" id="togglePassword" ></i> </span >
										   
                                        </div>
										
										<input type="hidden" name="school_id" value="<?= (isset($record['id']) != '') ? $record['id'] : ''; ?>" >
										<input type="hidden" name="url_slug" value="<?= (isset($record['url_slug']) != '') ? $record['url_slug'] : ''; ?>" >
											
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
											<button class="btn btn-primary">Login</button>
                                        </div>
                                    </div>
                    					<div class="form-group row">
                    						<div class="d-flex align-items-center justify-content-between col-md-8">
                    						    <span class="font-size-13 text-muted">
                    							<a href="<?=base_url((isset($record['url_slug']) != '') ? $record['url_slug'].'/Forgotpwd' : 'Forgotpwd')?>">Forgot Password?</a>
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
    
    <!-- Core Vendors JS -->
    <script src="<?= base_url() ?>assets/school_assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="<?= base_url() ?>assets/school_assets/js/app.min.js"></script>

  <!-- Main Javascript file -->
  
  <script src="<?= base_url('assets') ?>/dist/js/jquery.validate.js"></script>
  
  <script src="<?= base_url('assets') ?>/dist/js/comns.js"></script>
  <script src="<?= base_url('assets') ?>/dist/js/lc.js"></script>
  
  
  	<script src="<?=base_url('assets')?>/dist/js/login.js"></script>
	
	<script src="<?=base_url('assets')?>/dist/js/scripts.js"></script>
	<script src="<?=base_url('assets')?>/dist/js/jquery.form.js"></script>
	<script src="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.min.js"></script>
	
</body>

</html>