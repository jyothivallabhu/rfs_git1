

	<!-- Bundle scripts -->
	<script src="<?=base_url('assets')?>/libs/bundle.js"></script>

	<!-- Main Javascript file -->
	<script src="<?=base_url('assets')?>/dist/js/app.min.js"></script>

	<!-- jQuery  -->
	<script src="<?=base_url('assets')?>/dist/js/jquery.min.js"></script>
	<!-- Custom script for all pages -->
	<script src="<?=base_url('assets')?>/dist/js/jquery.form.js"></script>

	<input type="hidden" id="cstn" value="<?php echo $this->security->get_csrf_token_name(); ?>" />
	<input type="hidden" id="cstv" value="<?php echo $this->security->get_csrf_hash(); ?>" />
	<script type="text/javascript">
	$(document).ready(function(){ 
		$.ajaxPrefilter(function(options, originalData, xhr){
			if (options.data) options.data += "&"+$("#cstn").val()+"="+$("#cstv").val()+"";
			});
	 }); 
	</script>
	
	<script>
		/* $('#forgot_msg').delay(5000).fadeOut(300);  */
	</script>

	<script src="<?=base_url('assets')?>/dist/js/jquery.validate.js"></script> 
	<script src="<?=base_url('assets')?>/dist/js/comns.js"></script> 
	<script src="<?=base_url('assets')?>/dist/js/login.js"></script>
	<script src="<?=base_url('assets')?>/dist/js/scripts.js"></script>
</body>


</html>
