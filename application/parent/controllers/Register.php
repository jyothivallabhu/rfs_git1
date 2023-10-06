
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->comm_fun->is_logged_in();
		$this->load->model('Login_model');
		$this->load->library('bcrypt');
	}
	
	public function index(){
		
		
		$data['schools'] =  $this->Login_model->getAllSchools();
		$data['main_content'] = 'register';
		$this->load->view('login_template/body',$data);
	}
	
	function create(){
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		
		 if($this->input->post('first_name')=='' ){
				$msg = warning_msg('Please enter first name');
		 }elseif($this->input->post('last_name')=='' ){
				$msg = warning_msg('Please enter last name');
		 }elseif($this->input->post('school_id')=='' ){
				$msg = warning_msg('Please Select School');
		 } else{	
		    $password=$this->input->post('password');
			$hash = $this->bcrypt->hash_password($password);
			$insert_data['non_xss'] = array(			
				'role_id'=>8,
				'first_name'=>addslashes($this->input->post('first_name')),
				'last_name'=>addslashes($this->input->post('last_name')),
				'email'=>addslashes($this->input->post('email')),
				'school_id'=>addslashes($this->input->post('school_id')),
				'password'=>$hash,
			);
			
			$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
			
			
			$res = $this->Login_model->insert_user($insert_data['xss_data']);
			
			
			if($res){
				$status=1;
				$url=base_url('Login');
				$msg = success_msg('Registered Created Successfully');
			}else{
				$msg = warning_msg('Unable to create please try again later!');						
			}
		 }
		 
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
	}	
	
}
