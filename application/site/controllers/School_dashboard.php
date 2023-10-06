
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class school_dashboard extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		$this->load->model("login_model");
		$this->load->model("Teachers_model");
		$this->load->model("Teachers_artwork_model");
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->role_id =  $_SESSION["login_session"]["role_id"];
		$this->uid = $_SESSION['login_session']['user_id'];
		
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}
		
	}


	public function school_dashboard(){
		/* $seccount = $this->admin->get_sectionsCountBySchoolId($this->uid)[0];
		$data['sectionscount'] = $seccount->seccount;
		
		$cal_sech_data = $this->Teachers_model->getTeacherScheData();
		$data['calendar_schedule_date']= $cal_sech_data['data'];
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id);
		$data['classes'] = $this->admin->get_allclasses($this->school_id);
		$data['main_content'] = 'teacher_views/dashboard';
		$this->load->view('school_template/body', $data); */
		
		$trailclass = 'all';
		$seccount = $this->admin->get_sectionsCountBySchoolId($this->uid)[0];
		$data['sectionscount'] = $seccount->seccount;
		
		$trailSubmitted = $this->Teachers_model->getTeacherTrailCount('trail','1',$this->uid,$trailclass)[0];
		$data['trailsubmittedcount'] = $trailSubmitted->totalcount; 
		
		$trailnotstarted = $this->Teachers_model->getTeacherTrailCount('trail','0',$this->uid,$trailclass)[0];
		$data['trailnotstartedcount'] = $trailnotstarted->totalcount; 
		
		$trailapproved = $this->Teachers_model->getTeacherTrailCount('trail','2',$this->uid,$trailclass)[0];
		$data['trailapprovedcount'] = $trailapproved->totalcount; 
		
		$mentoringsubmitted = $this->Teachers_model->getTeacherTrailCount('mentoring','1',$this->uid,$trailclass)[0];
		$data['mentoringsubmitted'] = $mentoringsubmitted->totalcount; 
		
		$mentoringapproved = $this->Teachers_model->getTeacherTrailCount('mentoring','2',$this->uid,$trailclass)[0];
		$data['mentoringapproved'] = $mentoringapproved->totalcount; 
		
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id);
		
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		
		$cal_sech_data = $this->Teachers_model->getTeacherScheData();
		/* echo $this->db->last_query(); */
		$data['calendar_schedule_date']= $cal_sech_data['data'];
		
		$cal_act_data = $this->Teachers_model->getSchoolactivityData();
		
		$data['cal_activity_data']= $cal_act_data['data'];
		
		$ary['class_id'] = '';
		$ary['lesson_id'] = '';
		   
		$res = $this->Teachers_artwork_model->getArtworkByclassandlessons($ary);
		$data['artdata'] = $res;
		
		
		/* New dashboard */
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		 /* echo $this->db->last_query();
		 print_r($data['schools']);exit; */
		 
		 $ary['school_id'] = $id;
		 
		$data['teachers'] = $res = $this->Teachers_model->get_schoolteachers($ary);
		$data['exam_types'] = $res = $this->admin->getExam_types($ary);
		
		
		/* New dashboard */
				
		$data['main_content'] = 'admin/schools/management_dashboard';
		$this->load->view('school_template/body', $data);
	}
   
	public function index($param =NULL)
	{
		
		
		if($this->uid  == 1 || $this->uid  == 20 || $this->role_id == 5){
			
			
			$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");;
		
			$data['schools'] = $this->admin->get_schoolsByID($id)[0];
			$seccount = $this->admin->get_sectionsCountBySchoolId($id)[0];
			$classcount = $this->admin->get_classCountBySchoolId($id)[0];
			$adminscount = $this->admin->get_adminscountBySchoolId($id)[0];
			$mentorscount = $this->admin->get_mentorscountBySchoolId($id)[0];
			$studentscount = $this->admin->get_studentscountBySchoolId($id)[0];
			$parentscount = $this->admin->get_parentscountBySchoolId($id)[0];
			
			$data['sectionscount'] = $seccount->seccount;
			$data['classcount'] = $classcount->class_count;
			$data['mentorscount'] = $mentorscount->schoolmentorscount;
			$data['adminscount'] = $adminscount->admins_count;
			$data['parentscount'] = $parentscount->parents_count;
			$data['studentscount'] = $studentscount->students_count;
			
			if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
				$data['main_content'] = 'admin/schools/dashboard';
				$this->load->view('school_template/body', $data);
			}else{
				$data['main_content'] = 'admin/schools/schools_dashboard';
				$this->load->view('dash_template/body', $data);
			}
		}else{
			
			 if($this->role_id == 4 || $this->role_id == 9){
				redirect($this->url_slug.'/school_dashboard');
			}elseif($this->role_id == 10){
				redirect($this->url_slug.'/teacher_dashboard');
			 }/* elseif($this->role_id == 5){
				redirect( 'school_dashboard');
			 } *//* else{
				 redirect(404);
			 } */
			
		}
		
		
	}


	
	
}