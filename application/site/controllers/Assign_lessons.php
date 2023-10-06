
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Assign_lessons extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Assign_lessons_model", 'admin');
		$this->load->model("Admin_model");
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
				
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		$data['schools'] = $this->Admin_model->get_schoolsByID($id)[0];
		$data['classes'] = $this->Admin_model->get_ActiveClassesBySchoolID($id);
		
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
		$config['base_url']    = base_url().'assign_lessons/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->getRowslessons($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['lessons'] = $posts;	
		$data['main_content'] = 'admin/assign_lessons/index';
		/* $this->load->view('dash_template/body',$data) ; */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
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
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['class_id'] = $this->input->post('class_id');
        //total rows count
		$data = $this->admin->getRowslessons($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'assign_lessons/ajaxPaginationData';
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
		
		//echo $this->db->last_query();
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$schools = $this->Admin_model->get_schoolsByID($this->input->post('school_id'))[0];
		
		$data['classes'] = $this->Admin_model->get_classesBySchoolID($this->input->post('school_id'));
		
		/* $la = $this->admin->get_lessons_assigned($schools->id);
						
		$user_modules = explode(',', $la[0]->lesson_id); */
		
		$url = (isset($_SESSION['login_session']['url_slug']))  ?  $_SESSION['login_session']['url_slug'].'/' : '';
					
		$html ='';
		if(!empty($lessons)){
			foreach($lessons as $le){
			
			/* $la = $this->admin->get_lessons_assigned($this->input->post('school_id')); */
				$checked = '';
				/* if(in_array($le->lesson_id, $user_modules)){
					$checked = 'checked';
				} */
				
				if(isset($_SESSION['login_session']['school_id'])) {
					$url = $_SESSION['login_session']['url_slug'].'/view_lesson/'.$le->lesson_id ;
				}else{
					 $url = 'lessons/view_lesson/'.$le->lesson_id;
				} 
				
		        $html .='<tr>
					<input type="hidden" name="school_id" id="school_id" value="'. $schools->id.'">
						
							<td>'.$le->class_name.'</td>
							<td>'.$le->lesson_name.'</td>
							<td>'. $le->medium .'</td>
							
							<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									    <a href="'. base_url().$url.'" class="dropdown-item">View</a>';
										
										/* if($_SESSION['login_session']['role_id']!= '5'){ */
											$html .='<a  href="javascript:void(0);"  data-did="'. $le->lesson_assignId .'" data-tbl="lessons_assigned" data-ctrl="assign_lessons"  data-sid = "'.$schools->id .'" class="dropdown-item text-danger delete_class">Delete</a>';
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
	
	public function add($id = null)
	{
		$id = ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['schools'] = $this->Admin_model->get_schoolsByID($id)[0];
		
		$data['classes'] = $this->Admin_model->get_ActiveClassesBySchoolID($id);
		$data['lessons'] = $this->admin->getAllLessons();
		
		
		$data['main_content'] = 'admin/assign_lessons/add';
		/* $this->load->view('dash_template/body',$data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	
	public function add2($id = null)
	{
		$id = ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['schools'] = $this->Admin_model->get_schoolsByID($id)[0];
		
		$data['classes'] = $this->Admin_model->get_ActiveClassesBySchoolID($id);
		$data['lessons'] = $this->admin->getAllLessons();
		
		
		$data['main_content'] = 'admin/assign_lessons/add2'; 
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	
	
	
	
	
	
	public function save_lesson_ids(){
		/* $lesson_ids = implode(",", $this->input->post('lesson_ids')); */
		
		$status = 0;
		$msg= '';
		$url = '';
		/* $sid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST["school_id"]; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/assign_lessons' :  'assign_lessons/'.$_POST["school_id"];
		
		$lesson_id = $this->input->post('lesson_id');
		$class_id = $this->input->post('class_id');
		if($this->input->post('lesson_id')=='' ){
			$msg = warning_msg('Please Select Atleast one lesson');	
		}elseif($this->input->post('class_id')=='' ){
			$msg = warning_msg('Please Select Class');	
		}else{
			
			$academic_year = $this->Admin_model->get_academic_year()[0];
			
			/* for($i=0;$i<count($lesson_id);$i++){ */
				
				$if_exists = $this->admin->check_if_lessonsassigned_exists($_POST['school_id'],$lesson_id,$class_id);
				if ($if_exists == 0) {
					$lessonsassigned = array(
					'lesson_id'=>$lesson_id,
					'class_id'=>$class_id,
					'academic_year'=>$academic_year->id,
					'added_by'=>$this->user_id,
					'school_id'=>$this->input->post('school_id')
					);
					$result = $this->db->insert('lessons_assigned', $lessonsassigned);
					if($result){
						$status = 1;
						$msg = '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
						$url = base_url().$rid;
					}else{
						$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
					}
				}else{
						$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Lesson already assigned</div>';
					}	
					/* } */
			} 
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}
	
	public function save_lesson_id2(){
		/* $lesson_ids = implode(",", $this->input->post('lesson_ids')); */
		
		/* print_r($_POST);exit; */
		$status = 0;
		$msg= '';
		$url = '';
		/* $sid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST["school_id"]; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/assign_lessons' :  'assign_lessons/'.$_POST["school_id"];
		
		$lesson_id = $this->input->post('lesson_id');
		$class_id = $this->input->post('class_id');
		if($this->input->post('lesson_id')=='' ){
			$msg = warning_msg('Please Select Atleast one lesson');	
		}elseif($this->input->post('class_id')=='' ){
			$msg = warning_msg('Please Select Class');	
		}else{
			
			$academic_year = $this->Admin_model->get_academic_year()[0];
			$bulkarray = array();
			 if(!empty($lesson_id)){
				for($i=1;$i<=count($lesson_id);$i++){
					
					$if_exists = $this->admin->check_if_lessonsassigned_exists($_POST['school_id'],$lesson_id[$i],$class_id[$i]);
			 
			 
					if ($if_exists == 0) {
						$bulkarray[] = array(
						'lesson_id'=>$lesson_id[$i],
						'class_id'=>$class_id[$i],
						'academic_year'=>$academic_year->id,
						'added_by'=>$this->user_id,
						'school_id'=>$this->input->post('school_id')
						);
					}
					
				}
			
			
					if(!empty($bulkarray)){
						$q = $this->admin->create_bulk_lessons_assigned($bulkarray);
						$status = 1;
						$url = base_url().$rid;
						$msg ='<div class="alert alert-success"><strong>Added Successfully</strong></div>';
				
					} else{
						$msg ='<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
					} 
			  
				}else{
						$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Lesson already assigned</div>';
					}	
					
					
			} 
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}
	public function edit_lesson($id){
		$data['lessons'] = $this->admin->get_lessonsByID($id)[0];
		$data['main_content'] = 'admin/lessons/edit';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	
	public function view_lesson($id){
		$data['view_lessons'] = $this->admin->get_lessonsByID($id)[0];
		$data['main_content'] = 'admin/lessons/view';
		/* $this->load->view('dash_template/body', $data); */
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	
public function del()
	{
		
		/* $redirectid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $this->input->post('sid'); */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/assign_lessons' :  'assign_lessons/'.$_POST["sid"];
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		$res = $this->admin->assignedlessonInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$q = $this->db->update('lessons_assigned');
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
	function getLessons(){
		$res = array('sections_optns'=>'');
		$sections_optns='';	
		if(isset($_POST['class_id']) && $_POST['class_id']!=''){
			$class_id = addslashes($_POST['class_id']);		
			$school_id = addslashes($_POST['school_id']);		
			$assigned_lessons = $this->admin->getAssignedLessonsByClassID($class_id,$school_id)[0];
			
			$ass = $assigned_lessons->lesson_id;
			$ass_lsn = explode(',', $ass);
			$lessons = $this->admin->getLessons();
			
			$sections_optns.='<option value="">Select Lesson</option>';
			if(!empty($lessons)){
				foreach($lessons as $key => $value){
					$sel = (in_array($value->lesson_id,$ass_lsn )) ?  'disabled' : '';
					$sections_optns.='<option value="'.$value->lesson_id .'" '.$sel.' >'.ucwords($value->lesson_name).'</option>';
				}
			}
			$res = array('sections_optns'=>$sections_optns);
		}
		echo json_encode($res);
	}

	
	
}