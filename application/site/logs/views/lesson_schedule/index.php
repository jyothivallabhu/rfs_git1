

<!--<div class="col-md-9 " id="app">
   <div class="row g-4 mb-4">
	<h3>Lesson Schedule -  <?= $schools->name ?></h3>-->
		
			 <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Lesson Schedule - <?= $schools->name ?></a>
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
        
   <h2>Lesson Schedule - <?= $schools->name ?></h2>
   
 <?php } ?>
			
	
		<div id="msg"></div>
			
            <div class="card widget">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex gap-4 align-items-center">
                            <div class="d-md-flex gap-4 align-items-center">
                                <div class="mb-3 mb-md-0">
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <select class="form-control" onclick="searchFilter1()" id="sortby">
                                                <option>Sort by</option>
                                                <option value="desc">Desc</option>
                                                <option value="asc">Asc</option>
                                            </select>
                                        </div>
										
										<div class="col-md-3">
									<select class="form-control" onchange="searchFilter1()" id="lsclass_id">
										<option value=''>Class</option>
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
								
                                        <div class="col-md-3">
                                            <select class="form-control" onclick="searchFilter1()" id="perpage">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" name= "keyword" id="keyword" onkeyup ="searchFilter1()">
                                                <button class="btn btn-outline-light" type="button">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
								
								
								<?php 
						if(isset($this->school_id) && $this->school_id !=''){
							$urlid = '';
						}else{
							$urlid =$this->uri->segment(2);
						} ?>
						
						
							<div class="dropdown ms-auto">
								<a href="<?= base_url($_SESSION["login_session"]["url_slug"].'/lesson_schedule/add/'.$urlid) ?>">
									<button class="btn btn-outline-primary">
										<i class="bi bi-plus-circle me-2"></i> Add Lesson Schedule
									</button>
								</a>
							</div>
                            <input type="hidden" name="school_id" id="school_id" value="<?= $schools->id ?>">
                        </div>
                    </div>
                </div>
			<div class="table-responsive">
		 
			<table class="table table table-custom table-lg searchable" data-searching="true" data-paging="false">
				<thead>
					<tr>
						<th>Class </th>
						<th>Section</th>
						<th>Lesson Name</th>
						<th>From Dates</th>
						<th>To Dates</th>
						<th>Day</th>

					</tr>
				</thead>
				<tbody id="postList">
					<?php 
					if(!empty($lesson_schedules)){
						foreach($lesson_schedules as $le){
						
						 
						?>
						<tr>
						
							<td><?= $le->class_name ?></td>
							<td><?= $le->section_name ?> </td>
							<td><?= $le->lesson_name ?></td>
							<td><?= date('d/m/Y', strtotime($le->from_date)); ?></td>
							<td><?= date('d/m/Y', strtotime($le->to_date)) ?> </td>
							<td><?= $le->week_day ?></td>
							
							
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									    <!--<a href="<?php echo  base_url('lesson_schedule/edit/'.$le->lesson_id) ?>" class="dropdown-item">Edit</a>-->
									    
										<a  href="javascript:void(0);"  data-did="<?= $le->scheduled_lesson_id ?>" data-sid = "<?= $schools->id ?>" data-tbl="schools" data-ctrl="lesson_schedule"  class="dropdown-item text-danger delete_class">Delete</a>
										
									</div>
								</div>
							</td>



						</tr> <?php 
						}
					}else{
						echo 'No Records to display';
					}
						?>
				</tbody>
			</table>
			
			
		</div>


			
			
            <nav class="mt-5" aria-label="Page navigation example">	
				<div id="pagination"><?=$pagination?></div>
					<span id="showing_text"><?=$showing_text?></span>
            </nav>
        </div>
        
    </div>

    </div>
    <!-- ./ content -->
	
	<script>
	
	function searchFilter1(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var school_id         = $("#school_id").val();
		var sortby  = $( "#sortby option:selected" ).val();
		var perpage    = $( "#perpage option:selected" ).val();
		var class_id    = $( "#lsclass_id option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/lesson_schedule/ajaxPaginationData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,school_id:school_id,class_id:class_id},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#postList').html(res.html);
			}
		});
	}
	

</script>