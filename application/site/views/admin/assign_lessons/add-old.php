<!-- content -->
<!--div class="col-md-9">
   <div class="row g-4 mb-4">
            <div class="card widget" id='app'>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Assign Lessons - <?= $schools->name ?></h5>
                </div>-->
				
				<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Assign Lessons  - <?= $schools->name ?></a>
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
				   <h2>Assign Lessons  - <?= $schools->name ?></h2>
				   
				 <?php } ?>
			<div id="msg"></div>	
				
                
<form class="mb-5" method="POST" id="assign_lessons" action="<?= site_url('assign_lessons/save_lesson_ids') ?>"  enctype="multipart/form-data">
                
				<div class="row">
					
					<div class="mb-3 col-6">
							<label class="form-label">Class Name</label>
							<select id="aclass_id"  name="class_id"  class="form-control class_id" required >
								<option selected="">Select</option>
								<?php 
								if(!empty($classes)){
									foreach ($classes as $key => $value) {
									?>
									<option value="<?=  $value->c_id ?>" data-id="1"><?=  $value->class_name ?></option>
								<?php  
									}
								}else{
									echo ' <option>No classes found</option>';
								}
								?>
								
							</select>
						</div>

                        <div class="mb-3 col-6 ">
                            <label for="lesson_id" class="form-label">Select Lesson</label>
							
							<select id="lesson_id" name="lesson_id"  class="form-control" required>
								<option value="">Select</option>
								<?php 
								
								/* if(!empty($lessons)){	
									foreach ($lessons as $key => $value) {
									?>
									<option value="<?=  $value->lesson_id ?> " ><?=  ucwords($value->lesson_name) ?></option>
									
								<?php 
									}
								
								 }else{
									 echo '<option value="">No Data found</option>';
								 } */ ?>
								
							</select>
							
							
                            <input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= $schools->id ?>">
                        </div>
                        
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/assign_lessons/'.$schools->id) ?>" class="btn btn-outline-primary">Cancel</a>
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

 $(document).on('change','#aclass_id',function(){
	var class_id = $(this).val();
	var school_id = $("#school_id").val();
	
	var sections_optns ='';
	if(class_id!=''){
		$.ajax({
			'url':"<?=base_url('Assign_lessons/getLessons')?>",
			"data":{class_id:class_id,school_id:school_id},
			"type":"post",
			"success":function(res){
				console.log(res);
				var j = JSON.parse(res);
				if(j.sections_optns!=''){
					$("#lesson_id").html(j.sections_optns);                         
				}
			}
		});
	}
}); 
</script>
<!-- ./ content -->