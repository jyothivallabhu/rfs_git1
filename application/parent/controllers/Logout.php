<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __Construct(){
		parent:: __construct();
		$this->comm_fun->is_not_logged_in();
		$this->track_id = $this->session->userdata('track_id');
		date_default_timezone_set('Asia/Kolkata');
		
	}
	
	public function index()
	{		
		
		$update = array('tracking_totime' => date('Y-m-d H:i:s'));
		$this->db->set($update);
		$this->db->where(array('track_id' => $this->track_id));
		$result = $this->db->update('user_tracking');
		
		
		$sess_data = array(
			'rfsparent_user_first_name'=>'',
			'rfsparent_user_email'=>'',
			'rfsparent_user_id'=>'',		
			'rfsparent_user_logged_in'=>false
		);
		$this->session->set_userdata($sess_data);
		if(isset($_GET['m']) && $_GET['m']=='pass'){
			$this->session->set_flashdata('msg',success_msg('Password updated Successfully ,login with new password'));
		}
		redirect('Login');	
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */