<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Teacher Continious Mentoring</a>
						</h3>
					
					</div>
					<div class="col-md-6 text-right">
						<div class="text-md-right">
						    <a href="<?= base_url().$this->url_slug.'/teacher_mentoring/add' ?>" class="btn btn-primary">
							<i class="anticon anticon-plus"></i>
							<span class="m-l-5">Add</span>
						    </a>
						</div>
					</div>
				   
				</div>
			</div>
			
			<div class="row">
				
				
				<div class="col-md-12 col-lg-12">
				
					<div class="card">
						<div class="card-body"> 
						<div class="d-flex justify-content-between align-items-center m-b-10">
								<h5>Teacher Continious Mentoring</h5>
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
								<table class="table table-hover" id="table"  data-module="teacher_continuous_mentoring" data-section="" >
									<thead>
										<tr>
										<th>Lesson Name</th>
										<th>Class</th>
										<th>Stage  </th>
										<th>Status</th>
										<th>Feedback </th>
										<th>Uploaded On</th>
										<th>Actions</th>
										</tr>
									</thead>
                                    <tbody id="teacher_continuous_mentoring">
									
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
											?>
												
												<tr>
													<td><?=$req->lesson_name ?></td>
													<td><?= $req->class_name?></td>
													<td><?=$req->stage ?></td>
													<td><?=$status ?></td>
													<td>Pending</td>
													<td><?=date('d M Y', strtotime($req->created_at)); ?></td>
													
													
													
													<td>
													<a href="<?=base_url($this->url_slug.'/view_mentoring/'.$req->id)?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													
													<a href="<?=base_url($this->url_slug.'/edit_mentoring/'.$req->id)?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
													
													<a href="javascript:void(0);" data-t="trial_and_mentoring" data-i="'.$req->id.'" data-c="teacher_continuous_mentoring" class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></a>
													
													<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														<a href="<?=base_url($this->url_slug.'/section_artwork/'.$req->section_id)?>" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>-->
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

              