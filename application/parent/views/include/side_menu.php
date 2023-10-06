   <!-- Side Nav START -->
   	<?php 
		$name = $this->session->userdata('infiniqo_user_name'); 
		$user_type = $this->session->userdata('infiniqo_user_type'); 
		//print_r($record['user_type']);exit;
	 ?>
            <div class="side-nav">
			<?php 
			  if($record['side_nav_type'] == "image"){ ?>				  			
                <div class="side-nav-inner" style="background-image: url(<?=base_url('assets')?>/side_nav_img_vd/<?=$record['side_nav_img_vd']?>);">
			<?php }else{?>
			  <div class="side-nav-inner" >
			<?php } ?>
			
                    <ul class="side-nav-menu scrollable">
                       
					
						<?php if($user_type == "SUPERADMIN"){ ?>
						 <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Dashboard')?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                               
                            </a>                          
                        </li>
						 <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Sitesettings')?>">
                                <span class="icon-holder">
									 <i class="anticon anticon-setting"></i>
								</span>
                                <span class="title">Site Settings</span>
                               
                            </a>
                           
                        </li>
                         <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
									<i class="anticon anticon-build"></i>
								</span>
                                <span class="title">Domain</span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
						
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url($name.'/Domain/add')?>">Add</a>
                                </li>
                               <li>
                                    <a href="<?=base_url($name.'/Domain')?>">List</a>
                                </li>
                               
                            </ul>
                        </li>
						 <li class="nav-item dropdown">
							<a class="dropdown-toggle" href="#">
								<span class="icon-holder">
									<i class="anticon anticon-build"></i>
								</span>
								<span class="title">Workspace </span>
								<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?=base_url($name.'/Workspace/add')?>">Add</a>
								</li>
							   <li>
									<a href="<?=base_url($name.'/Workspace')?>">List</a>
								</li>
							   
							</ul>
						</li>
						<?php } ?>
						
						<?php if($user_type == "WORKSPACE ADMINISTRATOR"){ ?>
						<li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Dashboard')?>">
                                <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                               
                            </a>                          
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Sitesettings')?>">
                                <span class="icon-holder">
								 <i class="anticon anticon-setting"></i>
								</span>
                                <span class="title">Site Settings</span>
                               
                            </a>
                           
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Dashboard/RegisteredUsers')?>">
                                <span class="icon-holder">
									<i class="anticon anticon-usergroup-add"></i>
								</span>
                                <span class="title">Users Registered</span>
                               
                            </a>
                           
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Users')?>">
                                <span class="icon-holder">
									<i class="anticon anticon-usergroup-add"></i>
								</span>
                                <span class="title">Workspace Configurators</span>
                               
                            </a>
                           
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Certificate_templates')?>">
                                <span class="icon-holder">
									<i class="anticon anticon-file-done"></i>
								</span>
                                <span class="title">Certificate Template</span>
                               
                            </a>
                           
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
									<i class="anticon anticon-file-text"></i>
								</span>
                                <span class="title">Custom Pages </span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url($name.'/Custompage/add')?>">Add</a>
                                </li>
                               <li>
                                    <a href="<?=base_url($name.'/Custompage')?>">List</a>
                                </li>
                               
                            </ul>
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
									<i class="fas fa-list"></i>
								</span>
                                <span class="title">Category </span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url($name.'/Category/add')?>">Add</a>
                                </li>
                               <li>
                                    <a href="<?=base_url($name.'/Category')?>">List</a>
                                </li>
                               
                            </ul>
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
								<i class="anticon anticon-cluster"></i>
								</span>
                                <span class="title">Subcategory </span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url($name.'/Subcategory/add')?>">Add</a>
                                </li>
                               <li>
                                    <a href="<?=base_url($name.'/Subcategory')?>">List</a>
                                </li>
                               
                            </ul>
                        </li>
						<!--<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
									 <i class="far fa-file-powerpoint"></i>
								</span>
                                <span class="title">Programs </span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url($name.'/Programs/add')?>">Add</a>
                                </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs')?>">All</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/pending')?>">Pending</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/active')?>">Active</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/inactive')?>">In-Active</a>
                               </li>
                               
                            </ul>
                        </li>-->
						<?php } ?>
						
						<?php if($user_type == "WORKSPACE USER"){ ?>
						 <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/UserPrograms/Dashboard')?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                               
                            </a>                          
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
									 <i class="far fa-file-powerpoint"></i>
								</span>
                                <span class="title">Programs </span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                               <li>
                                    <a href="<?=base_url($name.'/UserPrograms')?>">Explore</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/UserPrograms/Inprogress')?>">In-Progress</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/UserPrograms/Completed')?>">Completed</a>
                               </li>
                               
                            </ul>
                        </li>
						
						
						<?php } ?>
						
						<?php if($user_type == "INFINIQO CONFIGRATOR"){ ?>
						 <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Dashboard')?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                               
                            </a>                          
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
									 <i class="far fa-file-powerpoint"></i>
								</span>
                                <span class="title">Programs </span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url($name.'/Programs/add')?>">Add</a>
                                </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs')?>">All</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/pending')?>">Pending</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/active')?>">Active</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/inactive')?>">In-Active</a>
                               </li>
                               
                            </ul>
                        </li>
						
						
						
						<?php } ?>
						<?php if($user_type == "WORKSPACE CONFIGRATOR"){ ?>
						 <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="<?=base_url($name.'/Dashboard')?>">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                               
                            </a>                          
                        </li>
						<li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
									 <i class="far fa-file-powerpoint"></i>
								</span>
                                <span class="title">Programs </span>
                                <span class="arrow">
									<i class="arrow-icon"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url($name.'/Programs/add')?>">Add</a>
                                </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs')?>">All</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/pending')?>">Pending</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/active')?>">Active</a>
                               </li>
                               <li>
                                    <a href="<?=base_url($name.'/Programs/inactive')?>">In-Active</a>
                               </li>
                               
                            </ul>
                        </li>
						
						
						
						<?php } ?>
                       </ul>
                </div>
            </div>
            <!-- Side Nav END -->
<style>
.error{
	color:red;
}
</style>
           