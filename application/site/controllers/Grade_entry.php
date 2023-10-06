
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Grade_entry extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Teacher_lessons_model");
		$this->load->model("Teacher_students_model");
		if (!$this->session->login_session )
			redirect($this->url_slug.'/Login');
		
		$this->role_id =  $_SESSION["login_session"]["role_id"];
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
			$this->load->library('datatblsel_sel');
			if(isset($_SESSION['login_session']['school_id'])){
				$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
				$this->logo = $this->school_data->logo;
			}else{
				$this->logo = '';
			}
			
			$this->load->library('Ajax_pagination');
			$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
			$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
	}

	public function index()
	{
		 $data['grades'] = $this->admin->get_GradesschoolsByID($this->school_id);
		
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		$data['exam_types'] = $this->admin->get_exam_types($this->school_id);
		$data['main_content'] = 'teacher_views/grade_entry';
		$this->load->view('school_template/body', $data);
		
	}
	
	
	public function create()
	{
		$status = 0;
		$msg= '';
		$url = '';
		$_POST['role_id'] = 5;
		
		
		if($this->input->post('class_id')=='' ){
			$msg = warning_msg('Please Enter Class');	
		}else if($this->input->post('section_id')=='' ){
			$msg = warning_msg('Please Enter Section');	
		}else if($this->input->post('student_id')=='' ){
			$msg = warning_msg('Please Enter Student');	
		}else if($this->input->post('grade_id')=='' ){
			$msg = warning_msg('Please Enter Grade');	
		}else if($this->input->post('exam_type')=='' ){
			$msg = warning_msg('Please Select Exam Type');	
		}else{
			
			 $academic_year = $this->admin->get_academic_year()[0];
			$save_data = array(
			
					'grade_id'=>trim($_POST['grade_id']),
					'class_id'=>trim($_POST['class_id']), 
					'section_id'=>trim($_POST['section_id']),
					'student_id'=>trim($_POST['student_id']),
					'lesson_id'=>trim($_POST['lesson_id']),
					'comments'=>trim($_POST['comments']),
					'exam_type'=>trim($_POST['exam_type']),
					'academic_id'=>$academic_year->id ,
					'added_by'=>$this->uid,
				);
				
			
		
			/* $if_exists = $this->admin->check_if_email_exists($_POST['email']);
			if ($if_exists == 0) { */
				$q = $this->db->insert('grade_reports', $save_data);
				if($q){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url().$this->url_slug.'/grade_entry';
				}else{
					$status = 0;
					$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
					Something went wrong, please Try Again Later</div>';
				}
				
			/* }else{
				$status = 0;
				$msg = '<div class="alert alert-warning text-center alert-dismiss "> Email already exists. Please try with new Email</div>';
				$url = base_url().'mentors/add_mentor';
				//redirect('mentors/add_mentor');
			} */
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}
	
	function bulk_grade_entry(){
		$data['grades'] = $this->admin->get_GradesschoolsByID($this->school_id);
		
		$data['classes'] = $this->admin->get_allactiveclasses($this->school_id);
		$data['exam_types'] = $this->admin->get_exam_types($this->school_id);

		$data['main_content'] = 'teacher_views/bulk_grade_entry';
		$this->load->view('school_template/body', $data);
	}
	
	function create_bulk_entry_step1(){
		
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/get_grade_entry_students' :  'get_grade_entry_students/'.$_POST["school_id"];
		
		 if($this->input->post('class_id')=='' ){
				$msg = warning_msg('Please select Class');
		 }elseif($this->input->post('section_id')=='' ){
				$msg = warning_msg('Please select Section');
		 }elseif($this->input->post('lesson_id')=='' ){
				$msg = warning_msg('Please select Lesson');
		 }elseif($this->input->post('exam_type')=='' ){
				$msg = warning_msg('Please select Exam');
		 } else{	
		 
		 $lesson_ids = implode(",", $this->input->post('lesson_id'));
		 
				$this->session->set_userdata('class_id', $class_id);			
				$this->session->set_userdata('section_id', $section_id);			
				$this->session->set_userdata('lesson_id', $lesson_ids);			
				$this->session->set_userdata('exam_type', $exam_type);			
				$status=1;
				
				$url=base_url($rid);
				$msg = success_msg('Success');
		 }
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
		
	}
	function get_grade_entry_students(){
		$section_id = $this->session->userdata('section_id');
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/bulk_grade_entry' :  'bulk_grade_entry/'.$_POST["school_id"];
		/* if(!empty($this->session->userdata('class_id')) || !empty($this->session->userdata('section_id')) || !empty($this->session->userdata('lesson_id')) || !empty($this->session->userdata('exam_type')) ){ */
			$ary['school_id'] = $this->school_id;
			$ary['section_id'] = $section_id;
			
			$classInfo = $this->admin->classInfo($this->session->userdata('class_id'));
			 
			 $data['classInfo'] = $classInfo;
			 
			$data['sectionInfo'] = $this->admin->sectionInfo($this->session->userdata('section_id'));
			$data['exam_typeInfo'] = $this->admin->examtyeInfo($this->session->userdata('exam_type'));
			
			$classgrades =  $classInfo['data']['grades'];
			
			$res = $this->admin->get_students($ary);
			$data['students'] = $res;
			/* $data['grades'] = $this->admin->get_GradesschoolsByID($this->school_id); */
			$data['grades'] = $this->admin->get_GradesByClassID($classgrades);
			$data['main_content'] = 'teacher_views/bulk_grade_entry_upload';
				
			if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
				$this->load->view('school_template/body', $data);
			}else{
				$this->load->view('dash_template/body', $data);
			}
		
		/* }else{
			$status=1;
			$msg='<div class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please Fill All the Details</strong></div>';
			$url=base_url().$rid;
		} */
		
	}
	
	function save_bulk_entry(){
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/bulk_grade_entry' :  'bulk_grade_entry/'.$_POST["school_id"];
		
		 $academic_year = $this->admin->get_academic_year()[0];
		 
		 $student_grades = array();
		 $student_id = (isset($_POST['student_id']))?$_POST['student_id']:array();
		 $grade_id = $this->input->post('grade_id');
		
		
			
			if(!empty($student_id)){
				for($i=0;$i<count($student_id);$i++){
					
					if(isset($grade_id[$i]) && $grade_id[$i]!=""){
						$checkarray=array(
								'student_id'=>$student_id[$i],
								'class_id'=>$this->session->userdata('class_id'),
								'section_id'=>$this->session->userdata('section_id'),
								'lesson_id'=>$this->session->userdata('lesson_id'),
								'exam_type'=>$this->session->userdata('exam_type'),
								'grade_id'=>$grade_id[$i],
								'comments'=>$comments[$i],
								'created_at'=>date('Y-m-d h:i:s'),
								'academic_id'=>$academic_year->id 
							);
							
						$if_exists = $this->admin->check_if_grade_report_exists($checkarray);
						if ($if_exists == 0) {
							$student_grades[]=array(
								'student_id'=>$student_id[$i],
								'class_id'=>$this->session->userdata('class_id'),
								'section_id'=>$this->session->userdata('section_id'),
								'lesson_id'=>$this->session->userdata('lesson_id'),
								'exam_type'=>$this->session->userdata('exam_type'),
								'objective'=>$this->input->post('objective'),
								'grade_id'=>$grade_id[$i],
								'comments'=>$comments[$i],
								'created_at'=>date('Y-m-d h:i:s'),
								'academic_id'=>$academic_year->id 
							);
						}else{
							$update_data=array(
								'student_id'=>$student_id[$i],
								'class_id'=>$this->session->userdata('class_id'),
								'section_id'=>$this->session->userdata('section_id'),
								'lesson_id'=>$this->session->userdata('lesson_id'),
								'exam_type'=>$this->session->userdata('exam_type'),
								'objective'=>$this->input->post('objective'),
								'grade_id'=>$grade_id[$i],
								'comments'=>$comments[$i],
								'created_at'=>date('Y-m-d h:i:s'),
								'academic_id'=>$academic_year->id 
							);
							
							$this->db->set($update_data);
							$this->db->where(array('student_id' => $student_id[$i],'class_id' => $this->session->userdata('class_id'),'section_id' => $this->session->userdata('section_id'),'exam_type' => $this->session->userdata('exam_type'),'academic_id' => $academic_year->id ));
							$q = $this->db->update('grade_reports');
							
						}
					}
					
				}
				
				if(!empty($student_grades)){
					$q = $this->admin->create_bulk_grades($student_grades);
					
					/* if($q){
						
					} */
					
				}
			}
			$status=1;
			$url=base_url().$rid;
			$msg='<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Grade Details Updated Successfully</strong></div>';
				  
				$this->session->set_userdata('class_id','');
				$this->session->set_userdata('section_id','');
				$this->session->set_userdata('lesson_id','');
				$this->session->set_userdata('exam_type',''); 
						
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}
	function view_gradereport(){
		$t_id = addslashes($this->uri->segment('3'));
		if($t_id!="" ){
			$res = $this->admin->getgradeInfo($t_id);
			
			if($res['num']==1){
				
				$data['view_data'] = $res['data'];			
				$data['main_content'] = 'teacher_views/view_gradereport';
				$this->load->view('school_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect($this->url_slug.'/bulk_grade_entry');
			}	
		}else{
			redirect($this->url_slug.'/bulk_grade_entry');
		}
	}
	function grade_report(){
		
		$data['classes'] = $this->admin->get_allactiveclasses($this->school_id);
		$data['exam_types'] = $this->admin->get_exam_types($this->school_id);
		$data['main_content'] = 'teacher_views/reports';
		$this->load->view('school_template/body',$data);
	}
	
	
	function view_gradereportpdf(){
		
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $this->uri->segment('3') : $this->uri->segment("2");
		
		$t_id = addslashes($id);
		
		$res = $this->admin->view_gradereportpdf($t_id);
		/* echo $this->db->last_query(); */
		$data['view_data'] = $res[0];
		
		/* $data['main_content'] = 'teacher_views/view_gradereport';
		$this->load->view('school_template/body',$data);  */
		
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('teacher_views/view_gradereport',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();  
		
		/* opens in browser
        $mpdf->Output('welcome.pdf','D'); // it downloads the file into the user system. */
	}
	
}