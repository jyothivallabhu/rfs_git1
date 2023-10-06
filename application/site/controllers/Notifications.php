
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notifications extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->load->model("Notifications_model");
		if (!$this->session->login_session )
			redirect('mentor_login/Login');
		
		$this->url_slug =  (isset($_SESSION["login_session"]["url_slug"]) ? $_SESSION["login_session"]["url_slug"] : '');
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->role_id = $_SESSION['login_session']['role_id'];
		
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
		$this->logo = 'assets/images/rfslogo.png';
	}


	function ajNotificationList(){
			 $output = '';
			 
			 if(isset($_POST['viewed']) && $_POST['viewed']!=""){
				$array = array('seen'=>'1');
					$this->db->set($array);
					$this->db->where(array('seen' => 0, 'note_id' => $_POST['viewed']));
					$result = $this->db->update('notifications'); 
					/* $count = 0; */
			 }else{
			 
				$res = $this->Notifications_model->getNotificationList();
				$noti = $this->Notifications_model->getUnseenNotificationCount();
				/* echo $this->db->last_query(); */
				$noti_count = $noti['num'];
				/* $count = $res['num']; */
				if($res['num'] >0){
					foreach($res['data'] as $r){
						if($r->seen == 0){
							$background = 'style="background-color: #f2f2f2"';
						}else{
							$background = '';
						}
						
						
						if($this->role_id == 4 || $this->role_id == 10 || $this->role_id == 9){
							$view = $this->url_slug.'/'.$r->view_link;
						}else{
							$view = $r->view_link;
						}
						
						
						$output .= '<div class="mainnote">
									 <span  data-href= "'.base_url().$view.'" data-note_id= "'.$r->note_id.'" class="dropdown-item d-block p-15 border-bottom notif_li" '.$background .'>
										<div class="d-flex">
											<div class="avatar avatar-blue avatar-icon">
												<i class="anticon anticon-mail"></i>
											</div>
											<div class="m-l-15">
												<p class="m-b-0 text-dark">'.$r->notifications.'</p>
												<p class="m-b-0"><small>'.date('d-m-Y - H:i:A',strtotime($r->created_at)).' ago</small></p>
											</div>
										</div>
									  </span>
									</div>';
					}		
				}else{
					 $output .= '<a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
										<div class="d-flex">
											
											<div class="m-l-15">
												<p class="m-b-0 text-dark">No Data Found</p>
											</div>
										</div>
									</a>';
				}
				$data = array(
				   'notification' => $output,
				   'unseen_notification'  => $noti_count
				);
				echo json_encode($data);
		 }
	}
   
	/* function view_noti(){
		
	} */
	
	
}