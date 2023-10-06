<style>
@media only screen and (max-width: 600px) {
	input#keyword {
    width: 226px;
    position: absolute;
    top: 28px;
    top: 43px;
    right: 62px;
    margin-top: 2px;
}

button.btn.btn-outline.search {
    position: absolute;
    top: 44px;
    left: 7px;
}
select#class_id {
    position: absolute;
    width: 179px!important;
    left: -11px;
}
select#sortby {
    width: 101px;
}
}
</style>



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
					<div class="row align-items-center m-b-10">
						<div class="col-md-12 col-lg-12">
								 <div class="d-flex">
									<div class="col-md-12 col-lg-3 ">
										<select onchange="lsearchFilter()"  id="sortby" name="sortby" class="form-control drop">
											<option value="">SortBy</option>
											<option value="desc">Desc</option>
                                            <option value="asc">Asc</option>
										</select>
									</div>
									<div class=" col-md-12 col-lg-3  ">
										<select onchange="lsearchFilter()"  id="class_id" name="class_id" class="form-control drop">
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
									
									 
									<div class="col-md-12 col-lg-3"> 
										<div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" name= "keyword" id="keyword" onkeyup ="lsearchFilter()">
                                                <button class="btn btn-outline search" type="button">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div>
									</div>
									</div> 
									
									
								</div>
				
							</div>
							
							
							<div class="container">
    
						
					  <div id="teacher_lessons">
					  <?php
						if(!empty($list)){
							foreach ($list as $req) { 
							 ?>
							 
								<div class="card mb-3">
								  <div class="card-body">
								  
									<div class="d-flex flex-column flex-lg-row">
									  
									  <div class="row flex-fill">
										<div class="col-sm-6 col-lg-4">
										 <img class="img-fluid" src="<?= base_url().$req->final_artwork ?>" width="200" height="200">
										</div>
										<div class="col-sm-6 col-lg-4">
										  <h4 class="h5 m-t-10">Class: <?= $req->class_name?> </h4>
										  <p >Lesson: <?=$req->lesson_name ?></p> 
										</div> 
										
										<div class="col-sm-6 col-lg-4 text-lg-end">
										  <a href="<?php echo  base_url($this->url_slug.'/lessons_view/'.$req->lesson_id) ?>" class="btn btn-primary stretched-link">View</a>
										</div>
									  </div>
									</div>
								  </div>
								</div>
						 <?php
							 }
						}else{
							echo "<tr><td>No Data Found</td></tr>";
						}
						?>
					
					  </div>
					 </div>

					<div id="pagination"><?=$pagination?></div>
					<span id="showing_text"><?=$showing_text?></span>
					 
						
							
						</div>
					</div>
				</div>
			</div>
		    
	       </div>
                <!-- Content Wrapper END -->

             <script>
	
	window.addEventListener("pageshow", () => {
		$("option:selected").prop("selected", false) 
		$("#keyword").val('')
	});

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
				console.log(res.html);
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#teacher_lessons').html(res.html);
			}
		});
	}
	

</script>