<!-- content -->
<!--<div class="col-md-9">
   <div class="row g-4 mb-4">
   
            <div class="card widget" id="app">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add School Activity - <?= $schools->name ?></h5>
                </div>
				
				<div id="msg"> </div>-->
	<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Add School Activities - <?= $schools->name ?></a>
										</h3>
									
									</div>
									<!--<div class="col-md-6 text-right">
										<div class="text-md-right">
											<a href="" class="btn btn-primary">
											<i class="anticon anticon-plus"></i>
											<span class="m-l-5">Add</span>
											</a>
										</div>
									</div>-->
								   
								</div>
							</div>
							<div class="col-md-12">
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				
				   
				  
				   
				   <div class="row g-4 mb-4">
				   <h2>Add School Activities - <?= $schools->name ?></h2>
				   
				 <?php } ?>
			<div id="msg"></div>
	
	
	<?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/activities' ;
				}else{
					 $cancelurl = base_url().'activities/'.$schools->id;
				}  ?>
				
				
                <form class="mb-5" method="POST" id="add_activities" action="<?= site_url('activities/save') ?>">
                    <div class="row">

                        
						
						<div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Activity Date</label>
                           <input type="date" name="activity_date" required class="form-control" placeholder="Enter Option"  aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
						
						<div class="mb-3 col-6 ">
                            <label for="desc" class="form-label">Description</label>
                            <input type="hidden" class="form-control" name="school_id" value="<?= $schools->id ?>" required>
                            <input type="text" class="form-control" name="description" id="desc" required>
                        </div>
                        
                    </div>

<?php  
							if(isset($_SESSION['login_session']['school_id'])) {
								$addurl = $_SESSION['login_session']['url_slug'].'/activities/add' ;
							}else{
								 $addurl = 'activities/add/'.$schools->id;
							}  ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= $cancelurl ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

<script>
    $(function(){
    var requiredCheckboxes = $('.options :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});

</script>
<!-- ./ content -->