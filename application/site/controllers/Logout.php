<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __Construct(){
		parent:: __construct();
		$this->name = $_SESSION["login_session"]["url_slug"];
		$this->track_id = $_SESSION["login_session"]["track_id"];
		$this->role_id = $_SESSION["login_session"]["role_id"];
		date_default_timezone_set('Asia/Kolkata');		
	}
	
	public function index()
	{	
	
	if(!empty($this->name)){
		$url_slug = $this->name.'/login';
	}else	if($this->role_id == 5){
		$url_slug = 'mentor_login';
	}else{
		$url_slug = 'login';	
	}
		$update = array('tracking_totime' => date('Y-m-d H:i:s'));
		$this->db->set($update);
		$this->db->where(array('track_id' => $this->track_id));
		$result = $this->db->update('user_tracking');
	
		unset($_SESSION);
        $this->session->sess_destroy();

		$this->session->set_flashdata('msg', '<div class="alert alert-info text-center alert-dismiss ">Successfully logged out.</div>');
        redirect($url_slug, 'refresh');	
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */