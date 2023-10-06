
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artwork extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->comm_fun->is_not_logged_in();
	    $this->uid = $this->session->userdata('rfsparent_user_id');
		$this->name = $this->session->userdata('rfsparent_user_first_name');
		$this->school_id = $this->session->userdata('rfsparent_user_school_id');
		$this->load->model('Children_model');
		$this->load->model('Artwork_model');
		/*$this->load->library('datatblsel');*/
		date_default_timezone_set("Asia/Kolkata");
		
		$this->load->library('Ajax_pagination');
		$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
	}
	

	
	public function index(){
		$data['artworks'] =  $this->Artwork_model->getAllArtWorks($this->uid);
		$data['main_content'] = 'artwork_list';
		$this->load->view('dash_template/body',$data);
	}
	
	public function upload_artwork(){
		$childen =  $this->Children_model->getAllChildrenByParent($this->uid);
		
		if($childen['num']==1){
			$data['lesson'] = $this->Children_model->getLessonsBySec($childen['data'][0]->section_id);
		}else{
			$data['lesson'] = '';
		}
		
			
		$data['childen'] = $childen;
		$data['main_content'] = 'upload_artwork';
		$this->load->view('dash_template/body',$data);
	}
	
	public function classes_list(){
		$data['artworks'] =  $this->Children_model->getAllChildrenClasses($this->uid);
		/* echo $this->db->last_query();  */
		$data['main_content'] = 'classes_list';
		$this->load->view('dash_template/body',$data);
	}
	
	public function classportfolio(){
		/* 
		$data['artworks'] =  $this->Artwork_model->getclassArtWorks($c_id);
		$data['main_content'] = 'artwork_list';
		$this->load->view('dash_template/body',$data); */
		
		$c_id = $this->uri->segment(3);
		
		$ary =array();	
		 $ary['c_id'] = $this->uri->segment(3);
		 $ary['request_from'] = 'classportfolio';
		/*total rows count*/
		$res = $this->Artwork_model->getAllStudentArtWorks($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		/*pagination configuration*/
		$config['target']      = '#schoolsList';
		$config['base_url']    = base_url().'dashboard/ajaxPagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Artwork_model->getAllStudentArtWorks($ary);
		/* echo $this->db->last_query();  */
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['artworks'] = $posts;	
		
		
		/* $data['artworks'] =  $this->Artwork_model->getAllArtWorks($this->uid); */
		$data['childen']	 =  $this->Children_model->getAllChildrenByParent($this->uid);
		$data['academicyear']	 = $this->Children_model->get_academicMaster();
		$data['lessons'] 		= $this->Children_model->getLessonsByClass($c_id);
		/* echo $this->db->last_query(); */
		$data['main_content'] = 'dashboard';			
		$this->load->view('dash_template/body',$data);
		
	}
	
	
	
	function view(){
		$artwork_id = base64_decode(addslashes($this->uri->segment('3')));
		if($artwork_id!="" ){
			$res = $this->Artwork_model->artworkInfo($artwork_id);
			/*  echo $this->db->last_query();exit;  */
			if($res['num']==1){
				$comm = $this->Artwork_model->getcomments($artwork_id);
				 
				$data['comments'] = $comm['data'];	
				$data['artwork'] = $res['data'];
				$data['main_content'] = 'view_artwork';	
				$this->load->view('dash_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect('dashboard');
			}	
		}else{
			redirect('dashboard');
		}	
	}
	
	public function del()
	{		
	
		
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		$res = $this->Artwork_model->artworkInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('artwork');
		
			if($result){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url().'dashboard';
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	
	function create(){
		/*print_r($_POST);exit;*/
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$id = $this->uid;
		$insert_data = array();
		 if($this->input->post('section_id')=='' ){
				$msg = warning_msg('Please select section');	
		}elseif($this->input->post('base_code')=='' ){
				$msg = warning_msg('Please Upload Image');	
		}else{
			
			$section =  explode('-',$_POST['section_id']);
			$section_id = $section[0];
			
			$res = $this->Artwork_model->artworkInfoByStudentLessonId($section[1],$this->input->post('lesson_id'));
			/* echo $this->db->last_query(); */
			if($res['num']<1){
				$details = $this->Children_model->getClassIdBySectionId($section_id)[0];
				
				 $academic_year = $this->Children_model->get_academic_year()[0];
				 
				 
				$insert_data['non_xss'] = array(			
					'class_id'=>addslashes($details->c_id),
					'student_id'=>addslashes($section[1]),
					'section_id'=>addslashes($section[0]),
					'academic_year'=>$academic_year->id,
					'lesson_id'=>addslashes($this->input->post('lesson_id')),
					'comments'=>addslashes($this->input->post('comments')),
					'added_by'=>$this->uid,
				);
				
				 
				$folderPath = ".parentapp/parent/assets/artwork_uploads/";
				
				$path = "../parentapp/parent/assets/artwork_uploads/".$this->school_id."/"; 
				$desired_dire = $path; 
				
				 if(!is_dir($desired_dire)){
					mkdir("$desired_dire", 0755,true);
				}
						
						
				if ($_POST['base_code']) {
					$image_parts = explode(";base64,", $_POST['base_code']); 
					$image_type_aux = explode("image/", $image_parts[0]);
					$image_type = $image_type_aux[1];
					$image_base64 = base64_decode($image_parts[1]);
					$img=uniqid() . '.jpg'; //$image_type
					/* $file = $folderPath .$img ;
					file_put_contents($file, $image_base64); */
					
					$school_idfile = $desired_dire.$img ;
					file_put_contents($school_idfile, $image_base64);
					
					$insert_data['non_xss']['artwork_upload'] = MAIN_URL . 'parentapp/parent/assets/artwork_uploads/'.$this->school_id.'/'.$img;
				}else{
					$insert_data['non_xss'][] = '';
				}
				$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
				$q = $this->Artwork_model->insert($insert_data['xss_data']);
				$artwork_lastId = $this->db->insert_id();
					if($q){
						
						$subject='Artwork Submission Mail';	
						$html="<html>
							<body>
								<p> Dear ,<br>
								<p>Please find the below details for New Artwork uploaded
								<p><img src='".base_url().$insert_data['non_xss']['artwork_upload']."'  /></p>
							<p>Thanks & Regards ,<br> RainbowFish</p>		
							</body>
						</html>";
					
					
						$t = $this->Children_model->getTeachersBySectionId($section_id);
						/* echo $this->db->last_query(); */
						if(!empty($t)){
							//$teacher = $t[0];
							foreach($t as $teacher){
								$insertData['non_xss'] = array(			
									'notifications'=>'Artwork Uploaded',
									'notification_type'=>'new_artwork',
									'notification_root_id'=>$artwork_lastId,
									'school_id'=>$this->school_id,
									'view_link'=>'view_artwork/'.$artwork_lastId,
									'user_id'=>$teacher->user_id,
									'created_at'=>date('Y-m-d h:i:s'),
								);
								$n = $this->db->insert('notifications',$insertData['non_xss']);
								$email = $teacher->email;
								/* $e = $this->comm_fun->send_mail($email,$subject,$html); */
							}
						}
						
						/* $res = $this->Children_model->getassignedMentors($this->school_id);
						if($res['num'] >0){
							foreach($res['data'] as $r){
								$insertData['non_xss'] = array(			
								'notifications'=>'Artwork Uploaded',
								'notification_type'=>'new_artwork',
								'school_id'=>$this->school_id,
								'notification_root_id'=>$artwork_lastId,
								'view_link'=>'view_artwork/'.$artwork_lastId,
								'user_id'=>$r->id,
							);
							$n = $this->db->insert('notifications',$insertData['non_xss']);
							$email = $r->email;
							$e = $this->comm_fun->send_mail($email,$subject,$html);
							}
						} */
						
						 /*Email*/
							/* $e = $this->comm_fun->send_mail($email,$subject,$html); */
						 /*print_r($e);exit;
						 Email*/
						 
						 
						
						$status=1;
						$url=base_url('Dashboard');
						$msg = success_msg('Artwork Uploaded Successfully');	
						$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <strong>Success!</strong> Artwork Uploaded Successfully.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>');
						
					}else{
						$msg = warning_msg('Please Try Again !');	
					}
				}else{
					//$msg = warning_msg('Please Try Again !');	
					$this->session->set_userdata('student_id', $section[1]);			
					$this->session->set_userdata('lesson_id', $this->input->post('lesson_id'));			
					$this->session->set_userdata('base_code', $_POST['base_code']);			
					$this->session->set_userdata('comments', $this->input->post('comments'));			
					$status=1;
					$url=base_url('artwork/artwork_reupload');
					$msg = success_msg('Success');
				}
			 			
		}
			
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;	
		
		
	}
	
	public function artwork_reupload(){
		
		if(($this->session->userdata('base_code') == '')){
			$msg['msg'] = '<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Invalid Request</strong>
			</div>';
			redirect(base_url('dashboard'));
		}
		
		
		$student_id = $this->session->userdata('student_id');
		$lesson_id = $this->session->userdata('lesson_id');
		$data['base_code'] = $this->session->userdata('base_code');
		$sd = 	$this->Artwork_model->artworkInfoByStudentLessonId($student_id,$lesson_id);
		
		$data['art_det'] = $sd['data'];
		$data['main_content'] = 'artwork_reupload';
		$this->load->view('dash_template/body',$data);
	}
	
	public function reupload_artwork(){
		$msg['status'] = false;
		$msg['msg'] = '';
		$msg['url'] = '';
		$status = 0;
		/*print_r($_POST); exit;*/
		
		
		if (!isset($_POST['artwork_id']) || $_POST['artwork_id'] == "" || $_POST['artwork_id'] < 0) {
			$msg['msg'] = '<div class="alert alert-warning">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Invalid Request</strong>
			</div>';
		} else {
				$artwork_id = addslashes($_POST['artwork_id']);
				$update_data['non_xss'] = array(
						'comments'=>$this->session->userdata('comments'),						
						'is_del'=>0,						
				);
				
				$folderPath = "parentapp/parent/assets/artwork_uploads/";
				
				
				$path = "../parentapp/parent/assets/artwork_uploads/".$this->school_id."/"; 
				$desired_dire = $path; 
				
				 if(!is_dir($desired_dire)){
					mkdir("$desired_dire", 0755,true);
				}
				
				
				if ($_POST['base_code']) {
					$image_parts = explode(";base64,", $_POST['base_code']); 
					$image_type_aux = explode("image/", $image_parts[0]);
					$image_type = $image_type_aux[1];
					$image_base64 = base64_decode($image_parts[1]);
					$img=uniqid() . '.jpg'; //$image_type
					/* $file = $folderPath .$img ;
					file_put_contents($file, $image_base64); */
					
					$file = $desired_dire .$img ;
					file_put_contents($file, $image_base64);
					
					$update_data['non_xss']['artwork_upload'] = MAIN_URL . 'parentapp/parent/assets/artwork_uploads/'.$this->school_id.'/'.$img;
				}else{
					$update_data['non_xss'][] = '';
				}
				$update_data['xss_data'] = clean_ip($update_data['non_xss']);
				
				
				$update_data['xss_data'] = clean_ip($update_data['non_xss']);	
				$q = $this->Artwork_model->update($update_data['xss_data'],$artwork_id);	
			if ($q) {
				$this->session->set_userdata('student_id','');
				$this->session->set_userdata('lesson_id','');
				$this->session->set_userdata('base_code','');
				$this->session->set_userdata('comments',''); 
				$msg['status'] = true;
				$status = 1;
				$msg['msg'] = '<div class="alert alert-success">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>updated Successfully</strong>
						</div>';
				$msg['url']=base_url('dashboard');
			} else {
				$msg['status'] = false;
				$msg['msg'] = '<div class="alert alert-warning">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Unable to update ,please try again</strong>
						</div>';
			}
		}
     
	 
		$res = array('status'=>$status,'msg'=>$msg);
		$msg['cst']['cstn'] = $this->security->get_csrf_token_name();
		$msg['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($msg);
	}
	
	function save_feedback(){
		$status = 0;
		$msg= '';
		$url = '';
	
		
		if($this->input->post('feedback')=='' ){
			$msg = warning_msg('Please Enter Some Feedback');	
		}else{
			
			$artwork_id = $this->input->post('artwork_id');
			$teacher_id = $this->input->post('added_by');
			
			$save_data = array(
					'artwork_id'=>trim($_POST['artwork_id']),
					'from_id'=>$this->uid,
					'to_id'=>trim($teacher_id),
					'feedback'=>trim($_POST['feedback']),
				);
				
			
				$q = $this->db->insert('artwork_feedback', $save_data);
				$comment_lastId = $this->db->insert_id();
				if($q){ 
					/* $insertData['non_xss'] = array(			
						'notifications'=>'Comments posted by parent for artwork',
						'notification_type'=>'artwork_comments',
						'notification_root_id'=>$comment_lastId,
						'view_link'=>'view_artwork/'.$artwork_id,
					);
					$n = $this->db->insert('notifications',$insertData['non_xss']); */
					
					$teacher = $this->Children_model->getTeachersBySectionId($this->input->post('section_id'));
					if(!empty($teacher)){
						$insertData['non_xss'] = array(			
							'notifications'=>'Comments posted by parent for artwork',
							'notification_type'=>'artwork_comments',
							'notification_root_id'=>$_POST['artwork_id'],
							'school_id'=>$this->school_id,
							'view_link'=>'view_artwork/'.$_POST['artwork_id'],
							'user_id'=>$teacher->id,
						);
						$n = $this->db->insert('notifications',$insertData['non_xss']);
						$email = $teacher->email;
						$e = $this->comm_fun->send_mail($email,$subject,$html);
					}
					
					/* $res = $this->Children_model->getassignedMentors($this->school_id);
					if($res['num'] >0){
						foreach($res['data'] as $r){
							$insertData['non_xss'] = array(			
							'notifications'=>'Comments posted by parent for artwork',
							'notification_type'=>'artwork_comments',
							'school_id'=>$this->school_id,
							'notification_root_id'=>$artwork_lastId,
							'view_link'=>'view_artwork/'.$artwork_lastId,
							'user_id'=>$r->id,
						);
						$n = $this->db->insert('notifications',$insertData['non_xss']);
						$email = $r->email;
						$e = $this->comm_fun->send_mail($email,$subject,$html);
						}
					} */
					
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url().'artwork/view/'.$artwork_id;
					
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


}