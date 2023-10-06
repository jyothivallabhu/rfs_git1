
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_wise_portfolio extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->comm_fun->is_not_logged_in();
	    $this->uid = $this->session->userdata('rfsparent_user_id');
		$this->name = $this->session->userdata('rfsparent_user_first_name');
		$this->load->model('Children_model');
		$this->load->model('Artwork_model');
		$this->load->library('datatblsel');
	}
	

	
	public function Classwiseportfolio(){
		$data['artworks'] =  $this->Children_model->getAllChildrenByParent($this->uid);
		$data['main_content'] = 'classes_list';
		$this->load->view('dash_template/body',$data);
	}
	
	public function classportfolio(){
		$c_id = $this->uri->segment(2);
		$data['artworks'] =  $this->Artwork_model->getclassArtWorks($c_id);
		
		$data['main_content'] = 'artwork_list';
		$this->load->view('dash_template/body',$data);
		
	}
	


}