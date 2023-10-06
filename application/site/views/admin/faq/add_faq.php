<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4" id="app">
        <div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">FAQ</h5>
                </div>
				<div id="msg">
					
				</div>
                <form class="mb-5 form_class" id="add_mentors" method="POST" action="<?= site_url('faq/save_faq') ?>" enctype="multipart/form-data">
                    <div class="row ">

						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Role</label>
                            <select class="form-select" name="role">
								<option value=""  >Select Role</option>
								<option value="Parent"  >Parent</option>
								<option value="Teacher"  >Teacher</option>
								<option value="School"  >School</option>
								<option value="Mentor"  >Mentor</option>
							</select>
                        </div>
						
						 
                        <div class="mb-3 col-6 ">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="faq_title" id="faq_title" required>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="faq_desc" class="form-label">Description</label>
							
                            <textarea type="text" class="form-control" name="faq_desc" id="faq_desc" ></textarea>
                        </div>
						
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image" id="faq_image" >
                        </div>
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image2 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image2" id="faq_image2" >
                        </div>
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image3 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image3" id="faq_image3" >
                        </div>
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image4 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image4" id="faq_image4" >
                        </div>
						<div class="mb-3 col-6">
                            <label for="school_image" class="form-label">Image5 <small style="color:red"> </small></label>
                            <input type="file" class="form-control" name="faq_image5" id="faq_image5" >
                        </div>
						
						
						
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('faq') ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->