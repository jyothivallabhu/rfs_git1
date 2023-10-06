<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Dashboard | Candidate | Rainbow Fish </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/assets/images/favicon.png" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/icons/bootstrap-icons-1.4.0/bootstrap-icons.min.css" type="text/css">
    <!-- Bootstrap Docs -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/bootstrap-docs.css" type="text/css">

    <!-- Slick -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/libs/slick/slick.css" type="text/css">

    <!-- Main style file -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/app.min.css" type="text/css">
	
	<link rel="stylesheet" href="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>


    <style>
        .item-action-buttons {
            display: none !important;
        }
    </style>
</head>

<body class="top-menu">

    <!-- preloader -->
    <div class="preloader">
        <img src="https://rainbowfishstudio.com/wp-content/uploads/2020/04/rainbowfish-logo1x.png" alt="logo">
        <div class="preloader-icon"></div>
    </div>
    <!-- ./ preloader -->

    <!-- sidebars -->

    <!-- sidebars -->

    <!-- notifications sidebar -->
    <div class="sidebar" id="notifications">
        <div class="sidebar-header d-block align-items-end">
            <div class="align-items-center d-flex justify-content-between py-4">
                Notifications
                <button data-sidebar-close>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active nav-link-notify" data-bs-toggle="tab" href="#activities">Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- ./ notifications sidebar -->



    <!-- menu -->
    <div class="menu">
        <div class="menu-header">
            <a href="<?= base_url() ?>" class="menu-header-logo">
                <img src="https://rainbowfishstudio.com/wp-content/uploads/2020/04/rainbowfish-logo1x.png" alt="logo">
            </a>
            <a href="<?= base_url() ?>" class="btn btn-sm menu-close-btn">
                <i class="bi bi-x"></i>
            </a>
        </div>

    </div>
    <!-- ./  menu -->


    <!-- layout-wrapper -->
    <div class="layout-wrapper">

        <!-- header -->
        <div class="header">
            <div class="menu-toggle-btn">
                <!-- Menu close button for mobile devices -->
                <a href="#">
                    <i class="bi bi-list"></i>
                </a>
            </div>
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo" style="background: white;  border-radius: 23px; padding: 0px 19px;">
                <img width="180" src="https://rainbowfishstudio.com/wp-content/uploads/2020/04/rainbowfish-logo1x.png" alt="logo">
            </a>
            <!-- ./ Logo -->

            <div class="header-menu">
                <div class="header-menu-header">
                    <a href="<?= base_url() ?>" class="top-menu-header-logo">
                        <img src="https://rainbowfishstudio.com/wp-content/uploads/2020/04/rainbowfish-logo1x.png" alt="logo">
                    </a>
                    <a href="<?= base_url() ?>" class="btn btn-sm header-menu-close">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                        <div class="avatar me-3">
                            <img src="<?= base_url('assets') ?>/assets/images/user/man_avatar3.jpg" class="rounded-circle" alt="image">
                        </div>
                        <div>
                            <div class="fw-bold"><?= $_SESSION['login_session']['first_name'] ?></div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-person dropdown-item-icon"></i> Profile
                        </a>
                        <a href="#" class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-envelope dropdown-item-icon"></i> Inbox
                        </a>
                        <a href="#" class="dropdown-item d-flex align-items-center" data-sidebar-target="#settings">
                            <i class="bi bi-gear dropdown-item-icon"></i> Settings
                        </a>
                        <a href="login.html" class="dropdown-item d-flex align-items-center text-danger" target="_blank">
                            <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                        </a>
                    </div>
                </div>
                <!--<ul class="navbar-nav">
				<?= $id = ($_SESSION['login_session']['role_id']== '4') ?  '' : 'index/'.$schools->id ?>
                    
					
					<li class="nav-item">
                        <a href="<?= base_url('users') ?>" class="nav-link ">
                            Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/parents/'.$id) ?>" class="nav-link ">
                            Parents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/students/'.$id) ?>" class="nav-link ">
                            Students
                        </a>
                    </li>
                </ul>-->
				    <ul class="navbar-nav">

				<?php

				if($_SESSION['login_session']['role_id'] == 2){
					?>
					<li class="nav-item">
                        <a href="#" class="nav-link ">
                            Dashboard
                        </a>
                    </li>

					<?php
					$modules = $_SESSION['login_session']['modules'];
					
					$module = explode(',',$modules);
					if (in_array(2, $module)) {
  
					 ?>
					
                    <li class="nav-item">
                        <a href="<?= base_url('lessons') ?>" class="nav-link ">
                            Lesson
                        </a>
                    </li>
					<?php
					}
				}else if($_SESSION['login_session']['role_id'] == 1){
					?>
					<li class="nav-item">
                        <a href="<?= base_url('users') ?>" class="nav-link ">
                            Admins
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('mentors') ?>" class="nav-link ">
                            Mentors
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('schools') ?>" class="nav-link ">
                            Schools
                        </a>
                    </li>
					<li class="nav-item">
                        <a href="<?= base_url('lessons') ?>" class="nav-link ">
                            Lessons
                        </a>
                    </li>
					
					<?php
				}else{
				    ?>
				    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            Dashboard
                        </a>
                    </li>
				    <?php 
				}			
				?>
                </ul>
            
            </div>
            <div class="header-bar ms-auto">
                <ul class="navbar-nav justify-content-end">
                    <li>
                    </li>

                </ul>
            </div>
			
			<div class="dropdown">
                    <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                        <div class="avatar me-3">
                            <img src="<?= base_url('assets') ?>/assets/images/user/man_avatar3.jpg" class="rounded-circle" alt="image">
                        </div>
                        <div style="color: #fff;">
                            Welcome <div class="fw-bold"> <?= $_SESSION['login_session']['first_name'] ?></div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="<?= base_url('admin/change_password') ?>" class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-person dropdown-item-icon"></i> Change Password
                        </a>
                        
                        <a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/logout') ?>" class="dropdown-item d-flex align-items-center text-danger">
                            <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                        </a>
                    </div>
                </div>
				
				
            <!-- Header mobile buttons -->
            <div class="header-mobile-buttons">
                <a href="#" class="actions-btn">
                    <i class="bi bi-three-dots"></i>
                </a>
            </div>
            <!-- ./ Header mobile buttons -->
        </div>
        <!-- ./ header -->
		
		    <!-- content -->
    <div class="content ">
        
    <div class="buyer-profile-cover bg-image mb-4" data-image="<?= base_url() ?>assets/assets/images/profile-bg.jpg">
        <div
            class="container d-flex align-items-center justify-content-center h-100 flex-column flex-md-row text-center text-md-start">
            <div class="avatar avatar-xl me-3">
                <img src="<?= base_url().$schools->logo ?>" class="rounded-circle"
                     alt="...">
            </div>
            <div class="my-4 my-md-0">
                <h3 class="mb-1"><?= $schools->name ?></h3>
                <small><?= $schools->address ?></small>
            </div>
            <div class="ms-md-auto">
                <a href="<?= base_url('schools/edit_school/'.$this->uri->segment('3')) ?>" class="btn btn-primary btn-lg btn-icon">
                    <i class="bi bi-pencil small"></i> Edit School
                </a>
            </div>
        </div>
    </div>
    
    
	
	    <div class="row">
		    <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column gap-2">
                        <li class="nav-item">
						
                            <a class="nav-link  <?= ($this->uri->segment('1') == 'school_dashboard' ?  "active" :  "inactive")  ?> " href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_dashboard/'.$id) ?>">Dashboard</a>
							
                        </li>
						<li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'school_admins' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_admins/'.$id) ?>">School Admin</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'school_mentors' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_mentors/'.$id) ?>">School Mentors</a>
                        </li>
						
						<li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'school_management' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/school_management/'.$id) ?>">School Management</a>
                        </li>
						
						
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'classes' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/classes/'.$id) ?>">Classes</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'sections' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/sections/'.$id) ?>">Sections</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'teachers' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/teachers/'.$id) ?>">Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'students' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/students/'.$id) ?>">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'parents' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/parents/'.$id) ?>">Parents</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'libary' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/assign_lessons/'.$id) ?>">Assign Lesson </a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'lesson_schedule' ?  "active" :  "inactive")  ?>" href="<?= base_url($_SESSION["login_session"]["url_slug"].'/lesson_schedule/'.$id) ?>">Lesson Schedule</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	