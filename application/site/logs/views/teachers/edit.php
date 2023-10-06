<!--<div class="col-md-9" id="app">
   <div class="row g-4 mb-4">
   
    <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Edit School Teacher</h5>
                </div>-->
   
   <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);">Edit Teacher - <?= $schools->name ?></a>
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
				   
				    <div class="card widget">
					<div class="card-header d-flex align-items-center justify-content-between">
						<h5 class="card-title">Edit School Teacher - <?= $schools->name ?></h5>
					</div>
				   
				 <?php } ?>
				 
				 <div id="msg"> </div>
				 
				 <div class="card widget">
					<div class="card-header d-flex align-items-center justify-content-between">
						<h5 class="card-title">Edit </h5>
					</div>
           
				<?php  
				if(isset($_SESSION['login_session']['school_id'])) {
					$cancelurl = base_url().$_SESSION['login_session']['url_slug'].'/teachers' ;
				}else{
					 $cancelurl = base_url().'teachers/'.$schools->id;
				}  ?>
				
				
                <div id="msg"> </div>
                <form class="mb-5 mt-5 form_class pl-5 pr-5" id="edit_schoolteachers" method="POST" action="<?= site_url('teachers/update_school_teacher/').$mentor->user_id ?>">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="hidden" value="<?= $mentor->school_id ?>" class="form-control" name="school_id" id="first_name" required>
                            <input type="text" value="<?= $mentor->first_name ?>" class="form-control " name="first_name" id="first_name" required <?= ($mentor->tstatus== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" value="<?= $mentor->last_name ?>" class="form-control lettersonly" name="last_name" id="last_name" required <?= ($mentor->tstatus== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" value="<?= $mentor->email ?>" class="form-control lettersonly" name="email" id="email" required <?= ($mentor->tstatus== '0') ?  'readonly' : '' ?>>

                        </div>
                        <div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" value="<?= $mentor->phone ?>" class="form-control" name="phone" id="phone"  onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="10" <?= ($mentor->tstatus== '0') ?  'readonly' : '' ?>>
                        </div>
						
						<div class="mb-3 col-6">
                            <label for="profile_pic" class="form-label">Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic"  <?= ($mentor->status== '0') ?  'disabled' : '' ?>>
							<img src="<?= $mentor->image_path ;?>" height="60" width="60" style="margin-top: 8px;" /> 
						</div>
						
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-control" name="status">
								<option value="1" <?php if($mentor->tstatus=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($mentor->tstatus=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>
						
						
						 <div class="mb-3  col-6 options"> Modules <br><br>
                            <?php $user_modules = explode(',', $mentor->modules);
                            foreach ($modules as $key => $value) { ?>
                                <input <?= (in_array($value->id, $user_modules)) ?  'checked' : '' ?> <?= ($mentor->tstatus== '0') ?  'disabled' : '' ?> required style="margin-left: 2px;" type="checkbox" name="modules[]" class="form-check-input modules" id="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>">
                                <label class="form-check-label" style="width: 16%;margin-left: 24px;" for="exampleCheck<?= $value->id ?>" value="<?= $value->id ?>"><?= $value->name ?></label>
                            <?php } ?>

                        </div>
						
						
						
						
						<!--<div class="mb-3  col-12 options"> Assign Grade <br>
							<div class="tree_main pl-5">
							<ul >
							<li >
								<input type="checkbox" class="form-check-input" name="select_all" id="select-all"  value="" /> <label for="select-all">Select All Classes</label>
								
								<ul id="bs_main" class="main_ul">
									 <?php foreach ($classes as $key => $value) {
										
									?>
									<li id="bs_2">
									
									<?php 
										$sections= $this->Admin_model->get_sectionsByClassID($value->c_id);
										$sections['num'];
										if($sections['num'] > 0){	
										$class_id= explode(',', $mentor->class_id);
										?>
										<input type="checkbox" id="checkAll"  name="class_ids[]" value="<?= $value->c_id ?>" <?= (in_array($value->c_id, $class_id)) ?  'checked' : '' ?> class="form-check-input"> <span><?=  $value->class_name ?></span> - &nbsp;&nbsp;&nbsp;
										
										<ul id="bs_l_2"  class="sub_ul">
										<?php
										
										$section_id= explode(',', $mentor->section_ids);
										
										foreach ($sections['data'] as $value2) {  ?>
											<span id="bf_3" class="options2">
											<li id="bs_2">
												<input type="checkbox"  class="checkbox form-check-input" required <?= (in_array($value2['section_id'], $section_id)) ?  'checked' : '' ?> name="section_ids[]" <?= ($mentor->tstatus== '0') ?  'disabled' : '' ?>  value="<?= $value2['section_id'] ?>" id="c_bf_3" /> <span><?= $value2['section_name'] ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
												</li>
											</span>
										<?php } ?>
										</ul>
									 <?php }
									 }
									 ?>
									</li>
								</ul>
								</li>
								</ul>
							</div>
						</div>-->
						
						<div class="mb-3  col-12 options"><label for="" class="form-label"> Assign Grade</label> <br>
							<div class="tree_main pl-5">
							
							<input type="checkbox" class="form-check-input" <?= ($mentor->select_all == 1) ?  'checked' : '' ?>  name="select_all" id="select-all"  value="1" /> <label for="select-all">Select All Classes</label>
							<ul id="bs_main" class="main_ul">
								 <?php 
								 $i=0;
								 foreach ($classes as $key => $value) {
									
								?>
								<li  id="bs_2">
								<?php 
									$sections= $this->Admin_model->get_sectionsByClassID($value->c_id);
									$sections['num'];
									if($sections['num'] > 0){
									$class_id= explode(',', $mentor->class_id);	
									?>
									<input type="checkbox" id="checkAll"  name="class_ids[]" value="<?= $value->c_id ?>"  <?= (in_array($value->c_id, $class_id)) ?  'checked' : '' ?> class="form-check-input"> <span><?=  $value->class_name ?></span>&nbsp;&nbsp;&nbsp;
									
									<ul id="bs_l_2"  class="sub_ul ">
									<?php 
									$section_id= explode(',', $mentor->section_ids);
									foreach ($sections['data'] as $value2) { 
									?>
										<span id="bf_3" class="options2">
										<li id="bs_2">
											<input type="checkbox" class="form-check-input"  required  name="section_ids[]"  value="<?= $value2['section_id'] ?>" <?= (in_array($value2['section_id'], $section_id)) ?  'checked' : '' ?>   id="c_bf_3" />&nbsp; <span><?= $value2['section_name'] ?></span> &nbsp;&nbsp;&nbsp;&nbsp;
											</li>
										</span>
									<?php } ?>
									</ul>
								 <?php }
								 $i++;
								 }
								 ?>
								</li>
							</ul>
						</div>
					</div>
						

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= $cancelurl  ?>" class="btn btn-outline-primary">Cancel</a>
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
	
	var requiredCheckboxes2 = $('.options2 :checkbox[required]');
    requiredCheckboxes2.change(function(){
        if(requiredCheckboxes2.is(':checked')) {
            requiredCheckboxes2.removeAttr('required');
        } else {
            requiredCheckboxes2.attr('required', 'required');
        }
    });
});

$('#select-all').click(function(event) {  
    if(this.checked) {
        // Iterate each checkbox
        $('.options2 input[type="checkbox"]').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.options2 input[type="checkbox"]').each(function() {
            this.checked = false;                       
        });
    } 
}); 
$('.tree_main input[type="checkbox"]').change(function(e) {
	if(this.checked) {
        // Iterate each checkbox
        $('.tree_main input[type="checkbox"]').each(function() {
           $('.tree_main').find('#select-all').prop('checked',true);                       
        });
    } else {
        $('.tree_main input[type="checkbox"]').each(function() {
             $('.tree_main').find('#select-all').prop('checked',false);                          
        });
    } 
});


$('.tree_main input[type="checkbox"]').change(function(e) {

  var checked = $(this).prop("checked"),
      container = $(this).parent(),
      siblings = container.siblings();

  container.find('input[type="checkbox"]').prop({
   // indeterminate: false,
    checked: checked
  });

  function checkSiblings(el) {

    var parent = el.parent().parent(),
        all = true;

    el.siblings().each(function() {
      let returnValue = all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
      return returnValue;
    });
    
    if (all && checked) {

      parent.children('input[type="checkbox"]').prop({
       // indeterminate: false,
        checked: checked
      });

      checkSiblings(parent);

    } else if (all && !checked) {

      parent.children('input[type="checkbox"]').prop("checked", checked);
      parent.children('input[type="checkbox"]').prop("checked", (parent.find('input[type="checkbox"]:checked').length > 0));
      checkSiblings(parent);

    } else {

      el.parents("li").children('input[type="checkbox"]').prop({
        //indeterminate: true,
        checked: true
      });

    }

  }

  checkSiblings(container);
});

</script>
