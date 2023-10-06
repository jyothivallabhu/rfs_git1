
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class School_management extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("School_management_model", 'user');
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->load->library('bcrypt');
		
		$this->user_id = $_SESSION['login_session']['user_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}
		
	}

	/* get list of school_management to display in admin  */
	public function index()
	{
		$ary =array();		   
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		$ary['school_id'] = $id;
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		/*total rows count*/
		$res = $this->user->get_all_school_management($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#school_managementList';
		$config['base_url']    = base_url().'school_management/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->user->get_all_school_management($ary);
		
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['school_management'] = $posts;	
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$data['main_content'] = 'admin/school_management/index';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/school_management/index';
			$this->load->view('dash_template/body', $data);
		}
		
		
	}
	
	
	function ajaxPaginationData(){
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		//$schools = $this->Admin_model->get_schoolsByID($this->input->post('school_id'))[0];
		
        $conditions['school_id'] = $this->input->post('school_id');
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        //total rows count
		$data = $this->user->get_all_school_management($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'school_management/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$school_management_list = $this->user->get_all_school_management($conditions);
		$data['query'] = $this->db->last_query(); 
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($school_management_list)){
			foreach($school_management_list as $key => $value){
				# code...
				$status_badge = 'bg-success';
				$status = 'Active';
				if ($value->status == '0'){
					$status_badge = 'bg-warning';
					$status = 'Inactive';
				}
				$modules  = $this->user->get_modules($value->modules)[0];
				
				
				$m =$modules->module;
				//$m = print_r(implode(', ', $m)) ;
				
		        $html .='<tr>
							<td><img src="'. $value->image_path .' " height="60" width="60" /> </td>
							<td>'.$value->first_name.' '.$value->last_name.'</td>
							<td>'.$value->email .'</td>
							
							<td>'.$value->phone.'</td>
							<td>'.$value->designation.'</td>
							<td>'.  $m  .'</td>
							<td>
								<span class="badge '.$status_badge .' ">'. $status .'</span>
							</td>';
							/* if($_SESSION['login_session']['role_id'] != 5){ */
								
							 $html .='<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									   <a href="'. base_url('school_management/edit_user/').$value->school_id.'/'. $value->id .'" class="dropdown-item">Edit</a>
									   <a href="'. base_url('school_management/reset_password/') . $value->id .'" class="dropdown-item">Reset Password</a>
									   
									   
									   <a href="javascript:void(0);"  data-did="'. $value->id .'" data-sid = "'.$value->school_id .'" data-tbl="users" data-ctrl="school_management"  class="dropdown-item text-danger delete_class">Delete</a>	
									   
									</div>
								</div>
							</td>';
							/* } */

						 $html .='</tr>';
		
			}
		}else{
			$html .="No Data Found";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	
	
		public function add_user()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['modules'] = $this->user->get_all_modules();

		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		$data['main_content'] = 'admin/school_management/add_users';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}

	public function save_user()
	{
		$status = 0;
		$msg= '';
		$url = '';
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/school_management/' :  'school_management/'.$_POST["school_id"];
		/* $url=base_url().$rid; */
		
		
		$modules = implode(",", $this->input->post('modules'));
		
		$password='welcome1';
		$hash = $this->bcrypt->hash_password($password);
		
		 if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter First Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('modules')=='' ){
			$msg = warning_msg('Please Select Module');	
		}/* else if($this->input->post('password')=='' ){
			$msg = warning_msg('Please Enter Password');	
		} *//* else if($this->input->post('designation')=='' ){
			$msg = warning_msg('Please Enter Designation');	
		} */else{
			
			$save_data = array(
				'first_name'=>trim($_POST['first_name']),
				'last_name'=>trim($_POST['last_name']),
				'email'=>trim($_POST['email']),
				'phone'=>trim($_POST['phone']),
				'designation'=>trim($_POST['designation']),
				'school_id'=>trim($_POST['school_id']),
				'modules'=>trim($modules),
				'role_id'=>9,
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
					/* $url=base_url().$this->url_slug.'/school_management/'.$rid; */
					$url= base_url().$rid;
				}else{
					$status = 0;
					$msg ='<div class="alert alert-success alert-dismissible" role="alert">
						  Something went wrong, please Try Again Later</div>';
				}
			}else{
				$status = 0;
				$msg ='<div class="alert alert-warning text-center alert-dismiss ">Email already exists. Please try with new Email</div>';
				
			}	
		}
		
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
		
	}
	public function edit_user($sid,$id)
	{
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['modules'] = $this->user->get_all_modules();
		$data['user'] = $this->user->get_user($id)[0];
		
		$data['schools'] = $this->admin->get_schoolsByID($rid)[0];
		
		$data['main_content'] = 'school_management/edit_user';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	public function update_user($id)
	{			 
		$status = 0;
		$msg= '';
		$url = '';
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST["school_id"]; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/school_management/' :  'school_management/'.$_POST["school_id"];
		
		$modules = implode(",", $this->input->post('modules'));
		
		
		
		if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter First Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('modules')=='' ){
			$msg = warning_msg('Please Select Module');	
		}/* else if($this->input->post('designation')=='' ){
			$msg = warning_msg('Please Enter Designation');	
		} */else{
			
			$save_data = array(
				'first_name'=>trim($_POST['first_name']),
				'last_name'=>trim($_POST['last_name']),
				'email'=>trim($_POST['email']),
				'phone'=>trim($_POST['phone']),
				'status'=>trim($_POST['status']),
				'designation'=>trim($_POST['designation']),
				'modules'=>trim($modules),
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
			$this->db->set($save_data);
			$this->db->where(array('id' => $id));
			$q = $this->db->update('users');
			if($q){
				
				$status= 1;
				$msg = '<div class="alert alert-success">
					  <strong>Updated Successfully</strong></div>';
					  
				$url=base_url().$rid;
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
		
		
		//redirect('school_management', "refresh");
	}
	public function delete_user($id)
	{
		$array = array('status' => '0','is_del' => '1');
		$this->db->set($array);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('users');
		
		if($result){
			$this->session->set_flashdata('msg','<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>');
			redirect('school_management', "refresh");
			}
		
		
	}
	
	public function del()
	{		
	
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' : $_POST["sid"]; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/school_management/' :  'school_management/'.$_POST["school_id"];
	

		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		$res = $this->admin->userInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('users');
		
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
	
	public function reset_password($id){
		
		$data['id'] = $id;
		
		$user_det = $this->admin->get_user($id)[0];
		$data['schools'] = $this->admin->get_schoolsByID($user_det->school_id)[0];
		
		$data['main_content'] = 'school_management/reset_password';
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
		
	}
	
	
	public function update_password($id){	
		$status = 0;
		$msg= '';
		$url = '';
		
		$user_data = $this->user->get_user($id)[0];
		
		$sid = $user_data->school_id;
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ? $this->url_slug.'/school_management' : 'school_management/'.$sid;
		
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
					$url = base_url().$rid;
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
	
	
	
	
	public function update_password_old($id){	
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
					$url = base_url().'users/reset_password/'.$id;
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