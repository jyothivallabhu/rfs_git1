<!-- content -->
<div class="content " id="app">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-8 col-md-8 offset-2">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Edit Lesson</h5>
                </div>
                <!--<form class="mb-5" id="lesson_edit_form" method="POST" action="<?= site_url('lessons/update_lesson/').$lessons->lesson_id ?>"  enctype="multipart/form-data">-->
				 <form id="upload-form" id="lessons_add_form" class="upload-form form_class" method="post">
                    <div class="row">

                        <div class="mb-3 col-12 ">
                            <label for="lesson_name" class="form-label">Lesson Name</label>
							<input type="hidden" name="lesson_id" value="<?= $lessons->lesson_id ?>">
                            <input type="text" class="form-control" name="lesson_name" id="lesson_name" value="<?= $lessons->lesson_name ?>" required>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="description" class="form-label">Description </label>
							<textarea class="form-control" name="description" id="description" ><?= $lessons->description ?></textarea >
                            
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="aim_and_objective" class="form-label">Aim & Objective</label>
							<textarea class="form-control" name="aim_and_objective" id="aim_and_objective" ><?= $lessons->aim_and_objective ?></textarea >
							
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
							<textarea class="form-control" name="elements_of_art_covered" id="elements_of_art_covered" ><?= $lessons->elements_of_art_covered ?></textarea >
                        </div>
                         <!--<div class="mb-3 col-12">
                            <label for="final_artwork" class="form-label">Final Artwork	<small style="color:red;font-size: 0.8em;"> Please Upload Image</small></label>
                            <input type="file" class="form-control" name="final_artwork" id="final_artwork"  value="<?= $lessons->final_artwork ?>">
                        </div> -->
						
						
						<div class="form-group">
							<label for="inputState">Final Artwork</label>
							 <input id="cropzee-input" name="artwork_upload1" type="file" name="">
							 <input id="base_code_cropzee-input" type="hidden" name="base_code1" value="">
							<div id="" class="image-previewer" data-cropzee="cropzee-input"><img src="<?=  base_url().$lessons->final_artwork ?>" height="100" width="100" /></div>
						</div>
						
						
                        		
						<div class="mb-3 col-12">
                            <label for="demonstration_video" class="form-label">Is Featured</label>
							<input  type="checkbox" name="is_featuredcheck"  <?= ($lessons->is_featured  == 1 ) ?  'checked' : '' ?> class="form-check-input" id="exampleCheck" value="check">
						</div>
						
						
						
						
                        <div class="mb-3 col-12">
                            <label for="teachers_note" class="form-label">Teachers Note <small style="color:red;font-size: 0.8em;"> Please Upload PDF file</small></label>
							<input type="file" class="form-control" name="teachers_note" id="teachers_note" value="<?= $lessons->teachers_note ?>" >
							<pre id="output"></pre>
                        </div>
						
						
						
						
						<div class="mb-3 col-12 ">
                            <label for="keywords" class="form-label">Keywords	</label>
							<textarea class="form-control" name="keywords" id="keywords" ><?= $lessons->keywords ?></textarea >
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="material_required" class="form-label">Material Required	</label>
							<textarea class="form-control" name="material_required" id="material_required" ><?= $lessons->material_required ?></textarea >
                        </div>
						
						
						
						<div class="mb-3 col-12">
                            <label for="options" class="form-label">Options</label>
							<input type="file" class="form-control" name="options" id="options" value="<?= $lessons->options ?>" >
							<pre id="output"></pre>
							<!--<input class="form-control" name="options" id="editor" required value="<?= $lessons->options ?>" >-->
                        </div>
						
						
						<div class="mb-3 col-12">
                            <label for="introduction_video" class="form-label">Introduction Video <small style="color:red;font-size: 0.8em;"> Please Upload Video </small></label>
                            <input type="file" class="form-control" name="introduction_video" id="introduction_video" value="<?= $lessons->introduction_video ?>">
                        </div>
						<div class="mb-3 col-12">
                            <label for="demonstration_video" class="form-label">Demonstration Video <small style="color:red;font-size: 0.8em;"> Please Upload Video </small></label>
                            <input type="file" class="form-control" name="demonstration_video" id="demonstration_video" value="<?= $lessons->demonstration_video ?>" >
                        </div>
						<div class="mb-3 col-12">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status">
								<option value="1" <?php if($lessons->status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($lessons->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
                        </div>
						<div class="row align-items-center">
							<div class="col">
								<div class="progress" style="display: none;">
									<div id="file-progress-bar" class="progress-bar"></div>
								</div>
							</div>
						</div>
                        
						<div id="chk_error"></div>
                        
						
                    </div>
					<br>

                    <button type="submit" id="save_button" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('lessons') ?>" class="btn btn-outline-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->
<script src="<?= base_url('assets') ?>/plugins/tinymce/tinymce.min.js"></script>
  <script>
	base_url  = '<?php echo base_url(); ?>';
	jQuery(document).ready(function() {
		
		if ($("textarea").length > 0 && typeof tinymce == "object") {
			tinymce.baseURL = base_url + "assets/plugins/tinymce";
			tinymce.suffix = ".min"; 
			tinymce.init({
				selector: 'textarea:not(.mceeditor,.mceeditor_description)',
				height: 500,
				placeholder:'',
				inline_styles : true,
				menubar: "edit insert view format table tools",
				plugins: [
					" advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table directionality emoticons template paste "
				], 
				statusbar: false,
				toolbar: "formatselect fontselect fontsizeselect | bold italic | superscript subscript | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
				relative_urls: false,
				browser_spellcheck: true,
				file_picker_types: 'file image media',
				codemirror: {
					indentOnInit: true,
					path: 'CodeMirror'
				},
				image_advtab: true,
				images_upload_url: 'ajax/image_upload',
				images_upload_base_path: base_url,
				images_upload_credentials: true,
				images_upload_handler: function (blobInfo, success, failure) {
					var xhr, formData;
					xhr = new XMLHttpRequest();
					xhr.withCredentials = false;
					xhr.open('POST', base_url+'ajax/image_upload');
					xhr.onload = function() {
					  var json;
					  if (xhr.status != 200) {
						failure('HTTP Error: ' + xhr.status);
						return;
					  }
					  json = JSON.parse(xhr.responseText);
					  if (!json || typeof json.location != 'string') {
						failure('Invalid JSON: ' + xhr.responseText);
						return;
					  } 
					  success(json.location);
					  
					};

					formData = new FormData();
					formData.append('file', blobInfo.blob(), blobInfo.filename());
					formData.append('csrf_test_name', $.cookie('csrf_cookie_name'));

					xhr.send(formData);
				},
				setup : function(ed) {
					ed.on('KeyUp', function (e) {
						 tinyMCE.activeEditor.targetElm.value = tinyMCE.activeEditor.getContent();
					});					
				},
				init_instance_callback: function (editor) {
					editor.on('ExecCommand', function (e) {
					  
					});
					editor.on('NodeChange', function (e) {
					  tinyMCE.activeEditor.targetElm.value = tinyMCE.activeEditor.getContent();
					});
				}

			}); 

		  
		}
	 
	 
	});
	
  </script>

<script type="text/javascript">
    jQuery(document).on('submit', '#upload-form', function(e) {
        jQuery("#chk_error").html('');
		
		var description=$('#description').val();
		if(description=='')
		{
		$('#chk_error').html('Please Enter Description');	
		return false;

		}
        jQuery('.progress').show();
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(element) {
                    if (element.lengthComputable) {
                        var percentComplete = Math.round(((element.loaded / element.total) * 100));
                        $("#file-progress-bar").width(percentComplete + '%');
                        $("#file-progress-bar").html(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: "<?php echo base_url(); ?>lessons/edit_upl",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
                $("#file-progress-bar").width('0%');
            },
            success: function(res) {

                var j = res;
				/* alert(j.status); */
                if (j.status == 'success') {
					$("#chk_error").show("slow").delay(3000).hide("slow");
					$("#chk_error").html(j.msg);
					setTimeout(function() {
					   window.location.href = j.url
					}, 2000);
					
                   /*  window.location = j.url; */
                } else  {
					/* else if (j.status == 'failed') { */
                    
					$("#chk_error").show("slow").delay(3000).hide("slow");
					$("#chk_error").html(j.msg);
					
                }
            }
        });
    });

    // Check File type validation
    $("#upl-file").change(function() {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        var file = this.files[0];
        var fileType = file.type;
        if (!allowedTypes.includes(fileType)) {
            jQuery("#chk_error").html('<small class="text-danger">Please choose a valid file (JPEG/JPG/PNG/GIF/PDF/DOC/DOCX)</small>');
            $("#upl-file").val('');
            return false;
        } else {
            jQuery("#chk_error").html('');
        }
    });
</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
