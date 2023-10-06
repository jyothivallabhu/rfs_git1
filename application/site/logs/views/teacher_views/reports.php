
           <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
				    <div class="col-md-4">
					<div class="media m-v-10">
						<a href="<?=base_url()?>">
						    <div class="avatar avatar-blue avatar-icon avatar-square">
							<i class="anticon anticon-arrow-left"></i>
						    </div>
						</a>
					</div>
				    </div>
					<div class="col-md-4 text-center">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);"> Grade Reports</a>
						</h3>
					
					</div>
				   
				</div>
			</div>
			
		    
			<div class="row">
				
				
				<div class="col-md-8 col-lg-8 offset-lg-2">
					<div class="card">
						<div class="card-body">
						
							<input type="hidden" id="report_type" name="report_type" value="grade_report" class="form-select">
							<input type="hidden" id="school_id" name="school_id" value="<?= $this->school_id ?>" class="form-select">
							 <?php $this->load->view('include/msgs'); ?>
							 <!--<div id="msg"></div>-->
								<div class="form-group">
										<label for="inputState" class="form-label">Class</label>
										 <select name="class_id" id="sclass_id" class="form-control  valid" required>
											<option value = '' selected="">Select Class</option>
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
									
									<div class="form-group">
										<label for="first_name" class="form-label">Section</label>
										<select class="form-control  valid"  data-id="1" id="gsection_id" name="section_id" >
								   
										</select>
									</div>
									<!--<div class="form-group ">
										<label for="first_name" class="form-label">Lesson</label>
										<select class="form-control  valid"  data-id="1" id="lesson_id" name="lesson_id" >
								   
										</select>
									</div>-->
									
									<div class="form-group">
										<label for="exam_type" class="form-label">Exam Types</label>
										<select class="form-control  valid"  data-id="1" id="exam_type" required name="exam_type" >
										<option value = '' selected="">Select Exam Types</option>
										<?php
											if ($exam_types['num'] > 0) {
											foreach($exam_types['data'] as $exam_type)
											{
											?>
											 <option value="<?php echo $exam_type['id']  ;?>"><?php echo $exam_type['exam_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Exam Data Found</option>';
											}
											?>
										</select>
									</div>
						
								<div class="form-group">
										<label for="grade_report_type" class="form-label">Report Types</label>
										<select class="form-control  valid"  data-id="1" id="grade_report_type" required name="grade_report_type" >
										<option value = '' selected="">Select Report Types</option>
										<option value = 'only_grade' >Only Grade</option>
										<option value = 'grade_with_lesson' >Grade With Lesson Details</option>
										<option value = 'grade_with_lesson_teacher_comments' >Grade With Lesson Details and Teacher Comments</option>
										
										</select>
									</div>
						
								
								
								
							<div class="form-group col-md-6 mb-3">
							<label for="first_name" class="form-label">Select Date Range</label>
							<div id="reportrange" class="form-control " ><i class="bi bi-calendar-event"></i> <span></span> <b class="caret"></b>  </div>
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
									<br></br>
									
									<div class="form-group  col-md-6 mb-3">
									<button class="btn btn-success getData" type="button"><i class="fa fa-refresh fa-fw"></i> Get Result</button>
								</div>
								</div>
							
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
				</div>
				
				
			</div>
		    
		 
		  
	       </div>
                <!-- Content Wrapper END -->

            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>   
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5> 
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

          
        </div>
    </div>

    