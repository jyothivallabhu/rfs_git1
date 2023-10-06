
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sections extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->user_id = $_SESSION['login_session']['user_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}
	}

	public function index()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		$data['classes'] = $this->admin->get_ActiveClassesBySchoolID($id);
		
		

		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$data['main_content'] = 'admin/sections';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/sections';
			$this->load->view('dash_template/body', $data);
		}
		
	}
	
	
	public function save_sections()
	{
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  '' :  $_POST['school_id'];
		
		$_POST['status'] =  '1';
		
		if($this->input->post('class_id')=='' ){
			$msg = warning_msg('Please Select Class');	
			$this->session->set_flashdata('msg',$msg);
			redirect($this->url_slug.'/sections/'.$rid, "refresh");
		}elseif($this->input->post('section_name')=='' ){
			$msg = warning_msg('Please Enter Section');	
			$this->session->set_flashdata('msg',$msg);
			redirect($this->url_slug.'/sections/'.$rid, "refresh");
						
		} else{
			$if_exists = $this->admin->check_if_section_exists($_POST);
			if ($if_exists != 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-warning text-center alert-dismiss "> Section already exists</div>');
				redirect($this->url_slug.'/sections/'.$rid);
			}else{
				$_POST['added_by'] = $this->user_id ;
				$result = $this->db->insert('sections', $_POST);
				if($result){
					$this->session->set_flashdata('msg','<div class="alert alert-success">
						  
						  <strong>Added Successfully</strong></div>');
					redirect($this->url_slug.'/sections/'.$rid, "refresh");
				}else{
					$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible" role="alert">
						
						Something went wrong, please Try Again Later</div>');
						redirect($this->url_slug.'/sections/'.$rid, "refresh");
				}
				
			}
		}
		
	}
	
	
	
	public function update_sections($id)
	{
		$rid = (!empty($_SESSION['login_session']['school_id'])) ?  '' :  $_POST['school_id'];

		
		/* $if_exists = $this->admin->check_if_section_exists($_POST);
		if ($if_exists != 0) {
			
			$this->session->set_flashdata('msg', '<div class="alert alert-warning text-center alert-dismiss "> Section already exists</div>');
			redirect($this->url_slug.'/sections/'.$rid);
		}else{ */
			$this->db->set($_POST);
			$this->db->where(array('section_id' => $id));
			$result = $this->db->update('sections');
			if($result){
				$this->session->set_flashdata('msg','<div class="alert alert-success">
					  
					  <strong>Updated Successfully</strong></div>');
				redirect($this->url_slug.'/sections/'.$rid, "refresh");
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible" role="alert">
					
					Something went wrong, please Try Again Later</div>');
					redirect($this->url_slug.'/sections/'.$rid, "refresh");
			}
		//}
		
	}
	
	public function delete_section($sid,$id)
	{
		$array = array('status' => '0', 'is_del' => '1');
		$this->db->set($array);
		$this->db->where(array('section_id' => $id));
		$result = $this->db->update('sections');
		
		$rid = (!empty($_SESSION['login_session']['school_id'])) ?  '' :  $sid;
		
		if($result){
				$this->session->set_flashdata('msg','<div class="alert alert-warning">
					  
					  <strong>Deleted Successfully</strong></div>');
				redirect($this->url_slug.'/sections/'.$rid, "refresh");
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible" role="alert">
					
					Something went wrong, please Try Again Later</div>');
				redirect($this->url_slug.'/sections/'.$rid, "refresh");
			}
			
			
	}
	

	
	
}