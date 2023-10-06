
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->comm_fun->is_logged_in();
		$this->load->model('Login_model');
		$this->load->library('bcrypt');
		date_default_timezone_set('Asia/Kolkata');
	}
	
	public function index(){
		$data['main_content'] = 'login';
		$this->load->view('login_template/body',$data);
	}
	
		
	function validate(){
		
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		if(isset($email) && $email==""){/*do email validation here and in signup*/
			$msg='<div class="alert alert-warning">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Please enter email</strong></div>';
		}else if(isset($password) && $password==""){
			$msg='<div class="alert alert-warning">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Please enter password</strong></div>';
		}else{			
			/* $ud = $this->Login_model->validate($name,md5($password));		 */
			$ud = $this->Login_model->verify($email);				
			/* echo $this->db->last_query();  */
			/* eecho $password .' - '.$ud[0]['password'];
			exit; */
			if ($ud) {
				$stored_password = $ud[0]['password'];
				if ($this->bcrypt->check_password($password, $stored_password)) {		
						$user = $ud[0];
					   if($user['status']==1){		
							$user_id = $user['id'];
							$first_name = $user['first_name'];							
							$email = $user['email'];							
							$sess_data = array(					
								'rfsparent_user_id'=>$user_id,															
								'rfsparent_user_first_name'=>$first_name,
								'rfsparent_user_email'=>$email,
								'rfsparent_user_school_id'=>$user['school_id'],
								'rfsparent_user_logged_in'=>true
							);
							$save_tracking = array(
							'user_id' 			=> $user['id'],
							'tracking_date' 	=> date('Y-m-d'),
							'tracking_fromtime'	=> date('Y-m-d H:i:s'),
							'tracking_totime' 	=> date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +30 minutes")),
							
						);
						
						$tr = $this->db->insert('user_tracking',$save_tracking);
						$track_id = $this->db->insert_id();
						
						$sess_data['track_id']  	= $track_id;
						
						$this->session->sess_expiration = '1800'; /* //30 Minutes */
						$this->session->sess_expire_on_close = 'true';
						
							$this->session->set_userdata($sess_data);
							$status=1;
							$url = base_url('Dashboard');							
							$msg='<div class="alert alert-success">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Successfully logged in</strong></div>';
						}else{
							  $msg='<div class="alert alert-warning">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Your account been deactivated,please contact admin  </strong></div>';											
						}							
				} else {
					$msg=warning_msg('Invalid Credentials');
				}		
			} else {
				$msg=warning_msg('Invalid Credentials');
			}								 
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	 }
}
