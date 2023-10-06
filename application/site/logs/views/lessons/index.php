<!-- content -->
    <div class="content " id="app">
        
   

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="col-md-6 d-none d-md-flex">All Lessons</div>
						<div class="col-2 text-success">
                           <div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name= "keyword" id="keyword" onkeyup ="searchFilter()">
								<button class="btn btn-outline-light" type="button">
									<i class="bi bi-search"></i>
								</button>
							</div>
                        </div>
						 <div class=" text-success">
                            <div class="input-group">
								<a class="btn btn-primary" href="<?php echo  base_url('lessons/import/') ?>">
								Import Lesson</a>
							</div>
                        </div>
						
                        <div class="text-success">
                            <div class="input-group">
								<a class="btn btn-primary" href="<?php echo  base_url('lessons/add_lesson/') ?>">
								Add Lesson</a>
							</div>
                        </div>
                       
                        
                        
                        
					</div>
                </div>
            </div>
			
			 <nav class="mt-5" aria-label="Page navigation example">	
				<?php //echo $pagination; ?>
				<div id="pagination"><?=$pagination?></div>
				<span id="showing_text"><?=$showing_text?></span>
            </nav>
			
            <div id="lessonslist">
			<?php 
			if(!empty($lessons)){
			foreach($lessons as $le){
				?>
				
				<div class="row g-4" style="margin-bottom: 15px;" id="">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card card-hover">
							<div class="card-body row">
								<div class="col-md-3">
								<img src="<?= base_url().$le->final_artwork ?>" width="300" height="300"></div>
								<div class="col-md-1"></div>
								<div class="col-md-8">
									<h5 class="card-title mb-3"><?= $le->lesson_name ?></h5>
								<a href="#">
								</a>
								<div class="d-flex gap-3 mb-3 align-items-center">
									<h6 class="mb-0">Medium: <?= $le->medium ?></h6>
								</div>
								<div class="d-flex gap-3 mb-3 align-items-center">
									<h6 class="mb-0">Material Required: <?= $le->material_required ?></h6>
								</div>
								
								
								<div class="d-flex gap-2 mb-3">
									<span><?= $le->description ?></span>
								</div>
								
								  <a class="btn btn-primary" href="<?php echo  base_url('lessons/view_lesson/'.$le->lesson_id) ?>">View</a>
								  <a class="btn btn-primary" href="<?php echo  base_url('lessons/edit_lesson/'.$le->lesson_id) ?>">Edit</a>
								  <a class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete?');" href="<?php echo  base_url('lessons/delete_lesson/'.$le->lesson_id) ?>">Delete</a>
								
								
								</div>
								
							</div>
						</div>
					</div>
				</div>
			
				<?php 
			} 
			}else{
				echo 'No Data Found';
			}?>
			
			
			</div>
			
			
            <nav class="mt-5" aria-label="Page navigation example">	
				<?php //echo $pagination; ?>
				<div id="pagination"><?=$pagination?></div>
				<span id="showing_text"><?=$showing_text?></span>
            </nav>
        </div>
        
    </div>

    </div>
    <!-- ./ content -->
	
	<script>
	

	
	
	function searchFilter(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;
		var keyword         = $("#keyword").val();
		var perpage    = 50;
		
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/lessons/ajaxPagination/")?>'+page_num,
			data:{page:page_num,keyword:keyword,perpage:perpage},
			beforeSend: function () {
				$('.loading').show();
			},
			success: function (res) {
				res = JSON.parse(res);
				//setcst(res.cst);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#lessonslist').html(res.html);
				$('.loading').fadeOut("slow");
			}
		});
	}
</script>