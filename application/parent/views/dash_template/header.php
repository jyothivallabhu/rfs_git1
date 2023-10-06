<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-72VXLW6V27"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-72VXLW6V27');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RainbowFish</title>
<meta name="description" content="RainbowFish Portfolio is an easy to use digital platform designed to help instill creative confidence in students in primary and middle school across India.">
    <meta name="keywords" content="Rainbowfish, Portfolio">

	<!-- Favicon -->
    <link rel="shortcut icon" href="<?=BASE_URLPATH?>assets/assets/images/favicon.png" />
	
    <!-- page css -->
    <link href="<?=base_url('assets')?>/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Core css -->
     <link href="<?=base_url('assets')?>/vendors/select2/select2.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/css/app.min.css" rel="stylesheet">
    <link href="<?=base_url('assets')?>/css/photogallery.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />
	
	<link rel="stylesheet" href="<?=base_url('assets/plugins/socialshare/')?>sharetastic.css">
	
<style>
<?php if(!empty($this->headerdata)){ ?>
.header{
	background: <?= $this->headerdata ?> !important;
}
<?php } ?>

</style>


</head>

<body>
 <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark" style="background: white;">
                    <a href="<?=base_url()?>">
                        <img src="<?= base_url('assets/images/logo/rainbowfish-logo1x.png') ?>" alt="Logo" style="background: white;width: 82%;">
                        <img class="logo-fold" src="<?=base_url('assets')?>/images/logo/logo-fold.png" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="<?=base_url()?>">
                        <img src="<?=base_url('assets')?>/images/logo/logo-white.png" alt="Logo">
                        <img class="logo-fold" src="<?=base_url('assets')?>/images/logo/logo-fold-white.png" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
				<?php if(!empty($this->name)){ ?>
                    <ul class="nav-left">
                        <li>
                            <a href="<?=base_url()?>">
                                <i class="anticon anticon-home"></i>
                            </a>
                        </li>
						<li>
                            <a href="<?=base_url('Children')?>">
                                <i class="anticon anticon-user"></i>
                            </a>
                        </li>
						<!--<li>
                            <a href="<?=base_url()?>">
                                <i class="anticon anticon-appstore"></i>
                            </a>
                        </li>-->
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="<?=base_url('assets')?>/images/avatars/thumb-3.jpg"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="<?=base_url('assets')?>/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?= $this->name ?></p>
                                            <!--<p class="m-b-0 opacity-07">UI/UX Desinger</p>-->
                                        </div>
                                    </div>
                                </div>
                                <a href="<?=base_url('Children')?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Manage Children</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
								<a href="<?= base_url('sitesettings') ?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-setting"></i>
                                            <span class="m-l-10">Site Settings</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
								<a href="<?= base_url('Change_password') ?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Change Password</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
								
								
								<a href="<?=base_url('Logout')?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
					</ul>
				<?php } ?>
					
                </div>
            </div>    
            <!-- Header END -->
