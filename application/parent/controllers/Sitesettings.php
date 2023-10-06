
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitesettings extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		$this->comm_fun->is_not_logged_in();
	    $this->uid = $this->session->userdata('rfsparent_user_id');
		$this->name = $this->session->userdata('rfsparent_user_first_name');
		$this->school_id = $this->session->userdata('rfsparent_user_school_id');
		$this->load->model('Children_model');
		$this->load->model('Artwork_model');
		date_default_timezone_set("Asia/Kolkata");
	}
	
	
	
	public function index(){
		
		$data['main_content'] = 'sitesettings';
		$this->load->view('dash_template/body', $data);
	}
	
	
	
	public function save()
	{
		
		$status = 0;
		$msg= '';
		$url = '';
		
		
		if($this->input->post('color_code')=='' ){
			$msg = warning_msg('Please Select Color');	
		}else{
			
			$save_data = array(
					'color_code'=>trim(($_POST['color_code'])),
				);
			
			$this->db->set($save_data);
			$this->db->where(array('id' => $this->uid));
			$q = $this->db->update('users');
			
			
				if($q){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url('sitesettings');
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