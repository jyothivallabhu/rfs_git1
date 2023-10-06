		</div>
	</div>
    <!-- ./ content -->
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
  <script src="https://fmpisnfdb.in/assets/javascript/jquery.dataTables.min.js"></script>
  
  	<script src="<?=base_url('assets')?>/dist/js/scripts.js"></script>
	<script src="<?=base_url('assets')?>/dist/js/jquery.form.js"></script>
	<script src="<?=base_url('assets')?>/dist/plugins/sweetalert/dist/sweetalert.min.js"></script>
	
  <style>
  .valid { color: green; }
.invalid { color: red; }
  </style>
  <script>
  
	
	


      $(document).ready(function() {

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
	  
	  $('#msg').delay(5000).fadeOut(300); 
  </script>
  </body>

  </html>