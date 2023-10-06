<!--div class="col-md-9">
   <div class="row g-4 mb-4">
	<h3>Lessons Assigned</h3>
	
	<div class="msg"></div>
			-->
		
<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
								
								<!-- Content Wrapper START -->
								<div class="main-content">
						
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> Lessons Assigned - <?= $schools->name ?></a>
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
				   <h2>Lessons Assigned - <?= $schools->name ?></h2>
				   
				 <?php } ?>
			<div id="msg"></div>		
			
            <div class="card widget">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex gap-4 align-items-center">
                            <div class="d-md-flex gap-4 align-items-center">
                                <div class="mb-3 mb-md-0">
                                    <div class="row g-3">
                                        <!--<div class="col-md-3">
                                            <select class="form-control" onchange="searchFilter1()" id="sortby">
                                                <option value="">Sort by</option>
                                                <option value="desc">Desc</option>
                                                <option value="asc">Asc</option>
                                            </select>
                                        </div>-->
                                        <div class="col-md-3">
                                            <select class="form-control" onchange="searchFilter1()" id="perpage">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
										 <div class="col-md-4">
                                            <select class="form-control" onchange="searchFilter1()" id="assignedclass_id">
                                               <option value="">Select Grade</option>
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
										
										
                                        <div class="col-md-4">
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
							<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
							<?php  
							if(isset($_SESSION['login_session']['school_id'])) {
								$addurl = $_SESSION['login_session']['url_slug'].'/assign_lessons/add' ;
								
							}else{
								 $addurl = 'assign_lessons/add/'.$schools->id;
								 
								 ?>
								<div class="dropdown ms-auto">
									<a href="<?= base_url($addurl) ?>">
										<button class="btn btn-outline-primary">
											<i class="bi bi-plus-circle me-2"></i> Assign Lesson
										</button>
									</a>
								</div>
								<?php
							}
							//}
							?>
						
						
						
                            
                        </div>
                    </div>
                </div>
				<!--<input type="hidden" name="assigned_id" id="assigned_id" value="<?= $a_id ?>">-->
							<input type="hidden" name="school_id" id="school_id" value="<?= $schools->id ?>">
			<div class="table-responsive">
		 
		 
			<table class="table table table-custom table-lg searchable" data-searching="true" data-paging="false">
				<thead>
					<tr>
						<th>Select Grade</th>
						<th>Lesson Name</th>
						<th>Medium</th>

					</tr>
				</thead>
				<tbody id="postList">
					<?php 
					
						/* $user_modules = array();
						if(!empty($la)){
							$user_modules = explode(',', $la[0]->lesson_id);
						} */
						
					if(!empty($lessons)){
						foreach($lessons as $le){
						
						$checked = '';
						 
						 $assigned = $this->admin->get_lessons_assigned($schools->id, $le->lesson_id);
						
						 if(!empty($assigned )){
							$assignedlesson_id = $assigned[0]->lesson_id;
							$class_id = $assigned[0]->class_id;
							$a_id = $assigned[0]->id;
						 }else{							 
							$assignedlesson_id = '';
							$class_id = '';
							$a_id = '';
						 }
						?>
						<tr>
						<!--<td id="options"> 
							<input required type="checkbox" name="lesson_ids[]" <?= ($le->lesson_id  == $assignedlesson_id ) ?  'checked' : '' ?> value="<?= $le->lesson_id ?>" class="form-check-input" id="exampleCheck" value="">
						</td>
						<td><div class="form-group">
							<select id="class_id" name="class_id[]" class="form-select">
								<option selected="">Please Select</option>
									<?php
										if(!empty($classes)){
											foreach($classes as $key => $c){
												
									?>
										<option value="<?=$c->c_id?>" <?= ($c->c_id  == $class_id ) ?  'selected' : '' ?>><?=$c->class_name?></option>
									<?php			
											}
										
										}
									?>
							</select>
						</div>	</td>-->
							
							<td><?= $le->class_name ?></td>
							<td><?= $le->lesson_name ?></td>
							<td><?= $le->medium ?></td>
							<?php  
							if(isset($_SESSION['login_session']['school_id'])) {
								$url = $_SESSION['login_session']['url_slug'].'/view_lesson/'.$le->lesson_id ;
							}else{
								 $url = 'lessons/view_lesson/'.$le->lesson_id;
							}  ?>
						
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									    <a href="<?php echo  base_url().$url ?>" class="dropdown-item">View</a>
										<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
										<a  href="javascript:void(0);"  data-did="<?= $le->lesson_assignId ?>" data-tbl="lessons_assigned" data-ctrl="assign_lessons"  data-sid = "<?=$schools->id ?>" class="dropdown-item text-danger delete_class">Delete</a>
										<?php //} ?>
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

	<script>
	
	function searchFilter1(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var school_id         = $("#school_id").val();
		var sortby  = $( "#sortby option:selected" ).val();
		var perpage    = $( "#perpage option:selected" ).val();
		var class_id    = $( "#assignedclass_id option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/assign_lessons/ajaxPaginationData/")?>'+page_num,
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