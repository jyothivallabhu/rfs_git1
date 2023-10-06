<style>

	ul.navbar-nav {
    font-size: 15px;
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
						    <a class="text-dark" href="javascript:void(0);">Monthly Mentoring</a>
						</h3>
					
					</div>
					
				   
				</div>
			</div>
			
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				
					<div class="card">
						<div class="card-body"> 
						<div class="d-flex justify-content-between align-items-center m-b-10">
								
								<div class="d-flex">
									<!--<div class="m-r-15">
										<select class="form-control" onclick="searchFilter()" id="perpage">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
									</div>
									<div class="m-r-15">
										<select onchange="searchFilter()"  id="class_id" name="class_id" class="form-control">
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
									</div>-->
								</div>
				
							</div>
							<div class="table-responsive">
								<table class="table table-hover" id="table"  data-module="teacher_monthly_mentoring" data-section="" >
									<thead>
										<tr> 
										<th data-sortable="false">Reference Doc  </th> 
										<th data-sortable="false">Next review date</th>
										<!--<th>Feedback </th>-->
										<th data-sortable="false">Actions</th>
										</tr>
									</thead>
                                    <tbody id="teacher_monthly_mentoring">
									
										<?php
										if(!empty($list)){
											foreach ($list as $req) { 
												if ($req->status=='1'){
													$status = 'Submitted';
												} elseif ($req->status=='2'){
													$status = 'Approved';
												} else{
													$status ='Not Started';
												}
										
												if($req->status=='1'){
													$status = '<a class="badge badge-pill badge-cyan font-size-12">'.$status.'</a>';	
												}else{
													$status = '<a class="badge badge-pill badge-gold font-size-12">'.$status.'</a>';	
												}
												
												if($req->feedback=='1'){
													$feedbackstatus = '<a class="badge badge-pill badge-cyan font-size-12">Given</a>';	
												}else{
													$feedbackstatus = '<a class="badge badge-pill badge-gold font-size-12">Pending</a>';	
												}
												
												/* print_r($req); */
												
												if($req->reference_image == ''){
													$doc= '<img src="'. base_url().$req->image1 .' " height="60" width="60" />';
												}else{
													$doc = '<a href="'. base_url().$req->reference_image .'" target=_blank>view</a>';
												}
											?>
												
												<tr> 
												
													<td><?= $doc ?></td>
													 
													
													<td><?=date('d M Y', strtotime($req->next_review_date)); ?></td>
													
													<!--<td><?= $feedbackstatus ?></td>-->
													
													
													
													<td>
													<a href="<?=base_url($this->url_slug.'/view_monthlymentoring/'.$req->id)?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													
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

              