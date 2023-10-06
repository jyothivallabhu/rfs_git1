<!-- content -->

   <div class="col-md-9" id="app">
   
   
   <div class="row g-4 mb-4">
   <h2>Get Help</h2>
   
 
	  
		<div id="msg"> </div>
			  
    <div class="card col-md-9 mb-3 offset-lg-2" >
        <div class="card-body">
			<form class="mb-5" id="reset_password" action="<?= site_url('get_help/save') ?>" method="post">
			  
			  <div class="mb-3 col-6">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control pass" id="title" name="title"   required>
			  </div>
			 <div class="mb-3 col-6">
				<label for="description" class="form-label">Description</label>
				<textarea type="text" class="form-control pass" id="description" name="description"   required></textarea>
			  </div>
			  
			  <div class="mb-3 col-6">
					<label for="attachment" class="form-label">Attach File</label>
					<input type="file" class="form-control" name="attachment" id="attachment" required>
				</div>
			 
			   <input name="submit" type="submit" class="btn btn-primary">
			   
			  
			    <a href="<?php  echo $base_url() ?>" class="btn btn-outline-primary">Cancel</a>
				
			</form>
        </div>
    </div>
    

</div>
<script>


</script>
<!-- ./ content -->