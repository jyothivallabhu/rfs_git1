   <div class="col-md-9">
   
   <?php echo $this->session->flashdata('cmsg');?>
   
   <div class="row g-4 mb-4">
        <?php foreach ($classes as $key => $value) {
			 $status_badge = 'bg-success';
			if ($value->status == '0')
				$status_badge = 'bg-warning'; 
			
			//print_r($value);
		?>
		<div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center row">
                        <h5 class="mb-0 col-md-6"><?=  $value->class_name ?></h5>
                        <span class="col-md-1 badge <?= $status_badge ?>"><?= ($value->status == '1')? 'Active' : 'Inactive' ?></span>
						
						        <div class="d-flex col-md-1">
                                    <div class="dropdown ms-auto">
                                        <a href="#" data-bs-toggle="dropdown"
                                           class="btn btn-floating"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" class="dropdown-item">Edit</a>
                                           <?php if ($value->status != '0'){ ?>
										   <a  href="<?php echo  base_url('classes/delete_class/'.$value->school_id.'/'.$value->c_id) ?>" onclick="return confirm('Are you sure you want to Delete?');" class="dropdown-item">Delete</a>
										   <?php } ?>
										   
                                        </div>
                                    </div>
                                </div>
                            
							
							
                        <!--<a class="col-md-2" href="#">Edit</a>
						<a class="col-md-2" href="<?php echo  base_url('admin/delete_class/'.$value->c_id) ?>" onclick="return confirm('Are you sure you want to Delete?');">Delete</a>-->
                    </div>
                </div>
            </div>
        </div>
		<?php } ?>
	</div>
    <p>
        <a class="btn btn-outline-primary btn-icon" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-plus-circle"></i> Add New Class
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
             <form class="mb-5" method="POST" action="<?= site_url('classes/save_class') ?>" >
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Class Name</label>
                        <input type="text" name="class_name" class="form-control">
                        <input type="hidden" name="school_id" value="<?= $this->uri->segment(3) ?>" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    </div>