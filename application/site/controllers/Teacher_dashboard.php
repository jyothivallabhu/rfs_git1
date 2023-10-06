
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Teacher_dashboard extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		
		$this->headerdata = $this->comm_fun->header_data();
		
		$this->load->model("Admin_model", 'admin');
		$this->load->model("Teachers_model");
		$this->load->model("Mentor_model");
		$this->load->model("Teachers_artwork_model");
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->role_id =  $_SESSION["login_session"]["role_id"];
		$this->uid = $_SESSION['login_session']['user_id'];
		$this->school_id = $_SESSION['login_session']['school_id'];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->modules = $_SESSION['login_session']['modules'];
		
		$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
		$this->logo = $this->school_data->logo;
	}


	public function dashboard(){
			
		
		$trailclass = 'all';
		$seccount = $this->admin->get_sectionsCountBySchoolId($this->uid)[0];
		$data['sectionscount'] = $seccount->seccount;
		
		$trailSubmitted = $this->Teachers_model->getTeacherTrailCount('trail','1',$this->uid,$trailclass)[0];
		$data['trailsubmittedcount'] = $trailSubmitted->totalcount; 
		
		$trailnotstarted = $this->Teachers_model->getTeacherTrailCount('trail','0',$this->uid,$trailclass)[0];
		$data['trailnotstartedcount'] = $trailnotstarted->totalcount; 
		
		$trailapproved = $this->Teachers_model->getTeacherTrailCount('trail','2',$this->uid,$trailclass)[0];
		$data['trailapprovedcount'] = $trailapproved->totalcount; 
		
		$trailfeedbakgiven = $this->Teachers_model->getTeacherTrailFeedbackGiven('mentoring','2',$this->uid,$trailclass)[0];
		$data['trailfeedbakgivencount'] = $trailfeedbakgiven->totalcount; 
		
		
		$mentoringfeedbakgiven = $this->Teachers_model->getTeacherTrailFeedbackGiven('mentoring','2',$this->uid,$trailclass)[0];
		$data['mentoringfeedbakgivencount'] = $mentoringfeedbakgiven->totalcount; 
		
		
		
		
		$mentoringsubmitted = $this->Teachers_model->getTeacherTrailCount('mentoring','1',$this->uid,$trailclass)[0];
		$data['mentoringsubmitted'] = $mentoringsubmitted->totalcount; 
		
		$mentoringapproved = $this->Teachers_model->getTeacherTrailCount('mentoring','2',$this->uid,$trailclass)[0];
		$data['mentoringapproved'] = $mentoringapproved->totalcount; 
		
		
		$data['lessons'] = $this->admin->get_teacherclasseswiselessons($this->school_id);
		
		$data['classes'] = $this->admin->get_teacherclasses($this->school_id);
		
		$cal_sech_data = $this->Teachers_model->getTeacherScheData();
		/* echo $this->db->last_query(); */
		$data['calendar_schedule_date']= $cal_sech_data['data'];
		
		$cal_act_data = $this->Teachers_model->getSchoolactivityData();
		
		$data['cal_activity_data']= $cal_act_data['data'];
		
		$ary['class_id'] = '';
		$ary['lesson_id'] = '';
		   
		$res = $this->Teachers_artwork_model->getArtworkByclassandlessons($ary);
		$data['artdata'] = $res;
				
		$data['main_content'] = 'teacher_views/dashboard';
		$this->load->view('school_template/body', $data);
		
	}
	
	function ajTrailCounts(){
		if(isset($_POST['class_id']) && $_POST['class_id']!=""){
		$trailclass = addslashes($_POST['class_id']);
		$trailSubmitted = $this->Teachers_model->getTeacherTrailCount('trail','1',$this->uid,$trailclass)[0];
		$trailsubmittedcount = $trailSubmitted->totalcount; 
		
		$trailnotstarted = $this->Teachers_model->getTeacherTrailCount('trail','0',$this->uid,$trailclass)[0];
		$trailnotstartedcount = $trailnotstarted->totalcount; 
		
		$trailapproved = $this->Teachers_model->getTeacherTrailCount('trail','2',$this->uid,$trailclass)[0];
		$trailapprovedcount = $trailapproved->totalcount;

			$data = array(
				   'trailsubmittedcount' => $trailsubmittedcount,
				   'trailnotstartedcount' => $trailnotstartedcount,
				   'trailapprovedcount'  => $trailapprovedcount
				);
				echo json_encode($data);
		}
	}
   function ajCMentoringCounts(){
		if(isset($_POST['class_id']) && $_POST['class_id']!=""){
		$trailclass = addslashes($_POST['class_id']);
		
		$mentorngsubmitted = $this->Teachers_model->getTeacherTrailCount('mentoring','1',$this->uid,$trailclass)[0];
		$mentoringsubmitted = $mentorngsubmitted->totalcount; 
		
		$mentorngapproved = $this->Teachers_model->getTeacherTrailCount('mentoring','2',$this->uid,$trailclass)[0];
		$mentoringapproved = $mentorngapproved->totalcount; 
		

			$data = array(
				   'mentoringsubmitted' => $mentoringsubmitted,
				   'mentoringapproved' => $mentoringapproved
				);
				echo json_encode($data);
		}
	}
   
		function ajGetLessonsList(){
			if(isset($_POST['class_id']) && $_POST['class_id']!=""){
				$class_id = addslashes($_POST['class_id']);
				$res = $this->Mentor_model->getLessonsByclass($class_id);
				if($res['num']>0){
					foreach($res['data'] as $r){
						echo '<tr>
								<td>
								<h5 class="m-b-0">'.$r->lesson_name.'</h5>
								</td>
							  
								<td>
								<a href="'.base_url($this->url_slug.'/lessons_view/'.$r->lesson_id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
								</td>
							</tr>';
					}	
					
				}
				 
			 }
		 }

	function ajGetLessons(){
			if(isset($_POST['class_id']) && $_POST['class_id']!=""){
				$class_id = addslashes($_POST['class_id']);
				$res = $this->Mentor_model->getLessonsByclass($class_id);
				echo "<option value=''>Select Lesson</option>";	
				if($res['num']>0){
					foreach($res['data'] as $r){
						echo "<option value='$r->lesson_id'>$r->lesson_name</option>";	
						
					}	
					
				}
				 
			 }
		 }
		 
		 function ajGradeGetLessons(){
			if(isset($_POST['class_id']) && $_POST['class_id']!=""){
				$class_id = addslashes($_POST['class_id']);
				$res = $this->Mentor_model->getLessonsByclass($class_id);
				if($res['num']>0){
					foreach($res['data'] as $r){
						echo '<div class="checkbox"><input required type="checkbox" name="lesson_id[]" class="form-check-input" id="exampleCheck'.$r->lesson_id.'" value="'.$r->lesson_id .'">
                                <label class="form-check-label" for="exampleCheck'.$r->lesson_id .'">'. $r->lesson_name .'</label></div>';
					}	
					
				}
				 
			 }
		 }
		 
		 
	function ajGetArtworkslist(){
			if(isset($_POST['class_id']) && $_POST['class_id']!=""){
				$class_id = addslashes($_POST['class_id']);
				$lesson_id = addslashes($_POST['lesson_id']);
				
				$ary['class_id'] = $class_id;
				$ary['lesson_id'] = $lesson_id;
				   
				$res = $this->Teachers_artwork_model->getArtworkByclassandlessons($ary);
				
				
				if($res['num'] >0){
					foreach($res['data'] as $r){
							echo '<tr>
								<td>
									<img class="img-fluid rounded" src="'.base_url('parent/').$r->artwork_upload.'" style="max-width: 60px" alt="">
								</td>
								
								<td>
								<h5 class="m-b-0">'.$r->lesson_name.'</h5>
								</td>
							  
							   
								 <td>
								<h5 class="m-b-0"> '.$r->class_name.' </h5>
								
								</td>
								<td>
								<h5 class="m-b-0">'.$r->section_name.' </h5>
								</td>
							   
								<td>
								<a href="'.base_url($this->url_slug.'/view_artwork/'.$r->id).'" class="badge badge-primary"><i class="anticon anticon-eye"></i> View</a>
								</td>
							</tr>';
					}		
				}else{
					echo 'No Data Found';
				}
				 
			 }
		 }
	
	function ajNotificationList(){
			 $output = '';
			 
			 if(isset($_POST['viewed']) && $_POST['viewed']!=""){
				$array = array('seen'=>'1');
					$this->db->set($array);
					$this->db->where(array('seen' => 0, 'user_id' => $this->uid, 'school_id' => $this->school_id));
					$result = $this->db->update('notifications');
					/* $count = 0; */
			 }else{
			 
				$res = $this->Teachers_model->getNotificationList();
				$count = $res['num'];
				if($res['num'] >0){
					foreach($res['data'] as $r){
						$output .= '<a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
										<div class="d-flex">
											<div class="avatar avatar-blue avatar-icon">
												<i class="anticon anticon-mail"></i>
											</div>
											<div class="m-l-15">
												<p class="m-b-0 text-dark">'.$r->notifications.'</p>
												<p class="m-b-0"><small>8 min ago</small></p>
											</div>
										</div>
									</a>';
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
				   'unseen_notification'  => $count
				);
				echo json_encode($data);
		 }
	}
	
	
	
}