<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rainbow Fish </title>

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
    <link rel="stylesheet" href="<?=base_url()?>parent/assets/vendors/select2/select2.css" type="text/css">

    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" />-->
	
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />
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
	
	<style>
<?php if(!empty($this->headerdata)){ ?>
.header{
	background: <?= $this->headerdata ?> !important;
}
<?php } ?>

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
                <img src="<?= base_url('assets/images/logo/rainbowfish-logo1x.png') ?>" alt="logo">
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
            <a href="<?= base_url() ?>" class="logo" style="background: white;   padding: 8px 19px;;margin-left: -20px;">
                <img width="180" src="<?= base_url('assets/images/logo/rainbowfish-logo1x.png') ?>" alt="logo">
            </a>
            <!-- ./ Logo -->

            <div class="header-menu">
                <div class="header-menu-header">
                    <a href="<?= base_url() ?>" class="top-menu-header-logo">
                        <img src="<?= base_url('assets/images/logo/rainbowfish-logo1x.png') ?>" alt="logo">
                    </a>
                    <a href="<?= base_url() ?>" class="btn btn-sm header-menu-close">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                        <div class="avatar me-3">
                            <img src="<?= $_SESSION['login_session']['profile_pic'] ?>" class="rounded-circle" alt="image">
                        </div>
						<div style="color: #1B66CA;">
                           
                        </div>
                        <div>
                            <div class="fw-bold"><div > Welcome  <span class="fw-bold"><?= ucwords($_SESSION['login_session']['first_name']) ?></span></div>
							<small>Logged In  as
							<?php 
							if($_SESSION['login_session']['role_id'] == 1){
								echo 'SuperAdmin';
							}elseif($_SESSION['login_session']['role_id'] == 2){
								echo 'RFS Admin';
							}
							?></small></div>
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
				
				<style>
				

.header ul.navbar-nav { 
 
  padding: 0; 
  list-style: none; 
  display: table;
  text-align: center;
}
.header ul.navbar-nav li.nav-item a.nav-link{
	height: 40px !important;
}
.header ul.navbar-nav li.nav-item { 
  display: table-cell; 
  position: relative; 
  padding: 15px 0;
}
.header ul.navbar-nav li.nav-item a {
  color: #fff;
  text-decoration: none;  
  display: inline-block;
  padding: 15px 20px;
  position: relative;
}
.header ul.navbar-nav li.nav-item a:after {    
  background: none repeat scroll 0 0 transparent;
  bottom: 0;
  content: "";
  display: block;
  height: 2px;
  left: 50%;
  position: absolute;
  background: #fff;
  transition: width 0.3s ease 0s, left 0.3s ease 0s;
  width: 0;
}
.header ul.navbar-nav li.nav-item a:hover:after { 
  width: 100%; 
  left: 0; 
}
				</style>
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
					
					 ?>
					
                    <li class="nav-item">
                        <a href="<?= base_url('lessons') ?>" class="nav-link ">
                            Lesson
                        </a>
                    </li>
					
					 <li class="nav-item">
                        <a href="<?= base_url('schools') ?>" class="nav-link ">
                            Schools
                        </a>
                    </li>
					
					
					<?php
					
				}else if($_SESSION['login_session']['role_id'] == 1){
					?>
					<li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link ">
                            Dashboard
                        </a>
                    </li>
					
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
					<li class="nav-item">
                        <a href="#" class="nav-link ">
                            Schools
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
                    <!--<li class="nav-item ">
                        <a href="<?= base_url('login/logout') ?>" class="nav-link ">
                            <i class="fa fa-power-off"></i>Change Password
                        </a>
                    </li>
					<li class="nav-item ">
                        <a href="<?= base_url('login/logout') ?>" class="nav-link ">
                            <i class="fa fa-power-off"></i>Logout
                        </a>
                    </li>-->

                </ul>
            </div>
			<div class="dropdown">
                    <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                        <div class="avatar me-3">
                            <img src="<?= $_SESSION['login_session']['profile_pic'] ?>" class="rounded-circle" alt="image">
                        </div>
                        <div style="color: #fff;">
                           <div > Welcome  <span class="fw-bold"><?= ucwords($_SESSION['login_session']['first_name']) ?></span></div>
							<small>Logged In  as
							<?php 
							if($_SESSION['login_session']['role_id'] == 1){
								echo 'SuperAdmin';
							}elseif($_SESSION['login_session']['role_id'] == 2){
								echo 'RFS Admin';
							}
							?></small>
                        </div>
						
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="<?= base_url('changepwd') ?>" class="dropdown-item d-flex align-items-center text-danger">
                            <i class="bi bi-person dropdown-item-icon"></i> Change Password
                        </a>
						<a href="<?= base_url('sitesettings') ?>" class="dropdown-item d-flex align-items-center text-danger">
                            <i class="bi bi-gear dropdown-item-icon"></i> Site Settings
                        </a>
						
						<a href="<?= base_url('get_help_list') ?>" class="dropdown-item d-flex align-items-center text-danger">
                            <i class="bi bi-person dropdown-item-icon"></i> Get Help
                        </a>
						
                        <a href="<?= base_url('logout') ?>" class="dropdown-item d-flex align-items-center text-danger">
                            <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                        </a>
                    </div>
                </div>
            <!-- Header mobile buttons -->
            <div class="header-mobile-buttons" style="display: none;">
                <a href="#" class="actions-btn">
                    <i class="bi bi-three-dots"></i>
                </a>
            </div>
            <!-- ./ Header mobile buttons -->
        </div>
        <!-- ./ header -->
		
		<?php
		$s_id = '';
		
		if(isset($schools->id)) {
			$s_id = $schools->id;
		}
		?>
		
		<?php if( isset($s_id)  && $s_id !=''  ){
			$sch_id = 'index/'.$s_id;
		 ?>
		
		<div class="content ">
        
    <div class=" bg-image mb-4" >
        <div class="container d-flex align-items-center justify-content-center h-100 flex-column flex-md-row text-center text-md-start">
           <div class="">
                <img src="<?=($schools->logo != '' ) ? base_url().$schools->logo : base_url().'assets/images/school.png'  ?>" class="img-fluid"
                     alt="..." height="200" width="200">
            </div>
            <div class="my-4 my-md-0 col-md-3" style="margin-left:30px">
                <h3 class="mb-1"><?= $schools->name ?></h3>
                <p><?= $schools->city  ?> | 
                <?= $schools->principal_name  ?> | 
                <?= $schools->email  ?> |
                <?= $schools->phone  ?></p> 
				<p><?= base_url().$schools->url_slug.'/login'  ?></p>
				
				
            </div>
            <div class="ms-md-auto">
                <a href="<?= base_url('schools/edit_school/'.$this->uri->segment('2')) ?>" class="btn btn-primary btn-lg btn-icon">
                    <i class="bi bi-pencil small"></i> Edit School
                </a>
            </div>
        </div>
    </div>
    
    <?php $url_slug = (isset($_SESSION["login_session"]["url_slug"])) ? $_SESSION["login_session"]["url_slug"]: '' ?>
	
	    <div class="row">
		    <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills flex-column gap-2">
                        <li class="nav-item <?php echo ($this->uri->segment('1') == 'school_dashboard' ?  "active" :  "")  ?>">
						
                            <a class="nav-link  <?= ($this->uri->segment('1') == 'school_dashboard' ?  "active" :  "inactive")  ?> " href="<?= base_url($url_slug.'/school_dashboard/'.$s_id) ?>">Dashboard</a>
							
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'school_admins' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'school_admins' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/school_admins/'.$s_id) ?>">School Admin</a>
                        </li>

                        <li class="nav-item <?php echo ($this->uri->segment('1') == 'school_mentors' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'school_mentors' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/school_mentors/'.$s_id) ?>">School Mentors</a>
                        </li>
						
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'school_management' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'school_management' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/school_management/'.$s_id) ?>">School Management</a>
                        </li>
						
						
                        <li class="nav-item <?php echo ($this->uri->segment('1') == 'classes' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'classes' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/classes/'.$s_id) ?>">Classes</a>
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'sections' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'sections' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/sections/'.$s_id) ?>">Sections</a>
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'grades' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'grades' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/grades/'.$s_id) ?>">Grade</a>
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'exam_types' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'exam_types' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/exam_types/'.$s_id) ?>">Exam Types</a>
                        </li>
						

                        <li class="nav-item <?php echo ($this->uri->segment('1') == 'teachers' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'teachers' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/teachers/'.$s_id) ?>">Teachers</a>
                        </li>
                        <li class="nav-item <?php echo ($this->uri->segment('1') == 'students' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'students' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/students/'.$s_id) ?>">Students</a>
                        </li>
                        <li class="nav-item <?php echo ($this->uri->segment('1') == 'parents' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'parents' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/parents/'.$s_id) ?>">Parents</a>
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'libary' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'libary' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/assign_lessons/'.$s_id) ?>">Assign Lesson </a>
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'lesson_schedule' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'lesson_schedule' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/lesson_schedule/'.$s_id) ?>">Lesson Schedule</a>
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'roll_over' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'roll_over' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/roll_over/add/'.$s_id) ?>">Roll Over</a>
                        </li>
						<li class="nav-item <?php echo ($this->uri->segment('1') == 'activities' ?  "active" :  "")  ?>">
                            <a class="nav-link <?php echo ($this->uri->segment('1') == 'activities' ?  "active" :  "inactive")  ?>" href="<?= base_url($url_slug.'/activities/'.$s_id) ?>">School Activities</a>
                        </li>
						
						
						<li class="dropdown">
                            <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Feedback Management</a>
								
								<div class="dropdown-menu" style="background: #ededed;">
									<a href="<?= base_url($url_slug.'/artwork_feedback/'.$s_id) ?>" class="dropdown-item">Artwork</a>
									<a href="<?= base_url($url_slug.'/trail_feedback/'.$s_id) ?>" class="dropdown-item">Teacher Trial </a>
									<a href="<?= base_url($url_slug.'/mentoring_feedback/'.$s_id) ?>" class="dropdown-item">Continuous Mentoring</a>
									<a href="<?= base_url($url_slug.'/monthlymentoring/'.$s_id) ?>" class="dropdown-item">Monthly Mentoring</a>
								</div>
							
							
                        </li>
						
						
                    </ul>
                </div>
            </div>
        </div>
		
		
		<?php } ?>