
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mentor_monthly_mentoring extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Mentor_model");
		$this->load->model("Teacher_trial_model");
		if (!$this->session->login_session )
			redirect('mentor_login/Login');
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
		$this->load->library('datatblsel_sel');
		$this->logo = 'assets/images/rfslogo.png';
	}


	public function index(){
			
		$data['main_content'] = 'mentor_views/monthlymentoring';
		$this->load->view('school_template/body', $data);
		
	}
   
   function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$sid = $_POST['section_id'];
		
		$select = 'tm.*,concat(u.first_name ," ", u.last_name) as teacher_name,s.name as school_name';
		$column = array('name');
		$order = array('tm.id' => 'desc');
		$where=" sm.mentor_id = '$this->uid' AND tm.type = 'monthlymentoring' and tm.is_del = 0 ";
		$join = array();
		$join[] = array('table_name'=>'school_mentors as sm','on'=>'sm.school_id = tm.school_id');
		$join[] = array('table_name'=>'schools as s','on'=>'s.id=tm.school_id'); 
		$join[] = array('table_name'=>'users as u','on'=>'u.id = tm.added_by'); 
		$tb_name = 'trial_and_mentoring as tm';
		$list = $this->datatblsel_sel->get_datatables($select,$column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $limit;
		$i = 0;
		
		foreach ($list as $req) {  
			
			$no++;
			$row = array();
			
			$status = $req->status=='1'?'Active':'Inactive';
			if($req->status=='1'){
				$status = '<a class="badge badge-pill badge-cyan font-size-12">'.$status.'</a>';	
			}else{
				$status = '<a class="badge badge-pill badge-gold font-size-12">'.$status.'</a>';	
			}
			
			$feedback = $req->feedback=='1'?'Given':'Pending';
			if($req->feedback=='1'){
				$feedbackstatus = '<a class="badge badge-pill badge-cyan font-size-12">'.$feedback.'</a>';	
			}else{
				$feedbackstatus = '<a class="badge badge-pill badge-gold font-size-12">'.$feedback.'</a>';	
			}
			
			$action='<a href="'.base_url('view_monthlymentoring/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a href="'.base_url('edit_monthlymentoring/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" data-t="mentor_monthly_mentoring" data-i="'.$req->id.'" data-c="mentor_monthly_mentoring" class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></a><br>';	
			
			if($req->reference_image == ''){
				$doc= '<img src="'. base_url().$req->image1 .' " height="60" width="60" />';
			}else{
				$doc = '<a href="'. base_url().$req->reference_image .'" target=_blank>view</a>';
			}
			
			$i = $i +1;
			/* $row[] = $req->lesson_name;
			$row[] = $req->class_name; */
			
		
			/* $row[] = '<img src="'. base_url().$req->reference_image .' " height="60" width="60" />'; */
			$row[] = $req->school_name;
			$row[] = $doc;
			$row[] = date('d M Y', strtotime($req->next_review_date));
		 $row[] =  $req->stage;
			/*
			$row[] = $feedbackstatus; */
			$row[] = $action;
			$data[] = $row;
		}
		$output = array(
				"draw" => $draw,
				"recordsTotal" => $this->datatblsel_sel->count_filtered($select,$column,$order,$tb_name,$join,$where),
				"recordsFiltered" => $this->datatblsel_sel->count_filtered($select,$column,$order,$tb_name,$join,$where),
				"data" => $data,
			);
		echo json_encode($output);
	}


	function view(){
		$t_id = addslashes($this->uri->segment('2'));
		if($t_id!="" ){
			$res = $this->Teacher_trial_model->getMonthlyInfo($t_id);
			if($res['num']==1){
				$comm = $this->Teacher_trial_model->getcomments($t_id);
				
				$data['main_content'] = 'mentor_views/view_monthly_mentoring';
				$data['view_data'] = $res['data'];			
				$data['comments'] = $comm['data'];			
				$this->load->view('school_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect('mentor_monthly_mentoring');
			}	
		}else{
			redirect('mentor_monthly_mentoring');
		}	
	}
	
	public function add(){
		
		$data['schools'] =  $this->Mentor_model->getAssignedSchools()['data'];
		//$data['lessons'] =  $this->Mentor_model->getlessonName($lesson_id)['data'];
		$data['main_content'] = 'mentor_views/add_monthly_mentoring';
		$this->load->view('school_template/body',$data);
	}
	
	function create(){
		/*print_r($_POST);exit;*/
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$id = $this->uid;
		$insert_data = array();
		$school_id = $this->input->post('school_id');
		$class_id = $this->input->post('class_id');
		$lesson_id =  $this->input->post('lesson_id');
		if($this->input->post('school_id')=='' ){
			$msg = warning_msg('Please select School');	
		}else{
			$insert_data['non_xss'] = array(			
			    'school_id'=>addslashes($this->input->post('school_id')),
				'actionplan'=>stripslashes($this->input->post('actionplan')),
				'next_review_date'=>$this->input->post('next_review_date'),
				'type'=>'monthlymentoring',
				'added_by'=>$this->uid,
			);
			
			$folderPath = "uploads/trail_and_mentoring/";
			if(is_dir($folderPath)==false){
			   mkdir("$folderPath", 0777);		
			}
		
			if ($_POST['base_code1']) {
				$image_parts = explode(";base64,", $_POST['base_code1']); 
				$image_type_aux = explode("image/", $image_parts[0]);
				$image_type = $image_type_aux[1];
				$image_base64 = base64_decode($image_parts[1]);
				$img=uniqid() . '.jpg'; //$image_type
				$file = $folderPath .$img ;
				file_put_contents($file, $image_base64);
				$insert_data['non_xss']['image1'] = 'uploads/trail_and_mentoring/'.$img;
			}else{
				$insert_data['non_xss']['image1'] = '';
			}
			 
			if(isset($_FILES['refernce_doc']) && !empty($_FILES['refernce_doc']['name']))
			{
			 
				$filename = $_FILES['refernce_doc']['name'] ;
				 
				move_uploaded_file($_FILES['refernce_doc']['tmp_name'] ,'uploads/trail_and_mentoring/'.$filename);
				$insert_data['non_xss']['reference_image']='uploads/trail_and_mentoring/'.$filename;
			 
			}else{
				$insert_data['non_xss']['reference_image'] = '';
			}
		
			
			/* if ($_POST['base_code2']) {
				$image_parts = explode(";base64,", $_POST['base_code2']); 
				$image_type_aux = explode("image/", $image_parts[0]);
				$image_type = $image_type_aux[1];
				$image_base64 = base64_decode($image_parts[1]);
				$img=uniqid() . '.jpg'; //$image_type
				$file = $folderPath .$img ;
				file_put_contents($file, $image_base64);
				$insert_data['non_xss']['reference_image'] = 'uploads/trail_and_mentoring/'.$img;
			}else{
				$insert_data['non_xss']['reference_image'] = '';
			}
			
			
			if ($_POST['base_code3']) {
				$insert_data['non_xss']['image3'] = $this->image_upload($_POST['base_code3']);
			}else{
				$insert_data['non_xss']['image3'] = '';
			}
			
			if ($_POST['base_code4']) {
				$insert_data['non_xss']['image4'] = $this->image_upload($_POST['base_code4']);
			}else{
				$insert_data['non_xss']['image4'] = '';
			}
			
			if ($_POST['base_code5']) {
				$insert_data['non_xss']['image5'] = $this->image_upload($_POST['base_code5']);
			}else{
				$insert_data['non_xss']['image5'] = '';
			}
			if ($_POST['base_code6']) {
				$insert_data['non_xss']['image2'] = $this->image_upload($_POST['base_code6']);
			}else{
				$insert_data['non_xss']['image2'] = '';
			} */
			
			
			$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
			$q = $this->Mentor_model->insert($insert_data['xss_data']);
				if($q){
					$status=1;
					$url=base_url('mentor_monthly_mentoring');
					$msg = success_msg('Monthly Mentoring Uploaded Successfully');	
					$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> Teacher Trial Uploaded Successfully.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>');

				}else{
					$msg = warning_msg('Please Try Again !');	
				}
			 			
		}
			
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
		
		
	}
	
	
	function image_upload($base_code){
		$folderPath = "uploads/trail_and_mentoring/";
		if(is_dir($folderPath)==false){
		   mkdir("$folderPath", 0777);		
		}
		$image_parts = explode(";base64,", $base_code); 
		$image_type_aux = explode("image/", $image_parts[0]);
		$image_type = $image_type_aux[1];
		$image_base64 = base64_decode($image_parts[1]);
		$img=uniqid() . '.jpg'; //$image_type
		$file = $folderPath .$img ;
		file_put_contents($file, $image_base64);
		return 'uploads/trail_and_mentoring/'.$img;
	}
	
	public function edit(){
		
		$t_id = $this->uri->segment(2);
		
		$res = $this->Teacher_trial_model->getMonthlyInfo($t_id)['data'];
		 
		$schools =  $this->Mentor_model->getAssignedSchools()['data'];
		
		/* $data['classes'] =  $this->Mentor_model->getClassesBySchool($res['school_id'])['data'];
		$data['lessons'] =  $this->Mentor_model->getLessonsByclass($res['class_id'])['data']; */
		
		$data['schools'] = $schools;
		$data['view_data'] = $res;	
		$data['main_content'] = 'mentor_views/edit_monthly_mentoring';
		$this->load->view('school_template/body',$data);
	}
	
	function update(){
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$id = $this->uid;
		$insert_data = array();
		$trail_id = $this->input->post('trail_id');
		$school_id = $this->input->post('school_id');
		$class_id = $this->input->post('class_id');
		$lesson_id =  $this->input->post('lesson_id');
		
		
		 /* if($this->input->post('class_id')=='' ){
				$msg = warning_msg('Please select Class');	
		}else */if($this->input->post('school_id')=='' ){
				$msg = warning_msg('Please select School');	
		}/* elseif($this->input->post('lesson_id')=='' ){
				$msg = warning_msg('Please select Lesson');	
		} */else{
			$insert_data['non_xss'] = array(			
			    'school_id'=>addslashes($this->input->post('school_id')),
			    'class_id'=>addslashes($this->input->post('class_id')),
				'lesson_id'=>addslashes($this->input->post('lesson_id')),
				'actionplan'=>stripslashes($this->input->post('actionplan')),
				'next_review_date'=>$this->input->post('next_review_date'),
				'type'=>'monthlymentoring',
				'added_by'=>$this->uid,
			);
			
			$folderPath = "uploads/trail_and_mentoring/";
			if(is_dir($folderPath)==false){
			   mkdir("$folderPath", 0777);		
			}
		
			if ($_POST['base_code1'] && isset($_POST['base_code1'])) {
				$image_parts = explode(";base64,", $_POST['base_code1']); 
				$image_type_aux = explode("image/", $image_parts[0]);
				$image_type = $image_type_aux[1];
				$image_base64 = base64_decode($image_parts[1]);
				$img=uniqid() . '.jpg'; //$image_type
				$file = $folderPath .$img ;
				file_put_contents($file, $image_base64);
				$insert_data['non_xss']['image1'] = 'uploads/trail_and_mentoring/'.$img;
			}
			
			/* if ($_POST['base_code2'] && $_POST['base_code2'] !='' ) {
				$image_parts = explode(";base64,", $_POST['base_code2']); 
				$image_type_aux = explode("image/", $image_parts[0]);
				$image_type = $image_type_aux[1];
				$image_base64 = base64_decode($image_parts[1]);
				$img=uniqid() . '.jpg'; //$image_type
				$file = $folderPath .$img ;
				file_put_contents($file, $image_base64);
				$insert_data['non_xss']['reference_image'] = 'uploads/trail_and_mentoring/'.$img;
			} */
			
			if(isset($_FILES['refernce_doc']) && !empty($_FILES['refernce_doc']['name']))
			{
				$filename = $_FILES['refernce_doc']['name'] ;
				 move_uploaded_file($_FILES['refernce_doc']['tmp_name'] ,'uploads/trail_and_mentoring/'.$filename);
				$insert_data['non_xss']['reference_image']='uploads/trail_and_mentoring/'.$filename;
			}else{
				$insert_data['non_xss']['reference_image'] = '';
			}
			
			
			$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
			
			
			
			$q = $this->Mentor_model->update($insert_data['xss_data'],$trail_id);
				if($q){
					$status=1;
					$url=base_url('mentor_monthly_mentoring');
					$msg = success_msg('Updated Successfully');	
					$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> Updated Successfully.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>');

				}else{
					$msg = warning_msg('Please Try Again !');	
				}
			 			
		}
			
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
		
	}
	
	
	
	function del(){
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$res = $this->Teacher_trial_model->getInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$q = $this->Teacher_trial_model->update(array('is_del'=>1),$id);
			if($q){
				$msg = success_msg('Teacher Trial deleted successfully');
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url($this->url_slug.'/teacher_trial');
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);		
	}
	
	public function save_feedback()
	{
		$status = 0;
		$msg= '';
		$url = '';
	
		
		if($this->input->post('feedback')=='' ){
			$msg = warning_msg('Please Enter Some Feedback');	
		}else{
			
			$feedbackReceivedfrom = $this->input->post('receivedfrom');
			$trail_id = $this->input->post('trail_id');
			$teacher_id = $this->input->post('teacher_id');
			
			$save_data = array(
					'trial_and_mentoring_id'=>trim($_POST['trail_id']),
					'from_id'=>$this->uid,
					'to_id'=>trim($teacher_id),
					'comments'=>trim($_POST['feedback']),
				);
				
			
				$q = $this->db->insert('comments', $save_data);
				if($q){
					
					$this->db->set(array('feedback' => '1'));
					$this->db->where(array('id' => $trail_id));
					$result = $this->db->update('trial_and_mentoring');
					
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
						  
					$url = ($feedbackReceivedfrom == 'Trails') ? base_url().'view_mentor_trial/'.$trail_id : base_url().'view_continuous_mentoring/'.$trail_id;
					
				}else{
					$status = 0;
					$msg = '<div class="alert alert-warning alert-dismissible" role="alert">
					Something went wrong, please Try Again Later</div>';
				}
				
			}
	
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
	}


	function ajGetClasses(){
		 if(isset($_POST['school_id']) && $_POST['school_id']!=""){
			$school_id = addslashes($_POST['school_id']);
			$res = $this->Mentor_model->getClassesBySchool($school_id);
			//print_r($res);exit;
				echo "<option value=''>Select Class</option>";	
			if($res['num']>0){
				foreach($res['data'] as $r){
					
					echo "<option value='$r->c_id'>$r->class_name</option>";	
				}	
				
			}
			 
		 }
	 }
	function ajGetLessons(){
		 if(isset($_POST['class_id']) && $_POST['class_id']!=""){
			$class_id = addslashes($_POST['class_id']);
			$res = $this->Mentor_model->getLessonsByclass($class_id);
			//print_r($res);exit;
				echo "<option value=''>Select Lesson</option>";	
			if($res['num']>0){
				foreach($res['data'] as $r){
					
					echo "<option value='$r->lesson_id'>$r->lesson_name</option>";	
				}	
				
			}
			 
		 }
	 }

	 
}