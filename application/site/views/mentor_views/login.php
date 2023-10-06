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
    <style>
	.client-logo{margin-top: 15px;}
	.m-t-10{margin-top: 15px;}
	
	.row.no-gutters img {
    width: 100%!important;
    height: auto!important;
}

    </style>
</head>

<body>
    <div class="app">
        <div class="container-fluid p-0 h-100">
            <div class="row no-gutters">
                <div class="col-lg-4 d-none d-lg-flex bg" >
				<img src="<?= base_url( $featured_image['final_artwork']) ?>" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8 bg-white">
                    <div class="container h-100">
		    
			<!--<div class="row offset-md-3">
			
			
				<div class="col-md-6 m-t-10"><img src="<?= base_url() ?>assets/school_assets/images/rainbowfish_logo.png" alt="" width="70%"></div>
				<div class="col-md-6 text-right client-logo"><?= $image ?></div>
			</div>-->
			
			<?php   $image = (isset($record['logo']) != '') ? '<img width="50%" src="'.base_url().$record["logo"].'" alt="logo" >' : ''; ?>
			
			<div class="row  ">
				<div class="col-md-6 col-lg-7 col-xl-6 offset-md-3 mx-auto ">
					<div class="col-md-6 m-t-10" style=" float: right;">
						<img src="<?= base_url() ?>assets/school_assets/images/rainbowfish_logo.png" alt="" width="200">
					</div>
				</div> 
			</div> 
						
						
                        
                        <div class="row no-gutters align-items-center mt-3">
                            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto card">
								<div class="card-body">
                                <h2 class="m-b-30">Login</h2>
								<div id="signin_msg"></div>
								
                                <!-- <p class="m-b-30">Enter your credential to get access</p> -->
                                <form class="mb-5" id="signin_form"  method="POST" action="<?= (isset($record['url_slug']) != '') ? site_url($record['url_slug'].'/Login/check_login') : site_url('Login/check_login'); ?>">
							
                                <?= ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : ''; ?>
								
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
										   
										   <span class="showOrHide" style=" float: right; margin: 10px -16px 0px -24px;"> <i class="fa fa-eye"  ></i> </span >
										   
											<input type="hidden" name="school_id" value="<?= (isset($record['id']) != '') ? $record['id'] : ''; ?>" >
											<input type="hidden" name="url_slug" value="<?= (isset($record['url_slug']) != '') ? $record['url_slug'] : ''; ?>" >
											<input type="hidden" name="role_id" value="5" >
									
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
											<button class="btn btn-primary">Login</button>
                                        </div>
                                    </div>
									<div class="form-group row">
										<div class="d-flex align-items-center justify-content-between col-md-4">
											<span class="font-size-13 text-muted">
											<a href="<?=base_url('Forgotpwd')?>">Forgot Password?</a>
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