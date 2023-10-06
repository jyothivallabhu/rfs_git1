
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitesettings extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
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
		}
	}
	
	
	
	public function index(){
		
		
		$data['main_content'] = 'sitesettings';
		
		if((isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !='') || $_SESSION["login_session"]["role_id"] == 5){	
			$this->load->view('school_template/body', $data);
		} else{
			$this->load->view('dash_template/body', $data);
		}
		
	}
	
	
	
	public function save()
	{
		
		$status = 0;
		$msg= '';
		$url = '';
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/sitesettings' :  'sitesettings/';
		
		if($this->input->post('color_code')=='' ){
			$msg = warning_msg('Please Select Color');	
		}else{
			//print_r($_POST);exit;
			
			if(isset($_POST['default_color']) && $_POST['default_color']!=''){
				$color_code = '';
			}else{
				$color_code = $_POST['color_code'];
			}
			$save_data = array(
					'color_code'=>trim($color_code),
				);
				
			
			$this->db->set($save_data);
			$this->db->where(array('id' => $this->user_id));
			$q = $this->db->update('users');
			
			
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
	
	
	

}