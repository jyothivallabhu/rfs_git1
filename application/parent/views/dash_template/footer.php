
 <!-- Core Vendors JS -->
 <?php if($this->uri->segment(2) != 'upload_artwork'){ ?>
	 
    
	 <script src="<?=base_url('assets')?>/js/vendors.min.js"></script>
	
    <!-- page js -->
    <script src="<?=base_url('assets')?>/vendors/chartjs/Chart.min.js"></script>
    <script src="<?=base_url('assets')?>/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?=base_url('assets')?>/js/pages/dashboard-project.js"></script>

    <!-- Core JS -->
	
    <script src="<?=base_url('assets')?>/js/app.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery.form.js"></script>
	<input type="hidden" id="cstn" value="<?php echo $this->security->get_csrf_token_name(); ?>" />
	<input type="hidden" id="cstv" value="<?php echo $this->security->get_csrf_hash(); ?>" />
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajaxPrefilter(function(options, originalData, xhr) {
				if (options.data) options.data += "&" + $("#cstn").val() + "=" + $("#cstv").val() + "";
			});
		});
		
	</script>
	
	<script src="<?= base_url('assets') ?>/js/jquery.validate.js"></script>
	<script src="<?= base_url('assets') ?>/js/comns.js"></script>
	<script src="<?= base_url('assets') ?>/js/login.js"></script>
	<script src="<?= base_url('assets') ?>/js/scripts.js"></script>
	<script src="<?= base_url('assets') ?>/js/photogallery.js"></script>
	<script src="<?= base_url('assets') ?>/js/cropzee.js"></script>
	<script src="<?= base_url('assets') ?>/vendors/select2/select2.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/sweetalert/dist/sweetalert.min.js"></script>
	
	<script src="<?=base_url('assets/plugins/socialshare/')?>sharetastic.js"></script>
	
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
	
	
	<script type="text/javascript">
	$('.select2').select2();
	$('.sharetastic').sharetastic();
$(document).ready(function(){
			$("#cropzee-input").cropzee({startSize: [85, 85, '%'],});
		});
	</script>
	
	
	<?php } ?>
	<script>
    $(document).ready(function() {
      $('ul.first').bsPhotoGallery({
        "classes": "col-lg-2 col-md-4 col-sm-3 col-xs-4 col-xxs-12",
        "hasModal": true,
        // "fullHeight" : false
      });
    });
  </script>

	<style>
		.container { margin: 150px auto; text-align: center; }
		.image-previewer {
			height: 300px;
			width: 300px;
			border-radius: 10px;
			border: 1px solid lightgrey;
		}
	</style>
	
	<script src="<?= BASE_URLPATH ?>assets/plugins/tinymce/tinymce.min.js"></script>
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
</body>

</html>