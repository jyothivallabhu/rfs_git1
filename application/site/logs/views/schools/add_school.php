<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4" id="app">
        <div class="col-lg-8 col-md-8 offset-lg-2">
            <div class="card widget">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Add School</h5>
                </div>
				
				<div id="msg">
					
				</div>
			
			
                <form class="mb-5 form_class" id="add_school" method="POST" action="<?= site_url('schools/save_school') ?>" enctype="multipart/form-data">
                    <div class="row">

                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">School Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="address" class="form-label">address</label>
                            <input type="text" class="form-control" name="address" id="address" required>
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="city" class="form-label">city</label>
                            <input type="text" class="form-control" name="city" id="city" required>
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="state" class="form-label">state</label>
							 <select class="form-select col-md-7 col-xs-12"  name="state" required>
                            <option value="">Select State</option>
							<?php
							foreach($states as $state)
							{
						    ?>
							 <option value="<?php echo $state->id;?>"><?php echo $state->name;?></option>
							
							<?php
							}
							?>
                           
                          </select>
							
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="pincode" class="form-label">pincode</label>
                            <input type="text" class="form-control" name="pincode" onkeypress="return isNumberKey(event)" maxlength="6" id="pincode" required>
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="principal_name" class="form-label">principal name</label>
                            <input type="text" class="form-control" name="principal_name" id="principal_name">
                        </div>
						<div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"  onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="15">
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        
                        
                        <div class="mb-3 col-6">
                            <label for="school_image" class="form-label">logo <small style="color:red">(200*100px preferred) </small></label>
                            <input type="file" class="form-control" name="school_image" id="school_image" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="website" class="form-label">website</label>
                            <input type="text" class="form-control" name="website" id="website" onblur= "isValidURL(this.value)"  >
							<pre id="output"></pre>
                        </div>
						
						<label  for="basic-url">URL <span class="required">*</span></label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3" style="    border-radius: 0;"><?php echo base_url() ?></span>
							</div>
							<input type="text" class="form-control" name="url_slug" required  id="basic-url" aria-describedby="basic-addon3" >
						</div>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?= base_url('schools') ?>" class="btn btn-outline-primary">Cancel</a>
                </form>



            </div>
        </div>

    </div>

</div>
<!-- ./ content -->