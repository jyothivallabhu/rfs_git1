
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Teacher_lessons extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Teacher_lessons_model");
		$this->load->model("Teacher_students_model");
		if (!$this->session->login_session )
			redirect('Login');
		
	
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = $_SESSION['login_session']['school_id'];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
			$this->load->library('datatblsel_sel');
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
			
			$this->load->library('Ajax_pagination');
			$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
			$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
	}

	
	
	
	function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$sid = $_POST['section_id'];
		$select = 'a.*, a.id as scheduled_lesson_id,c.class_name,s.section_name,l.lesson_name';
		$column = array('lesson_name');
		$order = array('a.id' => 'asc');
		$where=" a.is_del =  '0'  and  l.status =  '1' and  l.is_del =  '0'  and a.section_id='$sid ' and y.name='currrent_year'";
		$join = array();
		
		$join[] = array('table_name'=>'lessons as l','on'=>'a.lesson_id = l.lesson_id');
		$join[] = array('table_name'=>'sections as s','on'=>'s.section_id = a.section_id');
		$join[] = array('table_name'=>'classes as c','on'=>'c.c_id = s.class_id'); 
		$join[] = array('table_name'=>'academic_year as y','on'=>'y.id = a.academic_year'); 
		$tb_name = 'lesson_schedule as a';
		
		
		$list = $this->datatblsel_sel->get_datatables($select,$column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $limit;
		$i = 0;
		/* echo $this->db->last_query();  */
		foreach ($list as $req) {  
			
			$no++;
			$row = array();
			
			$status = $req->lesson_status;
			if($req->lesson_status=='1'){
				$status = '<a class="badge badge-pill badge-cyan font-size-12">In-progress</a>';	
			}elseif($req->lesson_status=='2'){
				$status = '<a class="badge badge-pill badge-gold font-size-12">Completed</a>';	
			}else if($req->lesson_status=='0'){
				$status = '<a class="badge badge-pill badge-gold font-size-12">Not Started</a>';	
			}
			
			$action='<a href="'.base_url($this->url_slug.'/edit_schedule/'.$req->scheduled_lesson_id).'" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a><br>';	
			
			
			
			$i = $i +1;
			$row[] = $req->lesson_name;
			$row[] = $req->class_name;
			$row[] = $req->section_name;
			$row[] = date('d/m/Y', strtotime($req->from_date)) ;
			$row[] = date('d/m/Y', strtotime($req->to_date)) ;
			$row[] = $status; 
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
	
	 public function sectionwiselessons()
	{
		$data['section_id'] = $this->uri->segment(3);
		$data['main_content'] = 'teacher_views/lessons_sectionwise';
		$this->load->view('school_template/body', $data);
	} 
	
	public function index()
	{
		 $ary =array();	
	   	   
		/*total rows count*/
		$res = $this->Teacher_students_model->getAassignedSections($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'teacher_lessons/ajaxpagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teacher_students_model->getAassignedSections($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['academicyear'] = $this->admin->get_academicMaster();

		$data['main_content'] = 'teacher_views/lessons';
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
        $academic_year = $this->input->post('academic_year');
        //total rows count
	
		$data = $this->Teacher_students_model->getAassignedSections($conditions);
		
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
		$list = $this->Teacher_students_model->getAassignedSections($conditions);
		$data['query'] = $this->db->last_query(); 
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($list)){
			foreach ($list as $req) {  
			
				$count_data = $this->Teacher_lessons_model->getLessonsCount($req->section_id,$academic_year);
				
		        $html .='<tr>
							<td>'.$req->class_name.'</td>
							<td>'.$req->section_name .'</td>
							
							<td>'.$count_data[0]->total_lessons.'</td>
							
							
							<td>
								<a href="'.base_url($this->url_slug.'/sectionwiselessons/'.$req->section_id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
							</td>

						</tr>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		}
		
		
		
		$data['html']=$html;
		echo json_encode($data);
    }
	

	
	
	function teacher_lessonslist(){
		$ary =array();	
	   	   
		$ary['school_id'] = $this->school_id;
		
		/*total rows count*/
		$res = $this->Teacher_students_model->getAassignedLessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		 
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'teacher_lessons/lessonsListajaxpagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'customsearchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teacher_students_model->getAassignedLessons($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		$data['main_content'] = 'teacher_views/lessonslist';
		$this->load->view('school_template/body', $data);
	}
	
	
	function teacher_lessonslist2(){
		$ary =array();	
	   	   
		$ary['school_id'] = $this->school_id;
		
		/*total rows count*/
		$res = $this->Teacher_students_model->getAassignedLessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		 
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'teacher_lessons/lessonsListajaxpagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'lsearchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->Teacher_students_model->getAassignedLessons($ary);
		/* echo $this->db->last_query();  */
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		$data['main_content'] = 'teacher_views/lessonslist2';
		$this->load->view('school_template/body', $data);
	}
	
	
	
	
	
	
	function lessonsListajaxpagination(){
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		$conditions['school_id'] = $this->school_id;
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
         $conditions['class_id'] = $this->input->post('class_id');
        //total rows count
	
		$data = $this->Teacher_students_model->getAassignedLessons($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'teacher_lessons/lessonsListajaxpagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'lsearchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$list = $this->Teacher_students_model->getAassignedLessons($conditions);
		$data['query'] = $this->db->last_query(); 
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($list)){
			foreach ($list as $req) {  
			
			$html .='<div class="card mb-3">
					  <div class="card-body">
					  
						<div class="d-flex flex-column flex-lg-row">
						  
						  <div class="row flex-fill">
						    <div class="col-sm-6 col-lg-4">
							 <img class="img-fluid" src="'.base_url().$req->final_artwork.'" width="200" height="200">
							</div>
							<div class="col-sm-6 col-lg-4">
							  <h4 class="h5">Class: '. $req->class_name  .' </h4>
							  <p >Lesson: '.$req->lesson_name .' </p> 
							</div> 
							
							<div class="col-sm-6 col-lg-4 text-lg-end">
							  <a href="'.base_url($this->url_slug.'/lessons_view/'.$req->lesson_id) .'" class="btn btn-primary stretched-link">View</a>
							</div>
						  </div>
						</div>
					  </div>
					</div>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		}
				
				
		     /*    $html .='<tr>
							<td>'.$req->class_name.'</td>
							<td>'.$req->lesson_name .'</td>
							
							<td>'. $req->medium .'</td>
							
							
							<td>
								<a href="'.base_url($this->url_slug.'/lessons_view/'.$req->lesson_id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
							</td>

						</tr>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		} */
		
		
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	public function view_lesson(){
		$id = $this->uri->segment(3);
		$data['view_lessons'] = $this->admin->get_lessonsByID($id)[0];
		$data['main_content'] = 'lessons/view';
		$this->load->view('school_template/body', $data);
	}
	
	 public function edit_schedule()
	{
		$id = $this->uri->segment(3);
		$data['view_data'] = $this->Teacher_lessons_model->getlessonScheduleBYID($id)[0];
		
		$data['main_content'] = 'teacher_views/edit_lessonschedule';
		$this->load->view('school_template/body', $data);
	} 
	
	public function update()
	{		
		$school_data = array();
		$status = 0;
		$msg= '';
		$url = '';
		
		 $section_id = $this->input->post('section_id');
		if($this->input->post('from_date')=='' ){
			$msg = warning_msg('Please Enter From Date');	
		}else if($this->input->post('to_date')=='' ){
			$msg = warning_msg('Please Enter To Date');	
		}else{
		
			$save_data = array(
				'from_date'=>trim($_POST['from_date']),
				'to_date'=>trim($_POST['to_date']),
				'lesson_status'=>trim($_POST['lesson_status'])
			);
			$this->db->set($save_data);
			$this->db->where(array('id' => $this->input->post('schedule_id')));
			$result = $this->db->update('lesson_schedule');
			
			
			if($result){
				$status= 1;
				$msg = '<div class="alert alert-success"> <strong>Updated Successfully</strong></div>';
				$url= base_url().$this->url_slug.'/sectionwiselessons/'.$section_id;
			}else{
				
				$msg = '<div class="alert alert-danger alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
			}
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
		
	}
	
	
}