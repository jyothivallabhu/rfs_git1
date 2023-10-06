<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-8 col-md-8">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add Lesson</h5>
                </div>
                <form class="mb-5 form_class" method="POST" action="<?= site_url('lessons/update_lesson/').$lessons->lesson_id ?>" enctype="multipart/form-data">
                    <div class="row">

                        <div class="mb-3 col-12 ">
                            <label for="lesson_name" class="form-label">Lesson Name</label>
                            <input type="text" class="form-control" name="lesson_name" id="lesson_name" value="<?= $lessons->lesson_name ?>" required>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="description" class="form-label">Description </label>
							<textarea class="form-control" name="description" id="description" required><?= $lessons->description ?></textarea >
                            
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="aim_and_objective" class="form-label">Aim & Objective</label>
							<textarea class="form-control" name="aim_and_objective" id="aim_and_objective" required><?= $lessons->aim_and_objective ?></textarea >
							
                        </div>
						
						<div class="mb-3 col-12 ">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" name="duration" id="duration"  value="<?= $lessons->duration ?>" required>
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="artist_art_movement" class="form-label">Artist / Art movement</label>
                            <input type="text" class="form-control" name="artist_art_movement"  value="<?= $lessons->artist_art_movement ?>" id="artist_art_movement">
                        </div>
						
                        <div class="mb-3 col-12 ">
                            <label for="technique" class="form-label">Technique</label>
                            <input type="text" class="form-control" name="technique" id="technique"  value="<?= $lessons->technique ?>" required>
                        </div>
                         <div class="mb-3 col-12 ">
                            <label for="medium" class="form-label">Medium	</label>
                            <input type="text" class="form-control" name="medium" id="medium"  value="<?= $lessons->medium ?>" required>
                        </div>
                        
                         <div class="mb-3 col-12 ">
                            <label for="elements_of_art_covered" class="form-label">Elements or Principles of Art Covered Art Movement	</label>
							<textarea class="form-control" name="elements_of_art_covered" id="elements_of_art_covered" required><?= $lessons->elements_of_art_covered ?></textarea >
                        </div>
                         <div class="mb-3 col-12">
                            <label for="final_artwork" class="form-label">Final Artwork	<small style="color:red;font-size: 0.8em;"> Please Upload Image</small></label>
                            <input type="file" class="form-control" name="final_artwrk" id="final_artwork"  value="<?= $lessons->final_artwrk ?>">
                        </div>
                        		
						<div class="mb-3 col-12">
                            <label for="demonstration_video" class="form-label">Is Featured</label>
							<input required type="checkbox" name="is_featured"  <?= ($lessons->is_featured  == 1 ) ?  'checked' : '' ?> class="form-check-input" id="exampleCheck" value="">
						</div>
						
						
                        <div class="mb-3 col-12">
                            <label for="teachers_note" class="form-label">Teachers Note</label>
							<textarea class="form-control" name="teachers_note" id="teachers_note" required><?= $lessons->teachers_note ?></textarea >
							<pre id="output"></pre>
                        </div>
						<div class="mb-3 col-12">
                            <label for="options" class="form-label">Options</label>
							<textarea class="form-control" name="options" id="editor" required><?= $lessons->options ?></textarea >
                        </div>
						
						
						<div class="mb-3 col-12">
                            <label for="introduction_video" class="form-label">Introduction Video <small style="color:red;font-size: 0.8em;"> Please Upload Video below 10MB</small></label>
                            <input type="file" class="form-control" name="intro_video" id="introduction_video" value="<?= $lessons->introduction_video ?>">
                        </div>
						<div class="mb-3 col-12">
                            <label for="demonstration_video" class="form-label">Demonstration Video <small style="color:red;font-size: 0.8em;"> Please Upload Video below 10MB</small></label>
                            <input type="file" class="form-control" name="demo_video" id="demonstration_video" value="<?= $lessons->demonstration_video ?>" >
                        </div>
						<div class="mb-3 col-12">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-control" name="status">
								<option value="1" <?php if($lessons->status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($lessons->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>
						
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('lessons') ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>


<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
	ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
	ClassicEditor
        .create( document.querySelector( '#aim_and_objective' ) )
        .catch( error => {
            console.error( error );
        } );
	ClassicEditor
        .create( document.querySelector( '#elements_of_art_covered' ) )
        .catch( error => {
            console.error( error );
        } );
	ClassicEditor
        .create( document.querySelector( '#teachers_note' ) )
        .catch( error => {
            console.error( error );
        } );
		
		
</script>
