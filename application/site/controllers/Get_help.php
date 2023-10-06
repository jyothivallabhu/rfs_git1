
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_help extends CI_Controller {

	
	function __Construct(){
		parent:: __Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
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
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}else{
			$this->logo =  'assets/images/logo/rainbowfish-logo1x.png';
		}
	}
	
	
	
	public function index(){
		
		$data['main_content'] = 'get_help';
		
		if((isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !='') || $_SESSION["login_session"]["role_id"] == 5){	
			$this->load->view('school_template/body', $data);
		} else{
			$this->load->view('dash_template/body', $data);
		}
		
	}
	function get_help_list(){
		
		$ary =array();	
	   	
		/*total rows count*/
		$res = $this->admin->get_help($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#usersList';
		$config['base_url']    = base_url().'get_help/ajaxPaginationData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_help($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['list'] = $posts;	
		$data['main_content'] = 'admin/get_help_list';
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
	}
	
	
	function view(){
		$t_id = addslashes($this->uri->segment('3'));
		if($t_id!="" ){
			$res = $this->admin->gethelpInfo($t_id);
			if($res['num']==1){
				
				$data['main_content'] = 'admin/view_get_help';
				$data['view_data'] = $res['data'];			
				$this->load->view('dash_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect('get_help_list');
			}	
		}else{
			redirect('get_help_list');
		}	
	}
	
	
	public function save()
	{
		
		$status = 0;
		$msg= '';
		$url = '';
		
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/get_help' :  'get_help/';
		
		if($this->input->post('title')=='' ){
			$msg = warning_msg('Please Enter Title');	
		}else if($this->input->post('description')=='' ){
			$msg = warning_msg('Please Enter description');	
		}else{
			
			$save_data = array(
					'title'=>trim(ucwords($_POST['title'])),
					'description'=>trim(ucfirst($_POST['description'])),
					'user_id'=>$this->user_id,
					'added_date'=>date('Y-m-d h:i:s'),
				);
				
				
			
			if(isset($_FILES['attachment']) && !empty($_FILES) && $_FILES['attachment']['name']!=""){		
				$trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				$size1 = $_FILES['attachment']['size'];
				$file_name1 = $_FILES['attachment']['name'];
				$path_parts1=pathinfo($_FILES['attachment']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$save_data['attachment']=$trgt1.$file1;
				move_uploaded_file($_FILES['attachment']['tmp_name'],$trgt1.$file1); 
			 }
			
				$q = $this->db->insert('get_help', $save_data);
				if($q){
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
					$url = base_url($rid);
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