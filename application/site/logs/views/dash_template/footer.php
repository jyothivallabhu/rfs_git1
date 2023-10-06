  <!-- content-footer -->
  <footer class="content-footer">
      <div>© 2022 Rainbow Fish </div>
      <div>
          <nav class="nav gap-4">
              <a href="#" class="nav-link">Get Help</a>
          </nav>
      </div>
  </footer>
  <!-- ./ content-footer -->

  </div>
  <!-- ./ layout-wrapper -->

  <!-- Bundle scripts -->
  <script src="<?= base_url('assets') ?>/libs/bundle.js"></script>

  <!-- Apex chart -->
  <script src="<?= base_url('assets') ?>/libs/charts/apex/apexcharts.min.js"></script>

  <!-- Slick -->
  <script src="<?= base_url('assets') ?>/libs/slick/slick.min.js"></script>

  <!-- Examples -->
  <script src="<?= base_url('assets') ?>/dist/js/examples/dashboard.js"></script>

  <!-- Main Javascript file -->
  <script src="<?= base_url('assets') ?>/dist/js/app.min.js"></script>
  <script src="<?= base_url('assets') ?>/dist/js/jquery.validate.js"></script>
  <!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>  -->
  <script src="<?= base_url('assets') ?>/dist/js/comns.js"></script>
  <script src="<?= base_url('assets') ?>/dist/js/lc.js"></script>
  <!--<script src="https://fmpisnfdb.in/assets/javascript/jquery.dataTables.min.js"></script>-->
  
  
	<script src="<?=base_url('assets')?>/dist/js/scripts.js"></script>
	<script src="<?=base_url('assets')?>/dist/js/jquery.form.js"></script>
	<script src="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.min.js"></script>
	
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

	<script src="<?=base_url()?>parent/assets/vendors/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/school_assets/js/cropzee.js"></script>
	
	<script src="<?= base_url('assets') ?>/plugins/tinymce/tinymce.min.js"></script>
	
	
	<script type="text/javascript">
	

	$(document).ready(function(){
		$("#cropzee-input").cropzee({startSize:  [100, 100, '%'],});
		$("#cropzee-input2").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input3").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input4").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input5").cropzee({startSize: [100, 100, '%'],});
		$("#cropzee-input6").cropzee({startSize: [100, 100, '%'],});
		
	});
	
	</script>
	
	<style>
	.image-previewer{
		height: 200px !important;
	}
	</style>
	
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
  
	
  <script>
  
  
  function isUrlValid(url) {
	
	   return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
	};

	function isValidURL(string) {
	  document.getElementById("output").innerHTML = (isUrlValid(string) ? "<span class='valid'>valid</span>:   " : "<span class='invalid'>invalid</span>: ") + "" + string + "\n";
		
		$("#output").show("slow").delay(1000).fadeOut("fast");
		
	}
	
	
      $(document).ready(function() {
		  
	$("#lesson_edit_form").validate({
		
		submitHandler:function(form){
			$(form).ajaxSubmit({
					/*data:extraData,*/
					complete: function(xhr) {
					 debugger;					
						/* var j = JSON.parse(xhr.responseText);
						$("#add_cat_msg").html(j.msg);					
						if(j.status){	
						debugger;							
							$("#add_cat_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
							$("#add_cat_msg").html(j.msg);
								window.location=site_url+'/Category';							
							}else {
							} */
					}
				}); 
				
				return false;
			}
		});	

	

          $('.add_cart').click(function() {
              var product_id = $(this).data("productid");
              var product_name = $(this).data("productname");
              var product_price = $(this).data("price");
              var quantity = $('#' + product_id).val();
              if (quantity != '' && quantity > 0) {
                  $.ajax({
                      url: "<?php echo base_url(); ?>Candidate/add",
                      method: "POST",
                      data: {
                          product_id: product_id,
                          product_name: product_name,
                          product_price: product_price,

                          quantity: quantity
                      },
                      success: function(data) {
                          alert("Product Added into Cart");

                          $("#cart_count").attr('data-count', data);
                          // window.location.href = "<?php echo base_url(); ?>Candidate/cart";
                      }
                  });
              } else {
                  alert("Please Enter quantity");
              }
          });

          //   $('#cart_details').load("<?php echo base_url(); ?>Candidate/load");

          $(document).on('click', '.remove_inventory', function() {
              var row_id = $(this).attr("id");
              if (confirm("Are you sure you want to remove this?")) {
                  $.ajax({
                      url: "<?php echo base_url(); ?>Candidate/remove",
                      method: "POST",
                      data: {
                          row_id: row_id
                      },
                      success: function(data) {
                          alert("Product removed from Cart");
                          window.location.reload();
                      }
                  });
              } else {
                  return false;
              }
          });

          $(document).on('click', '#clear_cart', function() {
              if (confirm("Are you sure you want to clear cart?")) {
                  $.ajax({
                      url: "<?php echo base_url(); ?>Candidate/clear",
                      success: function(data) {
                          alert("Your cart has been clear...");
                          window.location.reload();
                      }
                  });
              } else {
                  return false;
              }
          });

      });


      $('.add').click(function() {

          var qty = +$(this).prev().val() + 1;
          $(this).prev().val(qty);
          var row_id = $(this).prev().attr("id");

          $.ajax({
              url: "<?php echo base_url(); ?>Candidate/update_qty",
              method: "POST",
              data: {
                  row_id: row_id,
                  qty: qty
              },
              success: function(data) {

                  window.location.reload();
              }
          });
      });
      $('.sub').click(function() {
          if ($(this).next().val() > 1) {
              var row_id = $(this).next().attr("id");

              if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
              var qty = $(this).next().val();

              $.ajax({
                  url: "<?php echo base_url(); ?>Candidate/update_qty",
                  method: "POST",
                  data: {
                      row_id: row_id,
                      qty: qty
                  },
                  success: function(data) {

                      window.location.reload();
                  }
              });
          }
      });

      $('#confirm_btn').click(function() {

          var price = $(this).data('price');
          $.ajax({
              url: "<?php echo base_url(); ?>Candidate/confirm_order",
              method: "POST",
              data: {
                  price: price
              },
              success: function(data) {

                  var data = JSON.parse(data);
                  if (data.status == 0) {
                      $("#msg").html(data.msg).css("color", "red");
                  } else {
                    $("#cart_body").empty();
                    $("#cart_count").attr('data-count', 0);
                      $("#msg").html(data.msg).css("color", "green");
                  }

                  console.log(data);
                  //   window.location.reload();
              }
          });
      });
	  
	  //jyothi code
	  function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	
	  $('#msg').delay(5000).fadeOut(300); 

  </script>  
  <script>
 /*  $(function() { 
  $('.form_class :has(input[required]) > label.form-label')     
  .after('<span class="required">*</span>') 
  
  $('.form_class :has(checkbox[required]) > label.form-label')     
  .append('<span class="required">*</span>') 
  
  $('.form_class :has(select[required]) > label.form-label')     
  .after('<span class="required">*</span>') 
  })
   */
  
  </script>
  </body>

  </html>