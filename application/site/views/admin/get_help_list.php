  <div class="content ">

   	<div class="col-md-12" id="app">
   
   

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-lg-12 col-md-12">
		<h2>Get Help</h2>

   
            <div class="card widget">
                
				<div id="msg"> </div>
			

            <div class="table-responsive">
                <table class="table table table-custom table-lg">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Title</th>
                            <th>Date</th>
							

                        </tr>
                    </thead>
                    <tbody id="mentorsList">
                        <?php
						if(!empty($list)){
						foreach ($list as $key => $value) {
                            $status_badge = 'bg-success';
                            if ($value->status == '0')
                                $status_badge = 'bg-warning';
							
                        ?>
                            <tr>
                                <td><?= $value->first_name ?> <?= $value->last_name ?></td>
                                <td><?= $value->name ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->title ?></td>
                                <td> <?= date('d-m-Y',strtotime($value->added_date)) ?>
                                    
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                           <a href="<?= base_url('get_help/view/') . $value->id ?>" class="dropdown-item">View</a>
											
                                        </div>
                                    </div>
                                </td>

                            </tr> <?php }
						}else{
							echo ' <tr><td class="text-center text-red" colspan="4">Data not available</td></tr>';
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
<script>
function searchFilter1(page_num) {			 
		//alert(checkedVal);
		$("#filter-labels").html('');
		page_num = page_num?page_num:0;	
		
		var keyword         = $("#keyword").val();
		var sortby  = $( "#sortby option:selected" ).val();
		var perpage    = $( "#perpage option:selected" ).val();
		var status    = $( "#status option:selected" ).val();
		var school_id    = $( "#school_id" ).val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url("/parents/ajaxPaginationparentsData/")?>'+page_num,
			data:{page:page_num,sortby:sortby,perpage:perpage,keyword:keyword,school_id:school_id,status:status},
			/* beforeSend: function () {
				$('.loading').show();
			}, */
			success: function (res) {
				res = JSON.parse(res);
				
				$('#pagination').html(res.pagination);
				$('#showing_text').html(res.showing_text);
				$('#mentorsList').html(res.html);
			}
		});
	}
</script>