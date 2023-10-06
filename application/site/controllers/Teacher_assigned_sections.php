
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Teacher_assigned_sections extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Teacher_students_model");
		if (!$this->session->login_session )
			redirect('Login');
		
	
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = $_SESSION['login_session']['school_id'];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
			//$this->load->library('datatblsel_sel');
			$this->load->library('Ajax_pagination');
			$this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
			$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
	}

	
	
	
	function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		
		
		
		$select = "GROUP_CONCAT(CONCAT(c.class_name, ' -', CAST(s.section_name AS CHAR(15)), ' -', CAST(s.section_id AS CHAR(15)), '') SEPARATOR ', ') as sections,c.c_id,s.section_id";
		$column = array('sa.id');
		$order = array('sa.id' => 'asc');
		$where=" sa.teacher_id = $this->uid ";
		$join = array();
		$join[] = array('table_name'=>'sections as s','on'=>'FIND_IN_SET(s.section_id, sa.section_ids) > 0');
		$join[] = array('table_name'=>'classes as c','on'=>'c.c_id = s.class_id'); 
		$tb_name = 'teacher_sections_assigned as sa';
		$list = $this->datatblsel_sel->get_datatables($select,$column,$order,$tb_name,$join,$where);
		$data = array();
		$no = $limit;
		$i = 0;
		/* echo $this->db->last_query(); */
		foreach ($list as $req) {  
			$s =  explode (',',$req->sections);
			foreach($s as $s1){
				$details = explode('-',$s1);
				
				//$students_count =  $this->Teacher_students_model->getstudentscount($details[2]);
				$count_data = $this->db->query("SELECT COUNT(*) as total_students FROM students s join student_academic_details as sa ON s.student_id = sa.sd_student_id  WHERE sa.sd_section_id = '$details[2]' AND sa.sd_school_id = $this->school_id  ")->row_array();
				$total_count = $count_data['total_students'];
		
				$no++;
				$row = array();
				$action='<a href="'.base_url($this->url_slug.'/teacher_students/'.$details[2]).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>';	
				
				$i = $i +1;
				
				$row[] = $details[0];
				$row[] = $details[1];
				$row[] = $total_count;
				$row[] = $action;
				$data[] = $row;
			}
		}
		$output = array(
				"draw" => $draw,
				"recordsTotal" => $this->datatblsel_sel->count_all($select,$tb_name,$join),
				"recordsFiltered" => $this->datatblsel_sel->count_filtered($select,$column,$order,$tb_name,$join,$where),
				"data" => $data,
			);
		echo json_encode($output);
	}
	
	public function index()
	{
		
		
		
		 $ary =array();	
		 $ary['class_id'] ='all';	
	   	   
		/*total rows count*/
		$res = $this->Teacher_students_model->getAassignedSections($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#mentorsList';
		$config['base_url']    = base_url().'Teacher_assigned_sections/ajaxpagination';
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
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		
		
		
		
		$data['main_content'] = 'teacher_views/sections';
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
        $conditions['academic_year'] = $this->input->post('academic_year');
        $conditions['class_id'] = $this->input->post('class_id');
        //total rows count
		
		$academic_year =$conditions['academic_year'] ; 
		
		$this->session->set_userdata('student_academic_year', $this->input->post('academic_year'));
	
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
			$where ='';
			if($conditions['class_id'] != '' ){
				$where = 'and sa.sd_class_id = '.$conditions['class_id'];
			}
			
				$count_data = $this->db->query("SELECT COUNT(*) as total_students FROM students s join student_academic_details as sa ON s.student_id = sa.sd_student_id join academic_year as a on a.id = sa.sd_academic_year WHERE sa.sd_section_id = '$req->section_id' AND sa.sd_school_id = $this->school_id and sa.sd_academic_year = '".$conditions['academic_year']."' $where  ")->row_array();
				
				$total_count = $count_data['total_students'];
				
		        $html .='<tr>
							<td>'.$req->class_name.'</td>
							<td>'.$req->section_name .'</td>
							
							<td>'.$total_count.'</td>
							
							
							<td>
								<a href="'.base_url($this->url_slug.'/teacher_students/'.$req->section_id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
							</td>

						</tr>';
				
			}
		}else{
			$html .="<tr><td>No Data Found</td></tr>";
		}
		
		
		
		$data['html']=$html;
		echo json_encode($data);
    }
	

	
	public function view_students($sid)
	{
		$data['section_id'] = $this->uri->segment(3);
		$data['main_content'] = 'teacher_views/students';
		$this->load->view('school_template/body', $data);
	}
	

	
	
}