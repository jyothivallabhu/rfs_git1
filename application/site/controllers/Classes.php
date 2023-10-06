
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Classes extends CI_Controller
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
		
		$data['classes'] = $this->admin->get_classesBySchoolID($id);
		$data['grades'] = $this->admin->get_GradesschoolsByID($id);
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$data['main_content'] = 'admin/classes';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/classes';
			$this->load->view('dash_template/body', $data);
		}
		
	}
	
	
	

	public function save_class()
	{
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/classes' :  'classes/'.$_POST["school_id"];
		

		$status = 0;
		$msg= '';
		$url = '';
		
		if($this->input->post('class_name')=='' ){
			$msg = warning_msg('Please Select Class');	
		}elseif($this->input->post('grades')=='' ){
			$msg = warning_msg('Please Select Grade');	
			redirect($this->url_slug.'/classes/'.$rid);
		}else{
			$if_exists = $this->admin->check_if_class_exists($_POST);
			$if_sortorderexists = $this->admin->check_if_classorder_exists($_POST);
			
			
			if ($if_sortorderexists > 0 && $if_exists != 0) {
				$status = 0;
				$msg= '<div class="alert alert-warning text-center alert-dismiss "> Class Name and Class Order already exists</div>';
			}else if ($if_sortorderexists > 0) {
				$status = 0;
				$msg= '<div class="alert alert-warning text-center alert-dismiss "> Class Order already exists</div>';
			}else if ($if_exists != 0) {
				$status = 0;
				$msg= '<div class="alert alert-warning text-center alert-dismiss "> Class already exists</div>';
			}else{
				$_POST['added_by'] = $this->user_id;
				
				$grades = $_POST['grades'];
				unset($_POST['grades']);
				$_POST['grades'] = implode(",", $grades);
						
				$result = $this->db->insert('classes', $_POST);
				if($result){
					$status = 1;
					$msg= '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
					$url= base_url().$rid;
					//redirect($this->url_slug.'/classes/'.$rid, "refresh");
				}else{
					$msg=  '<div class="alert alert-warning alert-dismissible" role="alert">
						
						Something went wrong, please Try Again Later</div>';
						//redirect($this->url_slug.'/classes/'.$rid, "refresh");
				}
			}
		}
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}
	
	/* public function update_class($id)
	{
		
		$status = 0;
		$msg= '';
		$url = '';
		
		//print_r($_POST);exit;
		$rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  'index/'.$_POST['school_id'];

		if($this->input->post('modules')=='' ){
			$msg = warning_msg('Please Select Module');	
		}else{
			$_POST['id'] = $id;
			$if_exists = $this->admin->check_if_editclass_exists($_POST);
			if ($if_exists != 0) {
				
				$msg=  '<div class="alert alert-warning text-center alert-dismiss "> Class already exists</div>';
				//redirect($this->url_slug.'/classes/'.$rid);
			}else{
				$this->db->set($_POST);
				$this->db->where(array('c_id' => $id));
				$result = $this->db->update('classes');
				if($result){
					$status= 1;
					$msg = '<div class="alert alert-success">  <strong>Updated Successfully</strong></div>';
					$url = base_url().$this->url_slug.'/classes/'.$rid;
					//redirect($this->url_slug.'/classes/'.$rid, "refresh");
				}else{
					$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
						
						Something went wrong, please Try Again Later</div>';
						//redirect($this->url_slug.'/classes/'.$rid, "refresh");
				}
			}
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}	 */
	
	public function update_class($id)
	{
		
		$status = 0;
		$msg= '';
		$url = '';
		
		//print_r($_POST);exit;
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/classes' :  'classes/'.$_POST["school_id"];

		if($this->input->post('class_name')=='' ){
			$msg = warning_msg('Please Select Class');	
			redirect($rid, "refresh");
		}elseif($this->input->post('grades')=='' ){
			$msg = warning_msg('Please Select Grade');	
			redirect($rid, "refresh");
		}else{
			
			/* $if_exists = $this->admin->check_if_class_exists($_POST);
			if ($if_exists != 0) {
				
				$this->session->set_flashdata('msg', '<div class="alert alert-warning text-center alert-dismiss "> Class already exists</div>');
				redirect($this->url_slug.'/classes/'.$rid);
			}else{ */
			
				$grades = $_POST['grades'];
				unset($_POST['grades']);
				$_POST['grades'] = implode(",", $grades);
				
			//	print_r($_POST);exit;
				$this->db->set($_POST);
				$this->db->where(array('c_id' => $id));
				$result = $this->db->update('classes');
				if($result){
				    $status=1;
					$msg= '<div class="alert alert-success"> <strong>Updated Successfully</strong></div>';
					$url= base_url().$rid;
				//	redirect($rid, "refresh");
				}else{
					$msg= '<div class="alert alert-success"> <strong>Something went wrong</strong></div>';
				
					//	redirect($rid, "refresh");
				}
			/* } */
		}
		
			$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}	
	
	
	public function delete_class($sid,$id)
	{
		/* $redirectid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $sid; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/classes' :  'classes/'.$sid;
		
		$array = array('status' => '0', 'is_del' => 1);
		$this->db->set($array);
		$this->db->where(array('c_id' => $id));
		$result = $this->db->update('classes');
		/* redirect('classes/index/'.$sid, "refresh"); */
		
		if($result){
			$this->session->set_flashdata('msg','<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>');
			redirect($this->url_slug.'/classes/'.$redirectid, "refresh");
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert">
				
				Something went wrong, please Try Again Later</div>');
		}
	}
	
	public function del()
	{		
	
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST["sid"]; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/classes' :  'classes/'.$_POST["sid"];

		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		$res = $this->admin->classInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('c_id' => $id));
			$result = $this->db->update('classes');
		
			if($result){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url().$rid;
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	

	
	
}