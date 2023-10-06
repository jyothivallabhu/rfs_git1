
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class school_mentors extends CI_Controller
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
	   	
		$ary['school_id'] = $id ;
		
		/*total rows count*/
		$res = $this->admin->get_school_mentors($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		/*pagination configuration*/
		$config['target']      = '#usersList';
		$config['base_url']    = base_url().'school_mentors/ajaxPaginationSMentorData';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->get_school_mentors($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['mentors'] = $posts;	
		
		//$this->load->view('dash_template/body',$data);	
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$data['main_content'] = 'admin/school_mentors/index';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'admin/school_mentors/index';
			$this->load->view('dash_template/body', $data);
		}
		
	}
	 
	 function ajaxPaginationSMentorData(){
        $conditions = array();
		$page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
		
		/* $id = ($_SESSION['login_session']['role_id']== '4') ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("2"); */
		
        $conditions['search_text'] = $this->input->post('keyword');
        $conditions['school_id'] = $this->input->post('school_id');
        $conditions['sortby'] = $this->input->post('sortby');
        $conditions['perpage'] = $this->input->post('perpage');
        $conditions['status'] = $this->input->post('status');
        //total rows count
		$data = $this->admin->get_school_mentors($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'school_mentors/ajaxPaginationSMentorData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$users_list = $this->admin->get_school_mentors($conditions);
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
							<td><img src="'. $value->image_path .' " height="60" width="60"  /> </td>
							<td>'.$value->first_name.' '.$value->last_name.'</td>
							<td>'.$value->email .'</td>
							
							<td>'.$value->phone.'</td>
							<td>
								<span class="badge '.$status_badge .' ">'. ucfirst($status) .'</span>
							</td>';
							/* if($_SESSION['login_session']['role_id'] != 5){ */
								
							 $html .='<td class="text-end">
								<div class="dropdown">
									<a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
										<i class="bi bi-three-dots"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										
										<a href="javascript:void(0);"  data-did="'.$value->id .'" data-sid = "'.$value->school_id.'" data-tbl="users" data-ctrl="school_mentors"  class="dropdown-item text-danger delete_class">Delete</a>
										
										
									</div>
								</div>
							</td>';
							/* } */

						 $html .='</tr>';
		
			}
		}else{
			$html .="No Records to display";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	public function add($id = null)
	{
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		$data['mentors'] = $this->admin->getallActiveMentors();
		$data['school_mentors'] = $this->admin->get_all_school_mentors($id );

		$data['main_content'] = 'admin/school_mentors/add';
		
		if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
			$this->load->view('school_template/body', $data);
		}else{
			$this->load->view('dash_template/body', $data);
		}
		
		
		/* $this->load->view('dash_template/body',$data); */
	}
	public function save_school_mentor()
	{
		$status = 0;
		$msg= '';
		$url = '';
		
		/* $rid = ($_SESSION['login_session']['role_id']== '4') ?  '' :  $_POST['school_id']; */
		$rid = (isset($_SESSION['login_session']['school_id'])) ?  $this->url_slug.'/school_mentors/' :  'school_mentors/'.$_POST["school_id"];
		
		$extractemail = explode('-',$_POST['mentor_id']);
	
		if($this->input->post('mentor_id')=='' ){
			$msg = warning_msg('Please Select Mentor');	
		}else{
			
		
			$if_exists = $this->admin->check_email_getdata($extractemail[1]);
			if ($if_exists['num'] >= 1) {
				$user_id = $if_exists['data']->id;
				
				$if_exists2 = $this->admin->check_school_mentor($_POST['school_id'] ,$user_id);
				if ($if_exists2['num'] == 0) {
				
					$array = array(
						'school_id' => $_POST['school_id'],
						'mentor_id' => $user_id,
						'status'=>'1',
						'is_del'=>'0',
						'added_by'=>$this->user_id,
						);
					/* $this->db->set($array);
					$this->db->where(array('id' => $extractemail[0]));
					$result = $this->db->update('users'); */
					
					$result = $this->db->insert('school_mentors', $array);
					if($result){
						$status = 1;
						$msg= '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
						$url = base_url().$rid;
					}else{
						$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
					}	
				}else{
					$msg = '<div class="alert alert-warning text-center alert-dismiss "> Mentor already exists</div>';
				}
			}else{
				$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
			}
		}
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
		
	}
	
	public function del()
	{
		
		$redirectid = (isset($_SESSION['login_session']['school_id'])) ?  '' :  $this->input->post('sid');
		$ary['success']=false;
		$ary['msg']='';
		$ary['url']='';
		$id = addslashes($this->input->post('i'));
		$sid = addslashes($this->input->post('sid'));
		$res = $this->admin->userInfo($id);
		if($id=="" || $res['num']!=1){
			$ary['msg']=warning_msg('Invalid request, please reload the page and try again');
		}else{
			$array = array('status' => '0', 'is_del'=>'1');
			$this->db->set($array);
			$this->db->where(array('school_id' => $sid,'mentor_id' => $id));
			$q = $this->db->update('school_mentors');
			if($q){
				$msg = '<div class="alert alert-warning">
				  
				  <strong>Deleted Successfully</strong></div>';
				$this->session->set_flashdata('success',$msg);
				$ary['msg']=$msg;			
				$ary['success']=true;			
				//$ary['url']=base_url().$this->url_slug.'school_mentors/'.$redirectid;
			}else{				
				$ary['msg'] = warning_msg('Unable to delete Please  Try again');
			}
		}		
		echo json_encode($ary);	
	}

	
	
	
}