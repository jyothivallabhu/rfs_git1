<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

   	function __construct()
	{
	 parent::__construct();
       /*  $this->headerdata = $this->comm_fun->header_data(); */

	}
	public function about_us()
	{
		
	
		$data['main_content'] = 'pages/about_us';
		$this->load->view('dash_template/body', $data);
		/* $this->load->view('pages/about_us'); */
	}

	 public function privacy_policy()
	{
	
		$this->load->view('pages/privacy_policy');
	}
	
	 public function termsandconditions()
	{
	
		$this->load->view('pages/terms');
	}
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */