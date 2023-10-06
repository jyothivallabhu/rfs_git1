
<!-- content -->
<!--<div class="col-md-9">
   <div class="row g-4 mb-4">
            <div class="card widget">
			
			<div id="msg">
					
				</div>
				
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Import Parent for <b> <?= $schools->name ?></b> School</h5>
                </div>-->
				
				<?php if(isset($this->url_slug) && !empty($this->url_slug)){ ?>
				  <div class="page-container">
						<div class="main-content">
							<div class="page-header no-gutters">
								<div class="row align-items-md-center">
									<div class="col-md-6 ">
										<h3 class="m-b-0">
											<a class="text-dark" href="javascript:void(0);"> Import Parent for - <?= $schools->name ?></a>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-md-12">
				 <?php }else{ ?>
				   <div class="col-md-9" id="app">
				   
				   <div class="row g-4 mb-4">
				   <h2>Import Parent for - <?= $schools->name ?></h2>
				   
				 <?php } ?>
				
			
			<?php $school_id = ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3"); ?>
			
                <form class="mb-5 form_class" method="POST" id="add_schooladminForm" action="<?= site_url('parents/submitimport') ?>" enctype="multipart/form-data">
                    <div class="row">
					<input type="hidden" class="form-control" name="school_id" id="school_id" value="<?= ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3") ?>" >
					
					
						</div>

						
						
						
					<div class="row">
                        <div class="mb-3 col-6">
                            <label for="import_students" class="form-label"><h5>Please Upload  CSV file Only</h5></label><br><label>  <small>For Sample Format <a style="text-decoration: underline;" href="<?php echo base_url() ?>uploads/parents_import.csv">click here to download</a> </small></label>
                            <input type="file" class="form-control" name="import_students" id="import_students"  <?= ($schools->status== '0') ?  'disabled' : '' ?>required>
							
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('parents/'.$school_id) ?>" class="btn btn-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>
<script>
 $(document).on('change','#class_id',function(){

	var class_id = $(this).val();

	$("#section_id").html('');

	var sections_optns ='';

	if(class_id!=''){

		$.ajax({

			'url':"<?=base_url('students/getSections')?>",

			"data":{class_id:class_id},

			"type":"post",

			"success":function(res){

				console.log(res);

				var j = JSON.parse(res);

				if(j.sections_optns!=''){

					$("#section_id").html(j.sections_optns);                         

				}


			}

		});

	}

}); 
</script>

