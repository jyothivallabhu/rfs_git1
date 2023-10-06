             <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2023 RainbowFish. All rights reserved.</p>
                        <span>
                            <a href="<?= base_url('pages/termsandconditions') ?>" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="<?= base_url('pages/privacy_policy') ?>" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
			
			<!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="primary">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                           
                        </div>
                    </div>
                </div>            
            </div>
            <!-- Quick View END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>   
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5> 
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

          
        </div>
    </div>

    
    <!-- Core Vendors JS -->
	 <?php if($this->uri->segment(2) != 'add_teacher_trial' && $this->uri->segment(2) != 'teacher_triallessonwise'&& $this->uri->segment(2) != 'teacher_mentoring' && $this->uri->segment(3) != 'add_cmentoring' && $this->uri->segment(2) != 'edit_mentoring' && $this->uri->segment(2) != 'edit_teacher_trial'){ ?>
	  
	 <script src="<?= base_url() ?>assets/school_assets/js/bootstrap.min.js"></script>
     <script src="<?= base_url() ?>assets/school_assets/js/vendors.min.js"></script>
	
	
	 
	 
    <script src="<?= base_url() ?>assets/libs/bundle.js"></script>

    <!-- page js -->
    <script src="<?= base_url() ?>assets/school_assets/vendors/chartjs/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/school_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>assets/school_assets/js/pages/dashboard-project.js"></script>

    <!-- Core JS -->
	
	
	  <!-- Main Javascript file -->
	   
  <script src="<?= base_url('assets') ?>/school_assets/js/app.min.js"></script>
	 
  <script src="<?= base_url('assets') ?>/dist/js/jquery.validate.js"></script>
  <script src="<?= base_url('assets') ?>/dist/js/comns.js"></script>
  <script src="<?= base_url('assets') ?>/dist/js/lc.js"></script>
  <script src="https://fmpisnfdb.in/assets/javascript/jquery.dataTables.min.js"></script>
  
  
	<script src="<?=base_url('assets')?>/dist/js/scripts.js"></script>
	<script src="<?=base_url('assets')?>/dist/js/jquery.form.js"></script>
	<script src="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.min.js"></script>
	
	
	<script src="<?= base_url() ?>assets/school_assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/school_assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
	
	<script src="<?= base_url() ?>assets/school_assets/js/cropzee.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/select2/select2.min.js"></script>
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
	 
	<style>
	.input-group > :not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
    margin-left: -1px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.input-group .form-control + .btn.btn-outline-light, .input-group .swal2-modal .swal2-input + .btn.btn-outline-light, .swal2-modal .input-group .swal2-input + .btn.btn-outline-light {
    border-left-color: transparent;
    border-right-color: #ced4da;
}
.input-group .btn.btn-outline-light {
    background: #fff;
    border-color: #ced4da transparent #ced4da #ced4da;
}
.btn.btn-outline-light {
    color: #000 !important;
}


	</style>
	
	<script type="text/javascript">
	$('.select2').select2();
		$(document).ready(function(){
		$("#cropzee-input").cropzee({startSize:  [100, 100, '%'],});
		$("#cropzee-input2").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input3").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input4").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input5").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input6").cropzee({startSize: [100, 100, '%'],});
		
		
tinymce.remove('.grade_comments');



	});
	
	$(document).on('change', 'input[name="header-theme"]', ()=>{
		const context = $('input[name="header-theme"]:checked').val();
		console.log(context)
		$(".app").removeClass (function (index, className) {
			return (className.match (/(^|\\s)is-\\S+/g) || []).join(' ');
			}).addClass( 'is-'+ context );
		});
				
				
	</script>
	
	<script src="<?= base_url('assets') ?>/plugins/tinymce/tinymce.min.js"></script>
  <script>
	base_url  = '<?php echo base_url(); ?>';
	jQuery(document).ready(function() {
		
		if ($("textarea").length > 0 && typeof tinymce == "object") {
			tinymce.baseURL = base_url + "assets/plugins/tinymce";
			tinymce.suffix = ".min"; 
			tinymce.init({
				selector: 'textarea:not(.mceeditor,.mceeditor_description)',
				height: 350,
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
  
	
	<!--<script src="https://cdn.tiny.cloud/1/win51jsrruxja1mcv18duvmxmhl90bn3qmoenc66zmrx0gc1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
<script>

/*  tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
      toolbar: ' undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    }); */
</script>

	<style>
		.container { margin: 50px auto; text-align: center; }
		.image-previewer {
			height: 300px;
			width: 300px;
			border-radius: 10px;
			border: 1px solid lightgrey;
		}
	</style>
	
	<script>
		$('img.downloadable').each(function(){
		  var $this = $(this);
		  $this.wrap('<a href="' + $this.attr('src') + '" download />')
		});
    </script>
	<script>
		



	function searchFilter(page_num) {			 
		
		$("#filter-labels").html('');
		var module = $("#table").data('module');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var sortby  = $( "#sortby option:selected" ).val();
		//var perpage    = $( "#perpage option:selected" ).val();
		var perpage    = 10;
		var academic_year    = $( "#academic_year option:selected" ).val();
		var class_id    = $( "#class_id option:selected" ).val();
		var lesson_id    = $( "#lesson_id option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: site_url+'/'+module+'/ajaxpagination/'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,academic_year:academic_year,class_id:class_id,lesson_id:lesson_id},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				console.log(res);
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#'+module).html(res.html);
			}
		});
	}
	function customsearchFilter(page_num) {			 
		
		$("#filter-labels").html('');
		var module = $("#table").data('module');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var sortby  = $( "#sortby option:selected" ).val();
		//var perpage    = $( "#perpage option:selected" ).val();
		var perpage    = 10;
		var academic_year    = $( "#academic_year option:selected" ).val();
		var class_id    = $( "#class_id option:selected" ).val();
		var lesson_id    = $( "#lesson_id option:selected" ).val();
		$.ajax({
			type: 'POST',
			url: site_url+'/'+module+'/lessonsListajaxpagination/'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,academic_year:academic_year,class_id:class_id,lesson_id:lesson_id},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				console.log(res);
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#'+module).html(res.html);
			}
		});
	}
	
	
	 if ($("#data-table").length) {
		var module = $("#data-table").data('module');
		var section_id = $("#data-table").data('section_id');
		var class_id = $("#data-table").data('class_id');
		var lesson_id = $("#data-table").data('lesson_id');
		table = $('#data-table').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": site_url + '/' + module + '/getAll',
				"type": "POST",
				data: function (d) {
                d.section_id = section_id;
                d.class_id = class_id;
                d.lesson_id = lesson_id;
				d.academic_year = $('#academic_year').val();
                
            },
			},
			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1], //last column
				"orderable": false, //set not orderable
			}, ],
			order: [[0, 'Desc']],
		});
	} 
	
	 
	</script>
	
	
<?php } ?>

<script>
$(document).ready(function(){
// updating the view with notifications using ajax


load_unseen_notification();


 function load_unseen_notification(view = '')
{
	$.ajax({
		type: 'POST',
		url: site_url+'/Notifications/ajNotificationList',
		data:{viewed:view},
		/* beforeSend: function () {
			$('.loading').show();
		}, */
		success: function (res) {
			res = JSON.parse(res);
			$('.notifications').html(res.notification);
			if(res.unseen_notification > 0)
			{
				$('.count').html(res.unseen_notification);
			}else{
				 $(".count").css("display", "none");
			}
		}
	});
}
// load new notifications
$(document).on('click', '.mainnote .notif_li', function(){
	
 var note_id = $(this).attr('data-note_id');

 load_unseen_notification(note_id);
 thisdata = $(this).attr('data-href');
 window.location.href = thisdata;
 
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
 });
 
 
  /* $(function() {
         $('a .notif_li').click(function(event) {
             event.preventDefault();
			 alert('hii');
				load_unseen_notification('yes');
        });
    });  */
	

    $(".notif_li").click(function() {
		
        thisdata = $(this).attr('data-href');
        console.log(thisdata);

		load_unseen_notification('yes');
		
        window.location.href = thisdata;
    });

	
	
</script>
<style>
.count {
    display: inline-block;
    width: 20px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    font-size: 14px;
    color: #000;
    border-radius: 100%;
    position: absolute;
    left: 26px;
    top: -6px;
    background-color: #fff;
}
</style>
</body>

</html>