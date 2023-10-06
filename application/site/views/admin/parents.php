<!-- content -->


		
	<?php /* if(isset($schools->name)){ ?>	
	<div class="col-md-9" id="app">
		<div class="row g-4 mb-4">
	<?php  }else{ ?>
	<div class="content ">
		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col-lg-12 col-md-12">
	<?php  } */ ?>
	


 <?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
  <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Parents - <?= $schools->name ?></a>
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
   <h2>Parents  <?= ($this->uri->segment(1) == 'allparent') ? '' : $schools->name ?></h2>
   
 <?php } ?>
   
   
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Parents  <?= (isset($schools->name) ? '-'.$schools->name : '') ?></h5>
                </div>
				<div id="msg"> </div>
			
            <div class="card">
                <div class="card-body">
                    <div class="align-items-center">
                        <div class="align-items-center">
                            <div class="mb-3 mb-md-0">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <select class="form-control" onchange="searchFilter1()" id="sortby">
                                            <option>Sort by</option>
                                            <option value="desc">Desc</option>
                                            <option value="asc">Asc</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
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
											<option value=''>Status</option>
											<option value="1" selected>Active</option>
											<option value="0">Inactive</option>
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

						<input type="hidden" name="school_id" id="school_id" value="<?=  $id = ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2"); ?>">
						
						<?php 
						if(isset($this->school_id) && $this->school_id !=''){
							$urlid = $_SESSION["login_session"]["url_slug"].'/parents/import_parents';
							$addurlid = $_SESSION["login_session"]["url_slug"].'/parents/add_parents';
						}else{
							$urlid ='parents/import_parents/'.$this->uri->segment(2);
							$addurlid ='parents/add_parents/'.$this->uri->segment(2);
						} ?>
						
						<?php if(isset($schools->name)){ ?>
						<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
						
						
                        <div class="dropdown ms-auto" style="float: right;margin-top: 14px;">
                            <a href="<?= base_url($urlid) ?>">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Import Parent
                                </button>
                            </a>
							 <a href="<?= base_url($addurlid) ?>">
                                <button class="btn btn-outline-primary">
                                    <i class="bi bi-plus-circle me-2"></i> Add Parent
                                </button>
                            </a>
                        </div>
						<?php //} 
						}?>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table table-custom table-lg">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="mentorsList">
                        <?php
						if(!empty($mentors)){
						foreach ($mentors as $key => $value) {
                            $status_badge = 'bg-success';
                            if ($value->status == '0')
                                $status_badge = 'bg-warning';
							
                        ?>
                            <tr>
                                <td><?= $value->first_name ?> <?= $value->last_name ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->phone ?></td>
                                <td>
                                    <span class="badge <?= $status_badge ?>"><?= ($value->status == '1')? 'Active':'Inactive' ?></span>
                                </td>
								<?php //if($_SESSION['login_session']['role_id'] != 5){ ?>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!--<a href="<?= base_url('parents/students/'.$value->id) ?>" class="dropdown-item">Add children </a>
                                            <a href="<?= base_url('parents/view_parent/'.$value->id) ?>" class="dropdown-item">View</a>-->
                                            
											<a href="<?= base_url('parents/edit_parents/') . $value->id ?>" class="dropdown-item">Edit</a>
											<a href="<?= base_url('parents/reset_password/') . $value->id ?>" class="dropdown-item">Reset Password</a>
                                            
											<a  href="javascript:void(0);"  data-did="<?= $value->id ?>" data-sid = "<?= $value->school_id ?>" data-tbl="schools" data-ctrl="parents"  class="dropdown-item text-danger delete_class">Delete</a>
											
                                        </div>
                                    </div>
                                </td>
								<?php //} ?>

                            </tr> <?php }
						}else{
							echo ' <tr><td class="text-center text-red" colspan="4">Data not available</td></tr>';
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
		var sortby  = $( "#sortby option:selected" ).val();
		var perpage    = $( "#perpage option:selected" ).val();
		var status    = $( "#status option:selected" ).val();
		var school_id    = $( "#school_id" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/parents/ajaxPaginationparentsData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,school_id:school_id,status:status},
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