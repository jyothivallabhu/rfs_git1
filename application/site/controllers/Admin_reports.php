
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_reports extends CI_Controller
{
	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Users_model", 'user');
		$this->load->model("Reports_model");
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->load->library('bcrypt');
		$this->user_id = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		$this->url_slug = $_SESSION['login_session']['url_slug'];
		
		if(isset($_SESSION['login_session']['school_id'])){
				$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
				$this->logo = $this->school_data->logo;
			}else{
				$this->logo = '';
			}
		
	}

	
	public function index(){
		$data['schools'] = $this->admin->get_all_schools();
		$data['main_content'] = 'admin/reports/super_reports';
		$this->load->view('dash_template/body', $data);
	}
	
	function getData(){
		//print_r($_POST);exit;
		$success=false;
		$msg='';
		$tbl='';
		$tot_tbl='';
		
		
		
		 if(isset($_POST['report_type']) && $_POST['report_type']!="" && isset($_POST['start']) && $_POST['start']!="" && isset($_POST['end']) && $_POST['end']!=""){
			 $report_type = $_POST['report_type'];
			 $from = $_POST['start'];
			 $to = $_POST['end'];
			 
			 if(isset($_POST['school_id'])){
				$school_id= $_POST['school_id'];
			}else{
				$school_id= '';
			}
			 if(isset($_POST['teacherID'])){
			 $teacherID= $_POST['teacherID'];
			}else{
				$teacherID= '';
			}
			 if(isset($_POST['feedbackfor'])){
			 $feedbackfor= $_POST['feedbackfor'];
			}else{
				$feedbackfor= '';
			}
			 if(isset($_POST['feedback_status'])){
			 $feedbackstatus= $_POST['feedback_status'];
			}else{
				$feedbackstatus= '';
			}
			 if(isset($_POST['esfeedbackfor'])){
			 $esfeedbackfor= $_POST['esfeedbackfor'];
			}else{
				$esfeedbackfor= '';
			}
			if(isset($_POST['school_roles'])){
			 $school_roles= $_POST['school_roles'];
			
			}else{
				$school_roles= '';
			}
			if(isset($_POST['grade_term'])){
				$grade_term= $_POST['grade_term'];
			}else{
				$grade_term= '';
			}
			if(isset($_POST['class_id'])){
			 $class_id= $_POST['class_id'];
			}else{
				$class_id= '';
			}
			if(isset($_POST['lesson_id'])){
			 $lesson_id= $_POST['lesson_id'];
			}else{
				$lesson_id= '';
			}
			if(isset($_POST['section_id'])){
			 $section_id= $_POST['section_id'];
			}else{
				$section_id= '';
			}
			if(isset($_POST['exam_type'])){
			 $exam_type= $_POST['exam_type'];
			}else{
				$exam_type= '';
			}
			
			
			 if($this->role_id == 5){
				$mentor_school_id = $this->admin->get_mentors_assigned_schoolIds($this->user_id);
				$mentorschool_id = $mentor_school_id[0]->school_id;
			}
			 
			         if($report_type=='user_base_report'){
							 $sql ="SELECT 
										u.*
									FROM 
										`users` as u
									WHERE
										date(u.created_at)>='$from' AND date(u.created_at)<='$to'
										";
									/*if($emp_id != "all"){
										$sql.=" AND e.emp_id=$emp_id"; 
									}*/	
										 $sql.="  ORDER BY u.first_name ASC";
				
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
										 $success=true;
										 $tbl.='<thead>
													<tr>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Email</th>
														<th>Phone</th>
										            </tr>
												</thead><tbody>';
										 foreach($ud['data'] as $r){
											$tbl.='<tr>
														<td>'.$r->first_name.'</td>
														<td>'.$r->last_name.'</td>
														<td>'.$r->email.'</td>
														<td>'.$r->phone.'</td>
														
													</tr>';
										 }									
									  $tot_tbl.='';
									 }else{
										 $msg='No Records Found';
									 }
								}
					 else  if($report_type =='feedback'){
						 
						 if($_POST['feedbackfor'] == 'monthlymentoring'){
							 $sql ="SELECT 
										*,tm.status as feedbackstatus, tm.created_at as createddate
									FROM 
										trial_and_mentoring tm   
										JOIN schools s ON s.id = tm.school_id 
										JOIN users u ON u.id = tm.added_by
									WHERE
										date(tm.created_at)>='$from' AND date(tm.created_at)<='$to'
										";
										
										if($this->role_id == 5 && $school_id == ''){
											$sql.=" AND tm.school_id IN ('$mentorschool_id')"; 
											
										}elseif($school_id != "all" && $school_id!=''){
											$sql.=" AND tm.school_id='$school_id'"; 
										}
									if($teacherID != "all" && $teacherID !=""){
										$sql.=" AND tm.added_by='$teacherID'"; 
									} 
									if($feedbackstatus != "all" && $feedbackstatus !=""){
										$sql.=" AND tm.status='$feedbackstatus'"; 
									}
									if($feedbackfor != "all" && $feedbackfor !=""){
										$sql.=" AND tm.type='$feedbackfor'"; 
									}
						 }else{
							 
						
						 $sql ="SELECT 
										*,tm.status as feedbackstatus, tm.created_at as createddate
									FROM 
										trial_and_mentoring tm  
										JOIN classes c on c.c_id = tm.class_id 
										JOIN lessons l ON l.lesson_id = tm.lesson_id 
										JOIN schools s ON s.id = tm.school_id 
										JOIN users u ON u.id = tm.added_by
									WHERE
										date(tm.created_at)>='$from' AND date(tm.created_at)<='$to'
										";
										
										if($this->role_id == 5 && $school_id == ''){
											$sql.=" AND tm.school_id IN ('$mentorschool_id')"; 
											
										}elseif($school_id != "all" && $school_id!=''){
											$sql.=" AND tm.school_id='$school_id'"; 
										}
									if($teacherID != "all" && $teacherID !=""){
										$sql.=" AND tm.added_by='$teacherID'"; 
									}
									if($class_id != "all" && $class_id !=""){
										$sql.=" AND tm.class_id='$class_id'"; 
									}
									if($feedbackstatus != "all" && $feedbackstatus !=""){
										$sql.=" AND tm.status='$feedbackstatus'"; 
									}
									if($feedbackfor != "all" && $feedbackfor !=""){
										$sql.=" AND tm.type='$feedbackfor'"; 
									}
									
								}
									
										 $sql.="  ORDER BY tm.id ASC";
							
									 $ud = $this->Reports_model->query($sql);
									 
									/*  echo $this->db->last_query(); */ 
									  if($ud['num']>0){
										 $success=true;
										 
										 
											 
										 $tbl.='<thead>
													<tr>
														<th>Date</th>
														<th>School Name</th>
														
														';
														if($_POST['feedbackfor'] == 'monthlymentoring'){
															$tbl.='<th>Mentor Name</th>';
														}else{
															$tbl.='<th>Teacher Name</th>';
														}
														
														if($_POST['feedbackfor'] != 'monthlymentoring'){
															$tbl.=' 
																<th>Class</th>
																<th>Lesson</th>
															';
														}
														
														
														$tbl.='<th>Type</th>
														<th>Stage</th>
														<th>Status</th>
										            </tr>
												</thead><tbody>';
										 foreach($ud['data'] as $r){
											 if($r->type == 'trail'){
												 $type = 'Trial';
											 }else{
												 $type = ucwords($r->type);
											 }
											$tbl.='<tr>
														<td>'.date('d-m-Y', strtotime($r->createddate)).'</td>
														<td>'.$r->name.'</td>
														';
														
														
														if($_POST['feedbackfor'] != 'monthlymentoring'){
															$tbl.='<td>'.$r->first_name.'</td>';
														}else{
															$tbl.='<td>'.$r->first_name.'</td>';
														}
														
														
														if($_POST['feedbackfor'] != 'monthlymentoring'){
															$tbl.=' <td>'.$r->class_name.'</td>
															<td>'.$r->lesson_name.'</td>';
														}	
														
														
														$tbl.='<td>'.$type.'</td>
														<td>'.$r->stage.'</td>
														<td>'.$r->feedbackstatus.'</td>
														
													</tr>';
										 }									
									  $tot_tbl.='';
									 }else{
										 $msg='No Records Found';
									 }
								
					 }
					 else  if($report_type =='escalation_report'){
						 $sql ="SELECT 
										*,tm.status as feedbackstatus, tm.created_at as createddate
									FROM 
										trial_and_mentoring tm  
										JOIN classes c on c.c_id = tm.class_id 
										JOIN lessons l ON l.lesson_id = tm.lesson_id 
										JOIN schools s ON s.id = tm.school_id 
										JOIN users u ON u.id = tm.added_by
									WHERE
										date(tm.created_at)>='$from' AND date(tm.created_at)<='$to'
										and tm.feedback = '2'
										";
									if($esfeedbackfor != "all" && $esfeedbackfor !=""){
										$sql.=" AND tm.type='$esfeedbackfor'"; 
									}
									if($this->role_id == 5 && $school_id == ''){
										$sql.=" AND tm.school_id IN ('$mentorschool_id')"; 
									}
									
										 $sql.="  ORDER BY tm.id ASC";
										
										/* echo $sql; */
				
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
										 $success=true;
										 $tbl.='<thead>
													<tr>
														<th>Date</th>
														<th>School Name</th>
														<th>Teacher Name</th>
														<th>Submitted Date</th>
														<th>Lesson</th>
														<th>Status</th>
														<th>Type</th>
										            </tr>
												</thead><tbody>';
										 foreach($ud['data'] as $r){
											 if($r->feedback == '1'){
												$feedback = 'Given';
											}elseif($r->feedback == '2'){
												$feedback='Escalated';
											}else{
												$feedback = 'Pending';
											}
											if($r->type == 'trail'){
												 $type = 'Trial';
											 }else{
												 $type = ucwords($r->type);
											 }
											$tbl.='<tr>
														<td>'.date('d-m-Y', strtotime($r->createddate)).'</td>
														<td>'.$r->name.'test</td>
														<td>'.$r->first_name.'</td>
														<td>'.$r->class_name.'</td>
														<td>'.$r->lesson_name.'</td>
														<td>'.$feedback.'</td>
														<td>'.$type.'</td>
														
													</tr>';
										 }									
									  $tot_tbl.='';
									 }else{
										 $msg='No Records Found';
									 }
					 }
					 else if($report_type=='usage_tracking'){
							 $sql ="SELECT 
										u.*,ut.*,s.name as school_name,ur.name as role_name
									FROM 
										`users` as u
									JOIN 
										`user_roles` as ur
									ON
										ur.id = u.role_id
									JOIN 
										`user_tracking` as ut
									ON
										ut.user_id= u.id
									JOIN 
										`schools` as s
									ON
										s.id= u.school_id
									WHERE
										date(ut.tracking_fromtime)>='$from' AND date(ut.tracking_totime)<='$to'
										";
									if($school_id != ""){
										$sql.=" AND u.school_id='$school_id'"; 
									}
									if($school_roles != ""){
										$sql.=" AND role_id='$school_roles'"; 
									}
									
										 $sql.="  ORDER BY ut.track_id  ASC";
									
									 /*  echo $sql;  */
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
										 $success=true;
										 $tbl.='<thead>
													<tr>
														<th>Date</th>
														<th>School Name</th>
														<th>User Type</th>
														<th>User Name</th>
														<th>Login Time</th>
														<th>Logout Time</th>
										            </tr>
												</thead><tbody>';
										 foreach($ud['data'] as $r){
											$tbl.='<tr>
														<td>'.$r->tracking_date.'</td>
														<td>'.$r->school_name.'</td>
														<td>'.$r->role_name.'</td>
														<td>'.$r->first_name.' '.$r->last_name.'</td>
														<td>'.date('h:i A',strtotime($r->tracking_fromtime)).'</td>
														<td>'.date('h:i A',strtotime($r->tracking_totime)).'</td>
														
													</tr>';
										 }									
									  $tot_tbl.='';
									 }else{
										 $msg='No Records Found';
									 }
								}
					 else if($report_type =='lesson_library'){
						  $sql ='SELECT 
										tm.*, s.name as school_name, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.class_name as class_name, sec.section_name, l.lesson_name, concat(u.first_name," ",u.last_name) as teachername
									FROM 
										trial_and_mentoring as tm
									JOIN 
										lessons as l
									ON
										tm.lesson_id = l.lesson_id
									JOIN 
										classes as c
									ON
										c.c_id = tm.class_id
									JOIN 
										sections as sec
									ON
										c.c_id = sec.class_id
									JOIN 
										`schools` as s
									ON
										s.id= tm.school_id
									JOIN 
										`users` as u
									ON
										u.id= tm.added_by
										
										
									WHERE
										date(tm.created_at)>="'.$from.'" AND date(tm.created_at)<="'.$to.'" and  tm.is_del = "0" and tm.type="mentoring"
										';
									if($school_id != ""){
										$sql.=" AND tm.school_id='$school_id'"; 
									}
									if($class_id != ""){
										$sql.=" AND tm.class_id='$class_id'"; 
									}
										 $sql.="  ORDER BY tm.id ASC";
									 	/* echo $sql;  */ 
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
										 $success=true;
										 $tbl.='<thead>
										 <tr><th colspan="6">Lesson Library</th></tr>
													<tr>
														<th>Date</th>
														<th>School Name</th>
														<th>Class-section</th>
														<th>Lesson Name</th>
														<th>Teacher Name</th>
														<th>Status</th>
										            </tr>
												</thead><tbody>';
										 foreach($ud['data'] as $r){
											$tbl.='<tr>
														<td>'.date('d-m-Y',strtotime($r->created_at)).'</td>
														<td>'.$r->school_name.'</td>
														<td>'.$r->class_name.' - '.$r->section_name.'</td>
														<td>'.$r->lesson_name.'</td>
														<td>'.$r->teachername.'</td>
														<td>'.$r->stage.'</td>
														
													</tr>';
										 }									
									  $tot_tbl.='';
									 }else{
										 $msg='No Records Found';
									 }
					 }
					  else if($report_type =='artwork_report'){
						 $sql ='SELECT 
										a.id,l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,sec.section_name, a.*,case when (artwork_upload is null or artwork_upload = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",artwork_upload) end as "image_path"
									FROM 
										artwork as a
									JOIN 
										lessons as l
									ON
										a.lesson_id = l.lesson_id
									JOIN 
										classes as c
									ON
										c.c_id = a.class_id
									JOIN 
										sections as sec
									ON
										sec.section_id = a.section_id
									JOIN 
										`students` as s
									ON
										a.student_id = s.student_id
									
									WHERE
										date(a.created_at)>="'.$from.'" AND date(a.created_at)<="'.$to.'" and  a.is_del = "0" 
										';
									/* if($school_id != ""){
										$sql.=" AND s.school_id='$school_id'"; 
									} */
									if($class_id != ""){
										$sql.=" AND a.class_id='$class_id'"; 
									}
										 $sql.="  ORDER BY a.id ASC";
									/*  echo $sql;  */ 
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
										 $success=true;
										 $tbl.='<thead>
										 <tr><th colspan="6">Lesson Library</th></tr>
													<tr>
														<th>Date</th>
														<th>Student Name</th>
														<th>Class-section</th>
														<th>Lesson Name</th>
										            </tr>
												</thead><tbody>';
										 foreach($ud['data'] as $r){
											$tbl.='<tr>
														<td>'.date('d-m-Y',strtotime($r->created_at)).'</td>
														<td>'.$r->first_name.' '.$r->last_name.'</td>
														<td>'.$r->class_name.' - '.$r->section_name.'</td>
														<td>'.$r->lesson_name.'</td>
														
													</tr>';
										 }									
									  $tot_tbl.='';
									 }else{
										 $msg='No Records Found';
									 }
					 }
					 else if($report_type =='grade_report'){
						 
						 /* print_r($_POST);exit; */
						 $this->session->set_userdata('grade_report_type', $_POST['grade_report_type']);
						 
						 $sql ='SELECT  s.first_name, s.last_name,s.admission_number, c.class_name,sec.section_name, gr.*,g.grade_name,e.exam_name
									 FROM grade_reports gr JOIN grades g on g.id = gr.grade_id  JOIN exam_types e ON e.id = gr.exam_type JOIN students s ON s.student_id = gr.student_id JOIN student_academic_details sa on sa.sd_id = s.student_id JOIN classes c ON c.c_id = gr.class_id JOIN sections sec ON sec.section_id = gr.section_id JOIN academic_year a on a.id = gr.academic_id JOIN schools sch on s.school_id  = sch.id
										
									WHERE
										date(gr.created_at)>="'.$from.'" AND date(gr.created_at)<="'.$to.'" and  gr.is_del = "0"  and a.name = "currrent_year"
										';
									if($grade_term != ""){
										$sql.=" AND gr.exam_type='$grade_term'"; 
										
									} 
									if($class_id != ""){
										$sql.=" AND gr.class_id='$class_id'"; 
									}
									if($section_id != ""){
										$sql.=" AND gr.section_id='$section_id'"; 
									}
									if($lesson_id != ""){
										$sql.=" AND gr.lesson_id='$lesson_id'"; 
									}
									 if($school_id != ""){
										$sql.=" AND s.school_id='$school_id'"; 
									} 
									
									
										 $sql.="  GROUP BY gr.id  ORDER BY gr.id Desc";
									 /* echo $sql; */    
									 
									 $e = "SELECT * FROM exam_types where id='$grade_term'";
									 $er = $this->db->query($e);
									 $erdata = $er->row_array();
									 
									 if(isset($erdata['exam_name']) && $erdata['exam_name'] != ''){
										 $getexam_name = $erdata['exam_name'];
									 }else{
										 $getexam_name = '';
									 }
									 
									 $ud = $this->Reports_model->query($sql);
									 
									$this->session->set_userdata('school_id', $school_id);			
									$this->session->set_userdata('class_id', $class_id);			
									$this->session->set_userdata('section_id', $section_id);			
									$this->session->set_userdata('lesson_id', $lesson_id);			
									$this->session->set_userdata('exam_type', $grade_term);	
									$this->session->set_userdata('from_date', $from);	
									$this->session->set_userdata('to_date', $to);	
				
				
									  if($ud['num']>0){
										 $success=true;
										 $tbl.='
										 
										  <table>
										 <thead>
										 <tr><th colspan="6">Grade Report1 ';
										 if($_POST['grade_report_type'] == 'only_grade'){
											 $tbl.='<a href="'.base_url('Admin_reports/export_pdf').'" class="btn btn-success" style="float: right;">PDF</a></th></tr>';
										 }else{
											 $tbl.='<a href="'.base_url('Admin_reports/export_report').'" class="btn btn-success" style="float: right;">Download</a></th></tr>';
										 }
										 
										 
													
													if($_POST['grade_report_type'] == 'only_grade'){
														
														$tbl.=' 
														
														<tr>
														<th>Admission Number</th>
														<th>Student Name</th>
														<th>Class-section</th>
														<th>Grade</th>
										            </tr>
												</thead><tbody>';
												$i = 1;
												foreach($ud['data'] as $r){
												$tbl.='<tr>
															<td>'.$r->admission_number.'</td>
															<td>'.$r->first_name.' '.$r->last_name.'</td>
															<td>'.$r->class_name.' - '.$r->section_name.'</td>
															<td>'.$r->grade_name.'</td>
															
														</tr>';
														$i++;
											 }
										 
													}else{
													
													 $tbl.='
													 <tr>
														<th>Date</th>
														<th>Admission Number</th>
														<th>Student Name</th>
														<th>Class-section</th>
														<th>Grade</th>
														<th>View</th>
										            </tr>
												</thead><tbody>';
											foreach($ud['data'] as $r){
											$tbl.='<tr>
														<td>'.date('d-m-Y',strtotime($r->created_at)).'</td>
														<td>'.$r->admission_number.'</td>
														<td>'.$r->first_name.' '.$r->last_name.'</td>
														<td>'.$r->class_name.' - '.$r->section_name.'</td>
														<td>'.$r->grade_name.'</td>
														<td><a href="'.base_url($this->url_slug.'/view_gradereportpdf/').$r->id.'" class="badge bg-primary" target="_blank" style="color: #fff;">view</a></td>
														
													</tr>';
										 }
										 
													}
										 

										 
									  $tot_tbl.=' </table>';
									 }else{
										 $msg='No Records Found';
									 }
					 }
					 
					 
					 
		 }else{
			 $msg='Invalid Request';
		 }
		 echo json_encode(array('success'=>$success,'msg'=>$msg,'tbl'=>$tbl,'tot'=>$tot_tbl));
	}


	
	/*  Teachers by School Id*/
	function ajGetTeachers(){
		 if(isset($_POST['school_id']) && $_POST['school_id']!=""){
			$school_id = addslashes($_POST['school_id']);
			$res = $this->admin->getTeachersBySchoolId($school_id);
			
			echo "<option value=''>Select Teacher</option>";	
			if($res['num']>0){
				foreach($res['data'] as $r){
					echo "<option value='$r->id'>$r->teachername</option>";	
				}	
			}
		}
	 }
	 
	 function ajGetGrades(){
		 if(isset($_POST['school_id']) && $_POST['school_id']!=""){
			$school_id = addslashes($_POST['school_id']);
			$res = $this->admin->getexam_typesBySchoolId($school_id);
			echo "<option value=''>Select Term</option>";	
			if($res['num']>0){
				foreach($res['data'] as $r){
					echo "<option value='$r->id'>$r->exam_name</option>";	
				}	
			}
		}
	 }
	 
	 
	 
	 function ajGetTeacherassignedClasses(){
		 if(isset($_POST['teacherID']) && $_POST['teacherID']!=""){
			$teacherID = addslashes($_POST['teacherID']);
			$res = $this->admin->getTeacherassignedClasses($teacherID);
			echo "<option value=''>Select Class</option>";	
			if($res['num']>0){
				foreach($res['data'] as $r){
					echo "<option value='$r->c_id'>$r->class_name</option>";	
				}	
			}
		}
	 }
	 
	 public function export_report(){
		 
			$report_type = 'grade_report';
			
			$school_id = $this->session->userdata('school_id');
			$class_id = $this->session->userdata('class_id');
			$section_id = $this->session->userdata('section_id');
			$lesson_id = $this->session->userdata('lesson_id');
			$grade_term = $this->session->userdata('exam_type');
			$from = $this->session->userdata('from_date');
			$to = $this->session->userdata('to_date');
			 
			  
			 
		 
		 $sql ='SELECT  s.first_name, s.last_name,s.admission_number, c.class_name,sec.section_name, gr.*,g.grade_name,e.exam_name
									 FROM grade_reports gr JOIN grades g on g.id = gr.grade_id  JOIN exam_types e ON e.id = gr.exam_type JOIN students s ON s.student_id = gr.student_id JOIN student_academic_details sa on sa.sd_id = s.student_id JOIN classes c ON c.c_id = gr.class_id JOIN sections sec ON sec.section_id = gr.section_id JOIN academic_year a on a.id = gr.academic_id JOIN schools sch on s.school_id  = sch.id
										
									WHERE
										date(gr.created_at)>="'.$from.'" AND date(gr.created_at)<="'.$to.'" and  gr.is_del = "0"  and a.name = "currrent_year"
										';
									if($grade_term != ""){
										$sql.=" AND gr.exam_type='$grade_term'"; 
										
									} 
									if($class_id != ""){
										$sql.=" AND gr.class_id='$class_id'"; 
									}
									if($section_id != ""){
										$sql.=" AND gr.section_id='$section_id'"; 
									}
									if($lesson_id != ""){
										$sql.=" AND gr.lesson_id='$lesson_id'"; 
									}
									 if($school_id != ""){
										$sql.=" AND s.school_id='$school_id'"; 
									} 
									
									
										 $sql.="  GROUP BY gr.id  ORDER BY gr.id Desc";
									 // echo $sql; exit;
									 
									 $e = "SELECT * FROM exam_types where id='$grade_term'";
									 $er = $this->db->query($e);
									 $erdata = $er->row_array();
									 
									 if(isset($erdata['exam_name']) && $erdata['exam_name'] != ''){
										 $getexam_name = $erdata['exam_name'];
									 }else{
										 $getexam_name = '';
									 }
									 
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
									  
		 
						 if(!is_dir($path)){
							mkdir("$path", 0755,true);
						}
				
		  
				  // Load zip library
				  $this->load->library('zip');
				  foreach($ud['data'] as $r){
					  	 
						$res = $this->admin->view_gradereportpdf($r->id);
						$data['view_data'] = $res[0];
						 
						$mpdf = new \Mpdf\Mpdf();
						$html = $this->load->view('teacher_views/view_gradereport',$data,true);
						$mpdf->WriteHTML($html);
						$mpdf->Output($path.$r->admission_number.'.pdf', 'F');  
					
						 $filepath  = $path.$r->admission_number.'.pdf';
		
					  $fileName = $filepath;
					  $this->zip->read_file($fileName);

					}
					 
				   $filename = "backup.zip";
				   $this->zip->download($filename);   
			  
	 
	 }
	 }
	 
	

 public function export_pdf(){
		 
			$report_type = 'grade_report';
			
			$school_id = $this->session->userdata('school_id');
			$class_id = $this->session->userdata('class_id');
			$section_id = $this->session->userdata('section_id');
			$lesson_id = $this->session->userdata('lesson_id');
			$grade_term = $this->session->userdata('exam_type');
			$from = $this->session->userdata('from_date');
			$to = $this->session->userdata('to_date');
			 
			  
			 
		 
		 $sql ='SELECT  s.first_name, s.last_name,s.admission_number, c.class_name,sec.section_name, gr.*,g.grade_name,e.exam_name
									 FROM grade_reports gr JOIN grades g on g.id = gr.grade_id  JOIN exam_types e ON e.id = gr.exam_type JOIN students s ON s.student_id = gr.student_id JOIN student_academic_details sa on sa.sd_id = s.student_id JOIN classes c ON c.c_id = gr.class_id JOIN sections sec ON sec.section_id = gr.section_id JOIN academic_year a on a.id = gr.academic_id JOIN schools sch on s.school_id  = sch.id
										
									WHERE
										date(gr.created_at)>="'.$from.'" AND date(gr.created_at)<="'.$to.'" and  gr.is_del = "0"  and a.name = "currrent_year"
										';
									if($grade_term != ""){
										$sql.=" AND gr.exam_type='$grade_term'"; 
										
									} 
									if($class_id != ""){
										$sql.=" AND gr.class_id='$class_id'"; 
									}
									if($section_id != ""){
										$sql.=" AND gr.section_id='$section_id'"; 
									}
									if($lesson_id != ""){
										$sql.=" AND gr.lesson_id='$lesson_id'"; 
									}
									 if($school_id != ""){
										$sql.=" AND s.school_id='$school_id'"; 
									} 
									
									
										 $sql.="  GROUP BY gr.id  ORDER BY gr.id Desc";
									 // echo $sql; exit;
									 
									 $e = "SELECT * FROM exam_types where id='$grade_term'";
									 $er = $this->db->query($e);
									 $erdata = $er->row_array();
									 
									 if(isset($erdata['exam_name']) && $erdata['exam_name'] != ''){
										 $getexam_name = $erdata['exam_name'];
									 }else{
										 $getexam_name = '';
									 }
									 
									 $ud = $this->Reports_model->query($sql);
									
									/* echo $this->db->last_query();
									  */
									  
									  
										/* $res = $this->admin->view_gradereportpdf($t_id);
										$data['view_data'] = $res[0]; */
										/* echo $this->db->last_query(); */
										$data['list_data'] = $ud['data'];
										
										/* $data['main_content'] = 'teacher_views/view_onlygradereport';
										$this->load->view('school_template/body',$data); */
										
										$mpdf = new \Mpdf\Mpdf();
										$html = $this->load->view('teacher_views/view_onlygradereport',$data,true);
										$mpdf->WriteHTML($html);
										$mpdf->Output();   
											  
		
		
		
	 }
	 
	



	public function export_report_bkp(){
		 
			$report_type = 'grade_report';
			 
			$from = '2023-07-11';
			$to = '2023-08-09';
			 
			  
			 if(isset($_POST['school_id'])){
				$school_id= $_POST['school_id'];
			}else{
				$school_id= 6;
			}
			 if(isset($_POST['teacherID'])){
			 $teacherID= $_POST['teacherID'];
			}else{
				$teacherID= '';
			}
			 if(isset($_POST['feedbackfor'])){
			 $feedbackfor= $_POST['feedbackfor'];
			}else{
				$feedbackfor= '';
			}
			 if(isset($_POST['feedback_status'])){
			 $feedbackstatus= $_POST['feedback_status'];
			}else{
				$feedbackstatus= '';
			}
			 if(isset($_POST['esfeedbackfor'])){
			 $esfeedbackfor= $_POST['esfeedbackfor'];
			}else{
				$esfeedbackfor= '';
			}
			if(isset($_POST['school_roles'])){
			 $school_roles= $_POST['school_roles'];
			
			}else{
				$school_roles= '';
			}
			if(isset($_POST['grade_term'])){
				$grade_term= $_POST['grade_term'];
			}else{
				$grade_term= '';
			}
			if(isset($_POST['class_id'])){
			 $class_id= $_POST['class_id'];
			}else{
				$class_id= '';
			}
			if(isset($_POST['lesson_id'])){
			 $lesson_id= $_POST['lesson_id'];
			}else{
				$lesson_id= '';
			}
			if(isset($_POST['section_id'])){
			 $section_id= '44';
			}else{
				$section_id= '';
			}
			if(isset($_POST['exam_type'])){
			 $exam_type= '1';
			}else{
				$exam_type= '';
			}
			 
		 
		 $sql ='SELECT  s.first_name, s.last_name,s.admission_number, c.class_name,sec.section_name, gr.*,g.grade_name,e.exam_name
									 FROM grade_reports gr JOIN grades g on g.id = gr.grade_id  JOIN exam_types e ON e.id = gr.exam_type JOIN students s ON s.student_id = gr.student_id JOIN student_academic_details sa on sa.sd_id = s.student_id JOIN classes c ON c.c_id = gr.class_id JOIN sections sec ON sec.section_id = gr.section_id JOIN academic_year a on a.id = gr.academic_id JOIN schools sch on s.school_id  = sch.id
										
									WHERE
										date(gr.created_at)>="'.$from.'" AND date(gr.created_at)<="'.$to.'" and  gr.is_del = "0"  and a.name = "currrent_year"
										';
									if($grade_term != ""){
										$sql.=" AND gr.exam_type='$grade_term'"; 
										
									} 
									if($class_id != ""){
										$sql.=" AND gr.class_id='$class_id'"; 
									}
									if($section_id != ""){
										$sql.=" AND gr.section_id='$section_id'"; 
									}
									if($lesson_id != ""){
										$sql.=" AND gr.lesson_id='$lesson_id'"; 
									}
									 if($school_id != ""){
										$sql.=" AND s.school_id='$school_id'"; 
									} 
									
									
										 $sql.="  GROUP BY gr.id  ORDER BY gr.id Desc";
									 /* echo $sql; */    
									 
									 $e = "SELECT * FROM exam_types where id='$grade_term'";
									 $er = $this->db->query($e);
									 $erdata = $er->row_array();
									 
									 if(isset($erdata['exam_name']) && $erdata['exam_name'] != ''){
										 $getexam_name = $erdata['exam_name'];
									 }else{
										 $getexam_name = '';
									 }
									 
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
									  
		 
						 if(!is_dir($path)){
							mkdir("$path", 0755,true);
						}
				
		  
				  // Load zip library
				  $this->load->library('zip');
				  foreach($ud['data'] as $r){
					  	 
						$res = $this->admin->view_gradereportpdf($r->id);
						$data['view_data'] = $res[0];
						 
						$mpdf = new \Mpdf\Mpdf();
						$html = $this->load->view('teacher_views/view_gradereport',$data,true);
						$mpdf->WriteHTML($html);
						$mpdf->Output($path.$r->id.'.pdf', 'F');  
					
						 $filepath  = $path.$r->id.'.pdf';
		
					  $fileName = $filepath;
					  $this->zip->read_file($fileName);

					}
					 
				   $filename = "backup.zip";
				   $this->zip->download($filename);   
			  
	 
	 }
	 }
	 
	

	 
	 
}