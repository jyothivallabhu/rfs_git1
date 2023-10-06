<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container demo">

    
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<?php 
$i = 1;
foreach($faq as $faq1){
	
?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?=  $i ?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=  $i ?>" aria-expanded="true" aria-controls="collapse<?=  $i ?>">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <?= $faq1->faq_title?>
                    </a>
                </h4>
            </div>
            <div id="collapse<?=  $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=  $i ?>">
                <div class="panel-body">
                    <?= $faq1->faq_desc ?>
					<img class="img-fluid" src="<?= base_url().$faq1->faq_image ;?>" style="padding:10px;">
				   
				   
					<?= $faq1->faq_desc2 ?>
					<?php if($faq1->faq_image2 !=''){ ?>
					<img class="img-fluid" src="<?= base_url().$faq1->faq_image2 ;?>" style="padding:10px;">
					<?php } ?>
					
					<?= $faq1->faq_desc3 ?>
					 <?php if($faq1->faq_image3 !=''){ ?>
					<img class="img-fluid" src="<?= base_url().$faq1->faq_image3 ;?>" style="padding:10px;">
					<?php } ?>
					
					<?= $faq1->faq_desc4 ?>
					<?php if($faq1->faq_image4 !=''){ ?>
					<img class="img-fluid" src="<?= base_url().$faq1->faq_image4 ;?>" style="padding:10px;">
					<?php } ?>
					
					<?= $faq1->faq_desc5 ?>
					<?php if($faq1->faq_image5 !=''){ ?>
					<img class="img-fluid" src="<?= base_url().$faq1->faq_image5 ;?>" style="padding:10px;">
				 <?php } ?>

				 </div>
				 
				
				
            </div>
        </div>

       
<?php
$i++;
} ?>
        

    </div><!-- panel-group -->
    
    
</div><!-- container -->



<style>
/*******************************
* Does not work properly if "in" is added after "collapse".
* Get free snippets on bootpen.com
*******************************/
    .panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }

/* ----- v CAN BE DELETED v ----- */
 

.demo {
    padding-top: 60px;
    padding-bottom: 60px;
}
</style>


<script>
function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>