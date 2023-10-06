
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpwd extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->comm_fun->is_logged_in();
		$this->load->model('Login_model');
		
		$this->load->library('bcrypt');
	}
	
	public function index(){
		$data['title'] = "Reset Password";
		$data['main_content'] = 'forgot_password';
		$this->load->view('login_template/body',$data);
	}
	
	function validate(){
		extract($_POST);
		$status=0;
		$msg='';
		if(isset($email) && $email==""){/*do email validation here and in signup*/
			$msg='<div class="alert alert-warning">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Please enter valid email</strong></div>';
		}else{			
			$ud = $this->Login_model->validateEmail($email);	
          /*print_r($ud);exit;	*/		
			if($ud['num']==1){						
				
				$user = $ud['data']['0'];
				$user_id = $user['id'];
				$full_name = $user['first_name'].' '.$user['last_name'];
				$email = $user['email'];				
           /* $td = $this->Login_model->getTokenDetails($user_id);
	        if($td['num']==1){ */
					/* $token = $td['data']['0'];
					$token_string = $token['code']; */
				/*print_r($td); exit;*/	   
				$subject='RainbowFish Password Recovery Mail';	
				$html="<html>
					<body>
						<p> Dear ".$full_name.",<br>
						<p>Please click the below link to set a new password
						<a href='".base_url('forgotpwd/pwdactivate').'/'.md5($email)."'>Click here to get a new password</a>
					<p>Thanks & Regards ,<br> RainbowFish</p>		
					</body>
				</html>";
				/* echo $html; exit;  */
				 /*Email*/
					$r = $this->comm_fun->send_mail($email,$subject,$html);
					/* print_r($r); */
				 /*Email*/
				$status=1;
				$msg='<div class="alert alert-success">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Recovery mail sent to your registered email id </strong></div>';
			  /* }else{
			  $msg='<div class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>No user with this email id</strong></div>';
								
			} */		
			}else{
				  $msg='<div class="alert alert-danger">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>No user with this email id</strong></div>';
								
			}		 
					 
		}
		$res = array('status'=>$status,'msg'=>$msg);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	 }
	 
	 function pwdactivate(){		
				$status=0;
				$msg='';
			 $email = $this->uri->segment(3);
			 $token = $this->uri->segment(4);
				
			   $q = $this->Login_model->validate_email($email);
			   
				if($q['num']==1){
					
					$status=1;
						$data['title'] = "Reset Password";
						$data['main_content']='new_pwd_set';
		                $this->load->view('login_template/body',$data);
						
				}else{
					$msg='<div class="alert alert-warning">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Please try again later </strong></div>';
				   $this->session->set_flashdata('msg',$msg);
				   redirect('login');
					
				}
						
	}
	
	
	 public function sendnewpwd(){
		$email = $this->uri->segment(3);
		$token = $this->uri->segment(4);
		$q = $this->Login_model->validate_email($email);
		$user = $q['data']['0'];
		//print_r($user);exit;
		$user_id = $user['id'];
		extract($_POST);
		$status=0;
		$msg='';
		$redirect='profile';
		
		 if($new_pass=='' ){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please Enter New Password </strong>
			</div>' ;
		 }else if($re_pass=='' ){
			 $msg='<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Please Re-Enter Password </strong>
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
			
			$res = $this->Login_model->modify($update_data,$user_id);
			//echo $this->db->last_query(); exit;
			
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
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}

}
