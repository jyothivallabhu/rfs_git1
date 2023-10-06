
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Roll_over extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Roll_over_model", 'roll_over');
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:10;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->load->library('bcrypt');
		
		$this->user_id = $_SESSION['login_session']['user_id'];
		
		
	}
	
	public function add()
	{
		
		$id = (isset($_SESSION['login_session']['school_id'])) ?  $_SESSION["login_session"]["school_id"] : $this->uri->segment("3");
		$school_id = $id;
		
		$data['schools'] = $this->admin->get_schoolsByID($id)[0];
		
		$data['academicyear'] = $this->admin->get_academicMaster();
		$data['classes'] = $this->admin->get_classesBySchoolID($id);
		
		$data['main_content'] = 'students/roll_over';
		$this->load->view('dash_template/body', $data);

	}

	public function save()
	{
		
		$status = 0;
		$msg= '';
		$url = '';
		
		 $bulk_insert = array();
		 
		 
		if($this->input->post('academic_year')=='' ){
			$msg = warning_msg('Please Select Academic Year');	
		}else if($this->input->post('roll_over_academic_year')=='' ){
			$msg = warning_msg('Please Select Roll over Academic Year');	
		}/* else if($this->input->post('section_id')=='' ){
			$msg = warning_msg('Please Select Section');	
		} */else{
			$ary =array();	
	   	
			$ary['school_id'] = $this->input->post('school_id');
			$ary['academic_year'] = $this->input->post('academic_year');
			
			$classes = $this->admin->get_classesBySchoolID($this->input->post('school_id'));
			
			$i=1;
			/*  new implementation  code */
			if(!empty($classes)){
				foreach ($classes as  $value) { 
				
					$next_class_order = $value->class_order+1; 
					$next_classID = $this->admin->classInfoByorderId($next_class_order,$this->input->post('school_id'));
					
					
					$m_array=array();	
				
					
					if(!empty($next_classID)){
						echo $rolloverClassId = $next_classID['c_id'];
						$sections = $this->admin->get_sectionsByClassID($value->c_id);
						if($sections['num'] > 0){
							foreach ($sections['data'] as $value2) {
								$ary['class_id'] = $value->c_id;
								$ary['section_id'] =$value2['section_id'];
								
								$getnextclasssection = $this->admin->getSectionIdByName($value2['section_name'],$value->c_id);
								
								
								if(!empty($getnextclasssection)){
									$nextsectionId = $getnextclasssection['section_id'];
								}else{
									$secdata = array(
											'school_id'=>$this->input->post('school_id'),
											'class_id'=>$value->c_id,
											'section_name'=>$value2['section_name'],
											'added_by'=>$this->user_id,
										);
									$create_newSection = $this->admin->insertSection($secdata);
									$nextsectionId = $this->db->insert_id();
								}
								$student_res = $this->roll_over->studentInfo($ary);
								/* echo $this->db->last_query();   */
								
									$i = 0;
									
								if($student_res['num'] > 0) {
									foreach($student_res['data'] as $val){
										
										
											
											$checkarray = array(
												'sd_student_id'=>trim($val['sd_student_id']),
												'sd_academic_year'=>trim($_POST['roll_over_academic_year']),
												'sd_school_id'=>trim($_POST['school_id']),
												'sd_class_id'=>$rolloverClassId,
												'sd_section_id'=>$nextsectionId,
												'academic_status'=>'pass',
												'added_by'=>$this->user_id,
											); 
										
										$if_exists = $this->admin->check_if_rollover_exists($checkarray);
										if ($if_exists == 0) {
											$bulk_insert[$i] = array(
												'sd_student_id'=>trim($val['sd_student_id']),
												'sd_academic_year'=>trim($_POST['roll_over_academic_year']),
												'sd_school_id'=>trim($_POST['school_id']),
												'sd_class_id'=>$rolloverClassId,
												'sd_section_id'=>$nextsectionId,
												'academic_status'=>'pass',
												'added_by'=>$this->user_id,
											); 
										}
										$i++;
									}
									
								}
								
							}
							 
						}
					}
					
					
				}
				/*  print_r($bulk_insert); */
				 if(!empty($bulk_insert)){
					$q = $this->db->insert_batch('student_academic_details',$bulk_insert);
					if($q){
						$status = 1;
						$msg = '<div class="alert alert-success alert-dismissible" role="alert"> Added Successfully'.$this->db->affected_rows().' Records</div>';
						$url = base_url().'roll_over/add/'.$_POST['school_id'];
					}
					
				}else{
					$msg = '<div class="alert alert-danger alert-dismissible" role="alert">Failed</div>';
				} 
			} 
			
		}
		
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
		
		
	}
	
	
	
}