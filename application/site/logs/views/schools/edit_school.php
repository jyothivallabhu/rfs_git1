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
				
				
                <form class="mb-5 form_class" id="edit_school" method="POST" action="<?= site_url('schools/update_school/') . $school->id  ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="mb-3 col-6 ">
                            <label for="first_name" class="form-label">School Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $school->name ?>" <?= ($school->status== '0') ?  'readonly' : '' ?> required>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="address" class="form-label">address</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?= $school->address ?>" <?= ($school->status== '0') ?  'readonly' : '' ?> required>
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="city" class="form-label">city</label>
                            <input type="text" class="form-control" name="city" id="city" required value="<?= $school->city ?>" <?= ($school->status== '0') ?  'readonly' : '' ?>>
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="state" class="form-label">state</label>
							 <select class="form-select col-md-7 col-xs-12 state"  name="state" required  <?= ($school->status== '0') ?  'disabled' : '' ?>>
                            <option value="">Select State</option>
							<?php
							foreach($states as $state)
							{
						    ?>
							 <option value="<?php echo $state->id;?>" <?php if($state->id==$school->state) { echo 'selected=selected';} ?> ><?php echo $state->name;?></option>
							
							<?php
							}
							?>
                           
                          </select>
							
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="pincode" class="form-label">pincode</label>
                            <input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength='6' name="pincode" id="pincode" required value="<?= $school->pincode ?>" <?= ($school->status== '0') ?  'readonly' : '' ?>>
                        </div>
						<div class="mb-3 col-6 ">
                            <label for="principal_name" class="form-label">Principal Name</label>
                            <input type="text" class="form-control" name="principal_name" id="principal_name" value="<?= $school->principal_name ?>" <?= ($school->status== '0') ?  'readonly' : '' ?>>
                        </div>
						<div class="mb-3 col-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone"  onkeypress="return isNumberKey(event)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="Enter Valid mobile number" maxlength="15" value="<?= $school->phone ?>" <?= ($school->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        <div class="mb-3 col-6 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" required value="<?= $school->email ?>" <?= ($school->status== '0') ?  'readonly' : '' ?>>
                        </div>
                        
                        
                        <div class="mb-3 col-6">
                            <label for="school_image" class="form-label">logo <small style="color:red">(200*100px preferred) </small></label>
                            <input type="file" class="form-control" name="school_image" id="school_image"  <?= ($school->status== '0') ?  'disabled' : '' ?>>
							
							<img src="<?= base_url().$school->logo ;?>" height="60" width="60" style="margin-top: 8px;" /> 
							
                        </div>
                        <div class="mb-3 col-6">
                            <label for="website" class="form-label">website</label>
                            <input type="text" class="form-control" name="website" id="website" onblur= "isValidURL(this.value)"  value="<?= $school->website ?>" <?= ($school->status== '0') ?  'readonly' : '' ?>>
							<pre id="output"></pre>
                        </div>
						<div class="mb-3 col-6">
                        <label for="basic-url" class="form-label">URL</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3" style="    border-radius: 0;"><?php echo base_url() ?></span>
							</div>
							<input type="text" class="form-control" name="url_slug"  required id="basic-url" aria-describedby="basic-addon3" value="<?= $school->url_slug ?>" <?= ($school->status== '0') ?  'readonly' : '' ?>>
						</div>
						</div>
						<div class="mb-3 col-6">
                            <label for="demonstration_video" class="form-label">Status</label>
                            <select class="form-select" name="status">
								<option value="1" <?php if($school->status=='1') { echo 'selected=selected';}  ?>>Active</option>
								<option value="0" <?php if($school->status=='0') { echo 'selected=selected';}  ?>>InActive</option>
							</select>
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