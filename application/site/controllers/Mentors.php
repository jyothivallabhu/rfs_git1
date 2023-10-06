
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mentors extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Users_model", 'user');
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->load->library('bcrypt');
		$this->user_id = $_SESSION['login_session']['user_id'];
	}

	public function index()
	{
		 $ary =array();	
	   	   
		/*total rows count*/
		$res = $this->admin->get_mentors($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'mentors/ajaxPaginationMentorData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_mentors($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['mentors'] = $posts;	

		$data['main_content'] = 'admin/mentors/index';
		$this->load->view('dash_template/body', $data);
		
	}
	
	
	

	public function add_mentor()
	{

		$data['main_content'] = 'admin/mentors/add_mentors';
		$this->load->view('dash_template/body', $data);
	}
	public function save_mentor()
	{
		$status = 0;
		$msg= '';
		$url = '';
		$_POST['role_id'] = 5;
		
		$password='welcome1';
		$hash = $this->bcrypt->hash_password($password);
		
		if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter First Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}/* else if($this->input->post('password')=='' ){
			$msg = warning_msg('Please Enter Password');	
		} */else{
			
			$save_data = array(
					'first_name'=>trim(ucwords($_POST['first_name'])),
					'last_name'=>trim(ucwords($_POST['last_name'])),
					'email'=>trim($_POST['email']),
					'phone'=>trim($_POST['phone']),
					'role_id'=>5,
					'added_by'=>$this->user_id,
					'password'=>$hash
				);
				
			if(isset($_FILES['profile_pic']) && !empty($_FILES) && $_FILES['profile_pic']['name']!=""){		
				$trgt1='uploads/profile_pic/';
				$size1 = $_FILES['profile_pic']['size'];
				$file_name1 = $_FILES['profile_pic']['name'];
				$path_parts1=pathinfo($_FILES['profile_pic']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$save_data['profile_pic']=$trgt1.$file1;
				move_uploaded_file($_FILES['profile_pic']['tmp_name'],$trgt1.$file1); 
			 }
		
			$if_exists = $this->admin->check_if_email_exists($_POST['email']);
			if ($if_exists == 0) {
				$q = $this->db->insert('users', $save_data);
				if($q){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url().'mentors';
				}else{
					$status = 0;
					$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
					Something went wrong, please Try Again Later</div>';
				}
				
			}else{
				$status = 0;
				$msg = '<div class="alert alert-warning text-center alert-dismiss "> Email already exists. Please try with new Email</div>';
				$url = base_url().'mentors/add_mentor';
				//redirect('mentors/add_mentor');
			}
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}
	public function edit_mentor($id)
	{
		
		$data['mentor'] = $this->admin->get_user($id)[0];

		$data['main_content'] = 'admin/mentors/edit_mentor';
		$this->load->view('dash_template/body', $data);
	}
	public function update_mentor($id)
	{
		//print_r($_POST);
		$status = 0;
		$msg= '';
		$url = '';
		if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter First Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else{
			
			if(isset($_FILES['profile_pic']) && !empty($_FILES) && $_FILES['profile_pic']['name']!=""){		
				$trgt1='uploads/profile_pic/';
				$size1 = $_FILES['profile_pic']['size'];
				$file_name1 = $_FILES['profile_pic']['name'];
				$path_parts1=pathinfo($_FILES['profile_pic']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$_POST['profile_pic']=$trgt1.$file1;
				move_uploaded_file($_FILES['profile_pic']['tmp_name'],$trgt1.$file1); 
			 }
			 
			 
			$this->db->set($_POST);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('users');
			
			if($result){
				
				$status= 1;
				$msg = '<div class="alert alert-success">
					  <strong>Updated Successfully</strong></div>';
					  
				$url = base_url().'mentors';
			}else{
				$status = 0;
				$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible" role="alert">  
					  Something went wrong, please Try Again Later</div>');
			}
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
		
	}	
	
	public function delete_mentor($id)
	{
		$array = array('status' => '0','is_del' => '1');
		$this->db->set($array);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('users');
		
		if($result){
			$this->session->set_flashdata('msg','<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>');
			redirect('mentors', "refresh");
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible" role="alert">
				  Something went wrong, please Try Again Later</div>');
			}
	}
	
	public function del()
	{		
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$res = $this->user->userInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$q = $this->user->update(array('is_del'=>1),$id);
			if($q){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url('mentors');
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	
	function ajaxPaginationMentorData(){
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        //total rows count
		$data = $this->admin->get_mentors($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'mentors/ajaxPaginationMentorData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->get_mentors($conditions);
		$data['query'] = $this->db->last_query(); 
		
		//echo $this->db->last_query();
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($users_list)){
			foreach($users_list as $key => $value){
				# code...
				$status_badge = 'bg-success';
				$status = 'Active';
				if ($value->status == '0'){
					$status_badge = 'bg-warning';
					$status = 'Inactive';
				}
				$mentors = $this->admin->get_mentors_assigned_schoolnames($value->id);
		        $html .='<tr>
							<td><img src="'. $value->image_path .' " height="60" width="60" /> </td>
							<td>'.$value->first_name.' '.$value->last_name.'</td>
							<td>'.$value->email .'</td>
							
							<td>'.$value->phone.'</td>
							<td>';
							if(isset($mentors[0]->school_name) && $mentors[0]->school_name != ''){ 
									$html .= $mentors[0]->school_name;						
								}else{
									$html .=  'No Schools Assigned';
								}
							
							
							$html .='</td>
							<td>
								<span class="badge '.$status_badge .' ">'. ucfirst($status) .'</span>
							</td>
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									   <a href="'. base_url('mentors/edit_mentor/') . $value->id .'" class="dropdown-item">Edit</a>
									    <a href="'. base_url('mentors/reset_password/') . $value->id .'" class="dropdown-item">Reset Password</a>
										<a href="javascript:void(0);"  data-did="'. $value->id .'" data-tbl="users" data-ctrl="mentors"  class="dropdown-item text-danger delete_class">Delete</a>
									</div>
								</div>
							</td>

						</tr>';
		
			}
		}else{
			$html .="No Data Found";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }
	

	public function reset_password($id){
		if($this->input->post('submit')){	
			
			$user_det = $this->admin->get_user($id)[0];
			
			 if($_POST['new_password']===$user_det->password){
				 $msg='<div class="alert alert-warning">
				  
				  <strong>Current Password and New password is same,try with different one</strong>
				</div>' ;
			 }else{
			 
				$update_data = array(
					'password'=>md5($_POST['new_password'])
				);
				
				$this->db->set($update_data);
				$this->db->where(array('id' => $user_id));
				$result = $this->db->update('users');
			
				if($result){
					
					$status=1;
					$msg='<div class="alert alert-success">
					  
					  <strong>Password Updated Successfully</strong></div>';
					  $this->session->set_flashdata('msg',$msg);
					  redirect('mentors');
					
				}else{
					$msg='<div class="alert alert-warning">
					  
					  <strong>Please Try Again Later</strong></div>';
					  $this->session->set_flashdata('msg',$msg);
					  redirect('mentors/reset_password/'.$id);
				}
			 }
		 
			
				
		}
		$data['id'] = $id;
		$data['main_content'] = 'admin/mentors/reset_password';
		$this->load->view('dash_template/body',$data);
		
	}
	
	public function update_password($id){	
		$status = 0;
		$msg= '';
		$url = '';
		
			$password=$this->input->post('new_password');
			$hash = $this->bcrypt->hash_password($password);
		
			$user_det = $this->admin->get_user($id)[0];
			
			 $stored_password =$user_det->password;
			if ($this->bcrypt->check_password($password, $stored_password)) {
				$status = 0;
				 $msg='<div class="alert alert-warning">  
				  <strong>Current Password and New password is same,try with different one</strong>
				</div>' ;
			 }else{
			 
				$update_data = array(
					'password'=>$hash
				);
				
				$this->db->set($update_data);
				$this->db->where(array('id' => $id));
				$result = $this->db->update('users');
			
				if($result){
					
					$status=1;
					$msg='<div class="alert alert-success">
					  
					  <strong>Password Updated Successfully</strong></div>';
					$url = base_url().'mentors';
				}else{
					$status = 0;
					$msg='<div class="alert alert-warning">
					  
					  <strong>Please Try Again Later</strong></div>';
				}
			 }
		 
			
			
			$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
			$res['cst']['cstn'] = $this->security->get_csrf_token_name();
			$res['cst']['cstv'] = $this->security->get_csrf_hash();
			echo json_encode($res); exit;
				
		}
	
	
	
}