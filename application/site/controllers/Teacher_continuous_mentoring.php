
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_continuous_mentoring extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		 date_default_timezone_set('Asia/Kolkata');


		$this->headerdata = $this->comm_fun->header_data();

		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect($this->url_slug.'Login');
	   
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		$this->school_id = $_SESSION['login_session']['school_id'];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
		$this->logo = $this->school_data->logo;
		$this->school_name = $this->school_data->name;
		$this->load->model('Teacher_trial_model');
		$this->load->library('datatblsel_sel');
		
		$this->load->library('Ajax_pagination');
			$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
			$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
	}
	

	public function index()
	{
		 $ary =array();	
	   	  
		 /*  $this->uid,'mentoring' */
		  $ary['type'] = 'mentoring';
		  
		/*total rows count*/
		$res = $this->Teacher_trial_model->getAllmentoring($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'teacher_mentoring/ajaxpagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teacher_trial_model->getAllmentoring($ary);
	
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		
		$data['main_content'] = 'teacher_views/continuous_mentoring';
		$this->load->view('school_template/body', $data);
	}
	
	
	public function index2()
	{
		 $ary =array();	
	   	  
		 /*  $this->uid,'mentoring' */
		  $ary['type'] = 'mentoring';
		  
		/*total rows count*/
		$res = $this->Teacher_trial_model->getAllmentoring($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'teacher_mentoring/ajaxpagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teacher_trial_model->getAllmentoring($ary);
	
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		
		$data['main_content'] = 'teacher_views/continuous_mentoring2';
		$this->load->view('school_template/body', $data);
	}
	
	
	function ajaxpagination(){
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		$conditions['type'] = 'mentoring';
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['class_id'] = $this->input->post('class_id');
        //total rows count
	
		$data = $this->Teacher_trial_model->getAllmentoring($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'teacher_mentoring/ajaxpagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$list = $this->Teacher_trial_model->getAllmentoring($conditions);
		$data['query'] = $this->db->last_query(); 
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($list)){
			foreach ($list as $req) {  
			
				/* if ($req->status=='1'){
					$status = 'Submitted';
				} elseif ($req->status=='2'){
					$status = 'Approved';
				} else{
					$status ='Not Started';
				}
		
				if($req->status=='1'){
					$status = '<a class="badge badge-pill badge-cyan font-size-12">'.$status.'</a>';	
				}else{
					$status = '<a class="badge badge-pill badge-gold font-size-12">'.$status.'</a>';	
				} */
				
			
				
				if($req->status=='1'){
    				$status = '<span class="badge badge-pill badge-gold">Submitted</span>';	
    			}elseif ($req->status=='2'){
    				$status = '<span class="badge badge-pill badge-green">Approved</span>';	
    			} else{
    				$status = '<span class="badge badge-pill badge-gold font-size-12">Not Started</span>';	
    			}
    			
    			
    			if($req->feedback=='1'){
    				$feedbackstatus = '<span class="badge badge-pill badge-cyan font-size-12">Given</span>';	
    			}else{
    				$feedbackstatus = '<span class="badge badge-pill badge-gold font-size-12">Pending</span>';	
    			}
			
		        $html .='<tr>
				
			  
							<td>'.$req->class_name.' - '.$req->section_name .'</td>
							<td>'.$req->lesson_name .'</td>
							<td>'.$req->stage .'</td>
							<td>'.$status .'</td>
							
							
							<td>
								<a href="'.base_url($this->url_slug.'/view_mentoring/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url($this->url_slug.'/edit_mentoring/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" data-t="trial_and_mentoring" data-i="'.$req->id.'" data-c="teacher_continuous_mentoring" class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></a><br>
							</td>
							
							<td>'.$feedbackstatus.'</td>
							<td>'.date('d M Y', strtotime($req->created_at)) .'</td>

						</tr>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		}
		
		
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	
	
	
	
	/* public function index(){
		$data['artworks'] =  $this->Teacher_trial_model->getAlltrial_and_mentoring($this->uid,'mentoring');
		$data['main_content'] = 'teacher_views/continuous_mentoring';
		$this->load->view('school_template/body',$data);
	} */
	
	function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		
		$select = 'tm.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.class_name as class_name,l.lesson_name';
		$column = array('tm.id');
		$order = array('tm.id' => 'asc');
		$where=" tm.added_by = $this->uid and tm.is_del = '0' and tm.type='mentoring'";
		$join = array();
		$join[] = array('table_name'=>'lessons as l','on'=>'tm.lesson_id = l.lesson_id'); 
		$join[] = array('table_name'=>'classes as c','on'=>'c.c_id = tm.class_id'); 
		$tb_name = 'trial_and_mentoring as tm';
		$list = $this->datatblsel_sel->get_datatables($select,$column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $limit;
		$i = 0;
		
		foreach ($list as $req) {  
			
			$no++;
			$row = array();
			$action='<a href="'.base_url($this->url_slug.'/view_mentoring/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url($this->url_slug.'/edit_mentoring/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" data-t="trial_and_mentoring" data-i="'.$req->id.'" data-c="teacher_continuous_mentoring" class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></a><br>';	
			
			if ($req->status=='1'){
				$status = 'Submitted';
			} elseif ($req->status=='2'){
				$status = 'Approved';
			} else{
				$status ='Not Started';
			}
	
			if($req->status=='1'){
				$status = '<a class="badge badge-pill badge-cyan font-size-12">'.$status.'</a>';	
			}else{
				$status = '<a class="badge badge-pill badge-gold font-size-12">'.$status.'</a>';	
			}
			$i = $i +1;
			/* $row[] = $i; */
			$row[] = $req->class_name;
			$row[] = $req->lesson_name;
			$row[] = $req->stage;;
			$row[] = $status;
			$row[] = date('d M Y', strtotime($req->created_at));
			$row[] = $action;
			$data[] = $row;
		}
		$output = array(
				"draw" => $draw,
				"recordsTotal" => $this->datatblsel_sel->count_all($select,$tb_name,$join),
				"recordsFiltered" => $this->datatblsel_sel->count_filtered($select,$column,$order,$tb_name,$join,$where),
				"data" => $data,
			);
		echo json_encode($output);
	}
	
	public function add(){
		/* $data['classes'] =  $this->Teacher_trial_model->getClassesassigned($this->uid)['data'];
		$data['lessons'] =  $this->Teacher_trial_model->getSchoolLessons($this->school_id)['data']; */
		
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id)['data'];
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id)['data'];
		
		$data['main_content'] = 'teacher_views/upload_continuous_mentoring';
		$this->load->view('school_template/body',$data);
	}
	
	public function add2(){
		 
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id)['data'];
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id)['data'];
		
		$data['main_content'] = 'teacher_views/upload_continuous_mentoring2';
		$this->load->view('school_template/body',$data);
	}
	
	
	
	function view(){
		$t_id = addslashes($this->uri->segment('3'));
		if($t_id!="" ){
			$res = $this->Teacher_trial_model->getInfo($t_id);
			if($res['num']==1){
				$comm = $this->Teacher_trial_model->getcomments($t_id);
				
				$data['main_content'] = 'teacher_views/view_mentoring';
				$data['view_data'] = $res['data'];			
				$data['comments'] = $comm['data'];			
				$this->load->view('school_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect($this->url_slug.'/teacher_mentoring');
			}	
		}else{
			redirect($this->url_slug.'/teacher_mentoring');
		}	
	}
	
	
	function create(){
		/*print_r($_POST);exit;*/
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$id = $this->uid;
		$insert_data = array();
		 if($this->input->post('class_id')=='' ){
				$msg = warning_msg('Please select Class');	
		}if($this->input->post('lesson_id')=='' ){
				$msg = warning_msg('Please select Lesson');	
		}if($this->input->post('base_code1')=='' ){
				$msg = warning_msg('Please Upload Image');	
		}else{
			$insert_data['non_xss'] = array(	
				'school_id'=>addslashes($this->school_id),			
			    'class_id'=>addslashes($this->input->post('class_id')),
			    'section_id'=>addslashes($this->input->post('section_id')),
				'lesson_id'=>addslashes($this->input->post('lesson_id')),
				'teacher_notes'=>addslashes($this->input->post('teacher_notes')),
				'stage'=>addslashes($this->input->post('stage')),
				'type'=>'mentoring',
				'added_by'=>$this->uid,
			);
			
			
			if ($_POST['base_code1']) {
				$insert_data['non_xss']['image1'] = $this->image_upload($_POST['base_code1']);
			}else{
				$insert_data['non_xss']['image1'] = '';
			}
			
			if ($_POST['base_code2']) {
				$insert_data['non_xss']['image2'] = $this->image_upload($_POST['base_code2']);
			}else{
				$insert_data['non_xss']['image2'] = '';
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
			
			$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
			$q = $this->Teacher_trial_model->insert($insert_data['xss_data']);
			$lastId = $this->db->insert_id();
			
				$les = $this->admin->getlessonName($this->input->post('lesson_id'))['data'];
				$lesson_name = $les['lesson_name'];
				
				if($q){
					$subject='Continuous mentoring Mail for '.$lesson_name.' by '.ucfirst($this->first_name).' - '.ucfirst($this->school_name) ;	
					$html="<html>
						<body>
							<p> Hi Mentor,<br>
							<p>Please find below the Continuous mentoring for ".$lesson_name." by ".ucfirst($this->first_name)."  - ".ucfirst($this->school_name)." 
							<p><img style='width: 200px;' src='".base_url().$insert_data['non_xss']['image1']."'  /></p>
							<p>Teacher Note: ".$this->input->post('teacher_notes')."</p>
						<p>Please use the link below to login to your Rainbowfish Portfolio to approve and give feedback on the Continuous mentoring.</p><br>
							<p><a href='".base_url('view_continuous_mentoring/'.$lastId)."'>To Give Feedback, Click Here</a></p>
							<p>This is an auto-generated response. Please do not reply to this email. </p><br>
						<p>Thanks & Regards ,<br> RainbowFish</p>			
						</body>
					</html>";
					
					$res = $this->admin->getassignedMentors($this->school_id);
					if($res['num'] >0){
						foreach($res['data'] as $r){
							$insertData['non_xss'] = array(			
							'notifications'=>'Continuous mentoring uploaded',
							'notification_type'=>'new_mentoring',
							'school_id'=>$this->school_id,
							'notification_root_id'=>$lastId,
							'view_link'=>'view_continuous_mentoring/'.$lastId,
							'user_id'=>$r->id,
							'created_at'=>date('Y-m-d h:i:s'),
						);
						$n = $this->db->insert('notifications',$insertData['non_xss']);
						$email = $r->email;
						$e = $this->comm_fun->send_mail($email,$subject,$html);
					
						}
					}
					
					
					$status=1;
					$url=base_url($this->url_slug.'/teacher_mentoring');
					$msg = success_msg('Teacher Mentoring Uploaded Successfully');	
					$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> Teacher Mentoring Uploaded Successfully.
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
				$ary['url']=base_url($this->url_slug.'/teacher_mentoring');
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);		
	}
	
	function edit(){
		$t_id = $this->uri->segment(3);
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id)['data'];
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id)['data'];
		$res = $this->Teacher_trial_model->getInfo($t_id);
		
		$sections= $this->admin->get_sectionsByClassID($res['data']['class_id']);
		$data['sections'] = $sections['data'];

		$data['main_content'] = 'teacher_views/edit_teacher_mentoring';
		$data['view_data'] = $res['data'];			
		$this->load->view('school_template/body',$data);
	}
	
	
	function update(){
		/*print_r($_POST);exit;*/
		extract($_POST);
		$status=0;
		$msg='';
		$url='';
		$id = $this->uid;
		$insert_data = array();
		$trail_id =  $this->input->post('trail_id');
		 if($this->input->post('class_id')=='' ){
				$msg = warning_msg('Please select Class');	
		}if($this->input->post('lesson_id')=='' ){
				$msg = warning_msg('Please select Lesson');	
		}else{
			$insert_data['non_xss'] = array(			
			    'class_id'=>addslashes($this->input->post('class_id')),
			    'section_id'=>addslashes($this->input->post('section_id')),
				'lesson_id'=>addslashes($this->input->post('lesson_id')),
				'teacher_notes'=>addslashes($this->input->post('teacher_notes')),
				'stage'=>addslashes($this->input->post('stage')),
			);
			
			
			if ($_POST['base_code1']) {
				$insert_data['non_xss']['image1'] = $this->image_upload($_POST['base_code1']);
			}
			
			if ($_POST['base_code2']) {
				$insert_data['non_xss']['image2'] = $this->image_upload($_POST['base_code2']);
			}
			
			if ($_POST['base_code3']) {
				$insert_data['non_xss']['image3'] = $this->image_upload($_POST['base_code3']);
			}
			
			if ($_POST['base_code4']) {
				$insert_data['non_xss']['image4'] = $this->image_upload($_POST['base_code4']);
			}
			
			if ($_POST['base_code5']) {
				$insert_data['non_xss']['image5'] = $this->image_upload($_POST['base_code5']);
			}
			
			$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
			$q = $this->Teacher_trial_model->update($insert_data['xss_data'],$trail_id);
			
				if($q){
					$status=1;
					$url=base_url($this->url_slug.'/teacher_mentoring');
					$msg = success_msg(' Updated Successfully');	
					$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong>  Updated Successfully.
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
	

}