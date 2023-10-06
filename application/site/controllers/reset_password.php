
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class change_password extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
	}

	public function index($id)
	{
		if($this->input->post('submit')){	
			
			$user_det = $this->admin->get_user($id)[0];
			
			 if($_POST['new_password']===$user_det->password){
				 $msg='<div class="alert alert-warning">
				
				  <strong>Current Password and New password is same,try with different one</strong>
				</div>' ;
			 }else{
			 
				$update_data = array(
					'password'=>$_POST['new_password']
				);
				
				$this->db->set($update_data);
				$this->db->where(array('id' => $user_id));
				$result = $this->db->update('users');
			
				if($res){
					
					$status=1;
					$msg='<div class="alert alert-success">
					
					  <strong>Password Updated Successfully</strong></div>';
					
				}else{
					$msg='<div class="alert alert-warning">
					
					  <strong>Please Try Again Later</strong></div>';
				}
			 }
		 
			$this->session->set_flashdata('cmsg',$msg);
			redirect('admin/reset_password/'.$id);
				
		}
		
		$data['main_content'] = 'admin/reset_password';
		$this->load->view('dash_template/body',$data);
		
	}
	




	
	
}