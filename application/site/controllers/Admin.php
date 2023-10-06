
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
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
		$this->user_id = $_SESSION['login_session']['user_id'];
	}

	public function index()
	{
		$data['schools'] = $this->admin->get_all_schools();
		
	//get portfolioUser count from users table by sending roleid
		$ucount = $this->admin->get_usersByRole(2)[0];
		$data['portfolioUsers'] = $ucount->userscount; 
		//get Library count
		$libraryuser = $this->admin->get_usersByRole(3)[0];
		$data['libraryusers'] = $libraryuser->userscount; 
		//get schools count		
		$schoolcount = $this->admin->getSchoolsCount()[0];
		$data['schoolscount'] = $schoolcount->schools_count; 
		
		//get parents count
		$parentcount = $this->admin->get_usersByRole(8)[0];
		$data['parentscount'] = $parentcount->userscount; 
		// get all mentors
		$mcount = $this->admin->get_usersByRole(5)[0];
		$data['mentorscount'] = $mcount->userscount; 
		
		$data['main_content'] = 'admin/index';
		$this->load->view('dash_template/body', $data);

	}
	


	function academic_details(){
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['main_content'] = 'admin/academic_details';
		$this->load->view('dash_template/body', $data);
	}
	
	/* function update_academic_details(){
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		 
		$academic_id = addslashes($this->input->post('academic_year'));
		$res = $this->admin->studentInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			//$q = $this->teachers_model->update(array('is_del'=>1),$id);
			
			$ac = $this->admin->getcurrent_accademic();
			print_r($ac);exit;
			if($ac['num']==1){
				$array = array('name'=>'current_year');
				$this->db->set($array);
				$this->db->where(array('id' => $academic_id));
				$q = $this->db->update('academic_year');
				if($q){
					$msg = '<div class="alert alert-warning">
					  
					  <strong>Deleted Successfully</strong></div>';
					$this->session->set_flashdata('success',$msg);
					$ary['msg']=$msg;			
					$ary['success']=true;			
					$ary['url']=base_url().$rid;
				}
			}
			
			else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
	}
 */


	function update_academic_details(){
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		 
		$id = addslashes($this->input->post('academic_year'));
		$res = $this->admin->acedamicInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			
			$ac = $this->admin->get_academic_year()[0];
			
			if(!empty($ac)){
				
				$array = array('name'=>'previous_year');
				$this->db->set($array);
				$this->db->where(array('id' => $ac->id));
				$q = $this->db->update('academic_year');
				if($q){
					
					$array = array('name'=>'currrent_year');
					$this->db->set($array);
					$this->db->where(array('id' => $id));
					$q = $this->db->update('academic_year');
					
					$msg = '<div class="alert alert-warning"> <strong>Update Successfully</strong></div>';
					
					$this->session->set_flashdata('success',$msg);
					$ary['msg']=$msg;			
					$ary['success']=true;			
					$ary['url']=base_url().$rid;
				}
			}
			
			else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
	}



}
