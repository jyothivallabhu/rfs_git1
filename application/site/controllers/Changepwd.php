
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepwd extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->name = $_SESSION['login_session']['first_name'];
		$this->load->library('datatblsel');
		$this->load->library('bcrypt');				
		if (!$this->session->login_session )
			redirect('Login');
		
        $this->load->model('Login_model', 'login_model');
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
	}
	
	
	
	public function index(){
		
		$data['main_content'] = 'change_password';
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''  ){	
			$this->load->view('school_template/body', $data);
		}elseif( $_SESSION["login_session"]["role_id"] =='5' ){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
		/* $this->load->view('dash_template/body',$data); */
	}
	
	 public function updatePass(){
		extract($_POST);
		$ud = $this->login_model->getUser($this->uid);
		$user_pass = $ud['data']['0']['password'];
		$cur_pass = $this->bcrypt->hash_password($cur_pass);
		//$new_pass = $this->bcrypt->hash_password($new_pass);
		/*echo"<pre>";
		print_r($_POST);
		print_r($_FILES);
		exit;*/
		$url = '';
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
		 }else if($cur_pass == $new_pass){ 
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Current Password and New password is same,try with different one</strong>
			</div>' ;
		 }else if($re_pass!=$new_pass){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please enter Correct Re-type Password</strong>
			</div>' ;
		 }else{
			$update_data = array(
				'password'=>$this->bcrypt->hash_password($new_pass),
				'is_password_changed'=>'1'
			);
			
			$res = $this->login_model->modify($update_data,$this->uid);
			if($res){
				$status=1;
				$msg='<div class="alert alert-success">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Password Updated Successfully</strong></div>';
				  
				  if($this->role_id == '5'){
					  $url = base_url('mentor_login/logout');
				  }elseif( isset($this->url_slug) && $this->url_slug!='') {
					  $url= base_url($this->url_slug.'/logout');
				  }else{
					  $url = base_url('logout');
				  }
				  
				 /*  echo $url; exit; */
				  
			}else{
				$msg='<div class="alert alert-warning">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Please Try Again Later</strong></div>';
			}
		 }
			 $res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
			 $res['cst']['cstn'] = $this->security->get_csrf_token_name();
			$res['cst']['cstv'] = $this->security->get_csrf_hash();
		  echo json_encode($res); exit;
	}
	
	
	

}