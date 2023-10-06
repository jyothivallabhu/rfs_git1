
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mentor_trails extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Mentor_model");
		if (!$this->session->login_session)
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
			
		$data['main_content'] = 'mentor_views/trails_submitted';
		$this->load->view('school_template/body', $data);
		
	}
   
   function getAll(){
		$limit = isset($_POST['start']) ? $_POST['start'] : '';
		$offset = isset($_POST['length']) ? $_POST['length']: '';
		$draw = isset($_POST['draw']) ? $_POST['draw']: '';
		$sid = $_POST['section_id'];
		
		$search =  $_POST['search'];
		$seachtext = $search['value'];
		
		
		
		$select = 'tm.*,concat(u.first_name ," ", u.last_name) as teacher_name,s.name as school_name,l.lesson_name,c.class_name';
		/* $column = array('s.name,c.class_name, l.lesson_name '); */
		$column = array('tm.id','s.name','c.class_name','l.lesson_name');
		$order = array('tm.id' => 'desc');
		$where=" sm.mentor_id = '$this->uid' AND tm.type = 'trail' and tm.is_del = 0 ";
		
		
		$join = array();
		$join[] = array('table_name'=>'school_mentors as sm','on'=>'sm.school_id = tm.school_id');
		$join[] = array('table_name'=>'schools as s','on'=>'s.id=tm.school_id');
		$join[] = array('table_name'=>'classes as c','on'=>'c.c_id = tm.class_id');
		$join[] = array('table_name'=>'users as u','on'=>'u.id = tm.added_by');
		$join[] = array('table_name'=>'lessons as l','on'=>'l.lesson_id = tm.lesson_id');
		$tb_name = 'trial_and_mentoring as tm';
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
			
			$feedback = $req->feedback=='1'?'Given':'Pending';
			if($req->feedback=='1'){
				$feedbackstatus = '<a class="badge badge-pill badge-cyan font-size-12">'.$feedback.'</a>';	
			}else{
				$feedbackstatus = '<a class="badge badge-pill badge-gold font-size-12">'.$feedback.'</a>';	
			}
			
			$action='<a href="'.base_url('view_mentor_trial/'.$req->id).'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a><br>';	
			
			
			$i = $i +1;
			$row[] = '<img src="'. base_url().$req->image1 .' " height="60" width="60" />';
			$row[] = $req->lesson_name;
			$row[] = $req->teacher_name;
			$row[] = $req->class_name;
			$row[] = $req->school_name;
			$row[] = $feedbackstatus;
			$row[] = date('d-m-Y',strtotime($req->created_at));
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


	function view(){
		$t_id = addslashes($this->uri->segment('2'));
		if($t_id!="" ){
			$res = $this->Mentor_model->getInfo($t_id);
			
			if($res['num']==1){
				$comm = $this->Mentor_model->getcomments($t_id);
				
				$data['main_content'] = 'mentor_views/view_trail_mentoring';
				$data['view_data'] = $res['data'];			
				$data['comments'] = $comm['data'];			
				$this->load->view('school_template/body',$data);
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect('mentor_trails');
			}	
		}else{
			redirect('mentor_trails');
		}	
	}
	
	
	function update_status(){
		
		
		$trail_id = addslashes($_POST['id']);
		$status = addslashes($_POST['status']);
		if($trail_id!="" ){
			$res = $this->Mentor_model->getInfo($trail_id);
			if($res['num']==1){
				$this->db->set(array('status' => '2'));
				$this->db->where(array('id' => $trail_id));
				$result = $this->db->update('trial_and_mentoring');
					
				echo '<div class="alert alert-success alert-dismissible" role="alert">
						 Request Has been Approved</div>';
			}else{
				echo '<div class="alert alert-success alert-dismissible" role="alert">
						 Invalid request</div>';
			}	
		}else{
			redirect('mentor_continuous_mentoring');
		}	
	}
	public function save_feedback()
	{
		$status = 0;
		$msg= '';
		$url = '';
	
		
		if($this->input->post('feedback')=='' ){
			$msg = warning_msg('Please Enter Some Feedback');	
		}else{
			
			$feedbackReceivedfrom = $this->input->post('receivedfrom');
			$trail_id = $this->input->post('trail_id');
			$teacher_id = $this->input->post('teacher_id');
			
			$save_data = array(
					'trial_and_mentoring_id'=>trim($_POST['trail_id']),
					'from_id'=>$this->uid,
					'to_id'=>trim($teacher_id),
					'comments'=>trim($_POST['feedback']),
				);
				
			
				$q = $this->db->insert('comments', $save_data);
				
				if($q){
					
					$this->db->set(array('feedback' => '1'));
					$this->db->where(array('id' => $trail_id));
					$result = $this->db->update('trial_and_mentoring');
					
					$view_link = ($feedbackReceivedfrom == 'Trails') ? 'view_teacher_trial' : 'view_mentoring';
					$t = $this->admin->getTeacherId($teacher_id);
						if(!empty($t)){
							$teacher = $t[0];
							$insertData['non_xss'] = array(			
								'notifications'=>'Feedback Notification',
								'notification_type'=>'new_artwork',
								'notification_root_id'=>$trail_id,
								'school_id'=>$teacher->school_id,
								'view_link'=>$view_link.'/'.$trail_id,
								'user_id'=>$teacher->id,
							);
							$n = $this->db->insert('notifications',$insertData['non_xss']);
							$email = $teacher->email;
							/* $e = $this->comm_fun->send_mail($email,$subject,$html); */
						}
						
						
					$status = 1;
					$msg = '<div class="alert alert-success alert-dismissible" role="alert">
						  Added Successfully</div>';
						  
					$url = ($feedbackReceivedfrom == 'Trails') ? base_url().'view_mentor_trial/'.$trail_id : base_url().'view_continuous_mentoring/'.$trail_id;
					
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