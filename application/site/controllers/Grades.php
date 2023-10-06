
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Grades extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		
		$this->user_id = $_SESSION['login_session']['user_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}
		
	}

	public function index()
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2");
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		
		$ary =array();	
	   	
		$ary['school_id'] = $id;
		
		/*total rows count*/
		$res = $this->admin->getGrades($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#usersList';
		$config['base_url']    = base_url().'grades/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->getGrades($ary);
		
		/* echo $this->db->last_query(); */
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['grades_list'] = $posts;	

		
		$data['main_content'] = 'admin/grades/grades_list';
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
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        $conditions['school_id'] = $this->input->post('school_id');
        //total rows count
		$data = $this->admin->getGrades($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'grades/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->getGrades($conditions);
		$data['query'] = $this->db->last_query(); 
		
		//echo $this->db->last_query();
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($users_list)){
			foreach($users_list as $key => $value){
				# code...
				$status_badge = 'bg-success';
				$status = 'Active';
				if ($value->status == '0'){
					$status_badge = 'bg-warning';
					$status = 'Inactive';
				}
				
				$html .='<tr>
							
							<td>'.$value->grade_name.'</td>
							<td>';
							
							
							$html .='</td>
							<td>
								<span class="badge '.$status_badge .' ">'. ucfirst($status) .'</span>
							</td>';
							if($_SESSION['login_session']['role_id'] != 5){
							
							$html .='<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
									   
										<a href="javascript:void(0);"  data-sid="'. $value->school_id .'"  data-did="'. $value->id .'" data-tbl="users" data-ctrl="mentors"  class="dropdown-item text-danger delete_class">Delete</a>
									</div>
								</div>
							</td>';
							
			}
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
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		$data['main_content'] = 'admin/grades/add';
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body',$data) ;
		}
	}

	public function save()
	{
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/grades' :  'grades/'.$_POST["school_id"];

		$status = 0;
		$msg= '';
		$url = '';
		
		if($this->input->post('grade_name')=='' ){
			$msg = warning_msg('Please Add Grade');	
		}else{
			$if_exists = $this->admin->check_if_grade_exists($_POST);
			if ($if_exists != 0) {
				$status = 0;
				$msg= '<div class="alert alert-warning text-center alert-dismiss "> Grade already exists</div>';
			}else{
				$_POST['added_by'] = $this->user_id;
				
				$result = $this->db->insert('grades', $_POST);
				if($result){
					$status = 1;
					$msg= '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
					$url= base_url().$rid;
				}else{
					$msg=  '<div class="alert alert-warning alert-dismissible" role="alert">
						
						Something went wrong, please Try Again Later</div>';
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
	
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST["sid"]; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/grades' :  'grades/'.$_POST["sid"];

		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		$res = $this->admin->gradeInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('id' => $id));
			$result = $this->db->update('grades');
		
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
	

	
	
}