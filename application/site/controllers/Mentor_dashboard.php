
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mentor_dashboard extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Mentor_model");
		if (!$this->session->login_session )
			redirect('mentor_login/Login');
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
		$this->logo = 'assets/images/rfslogo.png';
	}


	public function dashboard(){
			
		
		$data['schools'] = $this->admin->get_Mentor_assigned_schools($this->uid);
		/* echo $this->db->last_query();  */
		/* $schoolcount = $this->admin->getSchoolsCount()[0];
		$data['schoolscount'] = $schoolcount->schools_count;  */
		
		$data['main_content'] = 'mentor_views/dashboard';
		$this->load->view('school_template/body', $data);
		
	}
   

	
	
}