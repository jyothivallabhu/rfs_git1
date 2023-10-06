
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Faq extends CI_Controller
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
		
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		$this->role_id =  $_SESSION["login_session"]["role_id"];
		
		  
		
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}else{
			$this->logo =  'assets/images/logo/rainbowfish-logo1x.png';
		}
	}

	public function index()
	{
		 $ary =array();	
	   	   
		/*total rows count*/
		$res = $this->admin->get_faqs($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'faq/ajaxPaginationFaqData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_faqs($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['mentors'] = $posts;	

		$data['main_content'] = 'admin/faq/index';
		$this->load->view('dash_template/body', $data);
		
	}
	
	
	

	public function add_faq()
	{

		$data['main_content'] = 'admin/faq/add_faq';
		$this->load->view('dash_template/body', $data);
	}
	public function save_faq()
	{
		$status = 0;
		$msg= '';
		$url = '';
		$_POST['role_id'] = 5;
		
		$password='welcome1';
		$hash = $this->bcrypt->hash_password($password);
		
		if($this->input->post('faq_title')=='' ){
			$msg = warning_msg('Please Enter Title');	
		} else if($this->input->post('role')=='' ){
			$msg = warning_msg('Please Select Role');	
		}/*else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		} *//* else if($this->input->post('password')=='' ){
			$msg = warning_msg('Please Enter Password');	
		} */else{
			
			$save_data = array(
					'role'=>trim(ucwords($_POST['role'])),
					'faq_title'=>trim(ucwords($_POST['faq_title'])),
					'faq_desc'=>trim($_POST['faq_desc']),
					'added_by'=>$this->user_id, 
				);
				
			if(isset($_FILES['faq_image']) && !empty($_FILES) && $_FILES['faq_image']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image']['size'];
					$file_name1 = $_FILES['faq_image']['name'];
					$path_parts1=pathinfo($_FILES['faq_image']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image']['tmp_name'],$trgt1.$file1); 
				 }
				 
				if(isset($_FILES['faq_image2']) && !empty($_FILES) && $_FILES['faq_image2']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image2']['size'];
					$file_name1 = $_FILES['faq_image2']['name'];
					$path_parts1=pathinfo($_FILES['faq_image2']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image2']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image2']['tmp_name'],$trgt1.$file1); 
				 }
				 
				if(isset($_FILES['faq_image3']) && !empty($_FILES) && $_FILES['faq_image3']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image3']['size'];
					$file_name1 = $_FILES['faq_image3']['name'];
					$path_parts1=pathinfo($_FILES['faq_image3']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image3']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image3']['tmp_name'],$trgt1.$file1); 
				 }
				 
				if(isset($_FILES['faq_image4']) && !empty($_FILES) && $_FILES['faq_image4']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image4']['size'];
					$file_name1 = $_FILES['faq_image4']['name'];
					$path_parts1=pathinfo($_FILES['faq_image4']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image4']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image4']['tmp_name'],$trgt1.$file1); 
				 }
				 
				if(isset($_FILES['faq_image5']) && !empty($_FILES) && $_FILES['faq_image5']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image5']['size'];
					$file_name1 = $_FILES['faq_image5']['name'];
					$path_parts1=pathinfo($_FILES['faq_image5']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image5']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image5']['tmp_name'],$trgt1.$file1); 
				 }
				 
				 
				 
				
				/* print_r($save_data);exit; */
			/* $if_exists = $this->admin->check_if_role_exists($_POST['name']);
			if ($if_exists == 0) { */
				$q = $this->db->insert('faq', $save_data);
				if($q){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url().'faq/add_faq';
				}else{
					$status = 0;
					$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
					Something went wrong, please Try Again Later</div>';
				}
				
			/* }else{
				$status = 0;
				$msg = '<div class="alert alert-warning text-center alert-dismiss "> Email already exists. Please try with new Email</div>';
				$url = base_url().'roles/add_roles';
				//redirect('mentors/add_mentor');
			} */
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}
	public function edit_faq($id)
	{
		
		$data['mentor'] = $this->admin->get_faq($id)[0];

		$data['main_content'] = 'admin/faq/edit_faq';
		$this->load->view('dash_template/body', $data);
	}
	public function update_faq($id)
	{
		//print_r($_POST);
		$status = 0;
		$msg= '';
		$url = '';
		if($this->input->post('role')=='' ){
			$msg = warning_msg('Please Select Role');	
		}else if($this->input->post('faq_title')=='' ){
			$msg = warning_msg('Please Enter Faq Title');	
		}/* else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter Second Name');	
		} */else{
			 $save_data = array(
					'role'=>trim(ucwords($_POST['role'])),
					'faq_title'=>trim(ucwords($_POST['faq_title'])),
					'faq_desc'=>trim($_POST['faq_desc']), 
				);
			 
			 if(isset($_FILES['faq_image']) && !empty($_FILES) && $_FILES['faq_image']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image']['size'];
					$file_name1 = $_FILES['faq_image']['name'];
					$path_parts1=pathinfo($_FILES['faq_image']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image']['tmp_name'],$trgt1.$file1); 
				 }
				
				if(isset($_FILES['faq_image2']) && !empty($_FILES) && $_FILES['faq_image2']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image2']['size'];
					$file_name1 = $_FILES['faq_image2']['name'];
					$path_parts1=pathinfo($_FILES['faq_image2']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image2']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image2']['tmp_name'],$trgt1.$file1); 
				 }
				 
				if(isset($_FILES['faq_image3']) && !empty($_FILES) && $_FILES['faq_image3']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image3']['size'];
					$file_name1 = $_FILES['faq_image3']['name'];
					$path_parts1=pathinfo($_FILES['faq_image3']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image3']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image3']['tmp_name'],$trgt1.$file1); 
				 }
				 
				if(isset($_FILES['faq_image4']) && !empty($_FILES) && $_FILES['faq_image4']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image4']['size'];
					$file_name1 = $_FILES['faq_image4']['name'];
					$path_parts1=pathinfo($_FILES['faq_image4']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image4']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image4']['tmp_name'],$trgt1.$file1); 
				 }
				 
				if(isset($_FILES['faq_image5']) && !empty($_FILES) && $_FILES['faq_image5']['name']!=""){		
					$trgt1='uploads/faq_image/';
					$size1 = $_FILES['faq_image5']['size'];
					$file_name1 = $_FILES['faq_image5']['name'];
					$path_parts1=pathinfo($_FILES['faq_image5']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$save_data['faq_image5']=$trgt1.$file1;
					move_uploaded_file($_FILES['faq_image5']['tmp_name'],$trgt1.$file1); 
				 }
				
			$this->db->set($save_data);
			$this->db->where(array('faq_id' => $id));
			$result = $this->db->update('faq');
			
			if($result){
				
				$status= 1;
				$msg = '<div class="alert alert-success">
					  <strong>Updated Successfully</strong></div>';
					  
				$url = base_url().'faq';
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
	

	
	public function del()
	{		
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$res = $this->admin->faqInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$q = $this->admin->del_faq(array('is_del'=>1),$id);
			if($q){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url('faq');
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	
	function ajaxPaginationFaqData(){
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
		$data = $this->admin->get_faqs($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'faq/ajaxPaginationFaqData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->get_faqs($conditions);
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
				if ($value->faq_status == '0'){
					$status_badge = 'bg-warning';
					$status = 'Inactive';
				}
				 $html .='<tr>
							<td>'.$value->role.' </td>
							<td>'.$value->faq_title .'</td>
							<td>'.$value->faq_desc.'</td>
							 
							<td>
								<span class="badge '.$status_badge .' ">'. ucfirst($status) .'</span>
							</td>
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									   <a href="'. base_url('faq/edit_faq/') . $value->faq_id .'" class="dropdown-item">Edit</a> 
										<a href="javascript:void(0);"  data-did="'. $value->faq_id .'" data-tbl="faq" data-ctrl="faq"  class="dropdown-item text-danger delete_class">Delete</a>
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
	

	
	function teacher_faq(){
		
		$sql_faq = $this->db->query("SELECT * from faq where role = 'Teacher' and faq_status=1 and is_del = 0");
		$data['faq'] = $sql_faq->result();
		
		$data['main_content'] = 'teacher_views/faq';
		$this->load->view('school_template/body', $data);
		
	}
	
	
	function mentor_faq(){
		
		$sql_faq = $this->db->query("SELECT * from faq where role = 'Mentor' and faq_status=1 and is_del = 0");
		$data['faq'] = $sql_faq->result();
		
		$data['main_content'] = 'teacher_views/faq';
		$this->load->view('school_template/body', $data);
		
		
		
	}
	
	
	
	
	
}