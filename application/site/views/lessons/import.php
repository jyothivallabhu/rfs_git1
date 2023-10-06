<!-- content -->
<div class="content ">
<!-- content -->
<div class="col-md-12">
   <div class="row g-4 mb-4">
            <div class="card widget">
			
			<div id="msg">
					
				</div>
				
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Import </b> Lessons</h5>
                </div>
				
			
			
			
                <form class="mb-5 form_class" method="POST" id="add_schooladminForm" action="<?= site_url('lessons/submitimport') ?>" enctype="multipart/form-data">
                    

						
					<div class="row">
                        <div class="mb-3 col-6">
                            <label for="import_students" class="form-label"><h5>Please Upload  CSV file Only</h5></label><br><label>  <small>For Sample Format <a style="text-decoration: underline;" href="<?php echo base_url() ?>uploads/lessons_import.csv">click here to download</a> </small></label>
                            <input type="file" class="form-control" name="import_students" id="import_students" required>
							
                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('lessons') ?>" class="btn btn-primary">Cancel</a>
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

