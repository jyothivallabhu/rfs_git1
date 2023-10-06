<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RainbowFish</title>

	<!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url('assets')?>/assets/images/favicon.png" />

    <!-- page css -->
    <link href="<?= base_url() ?>assets/school_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

	 <link rel="stylesheet" href="<?=base_url('assets')?>/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css" type="text/css">
	 
	 
    <!-- Core css -->
    <link href="<?= base_url() ?>assets/school_assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dist/css/bootstrap-docs.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.css" type="text/css">
	
	 <link href="<?= base_url() ?>assets/school_assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
	 
	 <link href='<?= base_url() ?>assets/calendar/main.css' rel='stylesheet' />
	<script src='<?= base_url() ?>assets/calendar/main.js'></script>
	
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    
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
				
				<?php if($_SESSION['login_session']['role_id'] == 5){
					$url=  base_url('mentor_dashboard');
				}elseif($_SESSION['login_session']['role_id'] == 4){
					$url=   base_url($this->url_slug.'/school_dashboard');
				}else{
					$url=   base_url($this->url_slug.'/teacher_dashboard');
				} ?>
							
                    <a href="<?= $url ?>">
                        <img src="<?= base_url('assets/images/logo/rainbowfish-logo1x.png') ?>" alt="Logo"  style="    background: white;width: 82%;">
                    </a>
                </div>
                <!--<div class="logo logo-white">
                    <a href="<?= $url ?>">
                        <img src="<?= base_url().$this->logo ?>" alt="Logo" width="100" height="100">
                        <img class="logo-fold" src="<?= base_url().$this->logo ?>" alt="Logo" width="100" height="100">
                    </a>
                </div>-->
                <div class="nav-wrap">
                    <div class="nav-left">
				<nav class="navbar navbar-expand-lg navbar-light">
				
				 
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php if($_SESSION['login_session']['role_id'] == 4 || $_SESSION['login_session']['role_id'] == 9 ){
							?>
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active">
									<a class="nav-link" href="<?= base_url($this->url_slug.'/school_dashboard'); ?>"><i class="anticon anticon-dashboard"></i> Dashboard</a>
								</li>
								
								
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="anticon anticon-pie-chart"></i> Master
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/classes') ?>">Class</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/sections') ?>">Section</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/school_mentors') ?>">Mentors</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/school_management') ?>">Management</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/teachers') ?>">Teachers</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/students')?>">Students</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/parents')?>">Parents</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/grades')?>">Grades</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/exam_types')?>">Exam Types</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/activities')?>">School Activities</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="anticon anticon-select"></i> Lessons
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/assign_lessons') ?>">View</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/lesson_schedule') ?>">Schedule</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="anticon anticon-file"></i> Class
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/artwork_feedback') ?>">Artwork</a>
											<!--<a class="dropdown-item" href="<?= base_url($this->url_slug.'/grade_entry') ?>">Grade Entry</a>-->
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/bulk_grade_entry') ?>"> Grade Entry</a>
											<a class="dropdown-item" href="<?= base_url().$this->url_slug.'/reports' ?>">Reports</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="anticon anticon-solution"></i> Mentoring
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/trail_feedback') ?>">Teacher Trial</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/mentoring_feedback') ?>">Continuous Mentoring</a>
											<a class="dropdown-item" href="<?= base_url($this->url_slug.'/monthlymentoring') ?>">Monthly Mentoring</a>
									</div>
								</li>
								
							</ul>
							
					<?php }elseif($_SESSION['login_session']['role_id'] == 5){
							?>
							<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?= base_url('mentor_dashboard') ?>"><i class="anticon anticon-dashboard"></i> Dashboard</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link" href="<?= base_url('mentor_schools') ?>" >
									<i class="anticon anticon-bars"></i> Schools 
								</a>
								
							</li>
							
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="anticon anticon-solution"></i> Mentoring
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									    <a class="dropdown-item" href="<?= base_url().'mentor_trails' ?>">Teacher Trial</a>
									    <a class="dropdown-item" href="<?= base_url().'mentor_continuous_mentoring' ?>">Continuous Mentoring</a>
									    <a class="dropdown-item" href="<?= base_url().'mentor_monthly_mentoring' ?>">Monthly Mentoring</a>
								</div>
							</li>
						</ul>
						
							<?php
						}else{ ?>
						
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?= base_url($this->url_slug.'/teacher_dashboard') ?>"><i class="anticon anticon-dashboard"></i> Dashboard</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="anticon anticon-file"></i> Class 
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/assigned_sections' ?>">Students</a>
									
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/teacher_artwork' ?>">Artwork</a>
									    <!--<a class="dropdown-item" href="<?= base_url().$this->url_slug.'/grade_entry' ?>">Grade Entry</a>-->
										<a class="dropdown-item" href="<?= base_url($this->url_slug.'/bulk_grade_entry') ?>">Grade Entry</a>
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/reports' ?>">Reports</a>
								</div>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="anticon anticon-select"></i> Lessons
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/teacher_lessonslist' ?>">View</a>
									    <!--<a class="dropdown-item" href="#">Search</a>-->
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/teacher_lessons' ?>">Schedule</a>
									    <!--<a class="dropdown-item" href="#">Report</a>-->
								</div>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="anticon anticon-solution"></i> Mentoring
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/teacher_triallessonwise' ?>">Teacher Trial</a>
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/teacher_mentoring' ?>">Continuous Mentoring</a>
									    <a class="dropdown-item" href="<?= base_url().$this->url_slug.'/teacher_monthly_mentoring' ?>">Monthly Mentoring</a>
								</div>
							</li>
						</ul>
						
						<?php } ?>
					      
					</div>
					


				
				</nav>
                    </div>
                    <div class="nav-right">
					
					<?php if($_SESSION['login_session']['role_id'] == '5' || $_SESSION['login_session']['role_id'] == '10'){ ?>
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" class="toogle-dropdown" data-toggle="dropdown" style="font-size: 20px;">
                                <i class="anticon anticon-bell notification-badge"></i><span class="count"></span>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                        
										<div class="notifications"></div>
                                       
                                    </div>
                                </div>
                            </div>
                        </li>
						
					<?php } ?>
			
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="<?= $this->profile_pic ?>"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="<?= $this->profile_pic ?>" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?= $this->first_name ?></p>
                                            <!--<p class="m-b-0 opacity-07">Teacher</p>-->
											<?php if($_SESSION['login_session']['role_id'] == '4'){
												$role = 'School Admin';
											}elseif($_SESSION['login_session']['role_id'] == '5'){
												$role = 'Mentor';
											} elseif($_SESSION['login_session']['role_id'] == '9'){
												$role = 'School Management';
											} elseif($_SESSION['login_session']['role_id'] == '10'){
												$role = 'Teacher';
											}else{
												$role = '';
											} ?>
											
                                            <p class="m-b-0 opacity-07"><?= $role ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <a href="<?= base_url($this->url_slug.'/changepwd') ?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-edit"></i>
                                            <span class="m-l-10">Change Password</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
								 <a href="<?= base_url($this->url_slug.'/sitesettings') ?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-setting"></i>
                                            <span class="m-l-10">Site Settings</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
								 <a href="<?= base_url($this->url_slug.'/get_help') ?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Get Help</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
								
								
                                <a href="<?= base_url('logout') ?>" class="dropdown-item d-block p-h-15 p-v-10">
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
                     
                    </div>
                </div>
            </div>    
            <!-- Header END -->
