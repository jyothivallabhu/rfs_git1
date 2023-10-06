
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepwd extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->comm_fun->is_not_logged_in();
		$this->comm_fun->onlyAdminAccess();
	    $this->u_data = $this->comm_fun->header_data(); 
		$this->uid = $this->session->userdata('infiniqo_user_id');
		$this->m_uid = $this->session->userdata('infiniqo_master_user_id');
		$this->name = $this->session->userdata('rfsparent_user_first_name');
		$this->user_type = $this->session->userdata('infiniqo_user_type');
		$this->load->library('datatblsel');
		$this->load->library('bcrypt');			
		$this->load->model('SiteSettings_model');		
		$this->load->model('Login_model');
	}
	
	public function index(){
		if($this->user_type == "INFINIQO CONFIGRATOR" || $this->user_type == "WORKSPACE CONFIGRATOR" ){
			$id = $this->m_uid ;
		}else{
			$id = $this->uid;	
		}
		//print_r($id);exit;
		if($id!="" ){
			$res = $this->SiteSettings_model->getInfo($id);
			if($res['num']==1){
				$data['record'] = $res['data'];			
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect($this->name.'/Dashboard');
			}
		}
		$data['main_content'] = 'change_password';
		$this->load->view('dash_template/body',$data);
	}
	
	 public function updatePass(){
		extract($_POST);
		$ud = $this->Login_model->getUser($this->uid);
		$user_pass = $ud['data']['0']['password'];
		$status=0;
		$msg='';
		$redirect='dashboard';
		if($cur_pass=='' ){
			$msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please Enter Current Password</strong>
			</div>' ;
		 }else if($new_pass=='' ){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please Enter New Password </strong>
			</div>' ;
		 }else if($re_pass=='' ){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please Re-Enter Password </strong>
			</div>' ;
		 }else if( ($this->bcrypt->check_password($cur_pass, $user_pass)) == ""){			 
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Invalid Current Password</strong>
			</div>' ;
		 }else if($re_pass!=$new_pass){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter Correct Re-type Password</strong>
			</div>' ;
		 }else{
			$update_data = array(
				'password'=>$this->bcrypt->hash_password($new_pass)
			);
			$res = $this->Login_model->modify($update_data,$this->uid);
			if($res){
				$status=1;
				$msg='<div class="alert alert-success">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Password Updated Successfully</strong></div>';
			}else{
				$msg='<div class="alert alert-warning">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Please Try Again Later</strong></div>';
			}
		 }
			 $res = array('status'=>$status,'msg'=>$msg);
		  echo json_encode($res); exit;
	}
	
	
	

}