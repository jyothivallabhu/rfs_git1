<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-8 col-md-8">
            <div class="card widget">
			
			
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add Lesson</h5>
                </div>
                <!-- <form class="mb-5"  method="POST" action="<?= site_url('lessons/save_lesson') ?>" enctype="multipart/form-data"> -->
                <form id="upload-form-new" enctype="multipart/form-data" class="upload-form" method="post" novalidate>

                    <div class="row">

                        <div class="mb-3 col-12 ">
                            <label for="lesson_name" class="form-label">Lesson Name</label>
                            <input type="text" class="form-control" name="lesson_name" id="lesson_name" required>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="description" class="form-label">Description </label>
                            <textarea type="text" class="form-control" name="description" id="description" required></textarea>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="aim_and_objective" class="form-label">Aim & Objective</label>
                            <textarea type="text" class="form-control" name="aim_and_objective" id="aim_and_objective"></textarea>
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
                            <input type="text" class="form-control" name="technique" id="technique" required>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="medium" class="form-label">Medium </label>
                            <input type="text" class="form-control" name="medium" id="medium" required>
                        </div>

                        <div class="mb-3 col-12 ">
                            <label for="elements_of_art_covered" class="form-label">Elements or Principles of Art Covered Art Movement </label>
                            <textarea type="text" class="form-control" name="elements_of_art_covered" id="elements_of_art_covered"></textarea>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="final_artwork" class="form-label">Final Artwork <small style="color:red;font-size: 0.8em;"> Please Upload Image</small></label>
                            <input type="file" class="form-control" name="final_artwork" id="final_artwork" required>
                        </div>


                        <div class="mb-3 col-12">
                            <label for="teachers_note" class="form-label">Teachers Note</label>
                            <textarea type="text" class="form-control" name="teachers_note" id="teachers_note"></textarea>
                            <pre id="output"></pre>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="options" class="form-label">Options</label>
                            <input type="text" class="form-control" name="options" id="options" required>
                        </div>


                        <div class="mb-3 col-12">
                            <label for="introduction_video" class="form-label">Introduction Video <small style="color:red;font-size: 0.8em;"> Please Upload Video below 10MB</small></label>
                            <input type="file" class="form-control" name="introduction_video" id="introduction_video" required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="demonstration_video" class="form-label">Demonstration Video <small style="color:red;font-size: 0.8em;"> Please Upload Video below 10MB</small></label>
                            <input type="file" class="form-control" name="demonstration_video" id="demonstration_video" required>
                        </div>

                    </div>

                    <!-- <button type="submit" class="btn btn-primary">Submit</button>
                </form> -->
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="progress" style="display: none;">
                                <div id="file-progress-bar" class="progress-bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="form-group col-md-9">

                            <span id="chk-error"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary float-left" id="upload-file"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->

<script src="https://cdn.tiny.cloud/1/syfcbncbgn1s0qf7ahyy86pp4si0bjdwpb1sa4yooivdic22/tinymce/4/tinymce.min.js" referrerpolicy="origin"></script>
<!--<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>-->
<script>
    // $("#save_button").on('click', function(e) {
    //     e.preventDefault();
    //     $('#lessons_add_form').submit();
    // });


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
</script>
<script type="text/javascript">
    jQuery(document).on('submit', '#upload-form-new', function(e) {
        jQuery("#chk-error").html('');
        jQuery('.progress').show();
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(element) {
                    if (element.lengthComputable) {
                        var percentComplete = ((element.loaded / element.total) * 100);
                        $("#file-progress-bar").width(percentComplete + '%');
                        $("#file-progress-bar").html(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: "<?php echo base_url(); ?>upload/upl",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // dataType: 'json',
            beforeSend: function() {
                $("#file-progress-bar").width('0%');
            },
            success: function(res) {

                var j = res;
    
                if (j.status == 'success') {

                    window.location = j.url;
                } else if (j.status == 'failed') {

                    console.log(res);						
                    $("#chk-error").html(j.msg);

                }

            }

            // success: function(json.status == 'success') {
            //     console.log(json.msg);
            //     if (json == 'success') {
            //         $('#upload-form')[0].reset();
            //         $('#uploaded_file').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');
            //     } else if (json == 'failed') {
            //         $('#uploaded_file').html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
            //     }
            // },
            // error: function(xhr, ajaxOptions, thrownError) {
            //     console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            // }
        });
    });

    // Check File type validation
    // $("#upl-file").change(function() {
    //     var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    //     var file = this.files[0];
    //     var fileType = file.type;
    //     if (!allowedTypes.includes(fileType)) {
    //         jQuery("#chk-error").html('<small class="text-danger">Please choose a valid file (JPEG/JPG/PNG/GIF/PDF/DOC/DOCX)</small>');
    //         $("#upl-file").val('');
    //         return false;
    //     } else {
    //         jQuery("#chk-error").html('');
    //     }
    // });
</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
