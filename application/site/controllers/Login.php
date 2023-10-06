<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
		header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
		header ("Cache-Control: no-cache, must-revalidate");  
		header ("Pragma: no-cache");
		date_default_timezone_set('Asia/Kolkata');		
        parent::__construct();
        $this->load->database();
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('date');
		
		
		
		$this->load->library('bcrypt');
		
		$this->is_logged_in();
		
        $this->load->model('Login_model', 'login_model');
    }
	
	function is_logged_in(){

		$is_logged_in = $this->session->login_session;

		if(isset($is_logged_in) && $is_logged_in==true){
			
			
			if($_SESSION['login_session']['role_id'] == '1' ){
				$url = base_url('admin/index');
			}else if($_SESSION['login_session']['role_id'] == '2'){
				$url = base_url('admin/index');
			} else if($_SESSION['login_session']['role_id'] == '3'){
				$url = base_url('admin/index');
			}  else if($_SESSION['login_session']['role_id'] == '4'){
				$url = base_url( $_SESSION["login_session"]["url_slug"].'/school_dashboard');
			} else if($_SESSION['login_session']['role_id'] == '5'){
				$url = base_url( 'mentor_dashboard');
			}  else if($_SESSION['login_session']['role_id'] == '9'){
				$url = base_url( $_SESSION["login_session"]["url_slug"].'/school_dashboard');
			}  else if($_SESSION['login_session']['role_id'] == '10'){
				$url = base_url( $_SESSION["login_session"]["url_slug"].'/teacher_dashboard');
			} 
					
					
			redirect($url);
		}

	}
	
	
	public function index(){
		$name = $this->uri->segment(2);
		
		$sql = 'SELECT lesson_id, final_artwork FROM lessons  WHERE   status="1" and  is_del= 0   and is_featured = 1 ORDER BY RAND() limit 1 ';
		$q = $this->db->query($sql);
		$res= $q->row_array();
		
		$data['featured_image'] = $res;
			
		if($name!="" && $this->uri->segment(1) !='mentor_login'){
            $res = $this->login_model->getSchoolInfoByName($this->uri->segment(1));
			 if($res['num']==1){
				$data['errmsg'] = '';		
				$data['record'] = $res['data'];		
				$data['main_content'] = 'school_login';
				$this->load->view('admin/schools/login',$data);				
			}else{
				$this->session->set_flashdata('msg', "<div class='alert alert-danger text-center'>No School Found!</div>");
				$data['errmsg'] = "<div class='alert alert-danger text-center'>No School Found!</div>";		
				$data['record'] = array();
				$data['main_content'] = 'login';
				$this->load->view('admin/schools/login',$data);
			}
		}else if($this->uri->segment(1) == 'mentor_login'){
			$data['main_content'] = 'school_login';
			$data['errmsg'] = '';		
			$this->load->view('mentor_views/login',$data);
		}else{
			$data['main_content'] = 'login';
			$data['errmsg'] = '';		
			$this->load->view('login_template/body',$data);
		}
		 
	}
    public function check_login()
    {
		$status=0;
		$msg='';
		$url='';
		
        $username = trim($this->input->post('email'));
        $password = trim($this->input->post('password'));
        $school_id = trim($this->input->post('school_id'));
        $url_slug1 = trim($this->input->post('url_slug'));
       
		
		$url_slug = ($url_slug1 !='') ? $url_slug1 : '';
		$school_id = ($school_id !='') ? $school_id : '';
		
		if(isset($email) && $email==""){/*do email validation here and in signup*/
			$msg='<div class="alert alert-warning">
				  <strong>Please enter email</strong></div>';
		}else if(isset($password) && $password==""){
			$msg='<div class="alert alert-warning">
				  <strong>Please enter password</strong></div>';
		}else{	
			$usr_result = $this->login_model->verify($username,  $school_id);
			 
			if($usr_result != null){
				$stored_password = $usr_result[0]['password'];
				if ($this->bcrypt->check_password($password, $stored_password)) {
					$user = $usr_result[0];
					if($user['status']==1){		
					
						$sessiondata = array(
							'first_name'=> $user['first_name'],
							'user_id' 	=> $user['id'],
							'role_id' 	=> $user['role_id'],
							'modules' 	=> $user['modules'],
							'profile_pic' 	=> $user['image_path'],
							'url_slug' 	=> $url_slug,
							
						);
						
						if(isset($url_slug) && $url_slug != '' ){
							
							$sessiondata['school_id']  	= $school_id;
						}
						
						$save_tracking = array(
							'user_id' 			=> $user['id'],
							'tracking_date' 	=> date('Y-m-d'),
							'tracking_fromtime'	=> date('Y-m-d H:i:s'),
							'tracking_totime' 	=> date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +30 minutes")),
							
						);
						
						$tr = $this->login_model->insert($save_tracking);
						$track_id = $this->db->insert_id();
						
						$sessiondata['track_id']  	= $track_id;
						
						$this->session->sess_expiration = '1800'; /* //30 Minutes */
						$this->session->sess_expire_on_close = 'true';
	
						$this->session->set_userdata('login_session', $sessiondata);
						$status=1;
						
						if($user['is_password_changed'] =0 || empty($user['is_password_changed'])){
							if($user['role_id'] == '5'){
								$url = base_url( 'mentor/changepwd');
							}else{
								$url = base_url( $url_slug.'/changepwd');
							}
							
						}else{
							$url = base_url( $url_slug.'/'.$user['dashboard_controller']);	
						}
					
						
						
						$msg='<div class="alert alert-success text-center">
						  <strong>Successfully logged in</strong></div>';
					}else{
						  $msg='<div class="alert alert-danger alert-dismissible">
						  <strong>Your account been deactivated,please contact admin  </strong></div>';											
					}
				}else{
					$msg=' <div class="alert alert-danger alert-dismissible" role="alert">
							<strong> Invalid Credentials</strong></div>';
				}
			}else {
				$msg=' <div class="alert alert-danger alert-dismissible" role="alert">
							<strong> Invalid Credentials</strong></div>';
			}
		}

		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
    }
    public function logout()
    {
       
        unset($_SESSION);
        $this->session->sess_destroy();

        $this->session->set_flashdata('msg', '<div class="alert alert-info text-center alert-dismiss ">Successfullys logged out.</div>');
        redirect('login', 'refresh');
    }
    
  
   
}