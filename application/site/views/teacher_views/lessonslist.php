<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Lessons</a>
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
		    
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				
					<div class="card">
					<div class="card-body"> 
					<div class="d-flex justify-content-between align-items-center m-b-10">
								<h5>Lessons</h5>
								<div class="d-flex">
									<div class="m-r-15">
										<select onchange="lsearchFilter()"  id="sortby" name="sortby" class="form-control">
											<option value="">SortBy</option>
											<option value="desc">Desc</option>
                                            <option value="asc">Asc</option>
										</select>
									</div>
									<div class="m-r-15">
										<select onchange="lsearchFilter()"  id="class_id" name="class_id" class="form-control">
										<option value="">Select Class</option>
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
									
									
									<div class="m-r-15">
										<div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" name= "keyword" id="keyword" onkeyup ="lsearchFilter()">
                                                <button class="btn btn-outline" type="button">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div>
									</div>
									
									
								</div>
				
							</div>
						
							<div class="table-responsive">
								<table class="table table-hover" id="table"  data-module="teacher_lessons" data-section="" >
									<thead>
										<tr>
										 <th data-field="class_id" data-sortable="false">Grade</th>
										<th data-field="section_id" data-sortable="false">Lesson Name</th>
										<th data-field="id" data-sortable="false">Medium</th>
										<th data-field="id" data-sortable="false">Actions</th>
								
										</tr>
									</thead>
                                    <tbody id="teacher_lessons">
									
										<?php
										if(!empty($list)){
											foreach ($list as $req) { 
												
												?>
												
												<tr>
															<td><?= $req->class_name?></td>
															<td><?=$req->lesson_name ?></td>
															
															<td><?=$req->medium?></td>
															
															
															<td>
																<a href="<?php echo  base_url($this->url_slug.'/lessons_view/'.$req->lesson_id) ?>" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
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
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

              <script>
	
	function lsearchFilter(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var school_id         = $("#school_id").val();
		var sortby  = $( "#sortby option:selected" ).val();
		var perpage    = 10;
		var class_id    = $( "#class_id option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/teacher_lessons/lessonsListajaxpagination/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,school_id:school_id,class_id:class_id},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#teacher_lessons').html(res.html);
			}
		});
	}
	

</script>