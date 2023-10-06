<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-12 col-md-12">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <a href="<?= base_url() ?>"><h5 class="card-title" style="color: black;">Dashboard</h5></a>
                </div>
               

                <div class="row">
					<div class="col-md-12">
							<?php if($_SESSION['login_session']['role_id']== '1'){ ?>	
						<div class="row g-4 mb-4">
							<div class="col-md-3">
								<div class="card bg-cyan text-white-90">
									<div class="card-body d-flex align-items-center">
										<i class="bi bi-people-fill display-7 me-3"></i>
										<a href="<?= base_url('users') ?>" class="text-white">
											<h4 class="mb-0"><?= $portfolioUsers  ?></h4>
											<span>Admins </span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card bg-purple text-white-90">
									<div class="card-body d-flex align-items-center">
										<i class="bi bi-person-circle display-7 me-3"></i>
										<a href="<?= base_url('mentors') ?>" class="text-white">
											<h4 class="mb-0"><?= $mentorscount ?></h4>
											<span>Mentors </span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card bg-teal text-white-90">
									<div class="card-body d-flex align-items-center">
										<i class="bi bi-house-door display-7 me-3"></i>
										<a href="<?= base_url('schools') ?>" class="text-white">
											<h4 class="mb-0"><?= $schoolscount ?></h4>
											<span>Schools </span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card bg-cyan text-white-90">
									<div class="card-body d-flex align-items-center">
										<i class="bi bi-person-lines-fill display-7 me-3"></i>
										<div>
										<a href="<?= base_url('allparent') ?>" class="text-white">
											<h4 class="mb-0"><?= $parentscount ?></h4>
											<span>Parents </span>
										</a>
										</div>
									</div>
								</div>
							</div>
							<?php }else if($_SESSION['login_session']['role_id']== '5'){
								?>
								<div class="col-md-3">
								<div class="card bg-teal text-white-90">
									<div class="card-body d-flex align-items-center">
										<i class="bi bi-house-door display-7 me-3"></i>
										<a href="<?= base_url('schools') ?>" class="text-white">
											<h4 class="mb-0"><?= $schoolscount ?></h4>
											<span>Schools </span>
										</a>
									</div>
								</div>
							</div>
								<?php
							}else{
								?>
								
								<?php
							} ?>
							
						</div>		
					 </div>
				</div>
				
		<div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget" style="padding: 25px;">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Analytical Reports</h5>
                </div>
					<div class="row">
					 <div class="form-row">
							<div class="form-group col-md-4 mb-3">
								<select id="report_type" name="report_type" class="form-select">
									<option value="">Select Report Type</option>
									<!--<option value="user_base_report">User base Report</option>
									<option value="">School Report</option>	
									<option value="">Other Custom Reports</option>	-->
									<option value="usage_tracking">Usage Tracking Report</option>	
									<option value="lesson_library">Lesson Library Report</option>	
									<option value="grade_report">Grade Report</option>	
									<option value="artwork_report">Artwork Report</option>	
									<option value="feedback">Feedback Reports</option>	
									<option value="escalation_report">Escalation Reports</option>	
								</select>
							</div>
							</div>
							</div>
							<div id="feedbackDiv">
								<div class="row col-12">
									<div class="mb-3 col-4">
									<select id="feedbackfor" name="feedbackfor" class="form-select">
										<option value="">Select Option</option>
										<option value="trail">Teacher Trial</option>
										<option value="mentoring">Continious Mentoring</option>
										<option value="monthlymentoring">Monthly Mentoring</option>
									</select>
									</div>
									<div class="mb-3 col-4">
									<select id="school_id" name="school_id" class="form-select">
										<option value="">Select School</option>
										<?php
										if(!empty($schools)){
											foreach ($schools as $key => $value) {
												echo '<option value="'.$value->id.'">'.$value->name.'</option>';
											}
										}
										?>
										
									</select>
									</div>
									<div class="col-md-4 mb-3">
									<select id="school_teachers" name="school_teachers" class="form-select">
										<option value="">Select Teacher</option>
									</select>
									</div>
									<div class="col-md-4 mb-3">
									<select id="class_id" name="class_id" class="form-select">
										<option value="">Classes</option>
									</select>
									</div>
									<div class="col-md-4 mb-3">
									<select id="feedback_status" name="feedback_status" class="form-select">
										<option value="">Select Status</option>
										<option value="0">Pending</option>
										<option value="1">Completed</option>
									</select>
									</div>
									</div>
								</div>
								<div id="escalationDiv">
									<div class="row col-12">
										<div class="mb-3 col-4">
										<select id="esfeedbackfor" name="feedbackfor" class="form-select">
											<option value="">Select Option</option>
											<option value="trail">Teacher Trial</option>
											<option value="mentoring">Continious Mentoring</option>
										</select>
										</div>
										
									</div>
								</div>
									
								<div id="usage_tracking">
									<div class="row col-12">
										<div class="mb-3 col-4">
											<select id="track_school_id" name="school_id" class="form-select">
											<option value="">Select School</option>
											<?php
											if(!empty($schools)){
												foreach ($schools as $key => $value) {
													echo '<option value="'.$value->id.'">'.$value->name.'</option>';
												}
											}
											?>
											</select>
										</div>
										<div class="col-md-4 mb-3">
										<select id="school_roles" name="school_roles" class="form-select">
											<option value="">Select Role</option>
											<option value="10">Teachers</option>
											<option value="4">Admin</option>
											<option value="9">Management</option>
											<option value="8">Parent</option>
										</select>
										</div>
									</div>
								</div>
								<div id="lesson_library">
									<div class="row col-12">
										<div class="mb-3 col-4">
											<select id="lesson_library_school_id" name="school_id" class="form-select">
											<option value="">Select School</option>
											<?php
											if(!empty($schools)){
												foreach ($schools as $key => $value) {
													echo '<option value="'.$value->id.'">'.$value->name.'</option>';
												}
											}
											?>
											</select>
										</div>
										<div class="col-md-4 mb-3">
										<select id="lesson_library_class_id" name="class_id" class="form-select">
											<option value="">Classes</option>
										</select>
										</div>
									</div>
								</div>
								
								<div id="artwork_report">
									<div class="row col-12">
										<div class="mb-3 col-4">
											<select id="artwork_school_id" name="school_id" class="form-select">
											<option value="">Select School</option>
											<?php
											if(!empty($schools)){
												foreach ($schools as $key => $value) {
													echo '<option value="'.$value->id.'">'.$value->name.'</option>';
												}
											}
											?>
											</select>
										</div>
										<div class="col-md-4 mb-3">
										<select id="artwork_class_id" name="class_id" class="form-select">
											<option value="">Classes</option>
										</select>
										</div>
									</div>
								</div>
								
								<div id="grade_report">
									<div class="row col-12">
										<div class="mb-3 col-4">
											<select id="grade_school_id" name="school_id" class="form-select">
											<option value="">Select School</option>
											<?php
											if(!empty($schools)){
												foreach ($schools as $key => $value) {
													echo '<option value="'.$value->id.'">'.$value->name.'</option>';
												}
											}
											?>
											</select>
										</div>
										<div class="col-md-4 mb-3">
										<select id="grade_class_id" name="class_id" class="form-select">
											<option value="">Classes</option>
										</select>
										</div>
										<div class="col-md-4 mb-3">
										<select id="grade_term" name="class_id" class="form-select">
											<option value="">Term</option>
											
										</select>
										</div>
										<div class="col-md-4 mb-3">
										<select id="grade_report_type" name="class_id" class="form-select">
											<option value="">Grade Report Type</option>
											<option value="only_grade">Only Grade</option>
											<option value="grade_with_lesson">Grade With Lesson Details</option>
											<option value="grade_with_lesson_teacher_comments">Grade With Lesson Details and Teacher Comments</option>
										</select>
										</div>
										
										
										
									</div>
								</div>
								
									
								<div id="reportrange" class="form-group col-md-6 mb-3" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;"><i class="bi bi-calendar-event"></i> <span></span> <b class="caret"></b>  </div>
								<input type="hidden" name="from" id="from" value="">
								<input type="hidden" name="to" id="to" value="">
									<script type="text/javascript">
								   $(document).ready(function() {
									   
									  $('#reportrange').daterangepicker(
										 {
											startDate: moment().subtract('days', 29),
											endDate: moment(),      
											showDropdowns: true,
											showWeekNumbers: true,
											timePicker: false,
											timePickerIncrement: 1,
											timePicker12Hour: true,
											ranges: {
											   'Today': [moment(), moment()],
											   'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
											   'Last 7 Days': [moment().subtract('days', 6), moment()],
											   'Last 30 Days': [moment().subtract('days', 29), moment()],
											   'This Month': [moment().startOf('month'), moment().endOf('month')],
											   'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
											},
											opens: 'left',
											buttonClasses: ['btn btn-default'],
											applyClass: 'btn-small btn-primary',
											cancelClass: 'btn-small',
											format: 'MM/DD/YYYY',
											separator: ' to ',
											locale: {
												applyLabel: 'Apply',
												fromLabel: 'From',
												toLabel: 'To',
												customRangeLabel: 'Custom Range',
												daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
												monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
												firstDay: 1
											}
										 },
										 function(start, end) {
										  console.log("Callback has been called!");
										  $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
											$('#from').val(start.format('YYYY-MM-DD'));
											$('#to').val(end.format('YYYY-MM-DD'));
										 }
									  );
									  //Set the initial state of the picker label
									  $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
									  $('#from').val(moment().subtract('days', 29).format('YYYY-MM-DD'));
									  $('#to').val(moment().format('YYYY-MM-DD'));
								   });
								   </script>
								<div class="form-group  col-md-2 mb-3">
									<button class="btn btn-success getData" type="button"><i class="fa fa-refresh fa-fw"></i> Get Result</button>
								</div>
							
							
							<div class="col-sm-12">
								
								<?php
									/* if($this->session->flashdata('success')){
								?>
									<div class="alert alert-success alert-dismissible fade in" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									  <strong><?=$this->session->flashdata('success')?></strong>
									</div>
								<?php
									}
									if($this->session->flashdata('invalid')){
								?>
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									  <strong><?=$this->session->flashdata('invalid')?></strong>
									</div>
								<?php
									} */
								?>
								<div class="card-box table-responsive">

									<!--<h4 class="m-t-0 header-title"><b>Report</b></h4>-->
									
									<p class="text-muted font-13 m-b-30">
									   
									</p>
									<div class="repStats">
										
									</div>
																		
													 
									
								</div>
							</div>
							
						</div>
						
						</div>


           <!-- content -->




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


		   </div>
        </div>
    </div>
</div>

<!--<style>
a {
    color: #fff !important;
}
</style>-->
<!-- ./ content -->