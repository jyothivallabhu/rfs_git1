<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Artwork</a>
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
								<h5>Artwork</h5>
								<div class="d-flex">
									<!--<div class="m-r-15">
										<select class="form-control" onclick="searchFilter()" id="perpage">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
									</div>-->
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
									</div>
								</div>
				
							</div>
							<div class="table-responsive">
								<table class="table table-hover" id="table"  data-module="teacher_artwork" data-section="" >
									<thead>
										<tr>
										 <th data-field="class_id" data-sortable="false">Class</th>
										<th data-field="section_id" data-sortable="false">Section</th>
										<th data-field="id" data-sortable="false">Artwork</th>
										<th data-field="id" data-sortable="false">Actions</th>
								
										</tr>
									</thead>
                                    <tbody id="teacher_artwork">
									
										<?php
										if(!empty($list)){
											foreach ($list['data'] as $req) { 

											$count_data = $this->Teachers_artwork_model->getartworksCount($req->section_id,$req->lesson_id);
											$total_count = $count_data[0]->total_lessons;
												?>
												
												<tr>
															<td><?= $req->class_name?></td>
															<td><?=$req->section_name ?></td>
															
															<td><?=$total_count?></td>
															
															
															<td>
																<a href="<?=base_url($this->url_slug.'/section_artwork/'.$req->section_id)?>" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
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

              