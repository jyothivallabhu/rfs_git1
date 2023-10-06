
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Teachers extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		$this->load->model("Teachers_model",'teachers_model' );
		$this->load->model("Admin_model" );
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
			$this->school_data = $this->Admin_model->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}
	}

	
	public function index()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		
		$data['schools'] = $this->Admin_model->get_schoolsByID($id)[0];
		
		
		$ary =array();	
	   	
			$ary['school_id'] = $id;
		
		/*total rows count*/
		$res = $this->teachers_model->get_schoolteachers($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#usersList';
		$config['base_url']    = base_url().'teachers/ajaxPaginationSAdminData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->teachers_model->get_schoolteachers($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['users'] = $posts;	
		//$data['main_content'] = 'teachers/index';
		
		//$id = ($_SESSION['login_session']['role_id']== '4') ?  $this->load->view('dash_template/body',$data) : $this->load->view('dash_template/body',$data);
		
		//$this->load->view('dash_template/body',$data) ;
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$data['main_content'] = 'admin/teachers/index';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/teachers/index';
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
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        $conditions['school_id'] = $this->input->post('school_id');
        //total rows count
		$data = $this->teachers_model->get_schoolteachers($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'teachers/ajaxPaginationSAdminData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->teachers_model->get_schoolteachers($conditions);
		$data['query'] = $this->db->last_query(); 
		
		//echo $this->db->last_query();
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($users_list)){
			foreach($users_list as $key => $value){
				# code...
				$status_badge = 'bg-success';
				if ($value->status == '0'){
					$status_badge = 'bg-warning';
					$status = 'Inactive';
				}else{
					$status = 'Active';
					
				}
				$modules  = $this->teachers_model->get_modules($value->modules)[0];
				$m =$modules->module;
				
				/* $grades  = $this->teachers_model->get_grades($value->section_ids)[0];
                $s =$grades->sections; */
				
		        $html .='<tr>
							<td><img src="'. $value->image_path .' " height="60" width="60" /> </td>
							<td>'.$value->first_name.' '.$value->last_name.'</td>
							
							<td>'.$value->email .'</td>
							
							<td>'.$value->phone.'</td>
							<td>'.  $m  .'</td>
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
									   <a href="'. base_url($this->url_slug.'/teachers/edit/').$value->id .'" class="dropdown-item">Edit</a>
										
										<a href="'. base_url('teachers/reset_password/') . $value->id .'" class="dropdown-item">Reset Password</a>
									   
									   <a href="javascript:void(0);"  data-did="'. $value->id .'" data-sid = "'. $value->school_id .'" data-tbl="teachers" data-ctrl="teachers"  class="dropdown-item text-danger delete_class">Delete</a>
										
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
		
		$data['schools'] = $this->Admin_model->get_schoolsByID($id)[0];

		$data['classes'] = $this->teachers_model->get_classesBySchoolID($id);
		$data['modules'] = $this->Admin_model->get_all_modules();
		
		$data['main_content'] = 'admin/teachers/add';
		/* $this->load->view('dash_template/body',$data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	public function save_school_teachers()
	{
		$status = 0;
		$msg= '';
		$url = '';
		/* $id = (isset($_SESSION['login_session']['school_id'])) ?  '' :  $_POST["school_id"]; */
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/teachers/' :  'teachers/'.$_POST["school_id"];

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
		} */else if($this->input->post('section_ids')=='' ){
			$msg = warning_msg('Please Select Sections');	
		}else{
			$modules = implode(",", $this->input->post('modules'));
			/* $section_ids = implode(",", $this->input->post('section_ids')); */
			$sections = $this->input->post('section_ids');
			$class_id = $this->input->post('class_ids');
		
		/* print_r($this->input->post('class_ids'));exit; */
			$save_data = array(
					'first_name'=>trim(ucwords($_POST['first_name'])),
					'last_name'=>trim(ucwords($_POST['last_name'])),
					'email'=>trim($_POST['email']),
					'phone'=>trim($_POST['phone']),
					'school_id'=>trim($_POST['school_id']),
					'modules'=>trim($modules),
					'added_by'=>$this->user_id,
					'role_id'=>10,
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
			 $academic_year = $this->Admin_model->get_academic_year()[0];
			 
			$if_exists = $this->Admin_model->check_if_schooluser_exists($_POST["school_id"],$_POST['email']);
			if ($if_exists['num'] == 0) {
				$result = $this->db->insert('users', $save_data);
				$lastid = $this->db->insert_id();
				
				
					for($i=0;$i<count($sections);$i++){
						$sec_class_id = $this->Admin_model->get_classesBySectionID($sections[$i])[0];
						
						$sectionsassigned = array(
							'class_id'=>$sec_class_id->class_id,
							'section_ids'=>$sections[$i],
							'academic_year'=>$academic_year->id,
							'teacher_id'=>trim($lastid)
						);
						
						$result = $this->db->insert('teacher_sections_assigned', $sectionsassigned);
						
					}
				
				
					
				if($result){
					
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						Added Successfully</div>';
					$url = base_url().$rid;
				}else{
					$msg ='<div class="alert alert-warning alert-dismissible" role="alert">
						
						Something went wrong, please Try Again Later</div>';
						//redirect($this->url_slug.'/teachers/index/'.$_POST["school_id"], "refresh");
				}
				
			}else{
				$msg = '<div class="alert alert-warning text-center alert-dismiss "> Teachers already exists</div>';
				//redirect($this->url_slug.'/teachers/index/'.$_POST["school_id"], "refresh");
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
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/teachers/' :  'teachers/'.$_POST["sid"];
		$id = addslashes($this->input->post('i'));
		$res = $this->teachers_model->userInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$q = $this->teachers_model->update(array('is_del'=>1),$id);
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
	
	public function edit($id)
	{
		$status = 0;
		$msg= '';
		$url = '';
		 $id = (isset($_SESSION['login_session']['school_id'])) ?  $this->uri->segment("4") :  $this->uri->segment("3"); 
		
		
		$mentor = $this->teachers_model->get_teachers($id)[0];
		
		$data['schools'] = $this->Admin_model->get_schoolsByID($mentor ->school_id)[0];
		
		$data['classes'] = $this->teachers_model->get_classesBySchoolID($mentor ->school_id);
		
		$data['modules'] = $this->Admin_model->get_all_modules();
		$data['mentor'] =$mentor ;
		
		$data['main_content'] = 'admin/teachers/edit';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	public function update_school_teacher($id)
	{
		
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/teachers' :  'teachers/'.$_POST["school_id"];
		
		$status = 0;
		$msg= '';
		$url = '';
		
		if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter First Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		}else if($this->input->post('modules')=='' ){
			$msg = warning_msg('Please Select Module');	
		}else if($this->input->post('section_ids')=='' ){
			$msg = warning_msg('Please Select Sections');	
		}else{
			$modules = implode(",", $this->input->post('modules'));
			$section_ids = implode(",", $this->input->post('section_ids'));
			$sections = $this->input->post('section_ids');
			$select_all = (isset($_POST['select_all'])) ? 1 : 0;
			
			$save_data = array(
						'first_name'=>trim(ucwords($_POST['first_name'])),
						'last_name'=>trim(ucwords($_POST['last_name'])),
						'email'=>trim($_POST['email']),
						'phone'=>trim($_POST['phone']),
						'modules'=>trim($modules),
						'status'=>trim($_POST['status']),
						'select_all'=>trim($select_all),
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
			$result = $this->db->update('users');
			if($result){
				/* $sectionsassigned = array( 'section_ids'=>$section_ids, );
				$this->db->set($sectionsassigned);
				$this->db->where(array('teacher_id' => $id));
				$result = $this->db->update('teacher_sections_assigned'); */
				
				$this->db->where('teacher_id', $id);
				$this->db->delete('teacher_sections_assigned');
	
	
				$academic_year = $this->Admin_model->get_academic_year()[0];
				
				
				for($i=0;$i<count($sections);$i++){
					$sec_class_id = $this->Admin_model->get_classesBySectionID($sections[$i])[0];
					
					$sectionsassigned = array(
						'class_id'=>$sec_class_id->class_id,
						'section_ids'=>$sections[$i],
						'academic_year'=>$academic_year->id,
						'added_by'=>$this->user_id,
						'teacher_id'=>trim($id)
					);
					$result = $this->db->insert('teacher_sections_assigned', $sectionsassigned);
					
					/* $checkif_exists = $this->teachers_model->check_if_sections_assigned_exists($sectionsassigned);
					if ($checkif_exists['num'] == 0) {
						
						$result = $this->db->insert('teacher_sections_assigned', $sectionsassigned);
					} */
					
				}
				
				
				$status = 1;
				$msg = '<div class="alert alert-success"> <strong>Updated Successfully</strong></div>';
				$url = base_url().$rid;
				//redirect($this->url_slug.'/teachers/'.$rid, "refresh");
			}else{
				$msg = '<div class="alert alert-warning alert-dismissible" role="alert">  Something went wrong, please Try Again Later</div>';
			}	
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}

	public function reset_password($id){
		
		$data['id'] = $id;
		
		$user_det = $this->Admin_model->get_user($id)[0];
		$data['schools'] = $this->Admin_model->get_schoolsByID($user_det->school_id)[0];
		
		$data['main_content'] = 'admin/teachers/reset_password';
		$this->load->view('dash_template/body',$data);
		
	}
	
	public function update_password($id){	
		$status = 0;
		$msg= '';
		$url = '';
		
			$password=$this->input->post('new_password');
			$hash = $this->bcrypt->hash_password($password);
		
			$user_det = $this->Admin_model->get_user($id)[0];
			
			$sid = $user_det->school_id;
		
			$rid = (isset($_SESSION['login_session']['school_id'])) ? $this->url_slug.'/teachers' : 'teachers/'.$sid;
		
			
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
					/*$url = base_url().'teachers/reset_password/'.$id;*/
					
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