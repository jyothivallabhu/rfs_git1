
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
		$res = $this->Teachers_artwork_model->getAllArtWorks($ary);
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
		$posts = $this->Teachers_artwork_model->getAllArtWorks($ary);
	
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['classes'] = $this->admin->get_allclasses($this->school_id);
		$data['main_content'] = 'teacher_views/artwork_list';
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
        //total rows count
	
		$data = $this->Teachers_artwork_model->getAllArtWorks($conditions);
		
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
		$list = $this->Teachers_artwork_model->getAllArtWorks($conditions);
		$data['query'] = $this->db->last_query(); 
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($list)){
			foreach ($list['data'] as $req) {  
			
			
				$count_data = $this->Teachers_artwork_model->getartworksCount($req->section_id,$req->lesson_id);
				
				$total_count = $count_data[0]->total_lessons;
				
		        $html .='<tr>
							<td>'.$req->class_name.'</td>
							<td>'.$req->section_name .'</td>
							<td>'.$total_count.'</td>
							<td>
								<a href="'.base_url($this->url_slug.'/section_artwork/'.$req->section_id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
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
		$data['artworks'] =  $this->Teachers_artwork_model->getArtWorksByID($this->uri->segment(3));
		echo $this->db->last_query();
		$data['section_id'] = $this->uri->segment(3);
		$data['main_content'] = 'teacher_views/view_artwork';
		$this->load->view('school_template/body',$data);
	}
	
	
	
	public function section_artwork()
	{	
		//$data['artworks'] =  $this->Teachers_artwork_model->getArtWorksBySections($this->uri->segment(3));
		$data['section_id'] = $this->uri->segment(3);
		$data['main_content'] = 'teacher_views/artwork_sectionwise';
		$this->load->view('school_template/body',$data);
	} 
	
	function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$sid = $_POST['section_id'];
		$select = 'a.id,l.lesson_id,l.lesson_name, s.first_name, s.last_name, c.class_name,sec.section_name, a.*,case when (artwork_upload is null or artwork_upload = "") then "'.base_url().'assets/images/user.png" else concat("'.base_url().'",artwork_upload) end as "image_path"';
		$column = array('lesson_name');
		$order = array('a.id' => 'asc');
		$where=" a.is_del =  '0' ";
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
			
			$status = $req->status=='1'?'Active':'Inactive';
			if($req->status=='1'){
				$status = '<a class="badge badge-pill badge-cyan font-size-12">'.$status.'</a>';	
			}else{
				$status = '<a class="badge badge-pill badge-gold font-size-12">'.$status.'</a>';	
			}
			
			$action='<a href="'.base_url($this->url_slug.'/view_artwork/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>';	
			
			
			
			$i = $i +1;
			$row[] = $req->lesson_name;
			$row[] = $req->class_name;
			$row[] = $req->section_name;
			$row[] = $req->first_name.' '.$req->last_name;
			$row[] = '<img src="'. $req->image_path .' " height="60" width="60" />';
			$row[] = $status;
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

}