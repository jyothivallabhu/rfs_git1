<!-- content -->
<div class="content ">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-12 col-md-12">
            <h2>Offline Schools</h2>
			
			<div id="msg">
				
			</div>
			
			
             
            <div class="table-responsive">
                <table class="table table table-custom table-lg">
                    <thead>
                        <tr> 
                            <th>School Name</th>
                            <th>Mac Address</th>  



                        </tr>
                    </thead>
                    <tbody id="schoolsList">
                        <?php
						if(!empty($mac_address)){

						foreach ($mac_address as $key => $value) {
                            
							
							 
						 ?>
                            <tr>
							    <td><?= $value->school_name ?>  </td>
                                <td><?= $value->mac_address ?></td> 
                                 
								 

                            </tr> <?php } 
						}else{
							echo ' <tr><td class="text-center text-red" colspan="4">No Data Found</td></tr>';
						}?>
                    </tbody>
                </table>
				<div id="pagination"><?=$pagination?></div>
				<span id="showing_text"><?=$showing_text?></span>
            </div>



        </div>
    </div>

</div>

</div>
<!-- ./ content -->
