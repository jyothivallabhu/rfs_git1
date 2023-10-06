<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-8 col-md-8">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add Lesson</h5>
                </div>
				<div id="msg"></div>
				
                <form class="mb-5" id="lessons_add_form" method="POST" action="<?= site_url('lessons/save_lesson') ?>" enctype="multipart/form-data" >
                    <div class="row">

                        <div class="mb-3 col-12 ">
                            <label for="lesson_name" class="form-label">Lesson Name</label>
                            <input type="text" class="form-control" name="lesson_name" id="lesson_name" required>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="description" class="form-label">Description </label>
                            <textarea type="text" class="form-control" name="description" id="description" required ></textarea>
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="aim_and_objective" class="form-label">Aim & Objective</label>
                            <textarea type="text" class="form-control" name="aim_and_objective" id="aim_and_objective" ></textarea>
                        </div>
						
						<div class="mb-3 col-12 ">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" name="duration" id="duration" required>
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="artist_art_movement" class="form-label">Artist / Art movement</label>
                            <input type="text" class="form-control" name="artist_art_movement" id="artist_art_movement" required>
                        </div>
						
                        <div class="mb-3 col-12 ">
                            <label for="technique" class="form-label">Technique</label>
                            <input type="text" class="form-control" name="technique" id="technique" required >
                        </div>
                         <div class="mb-3 col-12 ">
                            <label for="medium" class="form-label">Medium	</label>
                            <input type="text" class="form-control" name="medium" id="medium" required>
                        </div>
                        
                         <div class="mb-3 col-12 ">
                            <label for="elements_of_art_covered" class="form-label">Elements or Principles of Art Covered Art Movement	</label>
                            <textarea type="text" class="form-control" name="elements_of_art_covered" id="elements_of_art_covered"  ></textarea>
                        </div>
                         <div class="mb-3 col-12 ">
                            <label for="final_artwork" class="form-label">Final Artwork	<small style="color:red;font-size: 0.8em;"> Please Upload Image</small></label>
                            <input type="file" class="form-control" name="final_artwork" id="final_artwork" required>
                        </div>
                        						
						
                        <div class="mb-3 col-12">
                            <label for="teachers_note" class="form-label">Teachers Note</label>
                            <input type="file" class="form-control" name="teachers_note" id="teachers_note" required >
							<pre id="output"></pre>
                        </div>
						
						<div class="mb-3 col-12">
                            <label for="options" class="form-label">Options</label>
                            <input type="text" class="form-control" name="options" id="options" required >
                        </div>
						
						
						<div class="mb-3 col-12">
                            <label for="introduction_video" class="form-label">Introduction Video <small style="color:red;font-size: 0.8em;"> Please Upload Video below 10MB</small></label>
                            <input type="file" class="form-control" name="intro_video" id="introduction_video" required>
                        </div>
						<div class="mb-3 col-12">
                            <label for="demonstration_video" class="form-label">Demonstration Video <small style="color:red;font-size: 0.8em;"> Please Upload Video below 10MB</small></label>
                            <input type="file" class="form-control" name="demo_video" id="demonstration_video" required>
                        </div>
						
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('lessons') ?>" class="btn btn-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->

<script src="https://cdn.tiny.cloud/1/syfcbncbgn1s0qf7ahyy86pp4si0bjdwpb1sa4yooivdic22/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
 <!--<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>-->
<script>

$("#save_button").on('click', function(e){
	e.preventDefault();
		 $('#lessons_add_form').submit();
		});


tinymce.init({
    selector: 'textarea',
    height: 500,
    theme: 'modern',
    plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
   toolbar1: 'insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
   toolbar2: 'print preview media | forecolor backcolor emoticons',
   image_advtab: true,
   content_css: ['//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
   ]
   });



  /* 
  ClassicEditor
        .create( document.querySelector( '#basic-example' ) )
        .catch( error => {
            console.error( error );
        } );
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
        } ); */
</script>