<!-- content -->
<!--<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4" id="app">
        <div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Mentors</h5>
                </div>-->
				
				<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Add Grades  - <?= $schools->name ?></a>
										</h3>
									
									</div>
									
								</div>
							</div>
							<div class="col-md-12">
				 <?php }else{ ?>
				  <div class="col-md-9" id="app">
					<div class="row g-4 mb-4">
						
				   <h2>Add Grades  - <?= $schools->name ?></h2>
				   
				 <?php } ?>
				 
 
				<div id="msg">
					
				</div>
				
				 <?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/grades' ;
				}else{
					 $cancelurl = base_url().'grades/'.$schools->id;
				}  ?>
				
				
                <form class="mb-5 form_class" id="add_mentors" method="POST" action="<?= site_url('grades/save') ?>">
                    <div class="row ">
						<input type="hidden" name="school_id" id="school_id" value="<?= $schools->id ?>">
                        <div class="mb-3 col-6 ">
                            <label for="grade_name" class="form-label">Grade </label>
                            <input type="text" class="form-control" name="grade_name" id="grade_name" required>
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= $cancelurl  ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->