   <!-- Core Vendors JS -->
    <script src="<?=base_url('assets')?>/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="<?=base_url('assets')?>/js/app.min.js"></script>

	<!-- jQuery  -->
	<script src="<?=base_url('assets')?>/js/jquery.min.js"></script>
	<!-- Custom script for all pages -->
	<script src="<?=base_url('assets')?>/js/jquery.form.js"></script>

	<input type="hidden" id="cstn" value="<?php echo $this->security->get_csrf_token_name(); ?>" />
	<input type="hidden" id="cstv" value="<?php echo $this->security->get_csrf_hash(); ?>" />
	<script type="text/javascript">
	$(document).ready(function(){ 
		$.ajaxPrefilter(function(options, originalData, xhr){
			if (options.data) options.data += "&"+$("#cstn").val()+"="+$("#cstv").val()+"";
			});
	 }); 
	</script>

	<script src="<?=base_url('assets')?>/js/jquery.validate.js"></script> 
	<script src="<?=base_url('assets')?>/js/comns.js"></script> 
	<script src="<?=base_url('assets')?>/js/login.js"></script>
	<script src="<?=base_url('assets')?>/js/scripts.js"></script>
	  
   <script src="<?= base_url('assets') ?>/vendors/select2/select2.min.js"></script>
   <script type="text/javascript">
	$('.select2').select2();

	</script>
	<style>
	    .footer {
    padding: 11px 25px!important;
    font-size: 90%;
}
	</style>
</body>

</html>
        
 </body>

</html>