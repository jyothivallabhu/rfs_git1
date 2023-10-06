
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_trial extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		
		 
		$this->load->model("Admin_model", 'admin');
		$this->load->model('Teacher_trial_model');
		
		$this->headerdata = $this->comm_fun->header_data();
	   
		$this->url_slug =  (isset($_SESSION["login_session"]["url_slug"]) ? $_SESSION["login_session"]["url_slug"] : '');
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = (isset($_SESSION["login_session"]["school_id"]) ? $_SESSION["login_session"]["school_id"] : '');
		$this->role_id = $_SESSION['login_session']['role_id'];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
		if($this->school_id  !=''){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
			$this->school_name = $this->school_data->name;
		}
		
		
		if (!$this->session->login_session )
			redirect($this->url_slug.'Login');
		
		
		$this->load->library('datatblsel_sel');
		
		$this->load->library('Ajax_pagination');
			$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
			$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
			
			
	}
	

	
	public function index(){
		//$data['artworks'] =  $this->Teacher_trial_model->getAlltrial_and_mentoring($this->uid,'trail');
		
		$ary =array();	
	   	   
		$ary['type'] = 'trail';
		
		/*total rows count*/
		$res = $this->Teacher_trial_model->getassignedclassandlessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#schoolsList';
		$config['base_url']    = base_url().'teacher_trial/ajaxPaginationSchoolsData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teacher_trial_model->getassignedclassandlessons($ary);
		/* echo $this->db->last_query(); */
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		
		$data['classes'] = $this->admin->get_allclasses($this->school_id);
		
		$data['main_content'] = 'teacher_views/teacher_trail_classes';
		$this->load->view('school_template/body',$data);
	}
	
	function ajaxpagination(){
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
        $conditions['class_id'] = $this->input->post('class_id');
        //total rows count
	
		$data = $this->Teacher_trial_model->getassignedclassandlessons($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'mentors/ajaxpagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$list = $this->Teacher_trial_model->getassignedclassandlessons($conditions);
		$data['query'] = $this->db->last_query(); 
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($list)){
			foreach ($list as $req) {  
			
				
				
		        $html .='<tr>
							<td>'.$req->class_name.'</td>
							<td>'.$req->lesson_name .'</td>
							
							<td>
								<a href="'.base_url($this->url_slug.'/teacher_triallessonwise/'.$req->lesson_id.'/'.$req->c_id).'" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right"><i class="anticon anticon-eye"></i></a>
							</td>

						</tr>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		}
		
		
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	function teacher_triallessonwise(){
		$data['lesson_id'] = $this->uri->segment(3);
		$data['class_id'] = $this->uri->segment(4);
		$data['main_content'] = 'teacher_views/teacher_trail';
		$this->load->view('school_template/body',$data);
	}
	
	
	function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$lesson_id = $_POST['section_id'];
		$class_id = $_POST['class_id'];
		
		$select = 'tm.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.class_name as class_name,l.lesson_name';
		$column = array('tm.id');
		$order = array('tm.id' => 'asc');
		$where=" tm.added_by = $this->uid and tm.is_del = '0' and tm.type='trail'  ";
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
			$action='<a href="'.base_url($this->url_slug.'/view_teacher_trial/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url($this->url_slug.'/edit_teacher_trial/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" data-t="trial_and_mentoring" data-i="'.$req->id.'" data-c="teacher_trial" class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></a><br>';	
			
			/* if ($req->status=='1'){
				$status = 'Submitted';
			} elseif ($req->status=='2'){
				$status = 'Approved';
			} else{
				$status ='Not Started';
			} */
	
			if($req->status=='1'){
				$status = '<span class="badge badge-pill badge-primary">Submitted</span>';	
			}elseif ($req->status=='2'){
				$status = '<span class="badge badge-pill badge-success">Approved</span>';	
			} else{
				$status = '<span class="badge badge-pill badge-primary font-size-12">Not Started</span>';	
			}
			
			
			if($req->feedback=='1'){
				$feedbackstatus = '<span class="badge badge-pill badge-primary font-size-12">Given</span>';	
			}else{
				$feedbackstatus = '<span class="badge badge-pill badge-primary font-size-12">Pending</span>';	
			}
			
			
			$i = $i +1;
			/* $row[] = $i; */
			
			$row[] = $req->class_name;
			$row[] = $req->lesson_name;
			$row[] = '<img src="'. $req->image_path .' " height="60" width="60" />';
			/* $row[] = $status; */
			$row[] = $action;
			$row[] = date('d M Y', strtotime($req->created_at));
			$row[] = $feedbackstatus;
			
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
	
	public function add(){
		
		$lesson_id = $this->uri->segment(3);
		$class_id = $this->uri->segment(4);
		
		/* $data['classes'] =  $this->admin->classInfo($class_id)['data'];
		
		$data['lessons'] =  $this->admin->getlessonName($lesson_id)['data']; */
		
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id)['data'];
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id)['data'];
		
		
		$data['main_content'] = 'teacher_views/upload_teacher_trial';
		$this->load->view('school_template/body',$data);
	}
	function view(){
		$t_id = addslashes($this->uri->segment('3'));
		if($t_id!="" ){
			$res = $this->Teacher_trial_model->getInfo($t_id);
			if($res['num']==1){
				$comm = $this->Teacher_trial_model->getcomments($t_id);
				
				$data['main_content'] = 'teacher_views/view_teacher_trail';
				$data['view_data'] = $res['data'];			
				$data['comments'] = $comm['data'];			
				$this->load->view('school_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect($this->url_slug.'/teacher_trial');
			}	
		}else{
			redirect($this->url_slug.'/teacher_trial');
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
		$class_id = $this->input->post('class_id');
		$lesson_id =  $this->input->post('lesson_id');
		 if($this->input->post('class_id')=='' ){
				$msg = warning_msg('Please select Class');	
		}if($this->input->post('lesson_id')=='' ){
				$msg = warning_msg('Please select Lesson');	
		}else{
			$insert_data['non_xss'] = array(			
			    'school_id'=>addslashes($this->school_id),
			    'class_id'=>addslashes($this->input->post('class_id')),
				'lesson_id'=>addslashes($this->input->post('lesson_id')),
				'teacher_notes'=>addslashes($this->input->post('teacher_notes')),
				'type'=>'trail',
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
			
			$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
			$q = $this->Teacher_trial_model->insert($insert_data['xss_data']);
			$lastId = $this->db->insert_id();
				
				$les = $this->admin->getlessonName($this->input->post('lesson_id'))['data'];
				$lesson_name = $les['lesson_name'];
				
				if($q){
					
					$subject='Teacher Trial for '.$lesson_name.' by '.ucfirst($this->first_name).' - '.ucfirst($this->school_name);	
					$html="<html>
						<body>
							<p> Hi Mentor,<br>
							<p>Please find below the teacher trial for '".$lesson_name."' by '".ucfirst($this->first_name)."' - '".ucfirst($this->school_name)."'
							<p><img style='width:200px' src='".base_url().$insert_data['non_xss']['image1']."'  /></p>
							<p>Teacher Note: ".$this->input->post('teacher_notes')."</p>
							<p>Please use the link below to login to your Rainbowfish Portfolio to approve and give feedback on the teacher trial.</p><br>
							<p><a href='".base_url('view_mentor_trial/'.$lastId)."'>To Give Feedback, Click Here</a></p>
							<p>This is an auto-generated response. Please do not reply to this email. </p><br>
						<p>Thanks & Regards ,<br> RainbowFish</p>		
						</body>
					</html>";
					
					$res = $this->admin->getassignedMentors($this->school_id);
					if($res['num'] >0){
						foreach($res['data'] as $r){
							$insertData['non_xss'] = array(			
							'notifications'=>'Teacher Trail Uploaded',
							'notification_type'=>'new_trail',
							'school_id'=>$this->school_id,
							'notification_root_id'=>$lastId,
							'view_link'=>'view_mentor_trial/'.$lastId,
							'user_id'=>$r->id,
							'created_at'=>date('Y-m-d h:i:s'),
						);
						$n = $this->db->insert('notifications',$insertData['non_xss']);
						$email = $r->email;
						$e = $this->comm_fun->send_mail($email,$subject,$html);
						}
					}
					
					
					$status=1;
					$url=base_url($this->url_slug.'/teacher_triallessonwise' );
					$msg = success_msg('Teacher Trial Uploaded Successfully');	
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
				$ary['url']=base_url($this->url_slug.'/teacher_triallessonwise');
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);		
	}
	
	function edit(){
		$t_id = $this->uri->segment(3);;
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id)['data'];
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id)['data'];
		$res = $this->Teacher_trial_model->getInfo($t_id);
		/* echo $this->db->last_query();
		
		print_r($res);
		exit; */
		
		$data['main_content'] = 'teacher_views/edit_teacher_trail';
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
		$class_id = $this->input->post('class_id');
		$lesson_id =  $this->input->post('lesson_id');
		$trail_id =  $this->input->post('trail_id');
		 if($this->input->post('class_id')=='' ){
				$msg = warning_msg('Please select Class');	
		}if($this->input->post('lesson_id')=='' ){
				$msg = warning_msg('Please select Lesson');	
		}else{
			$insert_data['non_xss'] = array(			
			    'class_id'=>addslashes($this->input->post('class_id')),
				'lesson_id'=>addslashes($this->input->post('lesson_id')),
				'teacher_notes'=>addslashes($this->input->post('teacher_notes')),
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
			}
			
			$insert_data['xss_data'] = clean_ip($insert_data['non_xss']);
			
			$q = $this->Teacher_trial_model->update($insert_data['xss_data'],$trail_id);
			
				if($q){
					$status=1;
					$url=base_url($this->url_slug.'/teacher_triallessonwise');
					$msg = success_msg('Teacher Trial Uploaded Successfully');	
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
					
					 $subject='Feedback Submission Mail';	
					$html="<html>
						<body>
							<p> Greetings ,<br>
							<p>Please find the details Feedback
							<p>Comments: ".trim($_POST['feedback'])."</p>
						<p>Thanks & Regards ,<br> RainbowFish</p>		
						</body>
					</html>";
					$res = $this->admin->getassignedMentors($this->school_id);
					if($res['num'] >0){
						foreach($res['data'] as $r){
						$insertData['non_xss'] = array(			
							'notifications'=>'New Feedback From Teacher',
							'notification_type'=>'new_Feedback',
							'school_id'=>$this->school_id,
							'notification_root_id'=>$trail_id,
							'view_link'=>'view_mentor_trial/'.$trail_id,
							'user_id'=>$r->id,
							'created_at'=>date('Y-m-d h:i:s'),
						);
						$n = $this->db->insert('notifications',$insertData['non_xss']);
						$email = $r->email;
						$e = $this->comm_fun->send_mail($email,$subject,$html); 
					
						}
					}
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
						  /* base_url($this->url_slug.'/teacher_trial') */
						  
						  
					$url = ($feedbackReceivedfrom == 'Trails') ? base_url().$this->url_slug.'/view_teacher_trial/'.$trail_id : base_url().$this->url_slug.'/view_mentoring/'.$trail_id;
					
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
	
function teacher_triallessonwise2(){
		/* $data['lesson_id'] = $this->uri->segment(3);
		$data['class_id'] = $this->uri->segment(4);
		
		$sql = 'SELECT `tm`.*, case when (image1 is null or image1 = "") then "https://rainbowfishportfolio.com/assets/images/user.png" else concat("https://rainbowfishportfolio.com/", image1) end as "image_path", `c`.`class_name` as `class_name`, `l`.`lesson_name` FROM `trial_and_mentoring` as `tm` JOIN `lessons` as `l` ON `tm`.`lesson_id` = `l`.`lesson_id` JOIN `classes` as `c` ON `c`.`c_id` = `tm`.`class_id` WHERE `tm`.`added_by` = 22 and `tm`.`is_del` = 0 and `tm`.`type` = "trail" ORDER BY `tm`.`id` ASC';
		
		$q = $this->db->query($sql);
		$res= $q->result_array();
		
		$data['resp'] = $res; */
		
		$ary =array();	
	   	  
		 /*  $this->uid,'mentoring' */
		  $ary['type'] = 'trail';
		  
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
		
		/* echo $this->db->last_query(); */
		
	
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['resp'] = $posts;	
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		
		$data['main_content'] = 'teacher_views/teacher_trail2';
		$this->load->view('school_template/body',$data);
	}
	
	
	function getAll2(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$lesson_id = $_POST['section_id'];
		$class_id = $_POST['class_id'];
		
		$select = 'tm.*, case when (image1 is null or image1 = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",image1) end as "image_path",c.class_name as class_name,l.lesson_name';
		$column = array('tm.id');
		$order = array('tm.id' => 'asc');
		$where=" tm.added_by = $this->uid and tm.is_del = '0' and tm.type='trail'  ";
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
			$action='<a href="'.base_url($this->url_slug.'/view_teacher_trial/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url($this->url_slug.'/edit_teacher_trial/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" data-t="trial_and_mentoring" data-i="'.$req->id.'" data-c="teacher_trial" class="btn btn-danger btn-sm del"><i class="fa fa-trash"></i></a><br>';	
			
			/* if ($req->status=='1'){
				$status = 'Submitted';
			} elseif ($req->status=='2'){
				$status = 'Approved';
			} else{
				$status ='Not Started';
			} */
	
			if($req->status=='1'){
				$status = '<span class="badge badge-pill badge-primary">Submitted</span>';	
			}elseif ($req->status=='2'){
				$status = '<span class="badge badge-pill badge-success">Approved</span>';	
			} else{
				$status = '<span class="badge badge-pill badge-primary font-size-12">Not Started</span>';	
			}
			
			
			if($req->feedback=='1'){
				$feedbackstatus = '<span class="badge badge-pill badge-primary font-size-12">Given</span>';	
			}else{
				$feedbackstatus = '<span class="badge badge-pill badge-primary font-size-12">Pending</span>';	
			}
			
			
			$i = $i +1;
			/* $row[] = $i; */
			
			$row[] = $req->class_name;
			$row[] = $req->lesson_name;
			$row[] = '<img src="'. $req->image_path .' " height="60" width="60" />';
			/* $row[] = $status; */
			$row[] = $action;
			$row[] = date('d M Y', strtotime($req->created_at));
			$row[] = $feedbackstatus;
			
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

	
}