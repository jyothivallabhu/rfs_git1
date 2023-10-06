
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Offline_schools extends CI_Controller
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
		$ary =array();	
	   	   
		/*total rows count*/
		$res = $this->admin->get_offline_schools($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#schoolsList';
		$config['base_url']    = base_url().'Offline_schools/ajaxPaginationSchoolsData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_offline_schools($ary);
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['schools'] = $posts;	
		
		$data['main_content'] = 'admin/offline_schools/index';
		$this->load->view('dash_template/body', $data);
		
		
	}
	


	public function add_school()
	{
		
		$data['states'] = $this->admin->get_all_states();
		$data['main_content'] = 'admin/offline_schools/add_school';
		$this->load->view('dash_template/body', $data);
	}
	public function save_school()
	{
		$school_data = array();
		
		$status = 0;
		$msg= '';
		$url = '';
		
		if($this->input->post('name')=='' ){
			$msg = warning_msg('Please Enter School Name');	
		}else if($this->input->post('address')=='' ){
			$msg = warning_msg('Please Enter Address');	
		}else if($this->input->post('city')=='' ){
			$msg = warning_msg('Please Enter city');	
		}else if($this->input->post('state')=='' ){
			$msg = warning_msg('Please Enter state');	
		}else if($this->input->post('pincode')=='' ){
			$msg = warning_msg('Please Enter pincode');	
		}/*else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter email');	
		}else if($this->input->post('phone')=='' ){
			$msg = warning_msg('Please Enter phone');	
		} else if($this->input->post('website')=='' ){
			$msg = warning_msg('Please Enter website');	
		} else if($this->input->post('url_slug')=='' ){
			$msg = warning_msg('Please Enter URL Slug');	
		}else if($this->input->post('principal_name')=='' ){
			$msg = warning_msg('Please Enter principal_name');	
		} */else{
			/* $if_exists = $this->admin->check_if_schoolemail_exists($_POST['email']);
			
			if ($if_exists > 0) {
				$status = 0;
				$msg ='<div class="alert alert-warning text-center alert-dismiss ">Email already exists. Please try with new Email</div>';
				$url = base_url().'offline_schools/add_user';
			} else{ */
				$school_data = array(
				'school_name'=>addslashes(ucwords($this->input->post('name'))),
				'address'=>addslashes(ucwords($this->input->post('address'))),
				'city'=>addslashes(ucwords($this->input->post('city'))),
				'state'=>addslashes($this->input->post('state')),
				'pincode'=>addslashes($this->input->post('pincode')), 
				'added_by'=>$this->user_id,
				);
				 
		
				$q = $this->db->insert('offline_schools', $school_data);
				$school_lastId = $this->db->insert_id();
				
				$mac_address = $this->input->post('mac_address');
				
				if($q){
					if(!empty($mac_address)){
					for($i=0;$i<count($mac_address);$i++){
					 
						 
							$bulkarray[]=array(
							'school_id'=>$school_lastId, 
							'mac_address'=>$mac_address[$i], 
						);
						
					}
					
				if(!empty($bulkarray)){
					$q = $this->admin->create_bulk_mac_address($bulkarray);
					$status = 1;
					$url = base_url().'offline_schools';
					$msg ='<div class="alert alert-success"><strong>Added Successfully</strong></div>';
			
				} else{
					$msg ='<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
				} 
			}
				}
				
				
				/* if($q){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						Added Successfully</div>';
					$url = base_url().'offline_schools';
				}else{
					$status = 0;
					$url = base_url().'offline_schools/add_user';
					$msg ='<div class="alert alert-success alert-dismissible" role="alert">
						  Something went wrong, please Try Again Later</div>';
				} */
			/* } */
				
			}
				
				
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
			
	}

	public function edit_school($id){
		$data['school'] = $this->admin->get_schoolsByID($id)[0];
		$data['states'] = $this->admin->get_all_states();
		$data['main_content'] = 'admin/offline_schools/edit_school';
		$this->load->view('dash_template/body', $data);
	}
	public function update_school($id)
	{	
		/* if(isset($_FILES['school_image']) && !empty($_FILES) && $_FILES['school_image']['name']!=""){		
			$trgt1='uploads/school_image/';
			$size1 = $_FILES['school_image']['size'];
			$file_name1 = $_FILES['school_image']['name'];
			$path_parts1=pathinfo($_FILES['school_image']['name']);
			$file1 = time().'.'.$path_parts1['extension'];
			$_POST['logo']=$trgt1.$file1;
			move_uploaded_file($_FILES['school_image']['tmp_name'],$trgt1.$file1); 
		 }
		
		$this->db->set($_POST);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('schools');
		
		if($result){
			$this->session->set_flashdata('msg','<div class="alert alert-success">
				  
				  <strong>Updated Successfully</strong></div>');
			redirect('schools', "refresh");
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible" role="alert">
				
				Something went wrong, please Try Again Later</div>');
		} */
		
		$school_data = array();
		
		$status = 0;
		$msg= '';
		$url = '';
		
		if($this->input->post('name')=='' ){
			$msg = warning_msg('Please Enter School Name');	
		}else if($this->input->post('address')=='' ){
			$msg = warning_msg('Please Enter Address');	
		}else if($this->input->post('city')=='' ){
			$msg = warning_msg('Please Enter city');	
		}else if($this->input->post('state')=='' ){
			$msg = warning_msg('Please Enter state');	
		}else if($this->input->post('pincode')=='' ){
			$msg = warning_msg('Please Enter pincode');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please Enter email');	
		}/*else if($this->input->post('phone')=='' ){
			$msg = warning_msg('Please Enter phone');	
		} else if($this->input->post('website')=='' ){
			$msg = warning_msg('Please Enter website');	
		} */else if($this->input->post('url_slug')=='' ){
			$msg = warning_msg('Please Enter URL Slug');	
		}/* else if($this->input->post('principal_name')=='' ){
			$msg = warning_msg('Please Enter principal_name');	
		} */else{
			$if_exists = $this->admin->check_if_school_editemail_exists($_POST['email'],$id);
			$if_url_slug_exists = $this->admin->check_if_school_editurl_exists($_POST['url_slug'],$id);
			if ($if_exists > 0) {
				$status = 0;
				$msg ='<div class="alert alert-warning text-center alert-dismiss ">Email already exists. Please try with new Email</div>';
				$url = base_url().'offline_schools/add_user';
			}else if($if_url_slug_exists >0){
				$status = 0;
				$msg ='<div class="alert alert-warning text-center alert-dismiss ">URL Slug already exists. Please try with new Email</div>';
				$url = base_url().'offline_schools/add_user';
			}else{
				$school_data = array(
					'name'=>addslashes(ucwords($this->input->post('name'))),
					'address'=>addslashes(ucwords($this->input->post('address'))),
					'city'=>addslashes(ucwords($this->input->post('city'))),
					'state'=>addslashes($this->input->post('state')),
					'pincode'=>addslashes($this->input->post('pincode')),
					'principal_name'=>addslashes(ucwords($this->input->post('principal_name'))),
					'email'=>addslashes($this->input->post('email')),
					'phone'=>addslashes($this->input->post('phone')),
					'website'=>addslashes($this->input->post('website')),
					'url_slug'=>addslashes($this->input->post('url_slug')),
					'status'=>addslashes($this->input->post('status')),
				);
				
				if(isset($_FILES['school_image']) && !empty($_FILES) && $_FILES['school_image']['name']!=""){		
					$trgt1='uploads/school_image/';
					$size1 = $_FILES['school_image']['size'];
					$file_name1 = $_FILES['school_image']['name'];
					$path_parts1=pathinfo($_FILES['school_image']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$school_data['logo']=$trgt1.$file1;
					move_uploaded_file($_FILES['school_image']['tmp_name'],$trgt1.$file1); 
				 }
			
			if(isset($_FILES['school_app_image']) && !empty($_FILES) && $_FILES['school_app_image']['name']!=""){		
					$trgt2='uploads/school_image/';
					$size1 = $_FILES['school_app_image']['size'];
					$file_name2 = $_FILES['school_app_image']['name'];
					$path_parts12=pathinfo($_FILES['school_app_image']['name']);
					$file2 = time().'.'.$path_parts12['extension'];
					$school_data['app_logo']=$trgt2.$file2;
					move_uploaded_file($_FILES['school_app_image']['tmp_name'],$trgt2.$file2); 
				 }
				 
				 
				$this->db->set($school_data);
				$this->db->where(array('id' => $id));
				$result = $this->db->update('schools');
				if($result){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						Updated Successfully</div>';
					$url = base_url().'offline_schools';
				}else{
					$status = 0;
					$url = base_url().'offline_schools/add_user';
					$msg ='<div class="alert alert-success alert-dismissible" role="alert">
						  Something went wrong, please Try Again Later</div>';
				}
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
		$res = $this->admin->schoolInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			//$q = $this->admin->update(array('is_del'=>1),$id);
			
			$array = array('is_del' => '1');
			$this->db->set($array);
			$this->db->where(array('school_id' => $id));
			$result = $this->db->update('offline_schools');
		
			if($result){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url('offline_schools');
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	
	public function downloadFile($school_id)	
	{		
	 
	$this->load->dbutil();

    $this->load->helper('file');

    $this->load->helper('download');
   
    $delimiter = ",";

    $newline = "\n";
	$enclosure = '';

	$filename = "mac_address.txt";

      $query = 'select 
					cc.mac_address as `Mac Address` 
					from offline_schools c
								inner join offline_school_mac_addresses cc on c.`school_id`=cc.`school_id`   where c.school_id ="'.$school_id.'" ';

    $result = $this->db->query($query);

	//echo $this->db->last_query();exit;
	 
    $data = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);

    force_download($filename, $data);
		

	}
	
	public function delete_school($id)
	{
		$array = array('status' => '0', 'is_del' => '1');
		$this->db->set($array);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('schools');
		if($result){
			$this->session->set_flashdata('msg','<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>');
			redirect('offline_schools', "refresh");
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible" role="alert">
				
				Something went wrong, please Try Again Later</div>');
		}
	}
	
	public function school_view(){
		$id = $this->uri->segment('3');
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		$seccount = $this->admin->get_sectionsCountBySchoolId($id)[0];
		$classcount = $this->admin->get_classCountBySchoolId($id)[0];
		$adminscount = $this->admin->get_adminscountBySchoolId($id)[0];
		$mentorscount = $this->admin->get_mentorscountBySchoolId($id)[0];
		
		$data['sectionscount'] = $seccount->seccount;
		$data['classcount'] = $classcount->class_count;
		$data['mentorscount'] = $mentorscount->schoolmentorscount;
		$data['adminscount'] = $adminscount->admins_count;
			

		$data['main_content'] = 'admin/schools/schools_dashboard';
		$this->load->view('dash_template/body', $data);
	}
	
	function ajaxPaginationSchoolsData(){
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
		$data = $this->admin->get_schools($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#schoolsList';
        $config['base_url']    = base_url().'offline_schools/ajaxPaginationSchoolsData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->get_schools($conditions);
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
				if ($value->school_status == '0'){
					$status_badge = 'bg-warning';
					$status = 'Inactive';
				}
				$mentors = $this->admin->get_school_mentor_names($value->school_id);
				
		        $html .='<tr>
							<td><a href="'. base_url('school_dashboard/'.$value->school_id) .'" ><img src="'. $value->image_path .' " height="60" width="60"  /> </a></td>
							<td><a href="'. base_url('school_dashboard/'.$value->school_id) .'" >'. $value->school_name .'</a> </td>
							<td>'.  $value->city .'</td>
							<td> '.  $mentors[0]->mentor_name .' </td>
							<td>
								<span class="badge '. $status_badge .'">'. $status  .'</span>
							</td>
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a href="'. base_url('school_dashboard/'.$value->school_id) .'" class="dropdown-item">View</a>
										<a href="'. base_url('schools/edit_school/') . $value->school_id .'" class="dropdown-item">Edit</a>
										<a  href="javascript:void(0);"  data-did="'. $value->school_id .'" data-tbl="schools" data-ctrl="schools"  class="dropdown-item text-danger delete_class">Delete</a>
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