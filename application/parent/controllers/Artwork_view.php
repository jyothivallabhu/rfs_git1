
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artwork_view extends CI_Controller {

	function __Construct(){
		parent:: __Construct();
		
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Children_model');
		$this->load->model('Artwork_model');
		
		$this->uid = '';
		$this->name = '';
		$this->school_id = '';
		
	}
	
	public function index(){
		$data['artworks'] =  $this->Artwork_model->getAllArtWorks($this->uid);
		$data['main_content'] = 'artwork_list';
		$this->load->view('dash_template/body',$data);
	}
	
	
	function view(){
		$artwork_id = addslashes($this->uri->segment('3'));
		if($artwork_id!="" ){
			$res = $this->Artwork_model->artworkInfo($artwork_id);
			if($res['num']==1){
				$comm = $this->Artwork_model->getcomments($artwork_id);
				 
				$data['comments'] = $comm['data'];	
				$data['artwork'] = $res['data'];
				$data['main_content'] = 'artwork_public_view';	
				$this->load->view('dash_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect('Artwork');
			}	
		}else{
			redirect('Artwork');
		}	
	}
	
	
	
	
}