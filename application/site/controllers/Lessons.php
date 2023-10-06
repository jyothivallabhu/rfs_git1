
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lessons extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->headerdata = $this->comm_fun->header_data();
		$this->load->model("Admin_model", 'admin');
		if (!$this->session->login_session )
			redirect('Login');
		
		$this->load->library('Ajax_pagination');
        $this->perPage = (isset($_POST['per_page']) && $_POST['per_page']>0)?$_POST['per_page']:50;
		$this->sorting = (isset($_POST['sorting']) && $_POST['sorting']!='')?$_POST['sorting']:'';
		$this->user_id = $_SESSION['login_session']['user_id'];
		$this->url_slug =  $_SESSION["login_session"]["url_slug"];
		$this->first_name = $_SESSION['login_session']['first_name'];
		$this->profile_pic = $_SESSION['login_session']['profile_pic'];
		$this->school_id = (isset($_SESSION['login_session']['school_id']))  ?  $_SESSION['login_session']['school_id'] : '';
		if(isset($_SESSION['login_session']['school_id'])){
			$this->school_data = $this->admin->get_schoolsByID($this->school_id)[0];
			$this->logo = $this->school_data->logo;
		}else{
			$this->logo = 'assets/images/rfslogo.png';
		}
	}

	public function index()
	{
		 $ary =array();	
	   	   
		/*total rows count*/
		$res = $this->admin->getRowslessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		
		/*pagination configuration*/
		$config['target']      = '#lessonsList';
		$config['base_url']    = base_url().'lessons/ajaxPagination';
		$config['total_rows']  = $totalRec;
		$config['per_page']    = $this->perPage;
		$config['link_func']   = 'searchFilter1';
		$this->ajax_pagination->initialize($config);
		$ary['limit']=$this->perPage;
		$ary['sorting']=$this->sorting;
		$posts = $this->admin->getRowslessons($ary);
		
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
		$data['lessons'] = $posts;	

		/* $data['main_content'] = 'lessons/index';
		$this->load->view('dash_template/body', $data); */
		
		if((isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !='' )|| ($_SESSION["login_session"]["role_id"] ==5)){	
			$data['main_content'] = 'lessons/index';
			$this->load->view('school_template/body', $data);
		}else{
			$data['main_content'] = 'lessons/index';
			$this->load->view('dash_template/body',$data) ;
		}
		
	}
	
	function ajaxPagination(){
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
		
        //total rows count
		$data = $this->admin->getRowslessons($conditions);
		
        $totalRec = (!empty($data))?count($data):0;
		
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'lessons/ajaxPagination';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->input->post('perpage');
        $config['link_func']   = 'searchFilter1';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->input->post('perpage');
		$conditions['sorting']=$this->sorting;
		$lessons = $this->admin->getRowslessons($conditions);
		$data['query'] = $this->db->last_query(); 
		
		/* echo $this->db->last_query(); */
		
		$data['pagination'] = $this->ajax_pagination->create_links();
		$data['showing_text'] = $this->ajax_pagination->showing_text;
        
		$html ='';
		if(!empty($lessons)){
			foreach($lessons as  $le){
				
		        $html .='<div class="row g-4" style="margin-bottom: 15px;">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card card-hover">
							<div class="card-body row">
								<div class="col-md-4">
								<img src="'.base_url().$le->final_artwork .'" width="300" height="300"></div>
								<div class="col-md-8">
									<h5 class="card-title mb-3">'. $le->lesson_name .'</h5>
								<a href="#">
								</a>
								<div class="d-flex gap-3 mb-3 align-items-center">
									<h6 class="mb-0">Medium | '. $le->medium .'</h4>
								</div>
								<div class="d-flex gap-3 mb-3 align-items-center">
									<h6 class="mb-0">Material Required | '. $le->material_required .'</h4>
								</div>
								
								<div class="d-flex gap-2 mb-3">
									<span>'. $le->description.'</span>
								</div>
								
								  <a class="btn btn-primary" href="'.  base_url('lessons/view_lesson/'.$le->lesson_id).'">View</a>';
								  
								  if($_SESSION['login_session']['role_id'] != 5){
									  
								  $html .=' <a class="btn btn-primary" href="'.  base_url('lessons/edit_lesson/'.$le->lesson_id) .'">Edit</a>
								  <a class="btn btn-danger" onclick="return confirm("Are you sure you want to Delete?");" href="'. base_url('lessons/delete_lesson/'.$le->lesson_id).'">Delete</a>';
								
								  }
								
								 $html .='</div>
								
							</div>
						</div>
					</div>
				</div>';
		
			}
		}else{
			$html .="No Data Found";
		}
		
		$data['html']=$html;
		echo json_encode($data);
    }
	
	
	public function index_old()
	{
		 $ary =array();	
		$res = $this->admin->getRowslessons($ary);
		if($res){			
			$totalRec = count($res);
		}else{
			$totalRec=0;
		}
		
		$data['count_posts']=$totalRec;
		
		$this->load->library('pagination');
		
		$query = $res;
		
		$total_count = $totalRec;
		$config['base_url'] = base_url('lessons/index');

		$config['total_rows'] = $total_count;
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 10;

		$config["uri_segment"] = 3;

		$choice = $config["total_rows"] / $config["per_page"];

		$config["num_links"] = 3;

		//config for bootstrap pagination class integration

		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';

		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = true;

		$config['last_link'] = true;

		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';

		$config['first_tag_close'] = '</span></li>';

		$config['prev_link'] = '&laquo';

		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';

		$config['prev_tag_close'] = '</span></li>';

		$config['next_link'] = '&raquo';

		$config['next_tag_open'] = '<li class="page-item "><span class="page-link">';

		$config['next_tag_close'] = '</span></li>';

		$config['last_tag_open'] = '<li class="page-item "><span class="page-link">';

		$config['last_tag_close'] = '</span></li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a href="" class="page-link">';

		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item "><span class="page-link">';

		$config['num_tag_close'] = '</span></li>';
		
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
		$this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//call the model function to get the department data

		$page=$data['page'];    

		$per_page=$config['per_page']; 
		if($page==0)
		$p=0;
		else
		$p=($page-1)*$config['per_page']; 
		$this->db->query("set character_set_results='utf8'");
		$sql="SELECT * from  lessons  where is_del = '0'";
		
        $sql.= " order by lesson_id desc limit $p,$per_page";	
		//echo $sql;
		$query = $this->db->query($sql);
		$data['lessons'] = $query->result();
		$data['pagination'] = $this->pagination->create_links();
		
		
		
		$data['main_content'] = 'lessons/index';
		$this->load->view('dash_template/body',$data);
		
	}
	
	
	
	public function add_lesson(){
		$data['main_content'] = 'lessons/add';
		$this->load->view('dash_template/body',$data);
	}
	
	
	
	public function upl()
    {
        $status = 0;
        $msg = '';
        $url = '';

		
        $_POST['added_by'] = $this->user_id;

        $this->load->library('upload');
        $json = array();
        $path = ROOT_UPL_IMAGE;
        // Define file rules
        $initialize = $this->upload->initialize(array(
            "upload_path" => $path,
            "allowed_types" => "gif|jpg|jpeg|png|bmp|pdf|doc|docx|mp4",
            "remove_spaces" => TRUE
        ));
        $error = '';

		if($this->input->post('lesson_name')=='' ){
			$msg = warning_msg('Please Enter Lesson Name');	
		}/* else if($this->input->post('description')=='' ){
			$msg = warning_msg('Please Enter Description');	
		}else if($this->input->post('aim_and_objective')=='' ){
			$msg = warning_msg('Please Enter Aim & Objective');	
		}else if($this->input->post('duration')=='' ){
			$msg = warning_msg('Please Enter Duration');	
		}else if($this->input->post('artist_art_movement')=='' ){
			$msg = warning_msg('Please Enter Artist / Art movement');	
		}else if($this->input->post('technique')=='' ){
			$msg = warning_msg('Please Enter Technique');	
		}else if($this->input->post('medium')=='' ){
			$msg = warning_msg('Please Enter Medium');	
		}else if($this->input->post('elements_of_art_covered')=='' ){
			$msg = warning_msg('Please Enter Elements or Principles of Art Covered Art Movement');	
		}else if($this->input->post('options')=='' ){
			$msg = warning_msg('Please Enter Options');	
		} else if($_FILES['final_artwork']['name'] == '' ){
			$msg = warning_msg('Please Upload Final Artwork');	
		} else if( $_FILES['teachers_note']['name'] =='' ){
			$msg = warning_msg('Please Upload Teachers Note');	
		}else if( $_FILES['introduction_video']['name'] =='' ){
			$msg = warning_msg('Please Upload Intro Video');	
		}else if( $_FILES['demonstration_video']['name'] =='' ){
			$msg = warning_msg('Please Upload Demo VIdeo');	
		} */else{	
		 
		
			if (!$this->upload->do_upload('final_artwork')) {
				$error = array('error' => $this->upload->display_errors());
				$final_artwork = false;
				$error = $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				$_POST['final_artwork'] = $data['file_name'];
				$final_artwork = true;
			}
			if (!$this->upload->do_upload('teachers_note')) {
				$error = array('error' => $this->upload->display_errors());
				$teachers_note = false;
				$error = $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				$_POST['teachers_note'] = $data['file_name'];
				$teachers_note = true;
			}
			if (!$this->upload->do_upload('demonstration_video')) {
				$error = array('error' => $this->upload->display_errors());
				$demonstration_video = false;
				$error = $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				$_POST['demonstration_video'] = $data['file_name'];
				$demonstration_video = true;
			}
			if (!$this->upload->do_upload('introduction_video')) {
				$error = array('error' => $this->upload->display_errors());
				$introduction_video = false;
				$error = $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				$_POST['introduction_video'] = $data['file_name'];
				$introduction_video =  true;
			}
			$json = ($demonstration_video and    $introduction_video) ? 'success' : 'failed';
			$result = 0;
			if ($json == 'success') {
				$_POST['added_by'] = $this->user_id;
				$result = $this->db->insert('lessons', $_POST);
			}

			// header('Content-Type: application/json');
			// echo json_encode($json);

			if ($result) {
				$status = 1;
				$msg = '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
				$url = base_url() . 'lessons/';
			} else {
				$msg = $error;
			}
		}
		$res = array('status' => $json, 'msg' => $msg, 'url' => $url);
		// $res['cst']['cstn'] = $this->security->get_csrf_token_name();
		// $res['cst']['cstv'] = $this->security->get_csrf_hash();
		// $json = 'success';
		echo json_encode($res);
		exit;
    }
	
	
	public function edit_upl()
    {
		/* ini_set('memory_limit', '8192M'); 
		ini_set('post_max_size', '8192M');
		ini_set('upload_max_filesize', '8192M'); */
		
        $status = 0;
        $msg = '';
        $url = '';

        $_POST['added_by'] = $this->user_id;
		/* print_r($_POST); */
        $this->load->library('upload');
        $json = array();
        /* $path = ROOT_UPL_IMAGE; */
        $path = 'uploads/lessons/';
        // Define file rules
        $initialize = $this->upload->initialize(array(
            "upload_path" => $path,
            "allowed_types" => "gif|jpg|jpeg|png|bmp|pdf|doc|docx|mp4",
            "remove_spaces" => TRUE
        ));
        $error = '';

		if($this->input->post('lesson_name')=='' ){
			$msg = warning_msg('Please Enter Lesson Name');	
		}/* else if($this->input->post('description')=='' ){
			$msg = warning_msg('Please Enter Description');	
		}else if($this->input->post('aim_and_objective')=='' ){
			$msg = warning_msg('Please Enter Aim & Objective');	
		}else if($this->input->post('duration')=='' ){
			$msg = warning_msg('Please Enter Duration');	
		}else if($this->input->post('artist_art_movement')=='' ){
			$msg = warning_msg('Please Enter Artist / Art movement');	
		}else if($this->input->post('technique')=='' ){
			$msg = warning_msg('Please Enter Technique');	
		}else if($this->input->post('medium')=='' ){
			$msg = warning_msg('Please Enter Medium');	
		}else if($this->input->post('elements_of_art_covered')=='' ){
			$msg = warning_msg('Please Enter Elements or Principles of Art Covered Art Movement');	
		}  else if($this->input->post('options')=='' ){
			$msg = warning_msg('Please Enter Options');	
		}  */else{	
		 
		 
		 if ( isset($_POST['is_featuredcheck']) ) {
			$_POST['is_featured'] = "1";
		} else { 
			$_POST['is_featured'] = "0";
		}
		unset($_POST['is_featuredcheck']);
			/* if(isset($_FILES['final_artwork']['name']) && $_FILES['final_artwork']['name'] != ''){
				if (!$this->upload->do_upload('final_artwork')) {
					$error = array('error' => $this->upload->display_errors());
					$final_artwork = false;
					$error = $this->upload->display_errors();
				} else {
					$data = $this->upload->data();
					$_POST['final_artwork'] = $path.$data['file_name'];
					$final_artwork = true;
				}
			} */
			
			if ($_POST['base_code1']) {
			   $trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				
					$image_parts = explode(";base64,", $_POST['base_code1']); 
					$image_type_aux = explode("image/", $image_parts[0]);
					$image_type = $image_type_aux[1];
					$image_base64 = base64_decode($image_parts[1]);
					$img=uniqid() . '.jpg'; //$image_type
					$file = $trgt1 .$img ;
					file_put_contents($file, $image_base64);
					$_POST['final_artwork'] = 'uploads/lessons/'.$img;
				}
				
				
			if(isset($_FILES['teachers_note']['name']) && $_FILES['teachers_note']['name'] != ''){
				if (!$this->upload->do_upload('teachers_note')) {
					$error = array('error' => $this->upload->display_errors());
					$teachers_note = false;
					$error = $this->upload->display_errors();
				} else {
					$data = $this->upload->data();
					$_POST['teachers_note'] = $path.$data['file_name'];
					$teachers_note = true;
				}
			}
			
			
			
			if(isset($_FILES['demonstration_video']['name']) && $_FILES['demonstration_video']['name'] != ''){
				if (!$this->upload->do_upload('demonstration_video')) {
					$error = array('error' => $this->upload->display_errors());
					$demonstration_video = false;
					$error = $this->upload->display_errors();
				} else {
					$data = $this->upload->data();
					$_POST['demonstration_video'] = $path.$data['file_name'];
					$demonstration_video = true;
				}
			}else{
				$demonstration_video = true;
			}
			
			
			if(isset($_FILES['introduction_video']['name']) && $_FILES['introduction_video']['name'] != ''){
				if (!$this->upload->do_upload('introduction_video')) {
					$error = array('error' => $this->upload->display_errors());
					$introduction_video = false;
					$error = $this->upload->display_errors();
				} else {
					$data = $this->upload->data();
					$_POST['introduction_video'] = $path.$data['file_name'];
					$introduction_video =  true;
				}
			}else{
				$introduction_video = true;
			}
			if(isset($_FILES['options']['name']) && $_FILES['options']['name'] != ''){
				if (!$this->upload->do_upload('options')) {
					$error = array('error' => $this->upload->display_errors());
					$options = false;
					$error = $this->upload->display_errors();
				} else {
					$data = $this->upload->data();
					$_POST['options'] = $path.$data['file_name'];
					$options =  true;
				}
			}
			
			$base_code1 = $_POST['base_code1'];
			unset($_POST['base_code1']);
			
			
			$json = ($demonstration_video and    $introduction_video) ? 'success' : 'failed';
			$result = 0;
			if ($json == 'success') {
				/* //$_POST['added_by'] = $this->user_id;
				//$result = $this->db->insert('lessons', $_POST); */
				
				$this->db->set($_POST);
				$this->db->where(array('lesson_id' => $_POST['lesson_id']));
				$result = $this->db->update('lessons');
			
			}

			// header('Content-Type: application/json');
			// echo json_encode($json);

			if ($result) {
				$status = 1;
				$msg = '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
				$url = base_url() . 'lessons/';
			} else {
				$msg = $error;
			}
		}
		$res = array('status' => $json, 'msg' => $msg, 'url' => $url);
		// $res['cst']['cstn'] = $this->security->get_csrf_token_name();
		// $res['cst']['cstv'] = $this->security->get_csrf_hash();
		// $json = 'success';
		echo json_encode($res);
		exit;
    }
	
	
	public function save_lesson()
	{
		
		
		$status = 0;
		$msg= '';
		$url = '';
		
		

	   if($this->input->post('lesson_name')=='' ){
			$msg = warning_msg('Please Enter Lesson Name');	
		}/* else if($this->input->post('description')=='' ){
			$msg = warning_msg('Please Enter Description');	
		}else if($this->input->post('aim_and_objective')=='' ){
			$msg = warning_msg('Please Enter Aim & Objective');	
		}else if($this->input->post('duration')=='' ){
			$msg = warning_msg('Please Enter Duration');	
		}else if($this->input->post('artist_art_movement')=='' ){
			$msg = warning_msg('Please Enter Artist / Art movement');	
		}else if($this->input->post('technique')=='' ){
			$msg = warning_msg('Please Enter Technique');	
		}else if($this->input->post('medium')=='' ){
			$msg = warning_msg('Please Enter Medium');	
		}else if($this->input->post('elements_of_art_covered')=='' ){
			$msg = warning_msg('Please Enter Elements or Principles of Art Covered Art Movement');	
		} else if($_FILES['final_artwork']['name']=='' ){
			$msg = warning_msg('Please Upload Final Artwork');	
		} else if($_FILES['teachers_note']['name']=='' ){
			$msg = warning_msg('Please Upload Teachers Note');	
		} else if($this->input->post('options')=='' ){
			$msg = warning_msg('Please Enter Options');	
		} else if($_FILES['introduction_video']['name']=='' ){
			$msg = warning_msg('Please Upload Intro Video');	
		}else if($_FILES['demonstration_video']['name']=='' ){
			$msg = warning_msg('Please Upload Demo VIdeo');	
		} */else{	
		
		
			if(isset($_FILES['introduction_video']['name']) && $_FILES['introduction_video']['name'] != ''){
				$target_dir = "uploads/lessons/";
				
				if(!file_exists($target_dir)) 
				{
					mkdir($target_dir, 0777, true);
				}
				$target_file = $target_dir .time().'-'.str_replace(' ', '_',$_FILES["introduction_video"]["name"]);
			   $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			   $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
			   if( in_array($extension,$extensions_arr) ){
				 if(move_uploaded_file($_FILES['introduction_video']['tmp_name'],$target_file)){
					   $_POST['introduction_video'] = $target_file ;
					   $_SESSION['message'] = "Upload successfully.";
					 }else{
						$msg = "Failed to upload video";
					 }
				 }   
		   }
		   if(isset($_FILES['demonstration_video']['name']) && $_FILES['demonstration_video']['name'] != ''){
				$target_dir = "uploads/lessons/";
				
				if(!file_exists($target_dir)) 
				{
					mkdir($target_dir, 0777, true);
				}
				
				$target_file = $target_dir .time().'-'.str_replace(' ', '_',$_FILES["demonstration_video"]["name"]);
				$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extensions_arr = array("mp4","avi","3gp","mov","mpeg");
				if( in_array($extension,$extensions_arr) ){
					 if(move_uploaded_file($_FILES['demonstration_video']['tmp_name'],$target_file)){
					   $_POST['demonstration_video'] = $target_file ;
					   $_SESSION['message'] = "Upload successfully.";
					 }else{
						echo $msg = "Failed to upload video";exit;
					 }
			   }   
		   }
		   
		   /* if(isset($_FILES['final_artwork']) && !empty($_FILES) && $_FILES['final_artwork']['name']!=""){		
				$trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				$size1 = $_FILES['final_artwork']['size'];
				$file_name1 = $_FILES['final_artwork']['name'];
				$path_parts1=pathinfo($_FILES['final_artwork']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$_POST['final_artwork']=$trgt1.$file1;
				move_uploaded_file($_FILES['final_artwork']['tmp_name'],$trgt1.$file1); 
			 } */
		   
		   
		   if ($_POST['base_code1']) {
			   $trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				
					$image_parts = explode(";base64,", $_POST['base_code1']); 
					$image_type_aux = explode("image/", $image_parts[0]);
					$image_type = $image_type_aux[1];
					$image_base64 = base64_decode($image_parts[1]);
					$img=uniqid() . '.jpg'; //$image_type
					$file = $trgt1 .$img ;
					file_put_contents($file, $image_base64);
					$_POST['final_artwork'] = 'uploads/lessons/'.$img;
				}else{
					$_POST['final_artwork'] = '';
				}
				
				
			if(isset($_FILES['teachers_note']) && !empty($_FILES) && $_FILES['teachers_note']['name']!=""){		
				$trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				$size1 = $_FILES['teachers_note']['size'];
				$file_name1 = $_FILES['teachers_note']['name'];
				$path_parts1=pathinfo($_FILES['teachers_note']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$_POST['teachers_note']=$trgt1.$file1;
				move_uploaded_file($_FILES['teachers_note']['tmp_name'],$trgt1.$file1); 
			 }
		   
		   if(isset($_FILES['options']) && !empty($_FILES) && $_FILES['options']['name']!=""){		
				$trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				$size1 = $_FILES['options']['size'];
				$file_name1 = $_FILES['options']['name'];
				$path_parts1=pathinfo($_FILES['options']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$_POST['options']=$trgt1.$file1;
				move_uploaded_file($_FILES['options']['tmp_name'],$trgt1.$file1); 
			 }
		   
		   
		$base_code1 = $_POST['base_code1'];
			unset($_POST['base_code1']);
		
			$_POST['added_by']= $this->user_id;
			$result = $this->db->insert('lessons', $_POST);
			
			if($result){
				$status = 1;
				$msg = '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
				$url = base_url().'lessons/';
			}else{
				$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
			}
		}
	   
	   
	   
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
				
	}
	public function edit_lesson($id){
		$data['lessons'] = $this->admin->get_lessonsByID($id)[0];
		$data['main_content'] = 'lessons/edit';
		$this->load->view('dash_template/body', $data);
	}
	
	public function view_lesson($id){
		
		$rid = $this->uri->segment("3");
		
		if($rid!="" ){
			$res = $this->admin->get_lessonsByID($rid);
			/* echo $this->db->last_query();exit; */
			if(!empty($res)){
				$data['view_lessons'] = $this->admin->get_lessonsByID($rid)[0];
				$data['main_content'] = 'lessons/view';
				/* $this->load->view('dash_template/body', $data); */
				if(isset($_SESSION["login_session"]["school_id"]) && $_SESSION["login_session"]["school_id"] !=''){	
					$this->load->view('school_template/body', $data);
				}else{
					$this->load->view('dash_template/body', $data);
				}
			}else{
				$this->session->set_flashdata('invalid',warning_msg('Invalid request'));
				redirect('lessons');
			}	
		}else{
			redirect('lessons');
		}	
		
		
		
	}
	
	
	
	public function update_lesson($id)
	{
		//print_r($_POST);
		
		$status = 0;
		$msg= '';
		$url = '';
		
		if($this->input->post('lesson_name')=='' ){
			$msg = warning_msg('Please Enter Lesson Name');	
		}else if($this->input->post('description')=='' ){
			$msg = warning_msg('Please Enter Description');	
		}else if($this->input->post('aim_and_objective')=='' ){
			$msg = warning_msg('Please Enter Aim & Objective');	
		}else if($this->input->post('duration')=='' ){
			$msg = warning_msg('Please Enter Duration');	
		}else if($this->input->post('artist_art_movement')=='' ){
			$msg = warning_msg('Please Enter Artist / Art movement');	
		}else if($this->input->post('technique')=='' ){
			$msg = warning_msg('Please Enter Technique');	
		}else if($this->input->post('medium')=='' ){
			$msg = warning_msg('Please Enter Medium');	
		}else if($this->input->post('elements_of_art_covered')=='' ){
			$msg = warning_msg('Please Enter Elements or Principles of Art Covered Art Movement');	
		}else if($this->input->post('final_artwork')=='' ){
			$msg = warning_msg('Please Upload Final Artwork');	
		}else if($this->input->post('teachers_note')=='' ){
			$msg = warning_msg('Please Upload Teachers Note');	
		}else if($this->input->post('options')=='' ){
			$msg = warning_msg('Please Enter Options');	
		}else if($this->input->post('intro_video')=='' ){
			$msg = warning_msg('Please Upload Intro Video');	
		}else if($this->input->post('demo_video')=='' ){
			$msg = warning_msg('Please Upload Demo VIdeo');	
		}else{	
			$maxsize = 10485760; // 10MB
			//$maxsize = 2097152; // 2MB
			$videos = array();
			if(isset($_FILES['intro_video']['name']) && $_FILES['intro_video']['name'] != ''){
				$target_dir = "uploads/intro_videos/";
				
				if(!file_exists($target_dir)) 
				{
					mkdir($target_dir, 0777, true);
				}
				
				//$target_file = $target_dir . $_FILES["file"]["name"];
			   $target_file = $target_dir .time().'-'.str_replace(' ', '_',$_FILES["intro_video"]["name"]);
			   // Select file type
			   $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			   // Valid file extensions
			   $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
			   // Check extension
			   if( in_array($extension,$extensions_arr) ){
		 
				  // Check file size
				  if(($_FILES['intro_video']['size'] >= $maxsize) || ($_FILES["intro_video"]["size"]== 0)) {
					 $msg = "File too large. File must be less than 10MB.";
				  }else{
					 // Upload
					 if(move_uploaded_file($_FILES['intro_video']['tmp_name'],$target_file)){
					   $_POST['introduction_video'] = $target_file ;
					   $_SESSION['message'] = "Upload successfully.";
					 }else{
						$msg = "Failed to upload video";
					 }
				  }

			   }   
		   }else{
				$_POST['introduction_video'] = $_POST['intro_video'] ;
		   }
		   if(isset($_FILES['demo_video']['name']) && $_FILES['demo_video']['name'] != ''){
				$target_dir = "uploads/intro_videos/";
				
				if(!file_exists($target_dir)) 
				{
					mkdir($target_dir, 0777, true);
				}
				
				//$target_file = $target_dir . $_FILES["file"]["name"];
			   $target_file = $target_dir .time().'-'.str_replace(' ', '_',$_FILES["demo_video"]["name"]);
			   // Select file type
			   $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			   // Valid file extensions
			   $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
			   // Check extension
			   if( in_array($extension,$extensions_arr) ){
		 
				  // Check file size
				  if(($_FILES['demo_video']['size'] >= $maxsize) || ($_FILES["demo_video"]["size"]== 0)) {
					echo $msg = "File too large. File must be less than 10MB."; exit;
				  }else{
					 // Upload
					 if(move_uploaded_file($_FILES['demo_video']['tmp_name'],$target_file)){
					   $_POST['demonstration_video'] = $target_file ;
					   $_SESSION['message'] = "Upload successfully.";
					 }else{
						echo $msg = "Failed to upload video";exit;
					 }
				  }

			   }   
		   }else{
				$_POST['introduction_video'] = $_POST['demo_video'] ;
		   }
		   
		  /*  if(isset($_FILES['final_artwork']) && !empty($_FILES) && $_FILES['final_artwork']['name']!=""){		
				$trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				
				$size1 = $_FILES['final_artwork']['size'];
				$file_name1 = $_FILES['final_artwork']['name'];
				$path_parts1=pathinfo($_FILES['final_artwork']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$_POST['final_artwork']=$trgt1.$file1;
				move_uploaded_file($_FILES['final_artwork']['tmp_name'],$trgt1.$file1); 
			 }else{
				$_POST['final_artwork'] = $_POST['final_artwork'] ;
			} */
			
			if ($_POST['base_code1']) {
			   $trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				
					$image_parts = explode(";base64,", $_POST['base_code1']); 
					$image_type_aux = explode("image/", $image_parts[0]);
					$image_type = $image_type_aux[1];
					$image_base64 = base64_decode($image_parts[1]);
					$img=uniqid() . '.jpg'; //$image_type
					$file = $trgt1 .$img ;
					file_put_contents($file, $image_base64);
					$_POST['final_artwork'] = 'uploads/lessons/'.$img;
				}else{
					$_POST['final_artwork'] = '';
				}
				
		   
		   if(isset($_FILES['teachers_note']) && !empty($_FILES) && $_FILES['teachers_note']['name']!=""){		
				$trgt1='uploads/lessons/';
				if(!file_exists($trgt1)) 
				{
					mkdir($trgt1, 0777, true);
				}
				$size1 = $_FILES['teachers_note']['size'];
				$file_name1 = $_FILES['teachers_note']['name'];
				$path_parts1=pathinfo($_FILES['teachers_note']['name']);
				$file1 = time().'.'.$path_parts1['extension'];
				$_POST['teachers_note']=$trgt1.$file1;
				move_uploaded_file($_FILES['teachers_note']['tmp_name'],$trgt1.$file1); 
			 }else{
				$_POST['teachers_note'] = $_POST['teachers_note'] ;
			}
		   
			$modules = $_POST['modules'];
			unset($_POST['modules']);
			
			$base_code1 = $_POST['base_code1'];
			unset($_POST['base_code1']);
			
			$this->db->set($_POST);
			$this->db->where(array('lesson_id' => $id));
			$result = $this->db->update('lessons');
			
			if($result){
				$status = 1;
				$msg = '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
				$url = base_url().$this->url_slug.'assign_lessons/'.$sid;
			}else{
				$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
			}
		}
		
		
				
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}	
	public function delete_lesson($id)
	{
		$array = array('status' => '0', 'is_del' => '1');
		$this->db->set($array);
		$this->db->where(array('lesson_id' => $id));
		$result = $this->db->update('lessons');
		redirect('lessons', "refresh");
	}
	
	public function import($id =null)
	{
	
		$data['main_content'] = 'lessons/import';
		$this->load->view('dash_template/body', $data);
	}
	
	public function submitimport()	{
		$status = 0;
		$msg= '';
		$url = '';		$parent_lastId = '';
		$filename=$_FILES["import_students"]["tmp_name"];
        if($_FILES["import_students"]["size"] > 0)
          {
            $file = fopen($filename, "r");
			//$handle = fopen($filename, "r");
			$headers = fgetcsv($file, 100000, ",");
             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
             {
				 
					
				
				  $save_data = array(
					'lesson_name'=>trim(ucwords($importdata[0])),
					'description'=>trim(ucwords($importdata[1])),
					'aim_and_objective'=>trim($importdata[2]),
					'duration'=>trim($importdata[3]),
					'artist_art_movement'=>trim($importdata[4]),
					'technique'=>trim($importdata[5]),
					'medium'=>trim($importdata[6]),
					'elements_of_art_covered'=>trim($importdata[7]),
					'keywords'=>trim($importdata[8]),
					'material_required'=>trim($importdata[9]),
					'added_by'=>$this->user_id,
				);
				
				$q = $this->db->insert('lessons', $save_data);
				if($q){
					$status = 1;
					$msg = '<div class="alert alert-success"> <strong>Added Successfully</strong></div>';
					$url = base_url().'lessons/';
				}else{
					$msg = '<div class="alert alert-warning alert-dismissible" role="alert"> Something went wrong, please Try Again Later</div>';
				}
				
			 }		

			
			

			
			 $status = 1;
			 $msg = '<div class="alert alert-success">  <strong> Uploaded Successfully</strong></div>';
			 $url = base_url().'lessons/import';
		  }else{
			  $msg = '<div class="alert alert-warning"> <strong> Please Upload file</strong></div>';
		  }
		$res = array('status'=>$status,'msg'=>$msg,'url'=>$url);
		$res['cst']['cstn'] = $this->security->get_csrf_token_name();
		$res['cst']['cstv'] = $this->security->get_csrf_hash();
		echo json_encode($res); exit;
	}
	
	
	
	
}