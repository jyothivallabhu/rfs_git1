
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_help extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		/* $this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->user_id = $_SESSION['login_session']['user_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		} */
		
		$this->headerdata = $this->comm_fun->header_data();
		$this->comm_fun->is_not_logged_in();
	    $this->uid = $this->session->userdata('rfsparent_user_id');
		$this->name = $this->session->userdata('rfsparent_user_first_name');
		$this->school_id = $this->session->userdata('rfsparent_user_school_id');
		
		$this->load->model('Artwork_model');
		
		date_default_timezone_set("Asia/Kolkata");
		
		
	}
	
	
	
	public function index(){
		
		$data['main_content'] = 'get_help';
		$this->load->view('dash_template/body', $data);
	}
	
	public function save()
	{
		
		$status = 0;
		$msg= '';
		$url = '';
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/get_help' :  'get_help/';
		
		if($this->input->post('title')=='' ){
			$msg = warning_msg('Please Enter Title');	
		}else if($this->input->post('description')=='' ){
			$msg = warning_msg('Please Enter description');	
		}else{
			
			$save_data = array(
					'title'=>trim(ucwords($_POST['title'])),
					'description'=>trim(ucfirst($_POST['description'])),
					'user_id'=>$this->user_id,
					'added_date'=>date('Y-m-d h:i:s'),
				);
				
				
			
			if(isset($_FILES['attachment']) && !empty($_FILES) && $_FILES['attachment']['name']!=""){		
				$trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				$size1 = $_FILES['attachment']['size'];
				$file_name1 = $_FILES['attachment']['name'];
				$path_parts1=pathinfo($_FILES['attachment']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$save_data['attachment']=$trgt1.$file1;
				move_uploaded_file($_FILES['attachment']['tmp_name'],$trgt1.$file1); 
			 }
			
				$q = $this->db->insert('get_help', $save_data);
				if($q){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url($rid);
				}else{
					$status = 0;
					$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
					Something went wrong, please Try Again Later</div>';
				}
				
			
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
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