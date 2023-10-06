
          
            <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			
				<div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget" style="padding: 25px;">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Analytical Reports</h5>
                </div>
					<div class="row">
					 <div class="row col-12">
							<div class="form-group col-md-4 mb-3">
								<select id="report_type" name="report_type" class="form-select">
									<option value="">Select Report Type</option>
									<!--<option value="user_base_report">User base Report</option>
									<option value="">School Report</option>	
									<option value="">Other Custom Reports</option>
									<option value="artwork_report">Artwork Report</option>	
									<option value="lesson_library">Lesson Library Report</option>	
									<option value="escalation_report">Escalation Reports</option> -->
									
									<option value="usage_tracking">Usage Tracking Report</option>	
									<option value="grade_report">Grade Report</option>	
									<option value="feedback">Feedback Reports</option>	
										
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
									</select>
									</div>
									<input type="hidden"  value="<?= $schools->id ?>" id="school_id" name="school_id" class="form-select">
										  
									<div class="col-md-4 mb-3">
									<select id="school_teachers" name="school_teachers" class="form-select">
										<option value="">Select Teacher</option> 
											<?php
											if (!empty($teachers)) {
											foreach($teachers as $key => $value)
											{
											?>
											 <option value="<?php echo $value->id   ;?>"><?php echo $value->first_name.' '.$value->last_name;?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Data Found</option>';
											}
											?>
										
									</select>
									</div>
									<div class="col-md-4 mb-3">
									<select id="class_id" name="class_id" class="form-select">
										<option value="">Classes</option> 
											<?php
											if ($classes['num'] > 0) {
											foreach($classes['data'] as $class)
											{
											?>
											 <option value="<?php echo $class['c_id']  ;?>"><?php echo $class['class_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Class Data Found</option>';
											}
											?>
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
										<input type="hidden"  value="<?= $schools->id ?>" id="track_school_id" name="school_id" class="form-select">
											 
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
											<input type="hidden"  value="<?= $schools->id ?>" id="lesson_library_school_id" name="school_id" class="form-select">
											 
										</div>
										<div class="col-md-4 mb-3">
										<select id="lesson_library_class_id" name="class_id" class="form-select">
											<option value=""> Class</option>
											<?php
											if ($classes['num'] > 0) {
											foreach($classes['data'] as $class)
											{
											?>
											 <option value="<?php echo $class['c_id']  ;?>"><?php echo $class['class_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Class Data Found</option>';
											}
											?>
										</select>
										</div>
									</div>
								</div>
								
								<div id="artwork_report">
									<div class="row col-12">
										<div class="mb-3 col-4">
											<input type="hidden"  value="<?= $schools->id ?>" id="artwork_school_id" name="school_id" class="form-select">
											 
										</div>
										<div class="col-md-4 mb-3">
										<select id="artwork_class_id" name="class_id" class="form-select">
											<option value=""> Class</option>
											<?php
											if ($classes['num'] > 0) {
											foreach($classes['data'] as $class)
											{
											?>
											 <option value="<?php echo $class['c_id']  ;?>"><?php echo $class['class_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Class Data Found</option>';
											}
											?>
										</select>
										</div>
									</div>
								</div>
								
								<div id="grade_report">
								<input type="hidden"  value="<?= $schools->id ?>" id="grade_school_id" name="school_id" class="form-select">
									<div class="row col-12">
											
											 
										<div class="col-md-4 mb-3">
										<select id="grade_class_id" name="class_id" class="form-select">
											<option value=""> Class</option>
											<?php
											if ($classes['num'] > 0) {
											foreach($classes['data'] as $class)
											{
											?>
											 <option value="<?php echo $class['c_id']  ;?>"><?php echo $class['class_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Class Data Found</option>';
											}
											?>
										</select>
										</div>
										<div class="col-md-4 mb-3">
										<select id="grade_term" name="class_id" class="form-select">
											<option value="">Term</option>
											<?php
											if (!empty($exam_types)) {
											foreach($exam_types as $key => $value)
											{
											?>
											 <option value="<?php echo $value->id   ;?>"><?php echo $value->exam_name ?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Data Found</option>';
											}
											?>
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
                <!-- Content Wrapper END -->

         <script>

  

</script>
<style>
.form-select {
    display: block;
    width: 100%;
    padding: 0.675rem 2.25rem 0.675rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    vertical-align: middle;
    background-color: #fff;
    background-image: url(data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3E%3C/svg%3E);
    background-repeat: no-repeat;
    background-position: right 1.25rem center;
    background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: 0.5rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
    
    