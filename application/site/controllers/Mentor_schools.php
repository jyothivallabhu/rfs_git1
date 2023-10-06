
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mentor_schools extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Mentor_model");
		if (!$this->session->login_session )
			redirect('mentor_login/Login');
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
		$this->load->library('datatblsel_sel');
		$this->logo = 'assets/images/rfslogo.png';
	}


	public function index(){
			
		$data['main_content'] = 'mentor_views/schools_assigned';
		$this->load->view('school_template/body', $data);
		
	}
   
   function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$sid = $_POST['section_id'];
		
		$select = 's.*,case when (logo is null or logo = "") then "'.base_url().'assets/images/school.png" else concat("'.base_url().'",logo) end as "image_path"';
		$column = array('name');
		$order = array('s.id' => 'asc');
		$where="u.id = $this->uid and sm.is_del = 0 and s.is_del = 0 and s.status=1";
		$join = array();
		$join[] = array('table_name'=>'school_mentors as sm','on'=>'s.id=sm.school_id');
		$join[] = array('table_name'=>'users as u','on'=>'u.id = sm.mentor_id');
		$tb_name = 'schools as s';
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
			
			$i = $i +1;
			$row[] = '<a href="'. base_url('school_dashboard/'.$req->id) .'" target=_blank><img src="'. $req->image_path .' " height="60" width="60"  /> </a>';
			$row[] = '<a href="'. base_url('school_dashboard/'.$req->id) .'" target=_blank >'.$req->name.'</a>';
			$row[] = $req->city;
			$row[] = $status;
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

	function view(){
		$t_id = addslashes($this->uri->segment('3'));
		if($t_id!="" ){
			$res = $this->admin->get_schoolsByID($t_id);
			if($res['num']==1){
				$data['main_content'] = 'mentor_views/view_School';
				$data['view_data'] = $res['data'];			
				$this->load->view('school_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect($this->url_slug.'/mentor_schools');
			}	
		}else{
			redirect($this->url_slug.'/mentor_schools');
		}	
	}
	
	
}