<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Site Metas -->
    <title>Sample Report With Comments</title>
  
</head>

<body>
<table style="font-family:arial;line-height: 8px;" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td style="border: 1px solid #ccc;height: 25px;padding: 15px; width:30%;"  >
				<img style="width:30%" src="<?= base_url() ?>assets/images/logo/black_logo.jpg" />
			</td>

			<td  align="center" style="width:70%;border: 1px solid #ccc;height: 25px; line-height:25px;padding: 15px;"  > 
				<h4 >Art Program Assessment - <?= $view_data['class_name'] ?> - <?= $view_data['school_name']?></h4>
				
				<table style="line-height: 25px;font-family:arial;width:100%" cellpadding="0" cellspacing="0">
					<tbody>
						<tr style="width:100%"> 
							<td  align="left" style="padding: 10px;">&nbsp;<strong>Art Objectives</strong> - <?= $view_data['objective'] ?>  </td>
						</tr> 
					</tbody>
				</table> 
			</td>
		</tr>
		
		
		 
	</tbody>
</table>
<table style="font-family:arial;width:100%" cellpadding="0" cellspacing="0">
	<tbody>
		<tr style="width:100%">
			<td style="padding: 15px 10px;width: 30%;border: 1px solid #ccc;height: 35px;">&nbsp;Class :&nbsp; <strong><?= $view_data['class_name'] ?> - <?= $view_data['section_name'] ?></strong></td>
			<td style="padding: 15px 10px;width: 70%;border: 1px solid #ccc;">&nbsp;Student Name : <strong><?= $view_data['first_name'].' '.$view_data['last_name'] ?></strong> </td>
		</tr> 
	</tbody>
</table>

<table style="font-family:arial;width:100%" cellpadding="0" cellspacing="0">
	<tbody>
		
		<tr style="width:100%">
			<td style="padding: 15px 10px;width: 10%;border: 1px solid #ccc;height: 35px;"> &nbsp;Term </td>
			<td style="padding: 15px 0px;width: 15%;border: 1px solid #ccc;"><strong>&nbsp;<?= $view_data['exam_name'] ?></strong></td>
			<td style="padding: 15px 10px;width: 70%;border: 1px solid #ccc;"> &nbsp;Academic year : <strong><?= $view_data['current_year'] ?></strong></td>
		</tr>
		<tr style="width:100%">
			<td style="padding: 15px 10px;width: 15%;border: 1px solid #ccc;height: 25px;"> &nbsp;Grade </td>
			
			<?php if($_SESSION['grade_report_type'] != 'grade_with_lesson_teacher_comments'){
				$colspan = 'colspan=2';
			}else{
				$colspan = '';
			} ?>
			
			<td  <?= $colspan ?> style="padding: 15px 10px;width: 15%;border: 1px solid #ccc;"><strong>&nbsp;<?= $view_data['grade_name'] ?></strong></td>
			
			<?php echo $comm =  ($_SESSION['grade_report_type'] == 'grade_with_lesson_teacher_comments') ? '<td style="width: 70%;border: 1px solid #ccc;padding: 15px 10px;">&nbsp; '.$view_data['comments'].'</td>' : '' ?> 
			
			
			
		</tr>
	</tbody>
</table>

	<?php 
	if($_SESSION['grade_report_type'] != 'only_grade'){
	
	$lesson_id= explode(',', $view_data['lesson_id']); 

	$i = 1;
	if(!empty($lesson_id)){
		foreach($lesson_id as $l){
		$view_lessons= $this->admin->get_lessonsByID($l)[0];
	?>
		<div style="margin-top:8px">
			
			<table style="font-family:arial;width:100%;" cellpadding="0" cellspacing="0">
				<tbody>
				<tr><td colspan="2"><h4 style=" font-family:arial; ">
				<strong >&nbsp;<?= $i ?>. <?= $view_lessons->lesson_name ?> </strong>
			</h4></td></tr>
					<tr style="width:100%">
						<td style="height: 25px;">
							<img src="<?= base_url(). $view_lessons->final_artwork ?>" width="100px" height='100px' />
						</td>
						
						<td style="font-family:arial !important;vertical-align: top;padding-left: 10px;padding-top: 10px;line-height: 25px;">
							<?= $view_lessons->description ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

	<?php 
		$i++;
		} 
	}
	
	}?>



</body>

</html>