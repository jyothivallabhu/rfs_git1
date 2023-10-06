
          
            <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			
				
		            <div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-body"> 
										<div class="col-md-4 col-lg-4">
										    <label for="inputState" class="form-label">Class</label>
									<select  class="form-control" id="selector">
                                          <option value="all">All</option>
                                          <option value="1">Class 1</option>
                                          <option value="2">Class 2</option>
                                          <option value="3">Class 3</option>
                                    </select>
                                    </div><br>
										<div id='calendar'>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
	         
			
			
			<div class="row">
				
				<div class="col-md-6 col-lg-6">
					<div class="card">
						<div class="card-body">
						
							<div class="">
							    <div class="d-flex align-items-center justify-content-between">
								<div class="media align-items-center">
								    
									<h5 class="m-b-0">
									    <a class="text-dark" href="">Teacher Trial</a>
									</h5>
									
								</div>
								<div class="dropdown dropdown-animated scale-left">
									<select id="trailClassId" class="form-control">
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
									</select>
									
								</div>
							    </div>
							</div>
							<div class="m-t-30">
								<div class="d-md-flex align-items-center justify-content-center d-none">
									<div class="media align-items-center m-r-80">
									    
									    <div>
										    <p class="m-b-0">Not Started</p>
										    <h2 class="m-b-0">
											<span>3057</span>
										    </h2>
										</div>
									</div>
									<div class="media align-items-center m-r-80">
										<div>
										    <p class="m-b-0">Submitted</p>
										    <h2 class="m-b-0">
											<span>3057</span>
										    </h2>
										</div>
									</div>
									<div class="media align-items-center m-v-5">
									    
										<div>
										    <p class="m-b-0">Approved</p>
										    <h2 class="m-b-0">
											<span>3057</span>
										    </h2>
										</div>
									</div>
								</div>
							</div>
						
							<div class="text-center m-t-20">
								<a href="" class="btn btn-primary text-center">
									
									<span class="m-l-5">Add Trial</span>
								</a>
							</div>	
						
						</div>
					</div>
				</div>
				
				<div class="col-md-6 col-lg-6">
					<div class="card">
						<div class="card-body">
						
							<div class="">
							    <div class="d-flex align-items-center justify-content-between">
								<div class="media align-items-center">
								    
									<h5 class="m-b-0">
									    <a class="text-dark" href="">Continuous Mentoring</a>
									</h5>
									
								</div>
								<div class="dropdown dropdown-animated scale-left">
									<select id="countiniousmentoringclassID" class="form-control">
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
									</select>
									
								</div>
							    </div>
							</div>
							
							<div class="m-t-30">
								<div class="d-md-flex align-items-center justify-content-center d-none">
									<div class="media align-items-center m-r-80">
									    
									    <div>
										    <p class="m-b-0">Submitted</p>
										    <h2 class="m-b-0">
											<span>3057</span>
										    </h2>
										</div>
									</div>
									
									<div class="media align-items-center m-v-5">
									    
										<div>
										    <p class="m-b-0">Feedback</p>
										    <h2 class="m-b-0">
											<span>3057</span>
										    </h2>
										</div>
									</div>
								</div>
							</div>
						
							<div class="text-center m-t-30">
								<a href="" class="btn btn-primary text-center">
									
									<span class="m-l-5">Upload</span>
								</a>
							</div>	
							
							
							
						</div>
							
					</div>
					
				</div>
				
			</div>
			
			
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
					
					<div class="card">
						<div class="card-body">
							
							<div class="d-flex justify-content-between align-items-center m-b-10">
								<h5>Lessons</h5>
								<div class="d-flex">
									<div class="m-r-15">
										<select id="lessonsClass_id" class="form-control">
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
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											
											<th>Lesson</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tbody id="lessonslist">
									
										<?php
											if ($lessons['num'] > 0) {
											foreach($lessons['data'] as $lessons)
											{
											?>
											 <!--<option value="<?php echo $lessons['lesson_id']  ;?>"><?php echo $lessons['lesson_name'];?></option>-->
											<tr>
										   
										    <td>
											<h5 class="m-b-0"><?php echo $lessons['lesson_name'];?></h5>
										    </td>
										  
										    <td>
											<a href="#" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
										    </td>
										</tr>
											<?php
											}
											}else{
												echo ' No Lessons Data Found';
											}
											?>
										
										
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="col-md-12 col-lg-12">
					
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-center m-b-10">
								<h5>Artwork</h5>
								<div class="d-flex">
								<div class="m-r-15">
										<select id="artworkClass_id" class="form-control">
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
									<div >
										<select id="artworkLessonId" class="form-control">
											<option value=""> Lessons</option>
											<?php
											if ($lessons['num'] > 0) {
											foreach($lessons['data'] as $lessons)
											{
											?>
											 <option value="<?php echo $lessons['lesson_id']  ;?>"><?php echo $lessons['lesson_name'];?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Lessons Data Found</option>';
											}
											?>
										</select>
									</div>	
									
									
								</div>
				
							</div>
							
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Artwork</th>
											<th>Lesson</th>
											<th>Class</th>
											<th>Action</th>
											
										</tr>
									</thead>
									<tbody id="artworksList">
										
										<tr>
											<td>
												<img class="img-fluid rounded" src="assets/images/others/thumb-9.jpg" style="max-width: 60px" alt="">
											</td>
											
											<td>
											<h5 class="m-b-0">Not a box</h5>
										    </td>
										  
										   
										     <td>
											<span class="badge badge-pill badge-blue font-size-12">VI Class - Section A</span>
										    </td>
										   
										    <td>
											<a href="#" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
										    </td>
										</tr>
										
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
			</div>
	        </div>
                <!-- Content Wrapper END -->

         <script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      //initialDate: '2020-09-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: false,
      selectable: true,
       eventDidMount: function(arg) {
      let val = selector.value;
      if (!(val == arg.event.extendedProps.class || val == "all")) {
        arg.el.style.display = "none";
      }
    },
	    events: function (fetchInfo, successCallback, failureCallback) {
      successCallback([	<?php  foreach ($calendar_schedule_date as $v) { ?>
					{
					  title: '<?=$v->class_name;?> - <?=$v->section_name;?> - <?=$v->lesson_name;?> ',
					  start: '<?=date('Y-m-d', strtotime($v->from_date))?>',
				      end: '<?=date('Y-m-d', strtotime($v->to_date. " +1 days"))?>',
					  "class": "<?=$v->class_id;?>"
					},
				<?php } ?>]);
    }
      
    });

    calendar.render();
     selector.addEventListener('change', function() {
    calendar.refetchEvents();
  });
  });

</script>
<style>


  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
    
    