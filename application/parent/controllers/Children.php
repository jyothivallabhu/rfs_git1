
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->comm_fun->is_not_logged_in();
	    $this->uid = $this->session->userdata('rfsparent_user_id');
		$this->name = $this->session->userdata('rfsparent_user_first_name');
		$this->school_id = $this->session->userdata('rfsparent_user_school_id');
		$this->load->model('Children_model');
		$this->load->model('Artwork_model');
		$this->load->model('Reports_model');
		/*$this->load->library('datatblsel');*/
	}
	

	
	public function index(){
		$data['childen'] =  $this->Children_model->getAllChildrenByParent($this->uid);
		//$data['childen'] =  $this->Children_model->getAllLessons();
		$data['main_content'] = 'children_list';
		$this->load->view('dash_template/body',$data);
	}
	
	public function child_step1(){
		$data['students'] = $this->Children_model->getAllUnAssigned();
		$data['main_content'] = 'add_child_step1';
		$this->load->view('dash_template/body',$data);
	}
	
	public function child_step2(){
		$student_id = $this->session->userdata('student_id');
		$sd = 	$this->Children_model->getStudentById($student_id);
		$data['stu_det'] = $sd['data'][0];
		$data['main_content'] = 'add_child_step2';
		$this->load->view('dash_template/body',$data);
	}
	
	public function unassign(){
		$msg['success'] = false;
		$msg['msg'] = '';
		/*print_r($_POST); exit;*/
		if (!isset($_POST['s']) || $_POST['s'] == "" || $_POST['s'] < 0) {
			$msg['msg'] = '<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Invalid Request</strong>
			</div>';
		} else {
			$s = addslashes($_POST['s']);
				$update_data['non_xss'] = array(
						'parent_id'=>0,						
				);
				$update_data['xss_data'] = clean_ip($update_data['non_xss']);	
				$q = $this->Children_model->update($update_data['xss_data'],$s);	
			if ($q) {
				$msg['success'] = true;
			} else {
				$msg['success'] = false;
				$msg['msg'] = '<div class="alert alert-warning">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Unable to update ,please try again</strong>
						</div>';
			}
		}
     
		//$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$msg['cst']['cstn'] = $this->security->get_csrf_token_name();
		$msg['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($msg);
	}
	
	function step1(){
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		 if($this->input->post('student_id')=='' ){
				$msg = warning_msg('Please select student');
		 }else{	
				$this->session->set_userdata('student_id', $student_id);			
				$status=1;
				$url=base_url('Children/child_step2');
				$msg = success_msg('Success');
		 }
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
	}	
	
	function step2(){
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$student_id = $this->session->userdata('student_id');
		$user_id = $this->uid;
		$update_data['non_xss'] = array(
						'parent_id'=> $this->uid,						
				);
		$update_data['xss_data'] = clean_ip($update_data['non_xss']);	
		$q = $this->Children_model->update($update_data['xss_data'],$student_id);				
		if($q){
			$this->session->set_userdata('student_id','');
			$status=1;
			$url=base_url('Children');
			$msg = success_msg('Assigned Successfully');	

		}else{
			$msg = warning_msg('Please Try Again !');	
		}
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
	}	
	
	public function edit_child(){
		$student_id = $this->uri->segment('3');
		$sd = 	$this->Children_model->getStudentById($student_id);
		if($sd['num']>0){
			$data['stu_det'] = $sd['data'][0];
			$data['main_content'] = 'edit_child';
			$this->load->view('dash_template/body',$data);
		}else{
			$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
			redirect('Children');
		}
		
	}
	
	
	function update(){
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$id = $this->uid;
		$update_data = array();
		$student_id = addslashes($this->uri->segment('3'));
		$sd = $this->Children_model->getStudentById($student_id);
		if($sd['num'] < 0){
			$msg = warning_msg('Invalid request');	
		}else{
			
				$folderPath = "../uploads/student_image/";
				if ($_POST['base_code']) {
					$image_parts = explode(";base64,", $_POST['base_code']); 
					$image_type_aux = explode("image/", $image_parts[0]);
					$image_type = $image_type_aux[1];
					$image_base64 = base64_decode($image_parts[1]);
					$img=uniqid() . '.jpg'; //$image_type
					$file = $folderPath .$img ;
					file_put_contents($file, $image_base64);
					$update_data['non_xss']['photo'] = 'uploads/student_image/'.$img;
				}else{
					$update_data['non_xss'][] = '';
				}
				
				$update_data['xss_data'] = clean_ip($update_data['non_xss']);	
				$q = $this->Children_model->update($update_data['xss_data'],$student_id);				
				if($q){
					$status=1;
					$url=base_url('Children');
					$msg = success_msg('Image Updated Successfully');	

				}else{
					$msg = warning_msg('Please Try Again !');	
				}		
		}
			
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
		
		
	}
	
	function grade_report(){
		
		$data['students'] = 	$this->Children_model->getAllChildrenByParent($this->uid);
		
		$data['main_content'] = 'reports';
		$this->load->view('dash_template/body',$data);
	}
	
	function ajGetLessons(){
		 if(isset($_POST['section_id']) && $_POST['section_id']!=""){
			$section =  explode('-',$_POST['section_id']);
			$section_id = $section[0];
			$res = $this->Children_model->getLessonsBySec($section_id);
			//print_r($res);exit;
				echo "<option value=''>Select Lesson</option>";	
			if($res['num']>0){
				foreach($res['data'] as $r){
					
					echo "<option value='$r->lesson_id'>$r->lesson_name</option>";	
				}	
				
			}
			 
		 }
	 }
	 function getData(){
		//print_r($_POST);exit;
		$success=false;
		$msg='';
		$tbl='';
		$tot_tbl='';
		
		 if(isset($_POST['report_type']) && $_POST['report_type']!="" ){
			 $report_type = $_POST['report_type'];
			
			 $student_id= $_POST['student_id'];
			 
			         if($report_type =='grade_report'){
						 $sql ='SELECT 
										l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,sec.section_name, g.*,grades.grade_name
									FROM 
										grade_reports as g
									JOIN 
										grades 
									ON
										grades.id = g.grade_id
									JOIN 
										lessons as l
									ON
										g.lesson_id = l.lesson_id
									
									JOIN 
										`students` as s
									ON
										g.student_id = s.student_id
									JOIN 
										`student_academic_details` as sa
									ON
										sa.sd_student_id = s.student_id
										
									JOIN 
										classes as c
									ON
										c.c_id = sa.sd_class_id
									JOIN 
										sections as sec
									ON
										sec.section_id = sa.sd_section_id
									WHERE
										g.is_del = "0" 
										';
									 
									if($student_id != ""){
										$sql.=" AND g.student_id='$student_id'"; 
									}
									
									
										 $sql.="  ORDER BY g.id ASC";
									 /* echo $sql;   */
									 $ud = $this->Reports_model->query($sql);
									  if($ud['num']>0){
										 $success=true;
										 $tbl.='<thead>
										 <tr><th colspan="6">Grade Report</th></tr>
													<tr>
														<th>Date</th>
														<th>Student Name</th>
														<th>Class-section</th>
														<th>Lesson Name</th>
														<th>Grade</th>
										            </tr>
												</thead><tbody>';
										 foreach($ud['data'] as $r){
											$tbl.='<tr>
														<td>'.date('d-m-Y',strtotime($r->created_at)).'</td>
														<td>'.$r->first_name.'</td>
														<td>'.$r->class_name.' - '.$r->section_name.'</td>
														<td>'.$r->lesson_name.'</td>
														<td>'.$r->grade_name.'</td>
														
													</tr>';
										 }									
									  $tot_tbl.='';
									 }else{
										 $msg='No Records Found';
									 }
					 }
					 
					 
					 
		 }else{
			 $msg='Invalid Request';
		 }
		 echo json_encode(array('success'=>$success,'msg'=>$msg,'tbl'=>$tbl,'tot'=>$tot_tbl));
	}


	
	

}