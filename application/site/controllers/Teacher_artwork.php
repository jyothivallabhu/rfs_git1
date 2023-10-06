
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_artwork extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		if (!$this->session->login_session )
			redirect('Login');
	    
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = $_SESSION['login_session']['school_id'];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		$this->role_id =  $_SESSION["login_session"]["role_id"];
		
		$this->load->library('datatblsel_sel');
		$this->load->library('Ajax_pagination');
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model('Teachers_artwork_model');
		$this->load->model('Teacher_students_model');
		$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
		$this->logo = $this->school_data->logo;
		
		$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
			
	}
	

	public function index()
	{
		 $ary =array();	
	   	   
		/*total rows count*/
		$res = $this->Teachers_artwork_model->getassignedclassandlessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'teacher_artwork/ajaxpagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teachers_artwork_model->getassignedclassandlessons($ary);
	
	/* echo $this->db->last_query(); */
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id);
		
		$data['main_content'] = 'teacher_views/artwork_class_lessons';
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
		
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['class_id'] = $this->input->post('class_id');
        $conditions['lesson_id'] = $this->input->post('lesson_id');
        //total rows count
	
		$data = $this->Teachers_artwork_model->getassignedclassandlessons($conditions);
		
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
		$list = $this->Teachers_artwork_model->getassignedclassandlessons($conditions);
		$data['query'] = $this->db->last_query(); 
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($list)){
			foreach ($list as $req) {  
			
				$count_data = $this->Teachers_artwork_model->getartworksCount($req->section_id,$req->lesson_id);
											
				$total_count = $count_data[0]->total_lessons;
											
		        $html .='<tr>
							<td>'.$req->lesson_name .'</td>
							<td>'.$req->class_name.'</td>
							<td>'.$req->section_name .'</td>
							<td>'.$total_count .'</td>
							
							<td>
								<a href="'.base_url($this->url_slug.'/section_artwork/'.$req->section_id.'/'.$req->lesson_id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
							</td>

						</tr>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		}
		
		
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	
	
	
	
	
	public function view(){
		
		$artwork_id = base64_decode(addslashes($this->uri->segment('3')));
		if($artwork_id!="" ){
			$res = $this->Teachers_artwork_model->getArtWorksByID($artwork_id);
			/*  */
			if($res['num']==1){
				$comm = $this->Teachers_artwork_model->getcomments($artwork_id);
				/* echo $this->db->last_query();exit; */
				$data['comments'] = $comm['data'];	
				$data['artworks'] = $res['data'];
				$data['section_id'] = $this->uri->segment(3);
				$data['main_content'] = 'teacher_views/view_artwork';
				$this->load->view('school_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect($this->url_slug.'/teacher_artwork');
			}	
		}else{
			redirect($this->url_slug.'/teacher_artwork');
		}
		
		/* 
		$data['artworks'] =  $this->Teachers_artwork_model->getArtWorksByID($this->uri->segment(3));
		
		 */
	}
	
	
	
	public function lessonclass_wise()
	{	
		//$data['artworks'] =  $this->Teachers_artwork_model->getArtWorksBySections($this->uri->segment(3));
		$lesson_id = $this->uri->segment(3);
		$class_id = $this->uri->segment(4);
		
		$ary =array();
		
		  $ary['class_id'] = $class_id;
		  $ary['lesson_id'] = $lesson_id;
	   	   
		/*total rows count*/
		$res = $this->Teachers_artwork_model->getSectionsByclassandlessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'teacher_artwork/ajaxpaginationLessonclass_wise';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teachers_artwork_model->getSectionsByclassandlessons($ary);
	
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['classes'] = $this->admin->get_allclasses($this->school_id);
		
		
		$data['main_content'] = 'teacher_views/artwork_section';
		$this->load->view('school_template/body',$data);
	} 
	
	function ajaxpaginationLessonclass_wise(){
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
        $conditions['lesson_id'] = $this->input->post('lesson_id');
        //total rows count
	
		$data = $this->Teachers_artwork_model->getassignedclassandlessons($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'teacher_artwork/ajaxpaginationLessonclass_wise';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$list = $this->Teachers_artwork_model->getassignedclassandlessons($conditions);
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
								<a href="'.base_url($this->url_slug.'/teacher_artwork/'.$req->lesson_id.'/'.$req->c_id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
							</td>

						</tr>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		}
		
		
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	
	public function section_artwork()
	{	
		
		$data['section_id'] = $this->uri->segment(3);
		$data['lesson_id'] = $this->uri->segment(4);
		
		$data['lesson_details'] = $this->admin->get_lessonsByID($this->uri->segment(4));
		$data['classdetails'] = $this->admin->get_class_sectionsBysecID($this->uri->segment(3));
		
		$ary = array();
		
        $ary['lesson_id'] = $this->uri->segment(4);
        $ary['section_id'] = $this->uri->segment(3);
		
		$data['artworks'] =  $this->Teachers_artwork_model->getAllArtWorks($ary);
		
		
		$data['main_content'] = 'teacher_views/artwork_sectionwiselist';
		$this->load->view('school_template/body',$data);
	} 
	
	function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$sid = $_POST['section_id'];
		$lesson_id = $_POST['lesson_id'];
		$select = 'a.id,l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,sec.section_name, a.*,case when (artwork_upload is null or artwork_upload = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url('parent/').'",artwork_upload) end as "image_path"';
		$column = array('lesson_name');
		$order = array('a.id' => 'asc');
		$where=" a.is_del =  '0' and a.section_id = $sid and a.lesson_id = $lesson_id";
		$join = array();
		$join[] = array('table_name'=>'students as s','on'=>'a.student_id = s.student_id');
		$join[] = array('table_name'=>'sections as sec','on'=>'sec.section_id = a.section_id');
		$join[] = array('table_name'=>'classes as c','on'=>'c.c_id = a.class_id'); 
		$join[] = array('table_name'=>'lessons as l','on'=>'a.lesson_id = l.lesson_id');
		$tb_name = 'artwork as a';
		$list = $this->datatblsel_sel->get_datatables($select,$column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $limit;
		$i = 0;
		
		foreach ($list as $req) {  
			
			$no++;
			$row = array();
			
			$status = $req->feedback=='1'?'Active':'Inactive';
			if($req->feedback=='1'){
				$feedbackstatus = '<a class="badge badge-pill badge-cyan font-size-12">Given</a>';	
			}else{
				$feedbackstatus = '<a class="badge badge-pill badge-gold font-size-12">Pending</a>';	
			}
			
			$action='<a href="'.base_url($this->url_slug.'/view_artwork/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>';	
			
			
			
			$i = $i +1;
			$row[] = $req->lesson_name;
			$row[] = $req->class_name;
			$row[] = $req->section_name;
			$row[] = $req->first_name.' '.$req->last_name;
			$row[] = '<img src="'. $req->image_path .' " height="60" width="60" />';
			$row[] = $feedbackstatus;
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
	
	function save_bulk_feedback(){
		$status = 0;
		$msg= '';
		$url = '';
	
		
			
			$artwork_id = $this->input->post('artwork_id');
			$parent_id = $this->input->post('added_by');
			$section_id = $this->input->post('section_id');
			$lesson_id  = $this->input->post('lesson_id');
			
			$artwork_id = (isset($_POST['artwork_id']))?$_POST['artwork_id']:array();
			$comments = $this->input->post('comments');
		 
			if(!empty($comments)){
				for($i=0;$i<count($comments);$i++){
					
					if($_POST['comments'][$i] !=''){
						$save_data = array(
							'artwork_id'=>$artwork_id[$i],
							'from_id'=>$this->uid,
							'to_id'=>trim($parent_id[$i]),
							'feedback'=>trim($_POST['comments'][$i]),
						);
					
						$q = $this->db->insert('artwork_feedback', $save_data);
						$comment_lastId = $this->db->insert_id();
						if($q){ 
							
							$this->db->set(array('feedback' => '1'));
							$this->db->where(array('id' => $artwork_id[$i]));
							$result = $this->db->update('artwork');
							
							$teacher = $this->admin->userInfo($parent_id[$i]);
							if(!empty($teacher)){
								$insertData['non_xss'] = array(			
									'notifications'=>'Artwork Feedback',
									'notification_type'=>'artwork_comments',
									'notification_root_id'=>$artwork_id[$i],
									'school_id'=>$this->school_id,
									'view_link'=>'view_artwork/'.$artwork_id[$i],
									'user_id'=>$parent_id[$i],
								);
								$n = $this->db->insert('notifications',$insertData['non_xss']);
								/* $email = $teacher['data']['email'];
								
								$subject='RainbowFish -  Artwork Feedback';	
								$html="<html>
									<body>
										<p> Dear ".$teacher['data']['first_name'].",<br>
										<p> Feedback: ".$_POST['feedback']."</a><br><br>
									<p>Thanks & Regards ,<br> RainbowFish</p>		
									</body>
								</html>"; */
								/* $e = $this->comm_fun->send_mail($email,$subject,$html); */
							}
						
						}
					}
						
				}
			}
		 
			
		
			
			$status = 1;
			$msg = '<div class="alert alert-success alert-dismissible" role="alert">
				  Added Successfully</div>';
			$url = base_url().$this->url_slug.'/section_artwork/'.$section_id.'/'.$lesson_id;
	
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
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
					
					$this->db->set(array('feedback' => '1'));
					$this->db->where(array('id' => $artwork_id));
					$result = $this->db->update('artwork');
				
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
					$url = base_url().$this->url_slug.'/view_artwork/'.$artwork_id;
					
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