<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Site Metas -->
    <title>Sample Report With Comments</title>
  
</head>

<body>
<table style="font-family:arial" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td width="100%"><img src="<?= base_url() ?>assets/images/logo/logo2.png" /></td>

			<td style="line-height:35px">
				<h4 style="text-align:left">Art Program Assessment - <?= $view_data['class_name'] ?> - Sishya School, Chennai</h4>
				<p>
					<strong>Art Objectives</strong> - <?= $view_data['aim_and_objective'] ?> 
				</p>
			</td>

		</tr>
		<tr>
			<td style="width:30%;border: 1px solid #ccc;height: 35px;"><strong>&nbsp;Class &amp; Sec :&nbsp; <?= $view_data['class_name'] ?> - <?= $view_data['section_name'] ?></strong></td>
			<td style="width:70%;border: 1px solid #ccc;"><strong>&nbsp;Student Name : <?= $view_data['first_name'].' '.$view_data['last_name'] ?></strong> </td>
		</tr>
	</tbody>
</table>

<table style="font-family:arial;width:100%" cellpadding="0" cellspacing="0">
	<tbody>
		<tr style="width:100%">
			<td style="width: 15%;border: 1px solid #ccc;height: 35px;"><strong>&nbsp;Term</strong></td>
			<td style="width: 15%;border: 1px solid #ccc;"><strong>&nbsp;<?= $view_data['exam_name'] ?></strong></td>
			<td style="width: 70%;border: 1px solid #ccc;"><strong>&nbsp;Academic year : <?= $view_data['current_year'] ?></strong></td>
		</tr>
		<tr style="width:100%">
			<td style="width: 15%;border: 1px solid #ccc;height: 25px;"><strong>&nbsp;Grade</strong></td>
			<td style="width: 15%;border: 1px solid #ccc;"><strong>&nbsp;<?= $view_data['grade_name'] ?></strong></td>
			<td style="width: 70%;border: 1px solid #ccc;"><strong>&nbsp;<?php echo $comm =  ($_SESSION['grade_report_type'] == 'grade_with_lesson_teacher_comments') ? $view_data['comments'] : '' ?> </strong></td>
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
		<div style="margin-top:22px">
			<h4 style="margin-bottom:10px;font-family:arial">
				<strong >&nbsp;<?= $i ?>. <?= $view_lessons->lesson_name ?> </strong>
			</h4>
			<table style="font-family:arial;width:100%;" cellpadding="0" cellspacing="0">
				<tbody>
					<tr style="width:100%">
						<td style="border: 1px solid #ccc;height: 25px;">
							<img src="<?= base_url(). $view_lessons->final_artwork ?>" />
						</td>
						
						<td style="border: 1px solid #ccc;vertical-align: top;border: 1px solid #ccc; padding-left: 10px;padding-top: 10px;">
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