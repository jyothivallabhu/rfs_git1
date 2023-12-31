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
                            <label for="description" class="form-label">Description</label>
							<textarea class="form-control" name="description" id="description" ><?= $lessons->description ?></textarea >
                            
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="aim_and_objective" class="form-label">Aim & Objective</label>
							<textarea class="form-control" name="aim_and_objective" id="aim_and_objective" ><?= $lessons->aim_and_objective ?></textarea >
							
                        </div>
						
						<div class="mb-3 col-12 ">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" name="duration" id="duration"  value="<?= $lessons->duration ?>" >
                        </div>
						<div class="mb-3 col-12 ">
                            <label for="artist_art_movement" class="form-label">Artist / Art movement</label>
                            <input type="text" class="form-control" name="artist_art_movement"  value="<?= $lessons->artist_art_movement ?>" id="artist_art_movement">
                        </div>
						
                        <div class="mb-3 col-12 ">
                            <label for="technique" class="form-label">Technique</label>
                            <input type="text" class="form-control" name="technique" id="technique"  value="<?= $lessons->technique ?>" >
                        </div>
                         <div class="mb-3 col-12 ">
                            <label for="medium" class="form-label">Medium	</label>
                            <input type="text" class="form-control" name="medium" id="medium"  value="<?= $lessons->medium ?>" >
                        </div>
                        
                         <div class="mb-3 col-12 ">
                            <label for="elements_of_art_covered" class="form-label">Elements or Principles of Art Covered Art Movement	</label>
							<textarea class="form-control" name="elements_of_art_covered" id="elements_of_art_covered" ><?= $lessons->elements_of_art_covered ?></textarea >
                        </div>
                         <!--<div class="mb-3 col-12">
                            <label for="final_artwork" class="form-label">Final Artwork	<small style="color:red;font-size: 0.8em;"> Please Upload Image</small></label>
                            <input type="file" class="form-control" name="final_artwork" id="final_artwork"  value="<?= $lessons->final_artwork ?>">
                        </div> -->
						
						
						<!--<div class="form-group">
							<label for="inputState">Final Artwork</label>
							 <input id="cropzee-input" name="artwork_upload1" type="file" name="">
							 <input id="base_code_cropzee-input" type="hidden" name="base_code1" value="">
							<div id="" class="image-previewer" data-cropzee="cropzee-input"><img src="<?=  base_url().$lessons->final_artwork ?>" height="100" width="100" /></div>
						</div>-->
						
						<div class="mb-3 col-12 ">
						 <div id="ic-main" class="ibox">
							<div class="ic-btns clearfix">
								<div id="ic-upload-btn" class="l but lrg file-button w3-button w3-blue">
									<span id="ic-upload-btn-label" style="font-family: inherit;font-size: inherit;">Final Artwork</span>
									<input class="file-input" accept="image/*" capture  type="file" name="artwork_upload" />
									<input id="base_code" type="hidden" name="base_code1" value="">
								</div>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="cropmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document" style="margin-top: 240px">
								<div class="modal-content">
								<div class="modal-body">
								 
								  <div id="ic-cropper-wrap"></div>
									<div class="ic-hidden ic-crop-btn-wrap"><br />
										<div id="ic-rotate-btn" class="l but lrg w3-button w3-grey">
											<svg x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
												<path d="M41.038,24.1l-7.152,9.342L26.734,24.1H31.4c-0.452-4.397-4.179-7.842-8.696-7.842c-4.82,0-8.742,3.922-8.742,8.742 s3.922,8.742,8.742,8.742c1.381,0,2.5,1.119,2.5,2.5s-1.119,2.5-2.5,2.5c-7.576,0-13.742-6.165-13.742-13.742 s6.166-13.742,13.742-13.742c7.274,0,13.23,5.686,13.697,12.842H41.038z" />
											</svg>
											Rotate
										</div>
										<div id="ic-flip-btn" class="l but lrg w3-button w3-grey">Flip</div> 
										<a id="ic-crop-btn" class="l but lrg w3-button w3-grey">Done</a>
									</div>
								
								</div>
								</div>
							  </div>
							</div>
						<div id="ic-cropper-wrap1"><img src="<?=  base_url().$lessons->final_artwork ?>" height="100" width="100" /></div>
						   
						</div>
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
                        
                        <?= $lessons->introduction_video ?>
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
                        <div class="form-group col-md-9">
                            <span id="chk_error"></span>
                        </div>
                    </div>

                    <button type="submit" id="save_button" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('lessons') ?>" class="btn btn-outline-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>


	<style>
	
	
	.error{
	    color: orangered !important;
	}


/*new crop*/
.icrop-wrap{
    position:relative
}
.icrop-clip-canv,.icrop-preview-canv{
    display:block
}
.icrop-clip-canv,.icrop-bg{
    position:absolute;
    top:0;
    left:0
}
.icrop-bg{
    background:#000;
    opacity:.5;
    filter:alpha(opacity=50)
}
.icrop-clip-wrap{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    overflow:hidden
}
.icrop-clip-canv{
    position:absolute;
    top:0;
    left:0
}
.icrop-box{
    position:absolute;
    top:0;
    left:0;
    width:0;
    height:0;
    display:none;
    cursor:move;
    border:1px dashed #0cf;
    touch-action:none
}
.icrop-transition{
    transition:top .5s,left .5s,width .5s,height .5s
}
.notransition{
    -webkit-transition:none!important;
    -moz-transition:none!important;
    -o-transition:none!important;
    transition:none!important
}
.resize{
    position:absolute;
    z-index:3;
    width:17px;
    height:17px;
    background:#ccc;
    background:rgba(255,255,255,.6);
    border:1px solid #333;
    border-radius:2px
}
.N{
    top:-10px;
    left:-10px
}
.W{
    top:-10px;
    left:-10px
}
.S{
    left:-10px;
    bottom:-10px
}
.E{
    right:-10px;
    top:-10px
}
.N,.S{
    cursor:ns-resize
}
.E,.W{
    cursor:ew-resize
}
.NW,.SE{
    cursor:nw-resize
}
.NE,.SW{
    cursor:ne-resize
}
.NW,.NE{
    top:-10px
}
.SE,.SW{
    bottom:-10px
}
.NW,.SW{
    left:-10px
}
.NE,.SE{
    right:-10px
}
.wrapN,.wrapS{
    position:absolute;
    left:50%
}
.wrapE,.wrapW{
    position:absolute;
    top:50%
}
.wrapN{
    top:0
}
.wrapS{
    bottom:0
}
.wrapE{
    right:0
}
.wrapW{
    left:0
}

.file-input{
    position:absolute;
    right:0;
    top:0;
    font-family:helvetica,arial;
    font-size:118px;
    margin:0;
    padding:0;
    cursor:pointer;
    opacity:0
}
.file-button{
    position:relative;
    overflow:hidden;
    direction:ltr
}
.ibox{
    /* background:#e5fafd; */
    border:1px solid #ccc;
    padding:19px;
    border-radius:3px
}
.clearfix:after,.c-text:after{
    visibility:hidden;
    display:block;
    content:"";
    clear:both;
    height:0
}


.but{
    text-align:center;
    height:32px;
    font:16px/30px helvetica,arial;
    display:inline-block;
    cursor:pointer;
    padding:0 10px;
    text-decoration:none;
    border-radius:3px;
    box-sizing:border-box;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;
    user-select:none;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none
}
.but:hover{
    text-decoration:none;
    box-shadow:-1px 1px 1px rgba(0,0,0,.2);
    z-index:2
}
.but:active{
    box-shadow:none
}

.but.lrg{
    height:36px;
    line-height:34px;
    border-radius:4px
}
.but.l{
    color:#000000;
    fill:#000000;
    border:1px solid #ccc;
    background:#cbecf1
}
.but.l:hover{
    border:1px solid #999
}

/* PAGE */

#ic-cropper-wrap .icrop-wrap{
  margin-top:20px
}

.ic-btns{
  margin:-5px
}

.ic-btns .but,#ic-auto-crop-padding{
  float:left;
  margin:5px
}

#ic-auto-crop-btn{
  margin-right:-11px;
  border-radius:4px 0 0 4px;
  position:relative;
  z-index:1
}

#ic-auto-crop-padding{
  width:75px;
  height:36px;
  border-radius:0 4px 4px 0;
  padding-left:10px
}

#ic-rotate-btn svg{
  width:28px;
  height:28px;
  float:left;
  margin:3px 3px 3px -3px;
  color: white;
}

#ic-crop-btn-wrap{
  margin-top:20px;
  margin-bottom:20px;
}

#ic-download-wrap{
  margin-top:20px
}

#ic-download-btn{
  vertical-align:middle;
  margin-right:10px
}

#ic-download-wrap .select{
  height:34px;
  line-height:34px
}

#ic-download-wrap select{
  line-height:34px
}

#ic-info{
  vertical-align:middle;
  margin-left:10px
}

.ic-hidden{
  display:none
}

/*.swal2-container{*/
/*    height: 40px !important;*/
/*    font-size: 18px !important;*/
/*    z-index:9999;*/
/*}*/
</style>

			<script src='https://jasonlau.biz/cropper-dev/jquery-1.12.4.js'></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



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
		/* var description=$('#description').val();
		if(description=='')
		{
		$('#chk_error').html('Please Enter Description');	
		return false;

		} */
	
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
				/* alert(j.msg); */
                if (j.status == 'success') {
                    window.location = j.url;
                } else  {
					/* else if (j.status == 'failed') { */
                    $("#chk_error").show("slow").delay(5000).hide("slow");
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

<script>
    $w = $(window);
$d = $(document);

(function(y) {
    y.ImageCropper = function(z, y, E) {
        function A(b) {
            F();
            t.show();
            t.addClass("notransition");
            c.addClass("notransition");
            t[0].offsetHeight;
            c[0].offsetHeight;
            t.removeClass("notransition");
            c.removeClass("notransition");
            t.addClass("icrop-transition");
            c.addClass("icrop-transition");
            b ? B.setVals(b.x, b.y, b.w, b.h) : B.setVals(0, 0, c.width(), c.height());
            clearTimeout(G);
            G = setTimeout(function() {
                t.removeClass("icrop-transition");
                c.removeClass("icrop-transition")
            }, 1E3)
        }

        function C() {
            var b = Math.min(y, u.width()),
                a;
            n / p > b / E ? a = b / n * p : (a = E, b = a / p * n);
            q.css({
                width: b,
                height: a
            });
            c.css({
                width: b,
                height: a
            });
            q[0].width = n;
            q[0].height = p;
            c[0].width = n;
            c[0].height = p;
            H(q[0], I, d, e);
            H(c[0], M, d, e);
            F()
        }

        function H(b, a, m, l) {
            a.clearRect(0, 0, b.width, b.height);
            a.translate(b.width / 2, b.height / 2);
            var h = 90 === l || 270 === l;
            a.scale(v && !h || w && h ? -1 : 1, w && !h || v && h ? -1 : 1);
            0 < l ? (a.rotate(l / 180 * Math.PI), 180 === l ? (a.translate(-b.width / 2, -b.height / 2), a.drawImage(m, 0, 0, b.width, b.height), a.translate(b.width / 2, b.height / 2)) : (a.translate(-b.height / 2, -b.width /
                2), a.drawImage(m, 0, 0, b.height, b.width), a.translate(b.height / 2, b.width / 2)), a.rotate(-l / 180 * Math.PI)) : a.drawImage(m, -b.width / 2, -b.height / 2, b.width, b.height);
            a.scale(1, 1);
            a.translate(-b.width / 2, -b.height / 2)
        }

        function F() {
            N.height(q.height()).width(q.width())
        }

        function O(b) {
            var a = n,
                m = p,
                l = I.getImageData(0, 0, a, m).data,
                h, k = [r(l, a, 0, 0), r(l, a, a - 1, 0), r(l, a, a - 1, l.length / 4 / a - 1), r(l, a, 0, l.length / 4 / a - 1)];
            h = {};
            for (var g = 0; g < k.length; g++) {
                var c = k[g].r + "," + k[g].b + "," + k[g].g + "," + k[g].a;
                h[c] = h[c] ? h[c] + 1 : 1
            }
            var k = 0,
                g = "",
                d;
            for (d in h) h.hasOwnProperty(d) && h[d] > k && (k = h[d], g = d);
            g = g.split(",");
            h = g = {
                r: g[0],
                g: g[1],
                b: g[2],
                a: g[3]
            };
            k = d = 0;
            g = a;
            c = m;
            d = 0;
            a: for (; d < a; d++) {
                for (var e = k; e < m; e++) {
                    var f = x(h, r(l, a, d, e));
                    if (1024 < f) break a
                }
                g--
            }
            k = 0;
            a: for (; k < m; k++) {
                for (e = d; e < a; e++)
                    if (f = x(h, r(l, a, e, k)), 1024 < f) break a;
                c--
            }
            g;
            a: for (; 0 < g; g--)
                for (e = k; e < k + c; e++)
                    if (f = x(h, r(l, a, d + g, e)), 1024 < f) break a;
            c;
            a: for (; 0 < c; c--)
                for (e = d; e < d + g; e++)
                    if (f = x(h, r(l, a, e, k + c)), 1024 < f) break a;
            return 0 === g || 0 === c ? {
                x: 0,
                y: 0,
                w: a,
                h: m
            } : {
                x: Math.max(0, d - b),
                y: Math.max(0, k - b),
                w: Math.max(0,
                    Math.min(a, g + 2 * b)),
                h: Math.max(0, Math.min(m, c + 2 * b))
            }
        }

        function r(b, a, d, e) {
            a = a * e + d;
            return {
                r: b[4 * a],
                g: b[4 * a + 1],
                b: b[4 * a + 2],
                a: b[4 * a + 3]
            }
        }

        function x(b, a) {
            return (b.r - a.r) * (b.r - a.r) + (b.g - a.g) * (b.g - a.g) + (b.b - a.b) * (b.b - a.b) + (b.a - a.a) * (b.a - a.a)
        }
        z = $(z);
        var u = $('<div class="icrop-wrap"><canvas class="icrop-preview-canv"></canvas><div class="icrop-bg"></div><div class="icrop-box" style="position:absolute"><div class="icrop-clip-wrap"><canvas class="icrop-clip-canv"></canvas></div></div>'),
            t = u.find(".icrop-box"),
            N = u.find(".icrop-bg"),
            q = u.find(".icrop-preview-canv"),
            c = u.find(".icrop-clip-canv");
        z.html(u);
        var D, f = this,
            n, p, e = 0,
            w = !1,
            v = !1,
            d = new Image,
            J = "",
            K = 0,
            L = "",
            B = new Dragger(t, c, function(b, a, d, e) {
                b = parseInt(b);
                a = parseInt(a);
                c.css({
                    left: -b,
                    top: -a
                });
                D && D()
            }),
            I = q[0].getContext("2d"),
            M = c[0].getContext("2d");
        f.getFilename = function() {
            return J
        };
        f.getTemplateId = function() {
            return K
        };
        f.getOriginalUrl = function() {
            return L
        };
        f.setMoveCallback = function(b) {
            D = b
        };
        f.setSrc = function(b, a, c, f) {
            e = 0;
            v = w = !1;
            $(d).off("load").on("load", function() {
                n = d.naturalWidth;
                p = d.naturalHeight;
                C();
                A()
            });
            d.src = b;
            J = a;
            K = ~~c;
            L = f || ""
        };
        f.getFinalDataUrl = function(b) {
            var a;
            a = f.getVals();
            a = 0 !== a.x || 0 !== a.y || a.w !== d.naturalWidth || a.h !== d.naturalHeight || 0 !== e || w || v ? !0 : !1;
            if (!a && "data:" === d.src.substr(0, 5)) return d.src;
            a = f.getVals();
            var c = $("<canvas>").attr({
                width: a.w,
                height: a.h
            });
            c[0].getContext("2d").drawImage(q[0], a.x, a.y, a.w, a.h, 0, 0, a.w, a.h);
            return c[0].toDataURL(b)
        };
        f.setVals = function(b) {
            var a = c.width() / (90 === e || 270 === e ? d.naturalHeight : d.naturalWidth);
            A({
                x: Math.round(b.x * a),
                y: Math.round(b.y * a),
                w: Math.round(b.w * a),
                h: Math.round(b.h * a)
            })
        };
        f.getVals = function() {
            var b = (90 === e || 270 === e ? d.naturalHeight : d.naturalWidth) / c.width(),
                a = (90 === e || 270 === e ? d.naturalWidth : d.naturalHeight) / c.height(),
                f = B.getVals();
            return {
                x: Math.round(f.x * b),
                y: Math.round(f.y * a),
                w: Math.round(f.w * b),
                h: Math.round(f.h * a)
            }
        };
        /*f.autoCrop = function(b) {
            f.setVals(O(b))
        };*/
        f.rotateClockwise = function() {
            e = 270 === e ? 0 : e + 90;
            var b = n;
            n = p;
            p = b;
            C();
            A()
        };
        f.flipHorizontal = function() {
            90 === e || 270 === e ? w = !w : v = !v;
            C()
        };
        var G
    }
})(window);

(function(d, aa, v, D, ia) {

    function pa(a) {
        a.css({
            height: 0
        });
        var b = parseInt(a.css("borderTopWidth")) + a[0].scrollHeight + parseInt(a.css("borderBottomWidth"));
        a.css({
            height: b
        })
    }

    function ba(a, b, c, e, u) {
        b = b || 100;
        u = qa && u;
        var p, B, l, d, h, g, v = function() {
            var C = +new Date;
            C - d < b && (!e || C - h < e) && !u ? p = setTimeout(v, b - (C - d)) : (p = null, c || (g = a.apply(l, B), l = B = null))
        };
        return function() {
            l = this;
            B = arguments;
            d = +new Date;
            h || (h = +new Date);
            var e = c && !p;
            p || (p = u ? qa(v) : setTimeout(v, b));
            e && (g = a.apply(l, B), l = B = null);
            return g
        }
    }

    function K(a) {
        a = a || d.event;
        a.stopPropagation && a.stopPropagation();
        a.preventDefault && a.preventDefault();
        a.cancelBubble = !0;
        a.cancel = !0;
        return a.returnValue = !1
    }
    
    d.Dragger = function(a, b, c, d) {
        function h(a, n, b, f, Z, d) {
            k = a;
            m = n;
            r = b;
            t = f;
            Z !== ia && null !== Z && (w = Z, J = Math.floor((w + 90) / 360));
            a = w ? "rotate(" + w + "deg)" : "";
            c && c(k, m, r, t, w);
            n = {
                transform: a,
                left: ~~k - 1,
                top: ~~m - 1,
                width: ~~r,
                height: ~~t
            };
            d && (n.transform += (w ? " " : "") + "scale3d(0,0,0)");
            z.css(n);
            d && (z.css({
                transition: "1s",
                transform: a + (w ? " " : "") + "scale3d(1,1,1)"
            }), setTimeout(function() {
                z.css({
                    transition: ""
                })
            }, 1500))
        }

        function p(a) {
            K(a);
            y = O.width();
            x = O.height();
            M = r;
            N = t;
            P = k;
            A = m;
            Y = a.clientX;
            R = a.clientY;
            Z = -Math.sin(w / 180 * Math.PI) * (t / 2 + 20);
            n = -Math.cos(w / 180 * Math.PI) * (t / 2 + 20);
            $("body").addClass("nosel");
            D.on("vmousemove", B).on("vmouseup", H);
            10 === q && (L || (L = $('<div class="drag-rotate-msg">'), z.parent().append(L)), v(), L.show())
        }

        function B(a) {
            if (q) {
                E = a.clientX - Y;
                F = a.clientY - R;
                k = P;
                m = A;
                1 === q && (k = P + E, m = A + F, C && 0 === w % 360 ? (0 > k ? k = 0 : k + r > y && (k = y - r), 0 > m ? m = 0 : m + t > x && (m = x - t)) : (k + r < g ? k = g - r : k > y - g && (k = y - g), m + t < g ? m = g - t : m > x - g && (m = x - g)), C || 0 !== w % 180 || (3 > Math.abs(k) ?
                    k = 0 : 3 > Math.abs(k + r - y) && (k = y - r), 3 > Math.abs(m) ? m = 0 : 3 > Math.abs(m + t - x) && (m = x - t)));
                if (10 === q) {
                    var b = n - F;
                    a = Math.atan((Z + E) / b) / Math.PI * 180;
                    var f = Math.abs(a % 90);
                    if (2 > f || 88 < f) a = 90 * Math.round(a / 90);
                    0 < b && (a += 180);
                    b = (w - 360 * J) % 360; - 90 <= a && 0 > a && 270 >= b && 180 < b ? J++ : -90 <= b && 0 > b && 270 >= a && 180 < a && J--;
                    w = a + 360 * J;
                    v()
                }
                a = 0 === w % 360;
                a || (b = l(E, F, -w), E = b.x, F = b.y);
                if (G)
                    if (6 === q || 8 === q) E = Math.round(G * F);
                    else if (7 === q || 9 === q) E = -Math.round(G * F);
                var c = f = b = !1,
                    d = !1;
                if (2 === q || 6 === q || 7 === q) m = A + F, t = N - F, C && a ? 0 > m && (m = 0, t = N + A) : m + t < g ? t = g - m :
                    m > x - g && (m = x - g, t = N + A - m), t < g && (t = g, m = A + N - g), !C && a && 3 > Math.abs(m) && (t += m, m = 0, b = 6 === q, c = 2 !== q);
                else if (4 === q || 8 === q || 9 === q) t = N + F, C && a ? m + t > x && (t = x - m) : t < g - m && (t = g - m), t < g && (t = g), !C && a && 3 > Math.abs(m + t - x) && (t = x - m, b = 9 === q, c = 4 !== q);
                if (5 === q || 6 === q || 9 === q) k = P + E, r = M - E, C && a ? 0 > k && (k = 0, r = M + P) : k + r < g ? r = g - k : k > y - g && (k = y - g, r = M + P - k), r < g && (r = g, k = P + M - g), !C && a && 3 > Math.abs(k) && (r += k, k = 0, f = 6 === q, d = 5 !== q);
                else if (3 === q || 7 === q || 8 === q) r = M + E, C && a ? k + r > y && (r = y - k) : r < g - k && (r = g - k), r < g && (r = g), !C && a && 3 > Math.abs(k + r - y) && (r = y - k, f = 7 === q,
                    d = 3 !== q);
                G && (c && (b && (k += r - Math.round(G * t)), r = G * t), d && (f && (m += t - Math.round(r / G)), t = r / G));
                a || 1 === q || 10 === q || (a = k - P + (r - M) / 2, b = m - A + (t - N) / 2, k -= a, m -= b, b = l(a, b, w), k += b.x, m += b.y);
                h(k, m, r, t, w)
            }
        }

        function l(a, b, n) {
            var f = Math.sqrt(a * a + b * b);
            b = f ? Math.asin(b / f) : 0;
            0 > a && (b = Math.PI - b);
            b += n / 180 * Math.PI;
            return {
                x: Math.cos(b) * f,
                y: Math.sin(b) * f
            }
        }

        function v() {
            L.text("rotation: " + Math.round(10 * w) / 10 + "\u00b0")
        }

        function H() {
            10 === q && L.hide();
            q = 0;
            G && (G = r / t);
            $("body").removeClass("nosel");
            D.off("vmouseup", H)
        }
        d = d || {};
        var g = d.minWidth ||
            20,
            Q = !0,
            C = d.enforceBoundary !== ia ? d.enforceBoundary : !0,
            z = $(a),
            O = $(b),
            L, k = 0,
            m = 0,
            r = g,
            t = g,
            w = 0,
            J = 0,
            G, P, A, M, N, q, E, F, y, x, Y, R, Z, n, f = "N E S W NW NE SE SW".split(" ");
        a = "";
        for (b = 0; b < f.length; b++) a = 4 > b ? a + ('<div class="wrap' + f[b] + '"><div class="resize ' + f[b] + '" data-dir="' + f[b] + '"></div></div>') : a + ('<div class="resize ' + f[b] + '" data-dir="' + f[b] + '"></div>');
        this.getVals = function() {
            return {
                x: k,
                y: m,
                w: r,
                h: t,
                rotation: w
            }
        };
        this.setVals = h;
        this.constrainVals = function() {
            if (0 === w) {
                y = O.width();
                x = O.height();
                var a = k,
                    b = m,
                    n = r,
                    f = t;
                C ? (0 > a && (a = 0), 0 > b && (b = 0), n > y && (f *= y / n, n = y), f > x && (n *= x / f, f = x), a > y - n && (a = y - n), b > x - f && (b = x - f)) : (a + n < g && (a = g - n), b + f < g && (b = g - f), a > y - g && (a = y - g), b > x - g && (b = x - g));
                a === k && b === m && n === r && f === t || h(a, b, n, f, w)
            }
        };
        this.lockRatio = function() {
            G = r / t
        };
        this.toggleDrag = function(a) {
            Q = !!a
        };
        this.dragEnabled = function() {
            return Q
        };
        z.on("vmousedown", function(a) {
            Q && (q = 1, p(a))
        }).on("vmousedown", ".resize", function(a) {
            Q &&
                (q = $(this).hasClass("drag-rotate") ? 10 : f.indexOf($(this).attr("data-dir")) + 2, p(a))
        });
        z.append(a)
    };
    
    (function(a, b, c, d) {
        function h(a) {
            for (; a && "undefined" !== typeof a.originalEvent;) a = a.originalEvent;
            return a
        }

        function p(b) {
            for (var c = {}, d, e; b;) {
                d = a.data(b, k);
                for (e in d) d[e] && (c[e] = c.hasVirtualBinding = !0);
                b = b.parentNode
            }
            return c
        }

        function v() {
            J && (clearTimeout(J), J = 0);
            J = setTimeout(function() {
                x = J = 0;
                M.length = 0;
                N = !1;
                q = !0
            }, a.vmouse.resetTimerDuration)
        }

        function l(b, c, f) {
            var g, m;
            if (!(m = f && f[b])) {
                if (f = !f) a: for (f = c.target; f;) {
                    if ((m = a.data(f, k)) && (!b || m[b])) break a;
                    f = f.parentNode
                }
                m = f
            }
            if (m) {
                g =
                    c;
                f = g.type;
                var l, p;
                g = a.Event(g);
                g.type = b;
                b = g.originalEvent;
                m = a.event.props; - 1 < f.search(/^(mouse|click)/) && (m = t);
                if (b)
                    for (p = m.length, l; p;) l = m[--p], g[l] = b[l]; - 1 < f.search(/mouse(down|up)|click/) && !g.which && (g.which = 1);
                if (-1 !== f.search(/^touch/) && (l = h(b), f = l.touches, l = l.changedTouches, b = f && f.length ? f[0] : l && l.length ? l[0] : d))
                    for (f = 0, m = r.length; f < m; f++) l = r[f], g[l] = b[l];
                a(c.target).trigger(g)
            }
            return g
        }

        function D(b) {
            var c = a.data(b.target, m);
            N || x && x === c || !(c = l("v" + b.type, b)) || (c.isDefaultPrevented() && b.preventDefault(),
                c.isPropagationStopped() && b.stopPropagation(), c.isImmediatePropagationStopped() && b.stopImmediatePropagation())
        }

        function H(b) {
            var c = h(b).touches,
                d;
            c && 1 === c.length && (d = b.target, c = p(d), c.hasVirtualBinding && (x = y++, a.data(d, m, x), J && (clearTimeout(J), J = 0), A = q = !1, d = h(b).touches[0], G = d.pageX, P = d.pageY, l("vmouseover", b, c), l("vmousedown", b, c)))
        }

        function g(a) {
            q || (A || l("vmousecancel", a, p(a.target)), A = !0, v())
        }

        function Q(b) {
            if (!q) {
                var c = h(b).touches[0],
                    d = A,
                    e = a.vmouse.moveDistanceThreshold,
                    g = p(b.target);
                (A = A || Math.abs(c.pageX -
                    G) > e || Math.abs(c.pageY - P) > e) && !d && l("vmousecancel", b, g);
                l("vmousemove", b, g);
                v()
            }
        }

        function C(a) {
            if (!q) {
                q = !0;
                var b = p(a.target),
                    c;
                l("vmouseup", a, b);
                !A && (c = l("vclick", a, b)) && c.isDefaultPrevented() && (c = h(a).changedTouches[0], M.push({
                    touchID: x,
                    x: c.clientX,
                    y: c.clientY
                }), N = !0);
                l("vmouseout", a, b);
                A = !1;
                v()
            }
        }

        function z(b) {
            b = a.data(b, k);
            var c;
            if (b)
                for (c in b)
                    if (b[c]) return !0;
            return !1
        }

        function O() {}

        function L(b) {
            var c = b.substr(1);
            return {
                setup: function() {
                    z(this) || a.data(this, k, {});
                    a.data(this, k)[b] = !0;
                    w[b] = (w[b] ||
                        0) + 1;
                    1 === w[b] && F.bind(c, D);
                    a(this).bind(c, O);
                    E && (w.touchstart = (w.touchstart || 0) + 1, 1 === w.touchstart && F.bind("touchstart", H).bind("touchend", C).bind("touchmove", Q).bind("scroll", g))
                },
                teardown: function() {
                    --w[b];
                    w[b] || F.unbind(c, D);
                    E && (--w.touchstart, w.touchstart || F.unbind("touchstart", H).unbind("touchmove", Q).unbind("touchend", C).unbind("scroll", g));
                    var d = a(this),
                        e = a.data(this, k);
                    e && (e[b] = !1);
                    d.unbind(c, O);
                    z(this) || d.removeData(k)
                }
            }
        }
        var k = "virtualMouseBindings",
            m = "virtualTouchID";
        b = "vmouseover vmousedown vmousemove vmouseup vclick vmouseout vmousecancel".split(" ");
        var r = "clientX clientY pageX pageY screenX screenY".split(" "),
            t = a.event.props.concat(a.event.mouseHooks ? a.event.mouseHooks.props : []),
            w = {},
            J = 0,
            G = 0,
            P = 0,
            A = !1,
            M = [],
            N = !1,
            q = !1,
            E = "addEventListener" in c,
            F = a(c),
            y = 1,
            x = 0,
            K;
        a.vmouse = {
            moveDistanceThreshold: 10,
            clickDistanceThreshold: 10,
            resetTimerDuration: 1500
        };
        for (var R = 0; R < b.length; R++) a.event.special[b[R]] = L(b[R]);
        E && c.addEventListener("click", function(b) {
            var c = M.length,
                d = b.target,
                e, g, h, k, l;
            if (c)
                for (e = b.clientX, g = b.clientY, K = a.vmouse.clickDistanceThreshold,
                    h = d; h;) {
                    for (k = 0; k < c; k++)
                        if (l = M[k], h === d && Math.abs(l.x - e) < K && Math.abs(l.y - g) < K || a.data(h, m) === l.touchID) {
                            b.preventDefault();
                            b.stopPropagation();
                            return
                        }
                    h = h.parentNode
                }
        }, !0)
    })(jQuery, d, aa);
})(window, document, $w, $d);

(function() {
    var f = $("#ic-cropper-wrap"),
        h = $("#ic-info"),
        b, d;
        var md = $('#cropmodal');
    $d.on("change", "#ic-upload-btn input", function(a) {
        
        var c = Math.min(600, $("#ic-main").width());
        b = new ImageCropper(f, c, c);
        b.setMoveCallback(function() {
            var a = b.getVals();
            h.text(a.w + "w X " + a.h + "h (x:" + a.x + ", y:" + a.y + ")")
        });
     
        d = a.target.files[0];
        a = new FileReader;
        a.onload = function(a) {
            b.setSrc(a.target.result);
            $(".ic-hidden.ic-crop-btn-wrap").removeClass("ic-hidden");
             md.modal('show'); 
               setTimeout(function() {
       $('#ic-rotate-btn').click();
       $('#ic-rotate-btn').click();
       $('#ic-rotate-btn').click();
       $('#ic-rotate-btn').click();
    }, 200);
           
        $("#ic-cropper-wrap1").empty();
        
        };
        a.readAsDataURL(d);
       
        
        //  $('#ic-flip-btn').trigger('click');
    });
    
    $d.on("click", "#ic-crop-btn", function() {
        if (!b) return !1;
        $(".ic-hidden.ic-result-wrap").removeClass("ic-hidden");
        var a = "image/png" === $("#ic-download-type").val() ? "image/png" : "image/jpeg",
            c = b.getFinalDataUrl(a);
           // $(".theresult").html('<img class="result-image" src="' + c + '" style="width: ' + $(".icrop-clip-wrap").width() + 'px" />'); 
           $("#base_code").val(c);
            $("#ic-cropper-wrap1").html('<img class="result-image" src="' + c + '" style="width: 100%;height:250px;" />'); 
          //  $(".ic-crop-btn-wrap").hide();
          // $(".ic-hidden.ic-download-wrap").removeClass("ic-hidden");
           $("#cropmodal").modal('hide');
      });
    
    // $d.on("click", "#ic-download-btn", function() {
    //     if (!b) return !1;
        
    //     var a = "image/png" === $("#ic-download-type").val() ? "image/png" : "image/jpeg",
    //         c = $(".theresult img").attr("src");
            
    //     if (window.URL && URL.createObjectURL && window.Uint8Array && window.Blob) {
    //         for (var e =
    //                 c, c = 0 <= e.split(",")[0].indexOf("base64") ? atob(e.split(",")[1]) : unescape(e.split(",")[1]), e = e.split(",")[0].split(":")[1].split(";")[0], f = new Uint8Array(c.length), g = 0; g < c.length; g++) f[g] = c.charCodeAt(g);
    //         c = new Blob([f], {
    //             type: e
    //         });
    //         c = URL.createObjectURL(c)
    //     }
    //     this.href = c;
    //     this.download = a = (d ? d.name.split(".")[0] + "_cropped" : "cropped_image") + ("image/png" === a ? ".png" : ".jpg");
    // });
    $d.on("click", "#ic-rotate-btn", function() {
        b && b.rotateClockwise();
    });
    $d.on("click", "#ic-flip-btn", function() {
        b && b.flipHorizontal();
    });
    
    // OPEN THE MODAL
    // $(".cropper").show();
    // $d.on('click', ".open-modal", function(event){
    //     $(".cropper").show();
    // });
    // $d.on('click', ".close-modal", function(event){
    //     $(".cropper").hide();
    // });
})();
</script>


