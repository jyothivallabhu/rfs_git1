<!-- content -->
<!--div class="col-md-9">
   <div class="row g-4 mb-4">
            <div class="card widget" id='app'>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add School Mentor - <?= $schools->name ?></h5>
                </div>-->
				
				
				 <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Add School Mentor - <?= $schools->name ?></a>
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
				   <h2>Add School Mentor - <?= $schools->name ?></h2>
				   
				 <?php } ?>
				
				<div id="msg"></div>
				
				<?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/school_mentors' ;
				}else{
					 $cancelurl = base_url().'school_mentors/'.$schools->id;
				}  ?>
		
                <form class="mb-5 form_class" method="POST" id="add_schoolMentors" action="<?= site_url('school_mentors/save_school_mentor') ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="mentor_id" class="form-label">Select Mentor</label>
							
							<select id="mentor_id" name="mentor_id"  class="form-control" required>
								<option value="">Select</option>
								<?php 
								$mentor_id = explode(',', $school_mentors[0]->mentor_id);
								
								if(!empty($mentors)){	
									foreach ($mentors as $key => $value) {
									?>
									<option value="<?=  $value->id .'-'. $value->email?>"  <?=  (in_array($value->id, $mentor_id)) ?  'disabled' : '' ?>><?=  ucwords($value->first_name.' '.$value->last_name).' - '. $value->email  ?></option>
									
								<?php 
									}
								
								 }else{
									 echo '<option value="">No Data found</option>';
								 } ?>
								
							</select>
							
							
                            <input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= $schools->id ?>">
                        </div>
                        
                        
                    </div>

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