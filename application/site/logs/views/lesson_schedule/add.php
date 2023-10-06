

<!--<div class="col-md-9" id="app">
   <div class="row g-4 mb-4">
            <h3>Add Lesson Schedules - <?= $schools->name ?></h3>-->
			
			
<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Add Lesson Schedule - <?= $schools->name ?></a>
						</h3>
					
					</div>
					
				</div>
			</div>
			<div class="col-md-12">
 <?php }else{ ?>
  <div class="col-md-9" id="app">
	<div class="row g-4 mb-4">
        
   <h2>Add Lesson Schedule - <?= $schools->name ?></h2>
   
 <?php } ?>
			
			
				<div id="msg"></div>
				
				 <?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/lesson_schedule' ;
				}else{
					 $cancelurl = base_url().'lesson_schedule/'.$schools->id;
				}  ?>
				
				<?php 
					if(!empty($lessons)){
						?>
						
					<form class="mb-5 form_class" method="POST" id="add_lessonSchedule" action="<?= site_url('lesson_schedule/save_data') ?>">
				
					<input type="hidden" name="school_id" id="school_id" value="<?= $schools->id ?>">
                    <div id="preItems">
						<div class="row addpre_option" style="margin-right: -140px;">
							<div class="col-md-2">
							<label class="form-label">Class Name</label>
							<select id="class_id"  name="class_id[1]"  class="form-control class_id" required>
								<option value='' >Select</option>
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
							
						<div class="mb-2 col-md-1 ">
                            <label for="first_name" class="form-label">Section</label>
                            <select class="form-control "  data-id="1" id="section_id-1" name="section_id[1]" >
                       
							</select>
                        </div>
						<div class="col-md-2">
                        <label class="form-label">Lessons</label>
                        <select id="lesson_id-1" name="lesson_id[1]" class="form-control" required >
                            <option value="">Select</option>
							<?php 
							/* if(!empty($lessons)){
								foreach ($lessons as $key => $value) {
								?>
								<option value="<?=  $value->lesson_id ?>"><?=  $value->lesson_name ?></option>
							<?php  
								}
							}else{
								echo ' <option>No classes found</option>';
							} */
							?>
							
                        </select>
                    </div>
						
						
						
							<div class="col-md-2">
								<label for="name" class="form-label">	From Date</label>
									<input type="date" name="from_date[1]"  required class="form-control" placeholder="Enter Option"  aria-label="Recipient's username" aria-describedby="basic-addon2">
									
							</div>
							<div class="col-md-2">
								<label for="name" class="form-label">	To Date</label>
									<input type="date" name="to_date[1]" required class="form-control" placeholder="Enter Option"  aria-label="Recipient's username" aria-describedby="basic-addon2">
									
							</div>
							<div class="col-md-1">
								<label for="name" class="form-label">	Day</label>
									<select id="week_day" name="week_day[1]" class="form-control" required >
										<option value="">Select</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
										<option value="Sunday">Sunday</option>
									</select>
							</div>
							
							
							
							<div class="col-md-1 m-t-25">
								<button type="button" class="btn  btn-success" id="addpre_option" style="margin-top: 28px;">
									<i class="bi bi-plus" ></i>
								</button>
								
							</div>
						</div>
					</div>
					
					

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= $cancelurl ?>" class="btn btn-outline-primary">Cancel</a>
                </form>


				
						<?php 
					}else{
						echo '<div class="alert alert-success"> <strong>To Add Schedule Please Assign atleast one lesson</strong></div>';
						
						
					}
				?>
			
               

            </div>
        </div>

    </div>

</div>
<script>

$(document).on('change', 'select', function (e) {
	const $this = $(this); // Cache $(this)
	const dataVal = $this.find(':selected').data('id'); // Get data value
	const selectedVal = $this[0].value;
//	alert(selectedVal);
	
	  var class_id = selectedVal;

	$("#section_id").html('');
	$("#lesson_id").html('');

	var sections_optns ='';
	var lesson_optns ='';

	if(class_id!=''){
		$.ajax({
			'url':"<?=base_url('students/getSections')?>",
			"data":{class_id:class_id},
			"type":"post",
			"success":function(res){
				console.log(res);
				var j = JSON.parse(res);
				if(j.sections_optns!=''){
					$("#section_id-"+dataVal).html(j.sections_optns);                         
				}
			}
		});
	}
	
	if(class_id!=''){
		$.ajax({
			'url':"<?=base_url('Lesson_schedule/ajGetLessons')?>",
			"data":{class_id:class_id},
			"type":"post",
			"success":function(res){
				console.log(res);
				var j = JSON.parse(res);
				if(j.lesson_optns!=''){
					$("#lesson_id-"+dataVal).html(j.lesson_optns);                         
				}
			}
		});
	}
	
	
	
	
	
	
	});



var count = 1
	$('#addpre_option').click(function(){
		count += 1;
			
		$('#preItems').append('<div class="row addpre_option" style="margin-right: -140px;"> <div class="col-md-2"> <label class="form-label">Class Name</label> <select required id="class_id"   name="class_id['+count+']" class="form-control" > <option value="">Select</option> <?php  if(!empty($classes)){ foreach ($classes as $key => $value) { ?> <option value="<?=  $value->c_id ?>" data-id="'+count+'"><?=  $value->class_name ?></option> <?php   } }else{ echo ' <option>No classes found</option>'; } ?> </select> </div> <div class="mb-3 col-md-1 "> <label for="first_name" class="form-label">Section</label>  <select class="form-control " id="section_id-'+count+'" data-id="'+count+'" name="section_id['+count+']" > </select>  </div> <div class="col-md-2">  <label class="form-label">Lessons</label> <select id="lesson_id-'+count+'" required name="lesson_id['+count+']" class="form-control" > <option value="">Select</option> </select> </div> <div class="col-md-2"> <label for="name" class="form-label">	From Date</label>  <input type="date" required name="from_date['+count+']" class="form-control" placeholder="Enter Option"  aria-label="" aria-describedby="basic-addon2">  </div> <div class="col-md-2"> <label for="name" class="form-label">	To Date</label>  <input type="date" required name="to_date['+count+']" class="form-control" placeholder="Enter Option"  aria-label="" aria-describedby="basic-addon2"> </div><div class="col-md-1"><label for="name" class="form-label">	Day</label><select id="week_day" name="week_day['+count+']" class="form-control" required ><option value="">Select</option> <option value="Monday">Monday</option> <option value="Tuesday">Tuesday</option> <option value="Wednesday">Wednesday</option> <option value="Thursday">Thursday</option> <option value="Friday">Friday</option> <option value="Saturday">Saturday</option> <option value="Sunday">Sunday</option> </select> </div> <span class="col-md-2 m-t-25 "><button type="button" class=" btn  btn-danger" style="margin-top: 28px;" id="delpreoption"> <i class="bi bi-file-minus" ></i> </button></span> </div>');		
		
	});
	
$(document).on("click", "#delpreoption", function(){ 

	 var delRowBtn = $(this);
	 var e = delRowBtn.attr('data');
	if(e==undefined){

		// $('#feedback').remove();
		 count--;
		delRowBtn.closest('div').remove();

	}
		return false; 
});
	
	
	
 $(document).on('change','#class_id2',function(){

	var class_id = $(this).val();

	$("#section_id").html('');

	var sections_optns ='';

	if(class_id!=''){

		$.ajax({

			'url':"<?=base_url('students/getSections')?>",

			"data":{class_id:class_id},

			"type":"post",

			"success":function(res){

				console.log(res);

				var j = JSON.parse(res);

				if(j.sections_optns!=''){

					$("#section_id").html(j.sections_optns);                         

				}


			}

		});

	}

}); 
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