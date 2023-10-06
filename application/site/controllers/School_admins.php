
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class School_admins extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
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

	
	public function index()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		
		$ary =array();	
	   	
			$ary['school_id'] = $id;
		
		/*total rows count*/
		$res = $this->admin->get_schoolAdmins($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#usersList';
		$config['base_url']    = base_url().'school_admins/ajaxPaginationSAdminData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_schoolAdmins($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['users'] = $posts;	
		//$data['main_content'] = 'school_admins/index';
		
		//$id = ($_SESSION['login_session']['role_id']== '4') ?  $this->load->view('dash_template/body',$data) : $this->load->view('dash_template/body',$data);
		
		//$this->load->view('dash_template/body',$data) ;
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$data['main_content'] = 'admin/school_admins/index';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/school_admins/index';
			$this->load->view('dash_template/body', $data);
		}
		
	}
	



	
	function ajaxPaginationSAdminData(){
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['school_id'] = $this->input->post('school_id');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        //total rows count
		$data = $this->admin->get_schoolAdmins($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'school_admins/ajaxPaginationSAdminData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->get_schoolAdmins($conditions);
		$data['query'] = $this->db->last_query(); 
		
		//echo $this->db->last_query();
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($users_list)){
			foreach($users_list as $key => $value){
				# code...
				$status_badge = 'bg-success';
				if ($value->user_status == '0'){
					$status_badge = 'bg-warning';
					$status = 'Inactive';
				}else{
					$status = 'Active';
					
				}
		        $html .='<tr>
							<td><img src="'. $value->image_path .' " height="60" width="60"  /> </td>
							<td>'.$value->first_name.' '.$value->last_name.'</td>
							<td>'.$value->email .'</td>
							
							<td>'.$value->phone.'</td>
							<td>'.$value->school_name.'</td>
							<td>
								<span class="badge '.$status_badge .' ">'. ucfirst($status) .'</span>
							</td>';
							/* if($_SESSION['login_session']['role_id'] != 5){ */
								
							 $html .='<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									   <a href="'. base_url($this->url_slug.'/school_admins/edit/') . $value->school_id .'/'.$value->id .'" class="dropdown-item">Edit</a>
									   
									   <a href="'. base_url($this->url_slug.'/school_admins/reset_password/') . $value->school_id .'/'.$value->id .'" class="dropdown-item">Reset Password</a>
										
										<a href="javascript:void(0);"  data-did="'. $value->id .'" data-sid = "'. $value->school_id .'" data-tbl="users" data-ctrl="school_admins"  class="dropdown-item text-danger delete_class">Delete</a>
									</div>
								</div>
							</td>';
							/* } */

						 $html .='</tr>';
		
			}
		}else{
			$html .="No Records to display";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }

	public function add($id = Null)
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];

		$data['main_content'] = 'admin/school_admins/add';
		$this->load->view('dash_template/body',$data);
	}
	public function save_school_admin()
	{
		$url = '';
		$id = (isset($_SESSION['login_session']['school_id'])) ?  '' :  $_POST["school_id"];
		 
		 $rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/school_admins/' :  'school_admins/'.$_POST["school_id"];
		 
		 
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
				'school_id'=>trim($_POST['school_id']),
				'role_id'=>4,
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
					$url= base_url().$rid;
				}else{
					$status = 0;
					/* $url = base_url().$this->url_slug.'/school_admins/add';  */
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
	
	/* public function del($sid,$id)
	{
		$array = array('status' => '0','is_del'=>'1');
		$this->db->set($array);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('users');
		$rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $sid;
		$this->session->set_flashdata('msg','<div class="alert alert-warning">
					
					  <strong>Deleted Successfully</strong></div>');
		redirect($this->url_slug.'/school_admins/index/'.$rid, "refresh");
	} */
	
	public function del()
	{		
	
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  '' :  $_POST["sid"];
	

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
				$ary['url']=base_url().$this->url_slug.'school_admins/'.$rid;
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	
	public function edit($id2)
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $this->uri->segment("2") :  $this->uri->segment("4");
		
		$mentor = $this->admin->get_user($id)[0];
		
		$data['schools'] = $this->admin->get_schoolsByID($mentor ->school_id)[0];
		
		$data['mentor'] =$mentor ;
		
		$data['main_content'] = 'admin/school_admins/edit';
		$this->load->view('dash_template/body', $data);
	}
	public function update_school_admin($id)
	{
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  '' :  $_POST['school_id'];
		
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
			
			$save_data = array(
				'first_name'=>trim(ucwords($_POST['first_name'])),
				'last_name'=>trim(ucwords($_POST['last_name'])),
				'email'=>trim($_POST['email']),
				'phone'=>trim($_POST['phone']),
				'status'=>trim($_POST['status']),
				'added_by'=>$this->user_id,
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
					  
				$url = base_url().$this->url_slug.'/school_admins/'.$rid;
				//redirect('users');
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
	
	public function reset_password($id){
		$user_det = $this->admin->get_user($id)[0];
		$data['id'] = $id;
		
		$data['schools'] = $this->admin->get_schoolsByID($user_det->school_id)[0];
		
		$data['school_id'] = $user_det->school_id;
		
		$data['main_content'] = 'admin/school_admins/reset_password';
		$this->load->view('dash_template/body',$data);
		
	}
	
	
	public function update_password($id){	
		$status = 0;
		$msg= '';
		$url = '';
		
			$password=$this->input->post('new_password');
			$hash = $this->bcrypt->hash_password($password);
		
			$user_det = $this->admin->get_user($id)[0];
			
			$sid = $user_det->school_id;
		
			$rid = (isset($_SESSION['login_session']['school_id'])) ? $this->url_slug.'/school_admins' : 'school_admins/'.$sid;
			
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
					/* $url = base_url().'school_admins/reset_password/'.$id; */
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
	
	
	
	
	
	
}