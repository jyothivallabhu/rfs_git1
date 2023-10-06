
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Teacher_students extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Teacher_students_model");
		if (!$this->session->login_session )
			redirect('Login');
		
	
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = $_SESSION['login_session']['school_id'];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
			$this->load->library('datatblsel_sel');
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
	}

	
	
	
	
	function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		
		$sid = $_POST['section_id'];
		
		$academic_year = $this->admin->get_academic_year()[0];
		
		 $academic_year = (!empty($this->session->userdata('student_academic_year'))) ? $this->session->userdata('student_academic_year') : $academic_year->id ;  

		
		
		
		$select = 's.*,  concat(s.first_name," ", s.last_name) as fullname, case when (photo is null or photo = "") then "'.base_url().'assets/images/user.png" else photo end as "image_path",c.class_name as class_name, sec.section_name as section_name,a.values as academic_year,c.c_id,s.section_id';
		$column = array('s.first_name');
		$order = array('s.student_id' => 'asc');
		$where=" sa.sd_school_id = $this->school_id and sa.sd_section_id = '$sid' and sa.sd_academic_year = '$academic_year'";
		$join = array();
		$join[] = array('table_name'=>'student_academic_details as sa','on'=>'sa.sd_student_id = s.student_id'); 
		$join[] = array('table_name'=>'sections as sec','on'=>'sec.section_id = sa.sd_section_id'); 
		$join[] = array('table_name'=>'classes as c','on'=>'c.c_id = sa.sd_class_id'); 
		$join[] = array('table_name'=>'academic_year as a','on'=>'a.id = sa.sd_academic_year'); 
		$tb_name = 'students as s';
		$list = $this->datatblsel_sel->get_datatables($select,$column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $limit;
		$i = 0;
		/* echo $this->db->last_query();  */
		foreach ($list as $req) {  
			
			$no++;
			$row = array();
			$action='<a href="'.base_url($this->url_slug.'/view_students/'.$req->student_id).'" class="badge badge-primary"> <i class="anticon anticon-eye"></i> View </a> ';
			
			$status = $req->status=='1'?'Active':'Inactive';
			if($req->status=='1'){
				$status = '<a class="badge badge-pill badge-cyan font-size-12">'.$status.'</a>';	
			}else{
				$status = '<a class="badge badge-pill badge-gold font-size-12">'.$status.'</a>';	
			}
			$i = $i +1;
			$row[] = '<img src="'. $req->image_path .' " height="60" width="60" />';
			$row[] = $req->admission_number;
			$row[] = $req->fullname;
			$row[] = $req->class_name;
			$row[] = $req->section_name;
			$row[] = $status;
			$row[] = $action;
			$data[] = $row;
		}
		
		
		$this->session->set_userdata('student_academic_year','');
		
		$output = array(
				"draw" => $draw,
				"recordsTotal" => $this->datatblsel_sel->count_filtered($select,$column,$order,$tb_name,$join,$where),
				"recordsFiltered" => $this->datatblsel_sel->count_filtered($select,$column,$order,$tb_name,$join,$where),
				"data" => $data,
			);
		echo json_encode($output);
	}
	
	public function view_students()
	{
		$sid = $this->uri->segment(3);
		
		$students = $this->admin->get_studentsByID($sid)[0];
		
		if(isset($students->parent_id)  && $students->parent_id!= '0'){
			$data['parents'] = $this->admin->get_parentsByStudentId($students->parent_id);
		}
		
		$data['view_data'] = $students;
		$data['main_content'] = 'teacher_views/view_student';
		$this->load->view('school_template/body', $data);
	} 
	public function index($sid)
	{
		$data['section_id'] = $this->uri->segment(3);
		$data['academic_year'] = $this->uri->segment(4);
		$data['main_content'] = 'teacher_views/students';
		$this->load->view('school_template/body', $data);
	}
	

	
	
}