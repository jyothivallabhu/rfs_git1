<!--<div class="col-md-9">
   <div class="row g-4 mb-4">
	<h3>Artwork  - <?= $schools->name ?></h3>-->
	
	<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Artwork - <?= $schools->name ?></a>
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
        
   <h2>Artwork - <?= $schools->name ?></h2>
   
 <?php } ?>
	
	<div id="msg">
	</div>
	
	
	
	<div class="card widget" id="app">
		<div class="card">
			<div class="card-body">
				<div class="align-items-center">
					<div class="align-items-center">
						<div class="mb-3 mb-md-0">
							<div class="row g-3">
								
								<div class="col-md-2">
									<select class="form-control" onchange="searchFilter1()" id="sortby">
										<option>Sort by</option>
										<option value="desc">Desc</option>
										<option value="asc">Asc</option>
									</select>
								</div>
								
								
								<div class="col-md-2">
									<select class="form-control" onchange="searchFilter1()" id="perpage">
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
										<option value="40">40</option>
										<option value="50">50</option>
									</select>
								</div>								
								<input type="hidden" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2")  ?>" name= "school_id" id="school_id" >	

								<div class="col-md-2">
									<select class="form-control" onchange="searchFilter1()" id="class_id">
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

								<div class="col-md-2">
									<select class="form-control" onchange="searchFilter1()" id="lesson_id">
										<option value=''>Lesson</option>
										<?php
										
											if ($lessons['num'] > 0) {
											foreach($lessons['data'] as $lessons)
											{
												echo $lessons->lesson_id;
											?>
											 <option value="<?php echo $lessons->lesson_id  ;?>"><?php echo $lessons->lesson_name;?></option>
											
											<?php
											}
											}else{
												echo ' <option>No Lessons Data Found</option>';
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

				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table table-custom table-lg">
				<thead>
					<tr>
						<th>Student Name</th>
						<th>Class </th>
						<th>Lesson</th>
						<th>Image</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody id="postList">
					<?php
					if(!empty($list)){
						foreach ($list as   $req) { 						
							?>
							
							<tr>
								<td><?= $req->student_name?></td>
								<td><?= $req->class_name?></td>
								<td><?=$req->lesson_name ?></td>
								<td><img src="<?=$req->image_path ?> " height="60" width="60" /></td>
								
								<td class="text-end">
									<div class="dropdown">
										<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
											<i class="bi bi-three-dots"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-end">
											<a href="<?=base_url($_SESSION["login_session"]["url_slug"].'/section_artwork/'.$req->id)?>" class="dropdown-item">View</a>
										 </div>
									</div>
								</td>
							</tr>
							
							<?php
							
						}
					}else{
						echo "<tr><td>No Data Found</td></tr>";
					}
					?>
				</tbody>
			</table>
			<div id="pagination"><?=$pagination?></div>
			<span id="showing_text"><?=$showing_text?></span>
		</div>



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
		var status    = $( "#status option:selected" ).val();
		var class_id    = $( "#class_id option:selected" ).val();
		var lesson_id    = $( "#lesson_id option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/feedback_management/artworkajaxPagination/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword, school_id:school_id, status:status, class_id:class_id, lesson_id:lesson_id},
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