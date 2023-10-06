
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Students extends CI_Controller
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
		$this->load->library('bcrypt');
		$this->user_id = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}else {
			$this->logo = 'assets/images/rfslogo.png';
		}
	}

	public function index()
	{
		$ary =array();	
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
	   	$ary['school_id'] = $id;
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
	   	$data['academicyear'] = $this->admin->get_academicMaster();
		/*total rows count*/
		$res = $this->admin->get_students($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		/*pagination configuration*/
		$config['target']      = '#schoolsList';
		$config['base_url']    = base_url().'students/ajaxPaginationstudentsData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_students($ary);
		/* echo $this->db->last_query(); */
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['students'] = $posts;	
		 $data['academic_year'] = $this->admin->get_academic_year()[0];
		 
		if((isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !='')  ){	
			$data['main_content'] = 'admin/students/index';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/students/index';
			$this->load->view('dash_template/body', $data);
		}
	}
	public function add_students($id =null)
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");	  
		$school_id = $id;
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['classes'] = $this->admin->get_classesBySchoolID($id);
		$data['main_content'] = 'admin/students/add_students';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
	}
	function getSections(){
		$res = array('sections_optns'=>'');
		$sections_optns='';	
		if(isset($_POST['class_id']) && $_POST['class_id']!=''){
			$class_id = addslashes($_POST['class_id']);		
			$sections = $this->admin->get_sectionsByClassID($class_id);
			$sections_optns.='<option value="">Select Section</option>';
			if($sections['num']>0){
				foreach($sections['data'] as $c){
					$sections_optns.='<option value="'.$c['section_id'].'">'.$c['section_name'].'</option>';
				}
			}
			$res = array('sections_optns'=>$sections_optns);
		}
		echo json_encode($res);
	}
	
	function ajGetClasses(){
		 if(isset($_POST['class_id']) && $_POST['class_id']!=""){
			$class_id = addslashes($_POST['class_id']);
			$res = $this->admin->get_sectionsByClassID($class_id);
			/* print_r($res);exit; */
				echo "<option value=''>Select Class</option>";	
			if($res['num']>0){
				foreach($res['data'] as $c){
					
					echo "<option value='".$c['section_id']."'>".$c['section_name']."</option>";	
				}	
			}
		 }
	 }
	 function ajGetSectionStudents(){
		 if(isset($_POST['section_id']) && $_POST['section_id']!=""){
			$section_id = addslashes($_POST['section_id']);
			$res = $this->admin->get_StudentsBySectionID($section_id);
			/* echo $this->db->last_query();
			print_r($res);exit; */
				echo "<option value=''>Select Student</option>";	
			if($res['num']>0){
				foreach($res['data'] as $c){
					
					echo "<option value='".$c['student_id']."'>".$c['full_name']."</option>";	
				}	
			}
		 }
	 }
	 
	 
	 
	function getstudentsByAdmissionNumber(){
		$res = '';
		if(isset($_POST['admission_number']) && $_POST['admission_number']!=''){
			$admission_number = addslashes($_POST['admission_number']);		
			$school_id = addslashes($_POST['school_id']);		
			$sections = $this->admin->getstudentsByAdmissionNumber($admission_number,$school_id);
			if($sections['num']>0){
				$res = $sections['data'];
			}
		}
		echo json_encode($res);
	}
	
	
	function getparentsByemailID(){
		$res = '';
		if(isset($_POST['email']) && $_POST['email']!=''){
			$email = addslashes($_POST['email']);		
			$school_id = addslashes($_POST['school_id']);		
			$sections = $this->admin->getparentsByemailID($email,$school_id);
			if($sections['num']>0){
				$res = $sections['data'];
			}
		}
		echo json_encode($res);
	}
	public function save_student()
	{
		$school_data = array();
		$status = 0;
		$msg= '';
		$url = '';
		$parent_lastId = '';
		$id = (isset($_SESSION['login_session']['school_id'])) ? $_POST['school_id'] : '';
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/students' :  'students/'.$_POST["school_id"];
		
		/* if($this->input->post('parentfirst_name')=='' ){
			$msg = warning_msg('Please  Enter PArents First Name');	
		}else if($this->input->post('parentlast_name')=='' ){
			$msg = warning_msg('Please  Enter Parent First Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please  Enter Email');	
		}else if($this->input->post('password')=='' ){
			$msg = warning_msg('Please Enter Password');	
		}else if($this->input->post('dob')=='' ){
			$msg = warning_msg('Please Enter DOB');	
		}		*/
		
		if($this->input->post('academic_year')=='' ){
			$msg = warning_msg('Please Select Academic Year');	
		}else if($this->input->post('admission_number')=='' ){
			$msg = warning_msg('Please Enter Admission Number');	
		}else if($this->input->post('class_id')=='' ){
			$msg = warning_msg('Please Select Class');	
		}else if($this->input->post('section_id')=='' ){
			$msg = warning_msg('Please Select Section');	
		}else if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter First Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Last Name');	
		}else if($this->input->post('gender')=='' ){
			$msg = warning_msg('Please Enter Gender');	
		} else{	
			 
			//$password=$this->input->post('password');
			$hash = $this->bcrypt->hash_password('welcome1');
				
			$save_data = array(
				'first_name'=>trim(ucwords($_POST['parentfirst_name'])),
				'last_name'=>trim(ucwords($_POST['parentlast_name'])),
				'email'=>trim($_POST['email']),
				'phone'=>trim($_POST['phone']),
				'school_id'=>trim($_POST['school_id']),
				'role_id'=>8,
				'added_by'=>$this->user_id,
				'password'=>$hash
			);
			
			if($_POST['email'] !=''){
				$emaildata = $this->admin->check_getdata_if_email_exists($_POST['email']);
				if ($emaildata['num'] == 0) {			
				$q = $this->db->insert('users', $save_data);		
				$parent_lastId = $this->db->insert_id();
				}else{
					$parent_lastId = $emaildata['data']->id;
				}			}else{				
				$parent_lastId = '';		
				}
				
				$students_data = array(
					'admission_number'=>addslashes($this->input->post('admission_number')),
					'parent_id'=>$parent_lastId,
					'school_id'=>addslashes($this->input->post('school_id')),
					'first_name'=>addslashes(ucwords($this->input->post('first_name'))),
					'last_name'=>addslashes(ucwords($this->input->post('last_name'))),
					'gender'=>addslashes($this->input->post('gender')),
					'added_by'=>$this->user_id,
				);
				
					if(isset($_FILES['student_image']) && !empty($_FILES) && $_FILES['student_image']['name']!=""){		
					$trgt1='uploads/student_image/';
					$size1 = $_FILES['student_image']['size'];
					$file_name1 = $_FILES['student_image']['name'];
					$path_parts1=pathinfo($_FILES['student_image']['name']);
					$file1 = time().'.'.$path_parts1['extension'];
					$students_data['photo']=base_url().$trgt1.$file1;
					move_uploaded_file($_FILES['student_image']['tmp_name'],$trgt1.$file1); 
				 }else{
				     	$students_data['photo']=base_url().'assets/images/user.png';
				 }	
			 
				
				$if_exists = $this->admin->check_if_admission_number_exists($_POST['admission_number'],$this->input->post('school_id'));
				//echo $this->db->last_query();
				if ($if_exists == 0) {
					$result = $this->db->insert('students', $students_data);
					$student_lastId = $this->db->insert_id();
					
					$academic_data = array(
						'sd_academic_year'=>addslashes($this->input->post('academic_year')),
						'sd_school_id'=>addslashes($this->input->post('school_id')),
						'sd_class_id'=>addslashes($this->input->post('class_id')),
						'sd_section_id'=>addslashes($this->input->post('section_id')),
						'sd_student_id'=>$student_lastId,
						'added_by'=>$this->user_id,
						);
					
					$result2 = $this->db->insert('student_academic_details', $academic_data);
					if($result){
						
						$status = 1;
						$msg ='<div class="alert alert-success">  <strong>Added Successfully</strong></div>';
						$url= base_url().$rid;
					}else{
						$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
							Something went wrong, please Try Again Later</div>';
							//redirect('students/add_students/'.$rid );
					}	
				}else{
						$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
							Admission Id already exists</div>';
					}	
			
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}

	public function edit_students($id)	{
		
		$schooldata = $this->admin->get_studentsByID($id)[0];
		
		$data['schools'] = $this->admin->get_schoolsByID($schooldata->school_id)[0];
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['classes'] = $this->admin->get_classesBySchoolID($schooldata->school_id);
		$sections= $this->admin->get_sectionsByClassID($schooldata->sd_class_id);
		$data['sections'] = $sections['data'];
		$data['school_data'] = $schooldata;
		$data['main_content'] = 'admin/students/edit_students';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	public function update_student()
	{		
		$school_data = array();
		$status = 0;
		$msg= '';
		$url = '';
		
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/students' :  'students/'.$_POST["school_id"];
		
		/* else if($this->input->post('parentfirst_name')=='' ){
			$msg = warning_msg('Please  Enter PArents First Name');	
		}else if($this->input->post('parentlast_name')=='' ){
			$msg = warning_msg('Please  Enter Parent First Name');	
		}else if($this->input->post('email')=='' ){
			$msg = warning_msg('Please  Enter Email');	
		}else if($this->input->post('dob')=='' ){
			$msg = warning_msg('Please Enter DOB');	
		}
		 */
		 
		if($this->input->post('academic_year')=='' ){
			$msg = warning_msg('Please Select Academic Year');	
		}else if($this->input->post('admission_number')=='' ){
			$msg = warning_msg('Please Enter Admission Number');	
		}else if($this->input->post('class_id')=='' ){
			$msg = warning_msg('Please Select Class');	
		}else if($this->input->post('section_id')=='' ){
			$msg = warning_msg('Please Select Section');	
		}else if($this->input->post('first_name')=='' ){
			$msg = warning_msg('Please Enter First Name');	
		}else if($this->input->post('last_name')=='' ){
			$msg = warning_msg('Please Enter Last Name');	
		}else if($this->input->post('gender')=='' ){
			$msg = warning_msg('Please Enter Gender');	
		}else{
		
			$save_data = array(
				'first_name'=>trim(ucwords($_POST['parentfirst_name'])),
				'last_name'=>trim(ucwords($_POST['parentlast_name'])),
				'email'=>trim($_POST['email']),
				'phone'=>trim($_POST['phone']),
				'school_id'=>trim($_POST['school_id'])
			);
			$this->db->set($save_data);
			$this->db->where(array('id' => $this->input->post('parent_id')));
			$result = $this->db->update('users');
			
			$student_data = array(
				'academic_year'=>addslashes($this->input->post('academic_year')),
				'school_id'=>addslashes($this->input->post('school_id')),
				'admission_number'=>addslashes($this->input->post('admission_number')),
				'class_id'=>addslashes($this->input->post('class_id')),
				'section_id'=>addslashes($this->input->post('section_id')),
				'first_name'=>addslashes(ucwords($this->input->post('first_name'))),
				'last_name'=>addslashes(ucwords($this->input->post('last_name'))),
				'gender'=>addslashes($this->input->post('gender')),
				);
					
			if(isset($_FILES['student_image']) && !empty($_FILES) && $_FILES['student_image']['name']!=""){		
				$trgt1='uploads/student_image/';
				$size1 = $_FILES['student_image']['size'];
				$file_name1 = $_FILES['student_image']['name'];
				$path_parts1=pathinfo($_FILES['student_image']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$student_data['photo']=$trgt1.$file1;
				move_uploaded_file($_FILES['student_image']['tmp_name'],$trgt1.$file1); 
			 }					
						
			$this->db->set($student_data);
			$this->db->where(array('student_id' => $this->input->post('student_id')));
			$result2 = $this->db->update('students');
			
			
			
			if($result2){
				$status= 1;
				$msg = '<div class="alert alert-success"> <strong>Updated Successfully</strong></div>';
				$url= base_url().$rid;
			}else{
				
				$msg = '<div class="alert alert-danger alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
			}
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
		
	}
	
	public function delete_students($sid,$id)
	{
		
		$rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $sid;
		
		$array = array('status' => '0','is_del'=>'1');
		$this->db->set($array);
		$this->db->where(array('student_id' => $id));
		$result = $this->db->update('students');
		
		if($result){
			$this->session->set_flashdata('msg','<div class="alert alert-warning">
				
				  <strong>Deleted Successfully</strong></div>');
			redirect('students/'.$rid, "refresh");
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert">
				
				Something went wrong, please Try Again Later</div>');
		}
	}
	
	public function del()
	{		
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $this->input->post('sid'); */
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/students' :  'students/'.$_POST["sid"];
		
		$id = addslashes($this->input->post('i'));
		$res = $this->admin->studentInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			//$q = $this->teachers_model->update(array('is_del'=>1),$id);
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('student_id' => $id));
			$q = $this->db->update('students');
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
	
	public function view_student(){
		$id = $this->uri->segment('3');
		
		$students = $this->admin->get_studentsByID($id)[0];
		
		if(isset($students->parent_id)  && $students->parent_id!= '0'){
			$data['parents'] = $this->admin->get_parentsByStudentId($students->parent_id);
		}
		
		
		$data['students'] = $students;

		$data['main_content'] = 'admin/students/students_view';
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
	}
	
	public function import($id =null)
	{
		/* $id = ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");	 */

		$id = (isset($_SESSION['login_session']['school_id'])) ? $_SESSION["login_session"]["school_id"] :  $this->uri->segment("3");	
		
		$school_id = $id;
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['classes'] = $this->admin->get_classesBySchoolID($id);
		
		$data['main_content'] = 'admin/students/import';
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
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  '/'.$this->input->post('school_id'); */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/students' :  'students/'.$_POST["school_id"];
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
				 
				 $getclass = $this->admin->getclassIdByName(trim($importdata[0]),$this->input->post('school_id'));
				 
				 
				 $class_id =  $getclass['c_id'];
				 
				 $getsection = $this->admin->getSectionIdByName(trim($importdata[1]),$class_id );
				 $section_id =  $getsection['section_id'];
				 
				if($class_id  != 0){
					
				
				  $save_data = array(
					'first_name'=>trim(ucwords($importdata[6])),
					'last_name'=>trim(ucwords($importdata[7])),
					'email'=>trim($importdata[8]),
					'phone'=>trim($importdata[9]),
					'school_id'=>trim($_POST['school_id']),
					'role_id'=>8,
					'password'=>$hash
				);
				
				/* $if_emailexists = $this->admin->check_if_email_exists($importdata[6]);	 */
				if($importdata[8] !=''){			
				$emaildata = $this->admin->check_getdata_if_email_exists($importdata[8]);		
				if ($emaildata['num'] == 0) {		
				$q = $this->db->insert('users', $save_data);	
				$parent_lastId = $this->db->insert_id();	
				}else{				
				$parent_lastId = $emaildata['data']->id;	
				}		
				}else{	
				$parent_lastId = '';		
				}				
					$school_data = array(
						'parent_id'=>$parent_lastId,
						'admission_number'=>addslashes($importdata[2]),
						'first_name'=>addslashes(ucwords($importdata[3])),
						'last_name'=>addslashes(ucwords($importdata[4])),
						'gender'=>addslashes($importdata[5]),					
						'school_id'=>addslashes($this->input->post('school_id')),
					);
					$if_exists = $this->admin->check_if_admission_number_exists($importdata[2],$this->input->post('school_id'));
					
					if ($if_exists == 0) {
						$result = $this->db->insert('students', $school_data);
						$student_lastId = $this->db->insert_id();
						if($result){
							
							$academic_data = array(
							'sd_academic_year'=>addslashes($this->input->post('academic_year')),
							'sd_school_id'=>addslashes($this->input->post('school_id')),
							'sd_class_id'=>addslashes($class_id),
							'sd_section_id'=>addslashes($section_id),
							'sd_student_id'=>$student_lastId,
							'added_by'=>$this->user_id,
							);
						
							$result2 = $this->db->insert('student_academic_details', $academic_data);
						}
					}else{				
					$status = 1;	
					$msg = '<div class="alert alert-success">  <strong>'.$importdata[2].' Exist Admission ID</strong></div>';			
					}
				}
			 }			 
			 $status = 1;
			 $msg = '<div class="alert alert-success">  <strong> Uploaded Successfully</strong></div>';
			 /* $url = base_url().'students/import'.$rid; */
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
	
	
	function ajaxPaginationstudentsData(){
		
		
		
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
        $conditions['academic_year'] = $this->input->post('academic_year');
        $conditions['status'] = $this->input->post('status');
        //total rows count
		$data = $this->admin->get_students($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#schoolsList';
        $config['base_url']    = base_url().'students/ajaxPaginationstudentsData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->get_students($conditions);
		$data['query'] = $this->db->last_query(); 
		
		/* echo $this->db->last_query(); */
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$academic_year = $this->admin->get_academic_year()[0];
		
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
		        $html .='
							<tr>
								<td><img src="'. $value->image_path .' " height="60" width="60" /> </td>
                               
                                <td>'. $value->admission_number .' </td>
                               
							    <td>'. $value->first_name.' '. $value->last_name .' </td>
								<td>'. $value->class_name .'</td> 
								<td>'. $value->section_name .' </td>
								<td>
                                    <span class="badge '. $status_badge .'">'.$status.'</span>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                          
                                            <a href="'. base_url('students/view_student/') . $value->student_id .'" class="dropdown-item">View</a>';
											
											/* if($_SESSION['login_session']['role_id']!= '5'){ */
											
												$html .= '<a href="'. base_url('students/edit_students/') . $value->student_id .'" class="dropdown-item">Edit</a>
												
												<a href="javascript:void(0);"  data-did="'. $value->student_id .'" data-sid = "'. $value->school_id .'" data-tbl="students" data-ctrl="students"  class="dropdown-item text-danger delete_class">Delete</a>';
											/* } */
											$html .='
											
											</div>
									 </div>
                                </td>
							</tr>';
		
			}
		}else{
			$html .="No Records to display";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	
	
	
	
}