<!-- content -->
<!--
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-12 col-md-12">
            <h2>Grades List</h2>-->

<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Exam Types List - <?= $schools->name ?></a>
						</h3>
					
					</div>
					
				</div>
			</div>
			<div class="col-md-12">
 <?php }else{ ?>
  <div class="col-md-9" id="app">
	<div class="row g-4 mb-4">
        
   <h2>Exam Types List - <?= $schools->name ?></h2>
   
 <?php } ?>
			
			<div id="msg">
				
			</div>
			
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex gap-4 align-items-center">
                        <div class="d-md-flex gap-4 align-items-center">
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
									<div class="col-md-3">
										<select class="form-control" onchange="searchFilter1()" id="status">
											<option>Status</option>
											<option value="1" selected>Active</option>
											<option value="0">Inactive</option>
										</select>
                                    </div>
									
									<input type="hidden" value="<?= $schools->id ?>" name= "school_id" id="school_id" >	
									
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
						
						<?php 
						if(isset($this->school_id) && $this->school_id !=''){
							$urlid = $_SESSION["login_session"]["url_slug"].'/exam_types/add';
						}else{
							$urlid ='exam_types/add/'.$this->uri->segment(2);
						} ?>

                        <div class="dropdown ms-auto">
                            <a href="<?= base_url($urlid) ?>">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Add Exam Types
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table table-custom table-lg">
                    <thead>
                        <tr>
                            <th>Exam Types Name</th>
                            <th>Status</th>



                        </tr>
                    </thead>
                    <tbody id="mentorsList">
                        <?php
						if(!empty($grades_list)){
						foreach ($grades_list as $key => $value) {
                            $status_badge = 'bg-success';
                                $status = 'Active';
                            if ($value->status == '0'){
                                $status_badge = 'bg-warning';
                                $status = 'Inactive';
								}
								
                        ?>
                            <tr>
								<td><?= $value->exam_name ?></td>
                                
                                <td>
                                    <span class="badge <?= $status_badge ?>"><?= $status ?></span>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            
											<a  href="javascript:void(0);"  data-did="<?= $value->id ?>" data-tbl="grades" data-ctrl="exam_types"  data-sid = "<?= $schools->id ?>"  class="dropdown-item text-danger delete_class">Delete</a>		
											
											
                                        </div>
                                    </div>
                                </td>

                            </tr> <?php }
						}else{
								echo 'No Data Found';
							}?>
                    </tbody>
                </table>
				<div id="pagination"><?=$pagination?></div>
				<span id="showing_text"><?=$showing_text?></span>
            </div>



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
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/grades/ajaxPaginationData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,status:status,school_id:school_id},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#mentorsList').html(res.html);
			}
		});
	}
</script>