
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Parents extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		
		/* $this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->url_slug =  $_SESSION["login_session"]["url_slug"]; */
		
		$this->load->library('bcrypt');
		$this->load->library('Ajax_pagination');
		$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->user_id = $_SESSION['login_session']['user_id'];
		$this->url_slug = $_SESSION['login_session']['url_slug'];
		
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
		 $ary =array();	
		 
		  
		 if($this->uri->segment("2") !=''){
			$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
			
			$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		  
			$ary['school_id'] = $id;
		 }else{
			 $ary['school_id'] = 'all';
		 }
			
		/*total rows count*/
		$res = $this->admin->get_parents($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'parents/ajaxPaginationparentsData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_parents($ary);
		
		//echo $this->db->last_query();
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['mentors'] = $posts;	

		$data['main_content'] = 'admin/parents';
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
		
	}
	
	
	public function view_parent($id)
	{
		
		$data['parent'] = $this->admin->get_user($id)[0];
		
		$data['main_content'] = 'admin/view_parents';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}

	public function add_parents($id = null)
	{
		$id1 = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['schools'] = $this->admin->get_schoolsByID($id1)[0];
		
		$data['students'] = $this->admin->getAllUnAssigned($id1);
	
		//$data['student_id'] = $id;
		$data['main_content'] = 'admin/add_parents';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	public function save_parent()
	{
		$status = 0;
		$msg= '';
		$url = '';
		
		/* $id = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST["school_id"]; */
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/parents' :  'parents/'.$_POST["school_id"];
		
		$password='welcome1';
		$hash = $this->bcrypt->hash_password($password);

		if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter Frist Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Last Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Email');	
		}/* else if($this->input->post('password')=='' ){
			$msg = warning_msg('Please Enter password');	
		} */else{
			
		$save_data = array(
					'first_name'=>trim(ucwords($_POST['first_name'])),
					'last_name'=>trim(ucwords($_POST['last_name'])),
					'email'=>trim($_POST['email']),
					'phone'=>trim($_POST['phone']),
					'school_id'=>trim($_POST['school_id']),
					'role_id'=>8,
					'added_by'=>$this->user_id,
					'password'=>$hash
				);
		
		$if_exists = $this->admin->check_if_email_exists($_POST['email']);
		if ($if_exists == 0) {
			$q = $this->db->insert('users', $save_data);
			$parent_lastId = $this->db->insert_id();
			
			$update = array('parent_id' => $parent_lastId);
			$this->db->set($update);
			$this->db->where(array('student_id' => $_POST['student_id']));
			$result = $this->db->update('students');
			
			
			if($q){
				$status = 1;	
				$msg = '<div class="alert alert-success alert-dismissible" role="alert"> Added Successfully</div>';
				$url = base_url().$rid;
			}else{
				$msg= '<div class="alert alert-success alert-dismissible" role="alert">
				Something went wrong, please Try Again Later</div>';
			}
			
		}else{
			$msg=  '<div class="alert alert-warning text-center alert-dismiss "> Email already exists. Please Try With new Email</div>';
		}
	}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}
	public function edit_parents($id)
	{
		
		$users = $this->admin->get_user($id)[0];
		$data['schools'] = $this->admin->get_schoolsByID($users->school_id)[0];
		$data['mentor'] = $users;
		$data['main_content'] = 'admin/edit_parents';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	public function update_parents($id)
	{
		$status = 0;
		$msg= '';
		$url = '';
		
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/parents' :  'parents/'.$_POST["school_id"];
		
		if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter Frist Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Last Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Email');	
		}else{
			$save_data = array(
				'first_name'=>trim(ucwords($_POST['first_name'])),
				'last_name'=>trim(ucwords($_POST['last_name'])),
				'email'=>trim($_POST['email']),
				'phone'=>trim($_POST['phone']),
				'status'=>trim($_POST['status']),
			);
			
			//print_r($save_data);exit;
				
			$this->db->set($save_data);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('users');
			
			if($result){
				$status = 1;
				$msg = '<div class="alert alert-success"> <strong>Updated Successfully</strong></div>';
				$url = $url = base_url().$rid;
				
			}else{
				$msg= '<div class="alert alert-success alert-dismissible" role="alert">Something went wrong, please Try Again Later</div>';
			}
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}	
	
	public function del()
	{		
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $this->input->post('sid'); */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/parents' :  'parents/'.$_POST["sid"];
		$id = addslashes($this->input->post('i'));
		$res = $this->admin->userInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$q = $this->db->update('users');
			if($q){
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
	
	public function delete_parent($id)
	{
		$array = array('status' => '0','is_del'=>'1');
		$this->db->set($array);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('users');
		
		if($result){
			$this->session->set_flashdata('msg','<div class="alert alert-warning">
				
				  <strong>Deleted Successfully</strong></div>');
			redirect('parents', "refresh");
			}
	}
	function ajaxPaginationparentsData(){
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		
		if( $this->input->post('school_id') !=''){
			$conditions['school_id'] = $this->input->post('school_id');
		}else{
			 $conditions['school_id'] = 'all';
		}
		 
		
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        //total rows count
		$data = $this->admin->get_parents($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'parents/ajaxPaginationparentsData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->get_parents($conditions);
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
					$status = 'InActive';
				}
				
		        $html .='<tr>
							<td>'.$value->first_name.' '.$value->last_name.'</td>
							<td>'.$value->email .'</td>
							
							<td>'.$value->phone.'</td>
							<td>
								<span class="badge '.$status_badge .' ">'. ucfirst($status) .'</span>
							</td>';
							/* if($_SESSION['login_session']['role_id']!= '5'){ */
							 $html .='<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									   <a href="'. base_url('parents/edit_parents/') . $value->id .'" class="dropdown-item">Edit</a>
										<a href="'.base_url('parents/reset_password/') . $value->id .'" class="dropdown-item">Reset Password</a>
                                            
											<a href="javascript:void(0);" data-did="'.$value->id.'" data-sid = "'.$value->school_id.'" data-tbl="schools" data-ctrl="parents"  class="dropdown-item text-danger delete_class">Delete</a>
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
					  redirect('parents');
					
				}else{
					$msg='<div class="alert alert-warning">
					
					  <strong>Please Try Again Later</strong></div>';
					  $this->session->set_flashdata('msg',$msg);
					  redirect('parents/reset_password/'.$id);
				}
			 }
		 
			
				
		}
		$data['id'] = $id;
		$data['main_content'] = 'admin/parents_reset_password';
		$this->load->view('dash_template/body',$data);
		
	}
	
	
	public function import_parents($id =null)
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");	  
		$school_id = $id;
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		/* echo $this->db->last_query();exit; */
		$data['main_content'] = 'admin/import_parent';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	
	public function submitimport()	{
		$status = 0;
		$msg= '';
		$url = '';		$parent_lastId = '';
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $_POST['school_id'];	  
		$school_id = $id;
		
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  '/'.$_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/parents' :  'parents/'.$_POST["school_id"];
		
		$password='welcome1';
		$hash = $this->bcrypt->hash_password($password);
		$filename=$_FILES["import_students"]["tmp_name"];
        if($_FILES["import_students"]["size"] > 0)
          {
            $file = fopen($filename, "r");
			//$handle = fopen($filename, "r");
			$headers = fgetcsv($file, 100000, ",");
             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
             {
				 
				  $save_data = array(
					'first_name'=>trim($importdata[0]),
					'last_name'=>trim($importdata[1]),
					'email'=>trim($importdata[2]),
					'phone'=>trim($importdata[3]),
					'school_id'=>trim($_POST['school_id']),
					'role_id'=>8,
					'password'=>$hash
				);
				
				if($importdata[2] !=''){			
				$emaildata = $this->admin->check_getdata_if_email_exists($importdata[2]);		
				if ($emaildata['num'] == 0) {		
					$q = $this->db->insert('users', $save_data);	
					$parent_lastId = $this->db->insert_id();	
				}
				}
				
			 }			 $status = 1;
			 $msg = '<div class="alert alert-success">  <strong> Uploaded Successfully</strong></div>';
			 $url = base_url().$rid;
			 /* redirect('students/import'.$rid, "refresh"); */
		  }else{
			  $msg = '<div class="alert alert-warning"> <strong> Please Upload file</strong></div>';
		  }
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}
	
	
}