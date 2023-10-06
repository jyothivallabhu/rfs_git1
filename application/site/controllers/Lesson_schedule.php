
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lesson_schedule extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Lesson_schedule_model", 'admin');
		$this->load->model("Admin_model");
		$this->load->model("Mentor_model");
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->user_id = $_SESSION['login_session']['user_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->Admin_model->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}
		
	}

	
	
	public function index()
	{
				
				
		/* $id = ((isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2"); */
		
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		
		$data['schools'] = $this->Admin_model->get_schoolsByID($id)[0];
		
		
		$ary =array();	
	   	
		$ary['school_id'] = $id;
		
		/*total rows count*/
		$res = $this->admin->getRowslessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#usersList';
		$config['base_url']    = base_url().'lesson_schedule/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->getRowslessons($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['lesson_schedules'] = $posts;	
		$data['classes'] = $this->Admin_model->get_allactiveclasses($id);
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$data['main_content'] = 'admin/lesson_schedule/index';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/lesson_schedule/index';
			$this->load->view('dash_template/body',$data) ;
		}
		
		
		
	}
	
	function ajaxPaginationData(){
		
		
		
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['school_id'] = $this->input->post('school_id');
        $conditions['class_id'] = $this->input->post('class_id');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        //total rows count
		$data = $this->admin->getRowslessons($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'lesson_schedule/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$lessons = $this->admin->getRowslessons($conditions);
		$data['query'] = $this->db->last_query(); 
		
		/* echo $this->db->last_query(); */
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$schools = $this->Admin_model->get_schoolsByID($this->input->post('school_id'))[0];
		
		$html ='';
		if(!empty($lessons)){
			foreach($lessons as $le){
			
			$la = $this->admin->check_lessons_assigned($le->lesson_id);
				$checked = '';
							
				if(!empty($la)){
						if($le->lesson_id == $la[0]->lesson_id)
						$checked = 'checked';
					} 
				
		        $html .='<tr>
							<td>'. $le->class_name .'</td>
							<td>'. $le->section_name .' </td>
							<td>'. $le->lesson_name .' </td>
							<td>'. date("d/m/Y", strtotime($le->from_date)) .'</td>
							<td>'. date('d/m/Y', strtotime($le->to_date)) .' </td>
							<td>'. $le->week_day .' </td>';
							
							
							/* if($_SESSION['login_session']['role_id']!= '5'){ */
							$html .='<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									    
									    <a  href="javascript:void(0);"  data-did="'.$le->scheduled_lesson_id .'" data-sid = "'. $schools->id .'" data-tbl="schools" data-ctrl="lesson_schedule"  class="dropdown-item text-danger delete_class">Delete</a>
										
										
									</div>
								</div>
							</td>';
							/* } */



						$html .='</tr>';
		
			}
		}else{
			$html .="No Data Found";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	public function add()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['schools'] = $this->Admin_model->get_schoolsByID($id)[0];
		$data['classes'] = $this->Admin_model->get_ActiveClassesBySchoolID($id);
		$data['lessons'] = $this->admin->get_lessonsBySchool($id);
		
		$data['main_content'] = 'admin/lesson_schedule/add';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body',$data) ;
		}
	}
	
	public function save_data(){
		
		$status = 0;
		$msg= '';
		$url = '';
		/* $sid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST["school_id"]; */
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/lesson_schedule' :  'lesson_schedule/'.$_POST["school_id"];
		
		if($this->input->post('class_id')=='' ){
			$msg = warning_msg('Please Select Class');	
		}else if($this->input->post('lesson_id')=='' ){
			$msg = warning_msg('Please Select Lesson');	
		}else if($this->input->post('from_date')=='' ){
			$msg = warning_msg('Please Select From Date');	
		}else if($this->input->post('to_date')=='' ){
			$msg = warning_msg('Please Select To Date');	
		}else{
			$sec_id = $this->input->post('section_id');
			$clss_id = $this->input->post('class_id');
			$school_id = $this->input->post('school_id');
			$lesson_id = $this->input->post('lesson_id');
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$week_day = $this->input->post('week_day');
			$bulkarray = array();
			
			$academic_year = $this->Admin_model->get_academic_year()[0];
			
			if(!empty($lesson_id)){
				for($i=0;$i<count($lesson_id);$i++){
					
					$cls_sec = explode('-',$clss_id[$i]);
					
					$class_id = $cls_sec[0];
					$section_id = $cls_sec[1];
					$sections = $this->Admin_model->get_classByID($section_id)[0];
					$week_day =  $sections->week_day;
					
					
					/* if($section_id[$i] == ''){
						$sections = $this->Admin_model->get_sectionsByClassID($class_id[$i]);
						if($sections['num'] > 0){
							foreach ($sections['data'] as $value2) {
							$bulkarray[]=array(
								'school_id'=>$school_id,
								'academic_year'=>$academic_year->id,
								'class_id'=>$class_id[$i],
								'section_id'=>$value2['section_id'],
								'lesson_id'=>$lesson_id[$i],
								'from_date'=>$from_date[$i],
								'to_date'=>$to_date[$i],
								'week_day'=>$week_day[$i],
								'status'=>'Not Started',
								'added_by'=>$this->user_id,
							);
							}
						}
					}else{ } */
						$bulkarray[]=array(
						'school_id'=>$school_id,
						'academic_year'=>$academic_year->id,
						'class_id'=>$class_id,
						'section_id'=>$section_id,
						'lesson_id'=>$lesson_id[$i],
						'from_date'=>$from_date[$i],
						'to_date'=>$to_date[$i],
						'week_day'=>$week_day,
						'status'=>'Not Started',
						'added_by'=>$this->user_id,
					);
					
				}
					
				if(!empty($bulkarray)){
					$q = $this->admin->create_bulk_schedules($bulkarray);
					$status = 1;
					$url = base_url().$rid;
					$msg ='<div class="alert alert-success"><strong>Added Successfully</strong></div>';
			
				} else{
					$msg ='<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
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
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $this->input->post('sid'); */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/lesson_schedule' :  'lesson_schedule/'.$_POST["sid"];
		$id = addslashes($this->input->post('i'));
		$res = $this->admin->scheduleInfo($id);
		
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('lesson_schedule');
		
			/* $q = $this->admin->update(array('is_del'=>1),$id); */
			if($result){
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
	
	
/* 	
	public function del($sid,$id)
	{
		$array = array('is_del'=>'1');
		$this->db->set($array);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('lesson_schedule');
		$rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $sid;
		
		redirect('lesson_schedule/index/'.$rid, "refresh");
	} */
	
	public function edit($id){
		
		
		$schooldata = $this->admin->get_studentsByID($id)[0];
		
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['classes'] = $this->admin->get_classesBySchoolID($schooldata->studentschoolid);
		
		$sections= $this->admin->get_sectionsByClassID($schooldata->class_id);
		$data['sections'] = $sections['data'];
		
		$data['school_data'] = $schooldata;
		$data['main_content'] = 'students/edit_students';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body',$data) ;
		}
	}
	
	public function update_school_admin($id)
	{
		
		$rid = ($_SESSION['login_session']['role_id']== '4') ?  '' : $_POST['school_id'];
		
		$this->db->set($_POST);
		$this->db->where(array('id' => $id));
		$result = $this->db->update('users');
		//echo $this->db->last_query();exit;
		
		if($result){
				$this->session->set_flashdata('msg','<div class="alert alert-warning">
					
					  <strong>Updated Successfully</strong></div>');
				redirect($this->url_slug.'/school_admins/'.$rid, "refresh");
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert">

					  

					  Something went wrong, please Try Again Later</div>');
			}
			
		
	}

	
	public function edit_lesson($id){
		$data['lessons'] = $this->admin->get_lessonsByID($id)[0];
		$data['main_content'] = 'lessons/edit';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body',$data) ;
		}
	}
	
	public function view_lesson($id){
		$data['view_lessons'] = $this->admin->get_lessonsByID($id)[0];
		$data['main_content'] = 'lessons/view';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body',$data) ;
		}
	}
	
	function ajGetLessons(){
		
		$res = array('lesson_optns'=>'');
		$lesson_optns='';	
		if(isset($_POST['class_id']) && $_POST['class_id']!=''){
			$class_id = addslashes($_POST['class_id']);		
			$sections = $this->Mentor_model->getLessonsByclass($class_id);
			$lesson_optns.='<option value="">Select Lesson</option>';
			if($sections['num']>0){
				foreach($sections['data'] as $r){
					$lesson_optns.='<option value="'.$r->lesson_id.'">'.$r->lesson_name.'</option>';
				}
			}
			$res = array('lesson_optns'=>$lesson_optns);
		}
		echo json_encode($res);
		 
	 }
	 

	
	
}