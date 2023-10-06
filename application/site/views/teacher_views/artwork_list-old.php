<!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
		
			<div class="page-header no-gutters">
				<div class="row align-items-md-center">
					
					<div class="col-md-6 ">
						<h3 class="m-b-0">
						    <a class="text-dark" href="javascript:void(0);">Artwork List</a>
						</h3>
					
					</div>
				</div>
			</div>
			
			
			<div class="row">
					<?php
					if ($artworks['num'] > 0) {
					
						foreach ($artworks['data'] as $row) {
						?>
				<div class="col-md-3 col-lg-3">
					
					<div class="card">
						<img class="card-img-top" src="<?=base_url().$row->artwork_upload?>" alt="">
						<div class="card-body">
							<div class="m-t-20">
								<div class="text-center text-sm-left m-v-15 p-l-30">
									<h4 class="m-b-5"><?=$row->lesson_name?></h4>
									<p class="text-opacity font-size-13">Status</p>
								    <p class="text-dark m-b-5">Uploaded On: 10/18/2022</p>	
								 </div>
								    
								
							</div>
							
							<div class="m-t-15 m-l-20">
								
								<a  href="<?= base_url().$this->url_slug.'/view_artwork/'.$row->id; ?> "class="m-r-5 btn btn-icon btn-hover btn-rounded view_artwork">
									<i class="anticon anticon-eye"></i>
								</a>
							</div>
						  
						</div>
					</div>
				</div>
					<?php
						}
					} else {
						?>
						No data to display
					<?php
					}
					?>
					   
				
			</div>
			
		    
	       </div>
                <!-- Content Wrapper END -->

              