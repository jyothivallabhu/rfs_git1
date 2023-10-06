
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Feedback_management extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Feedback_management_model");
		$this->load->model("Teacher_trial_model");
		$this->load->model("Teachers_artwork_model");
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->url_slug = $_SESSION['login_session']['url_slug'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}
	}

	public function artwork()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		 $ary =array();	
	   	   
		    $ary['school_id'] = $id;
			
		/*total rows count*/
		$res = $this->Feedback_management_model->getSchoolArtwork($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#lessonsList';
		$config['base_url']    = base_url().'feedback_management/artworkajaxPagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Feedback_management_model->getSchoolArtwork($ary);
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;

		

		$data['classes'] = $this->admin->get_allactiveclasses($id);
		$data['lessons'] = $this->Feedback_management_model->getAllLessonsassigned($id); 
		
		$data['main_content'] = 'admin/feedback_management/artwork_list';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
	}
	
	function artworkajaxPagination(){
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
        $conditions['school_id'] = $this->input->post('school_id');
        $conditions['class_id'] = $this->input->post('class_id');
        $conditions['lesson_id'] = $this->input->post('lesson_id');
		
        //total rows count
		$data = $this->Feedback_management_model->getSchoolArtwork($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'feedback_management/artworkajaxPagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$lessons = $this->Feedback_management_model->getSchoolArtwork($conditions);
		$data['query'] = $this->db->last_query(); 
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($lessons)){
			foreach($lessons as  $req){
				
		        $html .='<tr>
							<td>'.$req->student_name.'</td>
							<td>'. $req->class_name.'</td>
							<td>'.$req->lesson_name .'</td>
							<td><img src="'. $req->artwork_upload .' " height="60" width="60" /></td>
							
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a href="'.base_url($_SESSION["login_session"]["url_slug"].'/section_artwork/'.$req->id).'" class="dropdown-item">View</a>';
										/* if($_SESSION['login_session']['role_id']!= '5'){ */
										 $html .='<a href="javascript:void(0);"  data-did="'. $req->id .'"  data-sid="'. $req->school_id .'"  data-tbl="feedback_management" data-ctrl="feedback_management"  class="dropdown-item text-danger delete_class">Delete</a>';
										/* } */
									  $html .='</div>
									 
									 
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
	
	public function del()
	{		
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		/* $res = $this->user->userInfo($id); */
		$res = $this->Teachers_artwork_model->getArtWorksByID($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			/* $q = $this->Teachers_artwork_model->update_artwork(array('is_del'=>1),$id); */
			$array = array('is_del' => '1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('artwork');
			if($result){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url('artwork_feedback/'.$sid);
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	
	
	public function trial_and_mentoring()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$uri_segment = $this->uri->segment("2");
		}else{
			$uri_segment = $this->uri->segment("1");
		}
		
		if($uri_segment == 'trail_feedback'){
			$type = 'trail';
			$data['page_title'] = 'Trial  Feedback';
		}elseif($uri_segment == 'mentoring_feedback'){
			$type = 'mentoring';
			$data['page_title'] = 'Mentoring';
		}elseif($uri_segment == 'monthlymentoring'){
			$type = 'monthlymentoring';
			$data['page_title'] = 'Monthly Mentoring';
		}
		
		 $ary =array();	
	   	   
		    $ary['school_id'] = $id;
		    $ary['type'] = $type;
			
		/*total rows count*/
		$res = $this->Feedback_management_model->trial_and_mentoring($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#lessonsList';
		$config['base_url']    = base_url().'feedback_management/trial_and_mentoringajaxPagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Feedback_management_model->trial_and_mentoring($ary);
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	

		$data['classes'] = $this->admin->get_allactiveclasses($id);
		$data['lessons'] = $this->Feedback_management_model->getAllLessonsassigned($id); 
		
		$data['main_content'] = 'admin/feedback_management/trial_and_mentoring_list';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
	}
	
	function trial_and_mentoringajaxPagination(){
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
        $conditions['school_id'] = $this->input->post('school_id');
        $conditions['class_id'] = $this->input->post('class_id');
        $conditions['lesson_id'] = $this->input->post('lesson_id');
        $conditions['type'] = $this->input->post('feedbacktype');
		
        //total rows count
		$data = $this->Feedback_management_model->trial_and_mentoring($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'feedback_management/trial_and_mentoringajaxPagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$lessons = $this->Feedback_management_model->trial_and_mentoring($conditions);
		$data['query'] = $this->db->last_query(); 
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($lessons)){
			foreach($lessons as  $req){
				
		        $html .='<tr>
							<td>'.$req->teacher_name.'</td>
							<td>'. $req->class_name.'</td>
							<td>'.$req->lesson_name .'</td>
							<td><img src="'. $req->image_path .' " height="60" width="60" /></td>
							
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a href="'.base_url($_SESSION["login_session"]["url_slug"].'/view_trial_and_mentoring/'.$req->id).'" class="dropdown-item">View</a>';
										
										/* if($_SESSION['login_session']['role_id']!= '5'){ */
										 $html .='<a href="javascript:void(0);"  data-did="'.$req->id .'" data-sid="'. $req->school_id .'"  data-tbl="feedback_management" data-ctrl="feedback_management" data-rid="'. $this->uri->segment("1").'"  class="dropdown-item text-danger cust_delete_class">Delete</a>';
										/* } */
										
										
									 $html .=' </div>
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
	
	
	function view(){
		/* $t_id = addslashes($this->uri->segment('2')); */
		
		$t_id = (isset($_SESSION['login_session']['school_id'])) ? addslashes($this->uri->segment('3')) : addslashes($this->uri->segment('2'));
		
		if($t_id!="" ){
			
			$res = $this->Teacher_trial_model->getInfo($t_id);
			if($res['num']==1){
				if($res['data']['type'] == 'trail'){
					$type = 'trail';
					$data['page_title'] = 'Trial Feedback';
				}elseif($res['data']['type'] == 'mentoring'){
					$type = 'mentoring';
					$data['page_title'] = 'Mentoring';
				}elseif($res['data']['type'] == 'monthlymentoring'){
					$type = 'monthlymentoring';
					$data['page_title'] = 'Monthly Mentoring';
				}elseif($this->uri->segment("1") == 'section_artwork'){
					$type = 'monthlymentoring';
					$data['page_title'] = 'View Artwork';
				}
				
				$comm = $this->Teacher_trial_model->getcomments($t_id);
				
				$data['main_content'] = 'admin/feedback_management/view';
				$data['view_data'] = $res['data'];			
				$data['comments'] = $comm['data'];
				
				if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
					$this->load->view('school_template/body', $data);
				}else{
					$this->load->view('dash_template/body', $data);
				}
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				//redirect($this->url_slug.'/teacher_trial');
			}	
		}else{
			//redirect($this->url_slug.'/teacher_trial');
		}	
	}
	
	public function view_artwork(){
	
		/* $artwork_id = addslashes($this->uri->segment('2')); */
		
		$artwork_id = (isset($_SESSION['login_session']['school_id'])) ? addslashes($this->uri->segment('3')) : addslashes($this->uri->segment('2'));
		
		if($artwork_id!="" ){
			$res = $this->Teachers_artwork_model->getArtWorksByID($artwork_id);
			/* echo $this->db->last_query();exit; */
			if($res['num']==1){
				$comm = $this->Teachers_artwork_model->getcomments($artwork_id);
				
				/* echo $this->db->last_query();exit; */
				
				$data['comments'] = $comm['data'];	
				$data['artworks'] = $res['data'];
				$data['section_id'] = $this->uri->segment(3);
				$data['main_content'] = 'admin/feedback_management/view_artwork';
				/* $this->load->view('school_template/body',$data); */
				if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
					$this->load->view('school_template/body', $data);
				}else{
					$this->load->view('dash_template/body', $data);
				}
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect('artwork_feedback/'.$this->school_id);
			}	
		}else{
			redirect('artwork_feedback/'.$this->school_id);
		}
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
					
					/* $this->db->set(array('feedback' => '1'));
					$this->db->where(array('id' => $trail_id));
					$result = $this->db->update('trial_and_mentoring');
					 */
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
						  /* base_url($this->url_slug.'/teacher_trial') */
						  
						  
						  /* ($feedbackReceivedfrom == 'Trails') ? base_url().$this->url_slug.'/view_teacher_trial/'.$trail_id : base_url().$this->url_slug.'/view_mentoring/'.$trail_id */
						 /*  if(($feedbackReceivedfrom == 'Trails')){
							  $redirect_page = 'view_trial_and_mentoring';
						  }elseif(($feedbackReceivedfrom == 'Mentoring')){
							  $redirect_page = '';
						  }else{
							  $redirect_page = '';
						  } */
						  
						  
						  
					$url = base_url().$this->url_slug.'/view_trial_and_mentoring/'.$trail_id;
					
					
					
					
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
	
	function save_artworkfeedback(){
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
					
					
					$teacher = $this->admin->userInfo($teacher_id);
					if(!empty($teacher)){
						$insertData['non_xss'] = array(			
							'notifications'=>'Comments posted by parent for artwork',
							'notification_type'=>'artwork_comments',
							'notification_root_id'=>$artwork_id,
							'school_id'=>$this->school_id,
							'view_link'=>'view_artwork/'.$artwork_id,
							'user_id'=>$teacher['data']['id'],
						);
						$n = $this->db->insert('notifications',$insertData['non_xss']);
						$email = $teacher['data']['email'];
						
						$subject='RainbowFish -  Artwork Feedback';	
						$html="<html>
							<body>
								<p> Dear ".$teacher['data']['first_name'].",<br>
								<p> Feedback: ".$_POST['feedback']."</a><br><br>
							<p>Thanks & Regards ,<br> RainbowFish</p>		
							</body>
						</html>";
						$e = $this->comm_fun->send_mail($email,$subject,$html);
					}
					
					
					
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url().$this->url_slug.'/section_artwork/'.$artwork_id;
					
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
	
	public function deltrial()
	{		
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		$rid = addslashes($this->input->post('rid'));
		/* $res = $this->user->userInfo($id); */
		$res = $this->Teacher_trial_model->getInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			/* $q = $this->Teachers_artwork_model->update_artwork(array('is_del'=>1),$id); */
			$array = array('is_del' => '1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('trial_and_mentoring');
			if($result){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				$ary['url']=base_url($rid.'/'.$sid);
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
		
	}
	
	
}